@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post">
        <a href="{{ route('posts.show', $post->id) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }}</a></p>

        @if(count($post->categories))
        <section>
            <h6 style="display: inline">Categories:</h6>
            @foreach($post->categories as $category)
                <a href="{{ route('categories', $category) }}">{{ $category->name }}</a>
            @endforeach
        </section>
        @endif

        @if(count($post->tags))
        <section>
            <h6 style="display: inline">Tags:</h6>
            @foreach($post->tags as $tag)
                <a href="{{ route('tags', $tag) }}">{{ $tag->name }}</a>
            @endforeach
        </section>
        @endif
        
        <section>{{ $post->body }}</section>
    </div>

    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="btn btn-danger btn-sm">Delete</button>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm" role="button">Edit</a>
        <a href="{{ route('posts') }}" class="btn btn btn-sm" role="button">Back</a>
    </form>

    <hr />

    {{-- Add a comment --}}

    <div class="card">
        <div class="card-block">
            <form action="/posts/{{ $post->id }}/comment" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>

            </form>
        </div>
    </div>

    @if(count($post->comments))
    <hr />

    <div class="comments">
        <h3>Comments:</h3>
        <ul>
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->user->name }}</strong>
                    <i>{{ $comment->created_at->diffForHumans() }}:&nbsp;</i>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>
    @else
        <hr />
        <p>This post still doesn't have any comments, be the first to comment!</p>
    @endif
</div>
@endsection