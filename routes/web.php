<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login','Web\LoginController@login');
Route::post('loginadd','Web\LoginController@loginadd');

Route::get('reg','Web\RegController@reg');
Route::post('regadd','Web\RegController@regadd');
