<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\ReservasiController;
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

Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/add', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::post('update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::post('delete/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');
Route::get('/caripelanggan', [PelangganController::class, 'caripelanggan'])->name('pelanggan.cari');
Route::post('/pelanggan/softdelete/{id}', [PelangganController::class, 'softDelete'])->name('pelanggan.softdelete');
Route::get('/pelanggan/restore{id}', [PelangganController::class, 'restore'])->name('pelanggan.restore');
Route::get('/pelanggan/bin', [PelangganController::class, 'Pelangganbin'])->name('pelanggan.bin');
// Route::get('/pelanggan/bin', [ReservasiController::class, 'Reservasibin'])->name('pelanggan.bin');


Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');
Route::get('/meja/add', [MejaController::class, 'create'])->name('meja.create');
Route::post('/meja/store', [MejaController::class, 'store'])->name('meja.store');
Route::get('/meja/edit/{id}', [MejaController::class, 'edit'])->name('meja.edit');
Route::post('/meja/update/{id}', [MejaController::class, 'update'])->name('meja.update');
Route::post('meja/delete/{id}', [MejaController::class, 'delete'])->name('meja.delete');


Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::get('/reservasi/add', [ReservasiController::class, 'create'])->name('reservasi.create');
Route::post('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/reservasi/edit/{id}', [ReservasiController::class, 'edit'])->name('reservasi.edit');
Route::post('/reservasi/update/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
Route::post('reservasi/delete/{id}', [ReservasiController::class, 'delete'])->name('reservasi.delete');
