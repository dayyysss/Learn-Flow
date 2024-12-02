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
