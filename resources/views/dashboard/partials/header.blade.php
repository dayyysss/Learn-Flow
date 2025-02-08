<section>
    <style>
        .text-yellow {
            color: #ffc107;
        }

        .text-gray-300 {
            color: #d1d5db;
        }
    </style>
    <div class="container-fluid-2">
        <div
            class="bg-primaryColor p-5 md:p-10 rounded-5 flex justify-center md:justify-between items-center flex-wrap gap-2">
            <div class="flex items-center flex-wrap justify-center sm:justify-start">
                <div class="mr-5">
                    <img src="{{ asset('storage/' . (Auth::user()->image ?? 'profile_images/default.png')) }}"
                        class="w-27 h-27 md:w-22 md:h-22 lg:w-27 lg:h-27 rounded-full p-1 border-2 border-darkdeep7 box-content">
                </div>
                <div class="text-whiteColor font-bold text-center sm:text-start">
                    <h5 class="text-xl leading-1.2 mb-5px">Hello</h5>
                    <h2 class="text-2xl leading-1.24">{{ $user->publik_name ?? $user->name }}
                    </h2>
                    <ul class="flex items-center gap-15px">
                        <li class="text-sm font-normal flex items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            {{ $registeredCoursesCount }} Kursus Terdaftar
                        </li>
                        <li class="text-sm font-normal flex items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-award">
                                <circle cx="12" cy="8" r="7"></circle>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                            </svg>
                            {{ $certificatesCount }} Sertifikat
                        </li>
                    </ul>

                </div>
            </div>
            @if (auth()->user()->role_id === 3)
                <div class="text-center">
                    <div class="text-yellow">
                        @if ($averageInstructorRating > 0)
                            @php
                                $filledStars = floor($averageInstructorRating);
                                $halfStar = $averageInstructorRating - $filledStars >= 0.5;
                            @endphp
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < floor($averageInstructorRating))
                                    <!-- Bintang penuh -->
                                    <i class="icofont-star text-yellow"></i>
                                @elseif ($i === floor($averageInstructorRating) && $averageInstructorRating - floor($averageInstructorRating) >= 0.5)
                                    <!-- Bintang setengah -->
                                    <i class="icofont-star-half text-yellow"></i>
                                @else
                                    <!-- Bintang kosong -->
                                    <i class="icofont-star text-gray-300"></i>
                                @endif
                            @endfor
                        @else
                            <p class="text-gray-500">Belum ada rating</p>
                        @endif
                    </div>
                    <p class="text-whiteColor">
                        {{ number_format($averageInstructorRating, 1) }} <!-- Menampilkan rata-rata -->
                        ({{ $instructorReviewCount }} Ulasan)
                    </p>
                </div>
            @endif
            {{-- <div>
                <a href="{{ route('courses.create') }}"
                    class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-whiteColor hover:text-primaryColor hover:bg-whiteColor rounded group text-nowrap flex gap-1 items-center">
                    Buat Kursus Baru
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-arrow-right">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div> --}}
        </div>
    </div>
</section>
