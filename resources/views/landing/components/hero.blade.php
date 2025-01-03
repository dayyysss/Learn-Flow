<section>
    <!-- bannaer section -->
    <div
        class="container2-xl bg-darkdeep1 pt-50px md:pt-20 pb-205px md:pb-35 rounded-2xl relative overflow-hidden shadow-brand">
        <div class="container grid grid-cols-1 lg:grid-cols-2 items-center">
            <!-- banner Left -->
            <div data-aos="fade-up">
                <p class="text-size-15md:text-lg text-white font-medium mb-45px">
                    {!! $hero->deskripsi ?? '' !!}
                </p>
                <div>
                    <a href=" {{ route('course') }} "
                        class="text-sm md:text-size-15 font-semibold text-darkdeep2 bg-whiteColor border border-whiteColor px-5 md:px-30px py-3 md:py-4 hover:text-whiteColor hover:bg-darkblack rounded inline-block mr-6px md:mr-30px shadow-hero-action dark:bg-whiteColor-dark dark:hover:bg-whiteColor dark:text-whiteColor dark:hover:text-whiteColor-dark dark:border-none">
                        Lihat Kursus
                    </a>
                    <a href=" {{ route('about') }} "
                        class="text-sm md:text-size-15 font-semibold text-whiteColor py-3 md:py-4 hover:text-secondaryColor inline-block">
                        Cari tahu lebih lanjut <i class="icofont-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- banner right -->
            <div data-aos="fade-up">
                <div class="tilt relative">
                    <img class="w-full" src="assets/images/about/about_8.png" alt="">
                    @if (isset($hero->image) && $hero->image)
                        <img class="absolute left-0 top-0 lg:top-4 right-0 mx-auto"
                            src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->judul ?? 'Hero Image' }}">
                    @endif
                </div>

            </div>
        </div>

        <div>
            <img class="absolute left-1/2 bottom-[15%] animate-spin-slow" src="assets/images/register/register__2.png"
                alt=""><img
                class="absolute left-[42%] sm:left-[65%] md:left-[42%] lg:left-[5%] top-[4%] sm:top-[1%] md:top-[4%] lg:top-[10%] animate-move-hor"
                src="assets/images/herobanner/herobanner__6.png" alt=""><img
                class="absolute right-[5%] bottom-[15%]" src="assets/images/herobanner/herobanner__7.png"
                alt=""><img class="absolute top-[5%] left-[45%]"
                src="assets/images/herobanner/herobanner__7.png" alt="">
        </div>
    </div>
</section>
