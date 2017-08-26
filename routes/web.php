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
});
Route::get('/blog','PagesController@getIndex');
Route::get('/blog/about','PagesController@getAbout');
Route::get('/blog/contact','PagesController@getContact');

Route::resource('/blog/posts', 'PostsController');
Route::resource('/blog/comments', 'CommentsController');
