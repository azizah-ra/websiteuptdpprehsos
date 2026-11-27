<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'beranda')->name('beranda');
Route::view('/profil', 'profil')->name('profil');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/informasi', 'informasi')->name('informasi');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/kontak', 'kontak')->name('kontak');
