@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Lesson Courses')

@section('content')
<!-- Lesson Section -->
@include('landing.components.breadcrumb')
<section>
    <div class="container-fluid-2 pt-50px pb-100px">
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
            <!-- Sidebar: Daftar Modul -->
            <div class="xl:col-start-1 xl:col-span-4" data-aos="fade-up">
                <ul class="accordion-container curriculum">
                    @foreach($bab as $index => $bab)
                        <li class="accordion mb-25px overflow-hidden {{ $index == 0 ? 'active' : '' }}">
                            <div class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                <!-- Judul Modul -->
                                <div>
                                    <button class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <span>{{ $bab->name }} - Lesson #{{ $index + 1 }}</span>
                                        <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Daftar Sub-Modul -->
                                <div class="accordion-content transition-all duration-500 h-0">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            @foreach($bab->moduls as $modul)
                                                <li class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4 class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a href="#" data-id="{{ $modul->id }}" data-slug="{{ $modul->slug }}" class="modul-link font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                {{ $modul->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">{{ $modul->duration }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Konten Modul -->
            <div class="xl:col-start-5 xl:col-span-8 relative" data-aos="fade-up" id="modul-content">
                <!-- Konten Modul akan dimuat dengan AJAX -->
            </div>
        </div>
    </div>
</section>

<!-- AJAX Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modulLinks = document.querySelectorAll('.modul-link');
        const contentContainer = document.getElementById('modul-content');
        const progressBar = document.getElementById('progress-bar'); // Pastikan ada elemen ini
        let lastProgress = 0; // Untuk menghindari update berulang yang tidak perlu
    
        // Fungsi untuk Memuat Modul
        function loadModul(slug) {
            fetch(`/modul/${slug}`)
                .then(response => response.text())
                .then(data => {
                    contentContainer.innerHTML = data;
    
                    // Tambahkan event listener scroll setelah modul dimuat
                    addScrollListener(slug);
                })
                .catch(error => console.error('Error:', error));
        }
    
        // Fungsi untuk Mengirim Progress ke Server
        function updateProgress(modulId, progressPercentage) {
            // Pastikan tidak mengirimkan progres yang sama berturut-turut
            if (Math.abs(progressPercentage - lastProgress) >= 5) {
                fetch(`/modul/${modulId}/progresss`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ progress: progressPercentage })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Progress updated to:', progressPercentage + '%');
                    lastProgress = progressPercentage; // Update last progress yang terkirim
                })
                .catch(error => console.error('Error:', error));
            }
        }
    
        // Fungsi untuk Menambahkan Listener Scroll
        function addScrollListener(modulId) {
            contentContainer.addEventListener('scroll', function () {
                const scrollTop = contentContainer.scrollTop;
                const scrollHeight = contentContainer.scrollHeight - contentContainer.clientHeight;
    
                // Jika scrollHeight <= clientHeight (artinya konten cukup kecil), tidak perlu menghitung
                if (scrollHeight <= 0) return;
    
                // Hitung persentase scroll
                const progressPercentage = Math.min(100, Math.max(0, (scrollTop / scrollHeight) * 100));
    
                // Perbarui progress bar secara visual
                if (progressBar) {
                    progressBar.style.width = `${progressPercentage}%`;
                }
    
                // Kirim progres ke server jika progres berubah signifikan
                if (Math.abs(progressPercentage - lastProgress) >= 5) {
                    updateProgress(modulId, Math.round(progressPercentage));
                }
            });
        }
    
        // Event Listener untuk Klik Modul
        modulLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const modulId = this.getAttribute('data-id');
                const slug = this.getAttribute('data-slug');
                loadModul(slug); // Memuat konten modul
            });
        });
    
        // Muat modul pertama secara otomatis
        if (modulLinks.length > 0) {
            const firstModulSlug = modulLinks[0].getAttribute('data-slug');
            loadModul(firstModulSlug);
        }
    });
    </script>
    
@endsection
