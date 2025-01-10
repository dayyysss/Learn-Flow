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
        <button @click="showModal = true; currentQuestion = 0"
            class="bg-primaryColor text-white py-2 px-4 rounded hover:bg-primaryColor-dark">
            Mulai Quiz
        </button>
    </div>

</div>
@endsection
