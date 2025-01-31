@extends('dashboard.pages.lesson.layout-quiz')

@section('content')
    <div class="lg:col-start-4 lg:col-span-9 flex flex-col items-center justify-center text-center space-y-6">
        <p id="timer" class="text-lg my-4 font-semibold"></p>
        @php
            $counter = 1; // Variabel penghitung untuk nomor pertanyaan
        @endphp
        @foreach ($quizzes->questions as $question)
            <div class="w-full max-w-2xl bg-gray-light shadow-lg p-6 rounded-lg quiz-container">
                <div class="card">
                    <!-- Pertanyaan diatur rata kiri -->
                    <p class="text-lg font-semibold mb-4 text-left">{{ $counter }}. {{ $question->question }}</p>

                    <!-- Pilihan juga diatur rata kiri -->
                    <ul class="space-y-2">
                        @foreach ($question->options as $option)
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-a-{{ $option->id }}"
                                    name="answer[{{ $question->id }}]" data-question-id="{{ $question->id }}" type="radio"
                                    value="{{ $option->id }}" />
                                <label class="text-left" for="option-a-{{ $option->id }}">{{ $option->option_a }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-b-{{ $option->id }}"
                                    name="answer[{{ $question->id }}]" data-question-id="{{ $question->id }}"
                                    type="radio" value="{{ $option->id }}" />
                                <label class="text-left"
                                    for="option-b-{{ $option->id }}">{{ $option->option_b }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-c-{{ $option->id }}"
                                    name="answer[{{ $question->id }}]" data-question-id="{{ $question->id }}"
                                    type="radio" value="{{ $option->id }}" />
                                <label class="text-left"
                                    for="option-c-{{ $option->id }}">{{ $option->option_c }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-d-{{ $option->id }}"
                                    name="answer[{{ $question->id }}]" data-question-id="{{ $question->id }}"
                                    type="radio" value="{{ $option->id }}" />
                                <label class="text-left"
                                    for="option-d-{{ $option->id }}">{{ $option->option_d }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-e-{{ $option->id }}"
                                    name="answer[{{ $question->id }}]" data-question-id="{{ $question->id }}"
                                    type="radio" value="{{ $option->id }}" />
                                <label class="text-left"
                                    for="option-e-{{ $option->id }}">{{ $option->option_e }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @php
                $counter++; // Increment nomor pertanyaan
            @endphp
        @endforeach
        <footer class="footer">
            <button id="finishQuiz" class="finish-btn">Selesai</button>
        </footer>
    </div>

    @php
        use Carbon\Carbon;

        $endTime = $start_quiz->waktu_akhir ? Carbon::parse($start_quiz->waktu_akhir)->toIso8601String() : null;
    @endphp

    <script>
        function startCooldown(endDatetime) {
            function updateTimer() {
                let now = new Date();
                let end = new Date(endDatetime);

                let diff = end - now;

                if (diff <= 0) {
                    $('#timer').text("Waktu habis!");
                    clearInterval(interval);
                    alert("Waktu ujian telah habis!");
                    return;
                }

                let sisaJam = Math.floor(diff / (1000 * 60 * 60));
                let sisaMenit = Math.floor((diff / 1000 / 60) % 60);
                let sisaDetik = Math.floor((diff / 1000) % 60);

                $('#timer').text(`${sisaJam} jam ${sisaMenit} menit ${sisaDetik} detik`);
            }

            updateTimer();
            let interval = setInterval(updateTimer, 1000);
        }

        $(function() {
            let endTime = {!! json_encode($endTime) !!}; // Konversi PHP ke JavaScript
            if (endTime) {
                startCooldown(endTime);
            } else {
                $('#timer').text("Waktu tidak tersedia.");
            }
        });

        $(document).ready(function() {
            $('#finishQuiz').on('click', function() {
                let startQuizId = $('#start_quiz_id').val(); // Ambil nilai start_quiz_id
                let answers = [];

                $('.question').each(function() {
                    let questionId = $(this).data('question-id');
                    let selectedOption = $(this).find('input[type="radio"]:checked').val();

                    if (selectedOption) {
                        answers.push({
                            question_id: questionId,
                            option_id: selectedOption
                        });
                    } else {
                        alert("Silakan jawab semua pertanyaan sebelum menyelesaikan kuis.");
                        return false; // Hentikan proses jika ada pertanyaan yang belum dijawab
                    }
                });

                if (answers.length !== $('.question').length) {
                    alert("Silakan jawab semua pertanyaan sebelum menyelesaikan kuis.");
                    return;
                }

                $.ajax({
                    url: "{{ route('submit.quiz') }}",
                    type: "POST",
                    data: JSON.stringify({
                        start_quiz_id: startQuizId, // Menggunakan start_quiz_id
                        answers: answers
                    }),
                    contentType: "application/json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        window.location.href = "/course/{course:slug}/quiz/{modul:slug}";
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert("Terjadi kesalahan saat mengirim jawaban. Silakan coba lagi.");
                    }
                });
            });
        });
    </script>
@endsection
