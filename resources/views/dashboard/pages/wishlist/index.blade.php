@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Wishlist')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- courses area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Wishlist
                </h2>
            </div>

            <div>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                    <!-- card 1 -->
                    @foreach ($wishlists as $item)
                        <div class="group">
                            <div class="tab-content-wrapper" data-aos="fade-up">
                                <div class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                    <!-- Card image -->
                                    <div class="relative mb-4">
                                        <a href="../../course-details.html" class="w-full overflow-hidden rounded">
                                            <img src="{{ asset('storage/' . $item->course->thumbnail) }}" alt=""
                                                class="w-full transition-all duration-300 group-hover:scale-110"
                                                style="height: 150px">
                                        </a>
                                        <div class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                            <div>
                                                <p
                                                    class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                    {{ $item->course->categories->name ?? 'No Category' }}
                                                </p>
                                            </div>
                                            <a class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor add-to-wishlist"
                                                href="" data-id="{{ $item->course_id }}">
                                                <i class="icofont-heart-alt text-base py-1 px-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card content -->
                                    <div>
                                        <div class="grid grid-cols-2 mb-15px">
                                            <div class="flex items-center">
                                                <div>
                                                    <i class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
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
                                                    <i class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
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
                                        <!-- Price -->
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
                                                @if ($item->course->harga - $item->course->harga_diskon > 0)
                                                    <del class="text-base font-semibold text-greencolor">Free</del>
                                                @else
                                                    <span class="text-base font-semibold text-greencolor">Free</span>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Author and Rating-->
                                        <div class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
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



                    {{-- <!-- card 2 -->
                  <div class="group">
                    <div class="tab-content-wrapper" data-aos="fade-up">
                      <div
                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark"
                      >
                        <!-- card image -->
                        <div class="relative mb-4">
                          <a
                            href="../../course-details.html"
                            class="w-full overflow-hidden rounded"
                          >
                            <img
                              src="../../assets/images/grid/grid_3.png"
                              alt=""
                              class="w-full transition-all duration-300 group-hover:scale-110"
                            >
                          </a>
                          <div
                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2"
                          >
                            <div>
                              <p
                                class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor2 rounded font-semibold"
                              >
                                Development
                              </p>
                            </div>
                            <a
                              class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                              href="#"
                              ><i
                                class="icofont-heart-alt text-base py-1 px-2"
                              ></i
                            ></a>
                          </div>
                        </div>
                        <!-- card content -->
                        <div>
                          <div class="grid grid-cols-2 mb-15px">
                            <div class="flex items-center">
                              <div>
                                <i
                                  class="icofont-book-alt pr-5px text-primaryColor text-lg"
                                ></i>
                              </div>
                              <div>
                                <span
                                  class="text-sm text-black dark:text-blackColor-dark"
                                >
                                  25 Lesson</span
                                >
                              </div>
                            </div>
                            <div class="flex items-center">
                              <div>
                                <i
                                  class="icofont-clock-time pr-5px text-primaryColor text-lg"
                                ></i>
                              </div>
                              <div>
                                <span
                                  class="text-sm text-black dark:text-blackColor-dark"
                                >
                                  1 hr 40 min</span
                                >
                              </div>
                            </div>
                          </div>
                          <a
                            href="../../course-details.html"
                            class="text-lg font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                          >
                            Minws course to under stand about solution
                          </a>
                          <!-- price -->
                          <div
                            class="text-lg font-semibold text-primaryColor font-inter mb-4"
                          >
                            $40.00
                            <del class="text-sm text-lightGrey4 font-semibold"
                              >/ $67.00</del
                            >
                            <span class="ml-6"
                              ><del
                                class="text-base font-semibold text-secondaryColor3"
                                >Free</del
                              ></span
                            >
                          </div>
                          <!-- author and rating-->
                          <div
                            class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor"
                          >
                            <div>
                              <a
                                href="instructor-details.html"
                                class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"
                                ><img
                                  class="w-[30px] h-[30px] rounded-full mr-15px"
                                  src="../../assets/images/grid/grid_small_3.jpg"
                                  alt=""
                                >Micle John
                              </a>
                            </div>
                            <div class="text-start md:text-end">
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <span class="text-xs text-lightGrey6"
                                >(44)</span
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- card 4 -->
                  <div class="group">
                    <div class="tab-content-wrapper" data-aos="fade-up">
                      <div
                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark"
                      >
                        <!-- card image -->
                        <div class="relative mb-4">
                          <a
                            href="../../course-details.html"
                            class="w-full overflow-hidden rounded"
                          >
                            <img
                              src="../../assets/images/grid/grid_5.png"
                              alt=""
                              class="w-full transition-all duration-300 group-hover:scale-110"
                            >
                          </a>
                          <div
                            class="absolute left-0 top-1 flex justify-between w-full items-center px-2"
                          >
                            <div>
                              <p
                                class="text-xs text-whiteColor px-4 py-[3px] bg-orange rounded font-semibold"
                              >
                                Data &amp; Tech
                              </p>
                            </div>
                            <a
                              class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                              href="#"
                              ><i
                                class="icofont-heart-alt text-base py-1 px-2"
                              ></i
                            ></a>
                          </div>
                        </div>
                        <!-- card content -->
                        <div>
                          <div class="grid grid-cols-2 mb-15px">
                            <div class="flex items-center">
                              <div>
                                <i
                                  class="icofont-book-alt pr-5px text-primaryColor text-lg"
                                ></i>
                              </div>
                              <div>
                                <span
                                  class="text-sm text-black dark:text-blackColor-dark"
                                  >36 Lesson</span
                                >
                              </div>
                            </div>
                            <div class="flex items-center">
                              <div>
                                <i
                                  class="icofont-clock-time pr-5px text-primaryColor text-lg"
                                ></i>
                              </div>
                              <div>
                                <span
                                  class="text-sm text-black dark:text-blackColor-dark"
                                  >3 hr 40 min</span
                                >
                              </div>
                            </div>
                          </div>
                          <a
                            href="../../course-details.html"
                            class="text-lg font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                          >
                            Data course to under stand about solution
                          </a>
                          <!-- price -->
                          <div
                            class="text-lg font-semibold text-primaryColor font-inter mb-4"
                          >
                            $40.00
                            <del class="text-sm text-lightGrey4 font-semibold"
                              >/ $67.00</del
                            >
                            <span class="ml-6"
                              ><del
                                class="text-base font-semibold text-secondaryColor3"
                                >Free</del
                              ></span
                            >
                          </div>
                          <!-- author and rating-->
                          <div
                            class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor"
                          >
                            <div>
                              <a
                                href="instructor-details.html"
                                class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"
                                ><img
                                  class="w-[30px] h-[30px] rounded-full mr-15px"
                                  src="../../assets/images/grid/grid_small_1.jpg"
                                  alt=""
                                >
                                <span class="flex flex-shrink-0"
                                  >Micle Robin</span
                                >
                              </a>
                            </div>
                            <div class="text-start md:text-end">
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <i
                                class="icofont-star text-size-15 text-yellow"
                              ></i>
                              <span class="text-xs text-lightGrey6"
                                >(44)</span
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            var courseIds = [];
            $('.add-to-wishlist').each(function() {
                courseIds.push($(this).data('id'));
            });

            var userId = {{ auth()->id() }};

            $.ajax({
                url: '/wishlist/check',
                method: 'POST',
                data: {
                    course_ids: courseIds,
                    user_id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    response.forEach(function(item) {
                        var button = $(`.add-to-wishlist[data-id="${item.course_id}"]`);
                        if (item.exists) {
                            button.removeClass('bg-black bg-opacity-15');
                            button.addClass('bg-primaryColor hover:bg-primaryColor');
                            button.find('i').addClass('text-white');
                        } else {
                            button.removeClass('bg-primaryColor hover:bg-primaryColor');
                            button.addClass('bg-black bg-opacity-15');
                            button.find('i').removeClass('text-white');
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error memeriksa status wishlist:', error);
                }
            });

            $('.add-to-wishlist').on('click', function(event) {
                event.preventDefault();

                var button = $(this);
                var courseId = button.data('id');
                var userId = {{ auth()->id() }};

                $.ajax({
                    url: '/wishlist/check',
                    method: 'POST',
                    data: {
                        course_ids: [courseId],
                        user_id: userId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var item = response[0];
                        if (item && item.exists) {
                            $.ajax({
                                url: '/wishlist/' + item.wishlist_id,
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function() {
                                    button.removeClass(
                                        'bg-primaryColor hover:bg-primaryColor');
                                    button.addClass('bg-black bg-opacity-15');
                                    button.find('i').removeClass('text-white');
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error menghapus dari wishlist:',
                                        error);
                                }
                            });
                        } else {
                            $.ajax({
                                url: '/wishlist',
                                method: 'POST',
                                data: {
                                    course_id: courseId,
                                    user_id: userId,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function() {
                                    button.removeClass('bg-black bg-opacity-15');
                                    button.addClass(
                                        'bg-primaryColor hover:bg-primaryColor');
                                    button.find('i').addClass('text-white');
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

@endsection
