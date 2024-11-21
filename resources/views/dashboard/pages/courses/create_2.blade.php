@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Create Course')

@section('content')
        <div class="container" data-aos="fade-up">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-5">
                <!-- create course left -->
                <div data-aos="fade-up" class="lg:col-start-1 lg:col-span-8">
                    <form id="courseForm" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        <ul class="accordion-container curriculum create-course">
                            <!-- Course Info Accordion -->
                            <li class="accordion mb-5 active">
                                <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-t-md">
                                    <div class="py-5 px-30px">
                                        <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px rounded-t-md">
                                            <div>
                                                <span>Course Info</span>
                                            </div>
                                            <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="accordion-content transition-all duration-500 overflow-hidden">
                                        <div class="content-wrapper py-4 px-5">
                                            <div class="p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up">
                                                <div class="grid grid-cols-1 mb-15px gap-15px">
                                                    <div>
                                                        <label class="mb-3 block font-semibold">Nama Kursus</label>
                                                        <input type="text" id="name" name="name" placeholder="Course Title" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                    </div>
                                                    <div>
                                                        <label class="mb-3 block font-semibold">Slug</label>
                                                        <input type="text" id="slug" name="slug" placeholder="Course Slug" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" readonly>
                                                    </div>
                                                    <div class="grid grid-cols-1 xl:grid-cols-2 mb-15px gap-y-15px gap-x-30px">
                                                        <div>
                                                            <label class="mb-3 block font-semibold">Waktu Mulai</label>
                                                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                        </div>
                                                        <div>
                                                            <label class="mb-3 block font-semibold">Instruktur</label>
                                                            <select class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no" name="intruktur_id">
                                                                @foreach($instruktur as $user)
                                                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="mb-3 block font-semibold">Harga Kursus</label>
                                                        <input type="text" name="harga" id="harga" placeholder="Harga Kursus" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                    </div>
                                                    <div>
                                                        <label class="mb-3 block font-semibold">Harga diskon</label>
                                                        <input type="text" name="harga_diskon" id="harga_diskon" placeholder="Diskon" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                    </div>
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-30px">
                                                        <div>
                                                            <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Kategori Kursus</label>
                                                            <div class="bg-whiteColor relative rounded-md">
                                                                <select name="categories_id" class="text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md">
                                                                    <option selected>All</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label class="text-xs uppercase text-placeholder block font-semibold text-opacity-50 leading-1.8">Tipe Kursus</label>
                                                            <div class="bg-whiteColor relative rounded-md">
                                                                <select name="berbayar" id="berbayar" class="text-base bg-transparent text-blackColor2 w-full p-13px pr-30px focus:outline-none block appearance-none relative z-20 focus:shadow-select rounded-md">
                                                                    <option value="true">Berbayar</option>
                                                                    <option value="false">Gratis</option>
                                                                </select>
                                                                <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-15px">
                                                    <label class="mb-3 block font-semibold">Deskripsi</label>
                                                    <textarea name="deskripsi" id="deskripsi" class="w-full py-10px px-5 text-sm text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="mb-15px">
                                                    <label class="mb-3 block font-semibold">Thumbnail</label>
                                                    <input type="file" id="thumbnail" name="thumbnail" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Intro Video Accordion -->
                            <li class="accordion mb-5">
                                <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark">
                                    <div class="py-5 px-30px">
                                        <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px">
                                            <div>
                                                <span>Intro Video</span>
                                            </div>
                                            <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0 l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                                        <div class="content-wrapper py-4 px-5">
                                            <div class="p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up" id="video-form">
                                                <div class="grid grid-cols-1 mb-15px gap-15px">
                                                    <div>
                                                        <label class="mb-3 block font-semibold">Upload Video File</label>
                                                        <input type="file" name="video_file" id="video_file" accept="video/*" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                    </div>
                                                    <div>
                                                        <label class="mb-3 block font-semibold">Add Your Video URL</label>
                                                        <input type="text" name="video_url" id="video_url" placeholder="Add your Video URL here" class="w-full py-10px px-5 text-sm focus:outline-none text-contentColor dark:text-contentColor-dark bg-whiteColor dark:bg-whiteColor-dark border-2 border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 leading-23px rounded-md font-no">
                                                    </div>
                                                    <div>
                                                        <div class="mb-3 block">
                                                            Example:
                                                            <a class="hover:text-primaryColor" href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Learning Module Accordion -->
                            <li class="accordion mb-5">
                                <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark">
                                  <div class="py-5 px-30px">
                                    <div class="cursor-pointer accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px">
                                      <div>
                                        <span>Modul Pembelajaran</span>
                                      </div>
                                      <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                      </svg>
                                    </div>
                                  </div>
                                  <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                                    <div class="content-wrapper py-4 px-5">
                                      <div class="bab-form p-10px md:p-10 lg:p-5 2xl:p-10 bg-darkdeep3 dark:bg-transparent text-sm text-blackColor dark:text-blackColor-dark leading-1.8" data-aos="fade-up" id="video-form">
                                        <div class="bab-section">
                                          <div class="bab-item">
                                            <input type="text" name="bab[0][name]" placeholder="Bab Name" required>
                                            <div class="modul-section">
                                              <div class="modul-item">
                                                <input type="text" name="bab[0][moduls][0][name]" placeholder="Modul Name" required>
                                                <input type="file" name="bab[0][moduls][0][video]" accept="video/*">
                                                <input type="file" name="bab[0][moduls][0][file]" accept="image/*,application/pdf">
                                                <textarea name="bab[0][moduls][0][materi]" placeholder="Materi"></textarea>
                                              </div>
                                            </div>
                                            <button type="button" class="add-modul-btn">Add Modul</button>
                                          </div>
                                        </div>
                                      </div>
                                      <button type="button" class="add-bab-btn">Add Bab</button>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            <!-- Certificate Template Accordion -->
                            <li class="accordion mb-5">
                                <div class="bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-b-md">
                                    <div class="cursor-pointer py-5 px-30px">
                                        <div class="accordion-controller flex justify-between items-center text-lg text-headingColor font-semibold w-full dark:text-headingColor-dark font-hind leading-27px rounded-b-md">
                                            <div>
                                                <span>Certificate Template</span>
                                            </div>
                                            <svg class="transition-all duration-500 rotate-0" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="accordion-content transition-all duration-500 overflow-hidden h-0">
                                        <div class="content-wrapper py-4 px-5">
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-30px gap-y-5">
                                                <div>
                                                    <img src="../../assets/images/dashbord/dashbord__8.jpg" class="w-full" alt="">
                                                </div>
                                                <div>
                                                    <img src="../../assets/images/dashbord/dashbord__4.jpg" class="w-full" alt="">
                                                </div>
                                                <div>
                                                    <img src="../../assets/images/dashbord/dashbord__5.jpg" class="w-full" alt="">
                                                </div>
                                                <div>
                                                    <img src="../../assets/images/dashbord/dashbord__9.jpg" class="w-full" alt="">
                                                </div>
                                                <div>
                                                    <img src="../../assets/images/dashbord/dashbord__7.jpg" class="w-full" alt="">
                                                </div>
                                                <div>
                                                    <img src="../../assets/images/dashbord/dashbord__8.jpg" class="w-full" alt="">
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <label for="certificate_file" class="block text-sm font-semibold">Upload Certificate File</label>
                                                <input type="file" name="certificate_file" id="certificate_file" class="mt-1" accept=".jpg,.jpeg,.png,.pdf" required>
                                            </div>
                        
                                            <!-- Upload Signature Files -->
                                            <div class="mt-5">
                                                <label for="certificate_ttd" class="block text-sm font-semibold">Upload Signature</label>
                                                <input type="file" name="certificate_ttd[]" id="certificate_ttd" class="mt-1" accept="image/*" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-10 leading-1.8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-x-30px gap-y-5">
                            <div data-aos="fade-up" class="lg:col-start-1 lg:col-span-4">
                                <a href="#" class="text-whiteColor bg-primaryColor w-full p-13px hover:text-whiteColor hover:bg-secondaryColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-secondaryColor text-center">
                                    Preview
                                </a>
                            </div>
                            <div data-aos="fade-up" class="lg:col-start-5 lg:col-span-8">
                                <button type="submit" class="text-whiteColor bg-primaryColor w-full p-13px hover:text-whiteColor hover:bg-secondaryColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-secondaryColor text-center">
                                    Create Course
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- create course right-->
                <div data-aos="fade-up" class="lg:col-start-9 lg:col-span-4">
                    <div class="p-30px border-2 border-primaryColor">
                        <ul>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Set the Course Price option make it free.
                                </p>
                            </li>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Standard size for the course thumbnail.
                                </p>
                            </li>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Video section controls the course overview video.
                                </p>
                            </li>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Course Builder is where you create course.
                                </p>
                            </li>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Add Topics in the Course Builder section to create
                                    lessons, .
                                </p>
                            </li>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Prerequisites refers to the fundamental courses .
                                </p>
                            </li>
                            <li class="my-7px flex gap-10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check flex-shrink-0">
                                    <polyline points="20 6 9 17 4 12" class="text-greencolor"></polyline>
                                </svg>
                                <p class="text-lg text-contentColor dark:text-contentColor-dark leading-1.45">
                                    Information from the Additional Data section.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
    <script>
      document.getElementById('name').addEventListener('input', function() {
          // Ambil nilai dari field name
          var name = this.value;
  
          // Buat slug dengan mengubah nama menjadi format slug
          var slug = name.toLowerCase()
              .replace(/[^\w\s-]/g, '') // Menghapus karakter selain huruf, angka, dan spasi
              .replace(/[\s_-]+/g, '-') // Mengganti spasi dan underscore dengan tanda minus
              .replace(/^-+|-+$/g, ''); // Menghapus tanda minus di awal dan akhir
  
          // Masukkan nilai slug ke dalam field slug
          document.getElementById('slug').value = slug;
      });
  </script>
  <script>
    function formatRupiah(angka) {
        var numberString = angka.replace(/[^,\d]/g, '').toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }

    document.getElementById('harga').addEventListener('input', function() {
        this.value = formatRupiah(this.value);
    });
