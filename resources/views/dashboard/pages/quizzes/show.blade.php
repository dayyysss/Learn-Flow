@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div
        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
        <!-- heading -->
        <div class="mb-6 pb-4 border-b-2 border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">{{ $quiz->name }}</h1>
        </div>
        <div class="space-y-2 text-blackColor dark:text-blackColor-dark">
            <p><strong>Kursus:</strong> {{ $quiz->course->name }}</p>
            <p><strong>Bab:</strong> {{ $quiz->bab->name }}</p>
            <p><strong>Waktu Mulai:</strong> {{ $quiz->waktu }}</p>
            {{-- <p><strong>Waktu Selesai:</strong> {{ $quiz->end_time }}</p> --}}
            <p><strong>Deskripsi:</strong> {{ $quiz->description }}</p>
        </div>

        <div class="mb-6 pb-4 pt-8 border-b-2 border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">Pertanyaan</h1>
            <!-- Add Button -->
            <div class="pb-2 flex justify-start">
                <a href="{{ route('questions.create', $quiz->slug) }}"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-whiteColor-dark border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus-circle">
                        <path d="M12 5v14m7-7H5" />
                    </svg>
                    Buat Pertanyaan
                </a>
            </div>
        </div>

        <ul class="space-y-6">
            @php
                $counter = 1; // Variabel penghitung untuk nomor pertanyaan
            @endphp
            @foreach ($quiz->questions as $question)
                <li>
                    <div class="text-blackColor dark:text-blackColor-dark font-medium">
                        {{ $counter }}. {{ $question->question }}
                        <a href="{{ route('questions.edit', $quiz->slug) }}"
                            class="ml-4 text-green-600 hover:text-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                            +
                        </a>
                        <a href="{{ route('questions.destroy', $quiz->slug) }}"
                            class="ml-2 text-red-600 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200">
                            x
                        </a>
                    </div>
                    <ul class="list-disc pl-8 text-sm text-blackColor dark:text-blackColor-dark mt-2">
                        @foreach ($question->options as $option)
                            <li><strong>A.</strong> {{ $option->option_a }}</li>
                            <li><strong>B.</strong> {{ $option->option_b }}</li>
                            <li><strong>C.</strong> {{ $option->option_c }}</li>
                            <li><strong>D.</strong> {{ $option->option_d }}</li>
                            <li><strong>E.</strong> {{ $option->option_e }}</li>
                            <p><strong>Jawaban yang benar: {{ $option->correct_answer }} </strong></p>
                        @endforeach
                    </ul>
                </li>
                @php
                    $counter++; // Increment nomor pertanyaan
                @endphp
            @endforeach
        </ul>

        <div class="flex gap-2 pt-8">
            <a href="{{ route('quiz.index') }}"
                class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-secondaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                Kembali
            </a>
        </div>
    </div>
@endsection
