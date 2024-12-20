@extends('lfcms.layouts.app')
@section('page_title', 'Halaman | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Data Halaman</h3>
                    @include('lfcms.components.breadcrumb.custom', ['title' => 'Halaman'])
                    </div>
                    <div class="p-6">
                        <div class="flex-center-between">
                            <div class="flex items-center gap-5">
                                <form class="max-w-80 relative">
                                    <span class="absolute top-1/2 -translate-y-[40%] left-2.5">
                                        <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                                    </span>
                                    <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ $search ?? '' }}" 
                                    placeholder="Search for..." 
                                    class="form-input pl-[30px]">
                                </form>
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5"
                                    onclick="window.location='{{ route('halaman.index') }}'">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <button class="btn b-light btn-primary-light dk-theme-card-square" onclick="window.location.href='{{ route('halaman.create') }}'">
                            <i class="ri-add-fill text-inherit"></i>
                            <span>Tambah Halaman</span>
                        </button>
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
                                            Pembuat</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Status</th>
                                        <th
                                            class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                @forelse ($pages as $page)    
                                <tr>
                                <td class="p-6 py-4">{{ $loop->iteration + ($pages->currentPage() - 1) * $pages->perPage() }}</td>
                                    <td class="p-6 py-4">{{ $page->judul }}</</td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-3.5">
                                                <div>
                                                    <h6 class="leading-none text-heading font-semibold">
                                                    {{ $page->users->name ?? 'Tidak Diketahui' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4"> 
                                        <span class="badge 
                                            {{ $page->status == 'Publik' ? 'badge-success-light' : ($page->status == 'draft' ? 'badge-danger-light' : 'badge-warning-light') }}">
                                            {{ $page->status }}
                                        </span>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('halaman.edit', $page->id) }}" class="btn-icon btn-primary-icon-light size-7">
                                                    <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                                </a>
                                                <a href="{{ route('page.destroy', $page->id) }}" 
                                                class="btn-icon btn-danger-icon-light size-7" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus page ini?')">
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
                                Showing {{ $pages->firstItem() }} to {{ $pages->lastItem() }} of {{ $pages->total() }} entries
                            </div>
                            <nav>
                                <ul class="flex items-center gap-1">
                                    <!-- Previous Page Link -->
                                    <li>
                                        <a href="{{ $pages->previousPageUrl() }}"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-left-s-line text-inherit"></i>
                                        </a>
                                    </li>
                                    
                                    <!-- Page Links -->
                                    @foreach ($pages->getUrlRange(1, $pages->lastPage()) as $page => $url)
                                        <li>
                                        <a href="{{ $url }}"
                                        class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text {{ $pages->currentPage() == $page ? 'bg-primary-500 text-white' : '' }}">
                                        {{ $page }}
                                        </a>

                                        </li>
                                    @endforeach
                                    <!-- Next Page Link -->
                                    <li>
                                        <a href="{{ $pages->nextPageUrl() }}"
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
@endsection

