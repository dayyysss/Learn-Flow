@extends('lfcms.layouts.app')
@section('page_title', 'Create Halaman | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Tambah Halaman</h3>
                    </div>
                    <form action="{{ route('halaman.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        <div class="flex lg:flex-row flex-col gap-x-4">
                            <div class="w-full mb-4">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" id="judul" name="judul" class="form-input" placeholder="Masukkan judul halaman" value="{{ old('judul') }}">
                            </div>
                            <div class="w-full mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-input">
                                    <option value="publik" {{ old('status') == 'publik' ? 'selected' : '' }}>Publik</option>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="w-full mb-4">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input type="text" id="keyword" name="keyword" class="form-input" placeholder="Masukkan kata kunci" value="{{ old('keyword') }}">
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col gap-x-4 mb-2">
                            <div class="w-full mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi Lengkap</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-input summernote" placeholder="Masukkan deskripsi lengkap">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                        <div class="flex mt-6 gap-5">
                            <button type="submit" class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                            <a href="{{ route('halaman.index') }}" class="btn b-solid btn-secondary-solid">Kembali</a>
                        </div>
                    </form>                                    
                </div>
            </div>
        </div>
    </div>
@endsection
