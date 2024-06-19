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
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        $payload = $request->all();

        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $payload['gambar'] = $imageName;
        }

        Buku::create($payload);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            if ($buku->gambar && file_exists(public_path('images/' . $buku->gambar))) {
                unlink(public_path('images/' . $buku->gambar));
            }
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
            'kategori' => 'required|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        $buku = Buku::find($id);
        if ($buku) {
            $buku->judul = $request->judul;
            $buku->kategori = $request->kategori;
            $buku->penulis = $request->penulis;
            $buku->penerbit = $request->penerbit;
            $buku->deskripsi = $request->deskripsi;
            $buku->jumlah = $request->jumlah;

            // Handle the image upload
            if ($request->hasFile('gambar')) {
                if ($buku->gambar && file_exists(public_path('images/' . $buku->gambar))) {
                    unlink(public_path('images/' . $buku->gambar));
                }
                $imageName = time().'.'.$request->gambar->extension();
                $request->gambar->move(public_path('images'), $imageName);
                $buku->gambar = $imageName;
            }

            $buku->save();
            return redirect()->back()->with('success', 'Buku berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Buku tidak ditemukan');
    }

    public function detail(Buku $buku)
    {
        return view('detail', [
            'buku' => $buku
        ]);
    }
}
