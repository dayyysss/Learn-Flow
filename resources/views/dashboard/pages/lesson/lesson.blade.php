@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Lesson Courses')

@section('content')
<header class="bg-white dark:bg-whiteColor-dark dark:border-borderColor-dark px-5 border-b py-5" style="background-color: var(--blueLight1);">
    <div class=" flex  items-center">
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
    <div class="show-modul bg-blackColor2 dark:bg-whiteColor-dark dark:border-borderColor-dark dark:text-headingColor-dark bg-white h-full ">
        <div class="flex h-full gap-30px">
            @include('dashboard.pages.lesson.sidebar')
            
            
            <!-- Konten Modul -->
            <div class="pt-5 relative" data-aos="fade-up" id="modul-content">
                <!-- Tampilkan Konten Modul -->
                <div class="content" id="content">
                    <div class="modul-content">
                        
                        @yield('modul')
                

                    <!-- Navigasi Modul -->
                    <div class="modul-navigation">
                        @if($previousModul)
                            <a href="/course/{{ $course->slug }}/modul/{{ $previousModul->slug }}">Modul Sebelumnya</a>
                        @endif
                        @if($nextModul)
                            <a href="/course/{{ $course->slug }}/modul/{{ $nextModul->slug }}">Modul Berikutnya</a>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.modul-link, .quiz-link');

        // Event Listener untuk Klik Modul atau Quiz
        links.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');
                const isQuiz = this.classList.contains('quiz-link');

                // Tentukan URL pengalihan berdasarkan jenis item
                const baseUrl = `/course/{{ $course->slug }}`;
                const redirectUrl = isQuiz ? `${baseUrl}/quiz/${slug}` : `${baseUrl}/modul/${slug}`;
                
                // Arahkan ke URL tujuan
                window.location.href = redirectUrl;
            });
        });
    });
</script>

@endsection
