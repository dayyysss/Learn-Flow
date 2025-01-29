@extends('dashboard.pages.lesson.lesson')

@section('modul')
    <div>
        <div class="content mb-3">
            <h5 class="font-bold capitalize text-xl">{{ $modul->name }}</h5>
        </div>

        <div class="deskripsi mt-5">
            <p>{!! $modul->start_time !!} - {!! $modul->end_time !!}</p>
            <p>{!! $modul->description !!}</p>

            <!-- Button untuk membuka modal -->
            <button onclick="startQuiz()" class="bg-primaryColor text-white py-2 px-4 rounded hover:bg-primaryColor-dark">
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
