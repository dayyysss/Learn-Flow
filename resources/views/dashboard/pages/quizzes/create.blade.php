@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Quiz')

@section('content')
    <div
        class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
        <!-- heading -->
        <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark flex items-center justify-between">
            <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">Create Quiz</h2>
        </div>
        <!-- form content -->
        <form method="POST" action="{{ route('quiz.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-blackColor dark:text-blackColor-dark">Nama
                    Quiz</label>
                <input type="text" id="name" name="name"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark focus:ring-primaryColor focus:border-primaryColor"
                    required oninput="updateSlug()" />
            </div>

            <div>
                <label for="slug"
                    class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark focus:ring-primaryColor focus:border-primaryColor"
                    readonly />
            </div>

            <div>
                <label for="course_id" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Kursus
                </label>
                <select id="course_id" name="course_id"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required>
                    <option value="" disabled selected>Pilih Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-4">
                <label for="bab_id" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Bab
                </label>
                <select id="bab_id" name="bab_id"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    disabled required>
                    <option value="" disabled selected>Pilih Kursus terlebih dahulu</option>
                </select>
            </div>

            <div>
                <label for="waktu"
                    class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Waktu
                </label>
                <input id="waktu" name="waktu"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required />
            </div>

            <div class="form-group mb-15px">
                <label for="deskripsi"
                    class="mb-2 pt-5 block font-semibold text-blackColor dark:text-blackColor-dark">Deskripsi</label>
                <textarea name="description" id="deskripsi"
                    class="form-control w-full py-10px px-5 text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark border-2 border-borderColor dark:border-borderColor-dark leading-23px rounded-md"
                    cols="50" rows="10"></textarea>
            </div>

            <div class="flex gap-2 pt-8">
                <button type="submit"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Buat Quiz
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

            // Generate slug from name using slugify
            const slug = nameInput.value
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text

            // Update the slug input field
            slugInput.value = slug;
        }

        // Inisialisasi Flatpickr untuk input waktu
        // flatpickr("#waktu", {
        //     enableTime: true,
        //     noCalendar: true,
        //     dateFormat: "H:i", // Format jam:menit (24 jam)
        //     time_24hr: true,
        //     locale: "id", // Bahasa Indonesia
        // });

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
