<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryCourseController extends Controller
{
  public function index()
  {
      // Ambil semua data kategori layanan dan muat relasi user
      $categories = CategoryCourse::with('users')->get();
      return view('dashboard.pages.kategori-kursus.index', compact('categories'));
  }

  public function create()
  {
    $categories = CategoryCourse::with('users')->get();
    return view('dashboard.pages.kategori-kursus.index', compact('categories'));
  }

  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'status' => 'required',
      ]);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }


      $slug = Str::slug($request->name);
      $count = CategoryCourse::where('slug', 'like', $slug . '%')->count();
      $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

      CategoryCourse::create([
          'user_id' => auth()->user()->id, // Mengambil ID pengguna yang sedang login
          'name' => $request->name,
          'status' => $request->status,
          'slug' => $slug
      ]);

      return response()->json([
          'status' => 'success',
          'message' => 'Kategori Kursus berhasil dibuat.',
          'redirect_url' => route('kategori.layanan.index') // URL tujuan
      ]);
  }

  public function edit($id)
  {
      // Ambil kategori berdasarkan ID
      $category = CategoryCourse::findOrFail($id);

      // Tampilkan halaman edit dengan data kategori
      return view('dashboard.kategori.create', compact('category'));
  }

  public function update(Request $request, $id)
  {
      // Validasi input
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'status' => 'required',
      ]);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      // Temukan kategori yang akan diupdate
      $category = CategoryCourse::findOrFail($id);

      // Update data kategori
      $category->name = $request->name;
      $category->status = $request->status;
      $category->save();

      return response()->json([
          'status' => 'success',
          'message' => 'Kategori Kursus berhasil diperbarui.',
          'redirect_url' => route('kategori.index') // URL tujuan
      ]);
  }

  public function destroy($id)
  {
      // Temukan kategori berdasarkan ID
      $category = CategoryCourse::findOrFail($id);

      // Hapus kategori
      $category->delete();

      // Redirect kembali dengan pesan sukses
      return response()->json([
          'status' => 'success',
          'message' => 'Kategori kursus berhasil dihapus!',
          'redirect_url' => route('kategori.index') // URL tujuan
      ]);
  }

  // public function bulkDelete(Request $request)
  // {
  //     // Retrieve the array of IDs from the request
  //     $ids = $request->input('ids');

  //     // Check if IDs are provided
  //     if (empty($ids)) {
  //         return response()->json(['success' => false, 'message' => 'Tidak ada kategori layanan yang dipilih.'], 400);
  //     }

  //     // Retrieve the services by the given IDs
  //     $services = CategoryService::whereIn('id', $ids)->get();

  //     // Loop through each service to delete its associated image if it exists
  //     foreach ($services as $service) {
  //         if ($service->image) {
  //             Storage::delete('public/' . $service->image);
  //         }
  //     }
  //     // Delete the services from the database
  //     CategoryService::whereIn('id', $ids)->delete();

  //     return response()->json(['success' => true, 'message' => 'Kategori layanan berhasil dihapus.']);
  // }


  // // Metode untuk mengubah status layanan ke draft
  // public function bulkDraft(Request $request)
  // {
  //     $ids = $request->input('ids');

  //     if ($ids) {
  //         CategoryService::whereIn('id', $ids)->update(['status' => 'draft']);
  //         return response()->json(['success' => true, 'message' => 'Kategori Layanan berhasil diubah ke draft.']);
  //     }

  //     return response()->json(['success' => false, 'message' => 'Tidak ada kategori layanan yang dipilih.'], 400);
  // }

  // // Metode untuk mempublikasikan layanan
  // public function bulkPublish(Request $request)
  // {
  //     $ids = $request->input('ids');

  //     if ($ids) {
  //         CategoryService::whereIn('id', $ids)->update(['status' => 'publik']);
  //         return response()->json(['success' => true, 'message' => 'Kategori layanan berhasil dipublikasikan.']);
  //     }

  //     return response()->json(['success' => false, 'message' => 'Tidak ada kategori layanan yang dipilih.'], 400);
  // }
}

