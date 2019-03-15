<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Tag;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){

        //$posts = DB::table('posts')->get();
        $posts = Post::latest();

        if($month = request('month')){
            $posts->whereMonth('created_at', Carbon::parse($month)->$month);
        }

        if($year = request('year')){
            $posts->whereYear('created_at', $year);
        }
        
        //$archives = Post::archives();

        $posts = $posts->get();
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

        $post = Post::create([
            'title'     => request('title'),
            'body'      => request('body'),
            'user_id'   => auth()->id()
        ]);

        $tag = request('tag');
        $tag = Tag::where('name', $tag)-> get();
        $tag_id = $tag->id;
        dd($tag_id);
        $post->tags()->attach($tag);

        return redirect()->route('posts');

    }

    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', compact('post'));
    
    }

    public function update($id)
    {

        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body'  => 'required|min:3'
        ]);

        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect()->route('posts')->withFlashMessage('You have succesfully updated your post '.$post->title.'!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts')->withFlashMessage('You have succesfully deleted a post: '.$post->title.'!');
    }
}
