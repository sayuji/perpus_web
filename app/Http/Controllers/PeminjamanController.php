<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function peminjaman()
    {
        return view('peminjaman');
    }
}

