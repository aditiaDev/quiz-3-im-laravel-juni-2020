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
    return view('contents.home');
});

Route::get('/artikel', 'ArticleController@index');
Route::post('/artikel', 'ArticleController@save_data');
Route::delete('/artikel/{id}', 'ArticleController@delete_data');
Route::get('/artikel/{id}', 'ArticleController@show');
Route::get('/artikel/{id}/edit', 'ArticleController@edit');
Route::put('/artikel/{id}', 'ArticleController@update_data');