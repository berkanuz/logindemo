<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\User\UserController@getUser');
Route::middleware('auth:sanctum')->post('/user/{id}', 'App\Http\Controllers\User\UserController@updateUser');
Route::middleware('auth:sanctum')->post('/user/{id}', 'App\Http\Controllers\User\UserController@updatePassword');

Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
