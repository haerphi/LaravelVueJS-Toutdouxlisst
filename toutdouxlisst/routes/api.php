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

/*----- login ----- */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
});






/* ------ TODO ------ */
//route to store a todo
Route::post('/todo/store', 'TodoController@store');
//route to delete a todo by his id
Route::delete('/todo/delete/{id}', 'TodoController@delete');
//route to get all todos
Route::get('/todos/{idUser}', 'TodoController@index');
//route to get one specific todo
Route::get('/todo/edit/{id}', 'TodoController@edit');
//route to update a todo
Route::post('/todo/update/{id}', 'TodoController@update');

/* ------ TASK ----- */
//route to get all task from a todo
Route::get('/tasks/{idTodo}', 'TaskController@index');
//route to store a task
Route::post('/task/store', 'TaskController@store');
//route to update a task
Route::post('/task/update/{id}', 'TaskController@update');
//route to delete a task
Route::delete('/task/delete/{id}', 'TaskController@delete');