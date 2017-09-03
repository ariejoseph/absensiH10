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
	Route::resource('jemaat', 'JemaatController');
	Route::get('/jemaat', 'JemaatController@index');
	Route::get('/jemaat/{id}', 'JemaatController@show');

	Route::resource('kelompok', 'KelompokController');
	Route::get('/anggota/create/{id_kelompok}', 'KelompokController@newMember');
	Route::post('/anggota/daftar/{id_kelompok}', 'KelompokController@daftar');
	Route::post('/anggota/hapus/{id_kelompok}/{id_jemaat}', 'KelompokController@hapus');

	Route::resource('sidang', 'SidangController');
	Route::get('/sidang', 'SidangController@index')->name('sidang');

	Route::get('/absensi', 'SidangController@index')->name('absensi');
	Route::get('/absensi/{sidang}', 'AbsensiController@index');
	Route::get('/absensi/{sidang}/{id}', 'AbsensiController@absen');
	Route::post('/absensi2/', 'AbsensiController@absen2');

	Route::get('/hadir', 'SidangController@index')->name('hadir');
	Route::post('/daftarHadir', 'AbsensiController@getDaftarHadir');
});

Route::auth();

Route::get('/home', 'HomeController@index');
