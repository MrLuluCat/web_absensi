<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\presensiAsistenController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\presensiCalasController;

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

// default
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts/dashboard');
});

// mahasiswaController
Route::resource('mahasiswa', mahasiswaController::class);

// presensiAsistenController
Route::resource('presensi_asisten', presensiAsistenController::class);
Route::get('/presensi_asisten/edit/{idPresensi}/{idNIM}', [presensiAsistenController::class, 'edit'])->name('presensi_asisten.edit');
Route::put('/presensi_asisten/{idPresensi}/{idNIM}', [presensiAsistenController::class, 'update'])->name('presensi_asisten.update');
Route::delete('/presensi_asisten/{idPresensi}/{idNIM}', [presensiAsistenController::class, 'destroy'])->name('presensi_asisten.destroy');

// presensiCalasController
Route::resource('presensi_calas', presensiCalasController::class);
Route::get('/presensi_calas/edit/{idPresensi}/{idNIM}', [presensiCalasController::class, 'edit'])->name('presensi_calas.edit');
Route::put('/presensi_calas/{idPresensi}/{idNIM}', [presensiCalasController::class, 'update'])->name('presensi_calas.update');
Route::delete('/presensi_calas/{idPresensi}/{idNIM}', [presensiCalasController::class, 'destroy'])->name('presensi_calas.destroy');

// Session
route::get('/session',[SessionController::class, 'index']);
route::post('/session/login',[SessionController::class, 'login']);


// about
Route::get('/about', function () {
    return view('layouts/about');
});