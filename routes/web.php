<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk halaman logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk halaman registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




// Route untuk navbar

Route::get('/dashboard', function () {
    return view('dashboard',['title' => 'Dashboard']);
});

Route::get('/about', function () {
    return view('about',['title' => 'About Us']);
});

Route::get('/recipes', function () {
    return view('recipes',['title' => 'Recipes You Want']);
});
