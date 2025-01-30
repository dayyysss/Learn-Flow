<?php

namespace App\Http\Controllers\LFCMS;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryArtikel;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::paginate(10);

        return view('lfcms.pages.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategori = CategoryArtikel::all();
        return view('lfcms.pages.artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi_singkat' => 'required|string',
            'deskripsi' => 'required|string',
            'category_id' => 'required|exists:category_artikel,id',
            'publish_date' => 'nullable|date',
            'keyword' => 'nullable|string',
            'tag' => 'nullable|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1000',
        ],
    
        [
            'judul.required' => 'The field judul is required.', // Pesan khusus untuk validasi name
            'deskripsi_singkat.required' => 'The field deskripsi singkat is required.', // Pesan khusus untuk validasi name
            'deskripsi.required' => 'The field deskripsi is required.', // Pesan khusus untuk validasi name
            'category_id.required' => 'The field kategori is required.', // Pesan khusus untuk validasi name
            'status.required' => 'The status field is required.', // Contoh untuk field lain
        ]);

        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->user_id = auth()->id();
        $artikel->slug = Str::slug($request->judul);
        $artikel->deskripsi_singkat = $request->deskripsi_singkat;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->category_id = $request->category_id;
        $artikel->publish_date = $request->publish_date;
        $artikel->keyword = $request->keyword;
        $artikel->tag = $request->tag;
        $artikel->author = auth()->user()->name;
        $artikel->status = $request->status;
        $artikel->visitor = 0;

        if ($request->hasFile('image')) {
            $artikel->image = $request->file('image')->store('artikel_image', 'public');
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = CategoryArtikel::all();
        return view('lfcms.pages.artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'publish_date' => 'required|date',
            'tag' => 'nullable|string',
            'image' => 'nullable|image',
        ],
    
        [
            'judul.required' => 'The field judul is required.', // Pesan khusus untuk validasi name
            'deskripsi_singkat.required' => 'The field deskripsi singkat is required.', // Pesan khusus untuk validasi name
            'deskripsi.required' => 'The field deskripsi is required.', // Pesan khusus untuk validasi name
            'category_id.required' => 'The field kategori is required.', // Pesan khusus untuk validasi name
            'status.required' => 'The status field is required.', // Contoh untuk field lain
        ]);

        $artikel = Artikel::findOrFail($id);

        // Update artikel
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->deskripsi_singkat = $request->deskripsi_singkat;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->category_id = $request->category_id;
        $artikel->status = $request->status;
        $artikel->publish_date = $request->publish_date;

        if ($request->filled('tag')) {
            $artikel->tag = $request->tag;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('artikel_image', 'public');
            $artikel->image = $path;
        }

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }


}
