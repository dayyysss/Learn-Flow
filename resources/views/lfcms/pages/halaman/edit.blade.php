@extends('lfcms.layouts.app')
@section('page_title', 'Edit Halaman | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
            <form action="{{ route('halaman.update', $page->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Course Information -->
                <div class="col-span-full lg:col-span-7 card h-fit">
                    <div class="p-1.5">
                    <div class="flex justify-between items-center gap-5">
                        <!-- Bagian Kiri -->
                        <a href="/lfcms/halaman" class="flex items-center gap-1">
                            <i class="ri-arrow-left-line text-2xl text-heading dark:text-dark-text"></i>
                            <h6 class="card-title">Edit Halaman</h6>
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
                                        placeholder="Masukkan judul halaman" value="{{ old('judul', $page->judul) }}">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                                <div>
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-input"
                                    placeholder="Slug otomatis terisi" value="{{ old('slug', $page->slug) }}" readonly>
                                </div>
                            </div>
                            <div>

                                <div class="col-span-full mt-5">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea id="description" name="description" rows="8" class="summernote form-input">{{ old('deskripsi', $page->deskripsi) }}</textarea>
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
                    <div>
                        <label for="status" class="form-label">Status</label>
                        <select class="singleSelect" name="status" id="status">
                            <option disabled>Pilih Status</option>
                            <option value="publik" {{ $page->status == 'publik' ? 'selected' : '' }}>Publik</option>
                            <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div>
                        <label for="keyword" class="form-label">Kata Kunci</label>
                        <input type="text" id="keyword" name="keyword" class="form-input"
                            placeholder="Masukkan kata kunci" value="{{ old('keyword', $page->keyword) }}">
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
                                <div class="file-container text-xs leading-none font-semibold mt-7 mb-3 cursor-pointer aspect-[3/2] flex items-center gap-2.5 dk-border-one border-dashed rounded-10 w-full">
                                        @if($page->image)
                                            <div>
                                                <img src="{{ asset('storage/' . $page->image) }}" alt="Gambar Halaman" class="w-20 h-20 object-cover ">
                                            </div>
                                            <p class="text-sm text-gray-500 dark:text-dark-text font-semibold">Preview Old Image</p>
                                        @else
                                        <p class="text-gray-500 mt-5 mb-5 flex justify-center items-center">  *Tidak ada gambar</p>
                                        @endif
                                    </div>
                                        
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

