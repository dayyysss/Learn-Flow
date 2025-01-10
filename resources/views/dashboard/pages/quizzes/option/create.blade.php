@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Create Question')

@section('content')
    <div
        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
        <h1 class="text-2xl font-bold mb-4">Buat Opsi untuk Quiz: {{ $quiz->name }}</h1>
        <form method="POST" action="{{ route('options.store', $quiz->slug) }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Pertanyaan</label>
                <select name="question_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="" disabled selected>Pilih Pertanyaan Terlebih Dahulu</option>
                    @foreach ($quiz->questions as $question)
                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                    @endforeach
                </select>
            </div>
            <div id="options-container" class="mb-4 space-y-4">
                <label class="block text-gray-700">Pilihan Ganda</label>
                <!-- Opsi A -->
                <div class="flex items-center space-x-4">
                    <span class="font-bold">A.</span>
                    <input type="text" name="options[]" class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Masukkan opsi jawaban" required>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="correct_answer" value="1" class="form-radio">
                        <span>Benar</span>
                    </label>
                </div>
                <!-- Opsi B -->
                <div class="flex items-center space-x-4">
                    <span class="font-bold">B.</span>
                    <input type="text" name="options[]" class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Masukkan opsi jawaban" required>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="correct_answer" value="2" class="form-radio">
                        <span>Benar</span>
                    </label>
                </div>
                <!-- Opsi C -->
                <div class="flex items-center space-x-4">
                    <span class="font-bold">C.</span>
                    <input type="text" name="options[]" class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Masukkan opsi jawaban" required>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="correct_answer" value="3" class="form-radio">
                        <span>Benar</span>
                    </label>
                </div>
                <!-- Opsi D -->
                <div class="flex items-center space-x-4">
                    <span class="font-bold">D.</span>
                    <input type="text" name="options[]" class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Masukkan opsi jawaban" required>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="correct_answer" value="4" class="form-radio">
                        <span>Benar</span>
                    </label>
                </div>
                <!-- Opsi E -->
                <div class="flex items-center space-x-4">
                    <span class="font-bold">E.</span>
                    <input type="text" name="options[]" class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Masukkan opsi jawaban" required>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="correct_answer" value="5" class="form-radio">
                        <span>Benar</span>
                    </label>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="flex gap-2 pt-8">
                <button type="submit"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Buat Opsi
                </button>
                <a href="{{ route('quiz.show', $quiz->slug) }}"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-secondaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
