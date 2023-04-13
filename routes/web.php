<?php

use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\presensiController;
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

// To mahasiswaController
Route::resource('mahasiswa', mahasiswaController::class);
Route::resource('presensi', presensiController::class);

// Route::get('/mahasiswa', function () {
//     return view('mahasiswa_crud.index');
// });

// To about
Route::get('about', function () {
    return view('layouts/about');
});