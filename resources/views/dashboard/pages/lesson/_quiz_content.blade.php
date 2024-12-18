<div>
    <div class="content mb-3">
        <h5 class="font-bold capitalize text-xl">{{ $modul->name }}</h5>
    </div>

    <div class="deskripsi mt-5">
        <p>{!! $modul->start_time !!} - {!! $modul->end_time !!}</p>
        <p>{!! $modul->description !!}</p>

        <!-- Button untuk membuka modal -->
        <button @click="showModal = true; currentQuestion = 0"
            class="bg-primaryColor text-white py-2 px-4 rounded hover:bg-primaryColor-dark">
            Mulai Quiz
        </button>
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

        // Muat modul pertama saat halaman dimuat jika ada modul yang tersedia
        if (modulLinks.length > 0) {
            const firstModulSlug = modulLinks[0].getAttribute('data-slug');
            loadModul(firstModulSlug);
        }

        // Menangani klik pada tombol Previous dan Next
        document.querySelectorAll('.modul-nav').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');
                loadModul(slug);
            });
        });
    });
</script>
