<section>
    <div class="container">
        <!-- about section  -->
        <div class="grid grid-cols-1 lg:grid-cols-2 pt-30px gap-x-30px">
            <!-- about left -->
            <div class="relative z-0 mb-30px lg:mb-0 pb-0 md:pb-30px xl:pb-0 overflow-visible" data-aos="fade-up">
                <div class="tilt">
                    <img class="md:ml-[70px]" src="assets/images/about/about_2.png" alt="">
                    {{-- <img class="md:ml-[70px]" src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->judul }}"> --}}
                    <img class="absolute right-0 sm:right-[-17px] md:right-36 lg:right-4 bottom-[91px] md:bottom-0"
                        src="assets/images/about/about_3.png" alt="">
                    <img class="absolute top-[-18px] left-[30px] animate-move-hor z-[-1]"
                        src="assets/images/about/about_4.png" alt="">
                    <img class="absolute top-[30%] left-0 z-[-1]" src="assets/images/about/about_11.png" alt="">
                </div>
                <!-- experience -->
                <div
                    class="px-10px py-3 md:py-25px border-l-4 border-primaryColor shadow-experience absolute bottom-0 left-0 bg-white dark:bg-whiteColor-dark animate-move-var w-[290px]">
                    <div class="counter flex items-center">
                        <p class="text-[40px] text-primaryColor font-bold uppercase pr-10px leading-1">
                            <span data-countup-number="25">25</span>+
                        </p>
                        <p class="text-blackColor dark:text-blackColor-dark font-bold leading-26px">
                            YEARS EXPERIENCE JUST ACHIVED
                        </p>
                    </div>
                </div>
            </div>
            <!-- about right -->
            <div data-aos="fade-up">
                <span
                    class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                    Tentang Kami
                </span>
                <h3
                    class="text-3xl md:text-size-45 leading-10 md:leading-2xl font-bold text-blackColor dark:text-blackColor-dark pb-25px">
                    Selamat datang di

                    Pusat Pembelajaran <span
                        class="relative after:w-full after:h-[7px] after:bg-secondaryColor after:absolute after:left-0 after:bottom-3 md:after:bottom-5">Online</span>
                </h3>
                {{-- <p>
                    {!! $about->deskripsi !!}
                </p> --}}
                <p
                    class="text-sm md:text-base leading-7 text-contentColor dark:text-contentColor-dark mb-6 pl-3 border-l-2 border-primaryColor">
                    Di sini, Anda akan menemukan materi yang dirancang untuk mendukung pembelajaran dalam berbagai
                    disiplin ilmu. Dari kursus pemrograman hingga desain grafis, kami memastikan semua bahan ajar yang
                    kami sediakan terupdate dengan perkembangan terbaru di bidangnya.
                </p>
                <ul class="space-y-5">
                    <li class="flex items-center group">
                        <i
                            class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"></i>
                        <p class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark">
                            Konten Edukasi Berkualitas Tinggi
                        </p>
                    </li>
                    <li class="flex items-center group">
                        <i
                            class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"></i>
                        <p class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark">
                            Akses Kapan Saja dan Di Mana Saja
                        </p>
                    </li>
                    <li class="flex items-center group">
                        <i
                            class="icofont-check px-2 py-2 text-primaryColor bg-whitegrey3 bg-opacity-40 group-hover:bg-primaryColor group-hover:text-white group-hover:opacity-100 mr-15px dark:bg-whitegrey1-dark"></i>
                        <p class="text-sm md:text-base font-medium text-blackColor dark:text-blackColor-dark">
                            Pengalaman Belajar yang Interaktif
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- about counter -->
        <div class="counter flex flex-wrap py-[70px] lg:py-20 gap-y-30px lg:gap-y-0">
            <div class="basis-full sm:basis-1/2 lg:basis-1/4" data-aos="fade-up">
                <div class="flex gap-4">
                    <div>
                        <img src="assets/images/counter/counter__1.png" alt="">
                    </div>
                    <div>
                        <p
                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                            <span data-countup-number="27"> 27</span><span>+</span>
                        </p>
                        <p class="uppercase text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                            Total Acheivment
                        </p>
                    </div>
                </div>
            </div>
            <div class="basis-full sm:basis-1/2 lg:basis-1/4" data-aos="fade-up">
                <div class="flex gap-4">
                    <div>
                        <img src="assets/images/counter/counter__2.png" alt="">
                    </div>
                    <div>
                        <p
                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                            <span data-countup-number="145">145</span><span>+</span>
                        </p>
                        <p class="uppercase text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                            TOTAL STUDENTS
                        </p>
                    </div>
                </div>
            </div>
            <div class="basis-full sm:basis-1/2 lg:basis-1/4" data-aos="fade-up">
                <div class="flex gap-4">
                    <div>
                        <img src="assets/images/counter/counter__3.png" alt="">
                    </div>
                    <div>
                        <p
                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                            <span data-countup-number="10">10</span><span>k</span>
                        </p>
                        <p class="uppercase text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                            tOTAL INSTRUCTOR
                        </p>
                    </div>
                </div>
            </div>
            <div class="basis-full sm:basis-1/2 lg:basis-1/4" data-aos="fade-up">
                <div class="flex gap-4">
                    <div>
                        <img src="assets/images/counter/counter__4.png" alt="">
                    </div>
                    <div>
                        <p
                            class="text-size-34 leading-[1.1] text-blackColor font-bold font-hind dark:text-blackColor-dark">
                            <span data-countup-number="214">214</span><span>+</span>
                        </p>
                        <p class="uppercase text-blackColor font-medium leading-[18px] dark:text-blackColor-dark">
                            OVER THE WORLD
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
