<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryArtikel;
use App\Http\Controllers\Controller;

class CategoryArtikelController extends Controller
{
    public function index()
    {
        $categories = CategoryArtikel::all();
        return view('dashboard.pages.kategori-artikel.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.pages.kategori-artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        CategoryArtikel::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'slug' => \Str::Slug($request->slug),
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(CategoryArtikel $categoryArtikel)
    {
        return view('dashboard.pages.kategori-artikel.show', compact('categoryArtikel'));
    }

    public function edit(CategoryArtikel $categoryArtikel)
    {
        return view('dashboard.pages.kategori-artikel.edit', compact('categoryArtikel'));
    }

    public function update(Request $request, CategoryArtikel $categoryArtikel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $categoryArtikel->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'slug' => \Str::Slug($request->slug),
            'status' => $request->status,
        ]);

        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(CategoryArtikel $categoryArtikel)
    {
        $categoryArtikel->delete();
        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
