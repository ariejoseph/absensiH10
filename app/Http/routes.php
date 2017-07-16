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

// Route::get('/jemaat', 'JemaatController@index');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/jemaat', 'JemaatController@index');
	Route::get('/absensi', 'AbsensiController@index');
	Route::get('/absensi/{id}/{sidang}', 'AbsensiController@absen');
	Route::get('/sidang', 'AbsensiController@getDaftarHadir');
});

// Route::get('/absensi', 'AbsensiController@index');
// Route::get('/absensi/{id}/{sidang}', 'AbsensiController@absen');
// Route::get('/sidang', 'AbsensiController@getDaftarHadir');

Route::auth();

Route::get('/home', 'HomeController@index');
