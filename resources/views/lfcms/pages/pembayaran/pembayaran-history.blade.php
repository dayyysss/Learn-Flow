@extends('lfcms.layouts.app')
@section('page_title', 'Histori | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="card p-0 overflow-hidden">
        <div class="flex flex-col gap-2 sm:flex-center-between sm:flex-row px-4 py-5 sm:p-7 bg-gray-200/30 dark:bg-dark-card-two">
            <div>
                <h6 class="card-title">Riwayat Pembayaran ({{ $totalConfirmed }})</h6>
                <p class="card-description">
                    See history of your payment plan invoice
                </p>
            </div>
            <select class="form-input form-select self-end sm:self-auto">
                <option value="last-year">Last Year</option>
                <option value="last-month">Last Month</option>
                <option value="last-week">Last Week</option>
            </select>
        </div>
        <div>
            <!-- Start Payment Information Table -->
            <div class="overflow-x-auto scrollbar-table">
                <table class="table-auto w-full whitespace-nowrap text-left text-gray-900 dark:text-dark-text font-medium leading-none">
                    <thead class="border-b-[0.5px] border-gray-200 dark:border-dark-border text-gray-500 dark:text-dark-text font-semibold">
                        <tr>
                            <th class="px-7 py-6">Payment ID</th>
                            <th class="px-7 py-6">Date</th>
                            <th class="px-7 py-6">Code</th>
                            <th class="px-7 py-6">Amount</th>
                            <th class="px-7 py-6">Invoice</th>
                            <th class="px-7 py-4 w-10">More</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                        @foreach ($history as $item)
                        <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                            <td class="flex items-center gap-2 px-7 py-6">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">{{ $item->order_id }}</h6>
                                    {{-- <p>(Credit card)</p> --}}
                                </div>
                            </td>
                            <td class="px-7 py-6">{{ \Carbon\Carbon::parse($item->order_date)->format('d-m-Y') }}</td>
                            <td class="px-7 py-6">{{ 'LF-' . sprintf('%04d', $item->id) }}</td>
                            <td class="px-7 py-6">{{ number_format($item->harga, 2) }}</td>
                            <td class="px-7 py-6">
                                <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                    <i class="ri-download-cloud-2-line text-primary-500"></i>
                                </a>
                            </td>
                            <td class="px-7 py-6">
                                <div class="relative">
                                    <button data-popover-target="payHistory1" data-popover-trigger="click" data-popover-placement="bottom-end" class="size-7 rounded-50 flex-center hover:bg-gray-200 dark:hover:bg-dark-icon">
                                        <i class="ri-more-2-fill text-inherit"></i>
                                    </button>
                                    <ul id="payHistory1" class="hidden popover-target invisible [&.visible]:!block" data-popover>
                                        <li>
                                            <a class="popover-item" href="#">See</a>
                                        </li>
                                        <li>
                                            <a class="popover-item" href="#">Share</a>
                                        </li>
                                        <li>
                                            <a class="popover-item" href="#">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Payment Information Table -->

            <!-- Start Pagination -->
            <div class="px-3 sm:px-6 py-4 border-t border-gray-200 dark:border-dark-border">
                <div class="flex items-center justify-between mt-4">
                    <!-- Showing entry count -->
                    <div class="text-xs font-semibold text-gray-900 dark:text-dark-text">
                        Showing {{ $history->count() }} of {{ $history->total() }} entries
                    </div>
                    <!-- Pagination -->
                    <ul class="flex items-center gap-1 5 *:text-xs *:text-gray-900 dark:text-dark-text">
                        <!-- Previous Page -->
                        @if ($history->onFirstPage())
                            <li>
                                <a href="#"
                                    class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center text-gray-400 cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10"
                                        viewBox="0 0 12 10" fill="none">
                                        <path d="M10.9593 5L1 5" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6.94254 1L10.9595 4.99967L6.94254 9" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $history->previousPageUrl() }}"
                                    class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center hover:border-none hover:bg-primary-500 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10"
                                        viewBox="0 0 12 10" fill="none">
                                        <path d="M10.9593 5L1 5" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6.94254 1L10.9595 4.99967L6.94254 9" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        @endif

                        <!-- Page Links -->
                        @foreach ($history->links()->elements[0] as $page => $url)
                            <li>
                                <a href="{{ $url }}"
                                    class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center {{ $history->currentPage() == $page ? 'bg-primary-500 text-white' : 'hover:bg-primary-500 hover:text-white' }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach

                        <!-- Next Page -->
                        @if ($history->hasMorePages())
                            <li>
                                <a href="{{ $history->nextPageUrl() }}"
                                    class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center hover:border-none hover:bg-primary-500 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10"
                                        viewBox="0 0 12 10" fill="none">
                                        <path d="M10.9593 5L1 5" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6.94254 1L10.9595 4.99967L6.94254 9" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="#"
                                    class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center text-gray-400 cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10"
                                        viewBox="0 0 12 10" fill="none">
                                        <path d="M10.9593 5L1 5" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6.94254 1L10.9595 4.99967L6.94254 9" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- End Pagination -->
        </div>
    </div>
</div>
@endsection