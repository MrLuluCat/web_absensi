<?php

use App\Http\Middleware\isGuest;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\presensiCalasController;
use App\Http\Controllers\presensiAsistenController;

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
    return redirect()->to('/dashboard');
});
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('component/dashboard');
// });

// DashboardController
Route::resource('dashboard', DashboardController::class);

// mahasiswaController
Route::resource('mahasiswa', mahasiswaController::class)->middleware(isLogin::class);

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
route::get('/session', [SessionController::class, 'index'])->middleware(isGuest::class);
route::post('/session/login', [SessionController::class, 'login']);
route::get('/session/logout', [SessionController::class, 'logout']);
// sessionRegisterUsers
route::get('/session/register', [SessionController::class, 'register']);
route::post('/session/create', [SessionController::class, 'create']);

// Cetak Laporan Controller 
// Route::resource('/laporan', CetakLaporanController::class)->middleware('isLogin');
// Route::get('/laporan/cetak', [CetakLaporanController::class, 'cetak]'])->middleware('isLogin');

// about
Route::get('/about', function () {
    return view('component/about');
});
