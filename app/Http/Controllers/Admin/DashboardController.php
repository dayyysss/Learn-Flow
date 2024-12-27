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
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $enrolledCourses = CourseRegistration::where('registration_status', 'confirmed')->count();

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

        return view('dashboard.layouts.layouts', compact('user'));
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
        $tipeFilter = empty($request->tipe_filter) ? 'bulan tahun' : 'range tanggal';
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan ?? date('m');
        $rangeTanggal = explode(' - ', $request->range_tanggal);

        $tanggal_awal = $rangeTanggal[0];
        $tanggal_akhir = isset($rangeTanggal[1]) ? $rangeTanggal[1] : $rangeTanggal[0];

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
        return response()->json([
            'status' => 'success',
            'data' => $data, // Data dalam format {x, y}
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
        $registeredCoursesCount = Course::where('user_id', $user->id)->count();

        // Hitung jumlah sertifikat yang dimiliki pengguna
        $certificatesCount = Certificate::where('user_id', $user->id)->count();

        return view('dashboard.partials.header', [
            'registeredCoursesCount' => $registeredCoursesCount,
            'certificatesCount' => $certificatesCount,
        ]);
    }
}
