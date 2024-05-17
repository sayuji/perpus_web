<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    public function data()
    {
        return view('data_anggota');
    }
}

