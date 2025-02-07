<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\visitor_count;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseRegistration;
use App\Models\ModulProgress;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $enrolledCourses = CourseRegistration::where('registration_status', 'confirmed')->where('user_id', $user->id)->count();

        $activeCourses = CourseRegistration::whereBetween('progress', [0, 99])->count();

        $completeCourses = CourseRegistration::where('progress', 100)->count();

        $totalCourses = Course::count();

        $totalStudents = User::where('role_id', 2)->count();

        $totalEarnings = CourseRegistration::where('registration_status', 'confirmed')->sum('harga');

        return view('dashboard.pages.dashboard.index', compact(
            'enrolledCourses',
            'activeCourses',
            'completeCourses',
            'totalCourses',
            'totalStudents',
            'totalEarnings'
        ));
    }

    public function indexUser()
    {

        return view('dashboard.layouts.layouts');
    }

    public function myProfile()
    {
        return view('dashboard.pages.my-profile.index');
    }

    public function message()
    {
        return view('dashboard.pages.message.index');
    }

    public function coursesCreate()
    {
        return view('dashboard.pages.courses.create');
    }

    public function reviews()
    {
        return view('dashboard.pages.reviews.index');
    }

    public function settings()
    {
        return view('dashboard.pages.settings.index');
    }

    public function orderHistory()
    {
        return view('dashboard.pages.order-history.index');
    }

    public function assignments()
    {
        return view('dashboard.pages.assignments.index');
    }

    public function announcements()
    {
        return view('dashboard.pages.announcements.index');
    }


    public function wishlist()
    {
        return view('dashboard.pages.wishlist.index');
    }

    public function cart()
    {
        return view('dashboard.pages.cart.index');
    }

    public function checkout()
    {
        return view('dashboard.pages.checkout.index');
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

    public function count()
    {
        $user = Auth::user();

        // Hitung jumlah kursus yang terdaftar oleh pengguna
        $registeredCourses = Course::where('user_id', $user->id)->get();

        // Ambil kursus yang sudah terdaftar (konfirmasi)
        $enrolledCourses = CourseRegistration::where('user_id', $user->id)
            ->where('registration_status', 'confirmed')
            ->get();

        // Inisialisasi jumlah sertifikat yang dimiliki pengguna
        $certificatesCount = 0;

        // Periksa apakah semua modul dalam kursus sudah selesai
        $enrolledCourses->each(function ($courseRegistration) use (&$certificatesCount) {
            $course = $courseRegistration->course;

            // Memeriksa apakah semua modul telah selesai
            $allModulsCompleted = $course->babs->moduls->every(function ($modul) use ($courseRegistration) {
                return $modul->modulProgresses->where('course_registrations_id', $courseRegistration->id)
                    ->first()
                    ->status === 'selesai';
            });

            // Jika semua modul selesai, hitung sertifikat
            if ($allModulsCompleted) {
                $certificatesCount++;
            }
        });


        return view('dashboard.partials.header', [
            'registeredCoursesCount' => $registeredCourses->count(),
            'certificatesCount' => $certificatesCount,
        ]);
    }
}
