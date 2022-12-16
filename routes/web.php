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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

//以下全てログイン中のページ
//投稿一覧表示
Route::get('/top','PostsController@index');

//投稿機能・編集・削除
Route::post('post/create','PostsController@create');
Route::post('post/update','PostsController@update');
Route::get('post/{id}/delete','PostsController@delete');

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');
//各アイコンからユーザー情報への遷移
Route::get('/profile/{user}','UsersController@profile');
//プロフィール画面遷移
Route::get('/profileEdit','UsersController@profileEdit');
Route::post('/profileEdit/update','UsersController@profileUpdate');
//検索画面遷移
Route::get('/search','UsersController@index');
Route::post('/search','UsersController@index');

Route::get('/follow-list','followsController@followList');
Route::get('/follower-list','followsController@followerList');

//フォローをする・はずすの実装
Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

// 選択したユーザーの投稿のみ表示
Route::get('/profile/{user}','UsersController@show');
// Route::resource('users/{user}', 'UsersController', ['only' => ['show']]);

Route::get('/test','PostsController@test');