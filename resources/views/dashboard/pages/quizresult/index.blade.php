@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | My Quiz Attempts')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- quize attempts area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div class="mb-3 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-start justify-between flex-col sm:flex-row">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark mb-3">Semua Quiz Terkirim</h2>
                <a href="{{ route('quiz.index') }}" for="modalToggle"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer mb-3">
                    Quiz
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-arrow-right">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
            <!-- filter content -->
            <div class="grid grid-cols md:grid-cols-3 xl:grid-cols-12 gap-x-30px">
                <div class="xl:col-start-1 xl:col-span-6">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        Kategori Kursus
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option selected="" value="All">All</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Graphic">Graphic</option>
                            <option value="English">English</option>
                            <option value="Spoken English">Spoken English</option>
                            <option value="Art Painting">Art Painting</option>
                            <option value="App Development">App Development</option>
                            <option value="Spoken English">Web Application</option>
                            <option value="Spoken English">Php Development</option>
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>
                <div class="xl:col-start-10 xl:col-span-6">
                    <p
                        class="text-xs leading-1.8 tracking-[.5px] uppercase text-bodyColor dark:text-bodyColor-dark mb-6px font-semibold opacity-50">
                        Status Kursus
                    </p>
                    <div class="bg-whiteColor rounded-md relative">
                        <select
                            class="bg-transparent text-darkBlue w-full p-13px focus:outline-none block appearance-none leading-1.5 relative z-20 focus:shadow-select rounded-md">
                            <option selected="" value="semua">Semua</option>
                            <option value="gratis">Gratis</option>
                            <option value="berbayar">Berbayar</option>
                        </select>
                        <i class="icofont-simple-down absolute top-1/2 right-3 -translate-y-1/2 block text-lg z-10"></i>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-contentColor opacity-35">
            <!-- main content -->
            <div class="overflow-auto">
                <table class="w-full text-center text-nowrap">
                    <thead
                        class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                        <tr>
                            <th class="px-5px py-10px md:px-5">Quiz</th>
                            <th class="px-5px py-10px md:px-5">Student</th>
                            <th class="px-5px py-10px md:px-5">Tanggal</th>
                            <th class="px-5px py-10px md:px-5">Duration</th>
                            <th class="px-5px py-10px md:px-5">Benar</th>
                            <th class="px-5px py-10px md:px-5">Salah</th>
                            <th class="px-5px py-10px md:px-5">Total</th>
                            <th class="px-5px py-10px md:px-5">Status</th>
                            <th class="px-5px py-10px md:px-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                        @foreach ($quizResults as $result)
                            <tr class="leading-1.8 md:leading-1.8">
                                <td class="px-5px py-10px md:px-5 font-normal text-left">
                                    <p
                                        class="text-blackColor dark:text-blackColor-dark font-bold break-words whitespace-normal">
                                        {{ $result->quiz->name }}
                                    </p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $result->user->name }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $result->date_quiz }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $result->completed_at }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $result->correct_answer }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $result->wrong_answers }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $result->total_score }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p class="text-xs">
                                        <span
                                            class="h-22px inline-block px-7px leading-22px font-bold text-whiteColor rounded-md {{ $result->status == 'lulus' ? 'bg-greencolor2' : 'bg-redcolor2' }}">
                                            {{ ucfirst($result->status) }}
                                        </span>
                                    </p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <button data-modal-target="modal-{{ $result->id }}"
                                        data-modal-toggle="modal-{{ $result->id }}"
                                        class="flex items-center gap-1 text-sm font-bold text-whiteColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
