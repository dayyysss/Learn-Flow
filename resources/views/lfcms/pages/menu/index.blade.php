@extends('lfcms.layouts.app')

@section('title', 'Menu | SallyCMS')
@section('title2', 'Menu')

@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="flex flex-col md:flex-row gap-5">
        <!-- Sidebar: Tipe Menu -->
        <div class="bg-white md:w-80 w-full h-fit rounded shadow-lg p-4">
            <div class="flex mb-5 justify-between items-center">
                <label>Tipe Menu:</label>
                <div class="w-fit">
                    <button id="openModal" class="btn btn-primary bg-indigo-700 items-center flex">
                        {{-- <x-heroicon-s-plus class="w-4 mr-1 text-white" />Tambah --}}Tambah
                    </button>
                </div>
            </div>
            <div id="menu_type">
                @foreach($menuTypes as $type)
                    <div class="flex items-center justify-between border border-gray-200 p-3">
                        <div class="flex items-center">
                            <input type="radio" id="menu_type_{{ $type->id }}" name="menu_type" value="{{ $type->id }}" class="mr-2 menu-type-item" 
                                   {{ $loop->first ? 'checked' : '' }}>
                            <label class="capitalize" for="menu_type_{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                        <div class="flex">
                            <a href="javascript:void(0)" class="text-blue-600 hover:underline" onclick="openEditModal({{ json_encode($type) }})">
                                {{-- <x-heroicon-o-pencil-square class="w-4 text-cyan-800" /> --}} Edit
                            </a>
                            <form id="deleteForm-{{ $type->id }}"
                                action="{{ route('menu_type.destroy', $type->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <div id="deleteContainer-{{ $type->id }}" style="display:inline;">
                                    <button type="button" class="btn-sm btn-danger delete-button"
                                        onclick="confirmDelete({{ $type->id }})">
                                        {{-- <x-heroicon-o-trash class="w-4 text-cyan-800" /> --}}Delete
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Konten Utama: Menu -->
        <div class="bg-white md:w-7/12 w-full rounded shadow-lg p-4">
            <div class="flex flex-col md:flex-row justify-between flex-wrap-reverse mb-5 md:items-center items-end gap-3">
                <h2 class="mb-2 text-left md:mb-0">Menu</h2>
                <div class="flex gap-3">
                    <button id="saveOrder" class="btn bg-blue-500 btn-primary" style="display: none;">Simpan</button>
                    <a href="/sally/hak-akses" class="flex btn btn-primary bg-blue-500">
                        {{-- <x-heroicon-s-lock-closed class="w-4 mr-1 text-white" />Hak Akses Menu --}} Hak Akses
                    </a>
                    <button id="openModalMenuList" class="btn bg-indigo-700 btn-primary items-center flex">
                        {{-- <x-heroicon-o-plus class="w-4 mr-1 text-white" />Tambah --}} Tambah
                    </button>
                </div>
            </div>
            <div class="dd w-full" id="nestable"></div>
        </div>
    </div>

    @include('lfcms.pages.menu.modal')
</div>

<!-- Tambahkan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Tambahkan JS Nestable2 -->
<script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
<!-- Tambahkan FontAwesome Icon Picker jika diperlukan -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
<!-- Tambahkan Custom JS -->
<script src="{{ asset('assets\lfcms\js\pages\menu.js') }}">

