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

        <form action="{{ route('course-registrations.store-from-cart') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700">Kursus</label>
                <div class="mt-1">
                    @forelse ($cartItems as $cartItem)
                        <div class="p-2 mb-2 bg-gray-100 border border-gray-300 rounded-md cursor-pointer"
                            onclick="selectCourse({{ $cartItem->course->id }}, '{{ $cartItem->course->name }}', {{ $cartItem->course->harga }})">
                            <span class="text-lg font-medium">{{ $cartItem->course->name }}</span> -
                            <span class="text-sm text-gray-500">Rp
                                {{ number_format($cartItem->course->harga, 0, ',', '.') }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500">Keranjang Anda kosong</p>
                    @endforelse
                </div>
            </div>

            <!-- Hidden input untuk course_id -->
            <input type="hidden" name="course_id" id="course_id" value="">

            <div class="mb-4">
                <label for="method_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran
                    (opsional)</label>
                <input type="text" name="method_pembayaran" id="method_pembayaran"
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm"
                    placeholder="Misalnya Transfer Bank">
            </div>

            <div>
                <button type="button" onclick="proceedToCheckout()"
                    class="w-full text-size-15 text-white bg-secondaryColor px-6 py-3 mb-4 leading-1.8 border border-secondaryColor hover:text-secondaryColor hover:bg-white inline-block rounded group">
                    Daftar Kursus
                </button>

            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menyimpan kursus yang dipilih
        let selectedCourseId = null;
        let selectedCourseName = null;
        let selectedCourseHarga = null;

        function selectCourse(courseId, courseName, courseHarga) {
            selectedCourseId = courseId;
            selectedCourseName = courseName;
            selectedCourseHarga = courseHarga;

            // Isi nilai input tersembunyi dengan id kursus yang dipilih
            document.getElementById('course_id').value = selectedCourseId;
        }

        // Menyisipkan data cartItems ke dalam JavaScript
        const cartItems = @json($cartItems);

        // Fungsi untuk memproses checkout
        function proceedToCheckout() {
        // Ambil seluruh data kursus yang ada di keranjang
        let coursesInCart = [];
        
        // Iterasi semua item di cartItems dan masukkan ke dalam array coursesInCart
        @foreach ($cartItems as $cartItem)
            coursesInCart.push({
                id: {{ $cartItem->course->id }},
                name: '{{ $cartItem->course->name }}',
                harga: {{ $cartItem->course->harga }},
            });
        @endforeach

        // Kirim data menggunakan AJAX ke server
        $.ajax({
            url: '/course-registrations/store-from-cart',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                courses: coursesInCart
            },
            success: function(response) {
                // Jika sukses, arahkan ke halaman checkout
                window.location.href = "/course-registrations/create";
            },
            error: function(response) {
                alert('Terjadi kesalahan!');
            }
        });
    }
    </script>

</body>

</html>
