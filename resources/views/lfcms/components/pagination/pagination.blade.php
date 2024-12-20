@if ($paginator->hasPages())
    <div class="flex-center-between mt-5">
        <div class="font-spline_sans text-sm text-gray-900 dark:text-dark-text">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
        </div>
        <nav>
            <ul class="flex items-center gap-1">
                {{-- Tombol Previous --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-400">
                            <i class="ri-arrow-left-s-line"></i>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 hover:bg-primary-500 hover:text-white">
                            <i class="ri-arrow-left-s-line"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @php
                    $current = $paginator->currentPage();
                    $lastPage = $paginator->lastPage();
                @endphp

                {{-- First Page --}}
                @if ($current > 3)
                    <li>
                        <a href="{{ $paginator->url(1) }}"
                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 hover:bg-primary-500 hover:text-white">
                            1
                        </a>
                    </li>
                @endif

                {{-- Three Dots Left --}}
                @if ($current > 3)
                    <li><span>...</span></li>
                @endif

                {{-- Range of Pages --}}
                @for ($page = max(1, $current - 1); $page <= min($lastPage, $current + 1); $page++)
                    @if ($page == $current)
                        <li>
                            <a class="font-spline_sans font-medium flex-center size-8 rounded-50 bg-primary-500 text-white">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->url($page) }}"
                                class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 hover:bg-primary-500 hover:text-white">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endfor

                {{-- Three Dots Right --}}
                @if ($current < $lastPage - 2)
                    <li><span>...</span></li>
                @endif

                {{-- Last Page --}}
                @if ($current < $lastPage - 2)
                    <li>
                        <a href="{{ $paginator->url($lastPage) }}"
                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 hover:bg-primary-500 hover:text-white">
                            {{ $lastPage }}
                        </a>
                    </li>
                @endif

                {{-- Tombol Next --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-900 hover:bg-primary-500 hover:text-white">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </li>
                @else
                    <li>
                        <span class="font-spline_sans font-medium flex-center size-8 rounded-50 text-gray-400">
                            <i class="ri-arrow-right-s-line"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
