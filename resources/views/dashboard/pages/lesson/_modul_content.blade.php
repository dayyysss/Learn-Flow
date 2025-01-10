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
    <div class="task rounded-md h-auto bg-white p-5">
        <div class="p-4">
            <h4 class="text-2xl sm:text-3xl leading-1.2 text-black dark:text-black">
                Submission
            </h4>

            
            <hr class="border-borderColor2 dark:opacity-30 my-4">
            
            <form action="{{ route('assignment.store') }}" id="assignmentForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="modul_id" value="{{ $modul->id }}">
            
                <!-- File Upload Section -->
                @if($assignment) 
                            <!-- Jika sudah mengumpulkan tugas -->
                            <form action="" id="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="modul_id" value="{{ $modul->id }}">

                                <div class="flex justify-end mb-2">
                                   <div class="border border-blackColor px-2">{{$assignment->nilai ?? 'belum dinilai'}}</div>
                                </div>


                                @if($assignment->task)
                                    @php
                                        // Mendekode data JSON yang disimpan di kolom 'task'
                                        $tasks = json_decode($assignment->task, true)['tasks'] ?? [];
                                    @endphp
                                    @if(count($tasks) > 0)
                                        <ul>
                                            @foreach($tasks as $task)
                                            <li class="flex gap-4 border rounded-md mb-2 p-2 items-center">
                                                <!-- Jika file adalah gambar, tampilkan gambar -->
                                                @if(strpos(mime_content_type(storage_path('app/public/' . $task['file'])), 'image') === 0)
                                                    <img src="{{ asset('storage/' . $task['file']) }}" alt="{{ basename($task['file']) }}" class="w-15 h-auto rounded-l-lg">
                                                @endif
                                            
                                                <!-- Menampilkan nama file dengan pengaturan overflow -->
                                                <p class="truncate w-full">{{ basename($task['file']) }}</p>
                                            </li>
                                            
                                            @endforeach
                                        </ul>
                                        
                                    @endif
                                @endif
                                <div id="filePreview" class="mt-2">
                                    <!-- File yang diunggah akan ditampilkan di sini -->
                                </div>

                            <div class="mb-4">
                                <div class="relative inline-block text-left w-full mb-4">
                                    <button type="button" id="dropdownButton" class="w-full border py-2 px-4 text-white bg-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                                        <label class="block text-darkBlue cursor-pointer">
                                            Tambah atau Buat
                                            <input type="file" class="hidden" id="fileInput" name="files[]" multiple />
                                        </label>
                                    </button>
                                </div>

                                
                                <div class="mb-4">
                                    <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block" for="content">Assignment Content</label>
                                    <textarea id="content" name="content" class="w-full px-3 py-1 bg-transparent text-darkBlue border border-borderColor6 placeholder:opacity-80 focus:outline-none focus:shadow-select rounded-md">{{$assignment->content}}</textarea>
                                </div>

                                
                                
                            </div>
                            <!-- Button Batalkan Pengiriman -->
                            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}"> <!-- Input untuk assignment_id -->
                            <div>
                                <button id="cancelButton" type="submit" class="text-size-15 text-white bg-red-500 w-full px-6 py-2 border border-primaryColor hover:text-primaryColor hover:bg-white inline-block rounded group dark:hover:text-white dark:hover:bg-white-dark">Batalkan Pengiriman</button>
                            </div>
                            </form>
                        @else


                    <!-- Jika belum mengumpulkan tugas -->
                    <div class="relative inline-block text-left w-full mb-4">
                        <button type="button" id="dropdownButton" class="w-full border py-2 px-4 text-white bg-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <label class="block text-darkBlue cursor-pointer">
                                Tambah atau Buat
                                <input type="file" class="hidden" id="fileInput" name="files[]" multiple />
                            </label>
                        </button>
                    </div>
                    <div id="filePreview" class="mt-2">
                        <!-- File yang diunggah akan ditampilkan di sini -->
                    </div>
                    <div class="mb-4">
                        <label class="text-darkBlue dark:text-darkBlue-dark mb-2 block" for="content">Assignment Content</label>
                        <textarea id="content" name="content" class="w-full px-3 py-1 bg-transparent text-darkBlue border border-borderColor6 placeholder:opacity-80 focus:outline-none focus:shadow-select rounded-md"></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button id="submitButton" type="submit" class="text-size-15 text-white bg-primaryColor w-full px-6 py-2 border border-primaryColor hover:text-primaryColor hover:bg-white inline-block rounded group dark:hover:text-white dark:hover:bg-white-dark">
                            Kirim Tugas
                        </button>
                    </div>
                @endif
            </form>
            
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



