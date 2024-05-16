<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/perpustakaan', function () {
    return view('perpustakaan');
})->name('perpustakaan');

Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan');
