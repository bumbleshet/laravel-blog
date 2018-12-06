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

Route::get('blogs', 'ArticlesController@index');
Route::get('blogs/create', 'ArticlesController@create');
Route::post('blogs', 'ArticlesController@store');

Route::get('blogs/tags/{category}', 'ArticlesController@tags');
Route::get('blogs/show/{id}', 'ArticlesController@show');
Route::post('blogs/show/{id}', 'ArticlesController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
