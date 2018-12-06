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

Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::post('articles', 'ArticlesController@store');

Route::get('articles/tags/{category}', 'ArticlesController@tags');
Route::get('articles/show/{id}', 'ArticlesController@show');
Route::post('articles/show/{id}', 'ArticlesController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
