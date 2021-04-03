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

//Route Untuk Menampilkan View Tambah Siswa dan Data SIswa
Route::get('/tambahsiswa','SiswaController@TambahSiswa');
//Route Untuk Menyimpan Data Siswa Dari Inputan
Route::post('/simpan','SiswaController@SimpanDataSiswa');
//Route Untuk Menampilkan View Tambah Detail Siswa
Route::get('/tambahdetail/{id}','SiswaController@TambahDetail');
//Route Untuk Menyimpan Detail dari inputan detail di route atas
Route::post('/tambahdetail/{id}','SiswaController@SimpanDetail');

//Route Untuk Menampilkan Semua Data yang sudah di Joinkan melalui
//Controller dengan function Biodata
Route::get('/biodata','SiswaController@Biodata');
