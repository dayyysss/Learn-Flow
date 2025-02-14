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
                        {{-- <div
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
                        </div> --}}
                    </div>
                </div>

                <!-- chart area-->
                {{-- <div
                    class="py-10 px-5 mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5"> --}}
                    {{-- <div class="flex flex-wrap">
                        <!-- linechart -->
                        <div class="w-full md:w-100%">
                            <div class="md:px-5 py-10px md:py-0">
                                <div
                                    class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark justify-between items-start md:items-center gap-4">
                                    <!-- Title Dashboard -->
                                    <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                        Statistik Pengunjung
                                    </h2>

                                    <h4 id="statistikTitle"
                                        class="pt-3 text-sm font-semibold text-blackColor dark:text-blackColor-dark">

                                        <!-- Container Utama -->
                                        <div class="py-3 flex flex-col gap-4 md:flex-row">
                                            <!-- Dropdown Tipe Filter -->
                                            <div class="w-full md:w-40">
                                                <select id="filterType"
                                                    class="w-full md:w-40 border border-lightGrey dark:border-darkGrey rounded-md text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                    <option value="" selected disabled>Pilih Tipe Filter</option>
                                                    <option value="bulan-tahun">Bulan dan Tahun</option>
                                                    <option value="range-tanggal">Range Tanggal</option>
                                                </select>
                                            </div>

                                            <!-- Box Filter -->
                                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-4 flex-1">
                                                <!-- Filter Bulan dan Tahun -->
                                                <div id="bulanTahunFilter"
                                                    class="hidden flex flex-col gap-4 md:flex-row md:gap-4">
                                                    <div class="flex flex-col md:flex-row items-center gap-3">
                                                        <select id="bulan"
                                                            class="w-full md:w-40 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                                                    {{ date('m') == $i ? 'selected' : '' }}>
                                                                    {{ \Carbon\Carbon::createFromDate(null, $i, 1)->translatedFormat('F') }}
                                                                </option>
                                                            @endfor
                                                        </select>

                                                        <select id="tahun"
                                                            class="w-full md:w-40 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                            @php
                                                                $startYear = 2024; // Tahun awal pembuatan
                                                                $currentYear = date('Y'); // Tahun saat ini
                                                            @endphp

                                                            @for ($year = $startYear; $year <= $currentYear; $year++)
                                                                <option value="{{ $year }}"
                                                                    {{ $currentYear == $year ? 'selected' : '' }}>
                                                                    {{ $year }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Filter Range Tanggal -->
                                                <div id="rangeTanggalFilter" class="hidden flex flex-col gap-4">
                                                    <input type="text" id="date_range" placeholder="Range Tanggal"
                                                        class="w-full md:w-60 border border-lightGrey dark:border-darkGrey rounded-md p-3 text-sm bg-transparent py-2 px-2 dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-2 focus:ring-primaryColor focus:outline-none">
                                                </div>
                                            </div>
                                        </div>

                                        Statistik Pengunjung - <span
                                            id="statistikValue">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</span>
                                    </h4>
                                </div>
                            </div>
                            <div id="lineChart"></div>
                        </div>
                    </div> --}}

                    {{-- <!-- piechart -->
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
                    </div> --}}
                {{-- </div> --}}
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
                        },
                    },
                    series: [{
                        name: 'Total Pengunjung',
                        data
                    }],
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                        colors: ['#602EED'],
                    },
                    markers: {
                        size: 4,
                        colors: ['#602EED'],
                        strokeWidth: 2,
                        hover: {
                            size: 7
                        },
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: {
                                color: 'var(--text-color)'
                            }
                        },
                        axisBorder: {
                            colors: 'var(--border-color)'
                        },
                    },
                    yaxis: {
                        axisBorder: {
                            show: true,
                            colors: 'var(--border-color)'
                        },
                        labels: {
                            style: {
                                color: 'var(--text-color)'
                            },
                            stepSize: 50
                        },
                    },
                    grid: {
                        borderColor: 'var(--border-color)'
                    },
                    tooltip: {
                        shared: true
                    },
                };

                chart = new ApexCharts(document.querySelector("#lineChart"), options);
                chart.render();
            }

            // Menampilkan filter berdasarkan pilihan
            $('#filterType').on('change', function() {
                const selectedFilter = $(this).val();
                $('#bulanTahunFilter, #rangeTanggalFilter').addClass('hidden');

                if (selectedFilter === 'bulan-tahun') {
                    $('#bulanTahunFilter').removeClass('hidden');
                    fetchData(); // Memuat data dengan filter bulan dan tahun
                } else if (selectedFilter === 'range-tanggal') {
                    $('#rangeTanggalFilter').removeClass('hidden');
                }
            });

            // Fetch data untuk "Bulan dan Tahun"
            $('#bulan, #tahun').on('change', function() {
                if ($('#filterType').val() === 'bulan-tahun') {
                    fetchData();
                }
            });

            // Fetch data untuk "Range Tanggal"
            $('#date_range').on('change', function() {
                if ($('#filterType').val() === 'range-tanggal') {
                    fetchData();
                }
            });

            // Fungsi Fetch Data
            function fetchData() {
                const filterType = $('#filterType').val();
                let data = {};

                if (filterType === 'bulan-tahun') {
                    const bulan = $('#bulan').val();
                    const tahun = $('#tahun').val();
                    if (bulan && tahun) {
                        const bulanNama = new Date(`${tahun}-${bulan}-01`).toLocaleString('id', {
                            month: 'long',
                        });
                        $('#statistikValue').text(`${bulanNama} ${tahun}`);
                        data = {
                            bulan,
                            tahun,
                        };
                    }
                } else if (filterType === 'range-tanggal') {
                    const dateRange = $('#date_range').val();
                    if (dateRange) {
                        data = {
                            range_tanggal: dateRange,
                        };
                    }
                }

                // AJAX Call
                $.ajax({
                    url: '/visitor-count',
                    method: 'GET',
                    data: {
                        tipe_filter: filterType,
                        ...data,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            updateChart(response.data);
                            const filterType = $('#filterType').val();
                            if (filterType === 'range-tanggal') {
                                $('#statistikValue').text(response.range_tanggal);
                            }
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching visitor count:', error);
                    },
                });
            }

            // Inisialisasi Flatpickr untuk rentang tanggal
            flatpickr('#date_range', {
                mode: 'range',
                altInput: true,
                altFormat: 'j F Y',
                dateFormat: 'd-m-Y',
                locale: 'id',
            });

            // Panggil data default pada awal pemuatan
            $(document).ready(function() {
                fetchData(); // Memuat data default saat halaman pertama kali diakses
            });
        });
    </script>
@endsection
