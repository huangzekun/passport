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

Route::any('login','Web\LoginController@login');
Route::any('loginadd','Web\LoginController@loginadd');

Route::any('reg','Web\RegController@reg');
Route::any('regadd','Web\RegController@regadd');

Route::any('login1','Web\LoginController@login1');
Route::any('quit','Web\LoginController@quit');
