@extends('landing.layouts.landing-layouts')
@section('page_title', 'Kursus | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Kursus'])


    <!-- courses section -->
    <div>
        <div class="container tab py-10 md:py-50px lg:py-60px 2xl:py-100px">
            <!-- courses header -->
            <div class="courses-header flex justify-between items-center flex-wrap px-13px py-10px border border-borderColor dark:border-borderColor-dark mb-30px gap-y-5"
                data-aos="fade-up">
                <div>
                    <p class="text-blackColor dark:text-blackColor-dark">
                        Showing {{ $course->firstItem() }} to {{ $course->lastItem() }} of {{ $course->total() }}
                        entries
                    </p>
                </div>
                <div class="flex items-center">
                    <div
                        class="tab-links transition-all duraton-300 text-contentColor dark:text-contentColor-dark flex gap-11px">
                        <button class="inline-block hover:text-primaryColor active">
                            <i class="icofont-layout"></i>
                        </button>
                        <button class="inline-block hover:text-primaryColor">
                            <i class="icofont-listine-dots"></i>
                        </button>
                    </div>
                    <div class="pl-50px sm:pl-20 pr-10px">
                        <select
                            class="text-blackColor bg-whiteColor py-3px pr-2 pl-3 rounded-md outline-none border-4 border-transparent focus:border-blue-light box-border">
                            <option value="Short by New">Short by New</option>
                            <option value="Short by New">Short by New</option>
                            <option value="One">One</option>
                            <option value="Tow">Tow</option>
                            <option value="Three">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-30px">
                <!-- courses sidebar -->
                <div class="md:col-start-1 md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col">
                        <!-- search input -->
                        <div class="pt-30px pr-15px pl-10px pb-23px 2xl:pt-10 2xl:pr-25px 2xl:pl-5 2xl:pb-33px mb-30px border border-borderColor dark:border-borderColor-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold leading-30px mb-25px">
                                Cari Kursus
                            </h4>
                            <form action="{{ route('course') }}" method="GET"
                                class="w-full px-4 py-15px text-sm text-contentColor bg-lightGrey10 dark:bg-lightGrey10-dark dark:text-contentColor-dark flex justify-center items-center leading-26px">
                                <input type="text" name="search" id="searchInput" placeholder="Cari..."
                                    value="{{ request()->get('search') }}"
                                    class="form-input placeholder:text-placeholder bg-transparent focus:outline-none placeholder:opacity-80 w-full">
                                <button type="submit">
                                    <i class="icofont-search-1 text-base"></i>
                                </button>
                            </form>


                        </div>
                        <!-- categories -->
                        <div class="pt-30px pr-15px pl-10px pb-23px 2xl:pt-10 2xl:pr-25px 2xl:pl-5 2xl:pb-33px mb-30px border border-borderColor dark:border-borderColor-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold leading-30px mb-25px">
                                Kategori Kursus
                            </h4>
                            <ul class="flex flex-col gap-y-4">
                                <li
                                    class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor text-sm font-medium px-13px py-2 border border-borderColor dark:border-borderColor-dark flex justify-between leading-7 transition-all duration-300">
                                    <a href="{{ route('course') }}"
                                        class="{{ empty($selectedCategory) ? 'text-primaryColor font-bold' : '' }}">
                                        All
                                    </a>

                                </li>
                                @foreach ($categories as $category)
                                    <li
                                        class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor text-sm font-medium px-13px py-2 border border-borderColor dark:border-borderColor-dark flex justify-between leading-7 transition-all duration-300">
                                        <a href="{{ route('course', ['category' => $category->slug]) }}"
                                            class="{{ $selectedCategory == $category->slug ? 'text-primaryColor font-bold' : '' }}">
                                            {{ $category->name }}
                                        </a>
                                        <span>{{ $category->courses_count }}</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <!-- tags -->
                        <div class="pt-30px pr-15px pl-10px pb-23px 2xl:pt-10 2xl:pr-25px 2xl:pl-5 2xl:pb-33px mb-30px border border-borderColor dark:border-borderColor-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold leading-30px mb-25px">
                                Tag
                            </h4>
                            <ul class="flex flex-col gap-y-23px">
                                <!-- Tambahkan link "All" untuk melihat semua tag -->
                                <li
                                    class="text-primaryColor text-size-15 font-medium dark:text-contentColor-dark flex justify-between leading-26px group">
                                    <a href="{{ route('course') }}"
                                        class="w-full flex items-center gap-11px {{ empty($selectedTag) ? 'text-secondaryColor' : '' }}">
                                        <span
                                            class="w-14px h-15px border border-primaryColor bg-primaryColor group-hover:border-primaryColor group-hover:bg-primaryColor"></span>
                                        <span>All</span> <!-- Menampilkan semua kursus -->
                                    </a>
                                </li>

                                @foreach ($popularTags as $tag => $count)
                                    <li
                                        class="text-primaryColor text-size-15 font-medium dark:text-contentColor-dark flex justify-between leading-26px group">
                                        <a href="{{ route('course', ['tag' => $tag]) }}"
                                            class="w-full flex items-center gap-11px {{ $selectedTag === $tag ? 'text-secondaryColor' : '' }}">
                                            <span
                                                class="w-14px h-15px border border-primaryColor bg-primaryColor group-hover:border-primaryColor group-hover:bg-primaryColor"></span>
                                            <span>{{ $tag }}</span>
                                            <span>({{ $count }})</span> <!-- Menampilkan jumlah kursus terkait -->
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>


                        <!-- skills -->
                        <div class="pt-30px pr-15px pl-10px pb-23px 2xl:pt-10 2xl:pr-25px 2xl:pl-5 2xl:pb-33px mb-30px border border-borderColor dark:border-borderColor-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold leading-30px mb-25px">
                                Skill Level
                            </h4>
                            <ul class="flex flex-col gap-y-10px">
                                <!-- Menambahkan opsi "All" untuk melihat semua skill level -->
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course') }}"
                                        class="w-full {{ !request()->get('skill_level') ? 'text-primaryColor' : '' }}">
                                        All
                                    </a>
                                </li>

                                <!-- Daftar Skill Level yang sudah terurut -->
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course', ['skill_level' => 'beginner']) }}"
                                        class="w-full {{ request()->get('skill_level') === 'beginner' ? 'text-primaryColor' : '' }}">
                                        Beginner
                                    </a>
                                </li>
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course', ['skill_level' => 'intermediate']) }}"
                                        class="w-full {{ request()->get('skill_level') === 'intermediate' ? 'text-primaryColor' : '' }}">
                                        Intermediate
                                    </a>
                                </li>
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course', ['skill_level' => 'advanced']) }}"
                                        class="w-full {{ request()->get('skill_level') === 'advanced' ? 'text-primaryColor' : '' }}">
                                        Advanced
                                    </a>
                                </li>
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course', ['skill_level' => 'specialist']) }}"
                                        class="w-full {{ request()->get('skill_level') === 'specialist' ? 'text-primaryColor' : '' }}">
                                        Specialist
                                    </a>
                                </li>
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course', ['skill_level' => 'expert']) }}"
                                        class="w-full {{ request()->get('skill_level') === 'expert' ? 'text-primaryColor' : '' }}">
                                        Expert
                                    </a>
                                </li>
                                <li
                                    class="text-contentColor text-size-15 font-medium hover:text-primaryColor dark:text-contentColor-darkdark:hover:text-primaryColor flex justify-between leading-26px">
                                    <a href="{{ route('course', ['skill_level' => 'professional']) }}"
                                        class="w-full {{ request()->get('skill_level') === 'professional' ? 'text-primaryColor' : '' }}">
                                        Professional
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>
                <!-- courses main -->
                <div class="md:col-start-5 md:col-span-8 lg:col-start-4 lg:col-span-9 space-y-[30px]">
                    <div class="tab-contents">
                        <!-- grid ordered cards -->
                        <div id="dataContainer"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-30px">
                            <!-- card 1 -->

                            @if ($course->count())
                                @foreach ($course as $item)
                                    <div class="group">
                                        <div class="tab-content-wrapper" data-aos="fade-up">
                                            <div
                                                class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                <!-- card image -->
                                                <div class="relative mb-4">
                                                    <a href="{{ route('course.detail', $item->slug) }}"
                                                        class="w-full overflow-hidden rounded">
                                                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                            alt=""
                                                            class="w-full transition-all duration-300 group-hover:scale-110"
                                                            style="height: 150px" s>
                                                    </a>
                                                    <div
                                                        class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                        <div>
                                                            <p
                                                                class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                                                {{ $item->categories->name ?? 'No Category' }}
                                                            </p>
                                                        </div>
                                                        <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor add-to-wishlist"
                                                            href="" data-id="{{ $item->id }}">
                                                            <i class="icofont-heart-alt text-base py-1 px-2"></i>
                                                        </a>
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
                                                        class="text-lg font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                        {{ $item->name }}
                                                    </a>
                                                    <!-- price -->
                                                    <div class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                        @if ($item->harga_diskon)
                                                            <!-- Menampilkan harga setelah diskon -->
                                                            Rp
                                                            {{ number_format($item->harga - $item->harga_diskon, 2, ',', '.') }}
                                                            <del class="text-sm text-lightGrey4 font-semibold">
                                                                / Rp {{ number_format($item->harga, 2, ',', '.') }}
                                                            </del>
                                                        @else
                                                            <!-- Menampilkan harga asli jika tidak ada diskon -->
                                                            Rp {{ number_format($item->harga, 2, ',', '.') }}
                                                        @endif

                                                        <span class="ml-6">
                                                            @if ($item->harga - $item->harga_diskon > 0)
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
                                                            <a href="instructor-details.html"
                                                                class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                    class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                    src="{{ $item->instrukturs->image ? Storage::url($item->instrukturs->image) : asset('assets/images/grid/grid_small_1.jpg') }}"
                                                                    alt="{{ $item->instrukturs->name }}">
                                                                <span class="flex">{{ $item->instrukturs->name }}</span>
                                                            </a>
                                                        </div>
                                                        <div class="text-start md:text-end">
                                                            <div>
                                                                <!-- Menampilkan bintang berdasarkan rata-rata rating -->
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i class="icofont-star text-size-10 {{ $i <= min($item->average_rating, 5) ? 'text-yellow' : 'text-gray' }}"></i>
                                                                @endfor
                                                            </div>
                                                            <span class="text-xs text-lightGrey6">
                                                                ({{ $item->total_feedbacks }} reviews)
                                                            </span>
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

                            {{-- <div class="pagination">
                                {{ $course->appends(['search' => request()->get('search'), 'category' => request()->get('category'), 'tag' => request()->get('tag'), 'skill_level' => request()->get('skill_level')])->links() }}
                            </div> --}}



                        </div>


                        <!-- list ordered cards -->
                        <div class="hidden opacity-0 transition-all duration-300">
                            <div class="flex flex-col gap-30px">
                                <!-- card 1 -->
                                @if ($course->count())
                                    @foreach ($course as $item)
                                        <div class="w-full group grid-item rounded">
                                            <div class="tab-content-wrapper" data-aos="fade-up">
                                                <div
                                                    class="p-15px lg:pr-30px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark flex flex-wrap md:flex-nowrap rounded">
                                                    <!-- card image -->
                                                    <div class="relative overflow-hidden w-full md:w-2/5">
                                                        <a href="{{ route('course.detail', $item->slug) }}"
                                                            class="w-full overflow-hidden rounded">
                                                            <img src="assets/images/grid/grid_1.png" alt=""
                                                                class="w-full transition-all duration-300 group-hover:scale-110 block">
                                                        </a>

                                                        <div
                                                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                            <div>
                                                                <p
                                                                    class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold capitalize">
                                                                    {{ $item->categories->name }}
                                                                </p>
                                                            </div>
                                                            <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor add-to-wishlist"
                                                                href="" data-id="{{ $item->id }}">
                                                                <i class="icofont-heart-alt text-base py-1 px-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- card content -->
                                                    <div class="w-full md:w-3/5">
                                                        <div class="pl-0 lg:pl-30px">
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
                                                                class="text-size-26 leading-30px font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                {{ $item->name }}
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
                                                                            <span
                                                                                class="flex">{{ $item->instrukturs->name }}</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="text-start md:text-end">
                                                                        <div>
                                                                            <!-- Menampilkan bintang berdasarkan rata-rata rating -->
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                <i class="icofont-star text-size-10 {{ $i <= min($item->average_rating, 5) ? 'text-yellow' : 'text-gray' }}"></i>
                                                                            @endfor
                                                                        </div>
                                                                        <span class="text-xs text-lightGrey6">
                                                                            ({{ $item->total_feedbacks }} reviews)
                                                                        </span>
                                                                    </div> 
                                                                </div>

                                                                <div>
                                                                    <a class="text-sm lg:text-base text-blackColor hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"
                                                                        href="{{ route('course.detail', $item->slug) }}">Know
                                                                        Details
                                                                        <i class="icofont-arrow-right"></i></a>
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
                            <nav>
                                <ul class="flex items-center justify-center gap-15px mt-60px mb-30px">
                                    <!-- Previous Page Link -->
                                    <li>
                                        <a href="{{ $course->previousPageUrl() }}"
                                            class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor {{ $course->onFirstPage() ? 'cursor-not-allowed' : '' }}">
                                            <i class="icofont-double-left"></i>
                                        </a>
                                    </li>

                                    <!-- Page Links -->
                                    @foreach ($course->getUrlRange(1, $course->lastPage()) as $page => $url)
                                        <li>
                                            <a href="{{ $url }}"
                                                class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center {{ $course->currentPage() == $page ? 'text-whiteColor bg-primaryColor hover:bg-primaryColor' : 'text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach

                                    <!-- Next Page Link -->
                                    <li>
                                        <a href="{{ $course->nextPageUrl() }}"
                                            class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor {{ !$course->hasMorePages() ? 'cursor-not-allowed' : '' }}">
                                            <i class="icofont-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                        <nav>
                            <ul class="flex items-center justify-center gap-15px mt-60px mb-30px">
                                <!-- Previous Page Link -->
                                <li>
                                    <a href="{{ $course->previousPageUrl() }}"
                                        class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor {{ $course->onFirstPage() ? 'cursor-not-allowed' : '' }}">
                                        <i class="icofont-double-left"></i>
                                    </a>
                                </li>

                                <!-- Page Links -->
                                @foreach ($course->getUrlRange(1, $course->lastPage()) as $page => $url)
                                    <li>
                                        <a href="{{ $url }}"
                                            class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center {{ $course->currentPage() == $page ? 'text-whiteColor bg-primaryColor hover:bg-primaryColor' : 'text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                <!-- Next Page Link -->
                                <li>
                                    <a href="{{ $course->nextPageUrl() }}"
                                        class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor {{ !$course->hasMorePages() ? 'cursor-not-allowed' : '' }}">
                                        <i class="icofont-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    {{-- @include('landing.components.pagination.pagination') --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Cek status wishlist untuk semua kursus saat halaman dimuat
            $('.add-to-wishlist').each(function() {
                var button = $(this);
                var courseId = button.data('id');
                var userId = {{ auth()->id() }}; // Ambil ID user yang sedang login

                // Kirim permintaan untuk memeriksa apakah kursus ada di wishlist
                $.ajax({
                    url: '/wishlist/check', // URL untuk mengecek status wishlist
                    method: 'GET',
                    data: {
                        course_id: courseId,
                        user_id: userId
                    },
                    success: function(response) {
                        if (response.exists) {
                            // Jika kursus ada di wishlist, ubah tampilan tombol
                            button.removeClass('bg-black bg-opacity-15');
                            button.addClass('bg-primaryColor hover:bg-primaryColor');
                            button.find('i').addClass('text-white');
                        } else {
                            // Jika kursus tidak ada di wishlist, pastikan tampilannya default
                            button.removeClass('bg-primaryColor hover:bg-primaryColor');
                            button.addClass('bg-black bg-opacity-15');
                            button.find('i').removeClass('text-white');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error memeriksa status wishlist:', error);
                    }
                });
            });

            // Logika klik tombol wishlist
            $('.add-to-wishlist').on('click', function(event) {
                event.preventDefault(); // Mencegah perilaku default link

                var button = $(this);
                var courseId = button.data('id'); // Ambil ID kursus
                var userId = {{ auth()->id() }}; // Ambil ID user yang sedang login

                // Cek apakah kursus sudah ada di wishlist
                $.ajax({
                    url: '/wishlist/check', // URL untuk mengecek apakah kursus sudah ada di wishlist
                    method: 'GET',
                    data: {
                        course_id: courseId,
                        user_id: userId
                    },
                    success: function(response) {
                        if (response.exists) {
                            // Jika kursus sudah ada di wishlist, hapus dari wishlist
                            $.ajax({
                                url: '/wishlist/' + response
                                    .wishlist_id, // URL untuk menghapus wishlist berdasarkan ID
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function() {
                                    // Ubah tampilan tombol setelah kursus dihapus dari wishlist
                                    button.removeClass(
                                        'bg-primaryColor hover:bg-primaryColor');
                                    button.addClass(
                                        'bg-black bg-opacity-15'
                                    ); // Kembalikan warna default
                                    button.find('i').removeClass(
                                        'text-white'); // Kembalikan warna ikon
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error menghapus dari wishlist:',
                                        error);
                                }
                            });
                        } else {
                            // Jika kursus belum ada di wishlist, tambahkan ke wishlist
                            $.ajax({
                                url: '/wishlist', // URL untuk menambahkan kursus ke wishlist
                                method: 'POST',
                                data: {
                                    course_id: courseId,
                                    user_id: userId,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function() {
                                    // Ubah tampilan tombol setelah kursus ditambahkan ke wishlist
                                    button.removeClass('bg-black bg-opacity-15');
                                    button.addClass(
                                        'bg-primaryColor hover:bg-primaryColor');
                                    button.find('i').addClass(
                                        'text-white'); // Ubah warna ikon
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error menambahkan ke wishlist:',
                                        error);
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error memeriksa wishlist:', error);
                    }
                });
            });
        });
    </script>

    {{-- <script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
    const query = this.value.toLowerCase(); // Ambil nilai input pencarian dan ubah ke huruf kecil
    const cards = document.querySelectorAll("#dataContainer .group"); // Ambil semua card

    cards.forEach(card => {
        const name = card.querySelector("a.text-lg").textContent.toLowerCase(); // Ambil nama kursus
        const category = card.querySelector(".text-xs").textContent.toLowerCase(); // Ambil kategori

        // Periksa apakah query ada di nama atau kategori
        if (name.includes(query) || category.includes(query)) {
            card.style.display = ""; // Tampilkan card
        } else {
            card.style.display = "none"; // Sembunyikan card
        }
    });
});


</script> --}}

    <style>
        .coll-span-full {
            grid-column: span 3;
            text-align: center;
            background-color: #f4f4f4;
            padding: 30px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            border-radius: 8px;
        }
    </style>
@endsection
