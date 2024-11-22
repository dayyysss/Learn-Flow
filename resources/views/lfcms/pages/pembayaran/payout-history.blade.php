@extends('lfcms.layouts.app')
@section('page_title', 'LearnFlow CMS | Pembayaran')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="card p-0 overflow-hidden">
        <div class="flex flex-col gap-2 sm:flex-center-between sm:flex-row px-4 py-5 sm:p-7 bg-gray-200/30 dark:bg-dark-card-two">
            <div>
                <h6 class="card-title">Payouts History (24)</h6>
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
        <div class="p-3 sm:p-7">
            <div class="grid grid-cols-12 gap-4 mb-3">
                <!-- Instructor Total Balance Chart -->
                <div class="col-span-full sm:col-span-6 lg:col-span-4 p-3 sm:p-7 dk-border-one rounded-xl h-full dk-theme-card-square">
                    <h6 class="leading-none text-gray-900 dark:text-dark-text">Balance</h6>
                    <div class="pt-3 flex gap-3.5 mt-1.5 overflow-hidden">
                        <div class="grow shrink-0">
                            <div class="flex items-center gap-2 mb-2.5">
                                <div class="card-title text-[42px]">
                                    $<span class="counter-value" data-value="7869">0</span>
                                </div>
                                <div class="flex-center text-danger size-7 rounded-50 border border-danger">
                                    <i class="ri-arrow-down-line text-inherit"></i>
                                </div>
                            </div>
                            <div class="leading-none text-gray-500 dark:text-dark-text">
                                Currant balance
                            </div>
                        </div>
                        <div class="self-center">
                            <div id="totalBalance"></div>
                        </div>
                    </div>
                </div>
                <!-- Instructor Total Earning Chart -->
                <div class="col-span-full sm:col-span-6 lg:col-span-4 p-3 sm:p-7 dk-border-one rounded-xl h-full dk-theme-card-square">
                    <h6 class="leading-none text-gray-900 dark:text-dark-text">Total Earnings</h6>
                    <div class="pt-3 flex gap-3.5 mt-1.5 overflow-hidden">
                        <div class="grow shrink-0">
                            <div class="flex items-center gap-2 mb-2.5">
                                <div class="card-title text-[42px]">
                                    $<span class="counter-value" data-value="90267">0</span>
                                </div>
                                <div class="flex-center text-secondary size-7 rounded-50 border border-secondary">
                                    <i class="ri-arrow-up-line text-inherit"></i>
                                </div>
                            </div>
                            <div class="leading-none text-gray-500 dark:text-dark-text">
                                Total earning values
                            </div>
                        </div>
                        <div class="self-center">
                            <div id="totalEarning"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-0">
        <!-- Start Payout Information Table -->
        <div class="overflow-x-auto scrollbar-table">
            <table class="table-auto w-full whitespace-nowrap text-left text-gray-900 dark:text-dark-text font-medium leading-none">
                <thead class="border-b-[0.5px] border-gray-200 dark:border-dark-border text-gray-500 dark:text-dark-text font-semibold">
                    <tr>
                        <th class="px-7 py-6">Payment ID</th>
                        <th class="px-7 py-6">Date</th>
                        <th class="px-7 py-6">Status</th>
                        <th class="px-7 py-6">Amount</th>
                        <th class="px-7 py-6 w-10">Invoice</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#7695-249...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Apr 21, at 10:30 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-secondary-outline">Complete</span></td>
                        <td class="px-7 py-6">$1,199</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#8423-158...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">May 10, at 9:15 AM</td>
                        <td class="px-7 py-6"><span class="badge badge-warning-outline">Pending</span></td>
                        <td class="px-7 py-6">$999</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#4732-786...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Jun 15, at 2:45 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-secondary-outline">Complete</span></td>
                        <td class="px-7 py-6">$1,499</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#9514-237...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Aug 12, at 6:00 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-danger-outline">Cancelled</span></td>
                        <td class="px-7 py-6">$1,050</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#6745-389...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Sep 22, at 3:20 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-secondary-outline">Complete</span></td>
                        <td class="px-7 py-6">$1,899</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#8943-720...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Oct 05, at 8:45 AM</td>
                        <td class="px-7 py-6"><span class="badge badge-warning-outline">Pending</span></td>
                        <td class="px-7 py-6">$2,299</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#3654-289...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Nov 17, at 5:30 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-secondary-outline">Complete</span></td>
                        <td class="px-7 py-6">$1,050</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#4819-660...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Jan 28, at 7:00 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-warning-outline">Pending</span></td>
                        <td class="px-7 py-6">$1,400</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-primary-200/50 dark:hover:bg-dark-icon hover:text-gray-500 dark:hover:text-dark-text group/tr"> 
                        <td class="px-7 py-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-bank-card-line text-2xl text-inherit"></i>
                                <div class="flex items-center">
                                    <h6 class="text-lg leading-none text-heading font-bold">#9205-444...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Feb 14, at 1:00 PM</td>
                        <td class="px-7 py-6"><span class="badge badge-danger-outline">Cancelled</span></td>
                        <td class="px-7 py-6">$1,750</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Payout Information Table -->

        <!-- Start Pagination -->
        <div class="px-3 sm:px-7 py-4 border-t border-gray-200 dark:border-dark-border">
            <div class="flex-center-between">
                <div class="leading-none text-xs font-semibold text-gray-900 dark:text-dark-text">Showing 4 of 20 entries</div>
                <ul class="flex items-center gap-1 5 *:text-xs *:text-gray-900 dark:text-dark-text">
                    <li>
                        <a href="#" class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center hover:border-none hover:bg-primary-500 hover:text-white">01</a>
                    </li>
                    <li>
                        <a href="#" class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center hover:border-none hover:bg-primary-500 hover:text-white">02</a>
                    </li>
                    <li>
                        <a href="#" class="size-6 border-[0.5px] border-gray-900/50 rounded-[5px] flex-center hover:border-none hover:bg-primary-500 hover:text-white">03</a>
                    </li>
                    <li>
                        <a href="#" class="size-6 border-[0.5px] border-transparent hover:border-gray-900/50 rounded-[5px] flex-center bg-primary-500 hover:bg-transparent text-white hover:text-gray-900 dark:text-dark-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
                                <path d="M10.9593 5L1 5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.94254 1L10.9595 4.99967L6.94254 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Pagination -->
    </div>
</div>
@endsection