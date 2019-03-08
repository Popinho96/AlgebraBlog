@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        @if(session()->has('flash_message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('flash_message') }}
        </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <p></p>
                    <h3 class="panel-title">Create new user</h3>
            </div>

            <div class="panel-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="naziv">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Insert your username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insert your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Insert your password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <a href="{{ route('users.index')}}" class="btn btn-danger" role="button">Back</a>
                        @include('layouts.errors')
                    </form>
            </div>
        </div>
    </div>
@endsection