@extends('dashboard.pages.lesson.layout-quiz')

@section('content')
    <div class="lg:col-start-4 lg:col-span-9 flex flex-col items-center justify-center text-center space-y-6">
        <p id="timer" class="text-lg font-semibold"></p>
        @php
            $counter = 1; // Variabel penghitung untuk nomor pertanyaan
        @endphp
        @foreach ($quizzes->questions as $question)
            <div class="w-full max-w-2xl bg-white shadow-lg p-6 rounded-lg">
                <p class="text-lg font-semibold mb-4">{{ $counter }}. {{ $question->question }}</p>

                <ul class="space-y-2">
                    @foreach ($question->options as $option)
                        <li class="flex items-center justify-center gap-2">
                            <input class="form-control" id="option-a-{{ $option->id }}" name="option-{{ $counter }}"
                                type="radio" />
                            <label for="option-a-{{ $option->id }}">{{ $option->option_a }}</label>
                        </li>
                        <li class="flex items-center justify-center gap-2">
                            <input class="form-control" id="option-b-{{ $option->id }}" name="option-{{ $counter }}"
                                type="radio" />
                            <label for="option-b-{{ $option->id }}">{{ $option->option_b }}</label>
                        </li>
                        <li class="flex items-center justify-center gap-2">
                            <input class="form-control" id="option-c-{{ $option->id }}"
                                name="option-{{ $counter }}" type="radio" />
                            <label for="option-c-{{ $option->id }}">{{ $option->option_c }}</label>
                        </li>
                        <li class="flex items-center justify-center gap-2">
                            <input class="form-control" id="option-d-{{ $option->id }}"
                                name="option-{{ $counter }}" type="radio" />
                            <label for="option-d-{{ $option->id }}">{{ $option->option_d }}</label>
                        </li>
                        <li class="flex items-center justify-center gap-2">
                            <input class="form-control" id="option-e-{{ $option->id }}"
                                name="option-{{ $counter }}" type="radio" />
                            <label for="option-e-{{ $option->id }}">{{ $option->option_e }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            @php
                $counter++; // Increment nomor pertanyaan
            @endphp
        @endforeach
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
    </script>
@endsection
