{{-- @extends('dashboard.pages.lesson.layout-course') --}}
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
    <div class="show-modul dark:bg-whiteColor-dark dark:border-borderColor-dark dark:text-headingColor-dark  h-full ">
        <div class="flex h-full gap-30px">

                        
            @include('dashboard.pages.lesson.sidebar')
            
            
            <!-- Konten Modul -->
            <div class="pt-5 flex-1 overflow-auto" style="min-height: 80vh" data-aos="fade-up" id="modul-content">
                <!-- Tampilkan Konten Modul -->
                <div class="content" id="content">
                    <div class="modul-content">
                        
                        @yield('modul')
                

                    <!-- Navigasi Modul -->
                    <div class="modul-navigation fixed bottom-0 left-0 w-full bg-white dark:bg-blackColor-dark border-t border-gray-300 dark:border-borderColor-dark z-50">
                        <div class="flex justify-between items-center px-5 py-3">
                            @if($previousModul)
                                <a href="/course/{{ $course->slug }}/modul/{{ $previousModul->slug }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    <i class="icofont-arrow-left mr-2"></i> Modul Sebelumnya
                                </a>
                            @else
                                <span class="text-gray-500 dark:text-gray-400 font-bold">
                                    <i class="icofont-arrow-left mr-2"></i> Modul Sebelumnya
                                </span>
                            @endif

                            @if($nextModul)
                        <a href="/course/{{ $course->slug }}/modul/{{ $nextModul->slug }}" id="nextModulLink" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                            Modul Berikutnya <i class="icofont-arrow-right ml-2"></i>
                        </a>
                    @elseif($isLastModul)
                    <a href="/certificate/{{ $course->id }}" id="nextModulLink" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                        Selesaikan Course <i class="icofont-check ml-2"></i>
                    </a>
                    @else
                        <span class="text-gray-500 dark:text-gray-400 font-bold">
                            Modul Berikutnya <i class="icofont-arrow-right ml-2"></i>
                        </span>
                    @endif

                        </div>
                    </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .show-modul {
        height: calc(100vh - 90px); /* Sesuaikan dengan tinggi header dan navigasi */
        overflow-y: auto;
    }

    .modul-navigation {
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
}



.modul-navigation a {
    transition: color 0.2s ease-in-out;
}


</style>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const nextModulLink = document.querySelector('#nextModulLink');
    const contentContainer = document.getElementById('modul-content'); // Pastikan ID ini adalah elemen konten

    // Cek status modul (misalnya, berdasarkan kelas atau data atribut)
    const isModulCompleted = nextModulLink.getAttribute('data-status') === 'selesai'; // Ganti dengan logika yang sesuai dengan status modul

    // Fungsi untuk memeriksa posisi scroll
    function checkScrollPosition() {
        const containerBottom = contentContainer.offsetTop + contentContainer.offsetHeight;
        const scrollPosition = window.scrollY + window.innerHeight;

        if (scrollPosition >= containerBottom || isModulCompleted) {
            nextModulLink.classList.remove('disabled'); // Aktifkan tombol
        } else {
            nextModulLink.classList.add('disabled'); // Nonaktifkan tombol
        }
    }

    // Pasang event listener pada scroll
    window.addEventListener('scroll', checkScrollPosition);

    // Cek posisi saat halaman dimuat
    checkScrollPosition();

    // Mencegah klik pada tombol "Modul Berikutnya" jika belum scroll ke bawah dan status modul belum selesai
    nextModulLink.addEventListener('click', function (e) {
        if (nextModulLink.classList.contains('disabled') && !isModulCompleted) {
            e.preventDefault(); // Blokir aksi default
            alert('Scroll ke bawah terlebih dahulu untuk melanjutkan modul!');
        } else if (nextModulLink.href.includes('/certificate')) {
            // Arahkan langsung ke halaman sertifikat jika modul terakhir
            window.location.href = nextModulLink.href;
        } else {
            // Kirim request untuk memperbarui status modul
            fetch('/update-modul-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    modulId: '{{ $modul->id }}'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = nextModulLink.href;
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                }
            })
            .catch(error => {
                alert('Tidak dapat memperbarui status modul.');
            });
        }
    });
});




</script>
@endsection
