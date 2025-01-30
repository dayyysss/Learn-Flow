@extends('lfcms.layouts.app')

@section('title', 'Menu | SallyCMS')
@section('title2', 'Menu')

@section('content')

    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="flex flex-col md:flex-row gap-5">
            <!-- Sidebar: Tipe Menu -->
            <div class="bg-white md:w-80 w-full h-fit rounded shadow-lg p-4 dark:bg-dark-card-two">
                <div class="tipe-menu flex mb-5 justify-between items-center">
                    <label>Kategori Kursus</label>
                </div>

                <div id="categorySelectContainer" class="flex flex-col gap-4">
                    @foreach($categories as $category)
                        <div class="flex items-center">
                            <input type="radio" id="category_{{ $category->id }}" name="category_id"
                                value="{{ $category->id }}" class="form-radio h-5 w-5 text-blue-600"
                                {{ $category->id == $selectedCategoryId ? 'checked' : '' }}>
                            <label for="category_{{ $category->id }}" class="ml-2 capitalize">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Konten Utama: Menu -->
            <div class="bg-white md:w-7/12 w-full rounded dark:bg-dark-card-two shadow-lg p-4">
                <div id="roadmapsContainer" class="dd">
                    <ol class="dd-list">
                        <!-- Roadmaps will be dynamically loaded here -->
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan JS Nestable2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <!-- Tambahkan FontAwesome Icon Picker jika diperlukan -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
    <!-- Tambahkan Custom JS -->
    <script src="{{ asset('assets/lfcms/js/pages/menu.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Nestable
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target);
                var output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); // Output to hidden field
                } else {
                    alert('JSON browser support required for this demo.');
                }
            };

            // Ketika kategori berubah
            $('input[name="category_id"]').on('change', function() {
                var categoryId = $(this).val();

                // Kirim request AJAX
                $.ajax({
                    url: '{{ route('roadmap.index') }}', // Sesuaikan dengan rute yang kamu gunakan
                    method: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    success: function(response) {
                        // Update tampilan roadmap dan pilih kategori yang dipilih
                        $('#roadmapsContainer .dd-list').html('');
                        response.roadmaps.forEach(function(roadmap) {
                            var item = $('<li class="dd-item" data-id="' + roadmap.id + '">')
                                .append('<div class="dd-handle">' + roadmap.name + '</div>');
                            $('#roadmapsContainer .dd-list').append(item);
                        });

                        // Re-inisialisasi Nestable setelah konten baru ditambahkan
                        $('#roadmapsContainer').nestable({
                            group: 1
                        }).on('change', updateOutput);
                    }
                });
            });
        });
    </script>

@endsection
