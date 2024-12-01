@extends('lfcms.layouts.app')
@section('page_title', 'Pembayaran | Learn Flow CMS')
@section('content')
<div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
    <div class="card p-0 overflow-hidden">
        <div class="flex flex-col gap-2 sm:flex-center-between sm:flex-row px-4 py-5 sm:p-7 bg-gray-200/30 dark:bg-dark-card-two">
            <div>
                <h6 class="card-title">Payment Account</h6>
            </div>
            <select class="form-input form-select self-end sm:self-auto">
                <option value="last-year">Last Year</option>
                <option value="last-month">Last Month</option>
                <option value="last-week">Last Week</option>
            </select>
        </div>
        <div class="m-3 sm:m-7">
            <div class="flex flex-col md:flex-row gap-7">
                <div class="px-6 pr-5 py-7 dk-border-one rounded-15 sm:rounded-25 flex items-center gap-2 shrink-0 xl:min-w-[370px] dk-theme-card-square">
                    <div class="shrink-0">
                        <h6 class="card-title">Total Transactions</h6>
                        <div class="card-title text-[42px] mt-5">
                            $<span class="counter-value" data-value="3356">0</span>
                        </div>
                        <ul class="list-inside list-disc leading-[1.3] *:marker:text-primary-500 text-xs text-gray-500 dark:text-dark-text mt-4">
                            <li>Purchase Course</li>
                            <li>Assignment</li>
                            <li>Get Certificates</li>
                        </ul>
                    </div>
                    <div class="ml-auto hidden sm:block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="116" height="96" viewBox="0 0 116 96" fill="none">
                            <path opacity="0.5" d="M18.0099 9.55254C19.1692 3.98791 24.0735 0 29.7577 0H101.242C108.854 0 114.543 6.99569 112.99 14.4475L97.9901 86.4475C96.8308 92.0121 91.9265 96 86.2423 96H14.7577C7.14589 96 1.45743 89.0043 3.00989 81.5526L18.0099 9.55254Z" fill="#F2ECFE" class="dark:fill-dark-icon"/>
                            <path d="M85.2491 45.7491H31.0811L58.1651 29.082L85.2491 45.7491Z" fill="white" class="dark:fill-dark-body"/>
                            <path d="M31.0813 47.8326H37.3314V64.4997H33.1647C32.6121 64.4997 32.0822 64.7192 31.6915 65.1099C31.3008 65.5006 31.0813 66.0305 31.0813 66.5831C31.0813 67.1356 31.3008 67.6655 31.6915 68.0562C32.0822 68.447 32.6121 68.6665 33.1647 68.6665H83.166C83.7185 68.6665 84.2484 68.447 84.6391 68.0562C85.0299 67.6655 85.2494 67.1356 85.2494 66.5831C85.2494 66.0305 85.0299 65.5006 84.6391 65.1099C84.2484 64.7192 83.7185 64.4997 83.166 64.4997H78.9992V47.8326H85.2494C85.7027 47.8321 86.1434 47.6838 86.5048 47.4102C86.8663 47.1366 87.1285 46.7525 87.252 46.3164C87.3754 45.8802 87.3531 45.4156 87.1887 44.9932C87.0242 44.5708 86.7264 44.2136 86.3405 43.9757L59.2565 27.3086C58.9283 27.1068 58.5506 27 58.1653 27C57.7801 27 57.4023 27.1068 57.0741 27.3086L29.9901 43.9757C29.6042 44.2136 29.3065 44.5708 29.142 44.9932C28.9775 45.4156 28.9553 45.8802 29.0787 46.3164C29.2021 46.7525 29.4644 47.1366 29.8258 47.4102C30.1872 47.6838 30.628 47.8321 31.0813 47.8326ZM41.4982 47.8326H49.8318V64.4997H41.4982V47.8326ZM62.3321 47.8326V64.4997H53.9985V47.8326H62.3321ZM74.8324 64.4997H66.4989V47.8326H74.8324V64.4997ZM58.1653 31.5275L77.8898 43.6658H38.4409L58.1653 31.5275Z" fill="#795DED"/>
                        </svg>
                    </div>
                </div>
                <div class="px-6 pr-5 py-7 dk-border-one rounded-15 sm:rounded-25 flex items-center gap-2 shrink-0 xl:min-w-[370px] dk-theme-card-square">
                    <div class="shrink-0">
                        <h6 class="card-title">Total Balance</h6>
                        <div class="card-title text-[42px] mt-5">
                            $<span class="counter-value" data-value="7799">0</span>
                        </div>
                        <ul class="list-inside list-disc leading-[1.3] *:marker:text-primary-500 text-xs text-gray-500 dark:text-dark-text mt-4">
                            <li>Purchase Course</li>
                            <li>Assignment</li>
                            <li>Get Certificates</li>
                        </ul>
                    </div>
                    <div class="ml-auto hidden sm:block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="116" height="96" viewBox="0 0 116 96" fill="none">
                            <path opacity="0.5" d="M18.0099 9.55254C19.1692 3.98791 24.0735 0 29.7577 0H101.242C108.854 0 114.543 6.99569 112.99 14.4475L97.9901 86.4475C96.8308 92.0121 91.9265 96 86.2423 96H14.7577C7.14589 96 1.45743 89.0043 3.00989 81.5526L18.0099 9.55254Z" fill="#F2ECFE" class="dark:fill-dark-icon"/>
                            <path d="M81.0777 47.9998C81.0777 52.564 79.7242 57.0256 77.1885 60.8206C74.6528 64.6156 71.0487 67.5734 66.8319 69.3201C62.6152 71.0667 57.9752 71.5237 53.4987 70.6333C49.0222 69.7428 44.9103 67.545 41.6829 64.3176C38.4555 61.0903 36.2577 56.9783 35.3673 52.5019C34.4768 48.0254 34.9338 43.3854 36.6805 39.1686C38.4271 34.9519 41.3849 31.3477 45.1799 28.812C48.9749 26.2763 53.4366 24.9229 58.0008 24.9229C64.1211 24.9229 69.9908 27.3542 74.3186 31.6819C78.6464 36.0097 81.0777 41.8794 81.0777 47.9998Z" fill="white" class="dark:fill-dark-body"/>
                            <path d="M58 23C53.0555 23 48.222 24.4662 44.1108 27.2133C39.9995 29.9603 36.7952 33.8648 34.903 38.4329C33.0108 43.0011 32.5157 48.0277 33.4804 52.8773C34.445 57.7268 36.826 62.1814 40.3223 65.6777C43.8187 69.174 48.2732 71.555 53.1227 72.5196C57.9723 73.4842 62.9989 72.9892 67.5671 71.097C72.1352 69.2048 76.0397 66.0005 78.7867 61.8892C81.5338 57.778 83 52.9445 83 48C82.993 41.3717 80.3568 35.017 75.6699 30.3301C70.983 25.6432 64.6283 23.007 58 23ZM58 69.1538C53.8162 69.1538 49.7263 67.9132 46.2476 65.5888C42.7688 63.2644 40.0575 59.9606 38.4564 56.0952C36.8553 52.2299 36.4364 47.9765 37.2526 43.8731C38.0689 39.7696 40.0836 36.0004 43.042 33.042C46.0004 30.0836 49.7697 28.0688 53.8731 27.2526C57.9765 26.4364 62.2299 26.8553 66.0952 28.4564C69.9606 30.0575 73.2644 32.7688 75.5888 36.2475C77.9132 39.7263 79.1538 43.8162 79.1538 48C79.1475 53.6084 76.9167 58.9853 72.951 62.951C68.9853 66.9167 63.6084 69.1475 58 69.1538ZM67.6154 52.8077C67.6154 54.5928 66.9063 56.3048 65.644 57.5671C64.3817 58.8293 62.6697 59.5385 60.8846 59.5385H59.9231V61.4615C59.9231 61.9716 59.7205 62.4607 59.3598 62.8214C58.9992 63.182 58.51 63.3846 58 63.3846C57.49 63.3846 57.0008 63.182 56.6402 62.8214C56.2795 62.4607 56.0769 61.9716 56.0769 61.4615V59.5385H52.2308C51.7207 59.5385 51.2316 59.3358 50.871 58.9752C50.5103 58.6146 50.3077 58.1254 50.3077 57.6154C50.3077 57.1053 50.5103 56.6162 50.871 56.2556C51.2316 55.8949 51.7207 55.6923 52.2308 55.6923H60.8846C61.6497 55.6923 62.3834 55.3884 62.9243 54.8474C63.4653 54.3064 63.7692 53.5727 63.7692 52.8077C63.7692 52.0426 63.4653 51.3089 62.9243 50.768C62.3834 50.227 61.6497 49.9231 60.8846 49.9231H55.1154C53.3303 49.9231 51.6183 49.2139 50.356 47.9517C49.0938 46.6894 48.3846 44.9774 48.3846 43.1923C48.3846 41.4072 49.0938 39.6952 50.356 38.4329C51.6183 37.1707 53.3303 36.4615 55.1154 36.4615H56.0769V34.5385C56.0769 34.0284 56.2795 33.5393 56.6402 33.1786C57.0008 32.818 57.49 32.6154 58 32.6154C58.51 32.6154 58.9992 32.818 59.3598 33.1786C59.7205 33.5393 59.9231 34.0284 59.9231 34.5385V36.4615H63.7692C64.2793 36.4615 64.7684 36.6641 65.1291 37.0248C65.4897 37.3854 65.6923 37.8746 65.6923 38.3846C65.6923 38.8946 65.4897 39.3838 65.1291 39.7444C64.7684 40.1051 64.2793 40.3077 63.7692 40.3077H55.1154C54.3503 40.3077 53.6166 40.6116 53.0757 41.1526C52.5347 41.6935 52.2308 42.4273 52.2308 43.1923C52.2308 43.9574 52.5347 44.6911 53.0757 45.232C53.6166 45.773 54.3503 46.0769 55.1154 46.0769H60.8846C62.6697 46.0769 64.3817 46.786 65.644 48.0483C66.9063 49.3106 67.6154 51.0226 67.6154 52.8077Z" fill="#795DED"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-0">
        <!-- Start Payment Information Table -->
        <div class="overflow-x-auto scrollbar-table">
            <table class="table-auto w-full whitespace-nowrap text-left text-gray-900 dark:text-dark-text font-medium leading-none">
                <thead>    
                    <tr>
                        <th class="px-7 py-6">Payment ID</th>
                        <th class="px-7 py-6">Date</th>
                        <th class="px-7 py-6">Course</th>
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
                        <td class="px-7 py-6">JavaScript from Beginner to Advance 2024...</td>
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
                        <td class="px-7 py-6">Python for Data Science 2024...</td>
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
                        <td class="px-7 py-6">React Native Development 2024...</td>
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
                                    <h6 class="text-lg leading-none text-heading font-bold">#3281-459...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Jul 04, at 11:30 AM</td>
                        <td class="px-7 py-6">Full Stack Web Development 2024...</td>
                        <td class="px-7 py-6"><span class="badge badge-info-outline">In Progress</span></td>
                        <td class="px-7 py-6">$1,299</td>
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
                        <td class="px-7 py-6">Data Structures and Algorithms 2024...</td>
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
                        <td class="px-7 py-6">Machine Learning with Python 2024...</td>
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
                        <td class="px-7 py-6">Deep Learning for AI 2024...</td>
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
                        <td class="px-7 py-6">Introduction to Blockchain 2024...</td>
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
                                    <h6 class="text-lg leading-none text-heading font-bold">#7392-511...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Dec 11, at 4:00 PM</td>
                        <td class="px-7 py-6">Advanced CSS and Sass 2024...</td>
                        <td class="px-7 py-6"><span class="badge badge-info-outline">In Progress</span></td>
                        <td class="px-7 py-6">$850</td>
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
                        <td class="px-7 py-6">Cybersecurity Fundamentals 2024...</td>
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
                        <td class="px-7 py-6">AI and Machine Learning 2024...</td>
                        <td class="px-7 py-6"><span class="badge badge-danger-outline">Cancelled</span></td>
                        <td class="px-7 py-6">$1,750</td>
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
                                    <h6 class="text-lg leading-none text-heading font-bold">#3856-733...</h6>
                                    <p>(Credit card)</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-7 py-6">Mar 03, at 2:30 PM</td>
                        <td class="px-7 py-6">Mobile App Development 2024...</td>
                        <td class="px-7 py-6"><span class="badge badge-info-outline">In Progress</span></td>
                        <td class="px-7 py-6">$1,200</td>
                        <td class="px-7 py-6">
                            <a href="#" class="size-8 flex-center rounded-50 bg-primary-200 dark:bg-dark-icon">
                                <i class="ri-download-cloud-2-line text-primary-500"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Payment Information Table -->

        <!-- Start Pagination -->
        <div class="px-3 sm:px-6 py-4  border-t border-gray-200 dark:border-dark-border">
            <div class="flex-center-between mt-4">
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