@section('header')
    <header>
        <!-- header top start -->
        <div class="bg-blackColor2 dark:bg-lightGrey10-dark hidden lg:block">
            @guest
                <div
                    class="container 3xl:container-secondary-lg 4xl:container mx-auto text-whiteColor text-size-12 xl:text-sm py-5px xl:py-9px">
                    <div class="flex justify-between items-center">
                        <div>
                            <p>Event intensif terbaru, Coding Camp 2025 powered by DBS Foundation. Segera Daftar!
                                <a href="{{ route('event') }}" rel="nofollow noopener noreferrer" class="dcd-link ml-3"
                                    style="color: #1a5ace;">
                                    Lihat di sini
                                    <i class="ml-1" style="display: inline-flex; vertical-align: middle;">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.4712 4.86128C10.2109 4.60093 9.78878 4.60093 9.52843 4.86128C9.26808 5.12163 9.26808 5.54374 9.52843 5.80409L11.057 7.33268H3.33317C2.96498 7.33268 2.6665 7.63116 2.6665 7.99935C2.6665 8.36754 2.96498 8.66602 3.33317 8.66602H11.057L9.52843 10.1946C9.26808 10.455 9.26808 10.8771 9.52843 11.1374C9.78878 11.3978 10.2109 11.3978 10.4712 11.1374L13.1379 8.47075C13.3983 8.2104 13.3983 7.78829 13.1379 7.52794L10.4712 4.86128Z">
                                            </path>
                                        </svg>
                                    </i>
                                </a>
                            </p>
                        </div>
                        <div class="flex gap-37px items-center">
                            <div>
                                <p>
                                    <i class="icofont-location-pin text-primaryColor text-size-15 mr-5px"></i>
                                    <span>684 Jalan Taman Pagelaran. Ciomas, ID</span>
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
            @endguest
        </div>
        <!-- header top end -->

        <!-- navbar start -->
        <div class="transition-all duration-500 sticky-header z-medium dark:bg-whiteColor-dark">
            <nav>
                <div class="py-15px lg:py-0 px-15px lg:container 3xl:container-secondary-lg 4xl:container mx-auto relative">
                    <div class="grid grid-cols-2 lg:grid-cols-12 items-center gap-15px">
                        <!-- navbar left -->
                        <div class="lg:col-start-1 lg:col-span-2">
                            <a href="{{ url('/') }}" class="block">
                                <img src="{{ asset('assets/images/logo/logo_1.png') }}" alt="Logo"
                                    style="width: 180px;">
                            </a>
                        </div>

                        <!-- Main menu -->
                        <div class="hidden lg:block lg:col-start-3 lg:col-span-7">
                            <ul id="mainmenu" class="nav-list flex justify-center">
                                {{-- MENU HEADER --}}
                            </ul>
                        </div>
                        <!-- navbar right -->
                        <div class="lg:col-start-10 lg:col-span-3">
                            <ul class="relative nav-list flex justify-end items-center">
                                @auth
                                    <li class="px-5 lg:px-10px 2xl:px-5 lg:py-4 2xl:py-26px 3xl:py-9 group">
                                        <a href="{{ url('/cart') }}" class="relative block">
                                            <i
                                                class="icofont-cart-alt text-3xl text-blackColor group-hover:text-secondaryColor transition-all duration-300 dark:text-blackColor-dark"></i>
                                            <span
                                                class="absolute -top-1 2xl:-top-[5px] -right-[10px] lg:right-3/4 2xl:-right-[10px] text-[10px] font-medium text-white dark:text-whiteColor-dark bg-secondaryColor px-1 py-[2px] leading-1 rounded-full z-50 block">
                                                {{ $cartCount }}
                                            </span>
                                        </a>

                                        <div class="dropdown absolute top-full right-0 lg:right-8 z-medium hidden opacity-0"
                                            style="transition: 0.3s">
                                            <div
                                                class="shadow-dropdown-secodary max-w-dropdown3 w-2000 rounded-standard p-5 bg-white dark:bg-whiteColor-dark">
                                                <ul
                                                    class="flex flex-col gap-y-5 pb-5 mb-30px border-b border-borderColor dark:border-borderColor-dark">
                                                    @foreach ($cartItems as $cartItem)
                                                        @php
                                                            $course = \App\Models\Course::find($cartItem['course_id']);
                                                            $quantity = 1;
                                                        @endphp
                                                        <li class="relative flex gap-x-15px items-center">
                                                            <a href="{{ route('course.detail', $course->id) }}">
                                                                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                                                    alt="{{ $course->name }}" width="40">
                                                            </a>
                                                            <div>
                                                                <a href="{{ route('course.detail', $course->id) }}"
                                                                    class="text-sm text-darkblack hover:text-secondaryColor leading-5 block pb-2 capitalize dark:text-darkblack-dark dark:hover:text-secondaryColor">
                                                                    {{ Str::limit($course->name, 20) }}
                                                                </a>
                                                                <p
                                                                    class="text-sm text-darkblack leading-5 block pb-5px dark:text-darkblack-dark">
                                                                    {{ $quantity }} x <span class="text-secondaryColor">Rp
                                                                        {{ number_format($cartItem['total_price'], 2, ',', '.') }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <button
                                                                class="remove-item absolute block top-0 right-0 text-base text-contentColor leading-1 hover:text-secondaryColor dark:text-contentColor-dark dark:hover:text-secondaryColor"
                                                                data-course-id="{{ $cartItem['course_id'] }}"
                                                                data-cart-id="{{ $cart ? $cart->id : '' }}">
                                                                <i class="icofont-close-line"></i>
                                                            </button>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <!-- Total Price -->
                                                <div>
                                                    <p
                                                        class="text-size-17 text-contentColor dark:text-contentColor-dark pb-5 flex justify-between">
                                                        Total Price:
                                                        <span id="total-price" class="font-bold text-secondaryColor">
                                                            Rp
                                                            {{ number_format(collect($cartItems)->sum('total_price'), 2, ',', '.') }}
                                                        </span>
                                                    </p>
                                                </div>

                                                <!-- View Cart and Checkout Buttons -->
                                                <div class="flex flex-col gap-y-5">
                                                    <a href="{{ url('/cart') }}"
                                                        class="text-sm font-bold text-contentColor dark:text-contentColor-dark hover:text-whiteColor hover:bg-secondaryColor text-center py-10px border border-secondaryColor">
                                                        Lihat Keranjang
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="relative px-1 lg:px-10px 2xl:px-1 lg:py-1 2xl:py-1px 3xl:py-1 group">
                                        <div class="mr-5 cursor-pointer group relative flex items-center">
                                            <!-- Gambar Profil -->
                                            <img src="{{ asset('assets/images/avatar/default-avatar.png') ?? Auth::user()->image }}"
                                                alt="Profil" class="w-10 h-auto rounded-full border-2 border-darkdeep7 p-1">
                                            <!-- Tambahkan panah sebagai ikon -->
                                            <i
                                                class="arrow-icon ml-2 transition-transform duration-300 icofont-simple-down arrow-icon-side transform rotate-0 leading-14px text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor"></i>

                                            <!-- Profile Dropdown -->
                                            <div
                                                class="dropdown-profile absolute top-full right-0 mt-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-opacity duration-300 z-50 bg-white dark:bg-darkblack-dark rounded-lg shadow-md p-5">

                                                <a href="{{ route('dashboard.myProfile') }}"
                                                    class="flex items-center text-darkblack hover:text-secondaryColor dark:text-whiteColor-dark dark:hover:text-secondaryColor">
                                                    <!-- Ikon SVG Profil -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-user mr-2">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                    Profil Saya
                                                </a>

                                                <a href="{{ route('settings.index') }}"
                                                    class="flex items-center mt-2 text-darkblack hover:text-secondaryColor dark:text-whiteColor-dark dark:hover:text-secondaryColor">
                                                    <!-- Ikon SVG Pengaturan -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-settings mr-2">
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                        <path
                                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                        </path>
                                                    </svg>
                                                    Pengaturan
                                                </a>

                                                <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="flex items-center mt-2 text-darkblack hover:text-secondaryColor dark:text-whiteColor-dark dark:hover:text-secondaryColor">
                                                    <!-- Ikon SVG Keluar -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-log-out mr-2" id="logout-link">
                                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                        <polyline points="16 17 21 12 16 7"></polyline>
                                                        <line x1="21" y1="12" x2="9" y2="12">
                                                        </line>
                                                    </svg>
                                                    Keluar
                                                </a>

                                                <!-- Form Logout Tersembunyi -->
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>


                                    <li class="hidden lg:block">

                                        <!-- Jika sudah login, tampilkan tautan ke dashboard -->
                                        <a href="{{ url('/dashboard') }}"
                                            class="text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                            Dashboard
                                        </a>
                                    @else
                                        <!-- Jika belum login, tampilkan tautan ke login -->
                                        <a href="{{ url('/login') }}"
                                            class="text-size-12 2xl:text-size-15 text-whiteColor bg-primaryColor block border-primaryColor border hover:text-primaryColor hover:bg-white px-15px py-2 rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                            Masuk / Daftar
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
                        <input type="text" placeholder="Cari sesuatu disini..."
                            class="bg-transparent w-4/5 focus:outline-none text-sm text-darkdeep1 dark:text-blackColor-dark">
                        <button
                            class="block text-lg text-darkdeep1 hover:text-secondaryColor dark:text-blackColor-dark dark:hover:text-secondaryColor">
                            <i class="icofont icofont-search-2"></i>
                        </button>
                    </form>
                </div>

                <!-- mobile menu accordions -->
                <div id="sidebar-menu" class="pt-8 pb-6 border-b border-borderColor dark:border-borderColor-dark">
                    {{-- HEADER MOBILE --}}
                </div>

                <!-- my account accordion -->
                <div>
                    <ul
                        class="accordion-container mt-9 mb-30px pb-9 border-b border-borderColor dark:border-borderColor-dark">
                        <li class="accordion group">
                            <!-- accordion header -->
                            <div class="accordion-controller flex items-center justify-between">
                                <a class="leading-1 text-darkdeep1 font-medium group-hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="#">Akun Saya</a>
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
                                                <a href="{{ url('/login') }}"
                                                    class="leading-1 text-darkdeep1 text-sm pl-30px pt-7 pb-3 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">Masuk
                                                </a>

                                                <a href="{{ url('/login') }}"
                                                    class="leading-1 text-darkdeep1 text-sm pr-30px pt-7 pb-4 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">
                                                    <span>/</span> Daftar
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- accordion header -->
                                            <div class="flex items-center justify-between">
                                                <a href="{{ url('/login') }}"
                                                    class="leading-1 text-darkdeep1 text-sm pl-30px pt-3 pb-7 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">Akun
                                                    Saya</a>
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

<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>

{{-- MENU HEADER --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('menu.landing') }}",
            method: 'GET',
            dataType: 'json',
            data: {
                menu_type: 'header'
            },
            success: function(data) {
                let mainMenu = '';
                $.each(data, function(index, menu) {
                    if (menu.hasChildren) {
                        mainMenu += `<li class="nav-item group relative">
                        <a href="${menu.link}" class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                            ${menu.content} <i class="icofont-rounded-down"></i>
                        </a>
                        <div class="dropdown absolute left-0 translate-y-10 z-50 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="shadow-dropdown max-w-dropdown2 w-2000 py-14px rounded-standard bg-white dark:bg-whiteColor-dark">
                                <ul class="py-1">`;

                        if (menu.children && menu.children.length > 0) {
                            $.each(menu.children, function(childIndex, child) {
                                mainMenu += `<li>
                                <a href="${child.link}" class="text-sm 2xl:text-base font-semibold text-contentColor border-l-2 border-transparent transition duration-300 hover:border-primaryColor px-25px py-10px hover:bg-whitegrey1 block hover:text-primaryColor leading-sm lg:leading-lg 2xl:leading-lg dark:text-contentColor-dark dark:hover:text-primaryColor dark:hover:bg-whitegrey1-dark">
                                    ${child.content}
                                </a>
                            </li>`;
                            });
                        }

                        mainMenu += `</ul></div></div></li>`;
                    } else {
                        mainMenu += `<li class="nav-item group">
                        <a href="${menu.link}" class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor">
                            ${menu.content}
                        </a>
                    </li>`;
                    }
                });

                $('#mainmenu').html(mainMenu);

                // Tambahkan CSS tambahan jika diperlukan
                const style = `
                <style>
                    .nav-item.group:hover .dropdown {
                        visibility: visible;
                        opacity: 1;
                        transform: translateY(0);
                    }
                </style>
            `;
                $('head').append(style);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching menu:', textStatus, errorThrown);
            }
        });
    });
