<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
         $cats = Category::with('posts')->whereIn('name',array('Sports','Technology','Entertainment'))->get();
        //dd($cats->toArray());
    	return view('index')
    	->with('title',Setting::first())
    	->with('categories',Category::take(5)->get())
    	->with('first_post',Post::orderBy('created_at','desc')->first())
        ->with('posts',Post::orderBy('created_at','desc')->skip(1)->take(3)->get())
        ->with('cats',$cats);
    }

    public function post_detail($slug){
    	
    	$post = Post::where('slug',$slug)->first();
        

    	return view('post_detail')
    	->with('post',$post)
    	->with('title',Setting::first())
    	->with('categories',Category::take(5)->get());
    }
}
