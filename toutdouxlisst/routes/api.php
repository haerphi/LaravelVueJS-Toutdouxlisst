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

Route::post('/user/register', 'UserController@register');



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