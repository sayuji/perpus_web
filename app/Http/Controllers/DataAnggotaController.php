<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    public function data()
    {
        $data = User::all();
        return view('data_anggota', [
            'data' => $data
        ]);
    }

    public function tambah_anggota(Request $request)
    {
        $payload = $request->all();
        $model = User::create($payload);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $anggota = User::find($id);
        if ($anggota) {
            $anggota->delete();
            return redirect()->back()->with('success', 'Anggota berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Anggota tidak ditemukan');
    }

    public function edit($id)
    {
        $anggota = User::find($id);
        if ($anggota) {
            return response()->json($anggota);
        }
        return response()->json(['error' => 'Anggota tidak ditemukan'], 404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'kelas' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'string',
        ]);

        $anggota = User::find($id);
        if ($anggota) {
            $anggota->name = $request->name;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->kelas = $request->kelas;
            $anggota->email = $request->email;
            if ($request->role) $anggota->role = $request->role;
            $anggota->save();
            return redirect()->back()->with('success', 'Anggota berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Anggota tidak ditemukan');
    }
}
