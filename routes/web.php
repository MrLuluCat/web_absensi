<?php

use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\presensiController;
use App\Http\Controllers\SessionController;
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

// default
Route::get('/', function () {
    return view('welcome');
});

// mahasiswaController
Route::resource('mahasiswa', mahasiswaController::class);

// presensiController
Route::resource('presensi', presensiController::class);
Route::get('/presensi/edit/{idPresensi}/{idNIM}', [PresensiController::class, 'edit'])->name('presensi.edit');
Route::put('/presensi/{idPresensi}/{idNIM}', [PresensiController::class, 'update'])->name('presensi.update');
Route::delete('/presensi/{idPresensi}/{idNIM}', [PresensiController::class, 'destroy'])->name('presensi.destroy');

// presensiCalasController
// Route::resource('presensi', presensiController::class);
// Route::get('/presensi/edit/{idPresensi}/{idNIM}', [PresensiController::class, 'edit'])->name('presensi.edit');
// Route::put('/presensi/{idPresensi}/{idNIM}', [PresensiController::class, 'update'])->name('presensi.update');
// Route::delete('/presensi/{idPresensi}/{idNIM}', [PresensiController::class, 'destroy'])->name('presensi.destroy');

// Session
route::get('/session',[SessionController::class, 'index']);
route::post('/session/login',[SessionController::class, 'login']);


// about
Route::get('about', function () {
    return view('component/about');
});