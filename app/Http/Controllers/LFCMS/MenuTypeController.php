<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\LFCMS\MenuList;
use App\Models\LFCMS\MenuType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuTypeController extends Controller
{

    public function indexbyId(Request $request)
{
    $menuTypeId = 1; // Menentukan menu_type dengan ID 1

    // Ambil data MenuList berdasarkan menu_type dengan id 1
    $menuList = MenuList::where('menutype_id', $menuTypeId)
        ->with('children') // Mengambil data children jika ada
        ->orderBy('order') // Mengurutkan berdasarkan kolom order
        ->get();

    // Pastikan view yang digunakan adalah layout yang memanggil komponen sidebar
    return view('layouts.layout', compact('menuList')); // Mengirim data ke view
}

    public function store  (Request $request) {
        $validator = Validator::make( $request->all(), [
            'name'  => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MenuType::create([
            'name'  => $request->name
        ]);

        return redirect()->route('menu.index')->with('success', 'Tipe menu berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Cari tipe menu berdasarkan ID dan update
    $menuType = MenuType::findOrFail($id);
    $menuType->update([
        'name' => $request->name,
    ]);

    // Redirect atau kirim response
    return redirect()->route('menu.index')->with('success', 'Tipe menu berhasil diperbarui.');
}

public function destroy($id)
    {
        // Cari tipe menu berdasarkan ID
        $menuType = MenuType::findOrFail($id);

        // Hapus menu type
        $menuType->delete();

        // Redirect setelah menghapus
        return redirect()->route('menu.index')->with('success', 'Tipe menu beserta item yang terkait berhasil dihapus.');
    }


}
