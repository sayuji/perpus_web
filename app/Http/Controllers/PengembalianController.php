<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\UlasanRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function Pengembalian()
    {
        $data_peminjaman = Peminjaman::where('status', 'Dikembalikan');

        if (Auth::user()->role === 'anggota') {
            $data_peminjaman->where('user', Auth::user()->id);
        }

        return view('pengembalian', [
            'data_peminjaman' => $data_peminjaman->get()
        ]);
    }

    public function submitReview(Request $request)
    {
        $request->validate([
            'ulasan' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:5',
            'buku_id' => 'required|exists:buku,id',
        ]);

        $review = new UlasanRating();
        $review->user_id = Auth::id();
        $review->buku_id = $request->buku_id;
        $review->ulasan = $request->ulasan;
        $review->rating = $request->rating;
        $review->save();

        return response()->json([
            'success' => true,
            'ulasan' => $review->ulasan,
            'rating' => $review->rating,
            'name' => Auth::user()->name,
        ]);
    }
}
