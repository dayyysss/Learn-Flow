@extends('landing.layouts.landing-layouts')
@section('page_title', 'LearnFlow | Modul Pembelajaran')

@section('content')
    {{-- @include('landing.components.breadcrumb', ['title' => 'Buat Modul Pembelajaran']) --}}

    <div class="container mx-auto py-10 px-4">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-headingColor dark:text-headingColor-dark">Buat Modul Pembelajaran</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Isi formulir di bawah untuk membuat modul pembelajaran baru</p>
        </div>

        <!-- Main Form Container -->
        <button class="btn px-2 py-1 bg-primaryColor text-white rounded-md mb-5 b-light btn-primary-light dk-theme-card-square"
                               id="openModal">
                                <i class="btn ri-add-fill text-inherit"></i>
                                <span>Tambah</span>
                            </button>

        <div class="max-w-4xl mx-auto">
            <ul class="accordion-container curriculum create-course">

                @foreach($babs as $bab)
                <li class="accordion mb-5">
                    <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark">
                        <div class="py-5 px-30px">
                            <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px">
                                <div>
                                    <span>{{$bab->name}}</span>
                                </div>
            
                                <div class="flex items-center gap-1 space-x-2">
                                    {{-- Tombol tambah modul --}}
                                    <button class="btn px-2 py-2 border rounded-full b-light btn-primary-light dk-theme-card-square openModalTambahModul" style="color: #0c63e4"
                                        data-bab-id="{{ $bab->id }}">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                    {{-- <button class="text-red-500" title="Hapus Bab" onclick="hapusBab({{ $bab->id }})">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button> --}}
                                
                                @if($bab->moduls->isNotEmpty())
                                <div class="btn px-2 py-2 border rounded-full b-light bg-blue btn-primary-light dk-theme-card-square" style="color: #0c63e4">
                                <svg class="transition-all text-white duration-500 rotate-0" width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                                </div>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                            <div class="content-wrapper py-4 px-5">
                                <div class="bab-form bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up" id="video-form">
                                    <div class="bab-section">
                                        <!-- Table-like structure without full table tags -->
                                        <div class="border">
                                            @foreach($bab->moduls as $modul)
                                                <div class="flex border-b justify-between border-gray-300 py-2 px-4">
                                                    <span class="text-md">{{ $modul->name }}</span>
                                                    <div>
                                                        <a href="{{ route('modul.detail.admin', ['course' => $course->slug, 'modul' => $modul->slug]) }}">Detail >></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        {{-- Modal Tambah Modul --}}
                        <div id="addModul-{{ $bab->id }}" class="modal-back" style="display: none">
                            <div class="modal-content-modul">
                                <span class="close-tambah-modul">&times;</span>
                                <h3>Tambah Tipe Menu</h3>
                                <form action="{{ route('moduls.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                                    @csrf
                        
                                    <div class="modul-section">
                                        <div class="modul-item border p-5 mb-3">
                                            <div class="mb-15px">
                                                <div class="flex justify-between">
                                                <label class="mb-3 block font-semibold">Judul Modul</label>
                                                <div class="flex mb-3 items-center gap-3">
                                                    <label for="task-switch" class="font-semibold text-sm">Aktifkan Penugasan?</label>
                                                    <input type="checkbox" id="task-switch" name="task" value="1" class="toggle-switch">
                                                </div>
                                                </div>
                                                <input type="text" name="name" placeholder="Modul Name" class="form-control mb-3 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md">
                                            </div>
                        
                                            <div class="mb-15px">
                                                <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Pilih Jenis Video</label>
                                                <div class="flex items-center gap-5 space-x-5">
                                                    <label>
                                                        <input type="radio" name="video_type" value="url" class="mr-2" onclick="toggleVideoInput('url')"> URL Video
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="video_type" value="file" class="mr-2" onclick="toggleVideoInput('file')"> File Video
                                                    </label>
                                                </div>
                                            </div>
                        
                                            <!-- Input untuk URL Video -->
                                            <div id="video-url-section" class="mb-15px hidden">
                                                <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">URL Video Pembelajaran</label>
                                                <input type="text" name="video_url" placeholder="Masukkan URL Video" class="form-control mb-1 mt-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md">
                                            </div>
                        
                                            <!-- Input untuk File Video -->
                                            <div id="video-file-section" class="mb-15px hidden">
                                                <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">File Video Pembelajaran</label>
                                                <input type="file" name="video" accept="video/*" class="form-control mb-1 mt-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md">
                                            </div>
                        
                                            <div class="grid grid-cols-1 mb-15px gap-y-15px gap-x-30px">
                                                <div>
                                                    <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">File Materi Pembelajaran</label>
                                                    <input type="file" name="file" accept="image/*,application/pdf" class="form-control mt-3 mb-3 w-full py-5px px-2 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border -2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md">
                                                </div>
                                            </div>
                        
                                            <div>
                                                <label class="mb-3 block font-semibold">Materi</label>
                                                <textarea name="materi" placeholder="Materi" id="materi" class="form-control mt-2 w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" cols="20" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <input type="hidden" name="bab_id" id="bab_id-{{ $bab->id }}">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn bg-indigo-700">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <script>
                            // Fungsi untuk menampilkan input sesuai dengan tipe video yang dipilih (URL atau file)
                            function toggleVideoInput(type) {
                                if (type === 'url') {
                                    document.getElementById('video-url-section').classList.remove('hidden');
                                    document.getElementById('video-file-section').classList.add('hidden');
                                } else {
                                    document.getElementById('video-url-section').classList.add('hidden');
                                    document.getElementById('video-file-section').classList.remove('hidden');
                                }
                            }
                        </script>
                        
                    </div>
                </li>
            @endforeach
            
            </ul>

            
            </div>

            <!-- Modal Tambah Bab -->


            </div>
@include('dashboard.pages.modul.modal')

           <script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>

<style>
    #openModalTambahModul{
        z-index: 99999 !important;
    }

    .bab-section{
        max-height: 50vh;
        overflow-y: auto
    }

    /* Styling untuk switch toggle */
.toggle-switch {
    width: 40px;
    height: 20px;
    position: relative;
    appearance: none;
    background-color: #ccc;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.toggle-switch:checked {
    background-color: #4CAF50;
}

.toggle-switch:before {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 16px;
    height: 16px;
    background-color: white;
    border-radius: 50%;
    transition: left 0.3s ease;
}

.toggle-switch:checked:before {
    left: 22px;
}

</style>
        
@endsection
