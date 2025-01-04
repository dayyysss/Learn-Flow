<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\WebsiteConfiguration;
use Illuminate\Http\Request;

class WebsiteConfigurationController extends Controller
{
    public function index()
{

    $configuration = WebsiteConfiguration::first();


    $existingKeywords = $configuration ? json_decode($configuration->meta_kata_kunci, true) : [];
    $informasiKontak = $configuration ? json_decode($configuration->informasi_kontak, true) : [];
    $informasiSosmed = $configuration ? json_decode($configuration->informasi_sosial_media, true) : [];



    
    return view('lfcms.pages.website.index', compact('configuration', 'existingKeywords', 'informasiKontak','informasiSosmed'));
}

    


    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_domain' => 'required|string|max:255',
            'judul_website' => 'required|string|max:255',
            'meta_deskripsi' => 'required|string',
            'alamat' => 'required',
        ]);

        $configuration = WebsiteConfiguration::first();
        if ($configuration) {
            $configuration->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'nama_domain' => $request->nama_domain,
                'judul_website' => $request->judul_website,
                'meta_deskripsi' => $request->meta_deskripsi,
                'alamat' => $request->alamat,
            ]);
        } else {
            WebsiteConfiguration::create([
                'nama_perusahaan' => $request->nama_perusahaan,
                'nama_domain' => $request->nama_domain,
                'judul_website' => $request->judul_website,
                'meta_deskripsi' => $request->meta_deskripsi,
                'alamat' => $request->alamat,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Konfigurasi berhasil disimpan.',
            'redirect_url' => route('website.index') // URL tujuan
        ]);
    }

    public function storeKeyword(Request $request)
    {
        try {
            $request->validate([
                'meta_kata_kunci' => 'required|array',
                'meta_kata_kunci.*' => 'string',
            ]);
    
            $configuration = WebsiteConfiguration::first();
            if ($configuration) {
                $configuration->update([
                    'meta_kata_kunci' => json_encode(array_map('trim', $request->meta_kata_kunci)),
                ]);
            } else {
                WebsiteConfiguration::create([
                    'meta_kata_kunci' => json_encode(array_map('trim', $request->meta_kata_kunci)),
                ]);
            }
    
            return response()->json([
                'status' => 'success',
                'message' => 'Kata Kunci berhasil disimpan.',
                'redirect_url' => route('website.index'),
            ]);
        } catch (\Exception $e) {
            \Log::error('Error saving keywords: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan kata kunci.',
            ], 500);
        }
    }
    



    public function storeKontak(Request $request)
    {
        $request->validate([
            'contact_name' => 'nullable|array',
            'contact_value' => 'nullable|array',
        ]);

        $informasi_kontak = [];
        if ($request->contact_name && $request->contact_value) {
            foreach ($request->contact_name as $key => $name) {
                $informasi_kontak[] = [
                    'name' => $name,
                    'value' => $request->contact_value[$key] ?? null,
                ];
            }
        }
        $informasi_kontak_json = !empty($informasi_kontak) ? json_encode($informasi_kontak) : null;


        $configuration = WebsiteConfiguration::first();
        if ($configuration) {
            $configuration->update([
             
                'informasi_kontak' => $informasi_kontak_json,
    
            ]);
        } else {
            WebsiteConfiguration::create([
              
                'informasi_kontak' => $informasi_kontak_json,

            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Konfigurasi berhasil disimpan.',
            'redirect_url' => route('website.index') // URL tujuan
        ]);
    }

    public function storeSosial(Request $request)
    {
        $request->validate([
            'social_media_platform' => 'nullable|array',
            'social_media_value' => 'nullable|array',
        ]);


        $informasi_sosial_media = [];
        if ($request->social_media_platform && $request->social_media_value) {
            foreach ($request->social_media_platform as $key => $platform) {
                $informasi_sosial_media[] = [
                    'platform' => $platform,
                    'value' => $request->social_media_value[$key] ?? null,
                ];
            }
        }
        $informasi_sosial_media_json = !empty($informasi_sosial_media) ? json_encode($informasi_sosial_media) : null;

        $configuration = WebsiteConfiguration::first();
        if ($configuration) {
            $configuration->update([
                'informasi_sosial_media' => $informasi_sosial_media_json,
            ]);
        } else {
            WebsiteConfiguration::create([
                'informasi_sosial_media' => $informasi_sosial_media_json,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Konfigurasi berhasil disimpan.',
            'redirect_url' => route('website.index') // URL tujuan
        ]);
    }
}
