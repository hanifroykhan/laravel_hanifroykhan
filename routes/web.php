<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;
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
    return view('auth.login');
});

Auth::routes();

// Rumah Sakit
Route::get('/indexRS', [RumahSakitController::class, 'index'])->name('indexRS');
Route::get('/createRS', [RumahSakitController::class, 'create'])->name('createRS');
Route::post('/storeRS', [RumahSakitController::class, 'store'])->name('storeRS');
Route::get('/RS/{rumahSakit}/edit', [RumahSakitController::class, 'edit'])->name('editRS');
Route::put('/RS/{rumahSakit}', [RumahSakitController::class, 'update'])->name('updateRS');
Route::delete('/RS/{rumahSakit}/delete', [RumahSakitController::class, 'destroy'])->name('deleteRS');

// Pasien
Route::get('/indexPasien', [PasienController::class, 'index'])->name('indexPasien');
Route::get('/createPasien', [PasienController::class, 'create'])->name('createPasien');
Route::post('/storePasien', [PasienController::class, 'store'])->name('storePasien');
Route::get('/Pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('editPasien');
Route::put('/Pasien/{pasien}', [PasienController::class, 'update'])->name('updatePasien');
Route::delete('/Pasien/{pasien}/delete', [PasienController::class, 'destroy'])->name('deletePasien');
