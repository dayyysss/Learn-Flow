@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Artikel | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-x-4">
            <!-- Start Artikel Information -->
            <div class="col-span-full lg:col-span-7 card">
                <div class="p-1.5">
                    <h6 class="card-title">Tambah Artikel</h6>
                    <div class="mt-7 pt-0.5">
                        <div class="grid  gap-y-5">
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="judul" class="form-label">Judul</label> 
                                <input type="text" id="judul" name="judul" placeholder="Judul Artikel" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" placeholder="slug" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label class="form-label">Kategori</label>
                                <select class="singleSelect" name="category_id">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" id="author" name="author" placeholder="Nama Penulis" class="form-input" required>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3" class="form-input" placeholder="Deskripsi Singkat" required></textarea>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="6" class="summernote form-input" placeholder="Deskripsi Lengkap" required></textarea>
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input type="text" id="keyword" name="keyword" placeholder="Keyword" class="form-input">
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="tag" class="form-label">Tag</label>
                                <input type="text" id="tag" name="tag" placeholder="Tag" class="form-input">
                            </div>
                            <div class="col-span-full xl:col-auto leading-none">
                                <label for="status" class="form-label">Status</label>
                                <select class="singleSelect" name="status" id="status">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="1">Publik</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Artikel Information -->

            <!-- Start Artikel Media File -->
            <div class="col-span-full lg:col-span-5 card">
                <div class="p-1.5">
                    <h6 class="card-title">Add Media Files</h6>
                    <div class="mt-7 pt-0.5 flex flex-col gap-5">
                        <div class="col-span-full sm:col-span-4">
                            <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Thumbnail Image</p>
                            <label for="image" class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                <input type="file" id="image" name="image" hidden class="img-src peer/file">
                                <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                    <span class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                        <img src="assets/images/icons/upload-file.svg" alt="icon" class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                    </span>
                                    <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                                </span>
                            </label>
                        </div>
                        <div class="flex-center !justify-end">
                            <button type="submit" class="btn b-solid btn-primary-solid btn-lg dk-theme-card-square">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Artikel Media File -->
        </div>
    </form>
</div>
@endsection
