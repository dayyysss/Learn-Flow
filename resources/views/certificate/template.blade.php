<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ public_path('certificates/' . $backgroundImage) }}');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }
        .certificate-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            text-align: center;
            color: white;
        }
        .certificate-container h1 {
            font-size: 36px;
            font-weight: bold;
            margin-top: 20px;
        }
        .certificate-container p {
            font-size: 20px;
        }
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }
        .signature div {
            flex: 1;
        }
        .signature img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="certificate-container">
        <h1>Selamat! Sertifikat Anda</h1>
        <p>Nama Pendaftar: {{ $data->nama_pendaftar }}</p>
        <p>Nama Kursus: {{ $nama_kursus }}</p>
        <p>Kode Seri: {{ $kode_seri_kursus }}</p>

        <div class="signature">
            @if (count($ttd) > 0)
                <div>
                    <img src="{{ public_path('certificates/' . $ttd[0]) }}" alt="Tanda Tangan">
                </div>
            @endif
        </div>
    </div>

</body>
</html>
