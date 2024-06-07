<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function peminjaman()
    {
        $data = Buku::with(['get_kategori'])->get();
        $data_peminjaman = Peminjaman::whereNot('status', 'Dikembalikan');

        if (Auth::user()->role === 'anggota') {
            $data_peminjaman->where('user', Auth::user()->id);
        }

        $data_peminjaman->with(['get_user']);

        return view('peminjaman', [
            'data_buku' => $data,
            'data_peminjaman' => $data_peminjaman->get()
        ]);
    }

    public function peminjaman_siswa()
    {
        $data = Buku::with(['get_kategori'])->get();
        $data_peminjaman = Peminjaman::whereNot('status', 'Dikembalikan');

        if (Auth::user()->role === 'anggota') {
            $data_peminjaman->where('user', Auth::user()->id);
        }
        return view('peminjaman_siswa', [
            'data_buku' => $data,
            'data_peminjaman' => $data_peminjaman->get()
        ]);
    }

    public function ajukan_peminjaman(Request $request)
    {
        $payload = $request->all();
        $payload['user'] = Auth::user()->id;
        $payload['status'] = 'Menunggu Approval';

        $model = Peminjaman::create($payload);

        return redirect()->back();
    }

    public function approve_peminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);
        if ($peminjaman) {
            $peminjaman->update([
                'status' => 'Dipinjam'
            ]);
            $buku = $peminjaman->get_buku;
            $buku->update([
                'jumlah' => $buku->jumlah - 1
            ]);
            return redirect()->back()->with('success', 'Peminjamaan di Approve');
        }
        return redirect()->back()->with('error', 'Peminjaman tidak ditemukan');
    }

    public function pengembalian($id)
    {
        $peminjaman = Peminjaman::find($id);
        if ($peminjaman) {
            $peminjaman->update([
                'status' => 'Dikembalikan',
                'tanggal_pengembalian_sebenarnya' => date('Y-m-d')
            ]);
            $buku = $peminjaman->get_buku;
            $buku->update([
                'jumlah' => $buku->jumlah + 1
            ]);
            return redirect()->back()->with('success', 'Peminjamaan telah dikembalikan');
        }
        return redirect()->back()->with('error', 'Peminjaman tidak ditemukan');
    }
}
