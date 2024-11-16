<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body>

    <div class="container mx-auto mt-8 p-6">
        <h1 class="text-xl font-semibold mb-4">Pendaftaran Kursus</h1>

        <form action="/course-registrations" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700">Kursus</label>
                <select name="course_id" id="course_id"
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm">
                    @if ($course)
                        <option value="{{ $course->id }}" selected>
                            {{ $course->name }} - Rp {{ number_format($course->harga, 0, ',', '.') }}
                        </option>
                    @else
                        <option disabled>Data kursus tidak ditemukan</option>
                    @endif

                </select>
                <!-- Handle error message for course_id -->
                <div class="text-red-500 text-sm">{{ $errors->first('course_id') }}</div>
            </div>

            <div class="mb-4">
                <label for="method_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran
                    (opsional)</label>
                <input type="text" name="method_pembayaran" id="method_pembayaran"
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm"
                    placeholder="Misalnya Transfer Bank">
            </div>

            <div>
                <button type="submit"
                    class="w-full text-size-15 text-white bg-secondaryColor px-6 py-3 mb-4 leading-1.8 border border-secondaryColor hover:text-secondaryColor hover:bg-white inline-block rounded group">
                    Daftar Kursus
                </button>
            </div>
        </form>
    </div>

</body>

</html>
