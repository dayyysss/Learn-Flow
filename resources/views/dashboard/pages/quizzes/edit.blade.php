@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div
        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
        <!-- heading -->
        <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between">
            <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">Edit Quiz</h2>
        </div>

        <form action="{{ route('quiz.update', $quiz->slug) }}" method="POST">
            @csrf
            @method('PATCH') <!-- Specify the HTTP method as PUT for updates -->

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Nama Quiz
                </label>
                <input type="text" id="name" name="name"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark focus:ring-primaryColor focus:border-primaryColor"
                    value="{{ old('name', $quiz->name) }}" required oninput="updateSlug()" />
            </div>

            <div>
                <label for="slug" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Slug
                </label>
                <input type="text" id="slug" name="slug"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark focus:ring-primaryColor focus:border-primaryColor"
                    value="{{ old('slug', $quiz->slug) }}" readonly />
            </div>

            <div>
                <label for="course_id" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Kursus
                </label>
                <select id="course_id" name="course_id"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required>
                    <option value="" disabled>Pilih Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $quiz->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-4">
                <label for="bab_id" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Bab
                </label>
                <select id="bab_id" name="bab_id"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required>
                    <option value="" disabled>Pilih Bab</option>
                    @if($quiz->course_id)
                        @foreach($babs->where('course_id', $quiz->course_id) as $bab)
                            <option value="{{ $bab->id }}" {{ $quiz->bab_id == $bab->id ? 'selected' : '' }}>
                                {{ $bab->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="start_time"
                    class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Waktu Mulai
                </label>
                <input type="text" id="start_time" name="start_time"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    value="{{ old('start_time', $quiz->start_time) }}" required />
            </div>

            <div>
                <label for="end_time" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Waktu Selesai
                </label>
                <input type="text" id="end_time" name="end_time"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    value="{{ old('end_time', $quiz->end_time) }}" required />
            </div>

            <div class="form-group mb-15px">
                <label for="deskripsi" class="mb-2 pt-5 block font-semibold text-blackColor dark:text-blackColor-dark">
                    Deskripsi
                </label>
                <textarea name="description" id="deskripsi"
                    class="form-control w-full py-10px px-5 text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark border-2 border-borderColor dark:border-borderColor-dark leading-23px rounded-md"
                    cols="50" rows="10">{{ old('description', $quiz->description) }}</textarea>
            </div>

            <div class="flex gap-2 pt-8">
                <button type="submit"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Perbarui Quiz
                </button>
                <a href="{{ route('quiz.index') }}"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-secondaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        function updateSlug() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');

            const slug = nameInput.value
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text

            slugInput.value = slug; // Set the updated slug value
        }

        // Inisialisasi Flatpickr untuk input waktu
        flatpickr("#start_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i", // Format jam:menit (24 jam)
            time_24hr: true,
            locale: "id", // Bahasa Indonesia
        });

        flatpickr("#end_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i", // Format jam:menit (24 jam)
            time_24hr: true,
            locale: "id", // Bahasa Indonesia
        });

        // Menangani perubahan course_id dan mengambil babs terkait
        document.getElementById('course_id').addEventListener('change', function() {
            const courseId = this.value;
            const babSelect = document.getElementById('bab_id');

            // Kosongkan dropdown bab
            babSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
            babSelect.disabled = true; // Nonaktifkan dropdown bab sementara

            // Kirim permintaan untuk mengambil bab terkait course_id
            fetch(`/get-babs/${courseId}`)
                .then(response => response.json())
                .then(data => {
                    babSelect.innerHTML =
                    '<option value="" disabled selected>Pilih Bab</option>'; // Reset dropdown bab
                    data.forEach(bab => {
                        const option = document.createElement('option');
                        option.value = bab.id;
                        option.textContent = bab.name;
                        babSelect.appendChild(option);
                    });
                    babSelect.disabled = false; // Aktifkan dropdown bab
                })
                .catch(error => {
                    console.error('Error fetching babs:', error);
                    babSelect.innerHTML = '<option value="" disabled selected>Error memuat bab</option>';
                });
        });
    </script>
@endsection
