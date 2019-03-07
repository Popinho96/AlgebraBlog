@extends('auth.master')

@section('content')

    @if(session()->has('flash_message'))
    <div class="alert alert-success alert-dismissible">
        {{session()->get('flash_message')}}
    @endif
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit user</h3>
        </div>


        <div class="panel-body">
            <form action="{{route('users.update', $user->id)}}" method="POST">
            {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="naziv">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ponovite password"placeholder="Ukoliko ne želite mjenjati ostavite prazno">
                </div>
                <button type="submit" class="btn btn-primary">Uredi</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger" role="button">Odustani</a>
                    
            </form>
        </div>
    </div>
@endsection