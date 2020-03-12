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

Auth::routes();
Route::resource('courts', 'CourtsController');
Route::resource('judges', 'JudgesController');
Route::resource('users', 'UserController');
Route::resource('causelist', 'CauseController');
Route::get('/home', 'HomeController@index')->name('home');
