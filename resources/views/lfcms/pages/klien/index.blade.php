@extends('lfcms.layouts.app')
@section('page_title', 'Klien | Learn Flow CMS')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12">
            <div class="col-span-full">
                <div class="card p-0">
                    <div class="flex-center-between p-6 pb-4 border-b border-gray-200 dark:border-dark-border">
                        <h3 class="text-lg card-title leading-none">Data Klien</h3>
                    @include('lfcms.components.breadcrumb.custom', ['title' => 'Klien'])
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
                                <button type="button"
                                    class="font-spline_sans text-sm px-1 text-gray-900 dark:text-dark-text flex-center gap-1.5">
                                    <i class="ri-loop-right-line text-inherit text-sm"></i>
                                    <span>Refresh</span>
                                </button>
                            </div>
                            <button class="btn b-light btn-primary-light dk-theme-card-square">
                                <i class="ri-add-fill text-inherit"></i>
                                <span>Tambah Klien</span>
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
                                    <tr>
                                        <td class="p-6 py-4">1</td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-3.5">

                                                <div>
                                                    <h6 class="leading-none text-heading font-semibold">
                                                        <a href="#">Eleanor Pena</a>
                                                    </h6>
                                                    <p class="font-spline_sans text-sm font-light mt-1">UX/UI Design</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <span class="badge badge-success-light rounded-full">Publik</span>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex flex-col gap-2">
                                                <a href="#" class="size-12 rounded-50 overflow-hidden">
                                                    <img src="assets/images/student/student-1.png" alt="student">
                                                </a>
                                            </div>
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
                                    <tr>
                                        <td class="p-6 py-4">2</td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-3.5">

                                                <div>
                                                    <h6 class="leading-none text-heading font-semibold">
                                                        <a href="#">Eleanor Pena</a>
                                                    </h6>
                                                    <p class="font-spline_sans text-sm font-light mt-1">UX/UI Design</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <span class="badge badge-warning-light rounded-full">Draft</span>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex flex-col gap-2">
                                                <a href="#" class="size-12 rounded-50 overflow-hidden">
                                                    <img src="assets/images/student/student-1.png" alt="student">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="#" class="btn-icon btn-primary-icon-light size-7">
                                                    <i class="ri-message-2-line text-inherit text-[13px]"></i>
                                                </a>
                                                <a href="#" class="btn-icon btn-danger-icon-light size-7">
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
                                </tbody>
                            </table>
                        </div>
                        <!-- START PAGINATION -->
                        <div class="flex-center-between mt-5">
                            <div class="font-spline_sans text-sm text-gray-900 dark:text-dark-text">Showing 1 to 8 of 20
                                entries</div>
                            <nav>
                                <ul class="flex items-center gap-1">
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text hover:bg-primary-500 hover:text-white dark:bg-dark-card-two">
                                            <i class="ri-arrow-left-s-line text-inherit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text [&.active]:bg-primary-500 [&.active]:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text [&.active]:bg-primary-500 [&.active]:text-white active">2</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text [&.active]:bg-primary-500 [&.active]:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text [&.active]:bg-primary-500 [&.active]:text-white">4</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text [&.active]:bg-primary-500 [&.active]:text-white">
                                            <i class="ri-more-fill text-inherit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 dark:text-dark-text [&.active]:bg-primary-500 [&.active]:text-white">10</a>
                                    </li>
                                    <li>
                                        <a href="#"
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
