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

Route::get('/', 'PageController@index');
Route::get('/home', 'PageController@index')->name('home');
Route::get('ordernow', 'PageController@order');
Route::get('loadzipcode', 'ZipcodeController@loadZipcode');
Auth::routes();
Route::get('register', 'PageController@index')->name('register');
Route::post('confirm_policy' , 'OrderController@policy');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'OrderController@index');
    Route::resource('zipcode', 'ZipcodeController');
    Route::resource('order', 'OrderController');
});

