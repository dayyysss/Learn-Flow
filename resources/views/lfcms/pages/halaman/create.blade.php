@extends('lfcms.layouts.app')
@section('page_title', 'Create Halaman | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="grid grid-cols-12">
<div class="col-span-full">
    <div class="card p-0">
        <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
            <h3 class="text-lg card-title leading-none">Create New Page</h3>
        </div>
        <form action="{{ route('halaman.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="grid lg:grid-cols-3 gap-x-6 gap-y-4">
                <!-- Section 1: Informasi Umum -->
                <div class="lg:col-span-2">
                    <h4 class="text-md font-semibold mb-4">Informasi Umum</h4>
                    <div class="mb-4">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" id="judul" name="judul"
                            class="form-input @error('judul') border-red-500 @enderror" placeholder="Masukkan judul halaman"
                            value="{{ old('judul') }}">
                        @error('judul')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi
                            Lengkap</label>
                        <textarea id="deskripsi" name="deskripsi"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('deskripsi_lengkap') border-red-500 @enderror"
                            required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Section 2: Pengaturan Lanjutan -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-md font-semibold mb-4">Pengaturan Lanjutan</h4>
                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <div class="flex gap-4">
                            <div class="flex items-center">
                                <input type="radio" id="draft" name="status" value="draft"
                                    class="form-radio @error('status') border-red-500 @enderror"
                                    {{ old('status') == 'draft' ? 'checked' : '' }}>
                                <label for="draft" class="ml-2 text-sm">Draft</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="publik" name="status" value="publik"
                                    class="form-radio @error('status') border-red-500 @enderror"
                                    {{ old('status') == 'publik' ? 'checked' : '' }}>
                                <label for="publik" class="ml-2 text-sm">Publik</label>
                            </div>
                        </div>
                        @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="keyword" class="form-label">Keyword</label>
                        <input type="text" id="keyword" name="keyword"
                            class="form-input @error('keyword') border-red-500 @enderror"
                            placeholder="Masukkan kata kunci" value="{{ old('keyword') }}">
                        @error('keyword')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('halaman.index') }}"
                    class="btn btn-secondary-solid px-5 dk-theme-card-square">Kembali</a>
                <button type="submit" class="btn btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
