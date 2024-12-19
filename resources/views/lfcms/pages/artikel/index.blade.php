@extends('lfcms.layouts.app')
@section('page_title', 'Artikel | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
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
                                <input type="text" placeholder="Search for..." class="form-input pl-[30px]">
                            </form>
                            <button type="button" class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5">
                                <i class="ri-loop-right-line text-inherit text-sm"></i>
                                <span>Refresh</span>
                            </button>
                        </div>
                        <button class="btn b-light btn-primary-light dk-theme-card-square">
                            <a href="{{route('artikel.create')}}">
                            <i class="ri-add-fill text-inherit"></i>
                            <span>Tambah Artikel</span>
                            </a>
                        </button>
                    </div>
                    <div class="overflow-x-auto mt-5">
                        <table class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                            <thead>
                                <tr class="text-primary-500">
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">No</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Judul</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Kategori</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Pembuat</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Status</th>
                                    <th class="p-6 py-4 bg-[#F2F4F9] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                @foreach ($articles as $item)
                                <tr> 
                                    <td class="p-6 py-4">{{ $item->id }}</td>
                                    <td class="p-6 py-4">{{ $item->judul }}</td>
                                    <td class="p-6 py-4">{{ $item->category->name }}</td>
                                    <td class="p-6 py-4">{{ $item->user->name }}</td>
                                    <td class="p-6 py-4">
                                        @if ($item->status == 1)
                                        <span class="badge badge-success-light rounded-full">Publik</span>
                                        @else
                                        <span class="badge badge-success-light rounded-full">Draft</span>
                                        @endif
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="#" class="btn-icon btn-primary-icon-light size-7">
                                                <i class="ri-edit-2-line text-inherit text-[13px]"></i>
                                            </a>
                                            <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                                <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                            </a>
                                            <div class="relative ml-5">
                                                <button data-popover-target="td-3-0" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-0" class="hidden popover-target invisible [&.visible]:!block" data-popover>
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
@endsection