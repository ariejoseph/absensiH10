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

Route::group(['middleware' => 'auth'], function () {
	Route::get('/absensi', 'SidangController@index')->name('absensi');
	Route::get('/absensi/{sidang}', 'AbsensiController@index');
	Route::get('/absensi/{sidang}/{id}', 'AbsensiController@absen');
	Route::post('/absensi2/', 'AbsensiController@absen2');

	Route::get('/hadir', 'SidangController@index')->name('hadir');
	Route::post('/daftarHadir', 'AbsensiController@getDaftarHadir');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('jemaat/upload', 'JemaatController@upload')->name('upload');
	Route::resource('jemaat', 'JemaatController');
	Route::get('anak', 'JemaatController@index')->name('anak');
	Route::get('remaja', 'JemaatController@index')->name('remaja');
	Route::get('pemuda', 'JemaatController@index')->name('pemuda');
	Route::get('anak/create', 'JemaatController@create')->name('regisAnak');
	Route::get('remaja/create', 'JemaatController@create')->name('regisRemaja');
	Route::get('pemuda/create', 'JemaatController@create')->name('regisPemuda');
	Route::post('anak/save', 'JemaatController@store')->name('saveAnak');
	Route::post('remaja/save', 'JemaatController@store')->name('saveRemaja');
	Route::post('pemuda/save', 'JemaatController@store')->name('savePemuda');
	Route::get('anak/{id}', 'JemaatController@show')->name('showAnak');
	Route::get('remaja/{id}', 'JemaatController@show')->name('showRemaja');
	Route::get('pemuda/{id}', 'JemaatController@show')->name('showPemuda');
	Route::get('anak/{id}', 'JemaatController@show')->name('showAnak');
	Route::get('remaja/{id}', 'JemaatController@show')->name('showRemaja');
	Route::get('pemuda/{id}', 'JemaatController@show')->name('showPemuda');
	Route::get('anak/{id}/edit', 'JemaatController@edit')->name('editAnak');
	Route::get('remaja/{id}/edit', 'JemaatController@edit')->name('editRemaja');
	Route::get('pemuda/{id}/edit', 'JemaatController@edit')->name('editPemuda');
	Route::put('anak/{id}', 'JemaatController@update')->name('updateAnak');
	Route::put('remaja/{id}', 'JemaatController@update')->name('updateRemaja');
	Route::put('pemuda/{id}', 'JemaatController@update')->name('updatePemuda');
	Route::get('anak/search/{keyword}', 'JemaatController@search')->name('searchAnak');
	Route::get('remaja/search/{keyword}', 'JemaatController@search')->name('searchRemaja');
	Route::get('pemuda/search/{keyword}', 'JemaatController@search')->name('searchPemuda');
	Route::get('jemaat/search/{keyword}', 'JemaatController@search')->name('search');
	Route::get('anak/upload', 'JemaatController@upload')->name('uploadAnak');
	Route::get('remaja/upload', 'JemaatController@upload')->name('uploadRemaja');
	Route::get('pemuda/upload', 'JemaatController@upload')->name('uploadPemuda');
	Route::post('uploadfile', 'JemaatController@populate');

	Route::resource('kelompok', 'KelompokController');
	Route::get('kelompok/create/{sidang}', 'KelompokController@create');
	Route::get('kelompok/sidang/{sidang}', 'KelompokController@index2');
	Route::get('/anggota/create/{id_kelompok}', 'KelompokController@newMember');
	Route::post('/anggota/daftar/{id_kelompok}', 'KelompokController@daftar');
	Route::post('/anggota/hapus/{id_kelompok}/{id_jemaat}', 'KelompokController@hapus');

	Route::resource('sidang', 'SidangController');

	Route::resource('daftarSidang', 'DaftarSidangController');
	Route::resource('daftarPeran', 'DaftarPeranController');
});

Route::auth();

Route::get('/home', 'HomeController@index');
