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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('comments/{id}/delete', 'CommentsController@delete');
Route::resource('comments', 'CommentsController');

Route::post('posts/{id}/comment', array('as' => 'posts.comment', 'uses' => 'PostsController@comment'));
Route::get('posts/{id}/delete', 'PostsController@delete');
Route::resource('posts', 'PostsController');