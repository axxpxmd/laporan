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

Route::get('periode', 'PeriodeController@index')->name('periode');
Route::get('generate-periode/{bulan}', 'PeriodeController@generateTanggal')->name('generatePeriode');
Route::get('libur/{id}', 'PeriodeController@libur')->name('periodeLibur');
Route::get('batalkan-libur/{id}', 'PeriodeController@batalkanLibur')->name('periodeBatalkanLibur');
