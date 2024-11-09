<section>
    <!-- banner section -->
    <div
        class="bg-lightGrey10 dark:bg-lightGrey10-dark relative z-0 overflow-y-visible py-50px md:py-20 lg:py-100px 2xl:pb-150px 2xl:pt-40.5">
        <!-- animated icons -->
        <div>
            <img class="absolute left-0 bottom-0 md:left-[14px] lg:left-[50px] lg:bottom-[21px] 2xl:left-[165px] 2xl:bottom-[60px] animate-move-var z-10"
                src="assets/images/herobanner/herobanner__1.png" alt=""><img
                class="absolute left-0 top-0 lg:left-[50px] lg:top-[100px] animate-spin-slow"
                src="assets/images/herobanner/herobanner__2.png" alt=""><img
                class="absolute right-[30px] top-0 md:right-10 lg:right-[575px] 2xl:top-20 animate-move-var2 opacity-50 hidden md:block"
                src="assets/images/herobanner/herobanner__3.png" alt="">

            <img class="absolute right-[30px] top-[212px] md:right-10 md:top-[157px] lg:right-[45px] lg:top-[100px] animate-move-hor"
                src="assets/images/herobanner/herobanner__5.png" alt="">
        </div>
        <div class="container">
            <div class="text-center">
                <h1
                    class="text-3xl md:text-size-40 2xl:text-size-55 font-bold text-blackColor dark:text-blackColor-dark mb-7 md:mb-6 pt-3">
                    {{ $title ?? 'Page Title' }}
                </h1>
                <ul class="flex gap-1 justify-center">
                    <li>
                        <a href="index.html" class="text-lg text-blackColor2 dark:text-blackColor2-dark">Home <i
                                class="icofont-simple-right"></i></a>
                    </li>
                    <li>
                        <span class="text-lg text-blackColor2 dark:text-blackColor2-dark">{{ $title ?? 'Page' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
