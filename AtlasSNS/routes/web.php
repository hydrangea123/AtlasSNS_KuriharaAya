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

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('user.logout');
Route::post('/login', 'Auth\LoginController@login');

//新規登録のページ
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');
Route::post('/auth.added', 'Auth\RegisterController@index');


//ログイン中のページ
//アクセス制限
Route::group(['middleware' => 'loginUserCheck'], function() {
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@index');
Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');
Route::get('/search','UsersController@index');
Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
Route::get('/follower-profile','profileController@index');

});

//ログアウト
Route::get('logout','UsersController@logout');

//つぶやき投稿
Route::post('posts','PostsController@create');

//編集機能
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');

//削除の更新処理
Route::post('/destroy/{id}',[PostsController::class, 'destroy'])->name('post.destroy');
