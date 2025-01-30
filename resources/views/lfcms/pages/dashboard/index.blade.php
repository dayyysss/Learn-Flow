@extends('lfcms.layouts.app')
@section('page_title', 'LearnFlow CMS | Dashboard')
@section('content')
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
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
                    <div
                        class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                        <div class="flex-center-between">
                            <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Semua Kursus</h6>
                            <select class="form-input form-select form-select-sm">
                                <option>Monthly</option>
                                <option>Weekly</option>
                                <option>Daily</option>
                            </select>
                        </div>
                        <div
                            class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
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
                    <div
                        class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                        <div class="flex-center-between">
                            <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Total Instruktur</h6>
                            <select class="form-input form-select form-select-sm">
                                <option>Monthly</option>
                                <option>Weekly</option>
                                <option>Daily</option>
                            </select>
                        </div>
                        <div
                            class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
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
                    <div
                        class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                        <div class="flex-center-between">
                            <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Total Siswa</h6>
                            <select class="form-input form-select form-select-sm">
                                <option>Monthly</option>
                                <option>Weekly</option>
                                <option>Daily</option>
                            </select>
                        </div>
                        <div
                            class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
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
                    <div
                        class="col-span-full md:col-span-6 2xl:col-span-3 p-[10px_16px] dk-border-one rounded-xl h-full dk-theme-card-square">
                        <div class="flex-center-between">
                            <h6 class="leading-none text-gray-500 dark:text-dark-text font-semibold">Total Kursus Terdaftar
                            </h6>
                            <select class="form-input form-select form-select-sm">
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Daily</option>
                            </select>
                        </div>
                        <div
                            class="bg-card-pattern dark:bg-card-pattern-dark bg-no-repeat bg-100% flex-center-between gap-4 mt-10">
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
                <!-- linechart -->
                <div class="w-full md:w-100%">
                    <div class="md:px-5 py-10px md:py-0">
                        <div
                            class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark justify-between items-start md:items-center gap-4">
                            <!-- Title Dashboard -->
                            <h2 class="text-lg mt-5 font-bold text-blackColor dark:text-blackColor-dark">
                                Statistik Pengunjung
                            </h2>

                            <h4 id="statistikTitle"
                                class="pt-3 text-sm font-semibold text-blackColor dark:text-blackColor-dark">

                                <!-- Container Utama -->
                                <div class="py-3 flex flex-col gap-4 md:flex-row">
                                    <!-- Dropdown Tipe Filter -->
                                    <div class="w-full md:w-40">
                                        <select id="filterType"
                                            class="w-full md:w-40 border border-lightGrey dark:border-darkGrey rounded-md text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                            <option value="" selected disabled>Pilih Tipe Filter</option>
                                            <option value="bulan-tahun">Bulan dan Tahun</option>
                                            <option value="range-tanggal">Range Tanggal</option>
                                        </select>
                                    </div>

                                    <!-- Box Filter -->
                                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-4 flex-1">
                                        <!-- Filter Bulan dan Tahun -->
                                        <div id="bulanTahunFilter" class="hidden flex flex-col gap-4 md:flex-row md:gap-4">
                                            <div class="flex flex-col md:flex-row items-center gap-3">
                                                <select id="bulan"
                                                    class="w-full md:w-40 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                                            {{ date('m') == $i ? 'selected' : '' }}>
                                                            {{ \Carbon\Carbon::createFromDate(null, $i, 1)->translatedFormat('F') }}
                                                        </option>
                                                    @endfor
                                                </select>

                                                <select id="tahun"
                                                    class="w-full md:w-40 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                    @php
                                                        $startYear = 2024; // Tahun awal pembuatan
                                                        $currentYear = date('Y'); // Tahun saat ini
                                                    @endphp

                                                    @for ($year = $startYear; $year <= $currentYear; $year++)
                                                        <option value="{{ $year }}"
                                                            {{ $currentYear == $year ? 'selected' : '' }}>
                                                            {{ $year }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Filter Range Tanggal -->
                                        <div id="rangeTanggalFilter" class="hidden flex flex-col gap-4">
                                            <input type="text" id="date_range" placeholder="Range Tanggal"
                                                class="w-full md:w-60 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                Statistik Pengunjung - <span
                                    id="statistikValue">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</span>
                            </h4>
                        </div>
                    </div>
                    <div id="lineChart"></div>
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
                    <table
                        class="table-auto w-full whitespace-nowrap text-left text-xs text-gray-500 dark:text-dark-text font-semibold leading-none">
                        <thead class="">
                            <tr>
                                <th
                                    class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                    Course</th>
                                <th
                                    class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                    Publish on</th>
                                <th
                                    class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                    Enrolled</th>
                                <th
                                    class="px-3.5 py-4 bg-[#F4F4F4] dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                    Price</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-dashed divide-gray-200 dark:divide-dark-border-three">
                            <tr>
                                <td class="flex items-center gap-2 px-3.5 py-4">
                                    <a href="#"
                                        class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
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
                                    <a href="#"
                                        class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
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
                                    <a href="#"
                                        class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
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
                                    <a href="#"
                                        class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
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
                                <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">90+
                                    Courses</p>
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
                        <a href="#"
                            class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
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
                                <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">120+
                                    Courses</p>
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
                        <a href="#"
                            class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
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
                                <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">75+
                                    Courses</p>
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
                        <a href="#"
                            class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
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
                                <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">50+
                                    Courses</p>
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
                        <a href="#"
                            class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
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
                                <p class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">30+
                                    Courses</p>
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
                        <a href="#"
                            class="flex-center size-6 h-7 rounded-md text-primary-500 bg-primary-200 dark:bg-dark-icon shrink-0">
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
                        <table
                            class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                            <thead class="text-heading dark:text-dark-text">
                                <tr>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                        Name</th>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                        Course</th>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                        Publish on</th>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                        Enrolled</th>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                        Progress</th>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right">
                                        Rating</th>
                                    <th
                                        class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two first:rounded-l-lg last:rounded-r-lg first:dk-theme-card-square-left last:dk-theme-card-square-right w-10">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                <!-- Table Row -->
                                <tr>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <a href="#"
                                                class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                                <img src="assets/images/instructor/instructor-1.png" alt="instructor">
                                            </a>
                                            <div>
                                                <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                    <a href="#">Ronald Richards</a>
                                                </h6>
                                                <p
                                                    class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">
                                                    90+ Courses</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">Web Design</td>
                                    <td class="p-6 py-4">2024-02-09</td>
                                    <td class="p-6 py-4">3.6K+</td>
                                    <td class="p-6 py-4">
                                        <div class="flex flex-col gap-2">
                                            <div
                                                class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                                <div
                                                    class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[55%]">
                                                </div>
                                            </div>
                                            <div class="text-xs leading-none text-gray-500 dark:text-dark-text">46% Growing
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.8
                                            </div>
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
                                                <button data-popover-target="td-3-0" data-popover-trigger="click"
                                                    data-popover-placement="bottom-end"
                                                    class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-0"
                                                    class="hidden popover-target invisible [&.visible]:!block"
                                                    data-popover>
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
                                            <a href="#"
                                                class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                                <img src="assets/images/instructor/instructor-1.png" alt="instructor">
                                            </a>
                                            <div>
                                                <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                    <a href="#">Jane Doe</a>
                                                </h6>
                                                <p
                                                    class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">
                                                    120+ Courses</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">Graphic Design</td>
                                    <td class="p-6 py-4">2023-11-12</td>
                                    <td class="p-6 py-4">4.2K+</td>
                                    <td class="p-6 py-4">
                                        <div class="flex flex-col gap-2">
                                            <div
                                                class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                                <div
                                                    class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[75%]">
                                                </div>
                                            </div>
                                            <div class="text-xs leading-none text-gray-500 dark:text-dark-text">75% Growing
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.9
                                            </div>
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
                                                <button data-popover-target="td-3-1" data-popover-trigger="click"
                                                    data-popover-placement="bottom-end"
                                                    class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-1"
                                                    class="hidden popover-target invisible [&.visible]:!block"
                                                    data-popover>
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
                                            <a href="#"
                                                class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                                <img src="assets/images/instructor/instructor-2.png" alt="instructor">
                                            </a>
                                            <div>
                                                <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                    <a href="#">John Smith</a>
                                                </h6>
                                                <p
                                                    class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">
                                                    80+ Courses</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">Data Science</td>
                                    <td class="p-6 py-4">2024-01-20</td>
                                    <td class="p-6 py-4">2.9K+</td>
                                    <td class="p-6 py-4">
                                        <div class="flex flex-col gap-2">
                                            <div
                                                class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                                <div
                                                    class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[65%]">
                                                </div>
                                            </div>
                                            <div class="text-xs leading-none text-gray-500 dark:text-dark-text">65% Growing
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.7
                                            </div>
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
                                                <button data-popover-target="td-3-2" data-popover-trigger="click"
                                                    data-popover-placement="bottom-end"
                                                    class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-2"
                                                    class="hidden popover-target invisible [&.visible]:!block"
                                                    data-popover>
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
                                            <a href="#"
                                                class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                                <img src="assets/images/instructor/instructor-3.png" alt="instructor">
                                            </a>
                                            <div>
                                                <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                    <a href="#">Emily Johnson</a>
                                                </h6>
                                                <p
                                                    class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">
                                                    60+ Courses</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">Machine Learning</td>
                                    <td class="p-6 py-4">2023-12-15</td>
                                    <td class="p-6 py-4">3.1K+</td>
                                    <td class="p-6 py-4">
                                        <div class="flex flex-col gap-2">
                                            <div
                                                class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                                <div
                                                    class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[85%]">
                                                </div>
                                            </div>
                                            <div class="text-xs leading-none text-gray-500 dark:text-dark-text">85% Growing
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.6
                                            </div>
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
                                                <button data-popover-target="td-3-3" data-popover-trigger="click"
                                                    data-popover-placement="bottom-end"
                                                    class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-3"
                                                    class="hidden popover-target invisible [&.visible]:!block"
                                                    data-popover>
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
                                            <a href="#"
                                                class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                                <img src="assets/images/instructor/instructor-4.png" alt="instructor">
                                            </a>
                                            <div>
                                                <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                    <a href="#">Michael Brown</a>
                                                </h6>
                                                <p
                                                    class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">
                                                    50+ Courses</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">Digital Marketing</td>
                                    <td class="p-6 py-4">2023-10-18</td>
                                    <td class="p-6 py-4">3.4K+</td>
                                    <td class="p-6 py-4">
                                        <div class="flex flex-col gap-2">
                                            <div
                                                class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                                <div
                                                    class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[78%]">
                                                </div>
                                            </div>
                                            <div class="text-xs leading-none text-gray-500 dark:text-dark-text">78% Growing
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.7
                                            </div>
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
                                                <button data-popover-target="td-3-4" data-popover-trigger="click"
                                                    data-popover-placement="bottom-end"
                                                    class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-4"
                                                    class="hidden popover-target invisible [&.visible]:!block"
                                                    data-popover>
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
                                            <a href="#"
                                                class="size-12 rounded-lg overflow-hidden shrink-0 dk-theme-card-square">
                                                <img src="assets/images/instructor/instructor-6.png" alt="instructor">
                                            </a>
                                            <div>
                                                <h6 class="leading-none text-heading font-semibold mb-2 line-clamp-1">
                                                    <a href="#">Sarah Lee</a>
                                                </h6>
                                                <p
                                                    class="leading-none text-xs text-gray-500 dark:text-dark-text-two font-semibold">
                                                    70+ Courses</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">Content Creation</td>
                                    <td class="p-6 py-4">2024-03-22</td>
                                    <td class="p-6 py-4">5.0K+</td>
                                    <td class="p-6 py-4">
                                        <div class="flex flex-col gap-2">
                                            <div
                                                class="relative max-w-[106px] h-2 rounded-full bg-primary-200 dark:bg-dark-icon overflow-hidden">
                                                <div
                                                    class="absolute top-0 left-0 bottom-0 bg-primary-500 rounded-full w-[90%]">
                                                </div>
                                            </div>
                                            <div class="text-xs leading-none text-gray-500 dark:text-dark-text">90% Growing
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="text-gray-500 font-medium dark:text-dark-text leading-none">4.9
                                            </div>
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
                                                <button data-popover-target="td-3-5" data-popover-trigger="click"
                                                    data-popover-placement="bottom-end"
                                                    class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                                    <i class="ri-more-2-fill text-inherit"></i>
                                                </button>
                                                <ul id="td-3-5"
                                                    class="hidden popover-target invisible [&.visible]:!block"
                                                    data-popover>
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

    <script>
        $(document).ready(function() {
            let chart;

            // Fungsi untuk mengupdate chart dengan data baru
            function updateChart(data) {
                if (chart) chart.destroy();
                const options = {
                    chart: {
                        height: 300,
                        type: 'line',
                        zoom: {
                            enabled: true
                        },
                        toolbar: {
                            show: true
                        },
                    },
                    series: [{
                        name: 'Total Pengunjung',
                        data
                    }],
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                        colors: ['#602EED'],
                    },
                    markers: {
                        size: 4,
                        colors: ['#602EED'],
                        strokeWidth: 2,
                        hover: {
                            size: 7
                        },
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: {
                                color: 'var(--text-color)'
                            }
                        },
                        axisBorder: {
                            colors: 'var(--border-color)'
                        },
                    },
                    yaxis: {
                        axisBorder: {
                            show: true,
                            colors: 'var(--border-color)'
                        },
                        labels: {
                            style: {
                                color: 'var(--text-color)'
                            },
                            stepSize: 50
                        },
                    },
                    grid: {
                        borderColor: 'var(--border-color)'
                    },
                    tooltip: {
                        shared: true
                    },
                };

                chart = new ApexCharts(document.querySelector("#lineChart"), options);
                chart.render();
            }

            // Menampilkan filter berdasarkan pilihan
            $('#filterType').on('change', function() {
                const selectedFilter = $(this).val();
                $('#bulanTahunFilter, #rangeTanggalFilter').addClass('hidden');

                if (selectedFilter === 'bulan-tahun') {
                    $('#bulanTahunFilter').removeClass('hidden');
                    fetchData(); // Memuat data dengan filter bulan dan tahun
                } else if (selectedFilter === 'range-tanggal') {
                    $('#rangeTanggalFilter').removeClass('hidden');
                }
            });

            // Fetch data untuk "Bulan dan Tahun"
            $('#bulan, #tahun').on('change', function() {
                if ($('#filterType').val() === 'bulan-tahun') {
                    fetchData();
                }
            });

            // Fetch data untuk "Range Tanggal"
            $('#date_range').on('change', function() {
                if ($('#filterType').val() === 'range-tanggal') {
                    fetchData();
                }
            });

            // Fungsi Fetch Data
            function fetchData() {
                const filterType = $('#filterType').val();
                let data = {};

                if (filterType === 'bulan-tahun') {
                    const bulan = $('#bulan').val();
                    const tahun = $('#tahun').val();
                    if (bulan && tahun) {
                        const bulanNama = new Date(`${tahun}-${bulan}-01`).toLocaleString('id', {
                            month: 'long',
                        });
                        $('#statistikValue').text(`${bulanNama} ${tahun}`);
                        data = {
                            bulan,
                            tahun,
                        };
                    }
                } else if (filterType === 'range-tanggal') {
                    const dateRange = $('#date_range').val();
                    if (dateRange) {
                        data = {
                            range_tanggal: dateRange,
                        };
                    }
                }

                // AJAX Call
                $.ajax({
                    url: '/visitor-count',
                    method: 'GET',
                    data: {
                        tipe_filter: filterType,
                        ...data,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            updateChart(response.data);
                            const filterType = $('#filterType').val();
                            if (filterType === 'range-tanggal') {
                                $('#statistikValue').text(response.range_tanggal);
                            }
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching visitor count:', error);
                    },
                });
            }

            // Inisialisasi Flatpickr untuk rentang tanggal
            flatpickr('#date_range', {
                mode: 'range',
                altInput: true,
                altFormat: 'j F Y',
                dateFormat: 'd-m-Y',
                locale: 'id',
            });

            // Panggil data default pada awal pemuatan
            $(document).ready(function() {
                fetchData(); // Memuat data default saat halaman pertama kali diakses
            });
        });
    </script>
@endsection
