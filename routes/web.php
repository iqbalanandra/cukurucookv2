<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipeController;

// Rute utama yang menampilkan halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Rute untuk memproses login
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk logout, melakukan aksi logout pengguna
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk menampilkan form registrasi pengguna baru
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Rute untuk memproses registrasi pengguna baru
Route::post('/register', [RegisterController::class, 'register']);

// Rute Logout (duplikat, sebaiknya hanya satu rute logout yang digunakan)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk menampilkan dashboard pengguna
Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

// Rute untuk menampilkan halaman "About Us"
Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

// Rute untuk menampilkan daftar resep (My Recipes)
Route::get('/recipes', function () {
    return view('recipes', ['title' => 'My Recipes']);
});

// Rute untuk menampilkan dashboard melalui controller (DashboardController)
Route::get('/dashboard', [DashboardController::class, 'index']);

// Rute untuk menampilkan daftar resep menggunakan RecipeController
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
// Rute untuk menampilkan form pembuatan resep baru
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
// Rute untuk menyimpan resep baru ke database
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
// Rute untuk menampilkan form edit resep berdasarkan ID
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
// Rute untuk memperbarui resep yang sudah ada di database
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
// Rute untuk menghapus resep berdasarkan ID
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
// Rute untuk menampilkan detail resep berdasarkan ID
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

