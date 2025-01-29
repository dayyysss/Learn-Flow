@extends('lfcms.layouts.app')
@section('page_title', 'Edit Klien | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <form action="{{ route('klien.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Course Information -->
                <div class="col-span-full lg:col-span-7 card h-auto">
                    <div class="p-1.5">
                        <h6 class="card-title">Edit Klien</h6>
                        <div class="mt-7 pt-0.5">
                            <div class="grid mt-4 gap-y-5">
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="Masukan Nama"
                                        class="form-input @error('name') is-invalid @enderror" value="{{ $client->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div>

                                <div class="grid mt-6 gap-y-5">
                                    <div class="col-span-full xl:col-auto leading-none">
                                        <label for="url" class="form-label">Url</label>
                                        <input type="text" id="url" name="url" placeholder="Masukan url"
                                            class="form-input" value="{{ $client->url }}">
                                    </div>
                                </div>

                                <div class="col-span-full mt-6 xl:col-auto leading-none">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="singleSelect" name="status" id="status">
                                        <option disabled>Pilih Status</option>
                                        <option value="publik" {{ $client->status == 'publik' ? 'selected' : '' }}>Publik</option>
                                        <option value="draft" {{ $client->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                    </select>
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
                            <div class=" pt-0.5 flex flex-col gap-5">
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
                                    <div class="flex items-center gap-4 mt-4">
                                        @if($client->image)
                                            <div>
                                                <img src="{{ asset('storage/' . $client->image) }}" alt="Gambar Klien" class="w-20 h-20 object-cover rounded-md">
                                            </div>
                                            <p class="text-sm text-gray-500 dark:text-dark-text font-semibold">Preview Old Image</p>
                                        @else
                                            <p class="text-gray-500">Tidak ada gambar</p>
                                        @endif
                                    </div>
                                    <div class="flex justify-end gap-5 mt-6">
                            <button type="submit"
                                class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                            <a href="{{ route('klien.index') }}" class="btn b-solid btn-secondary-solid px-5 dk-theme-card-square">Kembali</a>
                             </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course Media File -->
            </div>
        </form>
    </div>
@endsection
