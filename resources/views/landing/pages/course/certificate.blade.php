@extends('landing.layouts.landing-layouts')
@section('page_title', 'Certificates | Learn Flow')
@section('content')

    <div class="">
        <div class="bg-lightGrey10 dark:bg-lightGrey10-dark relative z-0 overflow-y-visible 2xl:pb-150px 2xl:pt-40.5">
            <!-- animated icons -->
            <div>
                <img class="absolute left-0 bottom-0 md:left-[14px] lg:left-[50px] lg:bottom-[21px] 2xl:left-[165px] 2xl:bottom-[60px] animate-move-var z-10"
                    src="{{ asset('assets/images/herobanner/herobanner__1.png') }}" alt="">
                <img class="absolute left-0 top-0 lg:left-[50px] lg:top-[100px] animate-spin-slow"
                    src="{{ asset('assets/images/herobanner/herobanner__2.png') }}" alt="">
                <img class="absolute right-[30px] top-0 md:right-10 lg:right-[575px] 2xl:top-20 animate-move-var2 opacity-50 hidden md:block"
                    src="{{ asset('assets/images/herobanner/herobanner__3.png') }}" alt="">
                <img class="absolute right-[30px] top-[212px] md:right-10 md:top-[157px] lg:right-[45px] lg:top-[100px] animate-move-hor"
                    src="{{ asset('assets/images/herobanner/herobanner__5.png') }}" alt="">
            </div>
            
            <!-- container for content -->
            <div class="container">
                <div class="text-center">
                    <div class="flex justify-center">
                        <div class="w-full max-w-lg">
                            <div class="p-6 text-center mb-10">
                                <!-- Displaying PDF Certificate -->
                                <iframe id="openModal" src="{{ route('viewCertificate', ['certificateId' => $certificateId]) }}#toolbar=0&navpanes=0"
                                    class="flex ml-auto mr-auto mt-10 justify-center" width="605px" height="425">
                            </iframe>
                            <br>
                            
                            <!-- Tombol untuk mengunduh sertifikat -->
                            <a href="{{ route('downloadCertificate', ['certificateId' => $certificateId]) }}"
                               class="inline-block px-6 py-2 font-semibold rounded text-whiteColor bg-primaryColor border-primaryColor border hover:text-primaryColor hover:bg-white rounded-standard dark:hover:bg-whiteColor-dark dark:hover:text-whiteColor">
                                Download PDF
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Certificate Details Section -->
        <div class="container py-10 md:py-50px lg:py-60px 2xl:py-100px">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10px">
                <!-- Certificate Content Column -->
                <div class="lg:col-start-1 lg:col-span-9 space-y-[35px]">
                    <div>
                        <div class="flex gap-10 text-2xl capitalize">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" width="250px" alt="">
                            <div class="flex flex-col justify-between">
                                <!-- Rating Stars -->
                                <div class="text-start">
                                    <i class="icofont-star text-size-15 text-yellow"></i>
                                    <i class="icofont-star text-size-15 text-yellow"></i>
                                    <i class="icofont-star text-size-15 text-yellow"></i>
                                    <i class="icofont-star text-size-15 text-yellow"></i>
                                    <span class="text-xs text-lightGrey6">(44)</span>
                                </div>
                                <!-- Course Title -->
                                <p class="text-size-15 md:text-2xl font-bold text-blackColor dark:text-blackColor-dark leading-43px md:leading-14.5">
                                    {{ $course->name }}
                                </p>
                                <!-- Instructor Information -->
                                <div>
                                    <a href="instructor-details.html"
                                        class="text-xl font-medium font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                        <img class="w-[30px] h-[30px] rounded-full mr-15px"
                                            src="{{ asset('assets/images/grid/grid_small_1.jpg') }}" alt="">
                                        <span class="flex">{{ $course->instrukturs->name }}</span>
                                    </a>
                                </div>
                                <div class="flex-grow"></div>
                                <div class="flex justify-end items-end mt-auto">
                                    <a class="text-sm lg:text-base text-blackColor hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"
                                        href="{{ route('course.detail', $course->slug) }}">Know Details
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Course Description -->
                        <div class="mt-10">
                            {!! $course->deskripsi !!}
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar Column -->
                <div class="lg:col-start-10 lg:col-span-3">
                    <div class="flex flex-col">
                        <!-- Enroll Section -->
                        <div class="py-33px px-25px shadow-event mb-30px bg-whiteColor dark:bg-whiteColor-dark rounded-md"
                            data-aos="fade-up">
                            <div class="mt-5" data-aos="fade-up">
                                <p class="text-sm text-contentColor dark:text-contentColor-dark leading-1.8 text-center mb-5px">
                                    More inquiry about course
                                </p>
                                <button type="submit"
                                    class="w-full text-xl text-primaryColor bg-whiteColor px-25px py-10px mb-10px font-bold leading-1.8 border border-primaryColor hover:text-whiteColor hover:bg-primaryColor inline-block rounded group dark:bg-whiteColor-dark dark:text-whiteColor dark:hover:bg-primaryColor">
                                    <i class="icofont-phone"></i> +47 333 78 901
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    document.getElementById('openModal').addEventListener('click', function () {
        document.getElementById('certificateModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('certificateModal').classList.add('hidden');
    });

    // Tutup modal saat klik di luar konten modal
    document.getElementById('certificateModal').addEventListener('click', function (event) {
        if (event.target === this) {
            this.classList.add('hidden');
        }
    });
</script>
