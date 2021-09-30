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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/list', 'usersController@index');

Route::middleware('auth')->prefix('tasks')->group(function() {
    Route::get('list', 'TaskController@index');
    Route::get('create', 'TaskController@create');
    Route::post('save', 'TaskController@store');
});
