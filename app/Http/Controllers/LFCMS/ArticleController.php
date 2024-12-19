<?php

namespace App\Http\Controllers\LFCMS;

use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryArticle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FileManagerController;
use App\Models\Artikel;
use App\Models\CategoryArtikel;

class ArticleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth'); // Menambahkan middleware auth untuk semua aksi
    //     $this->middleware('permission:daftar-artikel.index')->only(['index']);
    //     $this->middleware('permission:daftar-artikel.create')->only(['create', 'store']);
    //     $this->middleware('permission:daftar-artikel.update')->only(['edit', 'update']);
    //     $this->middleware('permission:daftar-artikel.delete')->only(['destroy']);
    // }
    
    public function index(Request $request)
{
    if ($request->ajax()) {
        $articles = Artikel::with('category')->paginate(10); // Pastikan relasi `category` ada
        return response()->json($articles);
    }

    $articles = Artikel::orderBy('created_at', 'desc')->get();
    // $fileManager = new FileManagerController();
    // $files = $fileManager->index()->getData()['files'];

    return view('lfcms.pages.artikel.index', compact('articles'));
}




    public function create()
    {
        $categories = CategoryArtikel::all();
        // $fileManager = new FileManagerController();
        // $files = $fileManager->index()->getData()['files'];
        return view('lfcms.pages.artikel.create', compact('categories'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|max:255',
                'categories_id' => 'required|exists:category_articles,id',
                'content' => 'required',
                'tags' => 'nullable|string',
                'keywords' => 'nullable|string',
                'publish_date' => 'nullable',
                'status' => 'required|in:publik,draft',
                'thumbnail' => 'nullable|string',
            ]);
    
            $article = new Artikel();
            $article->title = $request->input('title');
            $article->categories_id = $request->input('categories_id');
            $article->content = $request->input('content');
    
            if ($request->input('tags')) {
                $tags = explode(',', $request->input('tags'));
                $tags = array_map('trim', $tags);
                $article->tags = implode(',', $tags);
            }
    
            $article->keywords = $request->input('keywords');
            $article->publish_date = $request->input('publish_date');
            $article->status = $request->input('status', 'Tampilkan');
    
            $thumbnail = $request->input('thumbnail');
            $article->thumbnail = $thumbnail ? 'thumbnails/' . basename($thumbnail) : null;
    
            $slug = \Str::slug($article->title);
            $count = Artikel::where('slug', 'like', $slug . '%')->count();
            $article->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    
            $article->user_id = auth()->id();
            $article->author = auth()->user()->name;
            $article->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Artikel berhasil dibuat.',
                'redirect_url' => route('artikel.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal. Silakan cek input Anda.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat membuat artikel. Silakan coba lagi.',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
    

    public function show($id)
    {
        $article = Artikel::findOrFail($id);

        // Increment visitor count
        $article->increment('visitor');

        $pageSize = $article->thumbnail ? Storage::size('public/' . $article->thumbnail) : null;

        return view('artikel.show', compact('article', 'pagesize'));
    }

    public function showBySlug($slug)
    {
        $article = Artikel::where('slug', $slug)->firstOrFail();

        // Increment visitor count
        $article->increment('visitor');

        return view('admin.artikel.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Artikel::findOrFail($id);

        $categories = CategoryArtikel::all();

        // $fileManager = new FileManagerController();
        // $files = $fileManager->index()->getData()['files'];

        // $imagePath = storage_path('app/public/' . $article->thumbnail);
        // $pageSize = file_exists($imagePath) ? filesize($imagePath) : null;

        return view('admin.artikel.edit', compact('article', 'categories', 'files', 'pageSize'));
    }

    public function update(Request $request, $id)
    {
        $article = Artikel::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'categories_id' => 'nullable|exists:category_articles,id',
            'publish_date' => 'nullable|date',
            'keywords' => 'nullable|string',
            'tags' => 'nullable|string',
            'status' => 'nullable|in:publik,draft',
            'thumbnail' => 'nullable|string',
        ]);

        if ($request->has('thumbnail') && $request->input('thumbnail') !== null) {
            $validated['thumbnail'] = 'thumbnails/' . basename($request->input('thumbnail'));
        } else {
            $validated['thumbnail'] = $article->thumbnail;
        }

        if ($request->has('tags') && $request->input('tags') !== null) {
            $validated['tags'] = $request->input('tags');
        } else {
            $validated['tags'] = $article->tags;
        }

        $article->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil diperbarui.',
            'redirect_url' => route('artikel.index')
        ]);
    }



    public function updateStatus(Request $request)
    {
        $ids = $request->input('ids');
        $status = $request->input('status');

        Artikel::whereIn('id', $ids)->update(['status' => $status]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $article = Artikel::findOrFail($id);

        $article->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil dihapus!',
            'redirect_url' => route('artikel.index')
        ]);
    }
    
    


}