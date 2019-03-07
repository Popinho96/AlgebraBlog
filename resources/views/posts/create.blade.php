@extends('layouts.master')

@section('content')
    @if(session()->has('flash_message'))
    <div class="alert alert-success alert-dismissible">
        {{session()->get('flash_message')}}
    @endif
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create a new Post</h3>
        </div>


        <div class="panel-body">
            <form action="{{ route('posts.store') }}" method="POST">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                    <label for="naziv">Title</label>title
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}">
                </div>
                <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                    <label for="Body">Body</label>
                    <textarea class="form-control" id="body" name="body" placeholder="Text" rows="10" cols="80">{{old('body')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Publish</button>
                    <a href="{{ route('posts')}}" class="btn btn-danger" role="button">Odustani</a>
                </div>
                @include('layouts.errors')
            </form>
        </div>
    </div>
</div>

@endsection