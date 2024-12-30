<section class="bg-lightGrey10 dark:dark:bg-lightGrey10-dark relative">
    <div>
        <img src="assets/images/about/about_6.png" alt=""
            class="absolute top-[110px] left-[216px] animate-move-hor z-1">
        <img src="assets/images/about/about_7.png" alt=""
            class="absolute top-[360px] left-[162px] md:left-[262px] lg:left-[318px] 2xl:left-[162px] animate-spin-slow z-1">
        <img src="assets/images/about/about_9.png" alt=""
            class="absolute top-[430px] left-[156px] md:top-[630px] md:left-[476px] lg:top-[433px] lg:left-[196px] 2xl:top-[430px] 2xl:left-[156px] animate-move-var z-1">
    </div>
    <div class="container pt-20 pb-20 2xl:pt-30 2xl:pb-90px">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-15">
            <div class="lg:col-start-1 lg:col-span-1 md:col-start-1 md:col-span-2" data-aos="fade-up">
                <div class="relative">
                    <span
                        class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                        Testimonial
                    </span>
                    <h3
                        class="text-3xl md:text-size-35 2xl:text-size-38 3xl:text-size-42 leading-10 md:leading-45px 2xl:leading-50px 3xl:leading-2xl font-bold text-blackColor pb-25px dark:text-blackColor-dark">
                        Apa Kata Mereka Tentang Kami
                    </h3>
                    <p class="text-sm md:text-base text-contentColor mb-5 2xl:mb-45px dark:text-contentColor-dark">
                        Construction is a general term meaning the art and science to
                        form systems organizations and comes from Latin Construction
                        is
                    </p>

                    <div>
                        <a class="text-size-15 text-whiteColor bg-secondaryColor px-25px py-10px border border-secondaryColor hover:text-secondaryColor hover:bg-whiteColor inline-block rounded dark:hover:text-whiteColor dark:hover:bg-secondaryColor"
                            href="#">Explore More <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @foreach ($testimonial as $testimoni)
                <div data-aos="fade-up">
                    <div class="bg-whiteColor px-25px py-50px mb-22px relative dark:bg-whiteColor-dark">
                        <p class="text-base lg:text-sm 2xl:text-base text-contentColor dark:text-contentColor-dark">
                            {!! $testimoni->description !!}
                        </p>

                        <div
                            class="text-xl lg:text-3xl text-whiteColor bg-primaryColor w-10 h-10 lg:w-15 lg:h-15 flex items-center justify-center absolute top-0 left-0 md:-translate-y-1/2 md:-translate-x-1/2 z-20">
                            <i class="icofont-quote-left"></i>
                        </div>
                        <span
                            class="w-0 h-0 border-l-12 border-r-12 border-t-15 border-l-transparent border-r-transparent border-t-whiteColor absolute bottom-[-14px] left-[27px] dark:border-t-whiteColor-dark"></span>
                    </div>

                    <div class="flex items-center gap-5 2xl:gap-20">
                        <div>
                            <img src="{{ asset('storage/' . $testimoni->image) }}" alt="{{ $testimoni->name }}"
                                class="w-20 h-20 rounded-full">
                        </div>
                        <div>
                            <h4
                                class="text-xl lg:text-lg 2xl:text-xl font-semibold text-blackColor dark:text-blackColor-dark">
                                {{ $testimoni->name }}
                            </h4>
                            <p
                                class="text-base lg:text-size-15 2xl:text-base text-lightGrey9 dark:text-lightGrey9-dark">
                                {{ $testimoni->profession }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
