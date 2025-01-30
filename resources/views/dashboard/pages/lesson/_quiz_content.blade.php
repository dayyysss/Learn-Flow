@extends('dashboard.pages.lesson.lesson')

@section('modul')
    <div>
        <div class="content mb-3">
            <h5 class="font-bold capitalize text-xl">{{ $modul->name }}</h5>
        </div>

        <div class="deskripsi mt-5">
            @php
                $totalMenit = $modul->waktu;
                $jam = floor($totalMenit / 60);
                $menit = $totalMenit % 60;
            @endphp

            <p>
                {!! $jam > 0 ? $jam . ' jam ' : '' !!}
                {!! $menit > 0 ? $menit . ' menit' : '' !!}
            </p>

            <p>{!! $modul->description !!}</p>
            
            <!-- Button untuk membuka modal -->
            <button onclick="startQuiz()" class="bg-primaryColor text-white mt-5 py-2 px-4 rounded hover:bg-primaryColor-dark">
                Mulai Quiz
            </button>
        </div>
    </div>

    <script>
        function startQuiz() {
            Swal.fire({
                title: 'Mulai Quiz?',
                text: "Anda yakin ingin memulai quiz?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Mulai!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hanya redirect jika user mengonfirmasi
                    window.location.href = "{{ route('startQuiz.index', $modul->id) }}";
                }
            });
        }
    </script>
@endsection
