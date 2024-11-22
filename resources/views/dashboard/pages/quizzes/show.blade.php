@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div class="container">
        <h1>{{ $quiz->name }}</h1>
        <p><strong>Slug:</strong> {{ $quiz->slug }}</p>
        <p><strong>Start Time:</strong> {{ $quiz->start_time }}</p>
        <p><strong>End Time:</strong> {{ $quiz->end_time }}</p>

        <h3>Questions</h3>
        <ul>
            @php
                $counter = 1; // Variabel penghitung untuk nomor pertanyaan
            @endphp
            @foreach ($quiz->questions as $question)
                <li>{{ $counter }}.{{ $question->question }}
                    <ul class="list-disc pl-5">
                        @foreach ($question->options as $option)
                            <li><strong>A.</strong>{{ $option->option_a }}</li>
                            <li><strong>B.</strong>{{ $option->option_b }}</li>
                            <li><strong>C.</strong>{{ $option->option_c }}</li>
                            <li><strong>D.</strong>{{ $option->option_d }}</li>
                            <li><strong>E.</strong>{{ $option->option_e }}</li>
                        @endforeach
                    </ul>
                    <p class="mt-2"><strong>Jawaban yang benar:</strong> {{ $option->correct_answer }} </p>
                </li>
                @php
                    $counter++; // Increment nomor pertanyaan
                @endphp
            @endforeach
        </ul>

        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Back to Quizzes</a>
    </div>
@endsection