<script>
    $(document).ready(function() {
        // Inisialisasi Nestable
        $('#nestable').nestable();

        // Fungsi untuk menangani perubahan urutan drag and drop
        $('#nestable').on('change', function() {
            $('#saveOrder').show(); // Tampilkan tombol "Simpan Perubahan" setelah ada perubahan urutan
        });

        // Fungsi untuk merender menu secara rekursif
        function renderMenu(menu) {
            let childList = '';

            // Jika ada children, buat ol untuk daftar anak
            if (menu.children && menu.children.length) {
                childList = '<ol class="dd-list">';
                $.each(menu.children, function(i, child) {
                    childList += renderMenu(child); // Panggil fungsi rekursif
                });
                childList += '</ol>';
            }

            // Kembalikan HTML untuk menu ini
            const menuHTML = `
                <li class="dd-item" data-id="${menu.id}">
                    <div class="flex">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="flex pl-7 flex-1 dd1-content justify-between">
                            ${menu.name}
                            <div class="flex">
                                <a href="javascript:void(0)" class="text-blue-600 hover:underline" onclick='openEditModalList(${JSON.stringify(menu)})'>
                                    
                                </a>
                                <form action="{{ route('menu.destroy', '') }}/${menu.id}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                       
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    ${childList} <!-- Tambahkan daftar anak jika ada -->
                </li>
            `;

            return menuHTML; // Kembalikan hasil HTML untuk menu ini
        }

        // Fungsi untuk memuat data menu awal
        function loadMenuData(data) {
            let html = '<ol class="dd-list">';
            $.each(data, function(i, menu) {
                html += renderMenu(menu);
            });
            html += '</ol>';
            $('#nestable').html(html); // Isi ulang HTML elemen dengan ID nestable
        }

        // Muat data menu awal
        let nestedMenus = @json($nestedMenus); // Menjadikan data Blade ke JavaScript
        loadMenuData(nestedMenus);

        // Menangani klik tombol simpan
        $('#saveOrder').click(function() {
            const serializedData = $('#nestable').nestable('serialize');
            $.ajax({
                url: "{{ route('menu.updateOrder') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    menu: serializedData
                },
                success: function(response) {
                    alert('Urutan menu berhasil disimpan!');
                    $('#saveOrder').hide(); // Sembunyikan tombol setelah berhasil disimpan
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Ini akan menampilkan error dari server
                    alert('Terjadi kesalahan saat menyimpan urutan menu: ' + xhr.responseText);
                }
            });
        });

        // Fungsi untuk memuat menu berdasarkan tipe menu yang dipilih
        $('input[name="menu_type"]').change(function() {
            const menuType = $(this).val(); // Ambil ID tipe menu dari value

            $.ajax({
                url: "{{ route('menu.index') }}",
                type: 'GET',
                data: { menu_type: menuType },
                success: function(data) {
                    console.log(data); // Cek data yang diterima
                    loadMenuData(data); // Panggil loadMenuData untuk menghindari duplikasi
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching menu data:', error);
                }
            });
        });
    });
</script>



    
<style>
    .dd-empty {
        display: none;
    }

    .modal-back {
        display: none;
        position: fixed; /* Agar modal tetap fixed pada layar */
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Untuk latar belakang gelap */
        display: flex; /* Flexbox untuk memastikan modal tetap di tengah */
        justify-content: center; /* Pusatkan modal secara horizontal */
        align-items: center; /* Pusatkan modal secara vertikal */
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 400px; /* Atur lebar modal */
        max-width: 90%; /* Pastikan modal responsif pada layar kecil */
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .close,
    .close-tambahMenu,
    .close-tambah,
    .close-edit {
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .modal-footer {
        display: flex;
        justify-content: end;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-top: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .dd-item > button {
        margin-left: 65px;
        position: absolute;
    }

    .dd1-content {
        background: #fafafa;
        position: relative;
        border: 1px solid #d8d5d5;
        margin: 5px 0;
        padding: 5px 10px;
        height: 30px;
        box-sizing: border-box;
        color: #333;
        text-decoration: none;
        font-weight: 700;
        border-radius: 0px 3px 3px 0px;
    }

    .dd-handle {
        display: block;
        position: relative;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #ccc;
        background: #140142;
        border-radius: 3px 0px 0px 3px;
        box-sizing: border-box;
    }

    .dd3-handle::before {
        content: "≡";
        display: flex;
        justify-content: center;
        color: #fff;

    /* position: absolute; */
        text-align: center;
        text-indent: 0px;
        left: 0;
        font-size: 20px;
        font-weight: 400;

    }

    .btn {
        padding: 5px 10px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-secondary {
        background-color: #6c757d;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>

<!-- FontAwesome -->
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan terhapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`{{ url('/lfcms/menu_type') }}/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status === "success") {
                            Swal.fire(
                                'Terhapus!',
                                data.message,
                                'success'
                            ).then(() => {
                                window.location.href = data
                                .redirect_url; // Redirect ke halaman indeks
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data tidak berhasil dihapus.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus data. ' + error,
                            'error'
                        );
                        console.error('Error:', error);
                    });
            }
        });
    }
</script>


@endsection
