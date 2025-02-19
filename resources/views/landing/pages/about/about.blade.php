@extends('landing.layouts.landing-layouts')
@section('page_title', 'Tentang Kami | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Tentang Kami'])

    <section>
        <div class="container py-50px md:py-70px lg:py-20 2xl:py-100px">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-30px">
                <!-- about left -->
                <div data-aos="fade-up">
                    <div class="tilt relative overflow-hidden z-0">
                        <img class="absolute left-0 top-0 lg:top-4 right-0 mx-auto -z-1" src="assets/images/about/about_8.png"
                            alt=""><img class="w-full" src="{{ asset('storage/' . $halamanTentang->image) }}"
                            alt="">
                    </div>
                </div>
                <!-- about right -->
                <div data-aos="fade-up" class="2xl:ml-65px">
                    <span
                        class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                        Tentang Kami
                    </span>
                    <p class="text-sm md:text-base leading-7 text-contentColor dark:text-contentColor-dark mb-25px">
                        {!! $halamanTentang->deskripsi !!}
                    </p>
                    <div class="mt-30px">
                        <a href="#"
                            class="text-sm md:text-size-15 text-whiteColor bg-primaryColor border border-primaryColor px-25px py-15px hover:text-primaryColor hover:bg-whiteColor rounded inline-block mr-6px md:mr-30px dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                            Selengkapnya <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- overview section -->
    <section>
        <div class="container pb-50px md:pb-70px lg:pb-20 2xl:pb-70px">
            <!-- overview tabs -->
            <div data-aos="fade-up" class="tab">
                <div class="tab-links flex flex-wrap md:flex-nowrap mb-10px lg:mb-50px rounded gap-10px lg:gap-35px">
                    <button
                        class="is-checked relative py-10px px-25px md:py-10px md:px-10 lg:py-15px lg:px-60px font-bold uppercase text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 active">
                        Tentang
                    </button>

                    <button
                        class="is-checked relative py-10px px-25px md:py-10px md:px-10 lg:py-15px lg:px-60px font-bold uppercase text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300">
                        Kursus
                    </button>

                    <button
                        class="is-checked relative py-10px px-25px md:py-10px md:px-10 lg:py-15px lg:px-60px font-bold uppercase text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300">
                        Penghargaan
                    </button>

                    <button
                        class="is-checked relative py-10px px-25px md:py-10px md:px-10 lg:py-15px lg:px-60px font-bold uppercase text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300">
                        Pendidikan
                    </button>
                </div>
                <div class="tab-contents">
                    <div>
                        <p class="text-contentColor dark:text-contentColor-dark mb-25px">
                            {!! $tentang->deskripsi !!}
                        </p>
                    </div>

                    <div class="hidden">
                        <div class="flex flex-col gap-30px">
                            @foreach ($coursePopular as $item)
                            <div class="w-full group grid-item rounded">
                                <div class="tab-content-wrapper">
                                    <div
                                        class="p-15px lg:pr-30px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark flex flex-wrap md:flex-nowrap rounded">
                                        <!-- card image -->
                                        <div class="relative overflow-hidden w-full md:w-2/5">
                                            <a href="course.html" class="w-full">
                                                <img src="assets/images/grid/grid_1.png" alt=""
                                                    class="w-full transition-all duration-300 scale-105 group-hover:scale-110">
                                            </a>
                                            <div
                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                <div>
                                                    <p
                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold capitalize">
                                                        {{ $item->categories->name }}
                                                    </p>
                                                </div>
                                                <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                    href="#"><i class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                            </div>
                                        </div>
                                        <!-- card content -->
                                        <div class="w-full md:w-3/5">
                                            <div class="pl-0 md:pl-5 lg:pl-30px 2xl:pl-90px">
                                                <div class="grid grid-cols-2 mb-15px">
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm text-black dark:text-blackColor-dark">23
                                                                Lesson</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm text-black dark:text-blackColor-dark">1 hr
                                                                30 min</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="course-details.html"
                                                    class="text-xl 2xl:text-size-34 2xl:!leading-9 font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                    {{ $item->name }}
                                                </a>
                                                <!-- price -->
                                                <div class="text-lg font-semibold text-black-brerry-light font-inter mb-4">
                                                    $32.00
                                                    <del class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                    <span class="ml-6 text-base font-semibold text-greencolor2">Free.</span>
                                                </div>
                                                <!-- bottom -->
                                                <div
                                                    class="flex flex-wrap justify-between sm:flex-nowrap items-center gap-y-2 pt-15px border-t border-borderColor">
                                                    <!-- author and rating-->
                                                    <div class="flex items-center flex-wrap">
                                                        <div>
                                                            <a href="instructor-details.html"
                                                                class="text-sm font-medium font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                    class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                    src="assets/images/grid/grid_small_1.jpg"
                                                                    alt="">
                                                                <span class="flex">Micle john</span>
                                                            </a>
                                                        </div>
                                                        <div class="text-start md:text-end ml-35px">
                                                            <i class="icofont-star text-size-15 text-yellow"></i>
                                                            <i class="icofont-star text-size-15 text-yellow"></i>
                                                            <i class="icofont-star text-size-15 text-yellow"></i>
                                                            <i class="icofont-star text-size-15 text-yellow"></i>

                                                            <span class="text-xs text-lightGrey6">(44)</span>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <a class="text-sm lg:text-base text-blackColor hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"
                                                            href="course-details.html">Know Details
                                                            <i class="icofont-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- certifications  -->
                    <div class="hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-30px items-center">
                            <!-- card 1 -->
                            <div
                                class="flex flex-col sm:flex-row gap-x-0 sm:gap-x-10 gap-y-5 sm:gapy-y-0 group p-15px transition-all duration-300 shadow-experience bg-whiteColor hover:bg-primaryColor dark:bg-whiteColor-dark dark:hover:bg-whiteColor rounded">
                                <div>
                                    <img src="assets/images/about/award-1.jpg" alt=""
                                        class="w-full sm:w-48 md:w-40 lg:w-30 xl:w-148px 2xl:w-130px">
                                </div>
                                <div>
                                    <h4
                                        class="transition-all duration-300 text-contentColor group-hover:text-whiteColor dark:text-contentColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html"
                                            class="text-size-15 md:text-lg lg:text-xl 2xl:text-2xl font-semibold hover:text-secondaryColor mr-0 2xl:mr-10 mb-15px">Forging
                                            relationships between national</a>
                                    </h4>
                                    <div
                                        class="transition-all duration-300 text-blackColor group-hover:text-whiteColor dark:text-blackColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html" class="hover:text-secondaryColor">Read More <i
                                                class="icofont-simple-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- card 2 -->
                            <div
                                class="flex flex-col sm:flex-row gap-x-0 sm:gap-x-10 gap-y-5 sm:gapy-y-0 group p-15px transition-all duration-300 shadow-experience bg-whiteColor hover:bg-primaryColor dark:bg-whiteColor-dark dark:hover:bg-whiteColor rounded">
                                <div>
                                    <img src="assets/images/about/award-2.jpg" alt=""
                                        class="w-full sm:w-48 md:w-40 lg:w-30 xl:w-148px 2xl:w-130px">
                                </div>
                                <div>
                                    <h4
                                        class="transition-all duration-300 text-contentColor group-hover:text-whiteColor dark:text-contentColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html"
                                            class="text-size-15 md:text-lg lg:text-xl 2xl:text-2xl font-semibold hover:text-secondaryColor mr-0 2xl:mr-10 mb-15px">Lorem
                                            ipsum dolor sit amet conse ctetur.</a>
                                    </h4>
                                    <div
                                        class="transition-all duration-300 text-blackColor group-hover:text-whiteColor dark:text-blackColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html" class="hover:text-secondaryColor">Read More <i
                                                class="icofont-simple-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- card 3 -->
                            <div
                                class="flex flex-col sm:flex-row gap-x-0 sm:gap-x-10 gap-y-5 sm:gapy-y-0 group p-15px transition-all duration-300 shadow-experience bg-whiteColor hover:bg-primaryColor dark:bg-whiteColor-dark dark:hover:bg-whiteColor rounded">
                                <div>
                                    <img src="assets/images/about/award-3.jpg" alt=""
                                        class="w-full sm:w-48 md:w-40 lg:w-30 xl:w-148px 2xl:w-130px">
                                </div>
                                <div>
                                    <h4
                                        class="transition-all duration-300 text-contentColor group-hover:text-whiteColor dark:text-contentColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html"
                                            class="text-size-15 md:text-lg lg:text-xl 2xl:text-2xl font-semibold hover:text-secondaryColor mr-0 2xl:mr-10 mb-15px">Forging
                                            relationships between national</a>
                                    </h4>
                                    <div
                                        class="transition-all duration-300 text-blackColor group-hover:text-whiteColor dark:text-blackColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html" class="hover:text-secondaryColor">Read More <i
                                                class="icofont-simple-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- card 4 -->
                            <div
                                class="flex flex-col sm:flex-row gap-x-0 sm:gap-x-10 gap-y-5 sm:gapy-y-0 group p-15px transition-all duration-300 shadow-experience bg-whiteColor hover:bg-primaryColor dark:bg-whiteColor-dark dark:hover:bg-whiteColor rounded">
                                <div>
                                    <img src="assets/images/about/award-4.jpg" alt=""
                                        class="w-full sm:w-48 md:w-40 lg:w-30 xl:w-148px 2xl:w-130px">
                                </div>
                                <div>
                                    <h4
                                        class="transition-all duration-300 text-contentColor group-hover:text-whiteColor dark:text-contentColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html"
                                            class="text-size-15 md:text-lg lg:text-xl 2xl:text-2xl font-semibold hover:text-secondaryColor mr-0 2xl:mr-10 mb-15px">
                                            Lorem ipsum dolor sit amet conse ctetur.</a>
                                    </h4>
                                    <div
                                        class="transition-all duration-300 text-blackColor group-hover:text-whiteColor dark:text-blackColor-dark dark:group-hover:text-whiteColor-dark">
                                        <a href="event-details.html" class="hover:text-secondaryColor">Read More <i
                                                class="icofont-simple-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <p class="text-contentColor dark:text-contentColor-dark mb-25px"></p>
                        <h4
                            class="text-xl font-medium text-blackColor dark:text-blackCol font-thinor-dark dark:text-blackColor-dark">
                            World best education site - (Computer engeenering)
                        </h4>
                        <p class="text-contentColor dark:text-contentColor-dark mb-25px">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some
                            form, by injected humour, or randomised words which dont look
                            even slightly believable. If you are going to useery
                        </p>
                        <h4
                            class="text-xl font-medium text-blackColor dark:text-blackCol font-thinor-dark dark:text-blackColor-dark">
                            Web and user interface design - Development
                        </h4>
                        <p class="text-contentColor dark:text-contentColor-dark mb-30px">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some
                            form, by injected humour, or randomised words which dont look
                            even slightly believable. If you are going to useery
                        </p>

                        <h4
                            class="text-xl font-medium text-blackColor dark:text-blackCol font-thinor-dark dark:text-blackColor-dark">
                            Interaction design - Animation
                        </h4>
                        <p class="text-contentColor dark:text-contentColor-dark mb-30px">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some
                            form, by injected humour, or randomised words which dont look
                            even slightly believable. If you are going to useery
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured section -->
    <section>
        <div class="pb-100px">
            <div class="container">
                <!-- heading -->
                <div data-aos="fade-up">
                    <span
                        class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                        Kursus Populer
                    </span>
                    <h3 class="text-3xl md:text-[35px] lg:text-size-42 leading-[45px] 2xl:leading-[45px] md:leading-[50px] font-bold mb-5 md:mb-10 text-blackColor dark:text-blackColor-dark"
                        data-aos="fade-up">
                        Pilih Paket Terbaik
                        <br>
                        Untuk Pembelajaran Anda
                    </h3>
                </div>

                <!-- featured cards -->

                <div data-aos="fade-up" class="sm:-mx-15px">
                    <!-- Swiper -->
                    <div class="swiper featured-courses1">
                        <div class="swiper-wrapper">
                            <!-- card 1 -->
                            @if ($course->count())
                                @foreach ($course as $item)
                                    <div class="swiper-slide">
                                        <div class="w-full group grid-item filter1 filter3">
                                            <div class="tab-content-wrapper sm:px-15px mb-30px">
                                                <div
                                                    class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                    <!-- card image -->
                                                    <div class="relative mb-4">
                                                        <a href="{{ route('course.detail', $item->slug) }}"
                                                            class="w-full overflow-hidden rounded">
                                                            <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                                alt=""
                                                                class="w-full transition-all duration-300 group-hover:scale-110">
                                                        </a>
                                                        <div
                                                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                            <div>
                                                                <p
                                                                    class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                                                    {{ $item->categories->name }}
                                                                </p>
                                                            </div>
                                                            <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                href="#"><i
                                                                    class="icofont-heart-alt text-base py-1 px-2"></i></a>
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
                                                                    <span
                                                                        class="text-sm text-black dark:text-blackColor-dark">{{ $item->babs->sum(function ($bab) {
                                                                            return $bab->moduls->count();
                                                                        }) }}
                                                                        Modul</span>
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center">
                                                                <div>
                                                                    <i
                                                                        class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="text-sm text-black dark:text-blackColor-dark">{{ $item->tanggal_mulai }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('course.detail', $item->slug) }}"
                                                            class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                            {{ \Illuminate\Support\Str::limit($item->name, 40, '...') }}
                                                        </a>
                                                        <!-- price -->
                                                        <div
                                                        class="text-lg font-semibold text-black-brerry-light font-inter mb-4">
                                                        @if ($item->harga_diskon)
                                                            <!-- Menampilkan harga setelah diskon -->
                                                            Rp
                                                            {{ number_format($item->harga - $item->harga_diskon, 2, ',', '.') }}
                                                            <del class="text-sm text-lightGrey4 font-semibold">/
                                                                / Rp
                                                                {{ number_format($item->harga, 2, ',', '.') }}</del>
                                                        @else
                                                            <!-- Menampilkan harga asli jika tidak ada diskon -->
                                                            Rp {{ number_format($item->harga, 2, ',', '.') }}
                                                        @endif

                                                        @if ($item->harga - $item->harga_diskon > 0)
                                                            <!-- Jika harga setelah diskon lebih besar dari nol -->
                                                            <del
                                                                class="ml-6 text-base font-semibold text-deepred">Free.</del>
                                                        @else
                                                            <span
                                                                class="ml-6 text-base font-semibold text-greencolor2">Free.</span>
                                                        @endif
                                                    </div>
                                                        <!-- author and rating-->
                                                        <div
                                                            class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                            <div>
                                                                <a href="instructor-details.html"
                                                                    class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                        class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                        src="assets/images/grid/grid_small_1.jpg"
                                                                        alt="">
                                                                    <span class="flex">{{ $item->instrukturs->name }}</span>
                                                                </a>
                                                            </div>
                                                            <div class="text-start md:text-end">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i
                                                                        class="icofont-star text-size-10 {{ $i <= min($item->average_rating, 5) ? 'text-yellow' : 'text-gray' }}"></i>
                                                                @endfor
                  
                                                                <span class="text-xs text-lightGrey6">
                                                                    ({{ $item->total_feedbacks }} reviews)
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <!-- Pesan jika tidak ada kursus ditemukan -->
                                <div
                                    class="coll-span-full text-center py-10 bg-lightGrey dark:bg-darkdeep3-dark text-xl font-semibold text-primaryColor">
                                    Kursus tidak ditemukan untuk pencarian ini.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section-->
    <section
        class="bg-lightGrey10 dark:bg-lightGrey10-dark relative py-50px md:py-70px lg:py-20 2xl:pt-100px 2xl:pb-110px">
        <div class="container">
            <!-- courses Heading -->
            <div class="mb-5 md:mb-10" data-aos="fade-up">
                <div class="text-center">
                    <span
                        class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                        Testimonial
                    </span>
                </div>

                <h3
                    class="text-3xl md:text-[35px] lg:text-size-38 3xl:text-size-42 leading-10 mf:leading-45px 2xl:leading-50px 3xl:leading-2xl font-bold text-blackColor dark:text-blackColor-dark text-center">
                    Testimoni
                    <span
                        class="relative after:w-full after:h-[7px] z-0 after:bg-secondaryColor after:absolute after:left-0 after:bottom-3 md:after:bottom-5 after:z-[-1]">Klien</span>
                </h3>
            </div>
            <!-- testimonial slider -->
            <div class="testimonial -mx-15px relative bg-lightGrey10 dark:bg-lightGrey10-dark" data-aos="fade-up">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- testimonial 1 -->
                        @foreach ($testimonial as $testimoni)
                            <div class="swiper-slide px-15px">
                                <div
                                    class="p-5 md:p-10 md:pr-50px md:pb-50px bg-whiteColor dark:bg-whiteColor-dark rounded">
                                    <div class="flex justify-between items-center mb-15px lg:mb-30px">
                                        <div class="flex items-center gap-5">
                                            <div>
                                                <img src="{{ asset('storage/' . $testimoni->image) }}"
                                                    alt="{{ $testimoni->name }}" class="w-58px h-58px rounded-full">
                                            </div>

                                            <div>
                                                <h5
                                                    class="text-lg md:text-size-22 text-blackColor dark:text-blackColor-dark font-semibold pb-1">
                                                    {{ $testimoni->name }}
                                                </h5>
                                                <p class="text-sm text-lightGrey9">{{ $testimoni->profession }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-contentColor dark:text-contentColor-dark">
                                            {!! $testimoni->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next translate-x-2 md:translate-x-8 3xl:translate-x-12"></div>
                    <div class="swiper-button-prev -translate-x-2 md:-translate-x-8 3xl:-translate-x-12"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Barnds Section-->
    <section class="bg-lightGrey10 dark:bg-lightGrey10-dark">
        <div class="container pb-60px">
            <!-- Brands Heading -->
            <div class="mb-5 md:mb-10" data-aos="fade-up">
                <h3
                    class="text-3xl md:text-[35px] lg:text-size-38 3xl:text-size-42 leading-10 mf:leading-45px 2xl:leading-50px 3xl:leading-2xl font-bold text-blackColor dark:text-blackColor-dark text-center">
                    Telah dipercaya
                    <span
                        class="relative after:w-full after:h-[7px] z-0 after:bg-secondaryColor after:absolute after:left-0 after:bottom-3 md:after:bottom-5 after:z-[-1]">oleh</span>
                </h3>
            </div>
            <!-- brands -->
            <div class="flex flex-wrap justify-center">
                @foreach ($klien as $client)
                    <div class="basis-1/2 md:basis-1/4 lg:basis-1/5" data-aos="fade-up">
                        <a href="{{ $client->url }}" class="pt-25px pb-45px text-center w-full flex justify-center">
                            <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
