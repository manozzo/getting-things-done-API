<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function() {
    Route::get('list', 'Api\UserApiController@list');
    Route::post('create', 'Api\UserApiController@create');
    Route::delete('delete/{id}', 'Api\UserApiController@delete');
});

Route::prefix('task')->group(function() {
    Route::get('/{id}', 'Api\TasksApiController@listById');
    Route::post('/save', 'Api\TasksApiController@createTask');
    Route::post('/edit/{id}', 'Api\TasksApiController@editTask');
    Route::delete('/delete/{id}', 'Api\TasksApiController@delete');
    Route::post('/toggle/{id}', 'Api\TasksApiController@toggleCompleteTask');
});

Route::prefix('tasks')->group(function() {
    Route::get('/{created_date}','Api\TasksApiController@listByCreatedDate');
});
