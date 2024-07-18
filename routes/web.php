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
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

//新規登録のページ
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');
Route::post('/auth.added', 'Auth\RegisterController@index');


//ログイン中のページ
//アクセス制限
Route::group(['middleware' => 'auth'], function() {
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@index');
Route::post('/profile','UsersController@view')->name('profile.view');
Route::get('/profile','UsersController@view')->name('profile.view');
Route::post('/profile/update','UsersController@update')->name('profile.update');
Route::get('/follow_list','FollowsController@follow_list');
Route::get('/follower_list','FollowsController@follower_list');
Route::get('/follower_profile','profileController@index');
Route::get('/logout','UsersController@logout');
});


//つぶやき投稿
Route::post('posts','PostsController@create');

//編集機能
Route::post('/edit', PostsController::class.'@edit')->name('edit');

//削除の更新処理
Route::post('destroy/{id}', PostsController::class.'@destroy')->name('destroy');

//ユーザー検索
Route::post('/search', 'UsersController@search');
Route::get('/search', 'UsersController@search');

//フォロー、フォロー解除
Route::post('/search/{user}/follow', 'FollowsController@follow')->name('follow');
Route::delete('/search/{user}/unfollow', 'FollowsController@unfollow')->name('unfollow');

//フォロされているのそれぞれのプロフィール画面
Route::get('/show/{id}', 'UsersController@show')->name('each_profile');

//Route::post('/show/{id}/follow', 'FollowsController@follow')->name('follow');
//Route::delete('/show/{id}/unfollow', 'FollowsController@unfollow')->name('unfollow');


