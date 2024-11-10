@extends('dashboard.layouts.layouts')
@section('page_title', 'Dashboard Admin')

@section('content')

    <!--dashbord menu section -->
    <section>
        <div class="container-fluid-2">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px pt-30px pb-100px">
                <div class="lg:col-start-1 lg:col-span-3">
                    <!-- navigation menu -->
                    <div
                        class="p-30px pt-5 lg:p-5 2xl:p-30px 2xl:pt-5 rounded-lg2 shadow-accordion dark:shadow-accordion-dark bg-whiteColor dark:bg-whiteColor-dark">
                        <!-- greeting -->
                        <h5
                            class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                            WELCOME, MICLE OBEMA
                        </h5>
                        <ul>
                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="admin-dashboard.html"
                                    class="text-primaryColor hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    Dashboard</a>
                            </li>
                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="admin-profile.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    My Profile</a>
                            </li>
                            <li
                                class="py-10px border-b border-borderColor dark:border-borderColor-dark flex justify-between items-center">
                                <a href="admin-message.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-book-open">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                    </svg>
                                    Message
                                </a>
                                <span
                                    class="text-size-10 font-medium text-whiteColor px-9px bg-primaryColor leading-14px rounded-2xl">12</span>
                            </li>
                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="admin-course.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-bookmark">
                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    Courses</a>
                            </li>
                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="admin-reviews.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    Reviews</a>
                            </li>
                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="admin-quiz-attempts.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-help-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                    Quiz Attempts</a>
                            </li>
                        </ul>
                        <!-- user -->
                        <h5
                            class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                            USER
                        </h5>
                        <ul>
                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="admin-settings.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg>
                                    Settings</a>
                            </li>

                            <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                <a href="#"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-1">
                                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                                        <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                                    </svg>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- dashboard content -->
                <div class="lg:col-start-4 lg:col-span-9">
                    <!-- counter -->
                    <div
                        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
                        <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                            <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                Dashboard
                            </h2>
                        </div>

                        <!-- counter area -->
                        <div class="counter grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-30px gap-y-5 pb-5">
                            <div
                                class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="../../assets/images/counter/counter__1.png" alt="">
                                    </div>
                                    <div>
                                        <p
                                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                            <span data-countup-number="900"> 900</span><span>+</span>
                                        </p>
                                        <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                            Enrolled Courses
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="../../assets/images/counter/counter__2.png" alt="">
                                    </div>
                                    <div>
                                        <p
                                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                            <span data-countup-number="500">500</span><span>+</span>
                                        </p>
                                        <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                            Active Courses
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="../../assets/images/counter/counter__3.png" alt="">
                                    </div>
                                    <div>
                                        <p
                                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                            <span data-countup-number="300">300</span><span>k</span>
                                        </p>
                                        <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                            Complete Courses
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="../../assets/images/counter/counter__4.png" alt="">
                                    </div>
                                    <div>
                                        <p
                                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                            <span data-countup-number="1500">1500</span><span>+</span>
                                        </p>
                                        <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                            Total Courses
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="../../assets/images/counter/counter__3.png" alt="">
                                    </div>
                                    <div>
                                        <p
                                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                            <span data-countup-number="30">30</span><span>k</span>
                                        </p>
                                        <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                            Total Students
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                                <div class="flex gap-4">
                                    <div>
                                        <img src="../../assets/images/counter/counter__4.png" alt="">
                                    </div>
                                    <div>
                                        <p
                                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                            <span data-countup-number="90">90</span><span>,000k</span>
                                        </p>
                                        <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                            Total Earning
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- chart area-->
                    <div
                        class="py-10 px-5 mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
                        <div class="flex flex-wrap">
                            <!-- linechart -->
                            <div class="w-full md:w-65%">
                                <div class="md:px-5 py-10px md:py-0">
                                    <div
                                        class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex justify-between items-center gap-2">
                                        <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                            Dashboard
                                        </h2>
                                        <div class="bg-whiteColor rounded-md relative">
                                            <select
                                                class="bg-transparent text-darkBlue w-42.5 px-3 py-6px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select border border-borderColor6 rounded-md">
                                                <option selected="" value="HTML">HTML</option>
                                                <option value="CSS">CSS</option>
                                                <option value="Javascript">Javascript</option>
                                                <option value="PHP">PHP</option>
                                                <option value="WordPress">WordPress</option>
                                            </select>
                                            <i
                                                class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                        </div>
                                    </div>
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>

                            <!-- piechart -->
                            <div class="w-full md:w-35%">
                                <div class="md:px-5 py-10px md:py-0">
                                    <div
                                        class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex justify-between items-center gap-2">
                                        <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                            Traffic
                                        </h2>
                                        <div class="bg-whiteColor rounded-md relative">
                                            <select
                                                class="bg-transparent text-darkBlue w-42.5 px-3 py-6px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select border border-borderColor6 rounded-md">
                                                <option selected="" value="Today">Today</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                            <i
                                                class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                        </div>
                                    </div>
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- popular instructor and recent course area -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-30px">
                        <!-- popular instructor -->
                        <div
                            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 max-h-137.5 overflow-auto">
                            <div
                                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between gap-2 flex-wrap">
                                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                    Popular Instructor
                                </h2>
                                <a href="../../course.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8">See
                                    More...</a>
                            </div>

                            <!-- instrutors-->
                            <ul>
                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-10px">
                                        <img src="../../assets/images/teacher/teacher__1.png" alt=""
                                            class="w-full rounded-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../instructor-details.html">
                                                    Sanki Jho
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-chat"></i> 25,895 Reviews</p>
                                                <p>
                                                    <i class="icofont-student-alt"></i> 692 Students
                                                </p>
                                                <p><i class="icofont-video-alt"></i> 15+ Courses</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-10px">
                                        <img src="../../assets/images/teacher/teacher__2.png" alt=""
                                            class="w-full rounded-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../instructor-details.html">
                                                    Nidmjae Mollin
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-chat"></i> 21,895 Reviews</p>
                                                <p>
                                                    <i class="icofont-student-alt"></i> 95 Students
                                                </p>
                                                <p><i class="icofont-video-alt"></i> 10+ Courses</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-10px">
                                        <img src="../../assets/images/teacher/teacher__3.png" alt=""
                                            class="w-full rounded-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../instructor-details.html">
                                                    Nidmjae Mollin
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-chat"></i> 17,895 Reviews</p>
                                                <p>
                                                    <i class="icofont-student-alt"></i> 325 Students
                                                </p>
                                                <p><i class="icofont-video-alt"></i> 20+ Courses</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-10px">
                                        <img src="../../assets/images/teacher/teacher__4.png" alt=""
                                            class="w-full rounded-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../instructor-details.html">
                                                    Sndi Jac
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-chat"></i> 17,895 Reviews</p>
                                                <p>
                                                    <i class="icofont-student-alt"></i> 325 Students
                                                </p>
                                                <p><i class="icofont-video-alt"></i> 45+ Courses</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex items-center flex-wrap pt-15px">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-10px">
                                        <img src="../../assets/images/teacher/teacher__5.png" alt=""
                                            class="w-full rounded-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../instructor-details.html">
                                                    Sndi Jac
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-chat"></i> 17,895 Reviews</p>
                                                <p>
                                                    <i class="icofont-student-alt"></i> 325 Student
                                                </p>
                                                <p><i class="icofont-video-alt"></i> 45+ Courses</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Recent Course -->
                        <div
                            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 max-h-137.5 overflow-auto">
                            <div
                                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between gap-2 flex-wrap">
                                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                    Recent Course
                                </h2>
                                <a href="../../course.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8">See
                                    More...</a>
                            </div>

                            <!-- instrutors-->
                            <ul>
                                <li
                                    class="flex items-center flex-wrap py-5 border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/grid/grid_1.png" alt=""
                                                class="w-full rounded"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Complete Python Zero to Hero in Python.
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center justify-between text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-teacher"></i> Jon Ron</p>
                                                <p><i class="icofont-book-alt"></i> 9 Lesson</p>
                                                <p>
                                                    <i class="icofont-clock-time"></i> 3 hr 30 min
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li
                                    class="flex items-center flex-wrap py-5 border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/grid/grid_2.png" alt=""
                                                class="w-full rounded"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Lorem ipsum dolor sit amet consectetur.
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center justify-between text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-teacher"></i> Jon Ron</p>
                                                <p><i class="icofont-book-alt"></i> 9 Lesson</p>
                                                <p>
                                                    <i class="icofont-clock-time"></i> 2 hr 30 min
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li
                                    class="flex items-center flex-wrap py-5 border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/grid/grid_3.png" alt=""
                                                class="w-full rounded"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Voluptatum eius quo consectetur atque.
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center justify-between text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-teacher"></i> Jon Ron</p>
                                                <p><i class="icofont-book-alt"></i> 5 Lesson</p>
                                                <p>
                                                    <i class="icofont-clock-time"></i> 1 hr 30 min
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="flex items-center flex-wrap pt-5">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/grid/grid_4.png" alt=""
                                                class="w-full rounded"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Voluptatum eius quo consectetur atque.
                                                </a>
                                            </h5>
                                            <div
                                                class="flex flex-wrap items-center justify-between text-sm text-darkblack dark:text-darkblack-dark gap-x-15px gap-y-10px leading-1.8">
                                                <p><i class="icofont-teacher"></i> Mini Ron</p>
                                                <p><i class="icofont-book-alt"></i> 7 Lesson</p>
                                                <p>
                                                    <i class="icofont-clock-time"></i> 3 hr 30 min
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Notice Board and Notifications area -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-30px">
                        <!-- Notice Board -->

                        <div
                            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 max-h-137.5 overflow-auto">
                            <div
                                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between gap-2 flex-wrap">
                                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                    Notice Board
                                </h2>
                                <a href="../../course.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8">See
                                    More...</a>
                            </div>

                            <!-- instrutors-->
                            <ul>
                                <li class="flex items-center flex-wrap pt-5">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/blog/blog_6.png" alt=""
                                                class="w-full"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Libero velit quos dolore voluptatem...
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex items-center flex-wrap pt-5">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/blog/blog_7.png" alt=""
                                                class="w-full"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Libero velit quos dolore aedgeds...
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex items-center flex-wrap pt-5">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/blog/blog_8.png" alt=""
                                                class="w-full"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Libero velit quos dolore wdedged....
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex items-center flex-wrap pt-5">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/blog/blog_9.png" alt=""
                                                class="w-full"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Libero velit quos dolore nidelsd...
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex items-center flex-wrap pt-5">
                                    <!-- avatar -->
                                    <div class="w-full md:w-30% md:pr-5">
                                        <a class="w-full" href="../../course-details.html">
                                            <img src="../../assets/images/blog/blog_4.png" alt=""
                                                class="w-full"></a>
                                    </div>
                                    <!-- details -->
                                    <div class="w-full md:w-70% md:pr-5">
                                        <div>
                                            <h5
                                                class="text-lg leading-1.5 font-medium text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="../../course-details.html">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Libero velit quos dolore midnied...
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- notifications -->
                        <div
                            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 max-h-137.5 overflow-auto">
                            <div
                                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between gap-2 flex-wrap">
                                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                    Notifications
                                </h2>
                                <a href="../../course.html"
                                    class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8">See
                                    More...</a>
                            </div>

                            <!-- notifications-->
                            <ul>
                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-5">
                                        <img src="../../assets/images/dashbord/profile.png" alt=""
                                            class="max-w-50px w-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="#">
                                                    latest resume has been updated!
                                                </a>
                                            </h5>
                                            <div class="text-darkblack dark:text-darkblack-dark leading-1.8">
                                                <p>1 Hour Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-5">
                                        <img src="../../assets/images/dashbord/lock.png" alt=""
                                            class="max-w-50px w-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="#">
                                                    Password has been changed 3 times
                                                </a>
                                            </h5>
                                            <div class="text-darkblack dark:text-darkblack-dark leading-1.8">
                                                <p>2 Hour Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-5">
                                        <img src="../../assets/images/dashbord/verify.png" alt=""
                                            class="max-w-50px w-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="#">
                                                    Account has been created successfully
                                                </a>
                                            </h5>
                                            <div class="text-darkblack dark:text-darkblack-dark leading-1.8">
                                                <p>50 Hour Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li
                                    class="flex items-center flex-wrap py-15px border-b border-borderColor dark:border-borderColor-dark">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-5">
                                        <img src="../../assets/images/dashbord/success.png" alt=""
                                            class="max-w-50px w-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="#">
                                                    Successfully applied for a job Developer
                                                </a>
                                            </h5>
                                            <div class="text-darkblack dark:text-darkblack-dark leading-1.8">
                                                <p>30 Hour Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="flex items-center flex-wrap pt-15px">
                                    <!-- avatar -->
                                    <div class="max-w-full md:max-w-1/5 pr-5">
                                        <img src="../../assets/images/dashbord/video.png" alt=""
                                            class="max-w-50px w-full">
                                    </div>
                                    <!-- details -->
                                    <div class="max-w-full md:max-w-4/5 pr-10px">
                                        <div>
                                            <h5
                                                class="text-lg leading-1 font-bold text-contentColor dark:text-contentColor-dark mb-5px">
                                                <a class="hover:text-primaryColor" href="#">
                                                    Multi vendor course updated successfully
                                                </a>
                                            </h5>
                                            <div class="text-darkblack dark:text-darkblack-dark leading-1.8">
                                                <p>3 Hour Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5 max-h-137.5 overflow-auto">
                        <div
                            class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between gap-2 flex-wrap">
                            <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                Total Feedbacks
                            </h2>
                            <a href="../../course.html"
                                class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8">See
                                More...</a>
                        </div>
                        <div class="overflow-auto">
                            <table class="w-full text-left text-nowrap">
                                <thead
                                    class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                                    <tr>
                                        <th class="px-5px py-10px md:px-5">Course Name</th>
                                        <th class="px-5px py-10px md:px-5">Enrolled</th>
                                        <th class="px-5px py-10px md:px-5">Rating</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                                    <tr class="leading-1.8 md:leading-1.8">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p>Javascript</p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>1100</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="text-primaryColor">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-star w-14px inline-block">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p>PHP</p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>700</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="text-primaryColor">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-star w-14px inline-block">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p>HTML</p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>1350</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="text-primaryColor">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-star w-14px inline-block">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="leading-1.8 md:leading-1.8 bg-lightGrey5 dark:bg-whiteColor-dark">
                                        <th class="px-5px py-10px md:px-5 font-normal">
                                            <p>Graphic</p>
                                        </th>
                                        <td class="px-5px py-10px md:px-5">
                                            <p>1266</p>
                                        </td>
                                        <td class="px-5px py-10px md:px-5">
                                            <div class="text-primaryColor">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-star w-14px inline-block">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
