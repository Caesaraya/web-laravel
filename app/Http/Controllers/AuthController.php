<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form login
    public function show_login()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        \Log::info('Login attempt:', ['email' => $credentials['email']]);
        \Log::info('Request data:', $request->all());
        \Log::info('Credentials array:', $credentials);

        // Check if user exists
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user) {
            \Log::info('User found in database', ['id' => $user->id, 'role' => $user->role]);
            $passwordCheck = \Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password);
            \Log::info('Password check result: ' . ($passwordCheck ? 'true' : 'false'));
        } else {
            \Log::warning('User NOT found for email: ' . $credentials['email']);
        }

        // Coba untuk authenticate user
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            \Log::info('Login successful for: ' . $credentials['email']);
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        \Log::warning('Login failed for: ' . $credentials['email']);

        // Jika gagal login
        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password salah.',
            ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
