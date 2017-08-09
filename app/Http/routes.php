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

Route::get('/', [
   'as' => 'index', 'uses' => 'HomeController@index'
 ]);
// Route::get('register', [
//    'as' => 'register', 'uses' => 'SimpleauthController@register'
//  ]);
//
// Route::post('post-registration', 'SimpleauthController@doRegister');
//
// Route::get('/registration/activate/{code}', [
//  'as' => 'activate', 'uses' => 'SimpleauthController@activate'
//  ]);
//
//  Route::post('/login', [
//  'as' => 'login', 'uses' => 'SimpleauthController@login'
//  ]);
// Route::get('logout', [
//  'as' => 'logout', 'uses' => 'SimpleauthController@logout'
//  ]);


Route::get('register', 'RegisterController@getRegister');
Route::post('postRegister', 'RegisterController@postRegister');

Route::get('login', 'LoginController@getLogin');
Route::post('postLogin', 'LoginController@postLogin');

Route::get('admin/logout', function(){
   Auth::logout();
   return 'sukses logout';
});

Route::get('pageAksesKhusus', function(){
  return view ('pageAksesKhusus');
});

Route::get('delete', 'AdminController@delete');
Route::get('update', 'AdminController@update');

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');




// // Route::get('/admin', function () {
// //     return view('dashboard');
// // });

Route::group(['admin' => ['siswa']], function() {
	Route::get('admin/siswa', 'SiswaController@index');
    Route::get('admin/siswa/test', 'SiswaController@test');
    Route::get('admin/siswa/detail/{id}', 'SiswaController@detail');
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
    Route::get('admin/tahun_akademik', 'KonfigTahunAkademikController@index');
    Route::post('admin/tahun_akademik', 'KonfigTahunAkademikController@add');
    Route::get('admin/tahun_akademik/view', 'KonfigTahunAkademikController@view');
    Route::post('admin/tahun_akademik/update', 'KonfigTahunAkademikController@update');
    Route::post('admin/tahun_akademik/delete', 'KonfigTahunAkademikController@delete');

 });

Route::group(['admin' => ['kurikulum']], function() {
    Route::get('admin/kurikulum', 'KurikulumController@index');
    Route::post('admin/kurikulum', 'KurikulumController@add');
    Route::post('admin/kurikulum/rincian', 'KurikulumController@addRincian');
    Route::get('admin/kurikulum/view', 'KurikulumController@view');
    Route::post('admin/kurikulum/update', 'KurikulumController@update');
    Route::post('admin/kurikulum/delete', 'KurikulumController@delete');
    Route::get('admin/kurikulum/rincian/{id}', 'KurikulumController@rincianKurikulum');
    Route::get('admin/kurikulum/get_daftar_mapel', 'KurikulumController@get_daftar_mapel');

 });

Route::group(['admin' => ['rombel']], function() {
    Route::get('admin/rombel', 'rombelController@index');
    Route::post('admin/rombel', 'rombelController@add');
    Route::get('admin/rombel/view', 'rombelController@view');
    Route::post('admin/rombel/update', 'rombelController@update');
    Route::post('admin/rombel/delete', 'rombelController@delete');

 });

Route::group(['admin' => ['jadwal']], function() {
    Route::get('admin/jadwal', 'JadwalController@index');
    Route::post('admin/jadwal', 'JadwalController@add');
    Route::get('admin/jadwal/view', 'JadwalController@view');
    Route::post('admin/jadwal/update', 'JadwalController@update');
    Route::post('admin/jadwal/delete', 'JadwalController@delete');
    Route::get('admin/jadwal/get_rombel', 'JadwalController@get_rombel');
    Route::post('admin/jadwal/generate', 'JadwalController@generate');

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
