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

Route::get('useredit', 'HomeController@userEdit');

Route::post('/userupdate', 'HomeController@userUpdate');

Route::get('post', 'PostController@post');

Route::post('postcreate', 'PostController@postCreate');

Route::get('delete/{post}', 'PostController@postDelete');

Route::get('update/{post}', 'PostController@postUpdate');
