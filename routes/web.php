<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardKategoriController;
use App\Http\Controllers\DashboardProdiController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect('/login');
})->middleware('auth');

Route::get('/home', function () {
    return view('home');});



Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// untuk search frontend
// Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/prodi', ProdiController::class);
Route::resource('/berita', BeritaController::class);

// Route::resource('/dashboard-mahasiswa', DashboardMahasiswaController::class)->middleware('auth');

Route::resource('/dashboard-dosen', DashboardDosenController::class)->middleware('auth');

Route::resource('/dashboard-user', DashboardUserController::class)->middleware('auth');

Route::resource('/dashboard-prodi', DashboardProdiController::class)->middleware('auth');

Route::resource('/dashboard-kategori', DashboardKategoriController::class)->middleware('auth');

Route::resource('/dashboard-berita', DashboardBeritaController::class)->middleware('auth');

Route::resource('/dashboard-mahasiswa', DashboardMahasiswaController::class)->middleware('auth');

// Route::resource('/dashboard-mahasiswa', DashboardMahasiswaController::class)->middleware('admin');

Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login',[LoginController::class,'authenticate']);

Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'store']);










