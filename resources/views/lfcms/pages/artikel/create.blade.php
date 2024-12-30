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
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-12 gap-x-4">
                <!-- Start Artikel Information -->
                <div class="col-span-full lg:col-span-7 card h-fit">
                    <div class="p-6">
                        <h6 class="card-title text-xl font-semibold mb-4">Tambah Artikel</h6>
                        <div class="mt-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-5">
                                <div class="col-span-full">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" id="judul" name="judul" placeholder="Judul Artikel"
                                        class="form-input" required oninput="generateSlug()">
                                </div>
                                <div class="col-span-full">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug" placeholder="slug"
                                        class="form-input" required readonly>
                                </div>
                          
                                <!-- Author input dihapus, dan akan diambil otomatis dari auth()->user()->name -->
                                <div class="col-span-full">
                                    <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                    <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3" class="form-input h-[100px]"
                                        placeholder="Deskripsi Singkat" required></textarea>
                                </div>

                                <div class="col-span-full">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="6" class="summernote form-input" placeholder="Deskripsi Lengkap"
                                        required></textarea>
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
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
                                <select class="singleSelect" name="status" id="status" required>
                                    <option value="1" selected>Publik</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>

                            <div class="col-span-full">
                                <label for="publish_date" class="form-label">Tanggal publish</label>
                                <input type="date" id="publish_date" name="publish_date" class="form-input" required>
                            </div>

                            

                            <div class="col-span-full">
                                <p class="text-sm text-gray-500 mb-3">Gambar</p>
                                <label for="image"
                                    class="file-container ac-bg text-sm font-semibold cursor-pointer aspect-[4/1.5] flex items-center justify-center border-dashed border-gray-900 dark:border-dark-border rounded-lg">
                                    <input type="file" id="image" name="image" hidden
                                        class="img-src peer/file">
                                    <span class="peer-[.uploaded]/file:hidden flex flex-col items-center">
                                        <span class="flex-center bg-primary-200 dark:bg-dark-icon rounded-full p-2">
                                            <img src="{{ asset('assets/lfcms/images/icons/upload-file.svg') }}" alt="icon" class="w-1/2">
                                        </span>
                                        <span class="mt-2 text-gray-500">Pilih File</span>
                                    </span>
                                </label>
                            </div>
                            <!-- Menambahkan jarak antara upload file dan tombol -->
                            <div class="flex gap-5 mt-6">
                                <button type="submit"
                                    class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Simpan</button>
                                <a href="{{ route('artikel.index') }}" class="btn b-solid btn-secondary-solid">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Artikel Media File -->
            </div>
        </form>
    </div>

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
