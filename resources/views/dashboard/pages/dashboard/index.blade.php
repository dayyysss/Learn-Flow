@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Dashboard')
@section('content')
    <!--dashbord menu section -->
    <section>
        <div class="">
            <!-- dashboard content -->
            <div class="">
                <!-- counter -->
                <div
                    class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
                    <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                        <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                            Dashboard
                        </h2>
                    </div>

                    <!-- counter area -->
                    <div class="counter grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-30px gap-y-5 pb-5">

                        <div
                            class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                            <div class="flex gap-4">
                                <div>
                                    <img src="../../assets/images/counter/counter__1.png" alt="">
                                </div>
                                <div>
                                    <p
                                        class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                        <span
                                            data-countup-number="{{ $enrolledCourses }}">{{ $enrolledCourses }}</span><span></span>
                                    </p>
                                    <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                        Kursus Terdaftar
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                            <div class="flex gap-4">
                                <div>
                                    <img src="../../assets/images/counter/counter__2.png" alt="">
                                </div>
                                <div>
                                    <p
                                        class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                        <span
                                            data-countup-number="{{ $activeCourses }}">{{ $activeCourses }}</span><span></span>
                                    </p>
                                    <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                        Kursus Aktif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                            <div class="flex gap-4">
                                <div>
                                    <img src="../../assets/images/counter/counter__3.png" alt="">
                                </div>
                                <div>
                                    <p
                                        class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                        <span
                                            data-countup-number="{{ $completeCourses }}">{{ $completeCourses }}</span><span></span>
                                    </p>
                                    <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                        Kursus Selesai
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                            <div class="flex gap-4">
                                <div>
                                    <img src="../../assets/images/counter/counter__4.png" alt="">
                                </div>
                                <div>
                                    <p
                                        class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                        <span
                                            data-countup-number="{{ $totalCourses }}">{{ $totalCourses }}</span><span></span>
                                    </p>
                                    <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                        Total Kursus
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                            <div class="flex gap-4">
                                <div>
                                    <img src="../../assets/images/counter/counter__3.png" alt="">
                                </div>
                                <div>
                                    <p
                                        class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                        <span
                                            data-countup-number="{{ $totalStudents }}">{{ $totalStudents }}</span><span></span>
                                    </p>
                                    <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                        Jumlah Siswa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-5 md:px-10 md:py-50px bg-lightGrey5 dark:bg-whiteColor-dark rounded-lg2 shadow-accordion-dark">
                            <div class="flex gap-4">
                                <div>
                                    <img src="../../assets/images/counter/counter__4.png" alt="">
                                </div>
                                <div>
                                    <p
                                        class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                                        <span>Rp.</span><span
                                            data-countup-number="{{ $totalEarnings }}">{{ $totalEarnings }}</span>
                                    </p>
                                    <p class="text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                                        Total Penghasilan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- chart area-->
                <div
                    class="py-10 px-5 mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
                    <div class="flex flex-wrap">
                        <!-- linechart -->
                        <div class="w-full md:w-100%">
                            <div class="md:px-5 py-10px md:py-0">
                                <div
                                    class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark justify-between items-start md:items-center gap-4">
                                    <!-- Title Dashboard -->
                                    <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                        Dashboard
                                    </h2>

                                    <h4 id="statistikTitle"
                                        class="text-sm font-semibold text-blackColor dark:text-blackColor-dark">
                                        <!-- Dropdown Tipe Filter -->
                                        <div class="mb-6">

                                            <select id="filterType"
                                                class="w-full mt-2 border border-lightGrey dark:border-darkGrey rounded-md text-sm bg-transparant py-2 px-2 dark:bg-transparant-dark text-blackColor dark:text-lightGrey2 focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                <option value="" selected disabled>Pilih Tipe Filter</option>
                                                <option value="bulan-tahun">Bulan dan Tahun</option>
                                                <option value="range-tanggal">Range Tanggal</option>
                                            </select>
                                        </div>

                                        <!-- Filter Bulan dan Tahun -->
                                        <div id="bulanTahunFilter" class="hidden flex flex-col gap-4">
                                            <div class="flex flex-wrap items-center gap-6">
                                                <div class="w-full md:w-auto flex items-center gap-3">
                                                    <label for="bulan"
                                                        class="text-sm font-medium text-blackColor dark:text-blackColor-dark">
                                                        Bulan
                                                    </label>
                                                    <select id="bulan"
                                                        class="border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-lightGrey5 dark:bg-lightGrey5-dark text-blackColor dark:text-lightGrey2 focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                                                {{ date('m') == $i ? 'selected' : '' }}>
                                                                {{ \Carbon\Carbon::createFromDate(null, $i, 1)->translatedFormat('F') }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="w-full md:w-auto flex items-center gap-3">
                                                    <label for="tahun"
                                                        class="text-sm font-medium text-blackColor dark:text-blackColor-dark">
                                                        Tahun
                                                    </label>
                                                    <select id="tahun"
                                                        class="border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-lightGrey5 dark:bg-lightGrey5-dark text-blackColor dark:text-lightGrey2 focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                        @for ($year = date('Y') - 0; $year <= date('Y'); $year++)
                                                            <option value="{{ $year }}"
                                                                {{ date('Y') == $year ? 'selected' : '' }}>
                                                                {{ $year }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter Range Tanggal -->
                                        <div id="rangeTanggalFilter" class="hidden flex flex-col gap-4">
                                            <div>
                                                <label
                                                    class="text-sm font-medium text-blackColor dark:text-blackColor-dark">
                                                    Tanggal Awal - Tanggal Akhir
                                                </label>
                                                <input type="text" id="date_range"
                                                    class="w-full mt-2 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-lightGrey5 dark:bg-lightGrey5-dark text-blackColor dark:text-lightGrey2 focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                            </div>
                                        </div>

                                        <!-- Apply Filter -->
                                        <div class="text-right mt-6 mb-5">
                                            <button id="applyFilter"
                                                class="px-6 py-2 text-sm font-medium text-white bg-primaryColor rounded-md hover:bg-primaryColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                Terapkan
                                            </button>
                                        </div>

                                        Statistik Pengunjung - {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}
                                    </h4>
                                </div>
                            </div>
                            <div id="lineChart"></div>
                        </div>
                    </div>

                    <!-- piechart -->
                    <div class="w-full md:w-50% mt-5">
                        <div class="md:px-5 py-10px md:py-0">
                            <div
                                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex justify-between items-center gap-2">
                                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                    Traffic
                                </h2>
                                <div class="bg-whiteColor rounded-md relative">
                                    <select
                                        class="bg-transparent text-darkBlue w-42.5 px-3 py-6px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select border border-borderColor6 rounded-md">
                                        <option selected="" value="Today">Today</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                    <i
                                        class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                                </div>
                            </div>
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            let chart;

            // Fungsi untuk mengupdate chart dengan data baru
            function updateChart(data) {
                if (chart) chart.destroy();
                const options = {
                    chart: {
                        height: 300,
                        type: 'line',
                        zoom: {
                            enabled: true
                        },
                        toolbar: {
                            show: true
                        }
                    },
                    series: [{
                        name: 'Total Pengunjung',
                        data
                    }],
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                        colors: ['#602EED']
                    },
                    markers: {
                        size: 4,
                        colors: ['#602EED'],
                        strokeWidth: 2,
                        hover: {
                            size: 7
                        }
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: {
                                color: 'var(--text-color)', // Ganti dengan variabel CSS sesuai mode
                            }
                        },
                        axisBorder: {
                            colors: 'var(--border-color)', // Ganti dengan warna sesuai mode
                        }
                    },
                    yaxis: {
                        axisBorder: {
                            show: true,
                            colors: 'var(--border-color)', // Ganti dengan warna sesuai mode
                        },
                        labels: {
                            style: {
                                color: 'var(--text-color)', // Ganti dengan variabel CSS sesuai mode
                            },
                            stepSize: 50
                        }
                    },
                    grid: {
                        borderColor: 'var(--border-color)', // Ganti dengan warna sesuai mode
                    },
                    tooltip: {
                        shared: true
                    },
                };

                chart = new ApexCharts(document.querySelector("#lineChart"), options);
                chart.render();
            }

            // Fungsi untuk menangani filter
            $('#applyFilter').on('click', function() {
                const tipe_filter = $('#filterType').val();
                let data = {};

                if (tipe_filter === 'bulan-tahun') {
                    data.bulan = $('#bulan').val();
                    data.tahun = $('#tahun').val();
                } else if (tipe_filter === 'range-tanggal') {
                    // Mengambil nilai dari rentang tanggal
                    data.range_tanggal = $('#date_range').val();
                }
                // console.log($('#date_range').val());

                $.ajax({
                    url: '/visitor-count',
                    method: 'GET',
                    data: {
                        tipe_filter,
                        ...data
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            updateChart(response.data);
                        } else {
                            console.error('Gagal memuat data pengunjung.');
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching visitor count:', error);
                    }
                });
            });

            // Event listener untuk dropdown tipe filter
            $('#filterType').on('change', function() {
                const selectedFilter = $(this).val();
                $('#bulanTahunFilter, #rangeTanggalFilter').addClass('hidden');
                if (selectedFilter === 'bulan-tahun') $('#bulanTahunFilter').removeClass('hidden');
                else if (selectedFilter === 'range-tanggal') $('#rangeTanggalFilter').removeClass('hidden');

                // Menyembunyikan tombol "Terapkan" saat filter belum dipilih
                if (selectedFilter === '' || selectedFilter === null) {
                    $('#applyFilter').addClass('hidden');
                } else {
                    $('#applyFilter').removeClass('hidden');
                }
            });

            // Inisialisasi Flatpickr untuk rentang tanggal
            flatpickr("#date_range", {
                mode: "range", // Memungkinkan pemilihan rentang tanggal
                dateFormat: "d-m-Y", // Format tanggal yang digunakan adalah Y-m-d (contoh: 2024-10-19)
                "locale": "id"
            });

            // Inisialisasi chart dengan data default
            $.ajax({
                url: '/visitor-count',
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        updateChart(response.data);
                    } else {
                        console.error('Gagal memuat data pengunjung.');
                    }
                },
                error: function(error) {
                    console.error('Error fetching visitor count:', error);
                }
            });

            // Inisialisasi untuk menyembunyikan tombol "Terapkan" ketika halaman pertama kali dimuat
            if ($('#filterType').val() === '' || $('#filterType').val() === null) {
                $('#applyFilter').addClass('hidden');
            }

            // Update warna teks berdasarkan mode gelap
            function updateTextColorsBasedOnDarkMode() {
                const isDarkMode = $('body').hasClass('dark');
                const textColor = isDarkMode ? 'blackColor-dark' : 'blackColor';
                const borderColor = isDarkMode ? '#3E3E3E' :
                    '#e7e7e7'; // Contoh perubahan warna border untuk dark mode

                // Mengubah warna teks sumbu X dan Y
                $(':root').css({
                    '--text-color': textColor,
                    '--border-color': borderColor,
                });
            }

            // Menyimulasikan perubahan saat mode gelap aktif atau tidak
            updateTextColorsBasedOnDarkMode();
            $(document).on('classChange', function() {
                updateTextColorsBasedOnDarkMode();
            });
        });
    </script>
@endsection
