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

Route::delete('/kategori/{id}', [DataKategoriController::class, 'destroy'])->name('hapus_kategori');
Route::delete('/anggota/{id}', [DataAnggotaController::class, 'destroy'])->name('hapus_anggota');
Route::delete('/buku/{id}', [DataBukuController::class, 'destroy'])->name('hapus_buku');

Route::get('/kategori/{id}/edit', [DataKategoriController::class, 'edit'])->name('edit_kategori');
Route::put('/kategori/{id}', [DataKategoriController::class, 'update'])->name('update_kategori');
Route::get('/anggota/{id}/edit', [DataAnggotaController::class, 'edit'])->name('edit_anggota');
Route::put('/anggota/{id}', [DataAnggotaController::class, 'update'])->name('update_anggota');
Route::get('/buku/{id}/edit', [DataBukuController::class, 'edit'])->name('edit_buku');
Route::put('/buku/{id}', [DataBukuController::class, 'update'])->name('update_buku');


