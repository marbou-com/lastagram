<?php

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

Auth::routes();//これだけで認証系のルーてぅングができる｜理解


Route::group(['middleware' => 'auth'], function () {//認証された人だけ｜理解
    Route::get('/', 'IndexController@index')->name('index');
    
    Route::resource('posts', 'PostController')->only(['index', 'create', 'store', 'edit', 'update']);//｜理解

    Route::resource('users', 'UserController')->only(['show', 'edit', 'update']);//｜理解

    Route::resource('comments', 'CommentController')->only(['store']);//｜理解

    Route::resource('likes', 'LikeController')->only(['store', 'destroy']);//｜理解

    //Route::resource('tags', 'TagController');//｜理解

     Route::get('posts/create', function () {
         return view('pages.post.create');
     })->name('posts.create');
    
});




Route::get('/home', 'HomeController@index')->name('home');
