<?php

namespace App\Http\Controllers\LFCMS;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryArtikel;
use App\Http\Controllers\Controller;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = CategoryArtikel::paginate(10);

        return view('lfcms.pages.artikel.kategori.index', compact('kategori'));
    }


    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:publik,draft',
        ]);

        $validated['status'] = ($validated['status'] === 'publik') ? 1 : 0;

        // Membuat slug dari nama kategori
        $validated['slug'] = Str::slug($validated['name'], '-');

        // Menambahkan user_id berdasarkan pengguna yang sedang login
        $validated['user_id'] = auth()->user()->id;

        // Membuat kategori baru di database
        $kategori = CategoryArtikel::create($validated);

        // Jika request adalah AJAX, kirimkan response JSON
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $kategori
            ], 200);
        }

        // Mengarahkan kembali ke halaman kategori dengan pesan sukses jika bukan AJAX
        return redirect()
            ->route('kategori-artikel.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show(CategoryArtikel $kategori_artikel)
    {
        return response()->json($kategori_artikel);
    }

    public function edit(CategoryArtikel $kategori_artikel)
    {
        return view('kategoriartikel.edit', compact('kategori_artikel'));
    }

    public function update(Request $request, CategoryArtikel $kategori_artikel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:publik,draft',
        ]);

        $kategori_artikel->update($validated);
        return response()->json(['message' => 'Data updated successfully', 'data' => $kategori_artikel]);
    }

    public function destroy(CategoryArtikel $kategori_artikel)
{
    $kategori_artikel->delete();
    return response()->json(['message' => 'Artikel berhasil dihapus']);
}

}