<script>
    // Menangani File Upload dan Menampilkan Nama File dan Gambar
    // Menangani File Upload dan Menampilkan Nama File dan Gambar
// Menangani File Upload dan Menampilkan Nama File dan Gambar
function displayFileNameAndImage(event) {
    const fileInput = event.target;
    const filePreview = document.getElementById('filePreview');
    const file = fileInput.files[0]; // Ambil file pertama yang dipilih

    if (file) {
        const fileURL = URL.createObjectURL(file);
        
        const fileElement = document.createElement('div');
        fileElement.classList.add('flex', 'gap-4', 'border', 'rounded', 'mb-2', 'p-2');
        
        // Jika file adalah gambar, tampilkan gambar
        if (file.type.startsWith('image/')) {
            const imgElement = document.createElement('img');
            imgElement.src = fileURL;
            imgElement.alt = file.name;
            imgElement.classList.add('w-15', 'h-auto');
            fileElement.appendChild(imgElement);
        }
        
        // Menampilkan nama file
        const fileName = document.createElement('p');
        fileName.textContent = file.name;
        fileElement.appendChild(fileName);
        
        // Menambahkan elemen file ke dalam preview
        filePreview.appendChild(fileElement);
    }
}

// Event listener untuk fileInput
document.getElementById('fileInput').addEventListener('change', displayFileNameAndImage);


</script>
<script>
    // Menambahkan event listener untuk form submit
    document.getElementById('assignmentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const submitButton = document.getElementById('submitButton');

        fetch('{{ route("assignment.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.message === 'Tugas berhasil dikirim!') {
                alert(data.message);

                // Ubah teks dan kelas tombol untuk batalkan pengiriman
                submitButton.textContent = 'Batalkan Pengiriman';
                submitButton.classList.replace('bg-primaryColor', 'bg-red-500');
                submitButton.setAttribute('id', 'cancelButton');

                // Menambahkan event listener untuk membatalkan pengiriman
                submitButton.removeEventListener('click', submitAssignment);
                submitButton.addEventListener('click', cancelSubmission);
            } else {
                alert(data.message || 'Terjadi kesalahan.');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim tugas.');
        });
    });

    // Fungsi untuk membatalkan pengiriman tugas
    function cancelSubmission(e) {
    e.preventDefault();

    const modulIdInput = document.querySelector('input[name="modul_id"]');
    const assignmentIdInput = document.querySelector('input[name="assignment_id"]');

    console.log(modulIdInput, assignmentIdInput); // Cek apakah elemen ditemukan

    if (!modulIdInput || !assignmentIdInput) {
        console.error('Elemen input tidak ditemukan');
        alert('Terjadi kesalahan saat membatalkan pengiriman tugas.');
        return;
    }

    const modulId = modulIdInput.value;
    const assignmentId = assignmentIdInput.value;

    fetch(`{{ url('/assignment/cancel') }}/${assignmentId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ modul_id: modulId }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.message === 'Pengiriman tugas berhasil dibatalkan.') {
            alert(data.message);

            const cancelButton = document.getElementById('cancelButton');
            cancelButton.textContent = 'Kirim Tugas';
            cancelButton.classList.replace('bg-red-500', 'bg-primaryColor');
            cancelButton.setAttribute('id', 'submitButton');

            cancelButton.removeEventListener('click', cancelSubmission);
            cancelButton.addEventListener('click', submitAssignment);
        } else {
            alert(data.message || 'Terjadi kesalahan saat membatalkan.');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat membatalkan tugas.');
    });
}

// Pastikan hanya pasang event listener jika tombol "Batalkan Pengiriman" ada
document.addEventListener('DOMContentLoaded', function() {
    const cancelButton = document.getElementById('cancelButton');
    if (cancelButton) {
        cancelButton.addEventListener('click', cancelSubmission);
    }
});



    // Fungsi untuk mengirim tugas
    function submitAssignment(e) {
        e.preventDefault();
        document.getElementById('assignmentForm').submit();
    }
</script>

    


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

    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>
@endsection
