@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Lesson Courses')

@section('content')
<header class="bg-white dark:bg-whiteColor-dark dark:border-borderColor-dark px-5 border-b py-5" style="background-color: var(--blueLight1);">
    <div class=" flex items-center">
        <a href="{{route('course.detail', $course->slug)}}">
            <div class="flex dark:text-headingColor-dark">
                <button  class="text-lg font-bold">
                    <i class="icofont-arrow-left mr-2"></i> 
                </button>
                <h1 class="text-xl font-bold">{{ $course->name }}</h1>
            </div>
        </a>
    </div>
</header>

<section>
    <div class="show-modul dark:bg-whiteColor-dark dark:border-borderColor-dark dark:text-headingColor-dark h-full">
        <div class="flex h-full gap-30px">
            @include('dashboard.pages.lesson-admin.sidebar')
            
            <!-- Konten Modul -->
            <div class="pt-5 flex-1 overflow-auto" style="min-height: 80vh" data-aos="fade-up" id="modul-content">
                <!-- Tampilkan Konten Modul -->
                <div class="content" id="content">
                    <div class="modul-content">
                        @yield('modul')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Navigasi Modul -->
<div class="modul-navigation fixed bottom-0 left-0 w-full bg-white dark:bg-blackColor-dark border-t border-gray-300 dark:border-borderColor-dark z-50">
    <div class="flex justify-between items-center px-5 py-3">
        @if($previousModul)
            <a href="/courses/{{ $course->slug }}/moduls/{{ $previousModul->slug }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                <i class="icofont-arrow-left mr-2"></i> Modul Sebelumnya
            </a>
        @else
            <span class="text-gray-500 dark:text-gray-400 font-bold">
                <i class="icofont-arrow-left mr-2"></i> Modul Sebelumnya
            </span>
        @endif

        @if($nextModul)
            <a href="/courses/{{ $course->slug }}/moduls/{{ $nextModul->slug }}" id="nextModulLink" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                Modul Berikutnya <i class="icofont-arrow-right ml-2"></i>
            </a>
        @else
            <span class="text-gray-500 dark:text-gray-400 font-bold">
                Modul Berikutnya <i class="icofont-arrow-right ml-2"></i>
            </span>
        @endif
    </div>
</div>

<style>
    /* Mengatur navigasi modul agar tetap di bawah */
    .modul-navigation {
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    .modul-navigation a {
        transition: color 0.2s ease-in-out;
    }

    /* Menghindari scroll pada konten modul */
    .show-modul {
        height: calc(100vh - 90px); /* Sesuaikan dengan tinggi header dan navigasi */
        overflow-y: auto;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const previousModulLink = document.querySelector('.modul-navigation .text-blue-500[href^="/courses/{{ $course->slug }}/moduls"]');
        const nextModulLink = document.querySelector('#nextModulLink');

        // Event Listener untuk Klik Modul Sebelumnya
        if (previousModulLink) {
            previousModulLink.addEventListener('click', function (e) {
                e.preventDefault();
                const previousModulUrl = previousModulLink.getAttribute('href');
                window.location.href = previousModulUrl; // Arahkan ke modul sebelumnya
            });
        }

        // Event Listener untuk Klik Modul Berikutnya
        if (nextModulLink) {
            nextModulLink.addEventListener('click', function (e) {
                e.preventDefault();
                const nextModulUrl = nextModulLink.getAttribute('href');
                window.location.href = nextModulUrl; // Arahkan ke modul berikutnya
            });
        }
    });
</script>
@endsection
