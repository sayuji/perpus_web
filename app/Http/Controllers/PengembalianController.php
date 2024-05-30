<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function Pengembalian()
    {
        $data_peminjaman = Peminjaman::where('status', 'Dikembalikan')->get();

        return view('pengembalian', [
            'data_peminjaman' => $data_peminjaman
        ]);
    }
}

