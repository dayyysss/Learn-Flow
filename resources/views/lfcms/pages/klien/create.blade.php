@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Klien | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Tambah Klien</h3>
                    </div>
                    <form action="{{ route('klien.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        <div class="flex lg:flex-row flex-col gap-x-4">
                            <!-- Kolom Kiri -->
                            <div class="flex flex-col w-full lg:w-1/2 gap-y-4">
                                <div>
                                    <label for="name" class="form-label">Nama Klien</label>
                                    <input type="text" id="name" name="name" class="form-input"
                                        placeholder="Masukkan nama klien" value="{{ old('name') }}">
                                </div>
                                <div>
                                    <label for="job_title" class="form-label">Jabatan</label>
                                    <input type="text" id="job_title" name="job_title" class="form-input"
                                        placeholder="Masukkan jabatan" value="{{ old('job_title') }}">
                                </div>
                            </div>
                            <!-- Kolom Kanan -->
                            <div class="flex flex-col w-full lg:w-1/2 gap-y-4">
                                <div>
                                    <label for="url" class="form-label">Url</label>
                                    <input type="text" id="url" name="url" class="form-input"
                                        placeholder="Masukkan url" value="{{ old('url') }}">
                                </div>
                                <div>
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-input">
                                        <option value="Publik" {{ old('status') == 'Publik' ? 'selected' : '' }}>Publik
                                        </option>
                                        <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col gap-x-4 mb-6 mt-6">
                            <!-- Kolom Kanan untuk Gambar -->
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
                                            Seret dan letakkan file di sini atau
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

                        <div class="flex gap-5 mt-6">
                            <button type="submit"
                                class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                            <a href="{{ route('klien.index') }}" class="btn b-solid btn-secondary-solid">Kembali</a>
                        </div>
                    </form>

                    <script>
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
                </div>
            </div>
        </div>
    </div>
@endsection
