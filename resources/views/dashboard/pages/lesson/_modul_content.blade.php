@extends('dashboard.pages.lesson.lesson')

@section('modul')
<div>
    <div class="content mb-3">
        <h5 class="font-bold capitalize text-xl">{{ $modul->name }}</h5>
    </div>

    <div class="top-0 left-0 w-full flex justify-between items-center px-5 py-10px bg-primaryColor leading-1.2 text-whiteColor">
        <h3 class="sm:text-size-22 font-bold">
            Video - {{ $modul->name }}
        </h3>
        <a href="{{ route('course.detail', $modul->bab->course->slug) }}" class="">Close</a>
    </div>

    @if (!empty($modul->video))
    @php
        $videoSource = '';
        if (filter_var($modul->video, FILTER_VALIDATE_URL)) {
            if (strpos($modul->video, 'youtube.com/watch?v=') !== false) {
                $videoSource = str_replace('watch?v=', 'embed/', $modul->video);
            } elseif (strpos($modul->video, 'youtu.be/') !== false) {
                $videoSource = 'https://www.youtube.com/embed/' . substr(parse_url($modul->video, PHP_URL_PATH), 1);
            } else {
                $videoSource = $modul->video;
            }
        } else {
            $videoSource = asset('storage/' . $modul->video);
        }
    @endphp

    <div class="aspect-[16/9]">
        <video id="player" playsinline controls class="w-full p-5 h-full">
            <source src="{{ $videoSource }}" type="{{ strpos($videoSource, 'youtube.com') !== false || strpos($videoSource, 'youtu.be') !== false ? 'text/html' : 'video/mp4' }}" />
        </video>
    </div>
@endif

    <div class="deskripsi mt-5">
        <p>{!! $modul->materi !!}</p>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modulLinks = document.querySelectorAll('.modul-link');
        const contentContainer = document.getElementById('modul-content');

        // Fungsi untuk memuat modul berdasarkan slug
        function loadModul(slug) {
            fetch(`/modul/${slug}`)
                .then(response => response.text())
                .then(data => {
                    // Tampilkan konten modul di kontainer
                    contentContainer.innerHTML = data;

                    // Update URL di browser tanpa memuat ulang halaman
                    history.pushState({ slug: slug }, '', `/modul/${slug}`);
                })
                .catch(error => console.error('Error:', error));
        }

        // Event listener untuk setiap modul
        modulLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');
                loadModul(slug);
            });
        });

        // Menangani klik pada tombol Previous dan Next
        document.querySelectorAll('.modul-nav').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');
                loadModul(slug);
            });
        });

        // Menangani perubahan state (misalnya, tombol back atau forward pada browser)
        window.addEventListener('popstate', function(e) {
            if (e.state && e.state.slug) {
                loadModul(e.state.slug);
            }
        });

        // Muat modul pertama saat halaman dimuat jika ada modul yang tersedia
        const firstModulSlug = document.querySelector('.modul-nav')?.getAttribute('data-slug');
        if (firstModulSlug) {
            loadModul(firstModulSlug);
        }
    });

    // Plyr Video Player
    document.addEventListener('DOMContentLoaded', () => {
        const player = new Plyr('#player', {
            controls: ['play', 'progress', 'volume', 'fullscreen'],
            youtube: {
                noCookie: true,
                rel: 0,
                modestbranding: 1
            },
            captions: {
                active: true,
                update: true,
                language: 'en'
            }
        });
    });
</script>
@endsection
