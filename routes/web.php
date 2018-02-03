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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => ['web']], function () {
	
	Route::get('/', 'UserController@loginShow')->name('showLogin');
	
	Route::get('/logout', 'UserController@logout')->middleware('my_auth')->name('logout');

	Route::get('backend/login', 'UserController@loginShow')->name('showLogin');
	Route::post('backend/login', 'UserController@login')->name('login');

	Route::resource('blogs', 'BlogController', ['only' => [
		'index', 
		'show',
	]]);

	Route::resource('backend/blogs', 'BlogController', ['as' => 'backend_blogs', 'only' => [
		'index', 
		'create', 
		'store', 
		'show',
		'edit',
		'update',
	]])->middleware('my_auth');

});