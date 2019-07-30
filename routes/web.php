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

Route::get('/home', function () {
    return view('layout.app');
});

// Route::resource('/barang', 'barangController');

Route::group(['middleware' => 'auth'], function() {
	Route::resource('/pelanggan', 'pelangganController');
	Route::resource('/jenis_kendaraan', 'jenis_kendaraanController');
	Route::resource('/kendaraan', 'kendaraanController');
	Route::resource('/karyawan', 'karyawanController');
	Route::resource('/penyewaan', 'penyewaanController');
	Route::resource('/penyewaan_detail', 'penyewaan_detailController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
