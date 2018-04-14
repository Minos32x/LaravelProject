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

Route::get('/', function () {
    return view('welcome');
    // return("hellloooo");
});


Route::get('posts','PostsController@index')->name('posts.index');
Route::get('posts/create','PostsController@create')->name('posts.create');
Route::post('posts','PostsController@store')->name('posts.store');

Route::get('posts/show/{id}','PostsController@show')->name('posts.show');

Route::get('posts/edit/{id}','PostsController@edit')->name('posts.edit');
Route::post('posts/update/{id}','PostsController@update')->name('posts.update');



Route::get('posts/destroy/{id}','PostsController@destroy')->name('posts.destroy');







