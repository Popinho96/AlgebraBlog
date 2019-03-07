@extends('layouts.master')

@section('content')
            <li>{{ $post->title }}</li>
            <br>
            <section>{{ $post->body }}</section>

@endsection