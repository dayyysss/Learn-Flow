<section>
    <div
        class="pt-50px pb-10 md:pt-70px md:pb-50px lg:pt-20 2xl:pt-100px 2xl:pb-70px bg-whiteColor dark:bg-whiteColor-dark">
        <div class="filter-container container">
            <div class="flex gap-15px lg:gap-30px flex-wrap lg:flex-nowrap items-center">
                <!-- courses Left -->
                <div class="basis-full lg:basis-[500px]" data-aos="fade-up">
                    <span
                        class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                        Daftar Kursus
                    </span>
                    <h3 class="text-3xl md:text-[35px] lg:text-size-42 leading-[45px] 2xl:leading-[45px] md:leading-[50px] font-bold text-blackColor dark:text-blackColor-dark"
                        data-aos="fade-up">
                        Temukan Kursus Favorit Impian Anda!
                    </h3>
                </div>
                <!-- courses right -->
                <div class="basis-full lg:basis-[700px]">
                    <ul class="filter-controllers flex flex-wrap sm:flex-nowrap justify-start lg:justify-end button-group filters-button-group"
                        data-aos="fade-up">
                        <li>
                            <button data-filter="*"
                                class="is-checked dark:is-checked pr-5 md:pr-10 lg:pr-17px 2xl:pr-10 text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                Lihat Semua
                            </button>
                        </li>
                        <li>
                            <button data-filter=".filter1"
                                class="pr-5 md:pr-10 lg:pr-17px 2xl:pr-10 text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                Data science
                            </button>
                        </li>
                        <li>
                            <button data-filter=".filter2"
                                class="pr-5 md:pr-10 lg:pr-17px 2xl:pr-10 text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                Engineering
                            </button>
                        </li>
                        <li>
                            <button data-filter=".filter3"
                                class="pr-5 md:pr-10 lg:pr-17px 2xl:pr-10 text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                Featured
                            </button>
                        </li>
                        <li>
                            <button data-filter=".filter4"
                                class="text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                Architecture
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- course cards -->

            <div class="container p-0 filter-contents flex flex-wrap sm:-mx-15px mt-7 lg:mt-10" data-aos="fade-up">
                <!-- card 1 -->
                @if ($course->count())
                    @foreach ($course as $item)
                        <div class="w-full sm:w-1/2 lg:w-1/3 group grid-item filter1 filter3">
                            <div class="tab-content-wrapper sm:px-15px mb-30px">
                                <div
                                    class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                    <!-- card image -->
                                    <div class="relative mb-4">
                                        <a href="{{ route('course.detail', $item->slug) }}"
                                            class="w-full overflow-hidden rounded">
                                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                                                class="w-full transition-all duration-300 group-hover:scale-110">
                                        </a>
                                        <div
                                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                            <div>
                                                <p
                                                    class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                                    {{ $item->categories->name ?? 'No Category' }}
                                                </p>
                                            </div>
                                            <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                href="#" data-id="{{ $item->id }}"><i
                                                    class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                        </div>
                                    </div>
                                    <!-- card content -->
                                    <div>
                                        <div class="grid grid-cols-2 mb-15px">
                                            <div class="flex items-center">
                                                <div>
                                                    <i class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
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
                                                    <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
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
                                        <div class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                            @if ($item->harga_diskon)
                                                Rp {{ number_format($item->harga - $item->harga_diskon, 2, ',', '.') }}
                                                <del class="text-sm text-lightGrey4 font-semibold">/ Rp
                                                    {{ number_format($item->harga, 2, ',', '.') }}</del>
                                            @else
                                                Rp {{ number_format($item->harga, 2, ',', '.') }}
                                            @endif
                                            <span class="ml-6">
                                                <del
                                                    class="text-base font-semibold text-secondaryColor3">Free</del></span>
                                        </div>
                                        <!-- author and rating-->
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                            <div>
                                                <a href="instructor-details.html"
                                                    class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                        class="w-[30px] h-[30px] rounded-full mr-15px"
                                                        src="assets/images/grid/grid_small_1.jpg" alt="">
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
</section>
