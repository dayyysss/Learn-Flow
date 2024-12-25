<?php

namespace App\Http\Controllers\LFCMS;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials
     */
    public function index(Request $request)
    {
        // Example with paginated data
        $testimonials = Testimonial::paginate(2);

        return view('lfcms.pages.testimonial.index', compact('testimonials'));
    }



    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('lfcms.pages.testimonial.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publik',
        ]);

        // Jika ada file image, simpan file tersebut
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        // Simpan data ke database
        Testimonial::create($validated);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil dibuat.');
    }

    /**
     * Display the specified testimonial.
     */
    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('lfcms.pages.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('lfcms.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publik',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        // Jika ada file image baru, simpan dan hapus file lama
        if ($request->hasFile('image')) {
            if ($testimonial->image && \Storage::exists('public/' . $testimonial->image)) {
                \Storage::delete('public/' . $testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        // Update data di database
        $testimonial->update($validated);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Hapus file image jika ada
        if ($testimonial->image && \Storage::exists('public/' . $testimonial->image)) {
            \Storage::delete('public/' . $testimonial->image);
        }

        // Hapus data dari database
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil dihapus.');
    }

    public function indexPublik()
    {
        // Ambil hanya data testimonial yang memiliki status 'publik'
        $testimonials = Testimonial::where('status', 'publik')->get();

        return view('lfcms.pages.testimonial.index', compact('testimonials'));
    }

    public function bulkDelete(Request $request)
    {
        // Retrieve the array of IDs from the request
        $ids = $request->input('ids');

        // Check if IDs are provided
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
        }

        // Retrieve the services by the given IDs
        $services = Testimonial::whereIn('id', $ids)->get();

        // Loop through each service to delete its associated image if it exists
        foreach ($services as $service) {
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }
        }

        // Delete the services from the database
        Testimonial::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Layanan berhasil dihapus.']);
    }


    // Metode untuk mengubah status layanan ke draft
    public function bulkDraft(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Testimonial::whereIn('id', $ids)->update(['status' => 'draft']);
            return response()->json(['success' => true, 'message' => 'Layanan berhasil diubah ke draft.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
    }

    // Metode untuk mempublikasikan layanan
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
