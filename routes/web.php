<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PenggunaController;

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

Route::middleware('guest')->group(function() {
    Route::get('/', function () {
        return view('index');
    });
    
    Route::resource('/login', LoginController::class)->only(['index', 'store']);
    Route::resource('/register', RegisterController::class)->only(['index', 'store']);
});


Route::middleware('auth')->group(function() {
    Route::get('/home', HomeController::class)->name('home');
    
    Route::resource('/pengguna', PenggunaController::class);

    Route::get('/pengguna/show', function () {
        return view('show');
    })->name('show');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::get('/provinsi', ProvinsiController::class)->name('provinsi');
Route::get('/kota', KotaController::class)->name('kota');
Route::get('/kecamatan', KecamatanController::class)->name('kecamatan');
