<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    public function data()
    {
        $data = Anggota::all();
        return view('data_anggota', [
            'data' => $data
        ]);
    }

    public function tambah_anggota(Request $request)
    {
        $payload = $request->all();
        $model = Anggota::create($payload);

        return redirect()->back();
    }
}
