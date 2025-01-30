@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Halaman | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <form action="{{ route('halaman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Course Information -->
                <div class="col-span-full lg:col-span-7 card h-fit">
                    <div class="p-1.5">
                    <div class="flex justify-between items-center gap-5">
                        <!-- Bagian Kiri -->
                        <a href="/lfcms/halaman" class="flex items-center gap-1">
                            <i class="ri-arrow-left-line text-2xl text-heading dark:text-dark-text"></i>
                            <h6 class="card-title">Tambah Halaman</h6>
                        </a>

                        <!-- Bagian Kanan -->
                        <div class="flex gap-3">
                            <button type="submit" class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                        </div>
                    </div>
                        <div class="mt-7 pt-0.5">
                            <div class="grid  gap-y-5">
                                <div>
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" id="judul" name="judul" class="form-input @error('judul') is-invalid @enderror"
                                        placeholder="Masukkan judul halaman" value="{{ old('judul') }}">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                                <div>
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-input"
                                    placeholder="Slug otomatis terisi" value="{{ old('slug') }}" readonly>
                                </div>
                            </div>
                            <div>

                                <div class="col-span-full mt-5">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea id="description" name="description" rows="8" class="summernote form-input"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course Information -->

                <!-- Start Course Media File -->
                <div class="col-span-full h-fit lg:col-span-5 gap-y-3">
                
                <div class="card">
                <div class="p-1.5">
                    
                    <div class="pt-0.5 flex flex-col gap-5">
                    <div class="col-span-full mt-3 xl:col-auto leading-none">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="singleSelect @error('status') is-invalid @enderror" name="status" id="status">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="publik">Publik</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    @error('status')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="keyword" class="form-label">Kata Kunci</label>
                                    <input type="text" id="keyword" name="keyword" class="form-input"
                                        placeholder="Masukkan kata kunci" value="{{ old('keyword') }}">
                                </div>
                    <div class="flex-1 w-full">
                                <label for="image" class="form-label">Gambar</label>
                                <label for="image"
                                    class="file-container text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/2] flex flex-col items-center justify-center gap-2.5 dk-border-one border-dashed rounded-10 w-full">
                                    <input id="image" name="image" type="file" hidden class="peer/file file-src"
                                        onchange="previewImage(this)">
                                    <span class="flex-center flex-col text-center w-full">
                                        <img id="image-preview"
                                            src="{{ asset('assets/lfcms/images/icons/upload-file.svg') }}" alt="file-icon"
                                            class="size-8 lg:size-auto mx-auto">
                                        <div class="file-name mt-2 text-xl font-semibold text-gray-500 dark:text-dark-text">
                                            Unggah File Gambar
                                        </div>
                                        <label for="image"
                                            class="cursor-pointer text-sm text-primary-500 before:text-lg font-spline_sans before:font-remix before:pr-px before:content-['\f24e'] btn b-outline btn-primary-outline py-2.5 px-[18px] mt-4">
                                            Klik untuk mengunggah
                                        </label>
                                        <span class="text-sm text-gray-900 dark:text-dark-text-two mt-2">
                                            Ukuran file maksimum adalah 1 MB
                                        </span>
                                    </span>
                                </label>
                            </div>
                        
                        
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>

    <script>
                    document.getElementById('judul').addEventListener('input', function() {
                        const judulValue = this.value;
                        const slugValue = judulValue.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                        document.getElementById('slug').value = slugValue;
                    });

                    function previewImage(input) {
                        const preview = document.getElementById('image-preview');
                        const file = input.files[0];
                        const reader = new FileReader();

                        reader.onloadend = function() {
                            preview.src = reader.result;
                        }

                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    }
                </script>
@endsection

