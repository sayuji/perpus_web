<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $payload = $request->all();
        $payload['role'] = 'anggota';

        try {
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'email',
                'password' => 'required|confirmed|min:8',
            ]);
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }

        $user = User::create($payload);


        if ($request->is('api/*')) {
            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }


        return redirect()->route('register')->with('success', 'Register Berhasil! Kamu Bisa Login Sekarang.');
    }

    public function login(Request $request)
    {
        $payload = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($payload)) {
            if ($request->is('api/*')) {
                $user = User::where('email', $request['email'])->firstOrFail();

                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);
            }
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Incorrect Email or Password.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
