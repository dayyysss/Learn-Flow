<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Course;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('course')->get();
        $courses = Course::all();
        return view('lfcms.pages.diskon.index', compact('discounts', 'courses'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.discounts.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|string|unique:discounts',
            'type' => 'required|in:global,course_specific',
            'course_id' => 'nullable|exists:courses,id',
            'discount_amount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Discount::create($request->all());

        return redirect()->route('admin.discounts.index')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit(Discount $discount)
    {
        $courses = Course::all();
        return view('admin.discounts.edit', compact('discount', 'courses'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'discount_code' => 'required|string|unique:discounts,discount_code,' . $discount->id,
            'type' => 'required|in:global,course_specific',
            'course_id' => 'nullable|exists:courses,id',
            'discount_amount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $discount->update($request->all());

        return redirect()->route('admin.discounts.index')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('admin.discounts.index')->with('success', 'Diskon berhasil dihapus.');
    }
}
