<?php

namespace App\Http\Controllers;

use App\Models\CategoryArtikel;
use Illuminate\Http\Request;

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
        ]);

        CategoryArtikel::create([
            'name' => $request->name,
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
        ]);

        $categoryArtikel->update([
            'name' => $request->name,
        ]);

        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(CategoryArtikel $categoryArtikel)
    {
        $categoryArtikel->delete();
        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
