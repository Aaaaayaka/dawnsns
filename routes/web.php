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


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/profile/{user}','UsersController@profile');
Route::get('/profileEdit','UsersController@profileEdit');

Route::get('/search','UsersController@index');

Route::get('/follow-list','followsController@followList');
Route::get('/follower-list','followsController@followerList');

Route::post('post/create','PostsController@create');
Route::post('post/update','PostsController@update');
// Route::get('post/{id}/update', 'PostsController@update');
Route::get('post/{id}/delete','PostsController@delete');

Route::get('/search','UsersController@search');
Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');