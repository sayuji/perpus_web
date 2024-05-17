<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKategoriController extends Controller
{
    public function kategori()
    {
        return view('data_kategori');
    }
}

