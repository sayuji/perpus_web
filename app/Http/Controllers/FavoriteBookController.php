<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ini sudah cukup, tidak perlu alias

class FavoriteBookController extends Controller
{
    public function index()
    {
        $favoriteBooks = Auth::user()->favoriteBooks()->with('get_kategori')->get();

        return view('favorite', compact('favoriteBooks'));
    }

    public function addFavorite($id)
    {
        $user = Auth::user();
        $user->favoriteBooks()->attach($id);
        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke favorit');
    }

    public function removeFavorite($id)
    {
        $user = Auth::user();
        $user->favoriteBooks()->detach($id);
        return redirect()->back()->with('success', 'Buku berhasil dihapus dari favorit');
    }
}
