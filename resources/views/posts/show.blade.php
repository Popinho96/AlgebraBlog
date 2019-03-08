@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post">
        <a href="{{ route('posts.show', $post->id) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }}</a></p>

        <section>{{ $post->body }}</section>
    </div>

    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="btn btn-danger btn-sm">Delete</button>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm" role="button">Edit</a>
        <a href="{{ route('posts') }}" class="btn btn btn-sm" role="button">Back</a>
    </form>

</div>
@endsection