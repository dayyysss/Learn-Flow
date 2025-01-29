<?php

namespace App\Http\Controllers\Landing;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Client;
use App\Models\Course;
use App\Models\Artikel;
use App\Models\Feedback;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Models\LFCMS\MenuList;
use App\Models\CategoryArtikel;
use Illuminate\Support\Facades\DB;
use App\Models\LFCMS\Administrator;
use App\Http\Controllers\Controller;
use App\Models\WebsiteConfiguration;
use Illuminate\Support\Facades\View;
use App\Providers\CourseFeedbackService;

class LandingPageController extends Controller
{
    protected $courseFeedbackService;

    public function __construct(CourseFeedbackService $courseFeedbackService)
    {
        $this->courseFeedbackService = $courseFeedbackService;
    }
    public function index()
    {
        $heroSection = Page::with('users')->where('status', 'publik')->find(1);
        $aboutSection = Page::with('users')->where('status', 'publik')->find(2);
        $categorySection = Page::with('users')->where('status', 'publik')->find(6);
        $testiSection = Page::with('users')->where('status', 'publik')->find(7);
        $artikel = Artikel::where('status', '1')->orderBy('created_at', 'desc')->take(3)->get();
        $course = Course::where('status', 'publik')->orderBy('created_at', 'desc')->take(6)->get();
        $testimonial = Testimonial::where('status', 'publik')->orderBy('created_at', 'desc')->take(2)->get();
        $klien = Client::where('status', 'publik')->take(5)->get();
        $categories = CategoryCourse::all();

        return view('landing-page', compact('heroSection', 'course', 'aboutSection', 'artikel', 'klien', 'categories', 'testimonial', 'categorySection', 'testiSection'));
    }

    public function about()
    {
        $tentang = Page::with('users')->where('slug', 'tentang-kami')->where('status', 'publik')->first();
        $halamanTentang = Page::with('users')->where('slug', 'halaman-tentang')->where('status', 'publik')->first();
        $testimonial = Testimonial::where('status', 'publik')->get();
        $course = Course::where('status', 'publik')->orderBy('created_at', 'desc')->take(9)->get();
        $coursePopular = Course::where('status', 'publik')->orderBy('created_at', 'desc')->take(3)->get();
        $klien = Client::where('status', 'publik')->orderBy('created_at', 'desc')->take(9)->get();

        return view('landing.pages.about.about', compact('testimonial', 'course', 'coursePopular', 'klien', 'tentang', 'halamanTentang'));
    }

    public function course(Request $request)
    {
        // Mengambil semua kategori dengan jumlah kursus terkait
        $categories = CategoryCourse::withCount('courses')->get();
        $instrukturs = CategoryCourse::all();

        // Ambil parameter kategori, tag, skill_level, dan search dari permintaan
        $selectedCategory = $request->get('category');
        $selectedTag = $request->get('tag');
        $selectedSkillLevel = $request->get('skill_level');
        $searchQuery = $request->get('search'); // Menambahkan pencarian

        $course = $courseQuery->paginate(10);
        $feedbacks = Feedback::selectRaw('course_id, AVG(rating) as average_rating, COUNT(*) as total_feedbacks')
            ->groupBy('course_id')
            ->get();

        // Query kursus dengan filter kategori, tag, skill_level, dan pencarian
        $courseQuery = Course::where('publish_date', '<=', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs']);

        if ($selectedCategory) {
            $courseQuery->whereHas('categories', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }

        if ($selectedTag) {
            $courseQuery->where('tags', 'like', '%' . $selectedTag . '%');
        }

        if ($selectedSkillLevel) {
            $courseQuery->where('tingkatan', $selectedSkillLevel);
        }

        if ($searchQuery) {
            $courseQuery->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%') // Pencarian berdasarkan judul
                    ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%'); // Pencarian berdasarkan deskripsi
            });
        }

        // Hitung feedback dan rating menggunakan service
        $calculatedCourses = $this->courseFeedbackService->calculateFeedbacks($course->getCollection(), $feedbacks);

        // Set koleksi kursus dengan hasil yang dihitung
        $course->setCollection($calculatedCourses);

        // Menambahkan parameter pencarian pada URL pagination
        $course->appends([
            'search' => $searchQuery,
            'category' => $selectedCategory,
            'tag' => $selectedTag,
            'skill_level' => $selectedSkillLevel,
        ]);

        return view('landing.pages.course.course', array_merge(
            [
                'course' => $course,
                'categories' => $categories,
                'instrukturs' => $instrukturs,
                'selectedCategory' => $selectedCategory,
                'selectedTag' => $selectedTag,
                'selectedSkillLevel' => $selectedSkillLevel,
                'searchQuery' => $searchQuery,
            ],
        ));
    }

    public function zoomWebinar()
    {
        $category = CategoryArtikel::all();

        return view('landing.pages.zoom-webinars.zoom', compact('category'));
    }

    public function event()
    {
        $category = CategoryArtikel::all();

        return view('landing.pages.events.event', compact('category'));
    }

    public function blog()
    {
        $artikel = Artikel::where('status', '1')->orderBy('created_at', 'desc')->paginate(5);
        $category = CategoryArtikel::all();

        return view('landing.pages.blog.blog', compact('artikel', 'category'));
    }

