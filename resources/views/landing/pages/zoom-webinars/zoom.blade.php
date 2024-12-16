@extends('landing.layouts.landing-layouts')
@section('page_title', 'Zoom & Webinars | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Zoom & Webinars'])

    <!--meeting cards section -->
    <section>
        <div class="container-fluid-2 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-30px pt-100px pb-100px"
            data-aos="fade-up">
            <!-- card 1 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/1.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p
                                        class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                        Development
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor" href="#"><i
                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">Dec 22,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">1 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Executive Assistant Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">7.00
                                    AM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993999</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_1.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Mirnsdo .H
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 2 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/2.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                        Managing
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor" href="#"><i
                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 25,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">2 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Website Renovation Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">5.00
                                    PM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952429936777</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_2.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Mirnsdo .H
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 3 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/3.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p class="text-xs text-whiteColor px-4 py-[3px] bg-greencolor2 rounded font-semibold">
                                        Marketing
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor" href="#"><i
                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 29,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">3 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Marketing Committee Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">4.00
                                    PM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993999</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_3.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Nidhsdo
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 4 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/4.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p class="text-xs text-whiteColor px-4 py-[3px] bg-yellow rounded font-semibold">
                                        Leading
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                    href="#"><i class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 29,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            3 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Teacher Leader Team Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">7.00
                                    AM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993555</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_4.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Rbdnsdo .H
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 1 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/5.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p
                                        class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                        Responsibilities
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                    href="#"><i class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 30,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">2 hr 00 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Team member responsibilities
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">7.00
                                    AM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993999</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_4.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Rbdnsdo .H
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 2 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/6.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                        Planning
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                    href="#"><i class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 25,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">2 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Strategic Planning Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">
                                    8.00 PM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993688</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_1.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Soytan Mind
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 3 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/7.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p class="text-xs text-whiteColor px-4 py-[3px] bg-greencolor2 rounded font-semibold">
                                        Cultural
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                    href="#"><i class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 29,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">3 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Student Committee Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">7.00
                                    AM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993555</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_4.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Runded Min
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 4 -->
            <div class="group" data-aos="fade-up">
                <div>
                    <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                        <!-- card image -->
                        <div class="relative mb-4 overflow-hidden">
                            <a href="course.html" class="w-full">
                                <img src="../../assets/images/zoom/8.jpg" alt=""
                                    class="w-full transition-all duration-300 group-hover:scale-110">
                            </a>
                            <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                <div>
                                    <p class="text-xs text-whiteColor px-4 py-[3px] bg-yellow rounded font-semibold">
                                        Business
                                    </p>
                                </div>
                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                    href="#"><i class="icofont-heart-alt text-base py-1 px-2"></i></a>
                            </div>
                        </div>
                        <!-- card content -->
                        <div>
                            <div class="flex flex-wrap justify-between items-center mb-15px">
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-calendar pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            Dec 29,2024</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm text-black dark:text-blackColor-dark">
                                            3 hr 30 min</span>
                                    </div>
                                </div>
                            </div>
                            <a href="zoom-meeting-details.html"
                                class="text-lg md:text-size-22 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                Business Leader Team Meeting
                            </a>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center">
                                Starting Time:
                                <span
                                    class="text-xl md:text-size-26 leading-9 md:leading-12 font-bold text-primaryColor ml-10px">7.00
                                    AM</span>
                            </p>
                            <!-- time -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark flex items-center mb-15px">
                                Meeting ID :
                                <span
                                    class="text-sm md:text-lg leading-9 md:leading-12 font-bold text-secondaryColor ml-10px">952428993698</span>
                            </p>
                            <!-- author and rating-->
                            <div class="pt-15px border-t border-borderColor">
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xs flex items-center text-contentColor hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><img
                                            class="w-50px h-50px rounded-full mr-15px"
                                            src="../../assets/images/grid/grid_small_1.jpg" alt="">
                                        <div>
                                            <span>Speaker:</span>
                                            <h3 class="text-lg font-bold text-blackColor dark:text-blackColor-dark">
                                                Jhon Sina
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
