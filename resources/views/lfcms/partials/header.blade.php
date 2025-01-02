<header
    class="header px-4 sm:px-6 h-[calc(theme('spacing.header')_-_10px)] sm:h-header bg-white dark:bg-dark-card rounded-none xl:rounded-15 flex items-center mb-4 xl:m-4 group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_32px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_32px)] group-data-[sidebar-size=sm]:group-data-[theme-width=box]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[theme-width=box]:xl:mr-0 dk-theme-card-square z-10 ac-transition">
    <div class="flex-center-between grow">
        <!-- Header Left -->
        <div class="flex items-center gap-4">
            <div class="menu-hamburger-container flex-center">
                <button type="button" id="app-menu-hamburger" class="menu-hamburger hidden xl:block"></button>
                <button type="button" class="menu-hamburger block xl:hidden" data-drawer-target="app-menu-drawer"
                    data-drawer-show="app-menu-drawer" aria-controls="app-menu-drawer"></button>
            </div>
            <div class="w-56 md:w-72 leading-none text-sm relative text-gray-900 dark:text-dark-text hidden sm:block">
                <span class="absolute top-1/2 -translate-y-[40%] left-3.5">
                    <i class="ri-search-line text-gray-900 dark:text-dark-text text-[14px]"></i>
                </span>
                <input type="text" name="header-search" placeholder="Search..."
                    class="bg-transparent pl-[36px] pr-12 py-4 dk-border-one rounded-full w-full font-spline_sans focus:outline-none focus:border-primary-500 dk-theme-card-square dk-theme-card-square">
                <span
                    class="absolute top-1/2 -translate-y-[40%] right-4 hidden lg:flex lg:items-center lg:gap-0.5 select-none">
                    <i class="ri-command-line text-[12px]"></i><span>+</span><span>k</span>
                </span>
            </div>
        </div>
        <!-- Header Right -->
        <div class="flex items-center gap-1 sm:gap-3">
            <!-- Dark Light Button -->
            <button type="button"
                class="themeMode size-8 flex-center hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"
                onclick="toggleThemeMode()">
                <i class="ri-contrast-2-line text-[22px] dark:text-dark-text-two dark:before:!content-['\f1bf']"></i>
            </button>
            <!-- Settings Button -->
            <button type="button" class="size-8 flex-center hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"
                data-drawer-target="app-setting-drawer" data-drawer-show="app-setting-drawer"
                data-drawer-placement="right" aria-controls="app-setting-drawer">
                <i class="ri-settings-3-line text-[22px] dark:text-dark-text-two animate-spin-slow"></i>
            </button>
            <!-- Notification Button -->
            <div class="relative">
                <button type="button" data-popover-target="dropdownNotification" data-popover-trigger="click"
                    data-popover-placement="bottom-end"
                    class="relative size-8 flex-center hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
                    <i class="ri-notification-3-line text-[22px] dark:text-dark-text-two"></i>
                    <span
                        class="absolute -top-1 -right-1 size-4 rounded-50 flex-center bg-primary-500 leading-none text-xs text-white">0</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNotification"
                    class="!-right-full sm:!right-0 z-backdrop invisible w-[250px] sm:w-[320px] bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-dark-card-two dark:divide-dark-border-four">
                    <div
                        class="block px-4 py-2 font-medium text-center text-heading rounded-t-lg bg-gray-50 dark:bg-dark-card-shade dark:text-white">
                        Notifications
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-dark-border-four">
                        <a href="notification.html" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-dark-icon">
                            <div class="flex-shrink-0">
                                <img class="size-10 rounded-50"
                                    src= "{{ asset('assets/lfcms/images/user/user-1.png') }}" alt="user">
                            </div>
                            <div class="w-full ps-3">
                                <div class="text-gray-500 dark:text-gray-400 text-sm mb-1.5">New message from <span
                                        class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey,
                                    what's up? All set for the presentation?"</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                            </div>
                        </a>
                        <a href="notification.html" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-dark-icon">
                            <div class="flex-shrink-0">
                                <img class="size-10 rounded-50" src="{{ asset('assets/lfcms/images/user/user-2.png') }}"
                                    alt="user">
                            </div>
                            <div class="w-full ps-3">
                                <div class="text-gray-500 dark:text-gray-400 text-sm mb-1.5">New message from <span
                                        class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey,
                                    what's up? All set for the presentation?"</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">10 min ago</div>
                            </div>
                        </a>
                    </div>
                    <a href="notification.html"
                        class="flex-center py-2 text-sm font-medium text-center text-heading rounded-b-lg bg-gray-50 dark:bg-dark-card-shade dark:text-white">
                        View all
                    </a>
                </div>
            </div>
            <!-- Language Select Button -->
            <div class="relative">
                <button type="button" data-popover-target="dropdownLanguage" data-popover-trigger="click"
                    data-popover-placement="bottom-end"
                    class="size-8 flex-center hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
                    <img id="header-lang-img" src=" {{ asset('assets/lfcms/images/flag/us.svg') }}" alt="flag"
                        class="size-5 rounded-sm" title="English">
                </button>
                <!-- Dropdown -->
                <div id="dropdownLanguage"
                    class="absolute invisible z-backdrop py-2 bg-white rounded-md shadow-md min-w-[10rem] flex flex-col dark:bg-dark-card-shade">
                    <a href="#"
                        class="flex items-center gap-3 hover:bg-gray-200 px-4 py-2 dark:hover:bg-dark-icon relative after:absolute after:inset-0 after:size-full"
                        data-lang="en" title="English">
                        <img src="{{ asset('assets/lfcms/images/flag/us.svg') }}" alt="flag"
                            class="object-cover size-4 rounded-50">
                        <h6 class="font-medium text-gray-500 dark:text-white">English</h6>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 hover:bg-gray-200 px-4 py-2 dark:hover:bg-dark-icon relative after:absolute after:inset-0 after:size-full"
                        data-lang="sp" title="Spanish">
                        <img src="{{ asset('assets/lfcms/images/flag/es.svg') }}" alt="flag"
                            class="object-cover size-4 rounded-50">
                        <h6 class="font-medium text-gray-500 dark:text-white">Spanish</h6>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 hover:bg-gray-200 px-4 py-2 dark:hover:bg-dark-icon relative after:absolute after:inset-0 after:size-full"
                        data-lang="fr" title="French">
                        <img src="{{ asset('assets/lfcms/images/flag/fr.svg') }}" alt="flag"
                            class="object-cover size-4 rounded-50">
                        <h6 class="font-medium text-gray-500 dark:text-white">French</h6>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 hover:bg-gray-200 px-4 py-2 dark:hover:bg-dark-icon relative after:absolute after:inset-0 after:size-full"
                        data-lang="it" title="Italian">
                        <img src="{{ asset('assets/lfcms/images/flag/it.svg') }}" alt="flag"
                            class="object-cover size-4 rounded-50">
                        <h6 class="font-medium text-gray-500 dark:text-white">Italian</h6>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 hover:bg-gray-200 px-4 py-2 dark:hover:bg-dark-icon relative after:absolute after:inset-0 after:size-full"
                        data-lang="ar" title="Arabic">
                        <img src="{{ asset('assets/lfcms/images/flag/ar.svg') }}" alt="flag"
                            class="object-cover size-4 rounded-50">
                        <h6 class="font-medium text-gray-500 dark:text-white">Arabic</h6>
                    </a>
                </div>
            </div>
            <!-- Border -->
            <div
                class="w-[1px] h-[calc(theme('spacing.header')_-_10px)] sm:h-header bg-[#EEE] dark:bg-dark-border hidden sm:block">
            </div>
            <!-- User Profile Button -->
            <div class="relative">
                <button type="button" data-popover-target="dropdownProfile" data-popover-trigger="click"
                    data-popover-placement="bottom-end"
                    class="text-gray-500 dark:text-dark-text flex items-center gap-2 sm:pr-4 relative after:absolute after:right-0 after:font-remix after:content-['\ea4e'] after:text-[18px] after:hidden sm:after:block">
                    <img src="{{ asset('assets/lfcms/images/user/profile-img.png') }}" alt="user-img"
                        class="size-7 sm:size-9 rounded-50 dk-theme-card-square">
                    <span
                        class="font-semibold leading-none text-lg capitalize hidden sm:block">{{ $user->first_name }}</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownProfile"
                    class="invisible z-backdrop bg-white text-left divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-dark-card-shade dark:divide-dark-border-four">
                    <div class="px-4 py-3 text-sm text-gray-500 dark:text-white">
                        <div class="font-medium "> {{ $user->publik_name ?? $user->name }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="{{ route('dashboard.index') }}"
                                class="flex font-medium px-4 py-2 hover:bg-gray-200 dark:hover:bg-dark-icon dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('pengaturanCMS') }}"
                                class="flex font-medium px-4 py-2 hover:bg-gray-200 dark:hover:bg-dark-icon dark:hover:text-white">Pengaturan</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                                    @csrf
                                    <button type="submit"
                                        class="flex font-medium px-4 py-2 hover:bg-gray-200 dark:hover:bg-dark-icon dark:text-gray-200 dark:hover:text-white w-full text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            class="mr-2">
                                            <path
                                                d="M6.66645 15.3328C6.66645 15.5096 6.59621 15.6792 6.47119 15.8042C6.34617 15.9292 6.17661 15.9995 5.9998 15.9995H1.33329C0.979679 15.9995 0.640552 15.859 0.390511 15.609C0.140471 15.3589 0 15.0198 0 14.6662V1.33329C0 0.979679 0.140471 0.640552 0.390511 0.390511C0.640552 0.140471 0.979679 0 1.33329 0H5.9998C6.17661 0 6.34617 0.0702357 6.47119 0.195256C6.59621 0.320276 6.66645 0.48984 6.66645 0.666645C6.66645 0.84345 6.59621 1.01301 6.47119 1.13803C6.34617 1.26305 6.17661 1.33329 5.9998 1.33329H1.33329V14.6662H5.9998C6.17661 14.6662 6.34617 14.7364 6.47119 14.8614C6.59621 14.9865 6.66645 15.156 6.66645 15.3328ZM15.8045 8.47139L12.4713 11.8046C12.378 11.898 12.2592 11.9615 12.1298 11.9873C12.0004 12.0131 11.8663 11.9999 11.7444 11.9494C11.6225 11.8989 11.5184 11.8133 11.4451 11.7036C11.3719 11.5939 11.3329 11.4649 11.333 11.333V8.66638H5.9998C5.823 8.66638 5.65343 8.59615 5.52841 8.47113C5.40339 8.34611 5.33316 8.17654 5.33316 7.99974C5.33316 7.82293 5.40339 7.65337 5.52841 7.52835C5.65343 7.40333 5.823 7.33309 5.9998 7.33309H11.333V4.66651C11.3329 4.53459 11.3719 4.4056 11.4451 4.29587C11.5184 4.18615 11.6225 4.10062 11.7444 4.05012C11.8663 3.99962 12.0004 3.98642 12.1298 4.01218C12.2592 4.03795 12.378 4.10152 12.4713 4.19486L15.8045 7.52809C15.8665 7.59 15.9156 7.66352 15.9492 7.74445C15.9827 7.82538 16 7.91213 16 7.99974C16 8.08735 15.9827 8.17409 15.9492 8.25502C15.9156 8.33595 15.8665 8.40948 15.8045 8.47139ZM14.3879 7.99974L12.6663 6.27563V9.72385L14.3879 7.99974Z"
                                                fill="currentColor" />
                                        </svg>
                                        Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</header>
