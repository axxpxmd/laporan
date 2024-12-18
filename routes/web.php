<?php

use Illuminate\Support\Facades\Route;

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

Route::get('laporan', 'LaporanController@index')->name('laporan');
Route::get('create-laporan/{bulan}', 'LaporanController@create')->name('createLaporan');

Route::get('deskripsi', 'DeskripsiController@index')->name('deskripsi.index');
Route::get('deskripsi/edit/{id}', 'DeskripsiController@edit')->name('deskripsi.edit');
Route::post('deskripsi/update/{id}', 'DeskripsiController@update')->name('deskripsi.update');
Route::post('deskripsi/store', 'DeskripsiController@store')->name('deskripsi.store');
Route::get('deskripsi/delete/{id}', 'DeskripsiController@destroy')->name('deskripsi.destroy');

Route::get('periode', 'PeriodeController@index')->name('periode');
Route::get('generate-periode/{bulan}', 'PeriodeController@generateTanggal')->name('generatePeriode');
Route::get('libur/{id}', 'PeriodeController@libur')->name('periodeLibur');
Route::get('batalkan-libur/{id}', 'PeriodeController@batalkanLibur')->name('periodeBatalkanLibur');

Route::get('1.51', 'ChudaiController@index')->name('1.51');
Route::get('1.51/create', 'ChudaiController@create')->name('1.51.create');
Route::post('1.51/store', 'ChudaiController@store')->name('1.51.store');
Route::get('1.51/edit/{id}', 'ChudaiController@edit')->name('1.51.edit');
Route::post('1.51/update/{id}', 'ChudaiController@update')->name('1.51.update');
Route::get('1.51/delete/{id}', 'ChudaiController@destroy')->name('1.51.destroy');
