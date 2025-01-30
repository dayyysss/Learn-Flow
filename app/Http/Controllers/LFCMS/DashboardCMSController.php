<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardCMSController extends Controller
{
    public function indexCMS()
    {
        $user = Auth::user();
     
        return view('lfcms.pages.dashboard.index', compact('user'));
    }

    public function penggunaCMS()
    {
        return view('lfcms.pages.user.user');
    }
    
    public function administratorCMS()
    {
        return view('lfcms.pages.user.administrator');
    }

    public function klienCMS()
    {
        return view('lfcms.pages.klien.index');
    }

    public function halamanCMS()
    {
        return view('lfcms.pages.halaman.index');
    }

    public function kontakCMS()
    {
        return view('lfcms.pages.kontak.index');
    }

    public function artikelCMS()
    {
        return view('lfcms.pages.artikel.index');
    }
    
    public function kategoriartikelCMS()
    {
        return view('lfcms.pages.artikel.kategori.index');
    }

    public function pembayaranCMS()
    {
        return view('lfcms.pages.pembayaran.pembayaran');
    }

    public function historypembayaranCMS()
    {
        return view('lfcms.pages.pembayaran.pembayaran-history');
    }

    public function pengaturanCMS()
    {
        $user = auth()->user();

        return view('lfcms.pages.pengaturan.index', compact('user'));
    }

    public function testimonialCMS()
    {
        return view('lfcms.pages.testimonial.index');
    }

    public function visitor(Request $request)
    {
        $tipeFilter = $request->tipe_filter ?? 'bulan tahun';
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan ?? date('m');
        $rangeTanggal = explode(' - ', $request->range_tanggal ?? '');

        if ($tipeFilter == 'range-tanggal' && count($rangeTanggal) == 2) {
            $tanggal_awal = $rangeTanggal[0];
            $tanggal_akhir = $rangeTanggal[1];
        } else {
            $tanggal_awal = Carbon::createFromDate($tahun, $bulan, 1)->toDateString();
            $tanggal_akhir = Carbon::createFromDate($tahun, $bulan, Carbon::createFromDate($tahun, $bulan, 1)->daysInMonth)->toDateString();
        }

        $tanggalList = $this->loopTanggal($tipeFilter, $bulan, $tahun, $tanggal_awal, $tanggal_akhir);
        $data = [];

        foreach ($tanggalList as $item) {
            if ($bulan == date('m')) {
                if (Carbon::today()->gte(Carbon::parse($item->tanggal))) {
                    $ipByTanggal = DB::table('visitor_counts')->whereDate('created_at', $item->tanggal)->count();
                    $data[] = (object) [
                        'x' => date('d M', strtotime($item->tanggal)),
                        'y' => $ipByTanggal,
                    ];
                }
            } else {
                $ipByTanggal = DB::table('visitor_counts')->whereDate('created_at', $item->tanggal)->count();
                $data[] = (object) [
                    'x' => date('d M', strtotime($item->tanggal)),
                    'y' => $ipByTanggal,
                ];
            }
        }
        $tanggalAwalIndo = formatTanggalIndonesia($tanggal_awal);
        $tanggalAkhirIndo = formatTanggalIndonesia($tanggal_akhir);

        return response()->json([
            'status' => 'success',
            'data' => $data, // Data dalam format {x, y}
            'range_tanggal' => "{$tanggalAwalIndo} - {$tanggalAkhirIndo}"
        ]);
    }

    public function loopTanggal($tipeFilter = 'bulan tahun', $bulan = null, $tahun = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $tahun = $tahun ?? Carbon::now()->year;
        $bulan = $bulan ?? Carbon::now()->month;

        if ($tipeFilter == 'bulan tahun') {
            $tanggal_awal = Carbon::createFromDate($tahun, $bulan, 1)->toDateString();
            $tanggal_akhir = Carbon::createFromDate($tahun, $bulan, Carbon::createFromDate($tahun, $bulan, 1)->daysInMonth)->toDateString();
        }

        $startDate = Carbon::parse($tanggal_awal);
        $endDate = Carbon::parse($tanggal_akhir);

        $data = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $data[] = (object) ['tanggal' => $date->toDateString()];
        }

        return $data;
    }
}