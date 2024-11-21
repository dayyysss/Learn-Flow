@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Lesson Courses')

@section('content')
<!-- lesson section -->
@include('landing.components.breadcrumb')
    <section>
        <div class="container-fluid-2 pt-50px pb-100px">
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
                <!-- lesson left -->
                <div class="xl:col-start-1 xl:col-span-4" data-aos="fade-up">
                    <!-- curriculum -->
                    <ul class="accordion-container curriculum">
                        <!-- accordion -->
                        @foreach($bab as $index => $bab)
                            <li class="accordion mb-25px overflow-hidden {{ $index == 0 ? 'active' : '' }}">
                                <div class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                    <!-- controller -->
                                    <div>
                                        <button class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                            <span>{{ $bab->name }} - Lesson #{{ $index + 1 }}</span>
                    
                                            <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- content -->
                                    <div class="accordion-content transition-all duration-500 h-0">
                                        <div class="content-wrapper p-10px md:px-30px">
                                            <ul>
                                                @foreach($bab->moduls as $modul)
                                                    <li class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                        <div>
                                                            <h4 class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                                <i class="icofont-video-alt mr-10px"></i>
                                                                <a href="#" data-slug="{{ $modul->slug }}" class="modul-link font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                    {{ $modul->name }} <!-- Menampilkan nama modul -->
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
                
                <!-- lesson right -->
                <div
                class="xl:col-start-5 xl:col-span-8 relative"
                data-aos="fade-up" id="modul-content"
              >
               
              </div>
            </div>
          </div>
    </section>

    <!-- Script for AJAX -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const modulLinks = document.querySelectorAll('.modul-link');
    const contentContainer = document.getElementById('modul-content');

    // Fungsi untuk memuat modul berdasarkan slug
    function loadModul(slug) {
        fetch(`/modul/${slug}`)
            .then(response => response.text())
            .then(data => {
                // Tampilkan konten modul di kontainer
                contentContainer.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }

    // Event listener untuk setiap modul
    modulLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const slug = this.getAttribute('data-slug');
            loadModul(slug);
        });
    });

    // Muat modul pertama saat halaman dimuat jika ada modul yang tersedia
    if (modulLinks.length > 0) {
        const firstModulSlug = modulLinks[0].getAttribute('data-slug');
        loadModul(firstModulSlug);
    }

    // Menangani klik pada tombol Previous dan Next
    document.querySelectorAll('.modul-nav').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const slug = this.getAttribute('data-slug');
            loadModul(slug);
        });
    });
});


    </script>
@endsection
