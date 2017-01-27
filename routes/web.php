<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/**
 * Аутеризация, главная страница
 */
Route::get('/', 'Auth\LoginController@showLoginForm');
//Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('auto', 'FirstController@autorization')->name('auto');
Auth::routes();


/**
 * Закрытый раздел
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/table', 'HomeController@table')->name('table');
Route::post('save','HomeController@saveTable')->name('save');

