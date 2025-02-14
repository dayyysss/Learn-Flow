@extends('lfcms.layouts.app')
@section('page_title', 'Edit Artikel | Learn Flow CMS')
@section('content')
    <style>
        /* Tag */
        .tagsinput {
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            align-items: center;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            background-color: #009688;
            color: white;
            padding: 5px 8px;
            border-radius: 3px;
            margin: 2px;
        }

        .tag-remove {
            margin-left: 5px;
            cursor: pointer;
            background: transparent;
            border: none;
            color: white;
        }

        .tag-input {
            border: none;
            outline: none;
            min-width: 120px;
            padding: 5px;
            margin-left: 5px;
        }
    </style>
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Artikel Information -->
                <div class="col-span-full lg:col-span-7 card">
                    <div class="p-6">
                    <div class="flex justify-between items-center gap-5">
                        <!-- Bagian Kiri -->
                        <a href="/lfcms/artikel" class="flex items-center gap-1">
                            <i class="ri-arrow-left-line text-2xl text-heading dark:text-dark-text"></i>
                            <h6 class="card-title">Edit Artikel</h6>
                        </a>

                        <!-- Bagian Kanan -->
                        <div class="flex gap-3">
                            <button type="submit" class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                        </div>
                    </div>                         
                    <div class="mt-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-5">
                                <div class="col-span-full">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" id="judul" name="judul"
                                        value="{{ old('judul', $artikel->judul) }}" placeholder="Judul Artikel"
                                        class="form-input @error('judul') is-invalid @enderror"  oninput="generateSlug()">
                                        @error('judul')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-span-full">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug"
                                        value="{{ old('slug', $artikel->slug) }}" placeholder="slug" class="form-input"
                                     readonly>
                                </div>
                                <div class="col-span-full">
                                    <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                    <textarea 
                                        id="deskripsi_singkat" 
                                        name="deskripsi_singkat" 
                                        rows="3" 
                                        class="form-input @error('deskripsi_singkat') is-invalid @enderror h-[100px]" 
                                        placeholder="Deskripsi Singkat">{{ old('deskripsi_singkat', $artikel->deskripsi_singkat) }}</textarea>
                                    @error('deskripsi_singkat')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-span-full">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="6" class="summernote form-input" placeholder="Deskripsi Lengkap">
                                    {{ old('deskripsi', $artikel->deskripsi)}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Artikel Information -->

                <!-- Start Artikel Media File -->
                <div class="col-span-full lg:col-span-5 card">
                    <div class="p-6">
                        <div class="flex flex-col gap-5">
                            <div class="col-span-full">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="singleSelect" name="category_id" >
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $artikel->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-full">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input type="text" id="keyword" name="keyword"
                                    value="{{ old('keyword', $artikel->keyword) }}" placeholder="Keyword"
                                    class="form-input">
                            </div>
                            <input type="text" name="tag"
                                class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2 tagsinput-revisited"
                                id="tags17273242775951" style="display: none;">
                            <div id="tags17270116427611_tagsinput"
                                class="tagsinput mt-1 mb-4 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2 flex flex-wrap gap-2">
                                <!-- Menampilkan tag yang sudah ada -->
                                @if ($artikel->tag)
                                    @foreach (explode(',', $artikel->tag) as $item)
                                        <span class="tag flex items-center bg-blue-500 text-white rounded px-2 py-1"
                                            id="tag-{{ trim($item) }}">
                                            <span class="tag-text">{{ trim($item) }}</span>
                                            <button type="button"
                                                class="tag-remove ml-2 bg-red-500 rounded-full w-5 h-5 flex items-center justify-center text-white"
                                                onclick="removeTag('{{ trim($item) }}')">&times;</button>
                                        </span>
                                    @endforeach
                                @endif

                                <!-- Input untuk menambahkan tag -->
                                <div id="tags17270116427611_addTag" class="flex items-center">
                                    <input id="tags17270116427611_tag" class="tag-input p-2" value=""
                                        placeholder="Masukan tag" autocomplete="off" onkeypress="addTag(event)">
                                </div>

                                <!-- Input hidden untuk menyimpan tag -->
                                <input type="hidden" name="tag" id="hidden-tags" value="{{ old('tag') }}">
                            </div>
                            <div class="col-span-full">
                                <label for="publish_date" class="form-label">Tanggal publish</label>
                                <input type="date" id="publish_date" name="publish_date"
                                    value="{{ old('publish_date', $artikel->publish_date) }}" class="form-input">
                            </div>
                            <div class="col-span-full">
                                <label for="status" class="form-label">Status</label>
                                <select class="singleSelect" name="status" id="status">
                                    <option value="1" {{ $artikel->status == 1 ? 'selected' : '' }}>Publik</option>
                                    <option value="0" {{ $artikel->status == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
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
                                <div class="file-container text-xs leading-none font-semibold mt-5 mb-3 cursor-pointer aspect-[3/2] flex items-center gap-2.5 dk-border-one border-dashed rounded-10 w-full">
                                        @if($artikel->image)
                                            <div>
                                                <img src="{{ asset('storage/' . $artikel->image) }}" alt="Gambar Halaman" class="w-20 h-20 object-cover ">
                                            </div>
                                            <p class="text-sm text-gray-500 dark:text-dark-text font-semibold">Preview Old Image</p>
                                        @else
                                        <p class="text-gray-500 mt-5 mb-5 flex justify-center items-center">  *Tidak ada gambar</p>
                                        @endif
                                </div>
                    </div>
                </div>
                <!-- End Artikel Media File -->
            </div>
        </form>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.error-message');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000); // 5 detik
            });
        });
    </script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Ganti gambar lama dengan gambar baru
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearImage() {
            const preview = document.getElementById('image-preview');
            const input = document.getElementById('image');

            preview.src = "{{ asset('default-image-placeholder.jpg') }}"; // Reset ke gambar placeholder
            input.value = ""; // Kosongkan input file
        }
        // Fungsi untuk otomatis mengisi slug berdasarkan judul
        function generateSlug() {
            let judul = document.getElementById('judul').value;
            let slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-/, '').replace(/-$/, '');
            document.getElementById('slug').value = slug;
        }

        let selectedTags = [];

        function addTag(event) {
            if (event.key === 'Enter' || event.key === ',') {
                event.preventDefault();
                const tagInput = document.getElementById('tags17270116427611_tag');
                const tagValue = tagInput.value.trim();

                if (tagValue && !selectedTags.includes(tagValue)) {
                    selectedTags.push(tagValue);

                    const tagsContainer = document.getElementById('tags17270116427611_tagsinput');
                    const tagElement = document.createElement('span');
                    tagElement.className = 'tag flex items-center bg-blue-500 text-white rounded px-2 py-1';
                    tagElement.id = `tag-${tagValue}`;
                    tagElement.innerHTML = `
                <span class="tag-text">${tagValue}</span>
                <button type="button" class="tag-remove ml-2 bg-red-500 rounded-full w-5 h-5 flex items-center justify-center text-white" onclick="removeTag('${tagValue}')">&times;</button>
            `;
                    tagsContainer.insertBefore(tagElement, document.getElementById('tags17270116427611_addTag'));

                    // Reset input
                    tagInput.value = '';
                    updateHiddenTags(); // Update hidden input
                }
            }
        }

        // Fungsi untuk menghapus tag
        function removeTag(tagToRemove) {
            const tagElement = document.getElementById(`tag-${tagToRemove}`);
            if (tagElement) {
                tagElement.remove(); // Hapus dari tampilan
            }

            // Hapus dari array selectedTags
            selectedTags = selectedTags.filter(tag => tag !== tagToRemove);
            updateHiddenTags(); // Update hidden input
        }

        function updateHiddenTags() {
            const hiddenTagsInput = document.getElementById('hidden-tags');
            hiddenTagsInput.value = selectedTags.join(',');
        }

        // Inisialisasi selectedTags dengan tags yang ada
        document.addEventListener('DOMContentLoaded', () => {
            const existingTags = document.querySelectorAll('#tags17270116427611_tagsinput .tag-text');
            existingTags.forEach(tagElement => {
                const tagText = tagElement.innerText;
                selectedTags.push(tagText);
            });
        });

        function renderTags(tags) {
            const tagContainer = document.getElementById('tags17270116427611_tagsinput');
            tagContainer.innerHTML = '';

            tags.forEach(tag => {
                const tagElement = document.createElement('span');
                tagElement.className = 'tag';
                tagElement.innerText = tag;
                tagContainer.appendChild(tagElement);
            });
        }

        document.getElementById('tags17270116427611_tag').addEventListener('paste', (event) => {
            event.preventDefault();
            const clipboardData = event.clipboardData || window.clipboardData;
            const pastedData = clipboardData.getData('text');

            const tagValues = pastedData.split(',').map(tag => tag.trim());
            tagValues.forEach(tagValue => {
                if (tagValue && !selectedTags.includes(tagValue)) {
                    selectedTags.push(tagValue);

                    const tagsContainer = document.getElementById('tags17270116427611_tagsinput');
                    const tagElement = document.createElement('span');
                    tagElement.className = 'tag flex items-center bg-blue-500 text-white rounded px-2 py-1';
                    tagElement.id = `tag-${tagValue}`;
                    tagElement.innerHTML = `
                <span class="tag-text">${tagValue}</span>
                <button type="button" class="tag-remove ml-2 bg-red-500 rounded-full w-5 h-5 flex items-center justify-center text-white" onclick="removeTag('${tagValue}')">&times;</button>
            `;
                    tagsContainer.insertBefore(tagElement, document.getElementById(
                        'tags17270116427611_addTag'));
                }
            });

            updateHiddenTags();
        });
    </script>
@endsection
