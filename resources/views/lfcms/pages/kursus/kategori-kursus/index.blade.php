@extends('lfcms.layouts.app')
@section('page_title', 'Kategori Kursus | Learn Flow CMS')
@section('content')
    <div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Kategori Kursus</h3>
                        @include('lfcms.components.breadcrumb.custom', ['title' => 'Kategori Kursus'])
                    </div>
                    <div class="p-6">
                        <div class="flex-center-between">
                            <div class="flex items-center gap-5">
                                <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search for..." class="form-input pl-[30px]">
                                </form>
                                <button type="button" class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5" onclick="window.location='{{ route('kategori-kursus.index') }}'">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <label for="modalCreateToggle" class="btn b-light btn-primary-light dk-theme-card-square cursor-pointer">
                                <i class="ri-add-fill text-inherit"></i>
                                <span>Tambah Kategori</span>
                            </label>
                        </div>

                        <!-- Filter Section -->
                        <form action="{{ route('kategori-kursus.index') }}" method="GET" class="grid grid-cols-3 gap-4 mt-5">
                            <div>
                                <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 block">KATEGORI</label>
                                <select name="category" onchange="this.form.submit()" class="form-select w-full">
                                    <option value="All" {{ request('category') == 'All' ? 'selected' : '' }}>All</option>
                                    @foreach ($categoryNames as $name)
                                        <option value="{{ $name }}" {{ request('category') == $name ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 block">URUTKAN BERDASARKAN</label>
                                <select name="sort" onchange="this.form.submit()" class="form-select w-full">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 block">STATUS</label>
                                <select name="status" onchange="this.form.submit()" class="form-select w-full">
                                    <option value="All" {{ request('status') == 'All' ? 'selected' : '' }}>Semua</option>
                                    <option value="publik" {{ request('status') == 'publik' ? 'selected' : '' }}>Publik</option>
                                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </form>

                        <div class="overflow-x-auto mt-5">
                            <table class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                                <thead>
                                    <tr class="text-primary-500">
                                        <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg">No</th>
                                        <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Name</th>
                                        <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Status</th>
                                        <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two last:rounded-r-lg">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                    @foreach ($categories as $index => $category)
                                        <tr>
                                            <td class="p-6 py-4">{{ $index + 1 }}</td>
                                            <td class="p-6 py-4">{{ $category->name }}</td>
                                            <td class="p-6 py-4">
                                                <span class="badge {{ $category->status == 'publik' ? 'badge-success-light' : 'badge-warning-light' }}">
                                                    {{ ucfirst($category->status) }}
                                                </span>
                                            </td>
                                            <td class="p-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <a href="javascript:void(0);" 
                                                       class="btn-icon btn-primary-icon-light size-7 edit-category"
                                                       data-id="{{ $category->id }}"
                                                       data-name="{{ $category->name }}"
                                                       data-slug="{{ $category->slug }}"
                                                       data-status="{{ $category->status }}"
                                                       data-action="edit">
                                                        <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <a href="{{ route('kategori-kursus.destroy', $category->id) }}"
                                                       class="btn-icon btn-danger-icon-light size-7"
                                                       onclick="event.preventDefault(); deleteRecord('{{ route('kategori-kursus.destroy', $category->id) }}');">
                                                        <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $category->id }}"
                                                          action="{{ route('kategori-kursus.destroy', $category->id) }}"
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.pages.kategori-kursus.edit')
    @include('dashboard.pages.kategori-kursus.create')

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteRecord(url) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: 'Anda tidak akan dapat mengembalikannya!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Dihapus!',
                        text: 'Data berhasil dihapus.',
                        icon: 'success',
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                            window.location.href = url;
                        }
                    });
                }
            });
        }
    </script>
@endsection