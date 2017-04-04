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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'HomeController@show');

Route::post('/update', 'HomeController@edit');

Route::get('/chats', 'ChatController@index');

Route::post('/create-chat', 'ChatController@create');

Route::get('/chat/{id}', 'ChatController@show');

Route::post('/chat/{id}/send-message', 'ChatController@newMessage');
