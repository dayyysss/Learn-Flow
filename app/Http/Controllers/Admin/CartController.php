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
        // Menampilkan cart hanya untuk user yang sedang login
        $cartItems = Cart::with('course')
            ->where('user_id', auth()->id()) // Menambahkan filter berdasarkan user_id
            ->get();

        return view('dashboard.pages.cart.index', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'quantity' => 'required|integer|min:1', // Validasi kuantitas
        ]);

        // Ambil cart yang ada atau buat yang baru
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Ambil data cart_items atau buat array baru
        $cartItems = $cart->cart_items ? json_decode($cart->cart_items, true) : [];

        // Cek apakah course_id sudah ada dalam cart
        $existingItem = collect($cartItems)->firstWhere('course_id', $request->course_id);
        if ($existingItem) {
            // Update kuantitas jika course sudah ada
            $existingItem['quantity'] += $request->quantity;
        } else {
            // Ambil data kursus dari course_id
            $course = Course::find($request->course_id);

            // Tambahkan item baru, termasuk nama kursus
            $cartItems[] = [
                'course_id' => $request->course_id,
                'course_name' => $course->name, // Nama kursus
                'quantity' => $request->quantity,
                'price' => $course->harga * $request->quantity, // Harga per item dikali kuantitas
            ];
        }

        // Simpan kembali cart dengan data cart_items yang diperbarui
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
                \Log::error('Kursus tidak ditemukan dengan ID: ' . $request->course_id);  // Log kesalahan untuk debugging
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





    // public function update(Request $request)
    // {
    //     $cart = Cart::find($request->cartId);
    //     $cart->quantity = $request->quantity;
    //     $cart->price = $request->total;
    //     $cart->save();

    //     return response()->json(['success' => true]);
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart, $course_id)
    {
        if ($cart->user_id !== auth()->id()) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized action!'], 403);
        }

        // Ambil data cart_items
        $cartItems = json_decode($cart->cart_items, true);

        // Filter untuk menghapus item berdasarkan course_id
        $cartItems = array_filter($cartItems, function ($item) use ($course_id) {
            return $item['course_id'] !== $course_id;
        });

        // Simpan ulang cart setelah item dihapus
        $cart->cart_items = json_encode(array_values($cartItems)); // Gunakan array_values untuk re-index array
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
                'status' => 'success',
                'message' => 'All Cart item deleted successfully!',
                'redirect_url' => route('cart.index'),
            ]);
        }

        return response()->json(['success' => false], 400);
    }

}

