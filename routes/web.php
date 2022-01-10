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

//List all phone numbers
Route::get('/', [
    'uses' => 'PhoneController@PhonesCountries'
]);

//Filter the phone numbers
Route::get('filter', [
    'uses' => 'PhoneController@filterPhones',
    'as' => 'filter'
]);