@extends('lfcms.layouts.app')
@section('page_title', 'Klien | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-4">
                    <div class="flex-center-between p-4 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Data Klien</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Klien'])
                    </div>
                    <div class="p-0 mt-5 mb-5">
                            <div class="flex flex-col flex-center-between md:flex-row md:items-center md:justify-between center-between gap-2">
                                <div class="flex flex-wrap items-center gap-1">
                                    <button class="btn b-light btn-primary-light dk-theme-card-square"
                                        onclick="window.location.href='{{ route('klien.create') }}'">
                                        <i class="ri-add-fill text-inherit"></i>
                                        <span>Tambah</span>
                                    </button>
                                    <button class="btn b-light btn-danger-light dk-theme-card-square" id="deleteButton">
                                        <i class="ri-delete-bin-line text-inherit text-[13px]"></i> Hapus
                                    </button>
                                    <button id="publikButton" class="btn b-light btn-success-light dk-theme-card-square">
                                        <i class="ri-arrow-up-line text-inherit text-[13px]"></i>Publik
                                    </button>
                                    <button id="draftButton" class="btn b-light btn-warning-light dk-theme-card-square">
                                        <i class="ri-arrow-down-line text-inherit text-[13px]"></i>Draft
                                    </button>
                                </div>
                                
                                <div class="w-full md:w-auto flex items-center gap-3">
                                    <form class="w-full md:max-w-80 relative">
                                        <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                            <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                        </span>
                                        <input type="text" name="search" value="{{ $search ?? '' }}"
                                            placeholder="Cari data..." class="form-input pl-[30px] w-full md:w-auto">
                                    </form>
                                    <button type="button"
                                        class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5"
                                        onclick="window.location='{{ route('klien.index') }}'">
                                        <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto mt-0">
                            <table
                                class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                                <thead>
                                    <tr class="text-primary-500">
                                        <th class="p-6 py-4 text-center justify-center items-center bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            <input type="checkbox" id="selectAll" class="form-checkbox">
                                        </th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            No</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Nama</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Status</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Gambar</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @forelse ($clients as $client)
                                        <tr>
                                            <td class="p-6 py-4 text-center justify-center items-center">
                                                <input type="checkbox" class="service-checkbox" value="{{ $client->id }}">
                                            </td>
                                            <td class="p-6 py-4">
                                                {{ $loop->iteration + ($clients->currentPage() - 1) * $clients->perPage() }}
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-3.5">
                                                    <a href="#">{{ $client->name }}</a>
                                                </div>
                                            </td>
                                            <td class="p-6 py-4">
                                                <span
                                                    class="badge 
                                            {{ $client->status == 'Publik' ? 'badge-success-light' : ($client->status == 'draft' ? 'badge-warning-light' : 'badge-success-light') }}">
                                                    {{ ucfirst($client->status) }}
                                                </span>
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex flex-col gap-2">
                                                    <a href="#" class="size-12 rounded-50 overflow-hidden">
                                                        <!-- Menggunakan path dinamis dengan direktori public/clients -->
                                                        <img src="{{ Storage::url($client->image) }}" alt="client">
                                                        </a>
                                                </div>
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('klien.edit', $client->id) }}"
                                                        class="btn-icon btn-primary-icon-light size-7">
                                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <a href="{{ route('klien.destroy', $client->id) }}" class="btn-icon btn-danger-icon-light size-7"
                                                    onclick="event.preventDefault(); deleteRecord('{{ route('klien.destroy', $client->id) }}');">
                                                    <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <!-- <form action="{{ route('klien.destroy', $client->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn-icon btn-danger-icon-light size-7"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus klien ini?')">
                                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                        </button>
                                                    </form> -->
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger" style="margin: 20px 0;">
                                                Data Tidak Tersedia!
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- START PAGINATION -->
                        <div class="flex-center-between mt-5">
                            <div class="font-spline_sans text-sm text-gray-900 dark:text-dark-text">
                                Showing {{ $clients->firstItem() }} to {{ $clients->lastItem() }} of {{ $clients->total() }} entries
                            </div>
                            <nav>
                                <ul class="flex items-center gap-1">
                                    <!-- Previous Page Link -->
                                    <li>
                                        <a href="{{ $clients->previousPageUrl() }}"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-left-s-line text-inherit"></i>
                                        </a>
                                    </li>
                                    
                                    <!-- Page Links -->
                                    @foreach ($clients->getUrlRange(1, $clients->lastPage()) as $page => $url)
                                        <li>
                                            <a href="{{ $url }}"
                                                class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text {{ $page == $clients->currentPage() ? 'bg-primary-500 text-white' : '' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <!-- Next Page Link -->
                                    <li>
                                        <a href="{{ $clients->nextPageUrl() }}"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-right-s-line text-inherit"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.success-message');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000); // 5 detik
            });
        });
    </script>

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


    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("deleteButton").addEventListener("click", function() {
                deleteSelectedRecords();
            });
        });

        function deleteSelectedRecords() {
            let ids = getSelectedServices(); // Ambil ID yang dipilih
            if (ids.length === 0) {
                Swal.fire({
                    title: 'Pilih data terlebih dahulu!',
                    text: 'Silakan pilih klien untuk dihapus.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dipilih akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performAction('/lfcms/klien/bulk-delete', ids); // Jalankan bulk delete

                    Swal.fire({
                        title: 'Dihapus!',
                        text: 'Data berhasil dihapus.',
                        icon: 'success',
                        showConfirmButton: true
                    });
                }
            });
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("publikButton").addEventListener("click", function() {
                publikSelectedRecords();
            });
        });

        function publikSelectedRecords() {
            let ids = getSelectedServices(); // Ambil ID yang dipilih
            if (ids.length === 0) {
                Swal.fire({
                    title: 'Pilih data terlebih dahulu!',
                    text: 'Silakan pilih klien untuk dipublish.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dipilih akan dipublish!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B8D576',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Publish!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performAction('/lfcms/klien/bulk-publish', ids); // Jalankan bulk publish

                    Swal.fire({
                        title: 'Dipublish!',
                        text: 'Data berhasil dipublish.',
                        icon: 'success',
                        showConfirmButton: true
                    });
                }
            });
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("draftButton").addEventListener("click", function() {
                draftSelectedRecords();
            });
        });

        function draftSelectedRecords() {
            let ids = getSelectedServices(); // Ambil ID yang dipilih
            if (ids.length === 0) {
                Swal.fire({
                    title: 'Pilih data terlebih dahulu!',
                    text: 'Silakan pilih klien untuk didraft.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dipilih akan didraft!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FBA518',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Draft!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performAction('/lfcms/klien/bulk-draft', ids); // Jalankan bulk publish

                    Swal.fire({
                        title: 'Didraft!',
                        text: 'Data berhasil didraft.',
                        icon: 'success',
                        showConfirmButton: true
                    });
                }
            });
        }
    </script>
    
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
                        //jika tombol ok di klik, kembali ke klien sebelumnya
                        if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                            window.location.href = url;
                        }
                    });
                }
            });
        }
    </script>

<script>
    // Menghandle checkbox

       document.getElementById('selectAll').onclick = function() {
           const checkboxes = document.querySelectorAll('.service-checkbox');
           checkboxes.forEach((checkbox) => {
               checkbox.checked = this.checked;
           });
       };

       function getSelectedServices() {
           return Array.from(document.querySelectorAll('.service-checkbox:checked')).map(cb => cb.value);
       }

       function performAction(url, ids) {
           // Kirim request AJAX ke server
           fetch(url, {
               method: 'POST',
               headers: {
                   'Content-Type': 'application/json',
                   'X-CSRF-TOKEN': '{{ csrf_token() }}'
               },
               body: JSON.stringify({ ids: ids })
           }).then(response => {
               if (response.ok) {
                   location.reload(); // Refresh klien setelah berhasil
               } else {
                   alert('Terjadi kesalahan. Silakan coba lagi.');
               }
           });
       }
</script>

@endsection
