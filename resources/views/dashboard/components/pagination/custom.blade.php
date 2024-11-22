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
                @php
                    $current = $paginator->currentPage();
                    $last = $paginator->lastPage();
                    $start = max(1, $current - 2);
                    $end = min($last, $current + 2);
                @endphp

                {{-- Show first page if it's not within range --}}
                @if ($start > 1)
                    <li>
                        <a href="{{ $paginator->url(1) }}" class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                            1
                        </a>
                    </li>
                    @if ($start > 2)
                        <li>
                            <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 bg-whitegrey1 dark:text-blackColor2-dark dark:bg-whitegrey1-dark inline-block">
                                ...
                            </span>
                        </li>
                    @endif
                @endif

                {{-- Display pages within range --}}
                @foreach (range($start, $end) as $page)
                    <li>
                        @if ($page == $current)
                            <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-whiteColor bg-primaryColor dark:text-whiteColor dark:bg-primaryColor inline-block">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $paginator->url($page) }}" class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                                {{ $page }}
                            </a>
                        @endif
                    </li>
                @endforeach

                {{-- Show last page if it's not within range --}}
                @if ($end < $last)
                    @if ($end < $last - 1)
                        <li>
                            <span class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 bg-whitegrey1 dark:text-blackColor2-dark dark:bg-whitegrey1-dark inline-block">
                                ...
                            </span>
                        </li>
                    @endif
                    <li>
                        <a href="{{ $paginator->url($last) }}" class="w-10 h-10 leading-10 md:w-50px md:h-50px md:leading-50px text-center text-blackColor2 hover:text-whiteColor bg-whitegrey1 hover:bg-primaryColor dark:text-blackColor2-dark dark:hover:text-whiteColor dark:bg-whitegrey1-dark dark:hover:bg-primaryColor">
                            {{ $last }}
                        </a>
                    </li>
                @endif
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
