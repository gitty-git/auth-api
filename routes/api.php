<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', 'UserController@index');
    Route::patch('/user/{user}', 'UserController@update');
    Route::patch('/destroy/user/{user}', 'UserController@destroy');
    Route::patch('/update/password/{user}', 'UpdatePasswordController@update');
});

//Route::middleware('auth:sanctum')->middleware('verified')->group(function () {
//    Route::get('/user', 'UserController@index');
//    Route::put('/user/{user}', 'UserController@update');
//});
