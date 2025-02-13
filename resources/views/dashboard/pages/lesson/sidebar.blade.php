<!-- Sidebar -->
<div
    class="top-0 sticky flex items-start left-0 transform -translate-x-full transition-transform duration-300 z-40 sidebar">

    <div id="sidebarModul" class="sidebar-modul w-full sticky h-full top-0 left-0 bg-white z-40">


        <h3 class="p-5 border-b dark:text-headingColor-dark text-xl font-bold">Daftar Modul</h3>
        <ul class="accordion-container curriculum">
            @foreach ($bab as $index => $bab)
                <li class="accordion mb-25px overflow-hidden">
                    <div class="bg-whiteColor border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                        <div>
                            <button
                                class="accordion-controller flex justify-between items-center text-md text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                <span>{{ $bab->name }}</span>
                                <svg class="transition-all duration-500 rotate-0" width="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="accordion-content transition-all duration-500 h-0">
                            <div class="content-wrapper p-10px md:px-30px">
                                {{-- <ul>
                                    @foreach ($bab->moduls as $index => $modul)
                                        @php
                                            $modulProgress = $modul
                                                ->modul_progress()
                                                ->where('course_registrations_id', $courseRegistration->id)
                                                ->first();

                                            // Default: ikon kunci abu-abu (belum ada progress)
                                            $icon = '<i class="icofont-lock text-gray-500"></i>';

                                            if ($modulProgress) {
                                                if ($modulProgress->status == 'selesai') {
                                                    // Ceklis hijau dengan border
                                                    $icon = '<span class="text-green-500" style="color: green">
                                                                    <i class="icofont-check-circled"></i>
                                                                </span>';
                                                } elseif ($modulProgress->status == 'proses') {
                                                    // Timer kuning dengan border
                                                    $icon = ' <span class="text-yellow-500" style="color: yellow">
                                                                    <i class="icofont-clock-time"></i>
                                                                </span>';
                                                }
                                            }
                                        @endphp

                                        <li
                                            class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                            <div class="flex items-center">
                                                
                                                <h4
                                                    class="ml-2 text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                    <i class="icofont-video-alt mr-10px"></i>
                                                    <a href="#" data-id="{{ $modul->id }}"
                                                        data-slug="{{ $modul->slug }}"
                                                        class="modul-link font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                        {{ $modul->name }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div
                                                class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                <p class="font-semibold">{{ $modul->duration }}</p>
                                            </div>

                                            {!! $icon !!} <!-- Menampilkan ikon dengan border -->
                                        </li>
                                    @endforeach
                                    @foreach ($bab->quiz as $index => $modul)
                                        @php
                                            $modulProgress = $modul
                                                ->modul_progress()
                                                ->where('course_registrations_id', $courseRegistration->id)
                                                ->first();

                                            // Default: ikon kunci abu-abu (belum ada progress)
                                            $icon = '<i class="icofont-lock text-gray-500"></i>';

                                            if ($modulProgress) {
                                                if ($modulProgress->status == 'selesai') {
                                                    // Ceklis hijau dengan border
                                                    $icon = '<span class="text-green-500" style="color: green">
                                                                    <i class="icofont-check-circled"></i>
                                                                </span>';
                                                } elseif ($modulProgress->status == 'proses') {
                                                    // Timer kuning dengan border
                                                    $icon = ' <span class="text-yellow-500" style="color: yellow">
                                                                    <i class="icofont-clock-time"></i>
                                                                </span>';
                                                }
                                            }
                                        @endphp

                                        <li
                                            class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                            <div class="flex items-center">
                                                
                                                <h4
                                                    class="ml-2 text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                    <i class="icofont-video-alt mr-10px"></i>
                                                    <a href="#" data-id="{{ $modul->id }}"
                                                        data-slug="{{ $modul->slug }}"
                                                        class="modul-link font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                        {{ $modul->name }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div
                                                class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                <p class="font-semibold">{{ $modul->duration }}</p>
                                            </div>

                                            {!! $icon !!} <!-- Menampilkan ikon dengan border -->
                                        </li>
                                    @endforeach

                                </ul> --}}

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Tombol Hamburger -->
    <button id="hamburgerButton"
        class="hamburger  pr-2 pl-5 top-5 z-50 bg-gray-100 rounded-2-lg2 shadow-lg dark:bg-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </button>
