<?php

use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
    // return("hellloooo");
});
Route::middleware('auth')->group(function () {


    Route::get('posts', 'PostsController@index')->name('posts.index');
    Route::get('posts/create', 'PostsController@create')->name('posts.create');
    Route::post('posts', 'PostsController@store')->name('posts.store');

    Route::get('posts/show/{id}', 'PostsController@show')->name('posts.show');
    // Route::name('admin.')->group(function () {
    Route::get('posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::put('posts/update/{post}', 'PostsController@update')->name('posts.update');
    // })->name('posts');
    Route::delete('posts/destroy/{id}', 'PostsController@destroy')->name('posts.destroy');
});

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('loggedGitHub',function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
