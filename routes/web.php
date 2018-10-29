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

Route::get(
    '/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('index', 'HomeController@mypage');

Route::get('list/{post}', 'HomeController@list');

Route::get('user/edit', 'UsersController@edit');

Route::post('user/update', 'UsersController@update');

Route::get('create', 'PostsController@create');

Route::post('post/store', 'PostsController@store');

Route::get('delete/{post}', 'PostsController@delete');

Route::get('update/{post}', 'PostsController@update');
