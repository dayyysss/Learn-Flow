<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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

    public function applyPromoCode($promoCode)
    {
        // Cari diskon berdasarkan kode promo
        $discount = Discount::where('discount_code', $promoCode)->first();

        if (!$discount || !$discount->isValid()) {
            return response()->json(['success' => false, 'message' => 'Kode promo tidak valid atau sudah kedaluwarsa.']);
        }

        // Ambil kursus yang masih dalam status "Menunggu"
        $registrations = CourseRegistration::where('user_id', auth()->id())
            ->where('registration_status', 'Menunggu')
            ->get();

        if ($registrations->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Tidak ada kursus yang perlu diperbarui.']);
        }

        // Hitung total diskon dan update harga kursus di database
        $discountAmount = $discount->discount_amount;
        $cashbackAmount = $discount->type === 'global' ? 0 : $discountAmount * 0.1; // Contoh cashback 10%

        foreach ($registrations as $registration) {
            $originalPrice = $registration->harga;
            $newPrice = max($originalPrice - $discountAmount, 0); // Harga tidak boleh negatif

            // Update harga kursus di database
            $registration->update(['harga' => $newPrice]);
        }

        return response()->json([
            'success' => true,
            'discountAmount' => number_format($discountAmount, 0, ',', '.'),
            'cashbackAmount' => number_format($cashbackAmount, 0, ',', '.'),
            'newTotalPrice' => number_format($registrations->sum('harga'), 0, ',', '.') // Total harga setelah diskon
        ]);
    }

    public function getPromoList()
    {
        $now = now();

        $promos = Discount::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->select('discount_code', 'discount_amount', 'start_date', 'end_date')
            ->get();

        return response()->json([
            'message' => $promos->isEmpty() ? 'Tidak ada promo yang tersedia saat ini.' : 'Data promo berhasil diambil.',
            'promos' => $promos
        ]);
    }


}
