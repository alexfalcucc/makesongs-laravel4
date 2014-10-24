<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('login', 'LoginController@index');

Route::get('/', 'PagesController@index');

Route::get('songs', 'SongsController@index');

Route::get('songs/{slug}', 'SongsController@show');

Route::get('songs/{slug}/edit', 'SongsController@edit');

Route::patch('songs/{slug}/update', 'SongsController@update');

Route::delete('songs/{slug}/delete', 'SongsController@destroy');

Route::get('song/new', 'SongsController@showCreate');

Route::post('songs/create', 'SongsController@store');
