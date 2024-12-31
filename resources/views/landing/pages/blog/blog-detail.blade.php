@extends('landing.layouts.landing-layouts')
@section('page_title', $articles->judul . ' | Learn Flow') 
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Detail Artikel'])

    <!--blog details section -->
    <section>
        <div class="container py-10 md:py-50px lg:py-60px 2xl:py-100px">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px">
                <div class="lg:col-start-1 lg:col-span-8 space-y-[35px]">
                    <!-- blog 1 -->
                    <div data-aos="fade-up">
                        <!-- blog thumbnail -->
                        <div class="overflow-hidden relative mb-30px">
                            <img src="{{ asset('storage/' . $articles->image) }}" alt="" class="w-full">
                        </div>
                        <!-- blog content -->
                        <div>
                            <p class="text-lg text-darkdeep4 mb-25px !leading-30px" data-aos="fade-up">
                                {!! $articles->deskripsi !!}
                            </p>

                            <!-- tag and share  -->
                            <div
                                class="flex justify-between items-center flex-wrap py-10 mb-10 border-y border-borderColor2 dark:border-borderColor2-dark gap-y-10px">
                                <div>
                                    <ul class="flex flex-wrap gap-10px">
                                        <li>
                                            <p
                                                class="text-lg md:text-size-22 leading-7 md:leading-30px text-blackColor dark:text-blackColor-dark font-bold">
                                                Tag
                                            </p>
                                        </li>
                                        @foreach (explode(',', $articles->tag) as $tag)
                                            <li>
                                               <a href="{{ route('blog.tag', ['tag' => $tag]) }}"
                                                    class="px-2 py-5px md:px-3 md:py-9px text-contentColor text-size-11 md:text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor rounded">
                                                    {{ trim($tag) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>                                    
                                </div>
                                <div>
                                    <!-- social -->
                                    <div>
                                        <ul class="flex gap-10px justify-center items-center">
                                            <li>
                                                <p
                                                    class="text-lg md:text-size-22 leading-7 md:leading-30px text-blackColor dark:text-blackColor-dark font-bold">
                                                    Share
                                                </p>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="h-35px w-35px leading-35px md:w-38px md:h-38px md:leading-38px text-size-11 md:text-xs text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                        class="icofont-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="h-35px w-35px leading-35px md:w-38px md:h-38px md:leading-38px text-size-11 md:text-xs text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                        class="icofont-facebook"></i></a>
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="h-35px w-35px leading-35px md:w-38px md:h-38px md:leading-38px text-size-11 md:text-xs text-center border border-borderColor2 text-contentColor hover:text-whiteColor hover:bg-primaryColor dark:text-contentColor-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:border-borderColor2-dark rounded"><i
                                                        class="icofont-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- previous comment area -->
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document,
                                        s = d.createElement('script');
                                    s.src = 'https://learnflow-1.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a
                                    href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>
                </div>
                <!-- blog sidebar -->
                <div class="lg:col-start-9 lg:col-span-4">
                    <div class="flex flex-col">
                        <!-- search input -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Cari Artikel
                            </h4>
                            <form action="{{ route('blog.search') }}" method="GET"
                                class="w-full px-4 py-15px text-sm text-contentColor bg-lightGrey10 dark:bg-lightGrey10-dark dark:text-contentColor-dark flex justify-center items-center leading-26px">
                                <input type="text" placeholder="Cari..." name="search" id="search"
                                    class="placeholder:text-placeholder bg-transparent focus:outline-none placeholder:opacity-80 w-full">
                                <button type="submit">
                                    <i class="icofont-search-1 text-base"></i>
                                </button>
                            </form>
                        </div>
                        <!-- categories -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Kategori Artikel
                            </h4>
                            <ul class="flex flex-col gap-y-4">
                                @if ($category->count())
                                    @foreach ($category as $categoriesArtikel)
                                        <li
                                            class="text-contentColor hover:text-contentColor-dark hover:bg-primaryColor transition-all duration-300 text-sm font-medium px-4 py-2 border border-borderColor2 hover:border-primaryColor dark:border-borderColor2-dark dark:hover:border-primaryColor flex justify-between leading-7">
                                            <a
                                                href="{{ url('blog/kategori/' . strtolower($categoriesArtikel->name)) }}">{{ $categoriesArtikel->name }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    <p>No categories available</p>
                                @endif
                            </ul>
                        </div>
                        <!-- recent posts -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Artikel Terbaru
                            </h4>
                            <ul class="flex flex-col gap-y-25px">
                                @forelse($recentPosts as $index => $post)
                                    <li class="flex items-center">
                                        <div class="w-2/5 pr-5 relative">
                                            <a href="{{ route('blog.showSlug', $post->slug) }}" class="w-full">
                                                @if ($post->image)
                                                    <img src="{{ asset('storage/' . $post->image) }}"
                                                        alt="{{ $post->judul }}" class="w-full">
                                                @else
                                                    <img src="{{ asset('assets/images/blog/default.png') }}"
                                                        alt="Default Image" class="w-full">
                                                @endif
                                            </a>
                                            <span
                                                class="text-xs font-medium text-whiteColor h-6 w-6 leading-6 text-center bg-primaryColor absolute top-0 left-0">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </div>
                                        <div class="w-3/5">
                                            <a href="{{ route('blog.showSlug', $post->slug) }}"
                                                class="w-full text-sm text-contentColor font-medium leading-7 dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                {{ $post->created_at->format('d F Y') }}
                                            </a>
                                            <h3 class="font-bold leading-22px mb-15px">
                                                <a class="text-blackColor dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor"
                                                    href="{{ route('blog.showSlug', $post->slug) }}">
                                                    {{ Str::limit($post->judul, 40) }}
                                                </a>
                                            </h3>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center text-gray-500">
                                        Tidak ada artikel terbaru
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                        <!-- tags -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Tag Populer
                            </h4>
                            @if ($popularTagsArtikel && $popularTagsArtikel->isNotEmpty())
                                <ul class="flex flex-wrap gap-x-5px">
                                    @foreach ($popularTagsArtikel as $tag => $count)
                                        <li>
                                            <a href="{{ route('blog.tag', ['tag' => $tag]) }}"
                                                class="m-5px px-19px py-3px text-contentColor text-xs font-medium uppercase border border-borderColor2 hover:text-whiteColor hover:bg-primaryColor hover:border-primaryColor leading-30px dark:text-contentColor-dark dark:border-borderColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor dark:hover:border-primaryColor">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No tags available.</p>
                            @endif
                        </div>
                        <!-- social area -->
                        <div class="p-5 md:p-30px lg:p-5 2xl:p-30px mb-30px border border-borderColor2 dark:border-borderColor2-dark"
                            data-aos="fade-up">
                            <h4
                                class="text-size-22 text-blackColor dark:text-blackColor-dark font-bold pl-2 before:w-0.5 relative before:h-[21px] before:bg-primaryColor before:absolute before:bottom-[5px] before:left-0 leading-30px mb-25px">
                                Ikuti Kami
                            </h4>
                            <div>
                                <ul class="flex gap-10px items-center">
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="w-38px h-38px leading-38px text-center text-blackColor2 bg-whitegrey2 hover:text-whiteColor hover:bg-primaryColor dark:bg-whitegrey2-dark dark:text-blackColor2-dark dark:hover:text-whiteColor dark:hover:bg-primaryColor rounded"><i
                                                class="icofont-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    < script id = "dsq-count-scr"
    src = "//learnflow-1.disqus.com/count.js"
    async >
</script>
</script>
