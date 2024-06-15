<?php

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('buku')->group(function () {
    Route::get('/', function () {
        return Buku::all();
    });
});

Route::prefix('peminjaman')->group(function () {
    Route::get('/', function () {
        return Peminjaman::all();
    });
});

Route::prefix('kategori')->group(function () {
    Route::get('/', function () {
        return Kategori::all();
    });
});


