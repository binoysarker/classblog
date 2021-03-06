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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/blog','PagesController@getIndex');
Route::get('/blog/about','PagesController@getAbout');
Route::get('/blog/contact','PagesController@getContact');
/*
 *Posts and Comments controller section
 */
Route::resource('/blog/posts', 'PostsController');
Route::resource('/blog/comments', 'CommentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
Admin Route section
*/
Route::GET('/admin','AdminController@index')->name('admin.index');
Route::GET('admin/login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin/login','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('admin/register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::POST('admin/register','Admin\RegisterController@register');

/*
 * Admin component section to see all posts and comments in the admin section
 *
 */

Route::GET('admin/allPosts','AdminController@getPosts');
Route::GET('admin/allComments','AdminController@getComments');


Route::resource('/admin','AdminController');

Route::resource('/category','CategoryController');




