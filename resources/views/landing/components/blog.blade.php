<section>
    <div class="container pt-100px pb-70px">
        <!-- heading -->
        <div class="mb-5 md:mb-10" data-aos="fade-up">
            <div class="relative">
                <div>
                    <div class="text-center">
                        <span
                            class="text-sm font-semibold text-primaryColor bg-whitegrey3 px-6 py-5px mb-5 rounded-full inline-block">
                            Berita & Artikel
                        </span>
                    </div>
                </div>
                <h3
                    class="text-3xl md:text-size-35 2xl:text-size-38 3xl:text-size-42 md:leading-45px 2xl:leading-50px 3xl:leading-2xl font-bold text-blackColor text-center dark:text-blackColor-dark">
                    Berita & Blog Terbaru
                </h3>
            </div>
        </div>

        <!-- blogs -->

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-30px">
            <!-- Loop through artikel -->
            @foreach ($artikel as $key => $item)
                @if ($key == 0)
                    <!-- Artikel pertama ditampilkan besar -->
                    <div class="lg:col-start-1 lg:col-span-8 group shadow-blog" data-aos="fade-up">
                        <div class="overflow-hidden relative">
                            <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                class="w-full group-hover:scale-110 transition-all duration-300">
                            <div
                                class="text-base md:text-3xl leading-5 md:leading-9 font-semibold text-white px-15px py-5px md:px-6 md:py-2 bg-primaryColor rounded text-center absolute top-5 left-5">
                                {{ $item->created_at->format('d') }} <br>
                                {{ $item->created_at->format('M') }}
                            </div>
                        </div>
                        <div class="p-5 md:p-35px md:pt-10">
                            <h3
                                class="text-2xl md:text-4xl leading-30px md:leading-45px font-bold text-blackColor hover:text-primaryColor pb-25px dark:text-blackColor-dark dark:hover:text-primaryColor">
                                <a href="{{ route('artikel.show', $item->slug) }}">{{ $item->judul }}</a>
                            </h3>
                            <p class="text-base text-contentColor dark:text-contentColor-dark mb-30px">
                                {!! Str::limit($item->deskripsi_singkat, 150) !!}
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <img src="{{$item->author_image ? asset('storage/' . $item->author_image) : asset('assets/images/avatar/default-avatar.png') }}" alt=""
                                        class="w-11 h-11 rounded-full">
                                    <div class="text-sm md:text-lg text-darkdeep5 dark:text-darkdeep5-dark">
                                        By: <span
                                            class="text-blackColor dark:text-blackColor-dark">{{ $item->author }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Artikel berikutnya ditampilkan kecil -->
                    @if ($key == 1)
                        <div class="lg:col-start-9 lg:col-span-4">
                            <div class="flex flex-col gap-y-30px">
                    @endif
                    <div class="group shadow-blog" data-aos="fade-up">
                        <!-- Blog Thumbnail -->
                        <div class="overflow-hidden relative">
                            <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                class="w-full group-hover:scale-110 transition-all duration-300">
                            <div
                                class="text-base md:text-2xl leading-5 md:leading-30px font-semibold text-white px-15px py-5px md:px-22px md:py-7px bg-primaryColor rounded text-center absolute top-5 left-5">
                                {{ $item->created_at->format('d') }} <br>
                                {{ $item->created_at->format('M') }}
                            </div>
                        </div>
                        <!-- Blog Content -->
                        <div class="px-5 py-25px">
                            <h3
                                class="text-2xl md:text-size-28 leading-30px md:leading-35px font-bold text-blackColor hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor">
                                <a href="{{ route('artikel.show', $item->slug) }}">{{ $item->judul }}</a>
                            </h3>
                        </div>
                    </div>
                    @if ($key == count($artikel) - 1)
        </div>
    </div>
    @endif
    @endif
    @endforeach
    </div>
    </div>
</section>
