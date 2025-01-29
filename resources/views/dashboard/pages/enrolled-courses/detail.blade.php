@extends('dashboard.layouts.layouts')

@section('page_title', 'LearnFlow | Kelas Belajar')

@section('content')
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- Courses Area -->
        <div class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- Heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    {{ $courseRegistration->course->name }}
                </h2>
            </div>
        
            <div class="flex justify-between gap-6">
                <!-- Kolom Kiri (Diperbesar) -->
                <div class="flex-2 card" style="width: 500px"> <!-- Menambahkan flex-2 agar kolom kiri lebih besar -->
                    <div class="p-0.5">
                        <div class="text-center">
                            <div class="aspect-video rounded-20 overflow-hidden dk-theme-card-square" style="height: 300px; width: 500px">
                                <img src="{{ asset('storage/' . $courseRegistration->course->thumbnail) }}" alt="thumb" class="w-full h-full object-contain dark:brightness-50">
                            </div>
                            <div class="max-w-[540px] mx-auto mt-4">
                                <p class="font-spline_sans leading-[1.62] text-gray-500 dark:text-dark-text mt-2">
                                    {!! $courseRegistration->course->deskripsi !!}
                                </p>
                            </div>
                            <div class="p-5 border border-dashed border-gray-200 dark:border-dark-border rounded-15 mt-4">
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 font-semibold text-left">
                                    <!-- Instructor Info -->
                                    <div class="flex items-center gap-3">
                                        <img style="width: 40px"
                                            src="{{ $courseRegistration->course->instrukturs->image ? Storage::url($courseRegistration->course->instrukturs->image) : asset('assets/images/grid/grid_small_1.jpg') }}"
                                            alt="Instructor" class="size-11 rounded-full dk-theme-card-square">
                                        <div class="flex flex-col gap-1">
                                            <p class="text-xs text-gray-500 dark:text-dark-text">Instruktur</p>
                                            <h6 class="text-heading">{{ $courseRegistration->course->instrukturs->name }}</h6>
                                        </div>
                                    </div>
            
                                    <!-- Other Info -->
                                    <div class="flex flex-col gap-1">
                                        <p class="text-xs text-gray-500 dark:text-dark-text">Total hour</p>
                                        <h6 class="text-heading">02h 35m</h6>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <p class="text-xs text-gray-500 dark:text-dark-text">Tanggal Rilis</p>
                                        <h6 class="text-heading">{{ $courseRegistration->course->tanggal_mulai }}</h6>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <p class="text-xs text-gray-500 dark:text-dark-text">Level</p>
                                        <h6 class="text-heading">{{ $courseRegistration->course->tingkatan }}</h6>
                                    </div>
                                  
                                    <div class="flex flex-col gap-1">
                                        <p class="text-xs text-gray-500 dark:text-dark-text">Total enrolled</p>
                                        <h6 class="text-heading">10,995</h6>
                                    </div>
                                    
                                    <div class="flex flex-col gap-1">
                                        <p class="text-xs text-gray-500 dark:text-dark-text">Certificate</p>
                                        <h6 class="text-heading">Yes</h6>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <p class="text-xs text-gray-500 dark:text-dark-text">Reviews</p>
                                        <h6 class="text-heading">4.9</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Kolom Kanan -->
                <div class="flex-1 transition-all duration-300" style="width: 200px"> <!-- Menambahkan flex-1 agar kolom kanan lebih kecil -->
                    <div class="flex flex-col gap-30px mb-5">
                        <div class="group course-item"
                            data-status="{{ $courseRegistration->status == 'confirm' ? 'enrolled' : ($courseRegistration->progress < 100 ? 'active' : 'completed') }}"
                            data-progress="{{ $courseRegistration->progress }}">
                            <div class="tab-content-wrapper" data-aos="fade-up">
                                <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                    <div>
                                        <div class="grid pt-15px">
                                            <div class="text-center flex flex-col items-start md:items-end gap-3">
                                                @if ($nextProsesModul)
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $nextProsesModul->modul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                        Lanjutkan
                                                    </a>
                                                @elseif ($lastAccessedModul)
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $lastAccessedModul->modul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                        Lanjutkan
                                                    </a>
                                                @else
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $firstModul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                        Mulai Belajar
                                                    </a>
                                                @endif
                                                <a href="{{ route('certificate.index', ['certificateId' => $courseRegistration->certificate_id]) }}"
                                                    class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                    Unduh Sertifikat
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Progress Bar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-30px">
                        
                        <div class="group course-item"
                            data-status="{{ $courseRegistration->status == 'confirm' ? 'enrolled' : ($courseRegistration->progress < 100 ? 'active' : 'completed') }}"
                            data-progress="{{ $courseRegistration->progress }}">

                            
                            <div class="tab-content-wrapper" data-aos="fade-up">
                                
                                <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                    <div class="mb-6 pb-3 border-b-2 border-borderColor dark:border-borderColor-dark">
                                        <h3 class="text-xl font-bold text-blackColor dark:text-blackColor-dark">
                                            <i class="icofont-read-book"></i> Riwayat Ujian
                                        </h3>
                                    </div>
                                    <div>
                                        <div class="grid pt-15px">
                                            <div class="text-center flex flex-col items-start md:items-end gap-3">
                                                @if ($nextProsesModul)
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $nextProsesModul->modul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                        Lanjutkan
                                                    </a>
                                                @elseif ($lastAccessedModul)
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $lastAccessedModul->modul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                        Lanjutkan
                                                    </a>
                                                @else
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $firstModul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                        Mulai Belajar
                                                    </a>
                                                @endif
                                                <a href="{{ route('certificate.index', ['certificateId' => $courseRegistration->certificate_id]) }}"
                                                    class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3 w-full">
                                                    Unduh Sertifikat
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Progress Bar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <p class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                <span data-countup-number=""></span><span></span>
            </p>

            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Kurikulum
                </h2>
            </div>
            <div>
                <ul class="accordion-container curriculum">
                    <!-- Loop untuk menampilkan semua bab -->
                    @foreach ($courseRegistration->course->babs as $index => $bab)
                        <li class="accordion mb-25px overflow-hidden {{ $index == 0 ? 'active' : '' }}">
                            <div
                                class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                <!-- Controller -->
                                <div>
                                    <div
                                        class="cursor-pointer accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                        <div class="flex items-center">
                                            <a
                                                href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $firstModul->slug]) }}">
                                                <span>{{ $bab->name }}</span>
                                            </a>
                                            <p
                                                class="text-xs text-headingColor dark:text-headingColor-dark px-10px py-0.5 ml-10px bg-borderColor dark:bg-borderColor-dark rounded-full">
                                                @php
                                                    $babProgress = $babsProgress->firstWhere('bab.id', $bab->id);
                                                @endphp
                                                {{ $babProgress ? $babProgress['progress'] . '%' : '0%' }}
                                            </p>
                                        </div>
                                        <svg class="transition-all duration-500 rotate-0" width="20"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#212529">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="accordion-content transition-all duration-500 h-0">
                                    <div class="content-wrapper p-10px md:px-30px">
                                        <ul>
                                            <!-- Loop untuk menampilkan modul-modul di dalam bab -->
                                            @foreach ($bab->moduls as $modul)
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            @if ($modul->video)
                                                                <i class="icofont-video-alt mr-10px"></i>
                                                                <span class="font-medium">Video:</span>
                                                            @endif
                                                            {{ $modul->name }}
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p>
                                                        <div class="mt-3">
                                                            @if ($modul->modul_progress && $modul->modul_progress->status == 'selesai')
                                                                <span class="text-green-500" style="color: green">
                                                                    <i class="icofont-check-circled"></i>
                                                                </span>
                                                            @else
                                                                <span class="text-yellow-500" style="color: yellow">
                                                                    <i class="icofont-clock-time"></i>
                                                                </span>
                                                            @endif




                                                        </div>

                                                        </p>
                                                        <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $modul->slug]) }}"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Lanjutkan
                                                            </p>
                                                        </a>

                                                    </div>
                                                </li>
                                            @endforeach

                                            <!-- Loop untuk menampilkan quiz di dalam bab -->
                                            @foreach ($bab->quiz as $quiz)
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-question-circle mr-10px"></i>
                                                            <span class="font-medium">Quiz:</span>
                                                            {{ $quiz->name }}
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        @php
                                                            $startTime = \Carbon\Carbon::createFromFormat(
                                                                'H:i:s',
                                                                $quiz->start_time,
                                                            );
                                                            $endTime = \Carbon\Carbon::createFromFormat(
                                                                'H:i:s',
                                                                $quiz->end_time,
                                                            );

                                                            if ($endTime->lessThan($startTime)) {
                                                                $endTime->addDay();
                                                            }

                                                            $diff = $startTime->diff($endTime);
                                                            $hours = $diff->h;
                                                            $minutes = $diff->i;
                                                        @endphp

                                                        <p>
                                                            <i class="icofont-clock-time"></i>
                                                            {{ $hours > 0 ? $hours . ' jam ' : '' }}{{ $minutes }}
                                                            menit
                                                        </p>


                                                        <a href="{{ route('quiz.detail', ['course' => $courseRegistration->course->slug, 'modul' => $quiz->slug]) }}"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Take
                                                                Quiz
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        function submitCourseRegistration(courseId) {
            document.getElementById('course-id-input').value = courseId;

            var formData = new FormData(document.getElementById('course-registration-form'));

            fetch('{{ route('course-registrations.store') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = data.redirect_url;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert('Terjadi kesalahan, silakan coba lagi.');
                });
        }
    </script>
@endsection
