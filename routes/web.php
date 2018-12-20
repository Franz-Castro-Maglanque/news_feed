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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('posts','PostsController');
// Get posts record 
Route::post('data','PostsController@get_data');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test','PostsController@test');

Route::get('profile','PostsController@profile');
Route::post('profile','PostsController@updateProfile');
