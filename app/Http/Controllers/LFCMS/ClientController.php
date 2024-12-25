<?php

namespace App\Http\Controllers\LFCMS;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
 
        $clients = Client::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(2);
        
 
        return view('lfcms.pages.klien.index', compact('clients', 'search'));
    }
    
    public function create()
    {
        return view('lfcms.pages.klien.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required|in:draft,public',
            'url' => 'nullable|url',
            'image' => 'nullable|image|max:2048',  // Validasi file gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menangani upload gambar
        if ($request->hasFile('image')) {
            // Simpan gambar jika ada
            $imagePath = $request->file('image')->store('clients', 'public');
        } else {
            // Jika tidak ada gambar, simpan nilai NULL atau string kosong
            $imagePath = NULL;  // atau ''
        }

        // Simpan data client baru
        Client::create([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $imagePath, // Gambar dapat NULL atau path gambar
            'url' => $request->url,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('klien.index')->with('success', 'Client berhasil ditambahkan!');
    }
   

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $files = []; // Jika perlu menambahkan data file, pastikan didefinisikan sebelumnya
        return view('lfcms.pages.klien.edit', compact('client', 'files'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required|in:draft,public',
            'image' => 'nullable|image|max:2048',  // Validasi file gambar
            'url' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ambil data yang perlu di-update
        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'url' => $request->url,
        ];

        // Menangani upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($client->image && Storage::exists('public/clients/' . basename($client->image))) {
                Storage::delete('public/clients/' . basename($client->image));
            }
            // Upload gambar baru
            $imagePath = $request->file('image')->store('clients', 'public');
            $data['image'] = $imagePath;
        }

        // Update data client
        $client->update($data);

        return redirect()->route('klien.index')->with('success', 'Client berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($client->image && Storage::exists('public/clients/' . basename($client->image))) {
            Storage::delete('public/clients/' . basename($client->image));
        }

        // Hapus data dari database
        $client->delete();

        return redirect()->route('klien.index')->with('success', 'Client berhasil dihapus!');
    }

    public function indexPublik()
    {
        // Ambil hanya data client yang memiliki status 'public' dengan pagination
        $clients = Client::where('status', 'public')->paginate(8); 

        return view('lfcms.pages.klien.index', compact('clients'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
        }

        $services = Client::whereIn('id', $ids)->get();

        foreach ($services as $service) {
            if ($service->image && Storage::exists('public/clients/' . basename($service->image))) {
                Storage::delete('public/clients/' . basename($service->image));
            }
        }

        Client::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Layanan berhasil dihapus.']);
    }

    public function bulkDraft(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Client::whereIn('id', $ids)->update(['status' => 'draft']);
            return response()->json(['success' => true, 'message' => 'Layanan berhasil diubah ke draft.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
    }

    public function bulkPublish(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Client::whereIn('id', $ids)->update(['status' => 'public']);
            return response()->json(['success' => true, 'message' => 'Layanan berhasil dipublikasikan.']);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada layanan yang dipilih.'], 400);
    }
}
