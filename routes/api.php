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
Route::middleware('auth:api')->get('/donor/donation', 'App\Http\Controllers\HomeController@bloodDonation')->name('bloodDonation');
Route::post('/login', 'App\Http\Controllers\HomeController@loginApi')->name('loginApi');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

