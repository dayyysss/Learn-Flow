<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryArtikel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with(['user', 'category'])->get();
        return view('dashboard.pages.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $users = User::all();
        $categories = CategoryArtikel::all();
        return view('dashboard.pages.artikel.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'deskripsi' => 'required|string',
            'category_id' => 'required|exists:category_artikel,id',
            'pubish_date' => 'nullable|date',
            'keyword' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        $imagePath = $request->file('image')->store('images/artikel', 'public');

        Artikel::create([
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
            'pubish_date' => $request->pubish_date,
            'keyword' => $request->keyword,
            'tag' => $request->tag,
            'author' => auth()->user()->name, 
            'visitor' => 0,
            'image' => $imagePath,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }


    public function show(Artikel $artikel)
    {
        return view('dashboard.pages.artikel.show', compact('artikel'));
    }


    public function edit(Artikel $artikel)
    {
        $users = User::all();
        $categories = CategoryArtikel::all();
        return view('dashboard.pages.artikel.edit', compact('artikel', 'users', 'categories'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'deskripsi' => 'required|string',
            'category_id' => 'required|exists:category_artikel,id',
            'pubish_date' => 'nullable|date',
            'keyword' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        $imagePath = $artikel->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('images/artikel', 'public');
        }

        $artikel->update([
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
            'pubish_date' => $request->pubish_date,
            'keyword' => $request->keyword,
            'tag' => $request->tag,
            'author' => auth()->user()->name, 
            'image' => $imagePath,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->image) {
            \Storage::disk('public')->delete($artikel->image);
        }
        
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
