<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class DataBukuController extends Controller
{
    public function buku()
    {
        $data = Buku::all();
        return view('data_buku', [
            'data' => $data
        ]);
    }

    public function tambah_buku(Request $request)
    {
        $payload = $request->all();
        $model = Buku::create($payload);

        return redirect()->back();
    }
}
