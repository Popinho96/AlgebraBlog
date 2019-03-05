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
Route::get('/posts', 'PostsController@index');

Route::get('/posts/{id}', 'PostsController@show');



//Route::get('/users', 'UsersController@index');

//Route::get('/users/create', 'UsersController@create')->name('users.create');

//Route::post('/users', 'UsersController@store');

//Route::get('/users/{user}', 'UsersController@show');

//Route::get('/users/{user}/edit', 'UsersController@edit');

//Route::put('/users/{user}', 'UsersController@update');

//Route::delete('/users/{user}', 'UsersController@destroy'); 

Route::resource('users', 'UsersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
