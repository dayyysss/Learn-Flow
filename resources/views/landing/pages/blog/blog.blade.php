@extends('landing.layouts.landing-layouts')
@section('page_title', 'Artikel | Learn Flow')
@section('content')

    @include('landing.components.breadcrumb', ['title' => 'Artikel'])

    <!-- News and blog section -->
    <section>
        <div class="container py-10 md:py-50px lg:py-60px 2xl:py-100px">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px">
                <!-- blogs -->
                <div class="lg:col-start-1 lg:col-span-8 space-y-[35px]">
                    @foreach ($artikel as $article)
                        <!-- blog 1 -->
                        <div class="group shadow-blog2" data-aos="fade-up">
                            <!-- blog thumbnail -->
                            <div class="overflow-hidden relative">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}"
                                    class="w-full">
                                <div
                                    class="text-size-22 leading-6 font-semibold text-white px-15px py-5px md:px-6 md:py-2 bg-primaryColor rounded text-center absolute top-5 right-5">
                                    <h3>
                                        {{ $article->created_at->format('d') }} <br>
                                        {{ $article->created_at->format('M') }}
                                    </h3>
                                </div>
                            </div>
                            <!-- blog content -->
                            <div class="pt-26px pb-5 px-30px">
                                <h3
                                    class="text-2xl md:text-size-32 lg:text-size-28 2xl:text-size-34 leading-34px md:leading-10 2xl:leading-13.5 font-bold text-blackColor2 hover:text-primaryColor dark:text-blackColor2-dark dark:hover:text-primaryColor">
                                    <a href="{{ route('blog.showSlug', $article->slug) }}">{{ $article->judul }}</a>
                                </h3>
                                <div class="mb-14px pb-19px border-b border-borderColor dark:border-borderColor-dark">
                                    <ul class="flex flex-wrap items-center gap-x-15px">
                                        <li>
                                            <a href="#"
                                                class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                    class="icofont-business-man-alt-2"></i>
                                                {{ $article->author }}</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="text-contentColor text-sm hover:text-primaryColor dark:text-contentColor-dark dark:hover:text-primaryColor"><i
                                                    class="icofont-eraser-alt"></i> {{ $article->category->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="text-base text-contentColor dark:text-contentColor-dark mb-15px !leading-30px">
                                    {!! Str::limit($article->deskripsi_singkat, 150) !!}
                                </p>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <a href="{{ route('blog.showSlug', $article->slug) }}"
                                            class="uppercase text-secondaryColor hover:text-primaryColor">
                                            BACA SELENGKAPNYA <i class="icofont-double-right"></i></a>
                                    </div>
                                    <div class="text-primaryColor hover:text-secondaryColor space-y-1">
                                        <a href="#"><i
                                                class="icofont-share bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                        <a href="#"><i
                                                class="icofont-heart bg-whitegrey1 dark:bg-whitegrey1-dark hover:text-whiteColor hover:bg-primaryColor w-8 h-7 leading-7 text-center inline-block rounded transition-all duration-300"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- pagination -->
                    <div>
                        <ul class="flex items-center justify-center gap-15px mt-60px mb-30px">
                            <li>
                                <a href="{{ $artikel->previousPageUrl() }}"
                                    class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor {{ $artikel->onFirstPage() ? 'cursor-not-allowed' : '' }}">
                                    <i class="icofont-double-left"></i>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $artikel->lastPage(); $i++)
                                <li>
                                    <a href="{{ $artikel->url($i) }}"
                                        class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center {{ $artikel->currentPage() == $i ? 'text-whiteColor bg-primaryColor' : 'text-blackColor2 bg-whitegrey1' }} hover:text-whiteColor hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <li>
                                <a href="{{ $artikel->nextPageUrl() }}"
                                    class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor {{ !$artikel->hasMorePages() ? 'cursor-not-allowed' : '' }}">
                                    <i class="icofont-double-right"></i>
                                </a>
                            </li>
                        </ul>
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
