<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $profile = User::find($id);
        if ($profile) {
            return response()->json($profile);
        }
        return response()->json(['error' => 'Profile tidak ditemukan'], 404);
    }
}
