@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Enrolled Courses')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- courses area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Kursus Terdaftar
                </h2>
            </div>
            <div class="tab">
                <div class="tab-links flex flex-wrap mb-10px lg:mb-50px rounded gap-10px">
                    <button
                        class="relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap is-checked"
                        data-filter="enrolled">
                        Kursus yang diikuti
                    </button>



                    <button
                        class="relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap"
                        data-filter="completed">
                        Kursus yang diSelesaikan
                    </button>
                </div>
                <div class="tab-contents">
                    <div class="transition-all duration-300">
                        <div class="flex flex-col gap-30px">
                            <!-- card 1 -->
                            @foreach ($enrolledcourses as $item)
                                <div class="group course-item"
                                    data-status="{{ $item->status == 'confirm' ? 'enrolled' : ($item->progress >= 0 && $item->progress < 100 ? 'active' : ($item->progress == 100 ? 'completed' : '')) }}"
                                    data-progress="{{ $item->progress }}">
                                    <div class="tab-content-wrapper" data-aos="fade-up">
                                        <div
                                            class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                            <!-- card image -->

                                            <!-- card content -->
                                            <div>
                                                <div class="grid grid-cols-1 md:grid-cols-2 pt-15px">
                                                    <div>
                                                        <a href="instructor-details.html"
                                                            class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                                            <img class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                src="{{ $item->course->instrukturs->image ? Storage::url($item->course->instrukturs->image) : asset('assets/images/grid/grid_small_2.jpg') }}"
                                                                alt="{{ $item->name }}">
                                                            {{ $item->course->name }}
                                                        </a>
                                                    </div>
                                                    <div class="text-start md:text-end h-fit w-fit">
                                                        <div>
                                                            <a href="{{ route('showCourseRegistration', $item->course->slug) }}" 
                                                                class="inline-flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mb-3">
                                                                Masuk Kelas
                                                            </a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <!-- progress bar with dynamic border bottom -->
                                                <div class="mt-3">
                                                    <div class="mt-1 text-xs text-primaryColor dark:text-primaryColor-dark">
                                                        {{ $item->progress }}%
                                                    </div>
                                                    <div class="h-1 bg-primaryColor" style="width: {{ $item->progress }}%">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil semua tombol kategori
            const buttons = document.querySelectorAll('.tab-links button');

            // Ambil semua kursus
            const courses = document.querySelectorAll('.course-item');

            // Fungsi untuk menyaring kursus berdasarkan kategori
            function filterCourses(status) {
                courses.forEach(course => {
                    if (status === 'enrolled') {
                        course.style.display = 'block';
                    } else if (course.getAttribute('data-status') === status) {
                        course.style.display = 'block';
                    } else {
                        course.style.display = 'none';
                    }
                });
            }

            // Set event listener untuk setiap kategori button
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const status = this.getAttribute('data-filter');

                    // Pilih tombol yang aktif
                    buttons.forEach(b => b.classList.remove('is-checked'));
                    this.classList.add('is-checked');

                    // Filter kursus berdasarkan kategori yang dipilih
                    filterCourses(status);
                });
            });

            filterCourses('enrolled');
        });
    </script>
@endsection
