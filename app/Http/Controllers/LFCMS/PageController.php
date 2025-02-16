<?php

namespace App\Http\Controllers\LFCMS;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{   
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pages = Page::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                        ->orWhereHas('users', function ($query) use ($search) {
                            $query->where('name', 'like', "%{$search}%"); 
                        });
        })->paginate(10); 

        return view('lfcms.pages.halaman.index', compact('pages', 'search')); 
    }

    
    public function create()
    {
        return view('lfcms.pages.halaman.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:draft,publik',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'keyword' => 'nullable',
        ],
    
        [
            'judul.required' => 'The field name is required.', // Pesan khusus untuk validasi judul
            'status.required' => 'The status field is required.', // Contoh untuk field lain
        ]
    );
        // Cek apakah judul sudah ada di database
        $cekJudul = Page::where('judul', $request->judul)->exists();
        if ($cekJudul) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Judul ini sudah digunakan, silakan gunakan judul lain.');
        }

        try {
            $imagePath = null;
    
            if ($request->hasFile('image')) {
                $uploadedFile = $request->file('image')->store('pages', 'public');
                $imagePath = str_replace('public/halaman', '', $uploadedFile);
            }
    
            $slug = Str::slug($request->judul);
            $count = Page::where('slug', 'like', $slug . '%')->count();
            $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    
            Page::create([
                'user_id' => auth()->user()->id,
                'judul' => $request->judul,
                'status' => $request->status,
                'image' => $imagePath,
                'slug' => $slug,
                'deskripsi' => $request->deskripsi,
                'keyword' => $request->keyword,
            ]);
    
            return redirect()->route('halaman.index')->with('success', 'Halaman berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('lfcms.pages.halaman.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'status' => 'required|in:draft,publik',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'nullable',
            'keyword' => 'nullable',
        ],
    
        [
            'judul.required' => 'The field Judul is required.', // Pesan khusus untuk validasi judul
            'status.required' => 'The status field is required.', // Contoh untuk field lain
        ]);

        // Cek apakah judul sudah ada di database
        $cekJudul = Page::where('judul', $request->judul)->exists();
        if ($cekJudul) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Judul ini sudah digunakan, silakan gunakan judul lain.');
        }

        try {
        $page = Page::findOrFail($id);
        $imagePath = $page->image;

        if ($request->hasFile('image')) {
            if ($page->image && Storage::exists('public/halaman' . $page->image)) {
                Storage::delete('public/halaman' . $page->image);
            }

            $uploadedFile = $request->file('image')->store('pages', 'public');
            $imagePath = str_replace('public/halaman', '', $uploadedFile);
        }

        $slug = Str::slug($request->judul);
        $count = Page::where('slug', 'like', $slug . '%')->where('id', '!=', $id)->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

        $page->update([
            'judul' => $request->judul,
            'status' => $request->status,
            'image' => $imagePath,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'keyword' => $request->keyword,
        ]);

        return redirect()->route('halaman.index')->with('success', 'Halaman berhasil diperbarui!');
        } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        if ($page->image) {
            Storage::delete('public/' . $page->image);
        }

        $page->delete();

        return redirect()->route('halaman.index')->with('success', 'Halaman berhasil dihapus!');
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('lfcms.pages.halaman.show', compact('page'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada halaman yang dipilih.'], 400);
        }

        $pages = Page::whereIn('id', $ids)->get();

        foreach ($pages as $page) {
            if ($page->image) {
                Storage::delete('public/halaman' . $page->image);
            }
        }

        Page::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Halaman berhasil dihapus.']);
    }

    public function bulkDraft(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Page::whereIn('id', $ids)->update(['status' => 'draft']);
            return response()->json(['success' => true, 'message' => 'Halaman berhasil diubah ke draft.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada halaman yang dipilih.'], 400);
    }

    public function bulkPublish(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Page::whereIn('id', $ids)->update(['status' => 'publik']);
            return response()->json(['success' => true, 'message' => 'Halaman berhasil dipublikasikan.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada halaman yang dipilih.'], 400);
    }
}
