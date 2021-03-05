<?php

use App\Comment;
use Illuminate\Support\Facades\Route;
// use Illuminate\Auth;


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

Route::get('/','PostController@index2')->name('home');
Route::GET('contact','HomeController@contact')->name('contact');
Route::GET('test','HomeController@test')->name('test');
Route::GET('author','HomeController@author')->name('author');
Route::GET('/index2','PostController@index2')->name('index2');

//Filers
Route::GET('posts/filtera','PostController@filtera')->name('posts.filtera');
Route::GET('posts/filter','PostController@filter')->name('posts.filter');
Route::GET('posts/filters','PostController@filters')->name('posts.filters');
Route::GET('posts/filterd','PostController@filterd')->name('posts.filterd');

// Auth::routes(['verify'=>true]);
Auth::routes();

//Route for posts
Route::GET('posts','PostController@index')->name('posts.index');
Route::GET('posts/create','PostController@create')->name('posts.create');
Route::POST('posts/store','PostController@store')->name('posts.store');
Route::GET('posts/{post}','PostController@show')->name('posts.show');
// Route::PATCH('posts/update','PostController@update')->name('posts.update');


//Routes that can only admins and its owners use
Route::GET('posts/edit/{post}','PostController@edit')->middleware(['auth','role','can:view,post'])->name('posts.edit');
Route::PATCH('posts/{post}','PostController@update')->middleware(['auth','role','can:update,post'])->name('posts.update');
Route::DELETE('posts/{post}','PostController@destroy')->middleware(['auth','role','can:delete,post'])->name('posts.delete');

Route::GET('users/{user}','UserController@show')->middleware(['auth','role','can:view,user'])->name('users.show');
Route::GET('users/edit/{user}','UserController@edit')->middleware(['auth','role','can:view,user'])->name('users.edit');
Route::PATCH('users/update/{user}','UserController@update')->middleware(['auth','role','can:update,user'])->name('users.update');
//END


Route::middleware(['auth', 'role'])->prefix('admin/')->group(function () {

        Route::GET('home','UserController@home')->name('admin.home');
        //Users
        Route::GET('/users','UserController@index')->name('users.index');
        Route::DELETE('/users/{user}','UserController@destroy')->name('users.delete');

        //Route for comments
        Route::GET('comments','CommentController@index')->name('comments.index');
        Route::GET('comments/edit/{comment}','CommentController@edit')->name('comments.edit');
        Route::PATCH('comments','CommentController@update')->name('comments.update');
        Route::DELETE('comments/{comment}','CommentController@destroy')->name('comments.delete');
        Route::POST('comments/insert','CommentController@insertComm')->name('comments.insertComm');

        //Route for roles
        Route::GET('roles','RoleController@index')->name('roles.index');
        Route::GET('roles/create','RoleController@create')->name('roles.create');
        Route::POST('roles/store','RoleController@store')->name('roles.store');
        Route::GET('roles/edit/{role}','RoleController@edit')->name('roles.edit');
        Route::PATCH('roles/update/{role}','RoleController@update')->name('roles.update');
        Route::DELETE('roles/delete/{role}','RoleController@destroy')->name('roles.destroy');
        Route::GET('roles/{role}','RoleController@show')->name('roles.show');

        //Route for categories
        Route::GET('categories','CategoryController@index')->name('categories.index');
        Route::GET('categories/create','CategoryController@create')->name('categories.create');
        Route::POST('categories/store','CategoryController@store')->name('categories.store');
        Route::GET('categories/show/{category}','CategoryController@show')->name('categories.show');
        Route::GET('categories/edit/{category}','CategoryController@edit')->name('categories.edit');
        Route::PATCH('categories/update/{category}','CategoryController@update')->name('categories.update');
        Route::DELETE('categories/delete/{category}','CategoryController@destroy')->name('categories.destroy');


});
