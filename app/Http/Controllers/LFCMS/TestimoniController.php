<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimoniController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::paginate(10);  
        
        return view('lfcms.pages.testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonial = Testimonial::paginate(10);  
        
        return view('lfcms.pages.testimonial.index', compact('testimonial'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:draft,publik',
            'image' => 'nullable',
            'profession' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal!',
                'errors' => $validator->errors()
            ], 422); // Status HTTP 422 untuk unprocessable entity
        }

        $imagePath = 'testimonials/' . basename($request->image);

        // Menyimpan data testimonial ke database
        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
            'profession' => $request->profession,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Testimonial berhasil ditambahkan!',
            'redirect_url' => route('testimonial.index') // URL tujuan
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimoni $testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni)
    {
        //
    }
}
