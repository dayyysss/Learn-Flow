@section('header')
    <header>
        <!-- header top start -->
        <div class="bg-blackColor2 dark:bg-lightGrey10-dark hidden lg:block">
            <div
                class="container 3xl:container2-lg 4xl:container mx-auto text-whiteColor text-size-12 xl:text-sm py-5px xl:py-9px">
                <div class="flex justify-between items-center">
                    <div>
                        <p>Call Us: +62 896-0114-9580 - Mail Us: learnflow@mail.com</p>
                    </div>
                    <div class="flex gap-37px items-center">
                        <div>
                            <p>
                                <i class="icofont-location-pin text-primaryColor text-size-15 mr-5px"></i>
                                <span>684 Taman Pagelaran Street. Ciomas City, ID</span>
                            </p>
                        </div>
                        <div>
                            <!-- header social list -->
                            <ul class="flex gap-13px text-size-15">
                                <li>
                                    <a class="hover:text-primaryColor" href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-primaryColor" href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-primaryColor" href="#"><i class="icofont-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-primaryColor" href="#"><i
                                            class="icofont-youtube-play"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- navbar start -->
        <div class="transition-all duration-500 sticky-header z-medium dark:bg-whiteColor-dark">
            <nav>
                <div class="py-15px lg:py-0 px-15px lg:container 3xl:container2-lg 4xl:container mx-auto relative">
                    <div class="grid grid-cols-2 lg:grid-cols-12 items-center gap-15px">
                        <!-- navbar left -->
                        <div class="lg:col-start-1 lg:col-span-2">
                            <a href="{{ url('/') }}" class="block">
                                <img src="{{ asset('assets/images/logo/logo_1.png') }}" alt="Logo" class="w-full lg:w-auto py-2">
                            </a>
                        </div>
                        
                        <!-- Main menu -->
                        <div class="hidden lg:block lg:col-start-3 lg:col-span-7">
                            <ul class="nav-list flex justify-center">
                                <li class="nav-item group">
                                    <a href="{{ route('index') }}"
                                        class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item group">
                                    <a href="{{ route('about') }}"
                                        class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item group relative">
                                    <a href="{{ route('course') }}"
                                        class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                                        Courses
                                        <i class="icofont-rounded-down"></i>
                                    </a>
                                    <!-- dropdown menu -->
                                    <div class="dropdown absolute left-0 translate-y-10 z-medium hidden opacity-0"
                                        style="transition: 0.3s">
                                        <div
                                            class="shadow-dropdown max-w-dropdown2 w-2000 py-14px rounded-standard bg-white dark:bg-whiteColor-dark">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('course') }}"
                                                        class="text-sm 2xl:text-base font-semibold text-contentColor border-l-2 border-transparent transition duration-300 hover:border-primaryColor px-25px py-10px hover:bg-whitegrey1 block hover:text-primaryColor leading-sm lg:leading-lg 2xl:leading-lg dark:text-contentColor-dark dark:hover:text-primaryColor dark:hover:bg-whitegrey1-dark">
                                                        Course
                                                        <span
                                                            class="text-size-12 font-semibold text-primaryColor bg-whitegrey3 px-15px py-5px rounded">Trending</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('course') }}"
                                                        class="text-sm 2xl:text-base font-semibold text-contentColor border-l-2 border-transparent transition duration-300 hover:border-primaryColor px-25px py-10px hover:bg-whitegrey1 block hover:text-primaryColor leading-sm lg:leading-lg 2xl:leading-lg dark:text-contentColor-dark dark:hover:text-primaryColor dark:hover:bg-whitegrey1-dark">
                                                        Zoom & Webinars
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('course') }}"
                                                        class="text-sm 2xl:text-base font-semibold text-contentColor border-l-2 border-transparent transition duration-300 hover:border-primaryColor px-25px py-10px hover:bg-whitegrey1 block hover:text-primaryColor leading-sm lg:leading-lg 2xl:leading-lg dark:text-contentColor-dark dark:hover:text-primaryColor dark:hover:bg-whitegrey1-dark">
                                                        Event
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item group relative">
                                    <a href="{{ route('blog') }}"
                                        class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                                        Blog
                                    </a>
                                </li>
                                <li class="nav-item group relative">
                                    <a href="{{ route('contact') }}"
                                        class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar right -->
                        <div class="lg:col-start-10 lg:col-span-3">
                            <ul class="relative nav-list flex justify-end items-center">
                                <li class="px-5 lg:px-10px 2xl:px-5 lg:py-4 2xl:py-26px 3xl:py-9 group">
                                    <a href="{{ url('/cart') }}" class="relative block"><i
                                            class="icofont-cart-alt text-2xl text-blackColor group-hover:text-secondaryColor transition-all duration-300 dark:text-blackColor-dark"></i>
                                        <span
                                            class="absolute -top-1 2xl:-top-[5px] -right-[10px] lg:right-3/4 2xl:-right-[10px] text-[10px] font-medium text-white dark:text-whiteColor-dark bg-secondaryColor px-1 py-[2px] leading-1 rounded-full z-50 block">3</span></a>
                                    <!-- dropdown menu -->
                                    <div class="dropdown absolute top-full right-0 lg:right-8 z-medium hidden opacity-0"
                                        style="transition: 0.3s">
                                        <div
                                            class="shadow-dropdown-secodary max-w-dropdown3 w-2000 rounded-standard p-5 bg-white dark:bg-whiteColor-dark">
                                            <ul
                                                class="flex flex-col gap-y-5 pb-5 mb-30px border-b border-borderColor dark:border-borderColor-dark">
                                                <li class="relative flex gap-x-15px items-center">
                                                    <a href="course-details.html"><img src="assets/images/grid/cart1.jpg"
                                                            alt="photo" class="w-card-img py-[3px]"></a>
                                                    <div>
                                                        <a href="course-details.html"
                                                            class="text-sm text-darkblack hover:text-secondaryColor leading-5 block pb-2 capitalize dark:text-darkblack-dark dark:hover:text-secondaryColor">web
                                                            dictionary</a>
                                                        <p
                                                            class="text-sm text-darkblack leading-5 block pb-5px dark:text-darkblack-dark">
                                                            1 x
                                                            <span class="text-secondaryColor">$ 80.00</span>
                                                        </p>
                                                    </div>

                                                    <button
                                                        class="absolute block top-0 right-0 text-base text-contentColor leading-1 hover:text-secondaryColor dark:text-contentColor-dark dark:hover:text-secondaryColor">
                                                        <i class="icofont-close-line"></i>
                                                    </button>
                                                </li>
                                                <li class="relative flex gap-x-15px items-center">
                                                    <a href="course-details.html"><img src="assets/images/grid/cart2.jpg"
                                                            alt="photo" class="w-card-img py-[3px]"></a>
                                                    <div>
                                                        <a href="course-details.html"
                                                            class="text-sm text-darkblack hover:text-secondaryColor leading-5 block pb-2 capitalize dark:text-darkblack-dark dark:hover:text-secondaryColor">Design
                                                            Minois</a>
                                                        <p
                                                            class="text-sm text-darkblack leading-5 block pb-5px dark:text-darkblack-dark">
                                                            1 x
                                                            <span class="text-secondaryColor">$ 60.00</span>
                                                        </p>
                                                    </div>

                                                    <button
                                                        class="absolute block top-0 right-0 text-base text-contentColor leading-1 hover:text-secondaryColor dark:text-contentColor-dark dark:hover:text-secondaryColor">
                                                        <i class="icofont-close-line"></i>
                                                    </button>
                                                </li>
                                                <li class="relative flex gap-x-15px items-center">
                                                    <a href="course-details.html"><img src="assets/images/grid/cart3.jpg"
                                                            alt="photo" class="w-card-img py-[3px]"></a>
                                                    <div>
                                                        <a href="course-details.html"
                                                            class="text-sm text-darkblack hover:text-secondaryColor leading-5 block pb-2 capitalize dark:text-darkblack-dark dark:hover:text-secondaryColor">Crash
                                                            Course</a>
                                                        <p
                                                            class="text-sm text-darkblack leading-5 block pb-5px dark:text-darkblack-dark">
                                                            1 x
                                                            <span class="text-secondaryColor">$ 70.00</span>
                                                        </p>
                                                    </div>

                                                    <button
                                                        class="absolute block top-0 right-0 text-base text-contentColor leading-1 hover:text-secondaryColor dark:text-contentColor-dark dark:hover:text-secondaryColor">
                                                        <i class="icofont-close-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                            <!-- total price -->
                                            <div>
                                                <p
                                                    class="text-size-17 text-contentColor dark:text-contentColor-dark pb-5 flex justify-between">
                                                    Total Price:
                                                    <span class="font-bold text-secondaryColor">$ 210.00</span>
                                                </p>
                                            </div>

                                            <!-- action buttons -->
                                            <div class="flex flex-col gap-y-5">
                                                <a href="{{ url('/cart') }}"
                                                    class="text-sm font-bold text-contentColor dark:text-contentColor-dark hover:text-whiteColor hover:bg-secondaryColor text-center py-10px border border-secondaryColor">View
                                                    Cart</a>
                                                <a href="{{ url('/checkout') }}"
                                                    class="text-sm font-bold bg-darkblack dark:bg-darkblack-dark text-whiteColor dark:text-whiteColor-dark hover:bg-secondaryColor dark:hover:bg-secondaryColor text-center py-10px">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="hidden lg:block">
                                    <a href="{{ url('/learnflow') }}"
                                        class="text-size-12 2xl:text-size-15 px-15px py-2 text-blackColor hover:text-whiteColor bg-whiteColor block hover:bg-primaryColor border border-borderColor1 rounded-standard font-semibold mr-[7px] 2xl:mr-15px dark:text-blackColor-dark dark:bg-whiteColor-dark dark:hover:bg-primaryColor dark:hover:text-whiteColor dark:hover:border-primaryColor"><i
                                            class="icofont-user-alt-5"></i></a>
                                </li>
                                <li class="hidden lg:block">
                                    @auth
                                        <!-- Jika sudah login, tampilkan tautan ke dashboard -->
                                        <a href="{{ url('/admin/dashboard') }}"
                                           class="text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                           Dashboard
                                        </a>
                                    @else
                                        <!-- Jika belum login, tampilkan tautan ke login -->
                                        <a href="{{ url('/learnflow') }}"
                                           class="text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                           Get Started
                                        </a>
                                    @endauth
                                </li>
                                
                                <li class="block lg:hidden">
                                    <button
                                        class="open-mobile-menu text-3xl text-darkdeep1 hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">
                                        <i class="icofont-navigation-menu"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- navbar end -->

        <!-- mobile menu -->
        <div
            class="mobile-menu w-mobile-menu-sm md:w-mobile-menu-lg fixed top-0 -right-[280px] md:-right-[330px] transition-all duration-500 w-mobile-menu h-full shadow-dropdown-secodary bg-whiteColor dark:bg-whiteColor-dark z-high block lg:hidden">
            <button
                class="close-mobile-menu text-lg bg-darkdeep1 hover:bg-secondaryColor text-white px-[11px] py-[6px] absolute top-0 right-full hidden">
                <i class="icofont icofont-close-line"></i>
            </button>
            <!-- mobile menu wrapper -->
            <div class="px-5 md:px-30px pt-5 md:pt-10 pb-50px h-full overflow-y-auto">
                <!-- search input  -->
                <div class="pb-10 border-b border-borderColor dark:border-borderColor-dark">
                    <form
                        class="flex justify-between items-center w-full bg-whitegrey2 dark:bg-whitegrey2-dark px-15px py-[11px]">
                        <input type="text" placeholder="Search entire store..."
                            class="bg-transparent w-4/5 focus:outline-none text-sm text-darkdeep1 dark:text-blackColor-dark">
                        <button
                            class="block text-lg text-darkdeep1 hover:text-secondaryColor dark:text-blackColor-dark dark:hover:text-secondaryColor">
                            <i class="icofont icofont-search-2"></i>
                        </button>
                    </form>
                </div>

                <!-- mobile menu accordions -->
                <div class="pt-8 pb-6 border-b border-borderColor dark:border-borderColor-dark">
                    <ul class="accordion-container">
                        <li class="accordion">
                            <!-- accordion header -->
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="index.html">Home</a>
                            </div>

                        </li>
                        <li class="accordion">
                            <!-- accordion header -->
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="#">About</a>
                            </div>
                        </li>
                        <li class="accordion">
                            <!-- accordion header -->
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="course.html">Courses</a>
                                <button class="accordion-controller px-3 py-4">
                                    <span class="w-[10px] h-[1px] bg-darkdeep1 block dark:bg-whiteColor"></span><span
                                        class="w-[10px] h-[1px] bg-darkdeep1 block dark:bg-whiteColor rotate-90 -mt-[1px] transition-all duration-500"></span>
                                </button>
                            </div>
                            <!-- accordion content -->
                            <div class="accordion-content h-0 overflow-hidden transition-all duration-500">
                                <div class="content-wrapper">
                                    <ul class="accordion-container">
                                        <li class="accordion">
                                            <!-- accordion header -->
                                            <div class="flex items-center justify-between">
                                                <a href="#"
                                                    class="leading-1 text-darkdeep1 text-sm pl-15px pt-3 pb-7px font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">Courses</a>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <a href="#"
                                                    class="leading-1 text-darkdeep1 text-sm pl-15px pt-3 pb-7px font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">Zoom
                                                    & Webinars</a>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <a href="#"
                                                    class="leading-1 text-darkdeep1 text-sm pl-15px pt-3 pb-7px font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">Event</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="accordion">
                            <!-- accordion header -->
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="#">Blog</a>
                            </div>
                        </li>
                        <li class="accordion">
                            <!-- accordion header -->
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="#">Contact</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- my account accordion -->
                <div>
                    <ul
                        class="accordion-container mt-9 mb-30px pb-9 border-b border-borderColor dark:border-borderColor-dark">
                        <li class="accordion group">
                            <!-- accordion header -->
                            <div class="accordion-controller flex items-center justify-between">
                                <a class="leading-1 text-darkdeep1 font-medium group-hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="#">My Account</a>
                                <button class="px-3 py-1">
                                    <i
                                        class="icofont-thin-down text-size-15 text-darkdeep1 group-hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"></i>
                                </button>
                            </div>
                            <!-- accordion content -->
                            <div class="accordion-content h-0 overflow-hidden transition-all duration-500 shadow-standard">
                                <div class="content-wrapper">
                                    <ul>
                                        <li>
                                            <!-- accordion header -->
                                            <div class="flex items-center gap-1">
                                                <a href="login.html"
                                                    class="leading-1 text-darkdeep1 text-sm pl-30px pt-7 pb-3 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">Login
                                                </a>

                                                <a href="login.html"
                                                    class="leading-1 text-darkdeep1 text-sm pr-30px pt-7 pb-4 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">
                                                    <span>/</span> Create Account
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- accordion header -->
                                            <div class="flex items-center justify-between">
                                                <a href="login.html"
                                                    class="leading-1 text-darkdeep1 text-sm pl-30px pt-3 pb-7 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">My
                                                    Account</a>
                                            </div>
                                            <!-- accordion content -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Mobile menu social area -->
                <div>
                    <ul class="flex gap-6 items-center mb-5">
                        <li>
                            <a class="facebook" href="#"><i
                                    class="icofont icofont-facebook text-fb-color dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                        </li>
                        <li>
                            <a class="twitter" href="#"><i
                                    class="icofont icofont-twitter text-twiter-color dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                        </li>
                        <li>
                            <a class="pinterest" href="#"><i
                                    class="icofont icofont-pinterest dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                        </li>
                        <li>
                            <a class="instagram" href="#"><i
                                    class="icofont icofont-instagram dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                        </li>
                        <li>
                            <a class="google" href="#"><i
                                    class="icofont icofont-youtube-play dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
@show
