@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Lesson Courses')

@section('content')
<header class="bg-white px-5 border-b py-5">
    <div class="mx-auto flex items-center">
        <a href="{{route('course.detail'), $course->slug}}">
        <button  class="text-lg font-bold">
            <i class="icofont-arrow-left mr-2"></i> 
        </button>
        <h1 class="text-xl font-bold">{{ $course->name }}</h1>
    </a>
    </div>
</header>

<section>
    <div class="show-modul bg-white pb-100px">
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
            @include('dashboard.pages.lesson.sidebar')
    
            <!-- Konten Modul -->
            <div class="xl:col-start-2 pt-5 xl:col-span-9 relative" data-aos="fade-up" id="modul-content">
                <!-- Tampilkan Konten Modul -->
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
