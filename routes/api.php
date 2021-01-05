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

Route::post('register', 'App\Http\Controllers\Api\Auth\RegisterController@register');
Route::post('login', 'App\Http\Controllers\Api\Auth\LoginController@login');
Route::post('refresh', 'App\Http\Controllers\Api\Auth\LoginController@refresh');
Route::get('notificationSTT','App\Http\Controllers\FirebaseController@Notifikasi');
Route::get('/read','App\Http\Controllers\Controller@readEvent');
Route::post('user','App\Http\Controllers\Api\Auth\LoginController@listUser');
Route::post('update/{email}', 'App\Http\Controllers\Api\Auth\LoginController@editProfile');
Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'App\Http\Controllers\Api\Auth\LoginController@logout');
});

Route::get('event', 'App\Http\Controllers\EventController@index');
Route::post('event-show', 'App\Http\Controllers\EventController@show');
Route::post('event/store', 'App\Http\Controllers\EventController@store');
Route::post('event/update', 'App\Http\Controllers\EventController@update');
Route::post('event/delete', 'App\Http\Controllers\EventController@destroy');

Route::get('request', 'App\Http\Controllers\RequestPenggunaController@index');
Route::get('request/{id}', 'App\Http\Controllers\RequestPenggunaController@show');
Route::post('request/store', 'App\Http\Controllers\RequestPenggunaController@store');
Route::post('request/update', 'App\Http\Controllers\RequestPenggunaController@update');
Route::post('request/delete', 'App\Http\Controllers\RequestPenggunaController@destroy');