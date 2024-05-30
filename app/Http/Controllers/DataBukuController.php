<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DataBukuController extends Controller
{
    public function buku()
    {
        $data = Buku::with(['get_kategori'])->get();
        $data_kategori = Kategori::all();
        return view('data_buku', [
            'data' => $data,
            'data_kategori' => $data_kategori
        ]);
    }

    public function tambah_buku(Request $request)
    {
        $payload = $request->all();
        $model = Buku::create($payload);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            $buku->delete();
            return redirect()->back()->with('success', 'Buku berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Buku tidak ditemukan');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            return response()->json($buku);
        }
        return response()->json(['error' => 'Buku tidak ditemukan'], 404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $buku = Buku::find($id);
        if ($buku) {
            $buku->judul = $request->judul;
            $buku->kategori = $request->kategori;
            $buku->penulis = $request->penulis;
            $buku->penerbit = $request->penerbit;
            $buku->deskripsi = $request->deskripsi;
            $buku->jumlah = $request->jumlah;
            $buku->save();
            return redirect()->back()->with('success', 'Buku berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Buku tidak ditemukan');
    }
}
