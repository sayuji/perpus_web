<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\DataKategoriController;
use App\Http\Controllers\FavoriteBookController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('/reset', function () {
        return view('reset_password');
    })->name('reset_password');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/detail/{buku}', [DataBukuController::class, 'detail'])->name('detail');
    Route::get('/favorite-books', [FavoriteBookController::class, 'index'])->name('favorite.books');
    Route::get('/favorite-books/add/{id}', [FavoriteBookController::class, 'addFavorite'])->name('favorite.books.add');
    Route::get('/favorite-books/remove/{id}', [FavoriteBookController::class, 'removeFavorite'])->name('favorite.books.remove');

    Route::get('/data_buku', [DataBukuController::class, 'buku'])->name('data_buku');
    Route::get('/data_anggota', [DataAnggotaController::class, 'data'])->name('data_anggota');
    Route::get('/data_kategori', [DataKategoriController::class, 'kategori'])->name('data_kategori');
    Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman'])->name('peminjaman');

    Route::get('/pengembalian', [PengembalianController::class, 'pengembalian'])->name('pengembalian');
    Route::get('/siswa', [SiswaController::class, 'siswa'])->name('siswa');
    Route::get('/peminjaman_siswa', [PeminjamanController::class, 'peminjaman_siswa'])->name('peminjaman_siswa');

    Route::post('/tambah_kategori', [DataKategoriController::class, 'tambah_kategori'])->name('tambah_kategori');
    Route::post('/tambah_anggota', [DataAnggotaController::class, 'tambah_anggota'])->name('tambah_anggota');
    Route::post('/tambah_buku', [DataBukuController::class, 'tambah_buku'])->name('tambah_buku');
    Route::post('/ajukan_peminjaman', [PeminjamanController::class, 'ajukan_peminjaman'])->name('ajukan_peminjaman');

    Route::delete('/kategori/{id}', [DataKategoriController::class, 'destroy'])->name('hapus_kategori');
    Route::delete('/anggota/{id}', [DataAnggotaController::class, 'destroy'])->name('hapus_anggota');
    Route::delete('/buku/{id}', [DataBukuController::class, 'destroy'])->name('hapus_buku');

    Route::get('/kategori/{id}/edit', [DataKategoriController::class, 'edit'])->name('edit_kategori');
    Route::put('/kategori/{id}', [DataKategoriController::class, 'update'])->name('update_kategori');
    Route::get('/anggota/{id}/edit', [DataAnggotaController::class, 'edit'])->name('edit_anggota');
    Route::put('/anggota/{id}', [DataAnggotaController::class, 'update'])->name('update_anggota');
    Route::get('/buku/{id}/edit', [DataBukuController::class, 'edit'])->name('edit_buku');
    Route::put('/buku/{id}', [DataBukuController::class, 'update'])->name('update_buku');

    Route::post('/submit-review', [PengembalianController::class, 'submitReview'])->name('submit.review');

    Route::get('/approve_peminjaman/{id}', [PeminjamanController::class, 'approve_peminjaman'])->name('approve_peminjaman');
    Route::get('/pengembalian/{id}', [PeminjamanController::class, 'pengembalian'])->name('peminjaman_pengembalian');
});
