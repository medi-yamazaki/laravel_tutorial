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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'TodoController@index')->name('index');
    Route::get('/create', 'TodoController@store')->name('create');
    Route::post('/create', 'TodoController@create');
    Route::get('/edit/{id}', 'TodoController@show')->name('edit');
    Route::post('/edit/{id}', 'TodoController@edit');

    Route::get('/login', 'LoginController@index')->name('login');
});

Auth::routes(['verify' => true]);
