<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function tracking_visitor()
{
    // Ambil IP pengunjung
    $ip = request()->ip(); // Menggunakan helper Laravel untuk mendapatkan IP

    // Cek apakah IP sudah ada dalam database
    $visitorRecord = DB::table('visitor_counts')->where('ip', $ip)->whereDate('created_at', Carbon::now())->first();

    if ($visitorRecord) {
        // Jika sudah ada, update total visitors
        DB::table('visitor_counts')
            ->where('ip', $ip)->whereDate('created_at', Carbon::now())
            ->increment('total_visitors');
    } else {
        // Jika belum ada, insert data baru
        DB::table('visitor_counts')->insert([
            'ip' => $ip,
            'total_visitors' => 1,
            'created_at' => now() // Menyimpan tanggal kunjungan
        ]);
    }
}

if (!function_exists('formatTanggalIndonesia')) {
    /**
     * Format tanggal ke dalam format Indonesia
     *
     * @param string $tanggal
     * @return string
     */
    function formatTanggalIndonesia($tanggal)
    {
        // Cek apakah tanggal valid
        if (!$tanggal || !strtotime($tanggal)) {
            return 'Tanggal tidak valid';
        }

        // Daftar nama bulan
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // Pecah tanggal
        $tanggalObj = strtotime($tanggal);
        $tgl = date('j', $tanggalObj);
        $bln = date('n', $tanggalObj);
        $thn = date('Y', $tanggalObj);

        // Format
        return "{$tgl} {$bulan[$bln]} {$thn}";
    }
}