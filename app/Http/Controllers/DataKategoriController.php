<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DataKategoriController extends Controller
{
    public function kategori()
    {
        $data = Kategori::all();
        return view('data_kategori', [
            'data' => $data
        ]);
    }

    public function tambah_kategori(Request $request)
    {
        $payload = $request->all();
        $model = Kategori::create($payload);

        return redirect()->back();
    }
}
