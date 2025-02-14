@extends('lfcms.layouts.app')
@section('page_title', 'Tambah Artikel | Learn Flow CMS')
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
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Artikel Information -->
                <div class="col-span-full lg:col-span-7 card h-auto">
                    <div class="p-0">
                    <div class="flex justify-between items-center gap-5">
                        <!-- Bagian Kiri -->
                        <a href="/lfcms/artikel" class="flex items-center gap-1">
                            <i class="ri-arrow-left-line text-2xl text-heading dark:text-dark-text"></i>
                            <h6 class="card-title">Tambah Artikel</h6>
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
                                    <input type="text" id="judul" name="judul" placeholder="Judul Artikel"
                                        class="form-input @error('judul') is-invalid @enderror" oninput="generateSlug()">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-span-full">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug" placeholder="slug"
                                        class="form-input" readonly>
                                </div>
                          
                                <!-- Author input dihapus, dan akan diambil otomatis dari auth()->user()->name -->
                                <div class="col-span-full">
                                    <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                    <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3" class="form-input h-[100px] @error('deskripsi_singkat') is-invalid @enderror"
                                        placeholder="Deskripsi Singkat"></textarea>
                                        @error('deskripsi_singkat')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>

                                <div class="col-span-full">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="6" class="summernote form-input @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Lengkap">

                                    </textarea>
                                    @error('deskripsi')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                     
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Artikel Information -->

                <!-- Start Artikel Media File -->
                <div class="col-span-full lg:col-span-5 card">
                    <div class="p-2">
                        <div class=" flex flex-col gap-5">
                            <div class="col-span-full">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="singleSelect @error('category_id') is-invalid @enderror" name="category_id">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input type="text" id="keyword" name="keyword" placeholder="Keyword"
                                    class="form-input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label block mb-1 font-medium text-gray-700"
                                    for="tag">Tag</label>

                                <div id="tags17270116427611_tagsinput"
                                    class="tagsinput flex flex-wrap gap-2 items-center">
                                    <!-- Tag yang sudah ditambahkan akan muncul di sini -->

                                    <!-- Input untuk menambahkan tag -->
                                    <input id="tags17270116427611_tag" class="tag-input p-2" value=""
                                        placeholder="Masukan tag" autocomplete="off" onkeypress="addTag(event)">


                                    <input type="hidden" name="tag" id="hidden-tags" value="{{ old('tag') }}">
                                </div>
                                <p class="text-xs">*tekan enter untuk memisahkan</p>
                            </div>

                            <div class="col-span-full">
                                <label for="status" class="form-label">Status</label>
                                <select class="singleSelect @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="1" selected>Publik</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('status')
                                            <span class="invalid-feedback" role="alert"  style="color: red;">
                                                {{ $message }}
                                            </span>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="publish_date" class="form-label">Tanggal publish</label>
                                <input type="date" id="publish_date" name="publish_date" class="form-input">
                            </div>

                            

                            <div class="col-span-full">
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
                <!-- End Artikel Media File -->
            </div>
        </form>
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
        // Fungsi untuk otomatis mengisi slug berdasarkan judul
        function generateSlug() {
            let judul = document.getElementById('judul').value;
            let slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-/, '').replace(/-$/, '');
            document.getElementById('slug').value = slug;
        }

        let selectedTags = [];

        function addTag(event) {
            // Handle 'Enter' or ',' key to add tags
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

        // Handle paste (Ctrl + V or any paste action)
        document.getElementById('tags17270116427611_tag').addEventListener('paste', function(event) {
            event.preventDefault(); // Prevent the default paste behavior

            const tagInput = event.target;
            const pastedText = event.clipboardData.getData('Text').trim(); // Get the pasted content

            // Split the pasted text by commas, trim each value, and filter out empty values
            const tagsToAdd = pastedText.split(',').map(tag => tag.trim()).filter(tag => tag.length > 0);

            tagsToAdd.forEach(tag => {
                if (!selectedTags.includes(tag)) {
                    selectedTags.push(tag);

                    const tagsContainer = document.getElementById('tags17270116427611_tagsinput');
                    const tagElement = document.createElement('span');
                    tagElement.className = 'tag flex items-center bg-blue-500 text-white rounded px-2 py-1';
                    tagElement.id = `tag-${tag}`;
                    tagElement.innerHTML = `
                <span class="tag-text">${tag}</span>
                <button type="button" class="tag-remove ml-2 bg-red-500 rounded-full w-5 h-5 flex items-center justify-center text-white" onclick="removeTag('${tag}')">&times;</button>
            `;
                    tagsContainer.insertBefore(tagElement, document.getElementById(
                        'tags17270116427611_addTag'));
                }
            });

            // Clear the input field to ensure no leftover text
            tagInput.value = '';

            // Update hidden input field
            updateHiddenTags();
        });


        // Function to remove a tag
        function removeTag(tagToRemove) {
            const tagElement = document.getElementById(`tag-${tagToRemove}`);
            if (tagElement) {
                tagElement.remove(); // Remove from the view
            }

            // Remove from selectedTags array
            selectedTags = selectedTags.filter(tag => tag !== tagToRemove);
            updateHiddenTags(); // Update hidden input
        }

        function updateHiddenTags() {
            const hiddenTagsInput = document.getElementById('hidden-tags');
            hiddenTagsInput.value = selectedTags.join(','); // Join tags with commas
        }

        // Initialize selectedTags with existing tags (if any)
        document.addEventListener('DOMContentLoaded', () => {
            const existingTags = document.querySelectorAll('#tags17270116427611_tagsinput .tag-text');
            existingTags.forEach(tagElement => {
                const tagText = tagElement.innerText;
                selectedTags.push(tagText);
            });
        });

        function renderTags(tags) {
            const tagContainer = document.getElementById('tags17270116427611_tagsinput');
            tagContainer.innerHTML = ''; // Clear current tags

            tags.forEach(tag => {
                const tagElement = document.createElement('span');
                tagElement.className = 'tag';
                tagElement.innerText = tag;
                tagContainer.appendChild(tagElement);
            });
        }
    </script>
@endsection
