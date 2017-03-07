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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::pattern('id', '[0-9]+');

//首頁
Route::get('/', ['as' => 'home.index', function() {
        return view('index');
    }]);

//關於本站
Route::get('about', ['as' => 'about.index', function() {
        return view('about');
    }]);

//文章總覽
Route::get('posts', ['as' => 'posts.index', function() {
        return view('index');
    }]);

//熱門文章
Route::get('hot', ['as' => 'posts.hot', function() {
        return  view('index');
    }]);

//隨機文章
Route::get('random', ['as' => 'posts.random', function() {
        return view('post');
    }]);

//文章詳細
Route::get('posts/{id}', ['as' => 'posts.show', function($id) {
        return view('posts');
    }]);

//新增文章
Route::get('posts/create', ['as' => 'posts.create', function() {
        return view('contact');
    }]);

//儲存文章
Route::post('posts', ['as' => 'posts.store', function() {
        return 'posts.store';
    }]);

//編輯文章
Route::get('posts/{id}/edit', ['as' => 'posts.edit', function($id) {
        return view('contact');
    }]);

//更新文章
Route::patch('posts/{id}', ['as' => 'posts.update', function($id) {
        return 'posts.update: ' . $id;
    }]);

//刪除文章
Route::delete('posts/{id}', ['as' => 'posts.destroy', function($id) {
        return 'posts.destroy: ' . $id;
    }]);

//新增回覆
Route::post('posts/{id}/comment', ['as' => 'posts.comment', function($id) {
        return 'posts.comment: ' . $id;
    }]);
