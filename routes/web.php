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


Route::pattern('id', '[0-9]+');

//首頁
Route::get('/', ['as' => 'home.index', 'uses' => 'AboutController@index']);

//關於本站
Route::get('about', ['as' => 'about.index', 'uses' => 'AboutController@index']);

//文章總覽
Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
//熱門文章
Route::get('hot', ['as' => 'posts.hot', 'uses' => 'PostsController@hot']);
//隨機文章
Route::get('random', ['as' => 'posts.random', 'uses' => 'PostsController@random']);
//文章詳細
Route::get('posts/{id}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
//新增文章
Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
//儲存文章
Route::post('posts', ['as' => 'posts.store', 'uses' => 'PostsController@store']);
//編輯文章
Route::get('posts/{id}/edit', ['as' => 'posts.edit', 'uses' => 'PostsController@edit']);
//更新文章
Route::patch('posts/{id}', ['as' => 'posts.update', 'uses' => 'PostsController@update']);
//刪除文章
Route::delete('posts/{id}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);
//新增回覆
Route::post('posts/{id}/comment', ['as' => 'posts.comment', 'uses' => 'PostsController@comment']);
//我的文章
Route::get('my', ['as' => 'posts.my', 'uses' => 'PostsController@my']);
//使用者文章
Route::get('posts/user/{id}', ['as' => 'posts.user', 'uses' => 'PostsController@user']);

Auth::routes();

Route::get('/home', 'HomeController@index');
//登出
Route::get('/logout', 'Auth\LoginController@logout');
