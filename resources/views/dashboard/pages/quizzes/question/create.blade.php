@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Create Question')

@section('content')
    <div
        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
        <h1 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark mb-6">Tambah Pertanyaan</h1>

        <form action="{{ route('questions.store', $quizzes->slug) }}" method="POST" class="space-y-6">
            @csrf

            <!-- Question -->
            <div>
                <label for="question"
                    class="block text-sm font-medium text-blackColor dark:text-blackColor-dark">Pertanyaan</label>
                <textarea name="question" id="question" rows="4"
                    class="mt-1 block w-full p-2 border-gray-300 dark:border-gray-700 bg-transparent dark:bg-transparent-dark rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the question"></textarea>
            </div>

            <!-- Score -->
            <div>
                <label for="score"
                    class="block text-sm font-medium text-blackColor dark:text-blackColor-dark">Score</label>
                <input type="number" name="score" id="score"
                    class="mt-1 block w-full p-2 border-gray-300 dark:border-gray-700 bg-transparent dark:bg-transparent-dark rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the score" min="0">
            </div>

            <!-- Submit Button -->
            <div class="flex gap-2 pt-8">
                <button type="submit"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Buat Pertanyaan
                </button>
                <a href="{{ route('quiz.show', $quizzes->slug) }}"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-secondaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
