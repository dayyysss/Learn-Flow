@extends('lfcms.layouts.app')
@section('page_title', 'LearnFlow CMS | Dashboard')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="grid grid-cols-12 gap-x-4">
        <!-- Start Dashboard Overview -->
        <div class="col-span-full card p-3 sm:p-7">
            <div class="flex-center-between flex-col sm:flex-row items-start sm:items-center gap-3 pb-3 sm:pb-7">
                <div>
                    <h6 class="card-title isd">Dashboard Learn Flow</h6>
                    <p class="card-description">Welcome to Learn Flow Dashboard</p>
                </div>
                <div class="flex items-center gap-4">
                    <select class="form-input form-select form-select-calendar h-[42px]">
                        <option>Monthly</option>
                        <option>Weekly</option>
                        <option>Daily</option>
                        <option>Yearly</option>
                    </select>
                    <div>
                        <a href="create-course.html" class="btn b-solid btn-primary-solid dk-theme-card-square">
                            <i class="ri-add-circle-line text-inherit"></i>
                            Tambah Kursus
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <!-- Total Courses -->
                <div class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                    <div class="flex-center-between">
                        <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Semua Kursus</h6>
                        <select class="form-input form-select form-select-sm">
                            <option>Monthly</option>
                            <option>Weekly</option>
                            <option>Daily</option>
                        </select>
                    </div>
                    <div class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
                        <div class="shrink-0">
                            <div class="card-title text-[32px]">
                                <div class="counter-value" data-value="2190">0</div>
                            </div>
                            <div class="leading-none text-gray-500 dark:text-dark-text mt-2">
                                <span class="text-lg font-semibold text-primary-500">+0.9%</span>
                                from last month
                            </div>
                        </div>
                        <div class="max-w-[100px]">
                            <div id="total-course-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Total Mentors -->
                <div class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                    <div class="flex-center-between">
                        <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Total Instruktur</h6>
                        <select class="form-input form-select form-select-sm">
                            <option>Monthly</option>
                            <option>Weekly</option>
                            <option>Daily</option>
                        </select>
                    </div>
                    <div class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
                        <div class="shrink-0">
                            <div class="card-title text-[32px]">
                                <div class="counter-value" data-value="140">0</div>
                            </div>
                            <div class="leading-none text-gray-500 dark:text-dark-text mt-2">
                                <span class="text-lg font-semibold text-danger">-0.3%</span>
                                from last month
                            </div>
                        </div>
                        <div class="max-w-[100px]">
                            <div id="total-instructor-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Total Students -->
                <div class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                    <div class="flex-center-between">
                        <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Total Siswa</h6>
                        <select class="form-input form-select form-select-sm">
                            <option>Monthly</option>
                            <option>Weekly</option>
                            <option>Daily</option>
                        </select>
                    </div>
                    <div class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
                        <div class="shrink-0">
                            <div class="card-title text-[32px]">
                                <span class="counter-value" data-value="13.2">0</span>k                                    
                            </div>
                            <div class="leading-none text-gray-500 dark:text-dark-text mt-2">
                                <span class="text-lg font-semibold text-success">+0.5%</span>
                                from last month
                            </div>
                        </div>
                        <div class="max-w-[100px]">
                            <div id="total-student-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Total Enroll -->
                <div class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                    <div class="flex-center-between">
                        <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Total Kursus Terdaftar</h6>
                        <select class="form-input form-select form-select-sm">
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Daily</option>
                        </select>
                    </div>
                    <div class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
                        <div class="shrink-0">
                            <div class="card-title text-[32px]">
                                <span class="counter-value" data-value="2.5">0</span>k                                    
                            </div>
                            <div class="leading-none text-gray-500 dark:text-dark-text mt-2">
                                <span class="text-lg font-semibold text-primary-500">+0.6%</span>
                                from last week
                            </div>
                        </div>
                        <div class="max-w-[100px]">
                            <div id="total-enroll-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dashboard Overview -->

        <!-- Start Average Course Selling Chart -->
        <div class="col-span-full 2xl:col-span-7 card">
            <div class="flex-center-between">
                <h6 class="card-title">Penjualan kursus rata-rata</h6>
                <select class="form-input form-select">
                    <option>This Month</option>
                    <option>This Year</option>
                    <option>This Week</option>
                </select>
            </div>
            <div id="average-course-selling-chart"></div>
        </div>
        <!-- End Average Course Selling Chart -->

        <!-- Start Top Selling Course -->
        <div class="col-span-full 2xl:col-span-5 card">
            <div class="flex-center-between">
                <h6 class="card-title">Kursus terlaris</h6>
                <a href="#" class="btn b-solid btn-primary-solid btn-sm dk-theme-card-square">See all</a>
            </div>
            <!-- Course Table -->
            <div class="overflow-x-auto scrollbar-table mt-5">
                <table class="table-auto w-full whitespace-nowrap text-left text-xs text-gray-500 dark:text-dark-text font-semibold leading-none">
                    <thead class="">
                        <tr>
                            <th class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Course</th>
                            <th class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Publish on</th>
                            <th class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Enrolled</th>
                            <th class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dashed divide-gray-200 dark:divide-dark-border-three">
                        <tr>
                            <td class="flex items-center gap-2 px-3.5 py-4">
                                <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                    <img src="assets/images/admin/top-course/top-course-4.png" alt="thumb">
                                </a>
                                <div>
                                    <h6 class="text-heading font-semibold mb-1.5 line-clamp-1">
                                        <a href="#">Advanced JavaScript Techniques...</a>
                                    </h6>
                                    <p class="font-normal">Author - Alex Smith</p>
                                </div>
                            </td>
                            <td class="px-3.5 py-4">10 Mar 2024</td>
                            <td class="px-3.5 py-4">8.1k</td>
                            <td class="px-3.5 py-4">$35.00</td>
                        </tr>
                        <tr>
                            <td class="flex items-center gap-2 px-3.5 py-4">
                                <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                    <img src="assets/images/admin/top-course/top-course-5.png" alt="thumb">
                                </a>
                                <div>
                                    <h6 class="text-heading font-semibold mb-1.5 line-clamp-1">
                                        <a href="#">Introduction to Python...</a>
                                    </h6>
                                    <p class="font-normal">Author - Lisa White</p>
                                </div>
                            </td>
                            <td class="px-3.5 py-4">25 Mar 2024</td>
                            <td class="px-3.5 py-4">10.2k</td>
                            <td class="px-3.5 py-4">$22.00</td>
                        </tr>
                        <tr>
                            <td class="flex items-center gap-2 px-3.5 py-4">
                                <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                    <img src="assets/images/admin/top-course/top-course-6.png" alt="thumb">
                                </a>
                                <div>
                                    <h6 class="text-heading font-semibold mb-1.5 line-clamp-1">
                                        <a href="#">Graphic Design Masterclass...</a>
                                    </h6>
                                    <p class="font-normal">Author - Mike Johnson</p>
                                </div>
                            </td>
                            <td class="px-3.5 py-4">05 Apr 2024</td>
                            <td class="px-3.5 py-4">4.7k</td>
                            <td class="px-3.5 py-4">$45.00</td>
                        </tr>
                        <tr>
                            <td class="flex items-center gap-2 px-3.5 py-4">
                                <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                    <img src="assets/images/admin/top-course/top-course-7.png" alt="thumb">
                                </a>
                                <div>
                                    <h6 class="text-heading font-semibold mb-1.5 line-clamp-1">
                                        <a href="#">Data Science Essentials...</a>
                                    </h6>
                                    <p class="font-normal">Author - Sarah Lee</p>
                                </div>
                            </td>
                            <td class="px-3.5 py-4">20 Apr 2024</td>
                            <td class="px-3.5 py-4">6.3k</td>
                            <td class="px-3.5 py-4">$40.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Top Selling Course -->

        <!-- Start Top Instructor -->
        <div class="col-span-full 2xl:col-span-5 card">
            <div class="flex-center-between">
                <h6 class="card-title">Instruktur Teratas</h6>
                <select class="form-input form-select">
                    <option>This Month</option>
                    <option>This Year</option>
                    <option>This Week</option>
                </select>
            </div>
            <!-- Intructor List -->
            <ul class="divide-y divide-dashed divide-gray-200 dark:divide-dark-border-three space-y-3 mt-5">
                <li class="flex-center-between pt-3 last:pt-0">
                    <div class="flex items-center gap-3">
                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                            <img src="assets/images/instructor/instructor-1.png" alt="instructor">
                        </a>
                        <div>
                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                <a href="#">Ronald Richards</a>
                            </h6>
                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">90+ Courses</p>
                        </div>
                    </div>
                    <div class="ms-auto mr-5">
                        <div class="flex items-center gap-2">
                            <div class="text-heading font-semibold dark:text-dark-text leading-none">4.8</div>
                            <div class="flex items-center">
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
                        <i class="ri-arrow-right-line text-inherit text-[14px]"></i>
                    </a>
                </li>
                <li class="flex-center-between pt-3 last:pt-0">
                    <div class="flex items-center gap-3">
                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                            <img src="assets/images/instructor/instructor-2.png" alt="instructor">
                        </a>
                        <div>
                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                <a href="#">Jane Doe</a>
                            </h6>
                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">120+ Courses</p>
                        </div>
                    </div>
                    <div class="ms-auto mr-5">
                        <div class="flex items-center gap-2">
                            <div class="text-heading font-semibold dark:text-dark-text leading-none">4.7</div>
                            <div class="flex items-center">
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
                        <i class="ri-arrow-right-line text-inherit text-[14px]"></i>
                    </a>
                </li>
                <li class="flex-center-between pt-3 last:pt-0">
                    <div class="flex items-center gap-3">
                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                            <img src="assets/images/instructor/instructor-3.png" alt="instructor">
                        </a>
                        <div>
                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                <a href="#">Michael Johnson</a>
                            </h6>
                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">75+ Courses</p>
                        </div>
                    </div>
                    <div class="ms-auto mr-5">
                        <div class="flex items-center gap-2">
                            <div class="text-heading font-semibold dark:text-dark-text leading-none">4.5</div>
                            <div class="flex items-center">
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-line text-star-mail text-[14px]"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
                        <i class="ri-arrow-right-line text-inherit text-[14px]"></i>
                    </a>
                </li>
                <li class="flex-center-between pt-3 last:pt-0">
                    <div class="flex items-center gap-3">
                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                            <img src="assets/images/instructor/instructor-4.png" alt="instructor">
                        </a>
                        <div>
                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                <a href="#">Emily Davis</a>
                            </h6>
                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">50+ Courses</p>
                        </div>
                    </div>
                    <div class="ms-auto mr-5">
                        <div class="flex items-center gap-2">
                            <div class="text-heading font-semibold dark:text-dark-text leading-none">4.6</div>
                            <div class="flex items-center">
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-line text-star-mail text-[14px]"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
                        <i class="ri-arrow-right-line text-inherit text-[14px]"></i>
                    </a>
                </li>
                <li class="flex-center-between pt-3 last:pt-0">
                    <div class="flex items-center gap-3">
                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                            <img src="assets/images/instructor/instructor-5.png" alt="instructor">
                        </a>
                        <div>
                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                <a href="#">Sophia Brown</a>
                            </h6>
                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">30+ Courses</p>
                        </div>
                    </div>
                    <div class="ms-auto mr-5">
                        <div class="flex items-center gap-2">
                            <div class="text-heading font-semibold dark:text-dark-text leading-none">4.9</div>
                            <div class="flex items-center">
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
                        <i class="ri-arrow-right-line text-inherit text-[14px]"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Top Instructor -->

        <!-- Start Learn Activity -->
        <div class="col-span-full 2xl:col-span-7 card">
            <div class="flex-center-between">
                <h6 class="card-title">Aktifitas Lainnya</h6>
                <select class="form-input form-select">
                    <option>This Month</option>
                    <option>This Year</option>
                    <option>This Week</option>
                </select>
            </div>
            <div id="learn-activity-chart"></div>
        </div>
        <!-- End Learn Activity -->

        <!-- Start All Instructor Table -->
        <div class="col-span-full">
            <div class="card">
                <div class="flex-center-between">
                    <h6 class="card-title">Top selling courses</h6>
                    <a href="#" class="btn b-solid btn-primary-solid btn-sm dk-theme-card-square">See all</a>
                </div>
                <div class="overflow-x-auto scrollbar-table mt-5">
                    <table class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                        <thead class="text-heading dark:text-dark-text">
                            <tr>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Name</th>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Course</th>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Publish on</th>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Enrolled</th>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Progress</th>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">Rating</th>
                                <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right w-10">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                            <!-- Table Row -->
                            <tr> 
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                            <img src="assets/images/instructor/instructor-1.png" alt="instructor">
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                <a href="#">Ronald Richards</a>
                                            </h6>
                                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">90+ Courses</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">Web Design</td>
                                <td class="p-6 py-4">2024-02-09</td>
                                <td class="p-6 py-4">3.6K+</td>
                                <td class="p-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                            <div class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[55%]"></div>
                                        </div>
                                        <div class="text-xs leading-none text-gray-500 dark:text-dark-text">46% Growing</div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.8</div>
                                        <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="chatbox.html" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-message-2-line text-inherit text-[13px]"></i>
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
                                                    <a class="popover-item" href="#">View Profile</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Course Details</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">View Analytics</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Delete Course</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row -->
                            <tr>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                            <img src="assets/images/instructor/instructor-1.png" alt="instructor">
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                <a href="#">Jane Doe</a>
                                            </h6>
                                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">120+ Courses</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">Graphic Design</td>
                                <td class="p-6 py-4">2023-11-12</td>
                                <td class="p-6 py-4">4.2K+</td>
                                <td class="p-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                            <div class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[75%]"></div>
                                        </div>
                                        <div class="text-xs leading-none text-gray-500 dark:text-dark-text">75% Growing</div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.9</div>
                                        <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="chatbox.html" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-message-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                        </a>
                                        <div class="relative ml-5">
                                            <button data-popover-target="td-3-1" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                <i class="ri-more-2-fill text-inherit"></i>
                                            </button>
                                            <ul id="td-3-1" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                                <li>
                                                    <a class="popover-item" href="#">View Profile</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Course Details</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">View Analytics</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Delete Course</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row -->
                            <tr>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                            <img src="assets/images/instructor/instructor-2.png" alt="instructor">
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                <a href="#">John Smith</a>
                                            </h6>
                                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">80+ Courses</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">Data Science</td>
                                <td class="p-6 py-4">2024-01-20</td>
                                <td class="p-6 py-4">2.9K+</td>
                                <td class="p-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                            <div class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[65%]"></div>
                                        </div>
                                        <div class="text-xs leading-none text-gray-500 dark:text-dark-text">65% Growing</div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.7</div>
                                        <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="chatbox.html" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-message-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                        </a>
                                        <div class="relative ml-5">
                                            <button data-popover-target="td-3-2" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                <i class="ri-more-2-fill text-inherit"></i>
                                            </button>
                                            <ul id="td-3-2" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                                <li>
                                                    <a class="popover-item" href="#">View Profile</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Course Details</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">View Analytics</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Delete Course</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row -->
                            <tr>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                            <img src="assets/images/instructor/instructor-3.png" alt="instructor">
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                <a href="#">Emily Johnson</a>
                                            </h6>
                                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">60+ Courses</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">Machine Learning</td>
                                <td class="p-6 py-4">2023-12-15</td>
                                <td class="p-6 py-4">3.1K+</td>
                                <td class="p-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                            <div class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[85%]"></div>
                                        </div>
                                        <div class="text-xs leading-none text-gray-500 dark:text-dark-text">85% Growing</div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.6</div>
                                        <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="chatbox.html" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-message-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                        </a>
                                        <div class="relative ml-5">
                                            <button data-popover-target="td-3-3" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                <i class="ri-more-2-fill text-inherit"></i>
                                            </button>
                                            <ul id="td-3-3" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                                <li>
                                                    <a class="popover-item" href="#">View Profile</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Course Details</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">View Analytics</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Delete Course</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row -->
                            <tr>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                            <img src="assets/images/instructor/instructor-4.png" alt="instructor">
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                <a href="#">Michael Brown</a>
                                            </h6>
                                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">50+ Courses</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">Digital Marketing</td>
                                <td class="p-6 py-4">2023-10-18</td>
                                <td class="p-6 py-4">3.4K+</td>
                                <td class="p-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                            <div class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[78%]"></div>
                                        </div>
                                        <div class="text-xs leading-none text-gray-500 dark:text-dark-text">78% Growing</div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.7</div>
                                        <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="chatbox.html" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-message-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                        </a>
                                        <div class="relative ml-5">
                                            <button data-popover-target="td-3-4" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                <i class="ri-more-2-fill text-inherit"></i>
                                            </button>
                                            <ul id="td-3-4" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                                <li>
                                                    <a class="popover-item" href="#">View Profile</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Course Details</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">View Analytics</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Delete Course</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row -->
                            <tr>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                            <img src="assets/images/instructor/instructor-6.png" alt="instructor">
                                        </a>
                                        <div>
                                            <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                <a href="#">Sarah Lee</a>
                                            </h6>
                                            <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">70+ Courses</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">Content Creation</td>
                                <td class="p-6 py-4">2024-03-22</td>
                                <td class="p-6 py-4">5.0K+</td>
                                <td class="p-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                            <div class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[90%]"></div>
                                        </div>
                                        <div class="text-xs leading-none text-gray-500 dark:text-dark-text">90% Growing</div>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.9</div>
                                        <i class="ri-star-s-fill text-star-mail text-[14px]"></i>
                                    </div>
                                </td>
                                <td class="p-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="chatbox.html" class="btn-icon btn-primary-icon-light size-7">
                                            <i class="ri-message-2-line text-inherit text-[13px]"></i>
                                        </a>
                                        <a href="#" class="btn-icon btn-danger-icon-light size-7">
                                            <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                        </a>
                                        <div class="relative ml-5">
                                            <button data-popover-target="td-3-5" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                <i class="ri-more-2-fill text-inherit"></i>
                                            </button>
                                            <ul id="td-3-5" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                                <li>
                                                    <a class="popover-item" href="#">View Profile</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Course Details</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">View Analytics</a>
                                                </li>
                                                <li>
                                                    <a class="popover-item" href="#">Delete Course</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End All Instructor Table -->
    </div>
</div>
@endsection