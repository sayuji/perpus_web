<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\DataKategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/data_buku', [DataBukuController::class, 'buku'])->name('data_buku');
Route::get('/data_anggota', [DataAnggotaController::class, 'data'])->name('data_anggota');
Route::get('/data_kategori', [DataKategoriController::class, 'kategori'])->name('data_kategori');
Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman'])->name('peminjaman');
Route::get('/pengembalian', [PengembalianController::class, 'pengembalian'])->name('pengembalian');

Route::post('/tambah_kategori', [DataKategoriController::class, 'tambah_kategori'])->name('tambah_kategori');
Route::post('/tambah_anggota', [DataAnggotaController::class, 'tambah_anggota'])->name('tambah_anggota');
Route::post('/tambah_buku', [DataBukuController::class, 'tambah_buku'])->name('tambah_buku');




