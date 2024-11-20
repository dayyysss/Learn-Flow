<div>
    <div class="content mb-3">
        <h5 class="font-bold capitalize text-xl">{{$modul->name}}</h5>
    </div>

    <div
      class=" top-0 left-0 w-full flex justify-between items-center px-5 py-10px bg-primaryColor leading-1.2 text-whiteColor"
    >
      <h3 class="sm:text-size-22 font-bold">
        Video - {{ $modul->name }}
      </h3>
      <a href="{{ route('course.detail', $modul->bab->course->slug) }}" class="">Close</a>
    </div>

    <div class="aspect-[16/9]">
        <iframe
          @if (filter_var($modul->video, FILTER_VALIDATE_URL))
              @if (strpos($modul->video, 'youtube.com/watch?v=') !== false)
                  {{-- Konversi URL YouTube standar ke format embed --}}
                  src="{{ str_replace('watch?v=', 'embed/', $modul->video) }}"
              @elseif (strpos($modul->video, 'youtu.be/') !== false)
                  {{-- Konversi URL YouTube pendek ke format embed --}}
                  src="{{ 'https://www.youtube.com/embed/' . substr(parse_url($modul->video, PHP_URL_PATH), 1) }}"
              @else
                  {{-- Gunakan URL asli jika bukan YouTube --}}
                  src="{{ $modul->video }}"
              @endif
          @else
              {{-- Gunakan path dari storage jika bukan URL --}}
              src="{{ asset('storage/' . $modul->video) }}"
          @endif
          allowfullscreen=""
          class="w-full h-full"
        ></iframe>
    </div>

    <div class="deskripsi mt-5">
        <p>{{$modul->materi}}</p>
    </div>

</div>
