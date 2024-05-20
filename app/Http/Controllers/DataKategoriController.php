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

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->delete();
            return redirect()->back()->with('success', 'Kategori berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Kategori tidak ditemukan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            return view('edit_kategori', compact('kategori'));
        }
        return redirect()->back()->with('error', 'Kategori tidak ditemukan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return redirect()->back()->with('success', 'Kategori berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Kategori tidak ditemukan');
    }
}
