@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | My Courses')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- courses area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Courses
                </h2>
            </div>
            <div class="tab">
                <div class="tab-links flex flex-wrap mb-10px lg:mb-50px rounded gap-10px">
                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap active">
                        PUBLISH
                    </button>

                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap">
                        PENDING
                    </button>

                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap">
                        DRAFT
                    </button>
                </div>
                <div class="tab-contents">
                    <div class="transition-all duration-300">
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                            <!-- card 2 -->
                            @foreach ($courses_publik as $item_publik)
                                <div class="group">
                                    <div class="tab-content-wrapper" data-aos="fade-up">
                                        <div
                                            class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                            <!-- card image -->
                                            <div class="relative mb-4">
                                                <a href="{{ route('course.detail', $item_publik->slug) }}"
                                                    class="w-full overflow-hidden rounded">
                                                    <img src="{{ asset('storage/' . $item_publik->thumbnail) }}"
                                                        alt=""
                                                        class="w-full transition-all duration-300 group-hover:scale-110"
                                                        style="height: 150px" s>
                                                </a>
                                                <div
                                                    class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                    <div>
                                                        <p
                                                            class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                            {{ $item_publik->categories->name ?? 'No Category' }}
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
                                                            <span class="text-sm text-black dark:text-blackColor-dark">
                                                                {{ $item_publik->babs->sum(function ($bab) {
                                                                    return $bab->moduls->count();
                                                                }) }}
                                                            </span> modul
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="text-sm text-black dark:text-blackColor-dark">{{ $item_publik->tanggal_mulai }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('course.detail', $item_publik->slug) }}"
                                                    class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                    {{ $item_publik->name }}
                                                </a>
                                                <!-- price -->
                                                <div class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                    @if ($item_publik->harga_diskon)
                                                        <!-- Menampilkan harga setelah diskon -->
                                                        Rp
                                                        {{ number_format($item_publik->harga - $item_publik->harga_diskon, 2, ',', '.') }}
                                                        <del class="text-sm text-lightGrey4 font-semibold">
                                                            / Rp {{ number_format($item_publik->harga, 2, ',', '.') }}
                                                        </del>
                                                    @else
                                                        <!-- Menampilkan harga asli jika tidak ada diskon -->
                                                        Rp {{ number_format($item_publik->harga, 2, ',', '.') }}
                                                    @endif

                                                    <span class="ml-6">
                                                        @if ($item_publik->harga - $item_publik->harga_diskon > 0)
                                                            <!-- Jika harga setelah diskon lebih besar dari nol -->
                                                            <del class="text-base font-semibold text-greencolor">Free</del>
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
                                                        <a href="instructor-details.html"
                                                            class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                src="{{ $item_publik->instrukturs->image ? Storage::url($item_publik->instrukturs->image) : asset('assets/images/grid/grid_small_2.jpg') }}"
                                                                alt="{{ $item_publik->instrukturs->name }}">
                                                            {{ $item_publik->instrukturs->name }}
                                                        </a>
                                                    </div>
                                                    <div class="text-start md:text-end">
                                                        <div>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                        </div>
                                                        <span class="text-xs text-lightGrey6">(44)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="hidden transition-all duration-300">
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                            <!-- card 1 -->
                            @foreach ($courses_terjadwal as $item_terjadwal)
                                <div class="group">
                                    <div class="tab-content-wrapper" data-aos="fade-up">
                                        <div
                                            class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                            <!-- card image -->
                                            <div class="relative mb-4">
                                                <a href="{{ route('course.detail', $item_terjadwal->slug) }}"
                                                    class="w-full overflow-hidden rounded">
                                                    <img src="{{ asset('storage/' . $item_terjadwal->thumbnail) }}"
                                                        alt=""
                                                        class="w-full transition-all duration-300 group-hover:scale-110"
                                                        style="height: 150px" s>
                                                </a>
                                                <div
                                                    class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                    <div>
                                                        <p
                                                            class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                            {{ $item_terjadwal->categories->name ?? 'No Category' }}
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
                                                            <span class="text-sm text-black dark:text-blackColor-dark">
                                                                {{ $item_terjadwal->babs->sum(function ($bab) {
                                                                    return $bab->moduls->count();
                                                                }) }}
                                                            </span> modul
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="text-sm text-black dark:text-blackColor-dark">{{ $item_terjadwal->tanggal_mulai }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('course.detail', $item_terjadwal->slug) }}"
                                                    class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                    {{ $item_terjadwal->name }}
                                                </a>
                                                <!-- price -->
                                                <div class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                    @if ($item_terjadwal->harga_diskon)
                                                        <!-- Menampilkan harga setelah diskon -->
                                                        Rp
                                                        {{ number_format($item_terjadwal->harga - $item_terjadwal->harga_diskon, 2, ',', '.') }}
                                                        <del class="text-sm text-lightGrey4 font-semibold">
                                                            / Rp {{ number_format($item_terjadwal->harga, 2, ',', '.') }}
                                                        </del>
                                                    @else
                                                        <!-- Menampilkan harga asli jika tidak ada diskon -->
                                                        Rp {{ number_format($item_terjadwal->harga, 2, ',', '.') }}
                                                    @endif

                                                    <span class="ml-6">
                                                        @if ($item_terjadwal->harga - $item_terjadwal->harga_diskon > 0)
                                                            <!-- Jika harga setelah diskon lebih besar dari nol -->
                                                            <del class="text-base font-semibold text-greencolor">Free</del>
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
                                                        <a href="instructor-details.html"
                                                            class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                src="{{ $item_terjadwal->instrukturs->image ? Storage::url($item_terjadwal->instrukturs->image) : asset('assets/images/grid/grid_small_2.jpg') }}"
                                                                alt="{{ $item_terjadwal->instrukturs->name }}">
                                                            {{ $item_terjadwal->instrukturs->name }}
                                                        </a>
                                                    </div>
                                                    <div class="text-start md:text-end">
                                                        <div>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                        </div>
                                                        <span class="text-xs text-lightGrey6">(44)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="hidden transition-all duration-300">
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                            <!-- card 1 -->
                            @foreach ($courses_draft as $item_draft)
                                <div class="group">
                                    <div class="tab-content-wrapper" data-aos="fade-up">
                                        <div
                                            class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                            <!-- card image -->
                                            <div class="relative mb-4">
                                                <a href="{{ route('course.detail', $item_draft->slug) }}"
                                                    class="w-full overflow-hidden rounded">
                                                    <img src="{{ asset('storage/' . $item_draft->thumbnail) }}"
                                                        alt=""
                                                        class="w-full transition-all duration-300 group-hover:scale-110"
                                                        style="height: 150px" s>
                                                </a>
                                                <div
                                                    class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                    <div>
                                                        <p
                                                            class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                            {{ $item_draft->categories->name ?? 'No Category' }}
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
                                                            <span class="text-sm text-black dark:text-blackColor-dark">
                                                                {{ $item_draft->babs->sum(function ($bab) {
                                                                    return $bab->moduls->count();
                                                                }) }}
                                                            </span> modul
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <div>
                                                            <i
                                                                class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="text-sm text-black dark:text-blackColor-dark">{{ $item_draft->tanggal_mulai }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('course.detail', $item_draft->slug) }}"
                                                    class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                    {{ $item_draft->name }}
                                                </a>
                                                <!-- price -->
                                                <div class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                    @if ($item_draft->harga_diskon)
                                                        <!-- Menampilkan harga setelah diskon -->
                                                        Rp
                                                        {{ number_format($item_draft->harga - $item_draft->harga_diskon, 2, ',', '.') }}
                                                        <del class="text-sm text-lightGrey4 font-semibold">
                                                            / Rp {{ number_format($item_draft->harga, 2, ',', '.') }}
                                                        </del>
                                                    @else
                                                        <!-- Menampilkan harga asli jika tidak ada diskon -->
                                                        Rp {{ number_format($item_draft->harga, 2, ',', '.') }}
                                                    @endif

                                                    <span class="ml-6">
                                                        @if ($item_draft->harga - $item_draft->harga_diskon > 0)
                                                            <!-- Jika harga setelah diskon lebih besar dari nol -->
                                                            <del class="text-base font-semibold text-greencolor">Free</del>
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
                                                        <a href="instructor-details.html"
                                                            class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                src="{{ $item_draft->instrukturs->image ? Storage::url($item_draft->instrukturs->image) : asset('assets/images/grid/grid_small_2.jpg') }}"
                                                                alt="{{ $item_draft->instrukturs->name }}">
                                                            {{ $item_draft->instrukturs->name }}
                                                        </a>
                                                    </div>
                                                    <div class="text-start md:text-end">
                                                        <div>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                            <i class="icofont-star text-size-10 text-yellow"></i>
                                                        </div>
                                                        <span class="text-xs text-lightGrey6">(44)</span>
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
@endsection
