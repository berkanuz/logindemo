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



Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::middleware('auth:sanctum')->post('/logout', 'App\Http\Controllers\Auth\LoginController@logout');


Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::get('/user', 'App\Http\Controllers\User\UserController@getUser');
	Route::post('/user/update-name/{id}', 'App\Http\Controllers\User\UserController@updateName');
	Route::post('/user/update-password/{id}', 'App\Http\Controllers\User\UserController@updatePassword');

	//Route::get('/denemeGetUser', 'App\Http\Controllers\User\UserController@deneme');
});
Route::middleware('auth:sanctum')->get('/requestDemo', 'App\Http\Controllers\User\UserController@guzzleRequest');