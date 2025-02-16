<?php

namespace App\Http\Controllers\LFCMS;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
 
        $testimonials = Testimonial::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
        
 
        return view('lfcms.pages.testimonial.index', compact('testimonials', 'search'));
    }

    public function create()
    {
        return view('lfcms.pages.testimonial.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publik',
        ], [
            'name.required' => 'The field Name is required.',
            'status.required' => 'The status field is required.',
        ]);

        // Cek apakah nama sudah ada di database
        $cekName = Testimonial::where('name', $request->name)->exists();
        if ($cekName) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nama ini sudah digunakan, silakan gunakan nama lain.');
        }

        try {
            // Jika ada file image, simpan file tersebut
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('testimonials', 'public');
            }

            // Simpan data ke database
            Testimonial::create($validated);

            return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('lfcms.pages.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publik',
        ], [
            'name.required' => 'The field Name is required.',
        ]);

        // Cek apakah nama sudah ada di database
        $cekName = Testimonial::where('name', $request->name)->exists();
        if ($cekName) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nama ini sudah digunakan, silakan gunakan nama lain.');
        }

        try {

        $testimonial = Testimonial::findOrFail($id);

        // Jika ada file image baru, simpan dan hapus file lama
        if ($request->hasFile('image')) {
            if ($testimonial->image && Storage::exists('public/testimonials/' . $testimonial->image)) {
                Storage::delete('public/testimonials/' . $testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }

    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image && Storage::exists('public/testimonials/' . $testimonial->image)) {
            Storage::delete('public/testimonials/' . $testimonial->image);
        }

        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil dihapus.');
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('lfcms.pages.testimonial.show', compact('testimonial'));
    }

    public function indexPublik()
    {
        $testimonials = Testimonial::where('status', 'publik')->get();
        return view('lfcms.pages.testimonial.index', compact('testimonials'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada testimonial yang dipilih.'], 400);
        }

        $testimonials = Testimonial::whereIn('id', $ids)->get();

        foreach ($testimonials as $testimonial) {
            if ($testimonial->image) {
                Storage::delete('public/testimonials/' . $testimonial->image);
            }
        }

        Testimonial::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Testimonial berhasil dihapus.']);
    }

    public function bulkDraft(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Testimonial::whereIn('id', $ids)->update(['status' => 'draft']);
            return response()->json(['success' => true, 'message' => 'Layanan berhasil diubah ke draft.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
    }

    public function bulkPublish(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Testimonial::whereIn('id', $ids)->update(['status' => 'publik']);
            return response()->json(['success' => true, 'message' => 'Layanan berhasil dipublikasikan.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
    }
}
