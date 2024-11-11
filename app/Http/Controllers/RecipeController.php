<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    // Menampilkan daftar resep yang dibuat oleh pengguna yang sedang login
    public function index()
    {
        // Mengambil semua resep yang dibuat oleh pengguna yang sedang login
        $recipes = Recipe::where('userId', Auth::id())->get();
        
        // Mengirim data resep ke tampilan 'recipes.index' dengan judul halaman 'My Recipes'
        return view('recipes.index', ['title' => 'My Recipes', 'recipes' => $recipes]);
    }

    // Menampilkan form untuk membuat resep baru
    public function create()
    {
        // Menampilkan tampilan 'recipes.create' dengan judul halaman 'Create Recipe'
        return view('recipes.create', ['title' => 'Create Recipe']);
    }

    // Menyimpan resep baru ke database
    public function store(Request $request)
    {
        // Validasi input untuk memastikan title, description, dan photo memenuhi syarat yang ditentukan
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photoPath = null;

        // Jika ada file photo yang di-upload, simpan ke storage publik dan ambil path-nya
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public');
        }

        // Membuat resep baru dengan data yang telah divalidasi
        Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath,  // Menyimpan path relatif ke 'public/storage'
            'userId' => auth()->id(),
        ]);

        // Redirect ke halaman 'recipes.index' dengan pesan sukses
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit resep tertentu
    public function edit($id)
    {
        // Mengambil resep berdasarkan ID dan memastikan resep tersebut milik pengguna yang sedang login
        $recipe = Recipe::where('userId', Auth::id())->findOrFail($id);

        // Mengirim data resep ke tampilan 'recipes.edit' dengan judul halaman 'Edit Recipe'
        return view('recipes.edit', ['title' => 'Edit Recipe', 'recipe' => $recipe]);
    }

    // Memperbarui resep tertentu di database
    public function update(Request $request, Recipe $recipe)
    {
        // Validasi input untuk memastikan title, description, dan photo memenuhi syarat yang ditentukan
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Jika ada file photo baru yang di-upload, hapus photo lama dan simpan yang baru
        if ($request->hasFile('photo')) {
            if ($recipe->photo) {
                Storage::disk('public')->delete($recipe->photo); // Menghapus photo lama jika ada
            }
            $recipe->photo = $request->file('photo')->store('uploads', 'public'); // Menyimpan photo baru
        }

        // Memperbarui title dan description dari resep
        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $recipe->photo,
        ]);

        // Redirect ke halaman 'recipes.index' dengan pesan sukses
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil diperbarui.');
    }

    // Menghapus resep tertentu dari database
    public function destroy($id)
    {
        // Mengambil resep berdasarkan ID dan memastikan resep tersebut milik pengguna yang sedang login
        $recipe = Recipe::where('userId', Auth::id())->findOrFail($id);
        
        // Jika ada photo, hapus photo dari storage
        if ($recipe->photo) {
            Storage::disk('public')->delete($recipe->photo);
        }

        // Menghapus resep dari database
        $recipe->delete();

        // Redirect ke halaman 'recipes.index' dengan pesan sukses
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil dihapus.');
    }

    // Menampilkan detail dari resep tertentu
    public function show(Recipe $recipe)
    {
        // Mengirim data resep ke tampilan 'recipes.show' dengan judul halaman sesuai dengan judul resep
        return view('recipes.show', ['title' => $recipe->title, 'recipe' => $recipe]);
    }
}
