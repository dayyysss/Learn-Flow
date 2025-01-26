@extends('dashboard.layouts.layouts')

@section('page_title', 'LearnFlow | Kelas Belajar')

@section('content')
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- Courses Area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- Heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    {{ $courseRegistration->course->name }}
                </h2>
            </div>

            <div>
                <div class="transition-all duration-300">
                    <div class="flex flex-col gap-30px">
                        <!-- Course Card -->
                        <div class="group course-item"
                            data-status="{{ $courseRegistration->status == 'confirm' ? 'enrolled' : ($courseRegistration->progress < 100 ? 'active' : 'completed') }}"
                            data-progress="{{ $courseRegistration->progress }}">
                            <div class="tab-content-wrapper" data-aos="fade-up">
                                <div
                                    class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                    <!-- Card Content -->
                                    <div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 pt-15px">
                                            <!-- Instructor Info -->
                                            <div>
                                                <a href="instructor-details.html"
                                                    class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                                    {{ $courseRegistration->course->name ?? 'Instruktur Tidak Tersedia' }}
                                                </a>
                                                <div>
                                                    {!! Str::limit($courseRegistration->course->deskripsi, 100, '...') !!}
                                                </div>
                                            </div>

                                            <!-- Course Link -->
                                            <div
                                                class="text-start md:text-end flex flex-col items-start md:items-end gap-3">
                                                @if ($nextProsesModul)
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $nextProsesModul->modul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3">
                                                        Lanjutkan
                                                    </a>
                                                @elseif ($lastAccessedModul)
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $lastAccessedModul->modul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3">
                                                        Lanjutkan
                                                    </a>
                                                @else
                                                    <a href="{{ route('modul.detail', ['course' => $courseRegistration->course->slug, 'modul' => $firstModul->slug]) }}"
                                                        class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3">
                                                        Mulai Belajar
                                                    </a>
                                                @endif
                                                <a href="{{ route('showCourseRegistration', ['course_slug' => $courseRegistration->course->slug]) }}"
                                                    class="inline-flex items-center gap-1 text-sm font-bold text-primaryColor hover:text-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mt-3">
                                                    Unduh Sertifikat
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Progress Bar -->
                                        {{-- <div class="mt-3">
                                            <div class="mt-1 text-xs text-primaryColor dark:text-primaryColor-dark">
                                                {{ $courseRegistration->progress }}%
                                            </div>
                                            <div class="h-1 bg-primaryColor" style="width: {{ $courseRegistration->progress }}%;"></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Course Card -->





                    </div>
                </div>
            </div>
        </div>
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <p class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                <span data-countup-number=""></span><span></span>
            </p>
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
                                                            @if ($courseRegistration->progress == 100)
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
