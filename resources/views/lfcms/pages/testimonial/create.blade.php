@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Testimonial | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Course Information -->
                <div class="col-span-full lg:col-span-7 card h-fit">
                    <div class="p-1.5">
                        <h6 class="card-title">Tambah Testimonial</h6>
                        <div class="mt-7 pt-0.5">
                            <div class="grid  gap-y-5">
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="Masukan nama"
                                        class="form-input @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div>

                                <div class="grid mt-3 gap-y-5">
                                    <div class="col-span-full xl:col-auto leading-none">
                                        <label for="profession" class="form-label">Profesi</label>
                                        <input type="text" id="profession" name="profession"
                                            placeholder="Masukan Profesi" class="form-input">
                                    </div>
                                </div>

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
                                <div class="col-span-full mt-3">
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
                            <h6 class="card-title">Data Tambahan</h6>
                            <div class="mt-7 pt-0.5 flex flex-col gap-5">
                                <div class="col-span-full sm:col-span-4">
                                    <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">
                                        Gambar</p>
                                    <label for="image"
                                        class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/3] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                        <input type="file" id="image" name="image" hidden
                                            class="img-src peer/file">
                                        <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                            <span
                                                class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                                <img src="{{ asset('assets/lfcms/images/icons/upload-file.svg') }}"
                                                    alt="icon"
                                                    class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                            </span>
                                            <span class="mt-2 text-gray-500 dark:text-dark-text">Pilih file</span>
                                        </span>
                                    </label>
                                </div>

                                <div class="flex justify-end gap-5 mt-6">
                                    <button type="submit"
                                        class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                                    <a href="{{ route('testimonial.index') }}" class="btn b-solid btn-secondary-solid">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
