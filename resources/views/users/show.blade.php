@extends('layouts.master')

@section('content')
        
    <h2>User name: {{ $user->name }}</h2>
    <br>
    <section>User email: {{ $user->email }}</section>
      
@endsection