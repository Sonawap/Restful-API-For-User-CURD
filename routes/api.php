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

Route::middleware('auth.basic')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'user', 'middleware'=> 'auth.basic'], function() {

    Route::delete('{id}', 'API\UserController@destroy');

    Route::get('allUsers', 'API\UserController@index');

    Route::get('{id}', 'API\UserController@show');

    Route::put('{id}', 'API\UserController@update');

});


Route::group(['prefix' => 'user'], function() {

    Route::post('login', 'API\UserController@login');

    Route::post('register', 'API\UserController@store');
});
