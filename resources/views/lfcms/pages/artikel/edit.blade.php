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
        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Artikel Information -->
                <div class="col-span-full lg:col-span-7 card">
                    <div class="p-6">
                        <h6 class="card-title text-xl font-semibold mb-4">Edit Artikel</h6>
                        <div class="mt-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-5">
                                <div class="col-span-full">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" id="judul" name="judul"
                                        value="{{ old('judul', $artikel->judul) }}" placeholder="Judul Artikel"
                                        class="form-input" required oninput="generateSlug()">
                                </div>
                                <div class="col-span-full">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug"
                                        value="{{ old('slug', $artikel->slug) }}" placeholder="slug" class="form-input"
                                        required readonly>
                                </div>
                                <div class="col-span-full">
                                    <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                    <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3" class="form-input"
                                        placeholder="Deskripsi Singkat" required>{{ old('deskripsi_singkat', $artikel->deskripsi_singkat) }}</textarea>
                                </div>
                                <div class="col-span-full">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="6" class="summernote form-input" placeholder="Deskripsi Lengkap"
                                        required>{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Artikel Information -->

                <!-- Start Artikel Media File -->
                <div class="col-span-full lg:col-span-5 card">
                    <div class="p-6">
                        <h6 class="card-title text-xl font-semibold mb-4">Data Tambahan</h6>
                        <div class="mt-4 flex flex-col gap-5">
                            <div class="col-span-full">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="singleSelect" name="category_id" required>
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
                                    value="{{ old('publish_date', $artikel->publish_date) }}" class="form-input" required>
                            </div>
                            <div class="col-span-full">
                                <label for="status" class="form-label">Status</label>
                                <select class="singleSelect" name="status" id="status" required>
                                    <option value="1" {{ $artikel->status == 1 ? 'selected' : '' }}>Publik</option>
                                    <option value="0" {{ $artikel->status == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="col-span-full">
                                <p class="text-sm text-gray-500 mb-3">Gambar Artikel</p>

                                <!-- Container Preview dan Upload -->
                                <div class="flex items-center gap-4">
                                    <!-- Preview Gambar Lama / Baru -->
                                    <div class="relative">
                                        <img id="image-preview"
                                            src="{{ $artikel->image ? asset('storage/' . $artikel->image) : asset('default-image-placeholder.jpg') }}"
                                            alt="Gambar Artikel" class="w-32 h-32 object-cover rounded-md border">

                                        <!-- Tombol Hapus Gambar -->
                                        <button type="button"
                                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1"
                                            onclick="clearImage()">
                                            &times;
                                        </button>
                                    </div>

                                    <!-- Input Upload -->
                                    <label for="image"
                                        class="flex items-center justify-center border-dashed border-gray-900 dark:border-dark-border rounded-lg cursor-pointer px-4 py-2 bg-gray-100 text-sm">
                                        <input type="file" id="image" name="image" hidden
                                            onchange="previewImage(event)">
                                        <span class="text-gray-600 text-center">Pilih Gambar</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Menambahkan jarak antara upload file dan tombol -->
                            <div class="flex justify-end gap-4 mt-5">
                                <button type="submit" class="btn btn-primary-solid btn-lg">Simpan</button>
                                <a href="{{ route('artikel.index') }}" class="btn btn-secondary-solid btn-lg">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Artikel Media File -->
            </div>
        </form>
    </div>
    </div>

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
