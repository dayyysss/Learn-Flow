@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Reviews')

@section('content')
    <style>
        .star {
            color: #d3d3d3;
        }

        .star.selected {
            color: #ffcc00;
        }
    </style>
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- review area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Ulasan
                </h2>
            </div>
            <div class="tab">
                <div class="tab-links flex flex-wrap mb-10px lg:mb-50px rounded gap-10px">
                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap active"
                        id="acceptedBtn">
                        Diterima
                    </button>

                    <button
                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap"
                        id="givenBtn">
                        Diberikan
                    </button>

                    <!-- Tombol Tambah Review disembunyikan secara default -->
                    @if (auth()->user()->role_id != 3)
                        <button id="addReviewBtn" onclick="openModal()"
                            class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap ml-auto">
                            Tambah Ulasan
                        </button>
                    @endif

                </div>
                <div class="tab-contents">
                    <!-- content 1 -->
                    <div class="overflow-auto">
                        <table class="w-full min-w-full table-auto">
                            <thead>
                                <tr class="text-blackColor dark:text-blackColor-dark">
                                    <th class="py-3 px-6 text-left">User</th>
                                    <th class="py-3 px-6 text-left">Date</th>
                                    <th class="py-3 px-6 text-left">Review Details</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-400">
                                @foreach ($receivedReviews as $review)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <!-- User -->
                                        <td class="py-4 px-6 whitespace-nowrap">
                                            <p class="font-medium text-blackColor dark:text-blackColor-dark">
                                                {{ $review->user->name }}
                                            </p>
                                        </td>

                                        <!-- Date -->
                                        <td class="py-4 px-6 text-blackColor dark:text-blackColor-dark">
                                            <p>{{ $review->created_at->format('F d, Y') }}</p>
                                        </td>

                                        <!-- Review Details -->
                                        <td class="py-4 px-6">
                                            <!-- Course Name -->
                                            <p class="font-semibold text-blackColor dark:text-blackColor-dark">
                                                Course: {{ $review->course->name }}
                                            </p>

                                            <!-- Star Ratings and Comments -->
                                            <div class="flex flex-wrap sm:flex-nowrap items-center w-full sm:w-auto">
                                                <div class="flex items-center gap-2">
                                                    <!-- Star Ratings -->
                                                    <div class="text-primaryColor flex items-center">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @php
                                                                // Menghitung apakah bintang tersebut penuh, setengah, atau kosong
                                                                $fullStar = $i <= floor($review->instructor_rating); // Bintang penuh
                                                                $halfStar =
                                                                    $i == ceil($review->instructor_rating) &&
                                                                    $review->instructor_rating -
                                                                        floor($review->instructor_rating) >=
                                                                        0.5; // Bintang setengah
                                                            @endphp

                                                            @if ($fullStar)
                                                                <i class="icofont icofont-star" style="color: #fbbf24;"></i>
                                                            @elseif ($halfStar)
                                                                <i class="icofont icofont-star-half"
                                                                    style="color: #fbbf24;"></i>
                                                            @else
                                                                <i class="icofont icofont-star" style="color: #e5e7eb;"></i>
                                                            @endif
                                                        @endfor
                                                    </div>

                                                    <!-- Comments -->
                                                    <p
                                                        class="text-sm text-blackColor dark:text-blackColor-dark overflow-hidden truncate max-w-[200px] sm:max-w-full">
                                                        {{ $review->instructor_komentar }}
                                                    </p>
                                                </div>

                                                <!-- Review Count -->
                                                <p class="text-sm text-blackColor dark:text-blackColor-dark ml-2">
                                                    ({{ $review->total_reviewers }} ulasan)
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- content 2 -->
                    <div class="hidden transition-all duration-300">
                        <div class="overflow-auto">
                            <table class="w-full text-left">
                                <div
                                    class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8 w-full md:w-3/4 mx-auto p-4 rounded-lg shadow-md">
                                    <!-- Header -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                        <div class="px-5 py-3 font-semibold text-left">Kursus</div>
                                        <div class="px-5 py-3 font-semibold text-center">Ulasan</div>
                                    </div>

                                    <!-- Body (Reviews) -->
                                    <div class="overflow-x-auto">
                                        <table class="w-full table-auto">
                                            <tbody>
                                                @foreach ($givenReviews as $review)
                                                    <tr class="border-b dark:border-gray-700">
                                                        <td class="px-4 py-3">
                                                            <p
                                                                class="text-blackColor dark:text-blackColor-dark font-medium">
                                                                {{ $review->course->name }}</p>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <div class="flex items-center text-primaryColor">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @php
                                                                        $fullStar = $i <= floor($review->rating); // Full star
                                                                        $halfStar =
                                                                            $i == ceil($review->rating) &&
                                                                            $review->rating - floor($review->rating) >=
                                                                                0.5; // Half star
                                                                    @endphp
                                                                    @if ($fullStar)
                                                                        <i class="icofont icofont-star"
                                                                            style="color: #fbbf24;"></i>
                                                                    @elseif ($halfStar)
                                                                        <i class="icofont icofont-star-half"
                                                                            style="color: #fbbf24;"></i>
                                                                    @else
                                                                        <i class="icofont icofont-star"
                                                                            style="color: #e5e7eb;"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <p
                                                                class="text-blackColor dark:text-blackColor-dark mt-2 text-sm sm:text-base">
                                                                {{ $review->komentar }}</p>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <!-- Modal untuk Menambah Ulasan -->
                                                <div id="addReviewModal"
                                                    class="hidden fixed top-0 left-0 z-50 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                                                    <div class="bg-white dark:bg-gray-800 p-6 sm:p-8 md:p-10 lg:p-12 rounded-lg shadow-xl w-full sm:w-4/5 md:w-1/2 lg:w-1/3 transition-colors duration-300"
                                                        style="max-height: 90vh; overflow-y: auto;">
                                                        <h2
                                                            class="text-3xl font-semibold text-center text-black dark:text-white mb-6">
                                                            Tambah Ulasan</h2>

                                                        <form id="addReviewForm">
                                                            <!-- Dropdown Kursus -->
                                                            <div class="mb-4">
                                                                <label for="courseName"
                                                                    class="block text-lg font-medium text-gray-700 dark:text-gray-300">Kursus</label>
                                                                <select id="courseName" name="course_id"
                                                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:focus:ring-blue-400"
                                                                    required>
                                                                    <option value="">Pilih Kursus</option>
                                                                    @foreach ($courses as $course)
                                                                        <option value="{{ $course->id }}">
                                                                            {{ $course->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <!-- Input Rating untuk Kursus -->
                                                            <div class="mb-4">
                                                                <label for="rating"
                                                                    class="block text-lg font-medium text-gray-700 dark:text-gray-300">Rating</label>
                                                                <div id="ratingStars" class="flex">
                                                                    <!-- Bintang-bintang yang dapat diklik -->
                                                                    <span class="star text-4xl cursor-pointer"
                                                                        data-value="1">&#9733;</span>
                                                                    <span class="star text-4xl cursor-pointer"
                                                                        data-value="2">&#9733;</span>
                                                                    <span class="star text-4xl cursor-pointer"
                                                                        data-value="3">&#9733;</span>
                                                                    <span class="star text-4xl cursor-pointer"
                                                                        data-value="4">&#9733;</span>
                                                                    <span class="star text-4xl cursor-pointer"
                                                                        data-value="5">&#9733;</span>
                                                                </div>
                                                                <!-- Input hidden untuk menyimpan nilai rating -->
                                                                <input type="hidden" id="rating" name="rating"
                                                                    value="" required>
                                                            </div>

                                                            <!-- Textarea Komentar untuk Kursus -->
                                                            <div class="mb-4">
                                                                <label for="komentar"
                                                                    class="block text-lg font-medium text-gray-700 dark:text-gray-300">Komentar</label>
                                                                <textarea id="komentar" name="komentar" rows="4"
                                                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:focus:ring-blue-400"
                                                                    required></textarea>
                                                            </div>

                                                            <!-- Tombol untuk Menampilkan Bagian Ulasan Instruktur -->
                                                            <button type="button" id="toggleInstructorReviewBtn"
                                                                onclick="toggleInstructorReviewSection()"
                                                                class="py-2 px-5 font-bold text-sm bg-blue-600 text-black rounded-md hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500 transition duration-300 mt-4">
                                                                Ulas Instruktur
                                                            </button>


                                                            <!-- Bagian Ulasan Instruktur -->
                                                            <div id="instructorReviewSection" class="mt-6 hidden">
                                                                <h3
                                                                    class="text-2xl font-semibold text-center text-black dark:text-white mb-6">
                                                                    Tambah Ulasan Instruktur
                                                                </h3>

                                                                <!-- Dropdown Instruktur -->
                                                                <div class="mb-4">
                                                                    <label for="instructorName"
                                                                        class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                                                                        Instruktur
                                                                    </label>
                                                                    <select id="instructorName" name="instruktur_id"
                                                                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:focus:ring-blue-400">
                                                                        <option value="">Pilih Instruktur</option>
                                                                        @foreach ($instructors as $instructor)
                                                                            <option value="{{ $instructor->id }}">
                                                                                {{ $instructor->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <!-- Input Rating untuk Instruktur -->
                                                                <div class="mb-4">
                                                                    <label for="instructorRating"
                                                                        class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                                                                        Rating Instruktur
                                                                    </label>
                                                                    <div id="instructorRatingStars" class="flex">
                                                                        <!-- Bintang yang bisa diklik -->
                                                                        <span class="star text-4xl cursor-pointer"
                                                                            data-value="1">&#9733;</span>
                                                                        <span class="star text-4xl cursor-pointer"
                                                                            data-value="2">&#9733;</span>
                                                                        <span class="star text-4xl cursor-pointer"
                                                                            data-value="3">&#9733;</span>
                                                                        <span class="star text-4xl cursor-pointer"
                                                                            data-value="4">&#9733;</span>
                                                                        <span class="star text-4xl cursor-pointer"
                                                                            data-value="5">&#9733;</span>
                                                                    </div>
                                                                    <!-- Input hidden untuk menyimpan rating instruktur -->
                                                                    <input type="hidden" id="instructorRating"
                                                                        name="instructor_rating" value="">
                                                                </div>

                                                                <!-- Textarea Komentar untuk Instruktur -->
                                                                <div class="mb-4">
                                                                    <label for="instructorKomentar"
                                                                        class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                                                                        Komentar
                                                                    </label>
                                                                    <textarea id="instructorKomentar" name="komentar" rows="4"
                                                                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:focus:ring-blue-400"></textarea>
                                                                </div>



                                                                <!-- Tombol Sembunyikan Ulasan Instruktur -->
                                                                <button type="button" id="hideInstructorReviewBtn"
                                                                    onclick="toggleInstructorReviewSection()"
                                                                    class="py-2 px-5 font-bold text-sm bg-red-500 text-black rounded-md hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 transition duration-300 mt-4">
                                                                    Sembunyikan Ulasan Instruktur
                                                                </button>
                                                            </div>

                                                            <div class="flex justify-end space-x-4">
                                                                <button type="button" onclick="closeModal()"
                                                                    class="bg-gray-500 text-black text-lg py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300">Batal</button>
                                                                <button type="submit"
                                                                    class="bg-blue-500 text-black text-lg py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function openModal() {
                    document.getElementById("addReviewModal").classList.remove("hidden");
                }

                function closeModal() {
                    document.getElementById("addReviewModal").classList.add("hidden")
                }

                window.onclick = function(event) {
                    var modal = document.getElementById("addReviewModal");
                    if (event.target === modal) {
                        closeModal();
                    }
                    document.body.style.overflow = '';
                }

                function toggleInstructorReviewSection() {
                    const reviewSection = document.getElementById('instructorReviewSection');
                    const toggleButton = document.getElementById('toggleInstructorReviewBtn');
                    const courseReview = document.getElementById('rating');

                    if (courseReview.value) {
                        if (reviewSection.classList.contains('hidden')) {
                            reviewSection.classList.remove('hidden');
                            toggleButton.classList.add('hidden');
                        } else {
                            reviewSection.classList.add('hidden');
                            toggleButton.classList.remove('hidden');
                        }
                    } else {
                        alert("Harap beri ulasan kursus terlebih dahulu sebelum memberikan ulasan instruktur.");
                    }
                }


                function closeModal() {
                    const modal = document.getElementById("addReviewModal");
                    modal.classList.add("hidden");
                }


                // Tombol Diterima
                document.getElementById('acceptedBtn').addEventListener('click', function() {
                    // Menyembunyikan tombol Tambah Ulasan
                    document.getElementById('addReviewBtn').classList.add('hidden');
                });

                // Tombol Diberikan
                document.getElementById('givenBtn').addEventListener('click', function() {
                    // Menampilkan tombol Tambah Ulasan
                    document.getElementById('addReviewBtn').classList.remove('hidden');
                });

                document.addEventListener('DOMContentLoaded', function() {
                    const stars = document.querySelectorAll('#ratingStars .star');
                    const ratingInput = document.getElementById('rating');

                    stars.forEach(star => {
                        star.addEventListener('click', function() {
                            const value = this.getAttribute('data-value');
                            ratingInput.value = value;

                            // Reset semua bintang
                            stars.forEach(star => {
                                star.classList.remove('selected');
                            });

                            for (let i = 0; i < value; i++) {
                                stars[i].classList.add('selected');
                            }
                        });
                    });
                });

                // Ketika bintang diklik, beri rating
                $('#instructorRatingStars .star').click(function() {
                    var ratingValue = $(this).data('value'); // Mengambil nilai rating (1-5)

                    // Update warna bintang yang telah dipilih
                    $('#instructorRatingStars .star').each(function() {
                        var currentStarValue = $(this).data('value');
                        if (currentStarValue <= ratingValue) {
                            $(this).css('color', 'gold'); // Bintang yang dipilih berwarna emas
                        } else {
                            $(this).css('color', 'gray'); // Bintang yang belum dipilih berwarna abu-abu
                        }
                    });

                    // Menyimpan nilai rating ke dalam input hidden
                    $('#instructorRating').val(ratingValue);
                });


                $('#addReviewForm').submit(function(e) {
                    e.preventDefault();

                    // Data untuk kursus
                    var courseName = $('#courseName').val();
                    var rating = $('#rating').val();
                    var komentar = $('#komentar').val();

                    // Data untuk instruktur (opsional)
                    var instructorName = $('#instructorName').val(); // ID instruktur
                    var instructorRating = $('#instructorRating').val();
                    var instructorKomentar = $('#instructorKomentar').val();

                    // Data yang akan dikirim ke server
                    var requestData = {
                        course_id: courseName,
                        rating: rating,
                        komentar: komentar,
                        _token: "{{ csrf_token() }}", // Token CSRF untuk keamanan
                    };

                    // Tambahkan data instruktur jika diisi
                    if (instructorName && instructorRating && instructorKomentar) {
                        requestData.instruktur_id = instructorName;
                        requestData.instructor_rating = instructorRating;
                        requestData.instructor_komentar = instructorKomentar;
                    }

                    $.ajax({
                        url: "{{ route('reviews.store') }}", // Endpoint server
                        method: 'POST',
                        data: requestData,
                        success: function(response) {
                            if (response.success) {
                                alert(response.message); // Menampilkan pesan sukses
                                location.reload();
                            } else {
                                alert(response.message); // Menampilkan pesan gagal
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengirimkan ulasan');
                        }
                    });
                });


                // Edit Review with AJAX
                $('#editReviewForm').submit(function(e) {
                    e.preventDefault();

                    var reviewId = $('#editReviewId').val();
                    var courseId = $('#editCourseName').val();
                    var rating = $('#editRating').val();
                    var komentar = $('#editComment').val();

                    $.ajax({
                        url: "/reviews/" + reviewId,
                        method: 'PUT',
                        data: {
                            course_id: courseId,
                            rating: rating,
                            komentar: komentar,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert('Gagal update ulasan.');
                            }
                        }
                    });
                });

                // Delete Review with AJAX
                $('#confirmDeleteBtn').click(function() {
                    var reviewId = $('#deleteReviewId').val();

                    $.ajax({
                        url: "/reviews/" + reviewId,
                        method: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert('Gagal hapus ulasan.');
                            }
                        }
                    });
                });
            </script>

        @endsection
