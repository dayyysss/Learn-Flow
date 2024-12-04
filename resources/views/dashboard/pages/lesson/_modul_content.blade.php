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

    @if ($modul->video) <!-- Cek apakah ada video -->
    <div class="aspect-[16/9]">
        <iframe
          @if (filter_var($modul->video, FILTER_VALIDATE_URL))
              @if (strpos($modul->video, 'youtube.com/watch?v=') !== false)
                  {{-- Konversi URL YouTube standar ke format embed --}}
                  src="{{ str_replace('watch?v=', 'embed/', $modul->video) }}"
              @elseif (strpos($modul->video, 'youtu.be/') !== false)
                  {{-- Konversi URL YouTube pendek ke format embed --}}
                  src="{{ 'https://www.youtube.com/embed/' . substr(parse_url($modul->video, PHP_URL_PATH), 1) }}"
              @else
                  {{-- Gunakan URL asli jika bukan YouTube --}}
                  src="{{ $modul->video }}"
              @endif
          @else
              {{-- Gunakan path dari storage jika bukan URL --}}
              src="{{ asset('storage/' . $modul->video) }}"
          @endif
          allowfullscreen=""
          class="w-full h-full"
        ></iframe>
    </div>
    @endif

    <div class="deskripsi mt-5">
        <p>{!! $modul->materi !!}</p>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-5">
        @if ($previousModul)
            <a href="#" data-slug="{{ $previousModul->slug }}" class="btn btn-primary modul-nav">Previous</a>
        @else
            <span class="text-gray-500">Previous</span>
        @endif

        @if ($nextModul)
            <a href="#" data-slug="{{ $nextModul->slug }}" class="btn btn-primary modul-nav">Next</a>
        @else
            <span class="text-gray-500">Next</span>
        @endif
    </div>
</div>

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