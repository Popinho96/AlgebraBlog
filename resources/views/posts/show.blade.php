@extends('layouts.master')

@section('postss')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <a href="{{route('posts.show', $post->id)}}">
                <h3 class="blog-post-title">{{ $post->title }}</h3>
            </a>
            <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} <a href="#">{{$post->user->name}}</a></p>

            <section>{{ $post->body }}</section>
        </div>
    </div>
@endsection