@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div class="p-4 md:p-10 mb-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <!-- heading -->
        <div class="mb-6 pb-4 border-b-2 border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $quiz->name }}</h1>
        </div>
        <div class="space-y-2 text-gray-700 dark:text-gray-300">
            <p><strong>Kursus:</strong> {{ $quiz->course->name }}</p>
            <p><strong>Bab:</strong> {{ $quiz->bab->name }}</p>
            <p><strong>Waktu Mulai:</strong> {{ $quiz->start_time }}</p>
            <p><strong>Waktu Selesai:</strong> {{ $quiz->end_time }}</p>
            <p><strong>Deskripsi:</strong> {{ $quiz->description }}</p>
        </div>

        <div class="mb-6 pb-4 pt-8 border-b-2 border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Pertanyaan</h1>
            <!-- Add Button -->
            <div class="pb-2 flex justify-start">
                <a href="{{ route('questions.create') }}"
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
                    <div class="text-gray-800 dark:text-gray-200 font-medium">{{ $counter }}. {{ $question->question }}
                    </div>
                    <ul class="list-disc pl-8 text-sm text-gray-600 dark:text-gray-400 mt-2">
                        @foreach ($question->options as $option)
                            <li><strong>A.</strong> {{ $option->option_a }}</li>
                            <li><strong>B.</strong> {{ $option->option_b }}</li>
                            <li><strong>C.</strong> {{ $option->option_c }}</li>
                            <li><strong>D.</strong> {{ $option->option_d }}</li>
                            <li><strong>E.</strong> {{ $option->option_e }}</li>
                        @endforeach
                    </ul>
                    <p class="mt-3 text-gray-700 dark:text-gray-400"><strong>Jawaban yang benar:</strong>
                        {{ $option->correct_answer }}</p>
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
