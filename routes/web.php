<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();
Route::resource('posts', 'PostController');
Route::resource('checkup', 'CheckupController');
Route::get('search', [
    'as' => 'posts.search', 'uses' => 'PostController@search'
]);
Route::post('add_vstatus', [
	'as' => 'posts.add_vstatus', 'uses' => 'VaccinationStatusController@add'
]);

Route::post('y', [
	'as' => 'posts.y', 'uses' => 'PostController@y'
]);