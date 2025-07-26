<?php

use App\Http\Controllers\adminDashbord;
use App\Http\Controllers\BeritaPageContrller;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramPageContrller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/', HomeController::class);
Route::get('/tentang', [ProfilController::class, 'visiMisi']);
Route::get('/fasilitas-page', [FasilitasController::class, 'index']);
Route::get('/galeri-page', [FasilitasController::class, 'galeri']);
Route::get('/admin-page', [adminDashbord::class, 'index']);
Route::get('/berita-page', [BeritaPageContrller::class, 'index'])->name('berita.index');
Route::get('/berita-page/detail/{id}', [BeritaPageContrller::class, 'detailBerita'])->name('berita.detail');
//program
Route::get('/program/tahfidz', [ProgramPageContrller::class, 'tahfidz']);
Route::get('/program/extra', [ProgramPageContrller::class, 'extra']);
Route::get('/program/spm', [ProgramPageContrller::class, 'spm']);
Route::get('/program/kurikulum', [ProgramPageContrller::class, 'kurikulum']);
Route::get('/program/jadwal', [ProgramPageContrller::class, 'jadwal']);
Route::get('/program/sistem', [ProgramPageContrller::class, 'sistem']);


//admin dan pendaftaran
Route::get('/pendaftaran', function () {
    return view('pendaftaran');
});

Route::get('/berita-admin', function () {
    return view('admin-berita.berita');
});
Route::get('/fasilitas-admin', function () {
    return view('admin-fasilitas.fasilitas');
});
Route::get('/program/extra-admin', function () {
    return view('admin-program.extra');
});
Route::get('/program/spm-admin', function () {
    return view('admin-program.admin-spm');
});
Route::get('/login-admin', function () {
    return view('admin-login.login');
});
Route::get('/admin-siswa', function () {
    return view('admin-siswa.calon');
});
