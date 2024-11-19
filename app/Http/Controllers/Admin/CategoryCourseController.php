<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CategoryCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryCourseController extends Controller
{
    public function index(Request $request)
    {
        $query = CategoryCourse::query();

        if ($request->has('category') && $request->category != 'All') {
            $query->where('name', $request->category);
        }

        if ($request->has('status') && $request->status != 'All') {
            $query->where('status', strtolower($request->status));
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        }

        $categories = $query->paginate(10)->withQueryString();

        $categoryNames = CategoryCourse::pluck('name')->unique();

        return view('dashboard.pages.kategori-kursus.index', compact('categories', 'categoryNames'));
    }

    public function create()
    {
      $categories = CategoryCourse::with('users')->get();
      return view('dashboard.pages.kategori-kursus.create', compact('categories'));
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
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'status' => $request->status,
            'slug' => $slug
        ]);
      
        notify()->success('Kategori Kursus berhasil dibuat.', 'Berhasil!');
      
        return redirect()->route('kategori-kursus.index');
    }


    public function edit($id)
    {
        $category = CategoryCourse::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $category = CategoryCourse::findOrFail($id);
        
        $category->update([
            'name' => $request->name,
            'status' => $request->status,
            'slug' => Str::slug($request->name)
        ]);
    
        notify()->success('Kategori Kursus berhasil diperbarui.', 'Berhasil!');
        
        return redirect()->route('kategori-kursus.index');
    }
  
  public function destroy($id)
  {
      // Temukan kategori berdasarkan ID
      $category = CategoryCourse::findOrFail($id);

      // Hapus kategori
      $category->delete();

      // Redirect kembali dengan pesan sukses
      notify()->success('Kategori Kursus berhasil dihapus.', 'Berhasil!');
      
      return redirect()->route('kategori-kursus.index');
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