</script>

{{-- HEADER MOBILE --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('menu.landing') }}",
            method: 'GET',
            dataType: 'json',
            data: {
                menu_type: 'sidebar'
            },
            success: function(data) {
                let sidebarMenu = '';

                $.each(data, function(index, menu) {
                    if (menu.hasChildren) {
                        sidebarMenu += `
                        <li class="accordion">
                            <!-- accordion header -->
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="${menu.link}">${menu.content}</a>
                               <button class="accordion-controller px-3 py-4">
                                <span class="w-[10px] h-[1px] bg-darkdeep1 block dark:bg-whiteColor"></span>
                                <span class="w-[10px] h-[1px] bg-darkdeep1 block dark:bg-whiteColor rotate-90 -mt-[1px] transition-all duration-500"></span>
                            </button>
                            </div>
                            <!-- accordion content -->
                            <div class="accordion-content h-0 overflow-hidden transition-all duration-500">
                                <div class="content-wrapper">
                                    <ul>`;

                        if (menu.children && menu.children.length > 0) {
                            $.each(menu.children, function(childIndex, child) {
                                sidebarMenu += `
                                <li class="accordion">
                                    <!-- accordion header -->
                                    <div class="flex items-center justify-between">
                                        <a href="${child.link}" 
                                           class="leading-1 text-darkdeep1 text-sm pl-15px pt-3 pb-7px font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">
                                            ${child.content}
                                            ${child.badge ? `
                                            <span class="px-15px py-5px text-primaryColor bg-whitegrey3 text-xs rounded ml-5px">
                                                ${child.badge}
                                            </span>` : ''}
                                        </a>
                                    </div>
                                </li>`;
                            });
                        }

                        sidebarMenu += `
                                    </ul>
                                </div>
                            </div>
                        </li>`;
                    } else {
                        sidebarMenu += `
                        <li>
                            <div class="flex items-center justify-between">
                                <a class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor"
                                    href="${menu.link}">${menu.content}</a>
                            </div>
                        </li>`;
                    }
                });

                // Wrap the menu in accordion-container
                $('#sidebar-menu').html(`
                <ul class="accordion-container">
                    ${sidebarMenu}
                </ul>
            `);

                // Add click handler for accordion buttons
                $(document).on('click', '.accordion-controller', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Toggle rotation for the plus/minus icon
                    $(this).find('span:last-child').toggleClass('rotate-0');

                    // Find and toggle the content
                    const content = $(this).closest('.accordion').find(
                        '.accordion-content');

                    // If content is closing, add h-0
                    if (!content.hasClass('h-0')) {
                        content.addClass('h-0');
                    } else {
                        // If content is opening, remove h-0
                        content.removeClass('h-0');
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching menu:', textStatus, errorThrown);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".remove-item").forEach(button => {
            button.addEventListener("click", function() {
                let courseId = this.getAttribute("data-course-id");
                let cartId = this.getAttribute("data-cart-id");

                if (!cartId || !courseId) {
                    alert("Cart ID atau Course ID tidak ditemukan!");
                    return;
                }

                fetch(`/cart/${cartId}`, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({
                            course_id: courseId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {

                            this.closest("li").remove();

                            let totalPriceElement = document.getElementById("total-price");
                            if (totalPriceElement) {
                                totalPriceElement.innerText = "Rp " + new Intl.NumberFormat(
                                    'id-ID', {
                                        minimumFractionDigits: 2
                                    }).format(data.totalPrice);
                            }
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });
        });
    });
</script>
