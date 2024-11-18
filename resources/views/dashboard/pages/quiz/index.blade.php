@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | My Quiz Attempts')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- quize attempts area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Quiz Saya
                </h2>
            </div>
            <!-- filter content -->
            <div class="grid grid-cols md:grid-cols-3 xl:grid-cols-12 gap-x-30px">
                <div class="xl:col-start-1 xl:col-span-6">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        Kategori Kursus
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option selected="" value="All">All</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Graphic">Graphic</option>
                            <option value="English">English</option>
                            <option value="Spoken English">Spoken English</option>
                            <option value="Art Painting">Art Painting</option>
                            <option value="App Development">App Development</option>
                            <option value="Spoken English">Web Application</option>
                            <option value="Spoken English">Php Development</option>
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>
                <div class="xl:col-start-10 xl:col-span-6">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        Status Kursus
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option selected="" value="semua">Semua</option>
                            <option value="gratis">Gratis</option>
                            <option value="berbayar">Berbayar</option>
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-contentColor opacity-35">
            <!-- main content -->
            <div class="overflow-auto">
                <table class="w-full text-left text-nowrap">
                    <thead
                        class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                        <tr>
                            <th class="px-5px py-10px md:px-5">Quiz</th>
                            <th class="px-5px py-10px md:px-5">Student</th>
                            <th class="px-5px py-10px md:px-5">Tanggal</th>
                            <th class="px-5px py-10px md:px-5">Duration</th>
                            <th class="px-5px py-10px md:px-5">Benar</th>
                            <th class="px-5px py-10px md:px-5">Salah</th>
                            <th class="px-5px py-10px md:px-5">Total</th>
                            <th class="px-5px py-10px md:px-5">Status</th>
                            <th class="px-5px py-10px md:px-5"></th>
                        </tr>
                    </thead>
                    <tbody class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                        <tr class="leading-1.8 md:leading-1.8">
                            <td class="px-5px py-10px md:px-5 font-normal text-wrap">
                                <p class="text-blackColor dark:text-blackColor-dark font-bold">Math</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <a class="text-blackColor dark:text-blackColor-dark" href="#">Mice Jerry</a>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>December 26, 2024</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>10:00 AM - 12:00 PM</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>4</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>8</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>4</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p class="text-xs">
                                    <span
                                        class="h-22px inline-block px-7px bg-greencolor2 leading-22px font-bold text-whiteColor rounded-md">
                                        Running</span>
                                </p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <div class="dashboard__button__group">
                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Edit</a>
                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                            <th class="px-5px py-10px md:px-5 font-normal text-wrap">
                                <p class="flex">December 26, 2024</p>
                                <span class="text-blackColor dark:text-blackColor-dark font-bold">Write a on yourself using
                                    the 5</span>
                            </th>
                            <td class="px-5px py-10px md:px-5">
                                <p>
                                    Student:
                                    <a class="text-blackColor dark:text-blackColor-dark" href="#">John Due</a>
                                </p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>4</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>8</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p>4</p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <p class="text-xs">
                                    <span
                                        class="h-22px inline-block px-7px bg-primaryColor leading-22px font-bold text-whiteColor rounded-md">Time
                                        Over</span>
                                </p>
                            </td>
                            <td class="px-5px py-10px md:px-5">
                                <div class="dashboard__button__group">
                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Edit</a>
                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Delete</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