</div>

<!-- CSS -->
<style>
    /* Lingkaran progres */
    .progress-circle {
        position: relative;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid #ccc;
        /* Warna border lingkaran */
        margin-right: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    /* Lingkaran progress bar */
    .progress-bar {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: conic-gradient(#4caf50 0%, #4caf50 0%, #ccc 0%);
        /* Warna progres */
        transform: rotate(-90deg);
        /* Agar progres dimulai dari atas */
    }

    /* Ceklis di tengah lingkaran */
    .check-icon {
        position: absolute;
        display: none;
        font-size: 12px;
        color: #fff;
    }

    .check-icon svg {
        width: 14px;
        height: 14px;
    }

    /* Untuk mengubah warna progress jika selesai */
    .completed .progress-bar {
        background: conic-gradient(#4caf50 0%, #4caf50 100%, #ccc 100%);
    }

    .completed .check-icon {
        display: block;
    }


    .sidebar-modul {
        overflow-y: scroll;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        transform: translateX(-100%);
        /* Default tertutup */
        transition: transform 0.3s ease;
        /* Animasi */
    }

    .sidebar-modul {
        transform: translateX(0);
        /* Default tertutup */
        transition: transform 0.3s ease;
    }

    .sidebar-modul.open {
        transform: translateX(-100%);
        /* Tampilkan sidebar */
    }

    .sidebar {
        width: 350px;
        transition: width 0.3s ease;
        /* Tambahkan transisi */

    }

    .sidebar.closed {
        width: 0;
        /* Lebar menjadi 0 saat ditutup */
    }

    @media (max-width: 768px) {}

    .hamburger {
        z-index: 10000 !important;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }

    .humb-close {
        margin-top: 100px;
        background-color: #5f2ded;
        color: white;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        z-index: 999999 !important;
        position: fixed;
    }
</style>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const sidebarModul = document.getElementById('sidebarModul');
        const hamburgerButton = document.getElementById('hamburgerButton');

        hamburgerButton.addEventListener('click', () => {
            sidebarModul.classList.toggle('open');
            sidebar.classList.toggle('closed');
            hamburgerButton.classList.toggle('humb-close');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modulContainer = document.getElementById('modul'); // Kontainer modul
        const progressCircles = document.querySelectorAll('.progress-circle'); // Semua lingkaran progres

        if (modulContainer) {
            modulContainer.addEventListener('scroll', function() {
                const contentHeight = modulContainer.scrollHeight; // Tinggi penuh dari konten
                const scrollTop = modulContainer.scrollTop; // Posisi scroll saat ini
                const clientHeight = modulContainer.clientHeight; // Tinggi yang terlihat

                // Hitung progres scroll dalam modul
                const scrollProgress = (scrollTop / (contentHeight - clientHeight)) * 100;

                // Update setiap lingkaran progres
                progressCircles.forEach((circle, index) => {
                    const progressBar = circle.querySelector('.progress-bar');
                    const checkIcon = circle.querySelector('.check-icon');

                    // Update progress bar sesuai dengan scroll
                    const progress = Math.min(scrollProgress * (index + 1) / progressCircles
                        .length, 100);
                    progressBar.style.background =
                        `conic-gradient(#4caf50 ${progress}%, #ccc ${progress}%)`;

                    // Tampilkan ceklis jika progres sudah penuh
                    if (progress === 100) {
                        circle.classList.add('completed');
                    } else {
                        circle.classList.remove('completed');
                    }
                });
            });
        }
    });
</script>