</script>
<script>
  function formatRupiah(angka) {
      var numberString = angka.replace(/[^,\d]/g, '').toString(),
          split = numberString.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] ? rupiah + ',' + split[1] : rupiah;
      return 'Rp ' + rupiah;
  }

  document.getElementById('harga_diskon').addEventListener('input', function() {
      this.value = formatRupiah(this.value);
  });
</script>

   
<script>
    // Validasi agar hanya salah satu yang terisi: video file atau video URL
    document.getElementById('courseForm').addEventListener('submit', function(event) {
        var videoFile = document.getElementById('video_file').value;
        var videoURL = document.getElementById('video_url').value;

        if (!videoFile && !videoURL) {
            alert("Please upload a video file or provide a video URL.");
            event.preventDefault(); // Mencegah form disubmit jika tidak ada input
        } else if (videoFile && videoURL) {
            alert("Please select only one option: either upload a video file or provide a video URL.");
            event.preventDefault(); // Mencegah form disubmit jika kedua input terisi
        }
    });

    // JavaScript untuk menambah bab dan modul secara dinamis
    document.addEventListener('DOMContentLoaded', function () {
        let babCount = 1;
        let modulCount = [1]; // untuk melacak jumlah modul per bab

        // Menambah bab baru
        document.querySelector('.add-bab-btn').addEventListener('click', function () {
            const babSection = document.querySelector('.bab-section');
            const newBab = document.createElement('div');
            newBab.classList.add('bab-item');
            newBab.innerHTML = `
                <input type="text" name="bab[${babCount}][name]" placeholder="Bab Name" required>
                <div class="modul-section">
                    <div class="modul-item">
                        <input type="text" name="bab[${babCount}][moduls][0][name]" placeholder="Modul Name" required>
                        <input type="file" name="bab[${babCount}][moduls][0][video]" accept="video/*">
                        <input type="file" name="bab[${babCount}][moduls][0][file]" accept="image/*,application/pdf">
                        <textarea name="bab[${babCount}][moduls][0][materi]" placeholder="Materi"></textarea>
                    </div>
                </div>
                <button type="button" class="add-modul-btn">Add Modul</button>
            `;
            babSection.appendChild(newBab);
            babCount++;
            modulCount.push(1);
        });

        // Menambah modul pada bab
        document.querySelector('.bab-section').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('add-modul-btn')) {
                const babIndex = Array.from(document.querySelectorAll('.bab-item')).indexOf(e.target.closest('.bab-item'));
                const modulCountForBab = modulCount[babIndex];

                const modulSection = e.target.closest('.bab-item').querySelector('.modul-section');
                const newModul = document.createElement('div');
                newModul.classList.add('modul-item');
                newModul.innerHTML = `
                    <input type="text" name="bab[${babIndex}][moduls][${modulCountForBab}][name]" placeholder="Modul Name" required>
                    <input type="file" name="bab[${babIndex}][moduls][${modulCountForBab}][video]" accept="video/*">
                    <input type="file" name="bab[${babIndex}][moduls][${modulCountForBab}][file]" accept="image/*,application/pdf">
                    <textarea name="bab[${babIndex}][moduls][${modulCountForBab}][materi]" placeholder="Materi"></textarea>
                `;
                modulSection.appendChild(newModul);
                modulCount[babIndex]++;
            }
        });
    });
</script>
@endsection