<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});


// // Route::get('/admin', function () {
// //     return view('dashboard');
// // });

Route::group(['admin' => ['siswa']], function() {
	Route::get('admin/siswa', 'SiswaController@index');
    Route::post('admin/siswa', 'SiswaController@add');
    Route::get('admin/siswa/view', 'SiswaController@view');
    Route::post('admin/siswa/update', 'SiswaController@update');
    Route::post('admin/siswa/delete', 'SiswaController@delete');
	
 });
// // 
//     Route::get('siswa', 'SiswaController@index');
//     Route::post('siswa', 'SiswaController@add');
//     Route::get('siswa/view', 'SiswaController@view');
//     Route::post('siswa/update', 'SiswaController@update');
//     Route::post('siswa/delete', 'SiswaController@delete');

    

    Route::get('student', 'StudentController@index');
    Route::post('student', 'StudentController@add');
    Route::get('student/view', 'StudentController@view');
    Route::post('student/update', 'StudentController@update');
    Route::post('student/delete', 'StudentController@delete');