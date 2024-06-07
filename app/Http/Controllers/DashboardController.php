<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = Buku::with(['get_kategori'])->get();
        $anggota = User::count();
        $buku = Buku::count();
        $pinjam = Peminjaman::count();
        $kembali = Peminjaman::where('status', 'Dikembalikan')->count();
        return view('dashboard', [
            'anggota' => $anggota,
            'buku' => $buku,
            'pinjam' => $pinjam,
            'kembali' => $kembali,
            'data' => $data,
        ]);
    }
}
