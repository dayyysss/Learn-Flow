@section('footer')
    <footer class="bg-darkblack">
        <div class="container pt-65px pb-5 lg:pb-10">
            <!-- footer top or subscription -->
            <section>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-y-30px md:gap-y-0 items-center pb-45px border-b border-darkcolor">
                    <div data-aos="fade-up">
                        <h4
                            class="text-4xl md:text-size-25 lg:text-size-40 font-bold text-whiteColor leading-50px md:leading-10 lg:leading-16">
                            Masihkah Anda Membutuhkan Dukungan
                            <span class="text-primaryColor">Kami</span> ?
                        </h4>
                        <p class="text-whiteColor text-opacity-65">
                            Jangan menunggu, buatlah kutipan cerdas & logis di sini. Ini cukup mudah.
                        </p>
                    </div>
                    <div data-aos="fade-up">
                        <form
                            class="max-w-form-xl md:max-w-form-md lg:max-w-form-lg xl:max-w-form-xl 2xl:max-w-form-2xl bg-deepgray ml-auto rounded relative">
                            <input type="email" placeholder="Enter your email here"
                                class="text-whiteColor h-62px pl-15px focus:outline-none border border-deepgray focus:border-whitegrey bg-transparent rounded w-full">
                            <button type="submit"
                                class="px-3 md:px-10px lg:px-5 bg-primaryColor hover:bg-deepgray text-xs lg:text-size-15 text-whiteColor border border-primaryColor block rounded absolute right-0 top-0 h-full">
                                Subscribe Now
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- footer main -->
            <section>
                <div
                    class="grid grid-cols-12 gap-30px md:gap-y-5 lg:gap-y-0 pt-60px pb-50px md:pt-30px md:pb-30px lg:pt-110px lg:pb-20">
                    <!-- left -->
                    <div class="col-start-1 col-span-12 md:col-span-6 lg:col-span-4 mr-30px" data-aos="fade-up">
                            <a href=" {{ url('/') }} ">
                                <img src="{{ asset('assets/images/logo/logo_1.png') }}" alt="logo LF" style="width: 180px;">
                            </a>
                        <p class="text-base lg:text-sm 2xl:text-base text-darkgray mb-30px leading-1.8 2xl:leading-1.8">
                            {!! $pagesDeskripsi->deskripsi ?? '' !!}
                        </p>
                    </div>
                    <!-- middle 1 -->
                    <div class="single-footer-items col-start-1 col-span-12 md:col-start-7 lg:col-start-5 md:col-span-6 lg:col-span-2"
                        data-aos="fade-up">
                        <h4 class="text-size-22 font-bold text-whiteColor mb-3">
                            Menu
                        </h4>
                        <ul class="menu-list flex flex-col gap-y-3">
                            {{-- FOOTER MENU --}}
                        </ul>
                    </div>
                    <!-- middle 2 -->
                    <div class="col-start-1 col-span-12 md:col-start-1 lg:col-start-7 md:col-span-6 lg:col-span-3 pl-0 2xl:pl-60px"
                        data-aos="fade-up">
                        <h4 class="text-size-22 font-bold text-whiteColor mb-3">
                            Kursus
                        </h4>
                        <ul class="flex flex-col gap-y-3">
                            <li>
                                <a href="#"
                                    class="text-darkgray relative hover:text-primaryColor after:transition-all after:duration-300 after:w-0 after:h-2px after:absolute after:bg-primaryColor hover:after:w-full after:bottom-0 after:left-0">Ui
                                    Ux Design</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-darkgray relative hover:text-primaryColor after:transition-all after:duration-300 after:w-0 after:h-2px after:absolute after:bg-primaryColor hover:after:w-full after:bottom-0 after:left-0">Web
                                    Development</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-darkgray relative hover:text-primaryColor after:transition-all after:duration-300 after:w-0 after:h-2px after:absolute after:bg-primaryColor hover:after:w-full after:bottom-0 after:left-0">Business
                                    Strategy</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-darkgray relative hover:text-primaryColor after:transition-all after:duration-300 after:w-0 after:h-2px after:absolute after:bg-primaryColor hover:after:w-full after:bottom-0 after:left-0">Softwere
                                    Development</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-darkgray relative hover:text-primaryColor after:transition-all after:duration-300 after:w-0 after:h-2px after:absolute after:bg-primaryColor hover:after:w-full after:bottom-0 after:left-0">Business
                                    English</a>
                            </li>
                        </ul>
                    </div>
                    <!-- right -->
                    <div class="col-start-1 col-span-12 md:col-start-7 lg:col-start-10 md:col-span-6 lg:col-span-3 pl-0 2xl:pl-50px"
                        data-aos="fade-up">
                        <h4 class="text-size-22 font-bold text-whiteColor mb-3">
                            Artikel Terbaru
                        </h4>
                        <ul class="flex flex-col gap-y-5">
                            @foreach ($latestArticles as $article)
                                <li>
                                    <a class="flex items-center gap-3 group cursor-pointer">
                                        <div>
                                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}"
                                                class="w-61px h-54px">
                                        </div>
                                        <div>
                                            <p class="text-xs text-darkgray mb-7px">
                                                {{ $article->created_at->format('d F Y') }}</p>
                                            <h6
                                                class="text-size-15 text-whiteColor font-bold group-hover:text-primaryColor transition-all duration-300">
                                                {!! Str::limit($article->judul, 15) !!}
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>

            <!-- footer copyright  -->
            <div>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:gap-30px pt-10 items-center">
                    <div class="lg:col-start-1 lg:col-span-4 flex items-center">
                        <p class="text-whiteColor whitespace-nowrap">
                            Copyright © <span class="text-primaryColor">{{ now()->year }}</span> by Learn Flow. All Rights Reserved.
                        </p>
                    </div>
                    <div class="lg:col-start-10 lg:col-span-3">
                        <ul class="flex gap-3 lg:gap-2 2xl:gap-3 lg:justify-end">
                            <li>
                                <a href="#"
                                    class="w-40.19px lg:w-35px 2xl:w-40.19px h-37px lg:h-35px 2xl:h-37px leading-37px lg:leading-35px 2xl:leading-37px text-whiteColor bg-whiteColor bg-opacity-10 hover:bg-primaryColor text-center"><i
                                        class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-40.19px lg:w-35px 2xl:w-40.19px h-37px lg:h-35px 2xl:h-37px leading-37px lg:leading-35px 2xl:leading-37px text-whiteColor bg-whiteColor bg-opacity-10 hover:bg-primaryColor text-center"><i
                                        class="icofont-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-40.19px lg:w-35px 2xl:w-40.19px h-37px lg:h-35px 2xl:h-37px leading-37px lg:leading-35px 2xl:leading-37px text-whiteColor bg-whiteColor bg-opacity-10 hover:bg-primaryColor text-center"><i
                                        class="icofont-vimeo"></i></a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-40.19px lg:w-35px 2xl:w-40.19px h-37px lg:h-35px 2xl:h-37px leading-37px lg:leading-35px 2xl:leading-37px text-whiteColor bg-whiteColor bg-opacity-10 hover:bg-primaryColor text-center"><i
                                        class="icofont-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"
                                    class="w-40.19px lg:w-35px 2xl:w-40.19px h-37px lg:h-35px 2xl:h-37px leading-37px lg:leading-35px 2xl:leading-37px text-whiteColor bg-whiteColor bg-opacity-10 hover:bg-primaryColor text-center"><i
                                        class="icofont-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('menu.landing') }}",
                method: 'GET',
                dataType: 'json',
                data: {
                    menu_type: 'footer'
                },
                success: function(data) {
                    let footerMenu = '';

                    $.each(data, function(index, menu) {
                        footerMenu +=
                            `<li> <a href="${menu.link}" class="text-darkgray relative hover:text-primaryColor after:transition-all after:duration-300 after:w-0 after:h-2px after:absolute after:bg-primaryColor hover:after:w-full after:bottom-0 after:left-0">${menu.content}</a></li>`;
                    });

                    // Tambahkan ke elemen <ul> yang ada di bagian "Menu"
                    $('.single-footer-items .menu-list').html(footerMenu);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching footer menu:', textStatus, errorThrown);
                }
            });
        });
    </script>
@show
