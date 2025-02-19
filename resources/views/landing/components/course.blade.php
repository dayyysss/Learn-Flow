<section>
    <div
        class="pt-50px pb-10 md:pt-70px md:pb-50px lg:pt-20 2xl:pt-100px 2xl:pb-70px bg-whiteColor dark:bg-whiteColor-dark">
        <div class="filter-container container">
            <div class="flex gap-15px lg:gap-30px flex-wrap lg:flex-nowrap items-center">
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
                <div class="basis-full lg:basis-[700px]">
                    <ul class="filter-controllers flex flex-wrap sm:flex-nowrap justify-start lg:justify-end button-group filters-button-group"
                        data-aos="fade-up">
                        <li>
                            <button data-filter="*"
                                class="is-checked dark:is-checked pr-5 md:pr-10 lg:pr-17px 2xl:pr-10 text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                Lihat Semua
                            </button>
                        </li>
                        @foreach ($kategoriLanding as $category)
                            <li>
                                <button data-filter=".category-{{ $category->id }}"
                                    class="pr-5 md:pr-10 lg:pr-17px 2xl:pr-10 text-contentColor font-medium hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor">
                                    {{ $category->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="container p-0 filter-contents flex flex-wrap sm:-mx-15px mt-7 lg:mt-10" data-aos="fade-up">
                @if ($course->count())
                    @foreach ($course as $item)
                        <div
                            class="course-card category-{{ $item->categories->id }} w-full sm:w-1/2 lg:w-1/3 group grid-item filter1 filter3">
                            <div class="tab-content-wrapper sm:px-15px mb-30px">
                                <div
                                    class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                    <div class="relative mb-4">
                                        <a href="{{ route('course.detail', $item->slug) }}"
                                            class="w-full overflow-hidden rounded">
                                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                                                style="
                                                   height: 214px;"
                                                class="w-full transition-all duration-300 group-hover:scale-110">
                                        </a>
                                        <div
                                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                            <div>
                                                @php
                                                    $backgrounds = [
                                                        'bg-secondaryColor',
                                                        'bg-blue',
                                                        'bg-secondaryColor2',
                                                        'bg-greencolor2',
                                                        'bg-orange',
                                                        'bg-yellow',
                                                    ];
                                                    $bgClass = $backgrounds[array_rand($backgrounds)];
                                                @endphp
                                                <p
                                                    class="text-xs text-whiteColor px-4 py-[3px] {{ $bgClass }} rounded font-semibold">
                                                    {{ $item->tingkatan ?? 'No Category' }}
                                                </p>
                                            </div>
                                            <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                href="#" data-id="{{ $item->id }}"><i
                                                    class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between items-center mb-15px">
                                            <div class="flex items-center">
                                                <div>
                                                    <i class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                </div>
                                                <div>
                                                    <span class="text-sm text-black dark:text-blackColor-dark">
                                                        {{ $item->babs->sum(function ($bab) {
                                                            return $bab->moduls->count();
                                                        }) }}
                                                        Modul
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <div>
                                                    <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                </div>
                                                <div>
                                                    <span class="text-sm text-black dark:text-blackColor-dark">
                                                        {{ $item->tanggal_mulai }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('course.detail', $item->slug) }}"
                                            class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                            {{ Str::limit($item->name, 80, '...') }}
                                        </a>
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
                    <div
                        class="coll-span-full text-center py-10 bg-lightGrey dark:bg-darkdeep3-dark text-xl font-semibold text-primaryColor">
                        Kursus tidak ditemukan untuk pencarian ini.
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-controllers button');
        const courseCards = document.querySelectorAll('.course-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('is-checked'));
                this.classList.add('is-checked');

                // Filter cards
                if (filter === '*') {
                    courseCards.forEach(card => card.style.display = 'block');
                } else {
                    courseCards.forEach(card => {
                        card.style.display = card.classList.contains(filter.slice(1)) ?
                            'block' : 'none';
                    });
                }
            });
        });
    });
</script>
