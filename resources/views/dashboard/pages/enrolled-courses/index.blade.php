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
                    My Profile
                </h2>
            </div>
            <div class="tab">
                <div class="tab-links flex flex-wrap mb-10px lg:mb-50px rounded gap-10px">
                    <button
                        class="relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap is-checked"
                        data-filter="enrolled">
                        ENROLLED COURSES
                    </button>

                    <button
                        class="relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap"
                        data-filter="active">
                        ACTIVE COURSES
                    </button>

                    <button
                        class="relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap"
                        data-filter="completed">
                        COMPLETED COURSES
                    </button>
                </div>
                <div class="tab-contents">
                    <div class="transition-all duration-300">
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                            <!-- card 1 -->
                            @foreach ($registrations as $item)
                                <div class="group course-item"
                                    data-status="{{ $item->status == 'confirm' ? 'enrolled' : ($item->progress >= 0 && $item->progress < 100 ? 'active' : ($item->progress == 100 ? 'completed' : '')) }}"
                                    data-progress="{{ $item->progress }}">
                                    <div class="tab-content-wrapper" data-aos="fade-up">
                                        <div
                                            class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                            <!-- card image -->
                                            <div class="relative mb-4">
                                                <a href="../../course-details.html" class="w-full overflow-hidden rounded">
                                                    <img src="{{ asset('storage/' . $item->course->thumbnail) }}"
                                                        alt=""
                                                        class="w-full transition-all duration-300 group-hover:scale-110"
                                                        style="height: 150px">
                                                </a>
                                                <div
                                                    class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                    <div>
                                                        <p
                                                            class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                            {{ $item->course->categories->name ?? 'No Category' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card content -->
                                            <div>
                                                <div class="grid grid-cols-2 mb-15px">
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm text-black dark:text-blackColor-dark">
                                                                {{ $item->course->babs->sum(function ($bab) {return $bab->moduls->count();}) }}
                                                                modul
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="text-sm text-black dark:text-blackColor-dark">{{ $item->course->tanggal_mulai }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="../../course-details.html"
                                                    class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                    {{ $item->course->name }}
                                                </a>
                                                <div class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                    @if ($item->course->harga_diskon)
                                                        Rp
                                                        {{ number_format($item->course->harga - $item->course->harga_diskon, 2, ',', '.') }}
                                                        <del class="text-sm text-lightGrey4 font-semibold">/ Rp
                                                            {{ number_format($item->course->harga, 2, ',', '.') }}</del>
                                                    @else
                                                        Rp {{ number_format($item->course->harga, 2, ',', '.') }}
                                                    @endif
                                                    <span class="ml-6">
                                                        @if ($item->course->harga_diskon > 0)
                                                            <del class="text-base font-semibold text-greencolor">Free</del>
                                                        @else
                                                            <span
                                                                class="text-base font-semibold text-greencolor">Free</span>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div
                                                    class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                    <div>
                                                        <a href="instructor-details.html"
                                                            class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                                            <img class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                src="{{ $item->course->instrukturs->image ? Storage::url($item->course->instrukturs->image) : asset('assets/images/grid/grid_small_2.jpg') }}"
                                                                alt="{{ $item->course->instrukturs->name }}">
                                                            {{ $item->course->instrukturs->name ?? 'Instruktur tidak tersedia' }}
                                                        </a>
                                                    </div>
                                                    <div class="text-start md:text-end">
                                                        <i class="icofont-star text-size-15 text-yellow"></i>
                                                        <i class="icofont-star text-size-15 text-yellow"></i>
                                                        <i class="icofont-star text-size-15 text-yellow"></i>
                                                        <i class="icofont-star text-size-15 text-yellow"></i>
                                                        <i class="icofont-star text-size-15 text-yellow"></i>
                                                        <span class="text-xs text-lightGrey6">(44)</span>
                                                    </div>
                                                </div>
                                                <!-- progress bar -->
                                                <div class="h-25px w-full bg-blue-x-light rounded-md relative mt-5 mb-15px">
                                                    <div class="bg-primaryColor h-full text-center text-whiteColor leading-6"
                                                        style="width: {{ $item->progress }}%">
                                                        <span class="text-size-10 block leading-25px">
                                                            {{ $item->progress }}%
                                                            {{ $item->progress == 100 ? 'Complete' : '' }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="create-course.html"
                                                        class="text-size-15 text-whiteColor bg-secondaryColor w-full px-25px py-10px border border-secondaryColor hover:text-secondaryColor hover:bg-whiteColor rounded group text-nowrap text-center">
                                                        Download Certificate
                                                    </a>
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
