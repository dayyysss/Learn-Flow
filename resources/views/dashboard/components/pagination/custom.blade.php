@if ($paginator->hasPages())
<div>
    <ul class="flex items-center justify-center gap-15px mt-60px mb-30px">
        {{-- Previous Page Link --}}
        <li>
            @if ($paginator->onFirstPage())
                <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 bg-whitegrey1 dark:text-blackColor2-dark dark:bg-whitegrey1-dark cursor-not-allowed inline-block">
                    <i class="icofont-double-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                    <i class="icofont-double-left"></i>
                </a>
            @endif
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                    <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 bg-whitegrey1 dark:text-blackColor2-dark dark:bg-whitegrey1-dark inline-block">
                        {{ $element }}
                    </span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li>
                        @if ($page == $paginator->currentPage())
                            <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-whiteColor bg-primaryColor dark:text-whiteColor dark:bg-primaryColor inline-block">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                                {{ $page }}
                            </a>
                        @endif
                    </li>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <li>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                    <i class="icofont-double-right"></i>
                </a>
            @else
                <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 bg-whitegrey1 dark:text-blackColor2-dark dark:bg-whitegrey1-dark cursor-not-allowed inline-block">
                    <i class="icofont-double-right"></i>
                </span>
            @endif
        </li>
    </ul>
</div>
@endif