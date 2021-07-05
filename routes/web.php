<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', 'App\Http\Controllers\BloodTypeController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\BloodTypeController@index')->name('home');
Route::resource('/donor','App\Http\Controllers\DonorController')->middleware('auth')->parameters([
    'donor' => 'donorID',
]);
Route::resource('/recipient','App\Http\Controllers\RecipientController')->middleware('auth')->parameters([
    'recipient' => 'recipientsID',
]);
Route::resource('/medicalPersonnel','App\Http\Controllers\MedicalPersonnelController')->middleware('auth')->parameters([
    'medicalPersonnel' => 'empID',
]);
Route::resource('/bloodDonation','App\Http\Controllers\BloodDonationController')->middleware('auth')->parameters([
    'bloodDonation' => 'bloodID',
]);
Route::resource('/bloodTransaction','App\Http\Controllers\BloodTransactionController')->middleware('auth')->parameters([
    'bloodTransaction' => 'transactID',
]);

