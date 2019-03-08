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
               <h3 class="panel-title">Update user</h3>
          </div>

          <div class="panel-body">
               <form method="post" action="{{ route('users.update', $user->id) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                         <label for="naziv">Name</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
                    </div>
                    <div class="form-group">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" />
                    </div>
                    <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" id="password" name="password" placeholder="Leave empty if you don't want to change">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger" role="button">Back</a>
                    @include('layouts.errors')
               </form>
          </div>
     </div>
</div>
@endsection