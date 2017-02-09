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

Route::get('home', 'HomeController@index')->name('home');
Route::get('table', 'HomeController@table')->name('table');
Route::post('table/{id?}', 'HomeController@tableedit')->name('tableedit');
Route::post('save','HomeController@saveTable')->name('save');
Route::post('mail/{id?}','HomeController@mail')->name('mail');
Route::get('excel/{id?}','HomeController@excel')->name('excel');
Route::get('open/{id}','HomeController@open')->name('open');
Route::get('pdf/{id?}','HomeController@pdf')->name('pdf');
Route::post('del/{id?}','HomeController@del')->name('del');
Route::get('editnorms','HomeController@editnorms')->name('editnorms');
Route::post('editnorms','HomeController@savenorm')->name('savenorm');
Route::post('help','HomeController@help')->name('send_help');
Route::get('arhive', 'HomeController@arhive')->name('arhive');

