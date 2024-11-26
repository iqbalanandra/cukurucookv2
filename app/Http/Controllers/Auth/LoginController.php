<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller

{
    public function __construct()
    {
        // Cek jika user sudah login, arahkan ke dashboard
        $this->middleware('guest')->except('logout');
    }
    
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }


    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255', // Memvalidasi username
            'password' => 'required|min:6', // Memvalidasi password
        ]);

        // Mencari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Memastikan user ada dan passwordnya benar
        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user); // Melakukan login
            return redirect()->intended('/dashboard'); // Arahkan ke halaman setelah login
        }

        // Jika username atau password salah
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Di dalam LoginController
    public function logout(Request $request)
    {
        Auth::logout(); // Mengeluarkan user dari session

        $request->session()->invalidate(); // Menghapus semua data session
        $request->session()->regenerateToken(); // Mencegah CSRF setelah logout

        return redirect('/login'); // Mengarahkan ke halaman login
    }
}
