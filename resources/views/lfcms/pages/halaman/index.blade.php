@extends('lfcms.layouts.app')
@section('page_title', 'Learn Flow CMS | Halaman')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
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
                            <!-- Form Pencarian -->
                            <form class="max-w-80 relative" method="GET" action="{{ route('halaman.index') }}">
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
                            <!-- Tombol Refresh -->
                            <button 
                                type="button" 
                                class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5"
                                onclick="window.location='{{ route('halaman.index') }}'">
                                <i class="ri-loop-right-line text-inherit text-sm"></i>
                                <span>Refresh</span>
                            </button>
                        </div>

                        <!-- Tombol Add Data -->
                        <a href="{{ route('halaman.create') }}" class="btn b-light btn-primary-light dk-theme-card-square">
                            <i class="ri-add-fill text-inherit"></i>
                            <span>Add Data</span>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto mt-5">
                    <table class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                        <thead>
                            <tr class="text-primary-500">
                                <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">No</th>
                                <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Judul</th>
                                <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Pembuat</th>
                                <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Status</th>
                                <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $page)
                                <tr>
                                    <td class="p-6 py-4">{{ $loop->iteration + ($pages->currentPage() - 1) * $pages->perPage() }}</td>
                                    <td class="p-6 py-4">{{ $page->judul }}</td>
                                    <td class="p-6 py-4">{{ $page->users->name ?? 'Tidak Diketahui' }}</td>
                                    <td class="p-6 py-4">
                                        <span class="badge {{ $page->status == 'Publik' ? 'badge-success-light' : 'badge-danger-light' }}">
                                            {{ $page->status }}
                                        </span>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('halaman.edit', $page->id) }}" class="btn-icon btn-primary-icon-light size-7">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <form action="{{ route('halaman.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon btn-danger-icon-light size-7">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-danger">
                                            Belum ada data yang masuk!
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
                            @if ($pages->onFirstPage())
                                <li>
                                    <span class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-500 dark:text-dark-text">
                                        <i class="ri-arrow-left-s-line text-inherit"></i>
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $pages->previousPageUrl() }}"
                                        class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                        <i class="ri-arrow-left-s-line text-inherit"></i>
                                    </a>
                                </li>
                            @endif

                            <!-- Page Numbers -->
                            @foreach ($pages->getUrlRange(1, $pages->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}"
                                        class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text {{ $pages->currentPage() == $page ? 'bg-primary-500 text-white' : '' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($pages->hasMorePages())
                                <li>
                                    <a href="{{ $pages->nextPageUrl() }}"
                                        class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                        <i class="ri-arrow-right-s-line text-inherit"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <span class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-500 dark:text-dark-text">
                                        <i class="ri-arrow-right-s-line text-inherit"></i>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- END PAGINATION -->
            </div>
        </div>
    </div>
</div>
@endsection
