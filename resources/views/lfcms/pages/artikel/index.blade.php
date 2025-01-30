@extends('lfcms.layouts.app')
@section('page_title', 'Artikel | Learn Flow CMS')
@section('content')
    <div
        px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Daftar Artikel</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Artikel'])
                    </div>
                    <div class="p-6">
                        <div class="flex-center-between">
                            <div class="flex items-center gap-5">
                                <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input id="searchInput" type="text" placeholder="Search for..."
                                        class="form-input pl-[30px]">
                                </form>
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <a href="{{ route('artikel.create') }}"
                                class="btn b-light btn-primary-light dk-theme-card-square">
                                <i class="ri-add-fill text-inherit"></i>
                                <span>Tambah Artikel</span>
                            </a>
                        </div>
                        <div class="overflow-x-auto mt-5">
                            <table
                                class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                                <thead>
                                    <tr class="text-primary-500">
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            No</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Judul</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Kategori</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Pembuat</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Status</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dataContainer" class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @foreach ($artikel as $item)
                                        <tr>
                                            <td class="p-6 py-4">{{ $item->id }}</td>
                                            <td class="p-6 py-4">{{ $item->judul }}</td>
                                            <td class="p-6 py-4">{{ $item->category->name }}</td>
                                            <td class="p-6 py-4">{{ $item->user->name }}</td>
                                            <td class="p-6 py-4">
                                                @if ($item->status == 1)
                                                    <span class="badge badge-success-light">Publik</span>
                                                @else
                                                    <span class="badge badge-warning-ligh">Draft</span>
                                                @endif
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('artikel.edit', $item->id) }}"
                                                        class="btn-icon btn-primary-icon-light size-7">
                                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <a href="{{ route('artikel.destroy', $item->id) }}" class="btn-icon btn-danger-icon-light size-7"
                                                    onclick="event.preventDefault(); deleteRecord('{{ route('artikel.destroy', $item->id) }}');">
                                                    <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <div class="relative ml-5">
                                                        <button data-popover-target="td-3-0" data-popover-trigger="click"
                                                            data-popover-placement="bottom-end"
                                                            class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                            <i class="ri-more-2-fill text-inherit"></i>
                                                        </button>
                                                        <ul id="td-3-0"
                                                            class="hidden popover-target invisible [&.visible]:!block"
                                                            data-popover>
                                                            <li>
                                                                <a class="popover-item" href="#">More</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- @include('lfcms.components.pagination.pagination', ['paginator' => $articles]) --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteRecord(url) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Anda tidak akan dapat mengembalikannya!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Dihapus!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    showConfirmButton: true
                }).then((result) => {
                    //jika tombol ok di klik, kembali ke halaman sebelumnya
                    if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                        window.location.href = url;
                    }
                });
            }
        });
    }
</script>
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            const query = this.value.toLowerCase(); // Ambil nilai input pencarian dan ubah ke huruf kecil
            const rows = document.querySelectorAll("#dataContainer tr"); // Ambil semua baris dalam tabel

            rows.forEach(row => {
                const judul = row.children[1].textContent.toLowerCase(); // Ambil kolom judul
                const kategori = row.children[2].textContent.toLowerCase(); // Ambil kolom email

                if (judul.includes(query) || kategori.includes(query)) {
                    row.style.display = ""; // Tampilkan baris
                } else {
                    row.style.display = "none"; // Sembunyikan baris
                }
            });
        });
    </script>
@endsection
