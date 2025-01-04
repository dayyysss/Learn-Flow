<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Certificate;
use App\Models\LFCMS\MenuList;

use App\Models\Artikel;
use App\Models\CategoryArtikel;
use App\Models\CategoryCourse;
use App\Models\WebsiteConfiguration;
use App\Models\Page;
use App\Models\Logo;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $helperFile = glob(base_path('helpers/*.php'));
        foreach ($helperFile as $file) {
            require_once $file;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::aliasComponent(Carbon::class, 'carbon');
        Paginator::defaultView('dashboard.components.pagination.custom');
        Paginator::defaultView('lfcms.components.pagination.pagination');

        Blade::if('permission', function ($permission) {
            return auth()->check() && auth()->user()->hasPermissionTo($permission);
        });
        
        Blade::if('roles', function ($roles) {
            if (!auth()->check()) {
                \Log::info('User not authenticated.');
                return false;
            }
            $hasRoles = auth()->user()->hasRolesTo($roles);
            \Log::info('User has roles: ' . json_encode($hasRoles));
            return $hasRoles;
        });
        

        View::composer('dashboard.partials.header', function ($view) {
            $user = auth()->user();

            $view->with('user', $user);
        });

        View::composer('lfcms.partials.header', function ($view) {
            $user = auth()->user();

            $view->with('user', $user);
        });

        View::composer('dashboard.partials.header', function ($view) {
            $user = Auth::user();

            $registeredCoursesCount = Course::join('course_registrations', 'courses.id', '=', 'course_registrations.course_id')
                ->where('course_registrations.user_id', $user->id)
                ->where('course_registrations.registration_status', 'confirmed')
                ->count();

            $certificatesCount = Course::where('user_id', $user->id)->count();

            // Ambil rating untuk instruktur yang diajarkan kursusnya
            $instructorRatings = Feedback::where('instruktur_id', $user->id)
                ->whereNotNull('instructor_rating')
                ->pluck('instructor_rating');

            $averageInstructorRating = $instructorRatings->avg();
            $instructorReviewCount = $instructorRatings->count();

            $averageInstructorRating = $averageInstructorRating ?? 0;
            $instructorReviewCount = $instructorReviewCount ?? 0;

            $view->with([
                'registeredCoursesCount' => $registeredCoursesCount,
                'certificatesCount' => $certificatesCount,
                'averageInstructorRating' => $averageInstructorRating,
                'instructorReviewCount' => $instructorReviewCount
            ]);
        });

        View::composer('lfcms.partials.sidebar', function ($view) {
            $menus = MenuList::where('menutype_id', 1)
                ->with([
                    'children' => function ($query) {
                        $query->orderBy('order');
                    }
                ])
                ->whereNull('parent_id')
                ->orderBy('order')
                ->get();


            $view->with('menus', $menus);
        });

        View::composer(['*'], function ($view) {
            $commonData = $this->loadCommonData();
            $contactsLogo = $this->getContactsLogo();
            
            $view->with(array_merge($commonData, $contactsLogo));
        });
    }

    private function loadCommonData()
    {
        $latestArticles = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        $categoriesArtikel = CategoryArtikel::orderBy('created_at', 'desc')->get();
        $recentPosts = Artikel::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $categories = CategoryCourse::withCount(['courses' => function ($query) {
            $query->where('publish_date', '<=', now());
        }])
        ->orderBy('courses_count', 'desc')
        ->get();

        $popularTags = DB::table('courses')
            ->whereNotNull('tags')
            ->where('publish_date', '<=', now())
            ->pluck('tags')
            ->flatMap(function ($tagsString) {
                return explode(',', $tagsString);
            })
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10);

        $popularTagsArtikel = DB::table('artikel')
            ->whereNotNull('tag')
            ->pluck('tag')
            ->flatMap(function ($tagsString) {
                return explode(',', $tagsString);
            })
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10);
        
    return compact('categories', 'popularTags', 'categoriesArtikel', 'recentPosts', 'popularTagsArtikel');
}

    private function getContactsLogo()
    {
        $websiteConfig = WebsiteConfiguration::first();
        $pagesDeskripsi = Page::with('users')->find(3);
        $latestArticles = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        $configuration = WebsiteConfiguration::first();

        return [
            'websiteConfig' => $websiteConfig,
            'pagesDeskripsi' => $pagesDeskripsi,
            'latestArticles' => $latestArticles,
            'configuration' => $configuration,
        ];
    }
}  
