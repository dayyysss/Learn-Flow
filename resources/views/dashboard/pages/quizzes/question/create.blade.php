@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Create Question')

@section('content')
    <div
        class="p-4 md:p-10 mb-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Create Question</h1>

        <form action="{{ route('questions.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Quiz ID -->
            <div>
                <label for="quiz_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quiz</label>
                <select name="quiz_id" id="quiz_id" class="mt-1 block w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select a quiz</option>
                    @foreach ($quizzes as $quiz)
                        <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Question -->
            <div>
                <label for="question" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Question</label>
                <textarea name="question" id="question" rows="4" class="mt-1 block w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter the question"></textarea>
            </div>

            <!-- Score -->
            <div>
                <label for="score" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Score</label>
                <input type="number" name="score" id="score" class="mt-1 block w-full p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter the score" min="0">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="inline-block px-6 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg shadow-md hover:bg-blue-700 transition">
                    Save Question
                </button>
                <a href="{{ route('questions.index') }}" class="inline-block px-6 py-2 bg-gray-600 text-white font-medium text-sm rounded-lg shadow-md hover:bg-gray-700 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection