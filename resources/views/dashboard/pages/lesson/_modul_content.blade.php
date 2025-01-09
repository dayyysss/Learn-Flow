@extends('dashboard.pages.lesson.lesson')

@section('modul')
<div class="pr-5" style="padding-bottom: 12%">
    <!-- Judul Modul -->
    <div class="content mb-3">
        <h5 class="font-bold capitalize text-xl">{{ $modul->name }}</h5>
    </div>

    <div class="flex modul-task gap-30px">

    <div class="modul-isi">
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

    
    <!-- Assignment Submission -->
    @if ($modul->task == 1) <!-- Periksa apakah task bernilai 1 -->
    <div class="task rounded-md h-auto bg-white p-30px">
   <div class="">
       <div>
           <h4
               class="text-2xl sm:text-size-28 leading-1.2 text-blackColor dark:text-blackColor-dark"
           >
               Submission
           </h4>
           <hr class="border-borderColor2 dark:opacity-30 my-4">
           <form>

            <div class="relative inline-block text-left w-full mb-4">
                <!-- Tombol -->
                <button
                    type="button"
                    id="dropdownButton"
                    class="w-full border py-1 px-4 text-s bg-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300"
                    
                >
                <label
                        class="block text-darkBlue hover:bg-gray-100 hover:text-blue-500 cursor-pointer"
                    >
                    Tambah atau Buat
                        <input
                            type="file"
                            class="hidden"
                            id="fileInput"
                        />
                    </label>
                  
                </button>


            <div class="mb-4">
                <label
                    class="text-darkBlue dark:text-darkBlue-dark mb-2 block"
                    for="content"
                >Assignment Content</label>
                <textarea
                    id="content"
                    class="w-full px-3 py-1 bg-transparent focus:outline-none text-darkBlue bg-whiteColor border border-borderColor6 placeholder:opacity-80 focus:shadow-select rounded-md"
                    
                ></textarea>
            </div>
        
            <div>
                <button
                    type="submit"
                    class="text-size-15 text-whiteColor bg-primaryColor w-full px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark"
                >
                    Submit Assignment
                </button>
            </div>
        </form>
        
       
        
       </div>
   </div>
</div>
   @endif
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

{{-- <script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.classList.toggle('hidden');
    }

    function openModal(event) {
        event.preventDefault();
        const modal = document.getElementById('modal');
    modal.classList.remove('hidden'); // Tampilkan modal
    }

    // Close Modal
    function closeModal() {
        const modal = document.getElementById('modal');
        modal.classList.remove('show');
    }

    // Display Added File Name and Image
    function displayFileNameAndImage() {
        const fileInput = document.getElementById('fileInput');
        const addedFiles = document.getElementById('addedFiles');
        const file = fileInput.files[0];
        
        if (file) {
            const fileURL = URL.createObjectURL(file);
            addedFiles.innerHTML = `
                <div class='flex gap-15px border rounded'>
                <img src="${fileURL}" alt="${file.name}" class="w-15 h-auto" />
                <p class='file-name'>${file.name}</p>
                </div>
            `;
        }
    }

    // Handle Link Form Submission
    document.getElementById('linkForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const link = document.getElementById('linkInput').value;

        const addedLinks = document.getElementById('addedLinks');
        addedLinks.innerHTML = `<strong>Added Links:</strong><ul><li><a href="${link}" target="_blank">${link}</a></li></ul>`;

        closeModal();
    });

    // Handle Assignment Form Submission
    document.getElementById('assignmentForm').addEventListener('submit', function (event) {
        event.preventDefault();
        alert('Assignment submitted!');
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', function (event) {
        const dropdown = document.getElementById('dropdownMenu');
        const button = document.getElementById('dropdownButton');
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script> --}}




<style>

    .modul-task
    {
        height: auto;
    }
    .modul-isi {
    flex-grow: 1; /* Modul mengambil sisa ruang yang tersedia */
    min-width: 0; /* Mencegah elemen meluap */
}

.task {
    width: 300px; /* Lebar tetap untuk submission */
    flex-shrink: 0; /* Tidak mengecil */
    height: auto !important;
}

    /* CSS untuk modal */
    #modal {
    display: none;  /* Sembunyikan modal awalnya */
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Latar belakang gelap */
    z-index: 99999999 !important; /* Prioritas lebih tinggi */
}

#modal.show {
    display: flex;  /* Tampilkan modal dengan flex saat class 'show' ditambahkan */
}

    #modal .modal-content {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        max-width: 300px;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        animation: 0.3s ease-in-out;
    }

    .file-name{
        box-sizing: border-box;
    }

</style>
@endsection
