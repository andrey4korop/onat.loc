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
use Illuminate\Http\Request;

/**
 * Аутеризация, главная страница
 */
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('login', function (){
    return redirect('/');
});
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('register', 'Auth\AuthController@postRegister');
Auth::routes();


/**
 * Закрытый раздел
 */
Route::get('home', ['middleware' => 'auth', function (Request $request){
    if($request->user()->roles->where('permission', 'Student')->count()){
        return redirect(route('studentHome'));
    }
    if($request->user()->roles->where('permission', 'Administrator')->count()){

    }
    $roles = $request->user()->roles;
    $menu = [];
    foreach ($roles as $role){

        foreach ($role->leftMenu as $menuForRole){
            $menu[] = $menuForRole;
        }
    }
    $data['menus'] = $menu;
    //if($request->user()->roles)
    return view('main', $data);
}]);
/**
 * Штат
 */
Route::group(['prefix' => 'shtat', 'middleware' => 'auth'], function()
{
    Route::get('/', 'HomeController@index')->name('home');
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
    Route::get('addSubject', 'HomeController@addSubject')->name('addSubject');
    Route::get('deleteSubject', 'HomeController@deleteSubject')->name('deleteSubject');
    Route::post('deleteSubject/{id}', 'HomeController@delSubject')->name('delSubject');
    Route::post('saveSubject','HomeController@saveSubject')->name('saveSubject');
});
/**
 * Справки
 */
Route::group(['prefix' => 'spravki', 'middleware' => 'auth'], function() {

    Route::get('/', 'SpravkiController@personal')->name('spravki');
    Route::get('/{id}', 'SpravkiController@index')->name('spravka');
    Route::post('/{id}', 'SpravkiController@setStatus')->name('setStatus');
    Route::get('students', 'SpravkiController@students')->name('students');
    Route::get('student/{id}', 'SpravkiController@student')->name('student');


});
Route::group(['prefix' => 'student', 'middleware' => 'auth'],function (){
    Route::get('/','StudentController@index')->name('studentHome');
    Route::get('getspravka','StudentController@getSpravka')->name('getSpravka');
    Route::get('myarhive','StudentController@myArhive')->name('myArhive');
    Route::post('send_spravka', 'StudentController@send')->name('send_spravka');
});

Route::group(['prefix' => 'group', 'middleware' => 'auth'],function (){
    Route::get('/','GroupController@index')->name('group');
    Route::post('getGroupAjax', 'GroupController@getGroup')->name('getGroupAjax');
    Route::post('saveGroupAjax', 'GroupController@saveGroup')->name('saveGroupAjax');
    Route::post('addGroup', 'GroupController@addGroup')->name('newGroup');

});

Route::group(['prefix' => 'bookkeeping', 'middleware' => 'auth'],function (){
    Route::get('/','BookkeepingController@index')->name('bookkeeping');
    Route::post('getGroupBookkeepingAjax', 'BookkeepingController@getGroupBookkeeping')->name('getGroupBookkeepingAjax');


});
Route::group(['prefix' => 'zurnal', 'middleware' => 'auth'],function (){
    Route::get('/','ZurnalController@index')->name('zurnal');
    Route::post('/getGroupForZurnal','ZurnalController@getGroup')->name('getGroupForZurnal');
    Route::post('/pdfZurnal','ZurnalController@pdf')->name('pdfZurnal');
    Route::post('/saveZurnal','ZurnalController@saveZurnal')->name('saveZurnal');



});