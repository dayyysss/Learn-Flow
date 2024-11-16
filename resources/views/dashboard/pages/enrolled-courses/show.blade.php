<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-semibold mb-4 text-center">Detail Pendaftaran Kursus</h1>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Kursus: {{ $registration->course->name }}</h2>
            <p><strong>Harga:</strong> Rp {{ number_format($registration->course->harga, 0, ',', '.') }}</p>
            <p><strong>Status Pendaftaran:</strong> {{ $registration->registration_status }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-medium">Detail Siswa</h3>
            <p><strong>Nama Siswa:</strong> {{ $registration->user->name }}</p>
            <p><strong>Email:</strong> {{ $registration->user->email }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-medium">Metode Pembayaran</h3>
            <p>{{ $registration->method_pembayaran ?? 'Tidak ada metode pembayaran' }}</p>
        </div>

        <a href="{{ route('dashboard.enrolledCourses') }}" class="text-blue-500 hover:underline">Kembali ke Daftar Pendaftaran</a>
    </div>

</body>
</html>
