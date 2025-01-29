<section>
    <div class="">
        <!-- navigation menu -->
        <div
            class="p-30px pt-5 lg:p-5 2xl:p-30px 2xl:pt-5 rounded-lg2 shadow-accordion dark:shadow-accordion-dark bg-whiteColor dark:bg-whiteColor-dark">
            <!-- greeting -->
            <h5
                class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                Halo, {{ strtoupper(Auth::user()->name) }}
            </h5>

            <ul>
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.myProfile') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.myProfile') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Profil Saya
                    </a>
                </li>
                <li
                    class="py-10px border-b border-borderColor dark:border-borderColor-dark flex justify-between items-center">
                    <a href="{{ route('dashboard.message') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.message') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-book-open">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        Pesan
                    </a>
                    <span
                        class="text-size-10 font-medium text-whiteColor px-9px bg-primaryColor leading-14px rounded-2xl">12</span>
                </li>
                {{-- <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleSubmenu(this)">
                        <a
                            class="sidebar-link text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>


                            Kursus
                        </a>
                        <i
                            class="icofont-simple-down arrow-icon-side ml-auto transition-transform duration-300 transform rotate-0 leading-14px text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor"></i>
                    </div>
                    <!-- Submenu Kategori -->
                    <ul id="submenu-kategori"
                        class="pl-26px py-2 {{ request()->routeIs('dashboard.courses') || request()->routeIs('kategori-kursus.index') || request()->routeIs('courses.index') ? '' : 'hidden' }}">
                        <li>
                            <a href="{{ route('courses.index') }}"
                                class="sidebar-link {{ request()->routeIs('courses.index') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                                -
                                Daftar Kursus
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kategori-kursus.index') }}"
                                class="sidebar-link {{ request()->routeIs('kategori-kursus.index') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 mt-2 flex gap-3 text-nowrap">
                                -
                                Kategori Kursus
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.wishlist') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.wishlist') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bookmark">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Daftar Keinginan
                    </a>
                </li>
                {{-- <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.reviews') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.reviews') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-star">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        Ulasan
                    </a>
                </li> --}}
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('quizResults.index') }}"
                        class="sidebar-link {{ request()->routeIs('quizResults.index', 'quiz.index', 'quiz.create', 'quiz.edit', 'quiz.show', 'questions.create', 'questions.edit') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-help-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        Kuis Terkirim
                    </a>
                </li>
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.orderHistory') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.orderHistory') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        Riwayat Pesanan
                    </a>
                </li>
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.enrolledCourses') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.enrolledCourses') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bookmark">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Kursus Terdaftar
                    </a>
                </li>
                {{-- <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.assignments') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.assignments') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-volume-1">
                            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        </svg>
                        Tugas
                    </a>
                </li> --}}
            </ul>

            <!-- instructor -->
            {{-- <h5
                class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                PENGAJAR
            </h5> --}}
            <ul>
                {{-- <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('course.instruktur') }}"
                        class="sidebar-link {{ request()->routeIs('course.instruktur') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-monitor">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                        Kursus saya
                    </a>
                </li> --}}
                {{-- <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.announcements') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.announcements') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-volume-1">
                            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        </svg>
                        Pengumuman
                    </a>
                </li> --}}
                {{-- <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('dashboard.assignments') }}"
                        class="sidebar-link {{ request()->routeIs('dashboard.assignments') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-volume-1">
                            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        </svg>
                        Tugas</a>
                </li> --}}
            </ul>
            <!-- user -->
            <h5
                class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                USER
            </h5>
            <ul>
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="{{ route('settings.index') }}"
                        class="sidebar-link {{ request()->routeIs('settings.index') ? 'text-primaryColor' : 'text-contentColor dark:text-contentColor-dark' }} hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>
                        Pengaturan</a>
                </li>
                <li class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"
                        id="logout-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        Keluar
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>

    <script>
        document.getElementById('logout-link').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>

    <script>
        function toggleSubmenu(element) {
            const submenu = element.nextElementSibling; // Mendapatkan elemen <ul> submenu yang berada setelah <div>
            const icon = element.querySelector('.arrow-icon-side'); // Mendapatkan icon panah

            if (submenu) {
                submenu.classList.toggle('hidden'); // Menyembunyikan/menampilkan submenu
                icon.classList.toggle('rotate-180'); // Mengubah rotasi icon untuk animasi
            }
        }
    </script>
</section>
