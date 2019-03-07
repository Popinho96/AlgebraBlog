<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

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

    public function create(){
        return view('posts.create');
    }

    public function store(){
        
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body'  => 'required|min:3'
        ]);
/* 
        $post = new Post();

        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();
        $post->save(); */

        Post::create([
            'title'     => request('title'),
            'body'      => request('body'),
            'user_id'   => auth()->id()
        ]);
        return redirect()->route('posts');

    }
}
