<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //return view('admin.posts.index')->with('posts',Post::all());
        return view('admin.posts.index', compact('posts'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0){

            Session::flash('warning','You Must Have Some Categories Before Create A post.');
            return redirect()->back();
        }else{

           return view('admin.posts.create')->with('categories',$categories);
            
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        

        $this->validate($data, [
            //'title' => 'required|text|max:255',
            'title' => 'required|string|min:5|max:255',
            'thumbnail' => 'required|image',
            'category_id' => 'required',
            'content' => 'required|min:10'
        ]);

        $thumbnail = $data->thumbnail;
        $thumbnail_new_name = time().$thumbnail->getClientOriginalName();
        $thumbnail->move('uploads/posts',$thumbnail_new_name);

        $post = Post::create([
            'title' => $data->title,
            'slug' => str_slug($data->title),
            'thumbnail' => $thumbnail_new_name,
            'category_id' => $data->category_id,
            'content' => $data->content
        ]);

        Session::flash('success','New Post Created Succcessfully!..');

        return redirect()->route('posts');
        //return redirect()->back();
        //dd($data->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
         $this->validate($data, [
            //'title' => 'required|text|max:255',
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        if($data->hasFile('thumbnail')){

            $thumbnail = $data->thumbnail;
            $thumbnail_new_name = time().$thumbnail->getClientOriginalName();
            $thumbnail->move('uploads/posts',$thumbnail_new_name);
            $post->thumbnail = $thumbnail_new_name;
        }

        $post->title = $data->title;
        $post->content = $data->content;
        $post->category_id = $data->category_id;

        $post->save();
        Session::flash('success', 'Post Updated Successfully!..');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function delete($id)
    {
        $post = Post::find($id);

        //unlink(public_path($post->thumbnail));
        //File::delete($post->thumbnail);

        $post->delete();

        Session::flash('success', 'Post Trashed Successfully!..');
        return redirect()->route('posts');
    }

    //Restore post
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();
        Session::flash('success', 'Post Restored Successfully!..');

        return redirect()->route('posts');
    }

    //permanent delete posts
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        // if(file_exists($post->thumbnail)){
             //dd($post->thumbnail);
        // }
        

        // if(file_exists(public_path($post->thumbnail))){
        //     unlink(public_path($post->thumbnail));
        // };

        // if(file_exists($post->thumbnail)){
        //     Storage::delete($post->thumbnail); 
        // }

        
        $post->forceDelete();
        Session::flash('success', 'Post Deleted permanently!..');

        return redirect()->back();
    }
    
}
