<section>
    <div class="container-fluid-2">
        <div
            class="bg-primaryColor p-5 md:p-10 rounded-5 flex justify-center md:justify-between items-center flex-wrap gap-2">
            <div class="flex items-center flex-wrap justify-center sm:justify-start">
                <div class="mr-5">
                    <img src="../../assets/images/dashbord/dashbord__2.jpg" alt=""
                        class="w-27 h-27 md:w-22 md:h-22 lg:w-27 lg:h-27 rounded-full p-1 border-2 border-darkdeep7 box-content">
                </div>
                <div class="text-whiteColor font-bold text-center sm:text-start">
                    <h5 class="text-xl leading-1.2 mb-5px">Hello</h5>
                    <h2 class="text-2xl leading-1.24">{{$user->publik_name}}</h2>
                    <ul class="flex items-center gap-15px">
                        <li class="text-sm font-normal flex items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            9 Kursus Terdaftar
                        </li>
                        <li class="text-sm font-normal flex items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-award">
                                <circle cx="12" cy="8" r="7"></circle>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                            </svg>
                            8 Sertifikat
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center">
                <div class="text-yellow">
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-star inline-block">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </div>
                <p class="text-whiteColor">4.0 (120 Ulasan)</p>
            </div>
            <div>
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
            </div>
        </div>
    </div>
</section>
