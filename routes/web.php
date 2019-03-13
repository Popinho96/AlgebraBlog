<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/about', function () {
    $user = array(
        'name'      =>  'Toni',
        'age'       =>   23,
        'job'       =>  'unemployed',
        'status'    => 'online'
    );
                        //['user' => $user]
    //return view('about', compact('user'))/*->with(['user' => $user]);
}); */

//Posts
Route::get('/posts', 'PostsController@index')->name('posts');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');

Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::post('/posts', 'PostsController@store')->name('posts.store');

Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');

Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update');

Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy'); 




//Comments
Route::post('/posts/{id}/comment', 'CommentController@store')->middleware('auth');
                                                            //->middleware('verified'); znači regist + potvrdjeni





//Route::get('/users', 'UsersController@index');

//Route::get('/users/create', 'UsersController@create')->name('users.create');

//Route::post('/users', 'UsersController@store');

//Route::get('/users/{user}', 'UsersController@show');

//Route::get('/users/{user}/edit', 'UsersController@edit');

//Route::put('/users/{user}', 'UsersController@update');

//Route::delete('/users/{user}', 'UsersController@destroy'); 

Route::resource('users', 'UsersController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
