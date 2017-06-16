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

Route::group(['admin' => ['guru']], function() {
    Route::get('admin/guru', 'GuruController@index');
    Route::post('admin/guru', 'GuruController@add');
    Route::get('admin/guru/view', 'GuruController@view');
    Route::post('admin/guru/update', 'GuruController@update');
    Route::post('admin/guru/delete', 'GuruController@delete');
    
 });

Route::group(['admin' => ['mapel']], function() {
    Route::get('admin/mapel', 'MapelController@index');
    Route::post('admin/mapel', 'MapelController@add');
    Route::get('admin/mapel/view', 'MapelController@view');
    Route::post('admin/mapel/update', 'MapelController@update');
    Route::post('admin/mapel/delete', 'MapelController@delete');
    
 });

Route::group(['admin' => ['ruang']], function() {
    Route::get('admin/ruang', 'RuangController@index');
    Route::post('admin/ruang', 'RuangController@add');
    Route::get('admin/ruang/view', 'RuangController@view');
    Route::post('admin/ruang/update', 'RuangController@update');
    Route::post('admin/ruang/delete', 'RuangController@delete');
    
 });

Route::group(['admin' => ['prodi']], function() {
    Route::get('admin/prodi', 'ProdiController@index');
    Route::post('admin/prodi', 'ProdiController@add');
    Route::get('admin/prodi/view', 'ProdiController@view');
    Route::post('admin/prodi/update', 'ProdiController@update');
    Route::post('admin/prodi/delete', 'ProdiController@delete');
    
 });

Route::group(['admin' => ['konfigTahunAkademik']], function() {
    Route::get('admin/konfigTahunAkademik', 'KonfigTahunAkademikController@index');
    Route::post('admin/konfigTahunAkademik', 'KonfigTahunAkademikController@add');
    Route::get('admin/konfigTahunAkademik/view', 'KonfigTahunAkademikController@view');
    Route::post('admin/konfigTahunAkademik/update', 'KonfigTahunAkademikController@update');
    Route::post('admin/konfigTahunAkademik/delete', 'KonfigTahunAkademikController@delete');
    
 });

Route::group(['admin' => ['kurikulum']], function() {
    Route::get('admin/kurikulum', 'KurikulumController@index');
    Route::post('admin/kurikulum', 'KurikulumController@add');
    Route::get('admin/kurikulum/view', 'KurikulumController@view');
    Route::post('admin/kurikulum/update', 'KurikulumController@update');
    Route::post('admin/kurikulum/delete', 'KurikulumController@delete');
    
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