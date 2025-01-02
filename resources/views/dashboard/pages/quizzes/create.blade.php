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
        <form action="{{ route('quiz.store') }}" method="POST" class="space-y-4">
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
                <label for="bab_id"
                    class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">Bab</label>
                <select name="bab_id"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required>
                    @foreach ($babs as $bab)
                        <option value="{{ $bab->id }}">{{ $bab->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="start_time"
                    class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Waktu Mulai
                </label>
                <input type="text" id="start_time" name="start_time"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required />
            </div>

            <div>
                <label for="end_time" class="block mb-2 pt-5 text-sm font-medium text-blackColor dark:text-blackColor-dark">
                    Waktu Selesai
                </label>
                <input type="text" id="end_time" name="end_time"
                    class="block w-full px-3 py-2 border border-borderColor dark:border-borderColor-dark rounded-md text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark focus:ring-primaryColor focus:border-primaryColor"
                    required />
            </div>

            <div class="form-group mb-15px">
                <label for="deskripsi"
                    class="mb-2 pt-5 block font-semibold text-blackColor dark:text-blackColor-dark">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="form-control w-full py-10px px-5 text-sm bg-transparent dark:bg-transparent-dark text-blackColor dark:text-blackColor-dark placeholder:text-placeholder placeholder:dark:text-placeholder-dark border-2 border-borderColor dark:border-borderColor-dark leading-23px rounded-md"
                    cols="50" rows="10"></textarea>
            </div>

            <div class="flex gap-2 pt-8">
                <button type="submit"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-primaryColor bg-primaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-primaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Create Quiz
                </button>
                <a href="{{ route('quiz.index') }}"
                    class="flex items-center gap-1 text-sm font-bold text-whiteColor hover:text-secondaryColor bg-secondaryColor hover:bg-whiteColor dark:hover:bg-darkGrey5 border border-secondaryColor h-8 px-5 leading-8 justify-center rounded-md cursor-pointer">
                    Cancel
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
    </script>
@endsection
