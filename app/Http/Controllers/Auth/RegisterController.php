<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Proses upload gambar jika ada
        $profilePicture = $request->file('profilePicture');
        $profilePictureName = 'default.png';
        if ($profilePicture) {
            $profilePictureName = time() . '_' . $profilePicture->getClientOriginalName();
            $profilePicture->move(public_path('uploads/profile_pictures'), $profilePictureName);
        }

        // Membuat pengguna baru
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password sebelum disimpan
            'profilePicture' => $profilePictureName, // Simpan nama file
            'level' => 'user', // Level default
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
