@extends('landing.layouts.landing-layouts')
@section('page_title', 'Artikel | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Artikel'])

    <!-- News and blog section -->
    <section>
        <div class="container py-10 md:py-50px lg:py-60px 2xl:py-100px">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px">
                <!-- blogs -->
                <div class="lg:col-start-1 lg:col-span-8 space-y-[35px]">
                    <!-- blog 1 -->
                    <div class="group shadow-blog2" data-aos="fade-up">
                        <!-- blog thumbnail -->
                        <div class="overflow-hidden relative">
                            <img src="assets/images/blog/blog_6.png" alt="" class="w-full">
                            <div
                                class="text-size-22 leading-6 font-semibold text-white px-15px py-5px md:px-6 md:py-2 bg-primaryColor rounded text-center absolute top-5 right-5">
                                <h3>
                                    24 <br>
                                    Feb
                                </h3>
                            </div>
                        </div>
                        <!-- blog content -->
                        <div class="pt-26px pb-5 px-30px">
                            <h3
                                class="text-2xl md:text-size-32 lg:text-size-28 2xl:text-size-34 leading-34px md:leading-10 2xl:leading-13.5 font-bold text-blackColor2 hover:text-primaryColor dark:text-blackColor2-dark dark:hover:text-primaryColor">
                                <a href="blog-details.html">Delivering What Consumers Really Value?</a>
                            </h3>
                            <div class="mb-14px pb-19px border-b border-borderColor dark:border-borderColor-dark">
                                <ul class="flex flex-wrap items-center gap-x-15px">
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-business-man-alt-2"></i>
                                            Mirnsdo.H</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-speech-comments"></i> 0 Comments</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-eraser-alt"></i> Association</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-base text-contentColor dark:text-contentColor-dark mb-15px !leading-30px">
                                These cases are perfectly simple and easy to distinguish. In
                                a free hour, when our power of On the other hand,
                                organizations have the need for integrating in IT
                                departments
                            </p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="blog-details.html"
                                        class="uppercase text-secondaryColor hover:text-primaryColor">
                                        READ MORE <i class="icofont-double-right"></i></a>
                                </div>
                                <div class="text-primaryColor hover:text-secondaryColor space-y-1">
                                    <a href="#"><i
                                            class="icofont-share bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                    <a href="#"><i
                                            class="icofont-heart bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog 2 -->
                    <div class="group shadow-blog2" data-aos="fade-up">
                        <!-- blog thumbnail -->
                        <div class="overflow-hidden relative">
                            <img src="assets/images/blog/blog_7.png" alt="" class="w-full">
                            <div
                                class="text-size-22 leading-6 font-semibold text-white px-15px py-5px md:px-6 md:py-2 bg-primaryColor rounded text-center absolute top-5 right-5 z-20">
                                <h3>
                                    24 <br>
                                    Feb
                                </h3>
                            </div>
                            <div class="absolute top-0 right-0 left-0 bottom-0 flex items-center justify-center z-10">
                                <div>
                                    <button data-url="https://www.youtube.com/watch?v=vHdclsdkp28"
                                        class="lvideo relative w-15 h-15 md:h-20 md:w-20 lg:w-15 lg:h-15 2xl:h-70px 2xl:w-70px 3xl:h-20 3xl:w-20 bg-secondaryColor rounded-full flex items-center justify-center">
                                        <span
                                            class="animate-buble absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 block w-[180px] h-[180px] border-secondaryColor rounded-full"></span><span
                                            class="animate-buble2 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 block w-[180px] h-[180px] border-secondaryColor rounded-full"></span>
                                        <img src="assets/images/icon/video.png" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- blog content -->
                        <div class="pt-26px pb-5 px-30px">
                            <h3
                                class="text-2xl md:text-size-32 lg:text-size-28 2xl:text-size-34 leading-34px md:leading-10 2xl:leading-13.5 font-bold text-blackColor2 hover:text-primaryColor dark:text-blackColor2-dark dark:hover:text-primaryColor">
                                <a href="blog-details.html">Here at First Baptist Cape Coral we believe!</a>
                            </h3>
                            <div class="mb-14px pb-19px border-b border-borderColor dark:border-borderColor-dark">
                                <ul class="flex flex-wrap items-center gap-x-15px">
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-business-man-alt-2"></i>
                                            Mirnsdo.H</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-speech-comments"></i> 0 Comments</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-eraser-alt"></i> Association</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-base text-contentColor dark:text-contentColor-dark mb-15px !leading-30px">
                                These cases are perfectly simple and easy to distinguish. In
                                a free hour, when our power of On the other hand,
                                organizations have the need for integrating in IT
                                departments
                            </p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="blog-details.html"
                                        class="uppercase text-secondaryColor hover:text-primaryColor">
                                        READ MORE <i class="icofont-double-right"></i></a>
                                </div>
                                <div class="text-primaryColor hover:text-secondaryColor space-y-1">
                                    <a href="#"><i
                                            class="icofont-share bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                    <a href="#"><i
                                            class="icofont-heart bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog 3 -->
                    <div class="group shadow-blog2" data-aos="fade-up">
                        <!-- blog thumbnail -->
                        <div class="overflow-hidden relative">
                            <img src="assets/images/blog/blog_8.png" alt="" class="w-full">
                            <div
                                class="text-size-22 leading-6 font-semibold text-white px-15px py-5px md:px-6 md:py-2 bg-primaryColor rounded text-center absolute top-5 right-5">
                                <h3>
                                    24 <br>
                                    Feb
                                </h3>
                            </div>
                        </div>
                        <!-- blog content -->
                        <div class="pt-26px pb-5 px-30px">
                            <h3
                                class="text-2xl md:text-size-32 lg:text-size-28 2xl:text-size-34 leading-34px md:leading-10 2xl:leading-13.5 font-bold text-blackColor2 hover:text-primaryColor dark:text-blackColor2-dark dark:hover:text-primaryColor">
                                <a href="blog-details.html">We are praying for our community and for.</a>
                            </h3>
                            <div class="mb-14px pb-19px border-b border-borderColor dark:border-borderColor-dark">
                                <ul class="flex flex-wrap items-center gap-x-15px">
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-business-man-alt-2"></i>
                                            Mirnsdo.H</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-speech-comments"></i> 0 Comments</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-eraser-alt"></i> Association</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-base text-contentColor dark:text-contentColor-dark mb-15px !leading-30px">
                                These cases are perfectly simple and easy to distinguish. In
                                a free hour, when our power of On the other hand,
                                organizations have the need for integrating in IT
                                departments
                            </p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="blog-details.html"
                                        class="uppercase text-secondaryColor hover:text-primaryColor">
                                        READ MORE <i class="icofont-double-right"></i></a>
                                </div>
                                <div class="text-primaryColor hover:text-secondaryColor space-y-1">
                                    <a href="#"><i
                                            class="icofont-share bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                    <a href="#"><i
                                            class="icofont-heart bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog 4 -->
                    <div class="group shadow-blog2" data-aos="fade-up">
                        <!-- blog thumbnail -->
                        <div class="overflow-hidden relative">
                            <img src="assets/images/blog/blog_9.png" alt="" class="w-full">
                            <div
                                class="text-size-22 leading-6 font-semibold text-white px-15px py-5px md:px-6 md:py-2 bg-primaryColor rounded text-center absolute top-5 right-5">
                                <h3>
                                    24 <br>
                                    Feb
                                </h3>
                            </div>
                        </div>
                        <!-- blog content -->
                        <div class="pt-26px pb-5 px-30px">
                            <h3
                                class="text-2xl md:text-size-32 lg:text-size-28 2xl:text-size-34 leading-34px md:leading-10 2xl:leading-13.5 font-bold text-blackColor2 hover:text-primaryColor dark:text-blackColor2-dark dark:hover:text-primaryColor">
                                <a href="blog-details.html">Delivering What Consumers Really Value?</a>
                            </h3>
                            <div class="mb-14px pb-19px border-b border-borderColor dark:border-borderColor-dark">
                                <ul class="flex flex-wrap items-center gap-x-15px">
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-business-man-alt-2"></i>
                                            Mirnsdo.H</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-speech-comments"></i> 0 Comments</a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html"
                                            class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                class="icofont-eraser-alt"></i> Association</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-base text-contentColor dark:text-contentColor-dark mb-15px !leading-30px">
                                These cases are perfectly simple and easy to distinguish. In
                                a free hour, when our power of On the other hand,
                                organizations have the need for integrating in IT
                                departments
                            </p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="blog-details.html"
                                        class="uppercase text-secondaryColor hover:text-primaryColor">
                                        READ MORE <i class="icofont-double-right"></i></a>
                                </div>
                                <div class="text-primaryColor hover:text-secondaryColor space-y-1">
                                    <a href="#"><i
                                            class="icofont-share bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                    <a href="#"><i
                                            class="icofont-heart bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('landing.components.pagination.pagination')
                </div>
                <!-- blog sidebar -->
                <div class="lg:col-start-9 lg:col-span-4">
                    <div class="flex flex-col">
                        {{-- <!-- author details -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark text-center"
                            data-aos="fade-up">
                            <!-- athor avatar -->
                            <div class="mb-30px flex justify-center">
                                <img src="assets/images/blog/blog_10.png" alt="" class="w-24 h-24 rounded-full">
                            </div>
                            <!-- author name -->
                            <div class="mb-3">
                                <h3 class="mb-7px">
                                    <a href="#"
                                        class="text-xl font-bold text-blackColor2 dark:text-blackColor2-dark">Rosalina D.
                                        Willaim</a>
                                </h3>
                                <p class="text-xs text-contentColor2 dark:text-contentColor2-dark">
                                    Blogger/Photographer
                                </p>
                            </div>
                            <!-- description -->
                            <p class="text-sm text-contentColor dark:text-contentColor-dark mb-15px">
                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.Veritatis distinctio suscipit reprehenderit atque
                            </p>
                            <!-- social -->
                            <div>
                                <ul class="flex gap-10px justify-center items-center">
                                    <li>
                                        <a href="#"
                                            class="w-35px h-35px leading-35px text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                class="icofont-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-35px h-35px leading-35px text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                class="icofont-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-35px h-35px leading-35px text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-35px h-35px leading-35px text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                class="icofont-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- search input -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Cari Artikel
                            </h4>
                            <form
                                class="w-full px-4 py-15px text-sm text-contentColor bg-lightGrey10 dark:bg-lightGrey10-dark dark:text-contentColor-dark flex justify-center items-center leading-26px">
                                <input type="text" placeholder="Cari..."
                                    class="placeholder:text-placeholder bg-transparent focus:outline-none placeholder:opacity-80 w-full">
                                <button type="submit">
                                    <i class="icofont-search-1 text-base"></i>
                                </button>
                            </form>
                        </div>
                        <!-- categories -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Kategori Artikel
                            </h4>
                            <ul class="flex flex-col gap-y-4">
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                    <a href="#">Mobile Set</a> <a href="#">03</a>
                                </li>
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                    <a href="#">Mobile Set</a> <a href="#">03</a>
                                </li>
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                    <a href="#">Raxila Dish nonyte</a> <a href="#">09</a>
                                </li>
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                    <a href="#">Fresh Vegetable</a> <a href="#">01</a>
                                </li>
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                    <a href="#">Fruites</a> <a href="#">00</a>
                                </li>
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                    <a href="#">Gesuriesey</a> <a href="#">26</a>
                                </li>
                            </ul>
                        </div>
                        <!-- recent posts -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Artikel Terbaru
                            </h4>
                            <ul class="flex flex-col gap-y-25px">
                                <li class="flex items-center">
                                    <div class="w-2/5 pr-5 relative">
                                        <a href="blog-details.html" class="w-full"><img
                                                src="assets/images/blog/blog_11.png" alt="" class="w-full"></a>
                                        <span
                                            class="text-xs font-medium text-whiteColor h-6 w-6 leading-6 text-center bg-primaryColor absolute top-0 left-0">01</span>
                                    </div>
                                    <div class="w-3/5">
                                        <a href="blog-details.html"
                                            class="w-full text-sm text-contentColor font-medium leading-7 dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">23
                                            December 2024</a>
                                        <h3 class="font-bold leading-22px mb-15px">
                                            <a class="text-blackColor dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                                                href="blog-details.html">Show at the University</a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2/5 pr-5 relative">
                                        <a href="blog-details.html" class="w-full"><img
                                                src="assets/images/blog/blog_12.png" alt="" class="w-full"></a>
                                        <span
                                            class="text-xs font-medium text-whiteColor h-6 w-6 leading-6 text-center bg-primaryColor absolute top-0 left-0">02</span>
                                    </div>
                                    <div class="w-3/5">
                                        <a href="blog-details.html"
                                            class="w-full text-sm text-contentColor font-medium leading-7 dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">23
                                            December 2024</a>
                                        <h3 class="font-bold leading-22px mb-15px">
                                            <a class="text-blackColor dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                                                href="blog-details.html">Show at the University</a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2/5 pr-5 relative">
                                        <a href="blog-details.html" class="w-full"><img
                                                src="assets/images/blog/blog_13.png" alt="" class="w-full"></a>
                                        <span
                                            class="text-xs font-medium text-whiteColor h-6 w-6 leading-6 text-center bg-primaryColor absolute top-0 left-0">03</span>
                                    </div>
                                    <div class="w-3/5">
                                        <a href="blog-details.html"
                                            class="w-full text-sm text-contentColor font-medium leading-7 dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">23
                                            December 2024</a>
                                        <h3 class="font-bold leading-22px mb-15px">
                                            <a class="text-blackColor dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                                                href="blog-details.html">Show at the University</a>
                                        </h3>
                                    </div>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-2/5 pr-5 relative">
                                        <a href="blog-details.html" class="w-full"><img
                                                src="assets/images/blog/blog_14.png" alt="" class="w-full"></a>
                                        <span
                                            class="text-xs font-medium text-whiteColor h-6 w-6 leading-6 text-center bg-primaryColor absolute top-0 left-0">04</span>
                                    </div>
                                    <div class="w-3/5">
                                        <a href="blog-details.html"
                                            class="w-full text-sm text-contentColor font-medium leading-7 dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">23
                                            December 2024</a>
                                        <h3 class="font-bold leading-22px mb-15px">
                                            <a class="text-blackColor dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                                                href="blog-details.html">Show at the University</a>
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- photo gallary -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Galeri Foto 
                            </h4>
                            <div class="gallary-container">
                                <div class="popup">
                                    <div id="slider-container" class="slider-container">
                                        <span class="close-btn">&times;</span>
                                        <div class="slider-container-wrapper"></div>
                                    </div>
                                    <div class="slider-navigation">
                                        <button class="prev-btn">Prev</button>
                                        <button class="next-btn">Next</button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-5px">
                                    <div class="image-wrapper relative group" data-aos="fade-up">
                                        <img src="assets/images/blog/blog_15.png" alt="Image 1"
                                            class="gallery-image w-full">
                                        <div
                                            class="absolute left-0 top-0 right-0 bottom-0 bg-blackColor bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-60 text-whiteColor flex items-center justify-center">
                                            <button class="popup-open">
                                                <i class="icofont-eye-alt opacity-0 group-hover:opacity-100"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="image-wrapper relative group" data-aos="fade-up">
                                        <img src="assets/images/blog/blog_16.png" alt="Image 1"
                                            class="gallery-image w-full">
                                        <div
                                            class="absolute left-0 top-0 right-0 bottom-0 bg-blackColor bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-60 text-whiteColor flex items-center justify-center">
                                            <button class="popup-open">
                                                <i class="icofont-eye-alt opacity-0 group-hover:opacity-100"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="image-wrapper relative group" data-aos="fade-up">
                                        <img src="assets/images/blog/blog_17.png" alt="Image 1"
                                            class="gallery-image w-full">
                                        <div
                                            class="absolute left-0 top-0 right-0 bottom-0 bg-blackColor bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-60 text-whiteColor flex items-center justify-center">
                                            <button class="popup-open">
                                                <i class="icofont-eye-alt opacity-0 group-hover:opacity-100"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="image-wrapper relative group" data-aos="fade-up">
                                        <img src="assets/images/blog/blog_18.png" alt="Image 1"
                                            class="gallery-image w-full">
                                        <div
                                            class="absolute left-0 top-0 right-0 bottom-0 bg-blackColor bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-60 text-whiteColor flex items-center justify-center">
                                            <button class="popup-open">
                                                <i class="icofont-eye-alt opacity-0 group-hover:opacity-100"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="image-wrapper relative group" data-aos="fade-up">
                                        <img src="assets/images/blog/blog_19.png" alt="Image 1"
                                            class="gallery-image w-full">
                                        <div
                                            class="absolute left-0 top-0 right-0 bottom-0 bg-blackColor bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-60 text-whiteColor flex items-center justify-center">
                                            <button class="popup-open">
                                                <i class="icofont-eye-alt opacity-0 group-hover:opacity-100"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="image-wrapper relative group" data-aos="fade-up">
                                        <img src="assets/images/blog/blog_20.png" alt="Image 1"
                                            class="gallery-image w-full">
                                        <div
                                            class="absolute left-0 top-0 right-0 bottom-0 bg-blackColor bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-60 text-whiteColor flex items-center justify-center">
                                            <button class="popup-open">
                                                <i class="icofont-eye-alt opacity-0 group-hover:opacity-100"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <!-- contact form -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Get in Touch
                            </h4>
                            <form class="space-y-5">
                                <input type="text" placeholder="Enter Name*"
                                    class="w-full text-contentColor leading-7 pb-10px bg-transparent focus:outline-none placeholder:text-placeholder placeholder:opacity-80 border-b border-borderColor2 dark:text-contentColor-dark dark:border-borderColor2-dark">
                                <input type="email" placeholder="Enter your mail*"
                                    class="w-full text-contentColor leading-7 pb-10px bg-transparent focus:outline-none placeholder:text-placeholder placeholder:opacity-80 border-b border-borderColor2 dark:text-contentColor-dark dark:border-borderColor2-dark">
                                <input type="text" placeholder="Message*"
                                    class="w-full text-contentColor leading-7 pb-10px bg-transparent focus:outline-none placeholder:text-placeholder placeholder:opacity-80 border-b border-borderColor2 dark:text-contentColor-dark dark:border-borderColor2-dark">
                                <button type="submit"
                                    class="text-size-15 text-whiteColor uppercase bg-primaryColor border border-primaryColor px-55px py-13px hover:text-primaryColor hover:bg-whiteColor rounded inline-block dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                    Send Message
                                </button>
                            </form>
                        </div> --}}
                        <!-- tags -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Tag Populer
                            </h4>
                            <ul class="flex flex-wrap gap-x-5px">
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">Business</a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">DESIGN
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">APPS
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">LANDING
                                        PAGE
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">DATA
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">BOOK
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">DESIGN
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">BOOK
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">LANDING
                                        PAGE
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-details.html"
                                        class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">DATA</a>
                                </li>
                            </ul>
                        </div>
                        <!-- social area -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Ikuti Kami
                            </h4>
                            <div>
                                <ul class="flex gap-10px items-center">
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
