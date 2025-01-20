<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $cartItems = json_decode($cart->cart_items, true);
            $cart->cartItems = $cartItems;

            // Hitung total harga kursus di keranjang
            $totalPrice += array_sum(array_column($cartItems, 'total_price'));
        }

        return view('dashboard.pages.cart.index', compact('carts', 'totalPrice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Ambil cart yang ada atau buat yang baru
        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id()],
            ['cart_items' => json_encode([])]  // Jika cart tidak ada, buat cart baru dengan cart_items default kosong
        );

        // Ambil data cart_items yang sudah ada, atau buat array baru jika belum ada
        $cartItems = $cart->cart_items ? json_decode($cart->cart_items, true) : [];

        foreach ($cartItems as $item) {
            if ($item['course_id'] == $request->course_id) {
                return redirect()->route('cart.index')->with('error', 'Kursus sudah ada di keranjang anda.');
            }
        }

        // Ambil data course
        $course = Course::find($request->course_id);

        // Hitung harga setelah diskon
        $finalPrice = $course->harga - ($course->harga_diskon ?? 0);

        // Menambahkan item baru ke cart
        $cartItems[] = [
            'course_id' => $request->course_id,
            'course_name' => $course->name,
            'price' => $course->harga,
            'total_price' => $finalPrice,
        ];

        // Menyimpan kembali cart dengan cart_items yang diperbarui
        $cart->cart_items = json_encode($cartItems);
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Item added to cart successfully.');
    }


    public function getCartTotal()
    {
        $cart = Cart::where('user_id', auth()->id())->firstOrFail();
        $cartItems = json_decode($cart->cart_items, true);

        // Menghitung total cart berdasarkan semua item
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'];
        }

        return number_format($total, 2, ',', '.'); // Format dengan koma sebagai pemisah desimal
    }


    public function updateCart(Request $request)
    {
        // Cek apakah course_id ada di request
        if (!$request->has('course_id')) {
            return response()->json([
                'success' => false,
                'message' => 'course_id tidak ditemukan di request.',
            ], 400);
        }

        // Menemukan cart berdasarkan user_id yang sedang login
        $cart = Cart::where('user_id', auth()->id())->firstOrFail();

        // Pastikan cart_items adalah string JSON sebelum mendekodekannya
        $cartItems = is_string($cart->cart_items) ? json_decode($cart->cart_items, true) : $cart->cart_items;

        // Cek apakah cart_items ada dan sudah dalam format array
        if (!$cartItems || !is_array($cartItems)) {
            return response()->json([
                'success' => false,
                'message' => 'Data cart tidak ditemukan atau format JSON tidak valid.',
            ], 400);
        }

        // Cari item yang ingin diperbarui berdasarkan course_id
        $cartItem = collect($cartItems)->firstWhere('course_id', $request->course_id);

        if ($cartItem) {
            // Ambil data kursus terbaru
            $course = Course::find($request->course_id);

            // Log untuk debugging
            if (!$course) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kursus tidak ditemukan.',
                ], 404);
            }

            // Update kuantitas dan harga
            $cartItem['quantity'] = $request->quantity;
            $cartItem['price'] = $course->harga * $request->quantity;
            $cartItem['course_name'] = $course->name; // Perbarui nama kursus

            // Menyimpan perubahan ke cart_items
            $cart->cart_items = json_encode($cartItems);
            $cart->save();

            // Menghitung total cart
            $totalCart = $this->getCartTotal();

            return response()->json([
                'success' => true,
                'message' => 'Cart berhasil diperbarui.',
                'total_cart' => $totalCart,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Item kursus tidak ditemukan di cart.',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cart $cart)
    {
        $courseId = $request->input('course_id');

        // Ambil cart_items yang ada
        $cartItems = json_decode($cart->cart_items, true);

        // Hapus item berdasarkan course_id
        $cartItems = array_filter($cartItems, function ($item) use ($courseId) {
            return $item['course_id'] != $courseId;
        });

        // Simpan ulang cart_items
        $cart->cart_items = json_encode(array_values($cartItems));
        $cart->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Cart item deleted successfully!',
        ]);
    }


    public function clearCart(Request $request)
    {
        if ($request->action === 'clear') {
            $user = Auth::user();

            Cart::where('user_id', $user->id)->delete();

            return response()->json([
                'success' => true,
                'status' => 'success',
                'message' => 'isi keranjang berhasil dihapus!',
                'redirect_url' => route('cart.index'),
            ]);

        }

        return response()->json(['success' => false], 400);
    }


}

