<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
    	return view('index')
    	->with('title',Setting::first())
    	->with('categories',Category::take(5)->get())
    	->with('first_post',Post::orderBy('created_at','desc')->first())
        ->with('posts',Post::orderBy('created_at','desc')->skip(1)->take(2)->get())
        ->with('cat_name',Category::find(3));
    }

    public function post_detail($slug){
    	
    	$post = Post::where('slug',$slug)->first();
        

    	return view('post_detail')
    	->with('post',$post)
    	->with('title',Setting::first())
    	->with('categories',Category::take(5)->get());
    }
}
