@extends('dashboard.pages.lesson.layout-quiz')

@section('content')
    <div class="flex flex-col items-center justify-center space-y-6 text-center lg:col-span-9 lg:col-start-4">
        <p class="my-4 text-lg font-semibold" id="timer"></p>
        @php
            $counter = 1; // Variabel penghitung untuk nomor pertanyaan
        @endphp

        <input id="start_quiz_id" type="hidden" value="{{ $start_quiz->id }}">

        @foreach ($quizzes->questions as $question)
            <div class="bg-gray-light quiz-container w-full max-w-2xl rounded-lg p-6 shadow-lg">
                <div class="card">
                    <!-- Pertanyaan diatur rata kiri -->
                    <p class="mb-4 text-left text-lg font-semibold">{{ $counter }}. {{ $question->question }}</p>

                    <!-- Pilihan juga diatur rata kiri -->
                    <ul class="space-y-2">
                        @foreach ($question->options as $option)
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-a-{{ $option->id }}"
                                    name="answer_{{ $question->id }}" data-question-id="{{ $question->id }}"
                                    data-option-id="{{ $option->id }}" type="radio" value="{{ $option->option_a }}" />
                                <label class="text-left" for="option-a-{{ $option->id }}">{{ $option->option_a }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-b-{{ $option->id }}"
                                    name="answer_{{ $question->id }}" data-question-id="{{ $question->id }}"
                                    data-option-id="{{ $option->id }}" type="radio" value="{{ $option->option_b }}" />
                                <label class="text-left"
                                    for="option-b-{{ $option->id }}">{{ $option->option_b }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-c-{{ $option->id }}"
                                    name="answer_{{ $question->id }}" data-question-id="{{ $question->id }}"
                                    data-option-id="{{ $option->id }}" type="radio" value="{{ $option->option_c }}" />
                                <label class="text-left"
                                    for="option-c-{{ $option->id }}">{{ $option->option_c }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-d-{{ $option->id }}"
                                    name="answer_{{ $question->id }}" data-question-id="{{ $question->id }}"
                                    data-option-id="{{ $option->id }}" type="radio" value="{{ $option->option_d }}" />
                                <label class="text-left"
                                    for="option-d-{{ $option->id }}">{{ $option->option_d }}</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input class="form-control" id="option-e-{{ $option->id }}"
                                    name="answer_{{ $question->id }}" data-question-id="{{ $question->id }}"
                                    data-option-id="{{ $option->id }}" type="radio" value="{{ $option->option_e }}" />
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
            <button class="finish-btn" id="finishQuiz">Selesai</button>
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
                let allAnswered = true;

                $('.quiz-container').each(function() {
                    let questionId = $(this).find('input[type="radio"]').first().data(
                        'question-id');
                    let optionId = $(this).find('input[type="radio"]').first().data(
                        'option-id');
                    let selectedOption = $(this).find('input[type="radio"]:checked').val();

                    if (!selectedOption) {
                        allAnswered = false;
                        return false; // Hentikan iterasi jika ada pertanyaan yang belum dijawab
                    }

                    answers.push({
                        question_id: questionId,
                        option_id: optionId,
                        selected: selectedOption
                    });
                });

                if (!allAnswered) {
                    Swal.fire({
                        title: "Peringatan!",
                        text: "Silakan jawab semua pertanyaan sebelum menyelesaikan kuis.",
                        icon: "warning",
                        showConfirmButton: false, // Menghilangkan tombol OK
                        // timer: 2000, // Alert otomatis hilang dalam 2 detik
                        // timerProgressBar: true // Menampilkan progress bar
                    });
                    return;
                }

                $.ajax({
                    url: "{{ route('submit.quiz') }}",
                    type: "POST",
                    data: {
                        start_quiz_id: startQuizId,
                        answers: answers
                    },
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                            confirmButtonColor: '#3085d6',
                        }).then(() => {
                            window.location.href =
                                "{{ route('quiz.detail', ['course' => $quizzes->course->slug, 'modul' => optional($quizzes->babs->moduls->first())->slug]) }}";
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan saat mengirim jawaban. Silakan coba lagi.",
                            icon: "error",
                            confirmButtonText: "OK",
                            confirmButtonColor: '#3085d6',
                        });
                    }
                });
            });
        });
    </script>
@endsection
