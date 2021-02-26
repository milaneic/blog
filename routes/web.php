<?php

use App\Comment;
use Illuminate\Support\Facades\Route;


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

// Auth::routes(['verify'=>true]);
Auth::routes();

//Route for posts
Route::GET('posts','PostController@index')->name('posts.index');
Route::GET('posts/{post}','PostController@show')->name('posts.show');
Route::GET('posts/create','PostController@create')->name('posts.create');
Route::POST('posts/store','PostController@store')->name('posts.store');
// Route::PATCH('posts/update','PostController@update')->name('posts.update');




//Routes that can only admins and its owners use 
Route::GET('posts/edit/{post}','PostController@edit')->middleware(['auth','role','can:view,post'])->name('posts.edit');
Route::PATCH('posts/{post}','PostController@update')->middleware(['auth','role','can:update,post'])->name('posts.update');
Route::DELETE('posts/{post}','PostController@destroy')->middleware(['auth','role','can:delete,post'])->name('posts.delete');

Route::GET('/users/{user}','UserController@show')->name('users.show');
Route::GET('/users/edit/{user}','UserController@edit')->name('users.edit');
Route::PATCH('/users','UserController@update')->name('users.update');
//END


Route::middleware(['auth', 'role'])->prefix('admin/')->group(function () {

        //Users 
        Route::GET('/users','UserController@index')->name('users.index');
        Route::DELETE('/users/{user}','UserController@destroy')->name('users.delete');

        //Route for comments
        Route::GET('comments/edit/{comment}','CommentController@edit')->name('comments.edit');
        Route::PATCH('comments','CommentController@update')->name('comments.update');
        Route::DELETE('comments/{comment}','CommentController@destroy')->name('comments.delete');
});
