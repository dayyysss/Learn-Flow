@extends('dashboard.pages.lesson.lesson')

@section('modul')
<div class="pb-5">
    <!-- Judul Modul -->
    <div class="content mb-3">
        <h5 class="font-bold capitalize text-xl">{{ $modul->name }}</h5>
    </div>

    <!-- Video Modul -->
    <div class="dark:bg-lightGrey10-dark flex justify-center relative z-0 overflow-y-visible 2xl:pb-150px 2xl:pt-40.5">
        @if ($modul->video) 
        <!-- Cek apakah ada video -->
        <div class="w-full py-18px flex justify-center">
            <iframe
                @if (filter_var($modul->video, FILTER_VALIDATE_URL))
                    @if (strpos($modul->video, 'youtube.com/watch?v=') !== false)
                        src="{{ str_replace('watch?v=', 'embed/', $modul->video) }}"
                    @elseif (strpos($modul->video, 'youtu.be/') !== false)
                        src="{{ 'https://www.youtube.com/embed/' . substr(parse_url($modul->video, PHP_URL_PATH), 1) }}"
                    @else
                        src="{{ $modul->video }}"
                    @endif
                @else
                    src="{{ asset('storage/' . $modul->video) }}"
                @endif
                allowfullscreen=""
                width="640" height="360" 
                class="rounded-lg border border-gray-300">
            </iframe>
        </div>
        @endif
    </div>

    <!-- Deskripsi Modul -->
    <div class="deskripsi mt-5">
        <p>{!! $modul->materi !!}</p>
    </div>
</div>

<!-- JavaScript untuk AJAX Modul dan Navigasi -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modulLinks = document.querySelectorAll('.modul-link');
        const contentContainer = document.getElementById('modul-content');

        // Fungsi untuk memuat modul berdasarkan slug
        function loadModul(slug) {
            fetch(`/modul/${slug}`)
                .then(response => response.text())
                .then(data => {
                    contentContainer.innerHTML = data;
                    history.pushState({ slug: slug }, '', `/modul/${slug}`);
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

        // Menangani navigasi Previous dan Next
        document.querySelectorAll('.modul-nav').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');
                loadModul(slug);
            });
        });

        // Menangani perubahan state (Back/Forward browser)
        window.addEventListener('popstate', function (e) {
            if (e.state && e.state.slug) {
                loadModul(e.state.slug);
            }
        });

        // Muat modul pertama jika tersedia
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
