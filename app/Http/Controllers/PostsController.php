<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index(){

        //$posts = DB::table('posts')->get();
        $posts = Post::latest()->get();
        //return $posts;
        return view('posts.index', compact('posts'));
    }

    public function show($id){

        //$post = DB::table('posts')->find($id);
        $post = Post::find($id);
        return view('posts/show', compact('post'));
    }

}