    public function roadmap(Request $request)
    {
        $categories = CategoryCourse::withCount('courses')->get();
        $instrukturs = CategoryCourse::all();
        $selectedCategory = $request->get('category');
        $selectedTag = $request->get('tag');
        $selectedSkillLevel = $request->get('skill_level');
        $searchQuery = $request->get('search'); // Menambahkan pencarian
        $courseQuery = Course::where('publish_date', '<=', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs']);

        if ($selectedCategory) {
            $courseQuery->whereHas('categories', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }

        if ($selectedTag) {
            $courseQuery->where('tags', 'like', '%' . $selectedTag . '%');
        }

        if ($selectedSkillLevel) {
            $courseQuery->where('tingkatan', $selectedSkillLevel);
        }

        if ($searchQuery) {
            $courseQuery->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%') // Pencarian berdasarkan judul
                    ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%'); // Pencarian berdasarkan deskripsi
            });
        }

        $course = $courseQuery->paginate(10);

        $feedbacks = Feedback::selectRaw('course_id, AVG(rating) as average_rating, COUNT(*) as total_feedbacks')
            ->groupBy('course_id')
            ->get();

        $calculatedCourses = $this->courseFeedbackService->calculateFeedbacks($course->getCollection(), $feedbacks);
        $course->setCollection($calculatedCourses);
        $course->appends([
            'search' => $searchQuery,
            'category' => $selectedCategory,
            'tag' => $selectedTag,
            'skill_level' => $selectedSkillLevel,
        ]);

        return view('landing.pages.roadmap.index', array_merge(
            [
                'course' => $course,
                'categories' => $categories,
                'instrukturs' => $instrukturs,
                'selectedCategory' => $selectedCategory,
                'selectedTag' => $selectedTag,
                'selectedSkillLevel' => $selectedSkillLevel,
                'searchQuery' => $searchQuery,
            ],
        ));
    }

    public function showSlug($slug)
    {
        $articles = Artikel::where('slug', $slug)->firstOrFail();
        $articles->increment('visitor');
        $category = CategoryArtikel::all();

        return view('landing.pages.blog.blog-detail', compact('articles', 'category'));
    }

    public function showCategory($name)
    {
        $category = CategoryArtikel::all();
        $categories = CategoryArtikel::where('name', $name)->firstOrFail();
        $artikel = Artikel::where('category_id', $categories->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('landing.pages.blog.blog', compact('artikel', 'categories', 'category'));
    }

    public function showTag($tag)
    {
        $tag = urldecode($tag);
        $artikel = Artikel::where('status', '1')
            ->where('tag', 'LIKE', "%{$tag}%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $category = CategoryArtikel::all();

        return view('landing.pages.blog.blog', compact('artikel', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = CategoryArtikel::all();
        $artikel = Artikel::where('status', '1')
            ->where(function ($query) use ($search) {
                $query->where('keyword', 'LIKE', "%{$search}%")
                    ->orWhere('judul', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            })
            ->paginate(3);

        return view('landing.pages.blog.blog', compact('artikel', 'search', 'category'));
    }

    public function contact()
    {
        return view('landing.pages.contact.contact');
    }

    public function instructor()
    {
        $instrukturs = User::where('role_id', '3')->get();

        // Pastikan data sosial media berupa JSON
        foreach ($instrukturs as $instruktur) {
            $instruktur->sosial_media = json_decode($instruktur->sosial_media, true);
        }

        // Kirim data instruktur ke view
        return view('landing.pages.instructor.instructor', compact('instrukturs'));
    }

    public function showinstructor($id)
    {
        // Ambil instruktur dengan id tertentu
        $instrukturs = User::findOrFail($id);  // Ambil instruktur tunggal

        $relatedCourses = Course::where('instruktur_id', $id)
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs', 'certificate', 'babs.quiz', 'courseRegistrations'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Pastikan sosial_media berupa JSON
        $instrukturs->sosial_media = json_decode($instrukturs->sosial_media, true);

        // Kirim data instruktur ke view
        return view('landing.pages.instructor.instructor-detail', compact('instrukturs', 'relatedCourses'));
    }

    public function indexMenu(Request $request)
    {
        $headerMenus = MenuList::where('menutype_id', 2)
            ->with([
                'children' => function ($query) {
                    $query->orderBy('order');
                }
            ])
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        $footerMenus = MenuList::where('menutype_id', 3)
            ->with([
                'children' => function ($query) {
                    $query->orderBy('order');
                }
            ])
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        $sidebarMenus = MenuList::where('menutype_id', 4)
            ->with([
                'children' => function ($query) {
                    $query->orderBy('order');
                }
            ])
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        if ($request->ajax()) {
            if ($request->menu_type == 'header') {
                return response()->json($this->buildNestedMenu($headerMenus));
            } elseif ($request->menu_type == 'footer') {
                return response()->json($this->buildNestedMenu($footerMenus));
            } elseif ($request->menu_type == 'sidebar') {
                return response()->json($this->buildNestedMenu($sidebarMenus));
            }
        }

        $nestedHeaderMenus = $this->buildNestedMenu($headerMenus);
        $nestedFooterMenus = $this->buildNestedMenu($footerMenus);
        $nestedSidebarMenus = $this->buildNestedMenu($sidebarMenus);

        return view('landing.layouts.landing-layouts', compact('nestedHeaderMenus', 'nestedFooterMenus', 'nestedSidebarMenus'));
    }

    private function buildNestedMenu($menus)
    {
        $menuArray = [];
        foreach ($menus as $menu) {
            $children = $this->buildNestedMenu($menu->children);

            $menuArray[] = [
                'id' => $menu->id,
                'content' => $menu->name,
                'link' => url($menu->url),
                'icon' => $menu->ikon,
                'hasChildren' => count($children) > 0,
                'children' => $children,
            ];
        }
        return $menuArray;
    }
}
