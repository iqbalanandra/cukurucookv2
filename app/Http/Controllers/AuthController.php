<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        

        try {
            // Membuat user baru
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            // Jika ada file profilePicture, simpan
            if ($request->hasFile('profilePicture')) {
                $user->profilePicture = $request->file('profilePicture')->store('profile_pictures', 'public');
            } else {
                $user->profilePicture = 'default.jpg'; // default
            }

            $user->level = 'user'; // default level
            $user->save();

            return back()->with('success', 'Register successfully');

        } catch (\Exception $e) {
            // Menangani error simpan data
            return back()->with('error', 'Failed to register user: ' . $e->getMessage());
        }
    }
}
