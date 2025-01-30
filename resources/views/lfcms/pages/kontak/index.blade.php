@extends('lfcms.layouts.app')
@section('page_title', 'Kontak | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Kontak Masuk</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Kontak'])
                    </div>
                    <div class="p-6">
                    <div class="flex-center-between">
                        <div class="flex items-center gap-3">
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5"
                                    onclick="window.location='{{ route('kontak.index') }}'">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                </button>
                                <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input type="text" name="search" value="{{ $search ?? '' }}"
                                        placeholder="Search for..." class="form-input pl-[30px]">
                                </form>
                            </div>
                            <button id="deleteSelected" class="btn b-light btn-danger-light dk-theme-card-square">
                                <i class="ri-delete-bin-line text-inherit text-[13px]"></i>Hapus</button>
                        </div>
                        <div class="overflow-x-auto mt-5">
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
                                            Email</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Topik</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @forelse ($contacts as $contact)
                                        <tr>
                                            <td class="p-6 py-4 text-center justify-center items-center">
                                                <input type="checkbox" class="service-checkbox" value="{{ $contact->id }}">
                                            </td>
                                            <td class="p-6 py-4">
                                                {{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-3.5">
                                                    <div>
                                                        <h6 class="leading-none text-heading font-semibold">
                                                            <a href="#">{{ $contact->name }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-6 py-4">{{ $contact->email }}</td>
                                            <td class="p-6 py-4">{{ $contact->topic }}</td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('kontak.show', $contact->id) }}" 
                                                    class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Lihat & Balas</a>
                                                    
                                                    <a href="{{ route('kontak.destroy', $contact->id) }}" 
                                                    class="btn b-solid btn-danger-solid px-5 dk-theme-card-square"
                                                    onclick="event.preventDefault(); deleteRecord('{{ route('kontak.destroy', $contact->id) }}');">
                                                        Hapus
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="alert alert-danger" style="margin: 20px 0;">
                                                    Data kontak tidak tersedia!
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
                                Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of
                                {{ $contacts->total() }} entries
                            </div>
                            <nav>
                                <ul class="flex items-center gap-1">
                                    <!-- Previous Page Link -->
                                    <li>
                                        <a href="{{ $contacts->previousPageUrl() }}"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-left-s-line text-inherit"></i>
                                        </a>
                                    </li>

                                    <!-- Page Links -->
                                    @foreach ($contacts->getUrlRange(1, $contacts->lastPage()) as $page => $url)
                                        <li>
                                            <a href="{{ $url }}"
                                                class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text {{ $page == $contacts->currentPage() ? 'bg-primary-500 text-white' : '' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <!-- Next Page Link -->
                                    <li>
                                        <a href="{{ $contacts->nextPageUrl() }}"
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
    // Menghandle penghapusan, draft, dan publik
    document.getElementById('deleteSelected').onclick = function() {
           let ids = getSelectedServices();
           if (ids.length > 0 && confirm('Apakah Anda yakin ingin menghapus layanan ini?')) {
               performAction('/lfcms/kontak/bulk-delete', ids);
           } else {
               alert('Silakan pilih data kontak untuk dihapus.');
           }
       };

       document.getElementById('draftSelected').onclick = function() {
           let ids = getSelectedServices();
           if (ids.length > 0) {
               performAction('/lfcms/kontak/bulk-draft', ids);
           } else {
               alert('Silakan pilih data kontak untuk diubah ke draft.');
           }
       };

       document.getElementById('publishSelected').onclick = function() {
           let ids = getSelectedServices();
           if (ids.length > 0) {
               performAction('/lfcms/kontak/bulk-publish', ids);
           } else {
               alert('Silakan pilih data kontak untuk dipublikasikan.');
           }
       };

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
                   location.reload(); // Refresh halaman setelah berhasil
               } else {
                   alert('Terjadi kesalahan. Silakan coba lagi.');
               }
           });
       }
</script>
@endsection
