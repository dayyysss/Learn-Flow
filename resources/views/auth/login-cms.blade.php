<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', 'Login | LFCMS')</title>
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('assets/images/favicon.ico') }}">
    <!-- link stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/video-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('head')
</head>

<body class="relative font-inter font-normal text-base leading-[1.8] bg-bodyBg dark:bg-bodyBg-dark">
    <!-- theme fixed shadow -->
    <div>
        <div class="fixed-shadow left-[-250px]"></div>
        <div class="fixed-shadow right-[-250px]"></div>
    </div>

    <!-- theme controller -->
    <div class="fixed top-[100px] 2xl:top-[300px] transition-all duration-300 right-[-50px] hover:right-0 z-xl">
        <button
            class="theme-controller w-90px h-10 bg-primaryColor dark:bg-whiteColor-dark rounded-l-lg2 text-whiteColor px-10px flex items-center dark:shadow-theme-controller">
            <!-- dark -->
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-10px w-5 block dark:hidden" viewBox="0 0 512 512">
                <path
                    d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32"></path>
            </svg>
            <span class="text-base block dark:hidden">Dark</span>
            <!-- light -->
            <svg xmlns="http://www.w3.org/2000/svg" class="hidden mr-10px w-5 dark:block" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                    stroke-width="32"
                    d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94">
                </path>
                <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-miterlimit="10" stroke-width="32"></circle>
            </svg>
            <span class="text-base hidden dark:block">Light</span>
        </button>
    </div>
    <!-- scroll up button -->
    <div>
        <button
            class="scroll-up w-50px h-50px leading-50px text-center text-primaryColor bg-white hover:text-whiteColor hover:bg-primaryColor rounded-full fixed right-5 bottom-[60px] shadow-scroll-up z-medium text-xl dark:text-whiteColor dark:bg-primaryColor dark:hover:text-whiteColor-dark hidden">
            <i class="icofont-rounded-up"></i>
        </button>
    </div>

    <main class="bg-transparent">
        <section class="relative">
            <div class="container py-100px">
                <div class="tab md:w-2/3 mx-auto">
                    <!--  tab contents -->
                    <div
                        class="shadow-container bg-whiteColor dark:bg-whiteColor-dark pt-10px px-5 pb-10 md:p-50px md:pt-30px rounded-5px">
                        <div class="tab-contents">
                            <!-- login form-->
                            <div class="block opacity-100 transition-opacity duration-150 ease-linear">
                                <!-- heading   -->
                                <div class="text-center">
                                    <h3
                                        class="text-size-32 font-bold text-blackColor dark:text-blackColor-dark mb-2 leading-normal">
                                        Masuk
                                    </h3>
                                </div>

                                <form class="pt-25px" action="{{ route('login') }}" method="POST" data-aos="fade-up">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif


                                    <div class="mb-25px">
                                        <label
                                            class="text-contentColor dark:text-contentColor-dark mb-10px block">Username
                                            atau email</label>
                                        <input type="text" id="email" name="email"
                                            placeholder="Your username or email"
                                            class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded" />
                                    </div>

                                    <div class="mb-25px">
                                        <label
                                            class="text-contentColor dark:text-contentColor-dark mb-10px block">Password</label>
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded" />
                                    </div>

                                    <div
                                        class="text-contentColor dark:text-contentColor-dark flex items-center justify-between">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="remember" name="remember"
                                                class="w-18px h-18px mr-2 block box-content" />
                                            <label for="remember"> Ingatkan saya</label>
                                        </div>
                                        <div>
                                            <a href="{{ route('password.request') }}"
                                                class="hover:text-primaryColor relative after:absolute after:left-0 after:bottom-0.5 after:w-0 after:h-0.5 after:bg-primaryColor after:transition-all after:duration-300 hover:after:w-full">
                                                Lupa kata sandi Anda?
                                            </a>
                                        </div>
                                    </div>

                                    <div class="my-25px text-center">
                                        <button type="submit"
                                            class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px w-full border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                                            Masuk
                                        </button>
                                    </div>
                                </form>
                                <x-notify::notify />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- animated icons -->
            <div>
                <img loading="lazy" class="absolute right-[14%] top-[30%] animate-move-var"
                    src="assets/images/education/hero_shape2.png" alt="Shape" />
                <img loading="lazy" class="absolute left-[5%] top-1/2 animate-move-hor"
                    src="assets/images/education/hero_shape3.png" alt="Shape" />
                <img loading="lazy" class="absolute left-1/2 bottom-[60px] animate-spin-slow"
                    src="assets/images/education/hero_shape4.png" alt="Shape" />
                <img loading="lazy" class="absolute left-1/2 top-10 animate-spin-slow"
                    src="assets/images/education/hero_shape5.png" alt="Shape" />
            </div>
        </section>
    </main>

    <!-- scripts start from here -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/accordion.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/count.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    <script src="{{ asset('assets/js/mobileMenu.js') }}"></script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    <script src="{{ asset('assets/js/scrollUp.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/smoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/stickyHeader.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/videoModal.js') }}"></script>
    <script src="{{ asset('assets/js/vanilla-tilt.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @notifyJs

    <script>
        document.querySelectorAll('.tab-links button').forEach((btn, index) => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-contents > div').forEach((content, contentIndex) => {
                    content.classList.toggle('hidden', contentIndex !== index);
                    content.classList.toggle('opacity-100', contentIndex === index);
                });
            });
        });
    </script>
</body>

</html>
