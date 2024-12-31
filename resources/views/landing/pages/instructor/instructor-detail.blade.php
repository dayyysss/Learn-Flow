@extends('landing.layouts.landing-layouts')
@section('page_title', 'Instruktur Detail | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Instruktur Detail'])
    <section class="py-100px">
        <div class="container">
            <!-- about section  -->
            <div class="grid grid-cols-1 lg:grid-cols-12 pt-30px gap-x-30px">
                <!-- about left -->
                <div class="lg:col-start-1 lg:col-span-4 relative z-0 mb-30px lg:mb-0 pb-0 md:pb-30px xl:pb-0 overflow-visible"
                    data-aos="fade-up">
                    <div class="tilt">
                        <img src="{{asset('assets/images/team/team__4.png')}}" alt="" class="w-full">

                        <img class="absolute top-0 left-[-30px] animate-move-hor z-[-1]"
                            src="{{asset('assets/images/about/about_4.png')}}" alt="">
                    </div>
                </div>
                <!-- about right -->
                <div data-aos="fade-up" class="lg:col-start-5 lg:col-span-8">
                    <div class="flex justify-between items-center flex-wrap md:flex-nowrap">
                        <div>
                            <h3
                                class="text-size-25 md:text-size-40 lg:text-3xl 2xl:text-size-40 leading-34px md:leading-13.5 lg:leading-11 2xl:leading-13.5 font-bold text-blackColor dark:text-blackColor-dark capitalize">
                                {{$instrukturs->first_name . ' ' . $instrukturs->last_name}}

                            </h3>
                            <p class="text-sm md:text-base leading-7 text-contentColor dark:text-contentColor-dark capitalize">
                               {{$instrukturs->profesi}}
                            </p>
                        </div>
                        <div>
                            <p class="text-blackColor dark:text-blackColor-dark">
                                Review:
                            </p>
                            <div>
                                <i class="icofont-star text-size-15 text-yellow"></i>
                                <i class="icofont-star text-size-15 text-yellow"></i>
                                <i class="icofont-star text-size-15 text-yellow"></i>
                                <i class="icofont-star text-size-15 text-yellow"></i>
                                <i class="icofont-star text-size-15 text-yellow"></i>
                                <span class="text-xs text-lightGrey6">(44)</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-blackColor dark:text-blackColor-dark">
                                Follow Us:
                            </p>
                            <ul class="flex gap-13px text-base text-contentColor dark:text-contentColor-dark">
                                @if (!empty($instrukturs->sosial_media))  <!-- Cek jika sosial_media ada -->
                                    @foreach ($instrukturs->sosial_media as $platform => $url)
                                        @if (!empty($url))
                                            <li>
                                                <a class="hover:text-primaryColor" href="{{ $url }}">
                                                    @php
                                                        $icons = [
                                                            'facebook' => 'icofont-facebook',
                                                            'twitter' => 'icofont-twitter',
                                                            'linkedin' => 'icofont-linkedin',
                                                            'website' => 'icofont-web',
                                                            'github' => 'icofont-github',
                                                        ];
                                                        $iconClass = $icons[$platform] ?? 'icofont-link'; // Tentukan ikon berdasarkan platform
                                                    @endphp
                                                    <i class="{{ $iconClass }}"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                            
                        </div>
                        <div>
                            <a href="#"
                                class="text-sm md:text-size-15 text-whiteColor bg-primaryColor border border-primaryColor px-10 py-10px hover:text-primaryColor hover:bg-whiteColor rounded inline-block dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                Follow
                            </a>
                        </div>
                    </div>

                    <div class="pt-7 mt-30px border-t border-borderColor dark:border-borderColor-dark">
                        <h4 class="text-xl text-blackColor dark:text-blackColor-dark font-semibold mb-1">
                            Short Bio
                        </h4>
                        <p class="leading-7 text-contentColor dark:text-contentColor-dark">
                            {{$instrukturs->bio}}
                        </p>
                    </div>

                    <!-- other courses -->
                    <div class="mt-10" data-aos="fade-up">
                        <!-- other courses heading -->
                        <div class="mb-10px">
                            <h4 class="text-3xl font-bold text-blackColor dark:text-blackColor-dark leading-1.2">
                                Online Course
                            </h4>
                        </div>
                        <div data-aos="fade-up" class="sm:-mx-15px">
                            <!-- Swiper -->
                            <div class="swiper other-courses">
                                <div class="swiper-wrapper">
                                    <!-- card 1 -->
                                    @foreach ($relatedCourses as $relatedCourse)
                                    <div class="swiper-slide">
                                        <div class="w-full group grid-item filter1 filter3">
                                            <div class="tab-content-wrapper sm:px-15px mb-30px">
                                                <div
                                                    class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                    <!-- card image -->
                                                    <div class="relative mb-4 overflow-hidden">
                                                        <a href="" class="w-full">
                                                            <img src="{{ asset('storage/' . $relatedCourse->thumbnail) }}"
                                                                alt=""
                                                                class="w-full transition-all duration-300 group-hover:scale-110"
                                                                style="height: 200px">
                                                        </a>
                                                        <div
                                                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                            <div>
                                                                <p
                                                                    class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                                                    {{ $relatedCourse->categories->name }}
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
                                                                        class="text-sm text-black dark:text-blackColor-dark">

                                                                        {{ $relatedCourse->babs->sum(function ($bab) {
                                                                            return $bab->moduls->count();
                                                                        }) }}
                                                                        Modul
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
                                                                        class="text-sm text-black dark:text-blackColor-dark">
                                                                        {{ \Carbon\Carbon::parse($relatedCourse->tanggal_mulai)->format('d M Y') }}
                                                                    </span>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href=""
                                                            class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                            {{ $relatedCourse->name }}
                                                        </a>
                                                        <!-- price -->
                                                        <div
                                                            class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                            @if ($relatedCourse->harga_diskon)
                                                                <!-- Menampilkan harga setelah diskon -->
                                                                Rp
                                                                {{ number_format($relatedCourse->harga - $relatedCourse->harga_diskon, 2, ',', '.') }}
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">
                                                                    / Rp
                                                                    {{ number_format($relatedCourse->harga, 2, ',', '.') }}
                                                                </del>
                                                            @else
                                                                <!-- Menampilkan harga asli jika tidak ada diskon -->
                                                                Rp
                                                                {{ number_format($item->harga, 2, ',', '.') }}
                                                            @endif

                                                            <span class="ml-6">
                                                                @if ($relatedCourse->harga - $relatedCourse->harga_diskon > 0)
                                                                    <!-- Jika harga setelah diskon lebih besar dari nol -->
                                                                    <del
                                                                        class="text-base font-semibold text-deepred">Free</del>
                                                                @else
                                                                    <span
                                                                        class="text-base font-semibold text-greencolor">Free</span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <!-- author and rating-->
                                                        <div
                                                            class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                            <div>
                                                                <a href=""
                                                                    class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                                                    <img class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                        src="{{ asset('assets/images/grid/grid_small_1.jpg') }}"
                                                                        alt="">
                                                                    <span
                                                                        class="flex">{{ $relatedCourse->instrukturs->name }}</span>
                                                                </a>
                                                            </div>
                                                            <div class="text-start md:text-end">
                                                                <i
                                                                    class="icofont-star text-size-15 text-yellow"></i>
                                                                <i
                                                                    class="icofont-star text-size-15 text-yellow"></i>
                                                                <i
                                                                    class="icofont-star text-size-15 text-yellow"></i>
                                                                <i
                                                                    class="icofont-star text-size-15 text-yellow"></i>
                                                                <i
                                                                    class="icofont-star text-size-15 text-yellow"></i>
                                                                <span
                                                                    class="text-xs text-lightGrey6">(44)</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
