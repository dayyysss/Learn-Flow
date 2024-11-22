@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- quize attempts area -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <!-- heading -->
            <div
                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">Quiz</h2>
                <a href="{{ route('quizResults.index') }}" for="modalToggle"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-arrow-left">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 5 5 12 12 19"></polyline>
                    </svg>
                    Kembali
                </a>
            </div>
            <!-- Add Button -->
            <div class="pb-2 flex justify-start">
                <a href="{{ route('quiz.create') }}"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus-circle">
                        <path d="M12 5v14m7-7H5" />
                    </svg>
                    Buat Quiz Baru
                </a>
            </div>
            <hr class="my-4 border-contentColor opacity-35">
            <!-- main content -->
            <div class="overflow-auto">
                <table class="w-full text-center text-nowrap">
                    <thead
                        class="text-sm md:text-base text-blackColor dark:text-blackColor-dark bg-lightGrey5 dark:bg-whiteColor-dark leading-1.8 md:leading-1.8">
                        <tr>
                            <th class="px-5px py-10px md:px-5">Nama</th>
                            <th class="px-5px py-10px md:px-5">Waktu Mulai</th>
                            <th class="px-5px py-10px md:px-5">Waktu Selesai</th>
                            <th class="px-5px py-10px md:px-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-size-13 md:text-base text-contentColor dark:text-contentColor-dark font-normal">
                        @foreach ($quizzes as $quiz)
                            <tr class="leading-1.8 md:leading-1.8">
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $quiz->name }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $quiz->start_time }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5">
                                    <p>{{ $quiz->end_time }}</p>
                                </td>
                                <td class="px-5px py-10px md:px-5 flex justify-center gap-2">
                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="{{ route('quiz.show', $quiz->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path
                                                d="M12 4C6.48 4 2 7.58 2 12s4.48 8 10 8 10-3.58 10-8-4.48-8-10-8zm0 14c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z">
                                            </path>
                                        </svg>
                                    </a>

                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="{{ route('quiz.edit', $quiz->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>

                                    <a class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-secondaryColor h-30px w-full px-14px leading-30px justify-center rounded-md my-5px"
                                        href="{{ route('quiz.destroy', $quiz->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $quiz->id }}').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </a>

                                    <form id="delete-form-{{ $quiz->id }}"
                                        action="{{ route('quiz.destroy', $quiz->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
