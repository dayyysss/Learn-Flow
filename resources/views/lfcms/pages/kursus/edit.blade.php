@extends('lfcms.layouts.app')
@section('page_title', 'LearnFlow CMS | Dashboard')
@section('content')
    <div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <form id="courseForm" action="{{ route('kursus.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Course Information -->
                <div class="col-span-full lg:col-span-7 card">
                    <div class="p-1.5">
                        <h6 class="card-title">Edit Kursus</h6>
                        <div class="mt-7 pt-0.5">
                            <div class="grid grid-cols-2 gap-x-4 gap-y-5">
                                <div class="col-span-full">
                                    <label for="courseTitle" class="form-label">Nama Kursus</label>
                                    <input type="text" id="name" name="name" placeholder="Course Title"
                                        class="form-input" value="{{ old('name', $course->name) }}" required>
                                </div>
                                <div class="flex col-span-full gap-x-4 w-100 w-full">
                                    <div class="w-full gap-x-4">
                                        <label for="courseInstructor" class="form-label">Slug</label>
                                        <input type="text" id="slug" name="slug" value="{{ old('slug', $course->slug) }}"
                                            placeholder="Slug" class="form-input" required>
                                    </div>
                                    <div class="">
                                        <label for="courseInstructor" class="form-label">Kode Seri</label>
                                        <input type="text" id="kode_seri" name="kode_seri"
                                            value="{{ old('kode_seri', $course->kode_seri) }}" placeholder="-"
                                            class="form-input" required>
                                    </div>
                                </div>
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label class="form-label">Kategori</label>
                                    <select class="singleSelect" name="categories_id">
                                        <option disabled {{ $course->categories_id ? '' : 'selected' }}>Pilih kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $course->categories_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-full xl:col-auto leading-none">
                                    <label class="form-label">Level</label>
                                    <select class="singleSelect" name="tingkatan">
                                      <option selected disabled>Pilih Level</option>
                                      <option value="Beginner" {{ $course->tingkatan == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                      <option value="Intermediate" {{ $course->tingkatan == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                      <option value="Advanced" {{ $course->tingkatan == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                      <option value="Specialist" {{ $course->tingkatan == 'Specialist' ? 'selected' : '' }}>Specialist</option>
                                      <option value="Expert" {{ $course->tingkatan == 'Expert' ? 'selected' : '' }}>Expert</option>
                                      <option value="Professional" {{ $course->tingkatan == 'Professional' ? 'selected' : '' }}>Professional</option>
                                  </select>
                                </div>
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label for="courseInstructor" class="form-label">Waktu Mulai</label>
                                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" placeholder="Waktu Mulai"
                                        value="{{ old('tanggal_mulai', $course->tanggal_mulai) }}" class="form-input"
                                        required>
                                </div>
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label class="form-label">Instruktur</label>
                                    <select class="singleSelect" name="instruktur_id">
                                        <option value="">Pilih Instruktur</option>
                                        @foreach ($instruktur as $ins)
                                            <option value="{{ $ins->id }}" {{ $course->instruktur_id == $ins->id ? 'selected' : '' }}>
                                                {{ $ins->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label class="form-label">Status</label>
                                    <select class="singleSelect" name="status">
                                        <option value="publik" {{ $course->status == 'publik' ? 'selected' : '' }}>Publik</option>
                                        <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="terjadwal" {{ $course->status == 'terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                                    </select>
                                </div>
                                <div class="col-span-full xl:col-auto leading-none">
                                    <label for="berbayar" class="form-label">Paid Course</label>
                                    <div id="berbayar" class="flex items-center gap-x-4" style="margin-top: 15px">
                                        <label class="flex items-center">
                                            <input type="radio" id="free" name="berbayar" value="false" {{ $course->berbayar == 'false' ? 'checked' : '' }}
                                                class="mr-2">
                                            Free
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" id="paid" name="berbayar" value="true" {{ $course->berbayar == 'true' ? 'checked' : '' }}
                                                class="mr-2">
                                            Paid
                                        </label>
                                    </div>
                                </div>

                                <div class="col-span-full xl:col-auto leading-none">
                                    <div class="form-label" id="harga-group" style="display: {{ $course->berbayar == 'true' ? 'block' : 'none' }}">
                                        <label for="harga" class="mb-3 block font-semibold">Price</label>
                                        <input type="text" name="harga" id="harga" class="form-input"
                                            value="{{ old('harga', $course->harga) }}">
                                    </div>
                                </div>

                                <div class="col-span-full xl:col-auto leading-none" id="harga-diskon-group" style="display: {{ $course->harga_diskon ? 'block' : 'none' }}">
                                    <label for="harga_diskon" class="mb-3 block font-semibold form-label">Discount Price</label>
                                    <input type="text" id="harga_diskon" name="harga_diskon" class="form-input"
                                        value="{{ old('harga_diskon', $course->harga_diskon) }}">
                                </div>

                                <div class="col-span-full">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="deskripsi" rows="8" class="summernote form-input">{{ old('deskripsi', $course->deskripsi) }}</textarea>
                                    <div class="flex items-center gap-2 mt-3.5">
                                        <input type="checkbox" name="agreeTermCondition" id="agreeTermCondition"
                                            class="accent-primary-500" {{ old('agreeTermCondition') ? 'checked' : '' }}>
                                        <label for="agreeTermCondition"
                                            class="text-xs leading-none text-gray-500 dark:text-dark-text select-none">I am
                                            totally agree with your term & condition</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Course Media File -->
                <div class="col-span-full lg:col-span-5 card h-fit">
                  <div class="p-1.5">
                      <h6 class="card-title">Data Tambahan</h6>
                      <div class="mt-7 pt-0.5 flex flex-col gap-5">
                          <div class="col-span-full sm:col-span-4">
                              <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">
                                  Thumbnail (548x234)</p>
                              <label for="thumbnailsrc"
                                  class="file-container ac-bg text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                  <input type="file" id="thumbnailsrc" type="file" name="thumbnail" hidden
                                      class="img-src peer/file">
                                  <span class="flex-center flex-col peer-[.uploaded]/file:hidden">
                                      <span
                                          class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                          <img src="{{ asset('assets/lfcms/images/icons/upload-file.svg') }}" alt="icon"
                                              class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                      </span>
                                      <span class="mt-2 text-gray-500 dark:text-dark-text">Choose file</span>
                                  </span>
                              </label>
                          </div>
                          <div class="col-span-full sm:col-span-4">
                              <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Video
                                  Pratinjau</p>

                              <!-- Upload Video File -->
                              <label for="main-file-src"
                                  class="file-container text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                  <input type="file" id="main-file-src" name="video_file" hidden
                                      class="peer/file file-src">
                                  <span class="flex-center flex-col">
                                      <span
                                          class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                          <img src="{{ asset('assets/lfcms/images/icons/upload-file.svg') }}" alt="icon"
                                              class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                      </span>
                                      <span class="file-name text-gray-500 dark:text-dark-text mt-2">Choose file</span>
                                  </span>
                              </label>

                              <!-- Video URL Input -->
                              <div class="mt-4">
                                  <label for="video-url"
                                      class="form-label text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Atau
                                      masukkan URL Video</label>
                                  <input type="url" id="video-url" name="video_url" class="form-input w-full"
                                      placeholder="Enter Video URL" value="{{ old('video', $course->video) }}">
                              </div>
                          </div>

                          <div class="col-span-full sm:col-span-4 mt-2">
                              <p class="text-xs text-gray-500 dark:text-dark-text leading-none font-semibold mb-3">Tanda
                                  Tangan</p>
                              <label for="intro-file-src"
                                  class="file-container text-xs leading-none font-semibold mb-3 cursor-pointer aspect-[4/1.5] flex flex-col items-center justify-center gap-2.5 border border-dashed border-gray-900 dark:border-dark-border rounded-10 dk-theme-card-square">
                                  <input type="file" name="certificate_ttd[]" id="intro-file-src" hidden
                                      class="peer/file file-src">
                                  <span class="flex-center flex-col">
                                      <span
                                          class="size-10 md:size-15 flex-center bg-primary-200 dark:bg-dark-icon rounded-50 dk-theme-card-square">
                                          <img src="{{ asset('assets/lfcms/images/icons/upload-file.svg') }}" alt="icon"
                                              class="dark:brightness-200 dark:contrast-100 w-1/2 sm:w-auto">
                                      </span>
                                      <span class="file-name text-gray-500 dark:text-dark-text mt-2">Choose file</span>
                                  </span>
                              </label>
                          </div>
                          <div class="flex-center w-100 gap-5 w-full">
                              <a href="{{ route('kursus.index') }}"
                                  class="btn w-50 b-solid btn-primary-solid btn-lg dk-theme-card-square">Kembali</a>
                              <button type="submit"
                                  class="btn w-50 b-solid btn-primary-solid btn-lg dk-theme-card-square">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
                <!-- End Course Media File -->
            </div>
        </form>
    </div>

    @include('lfcms.pages.kursus.course-js')
@endsection
