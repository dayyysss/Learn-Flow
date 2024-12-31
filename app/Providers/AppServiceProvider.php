<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Certificate;
use App\Models\LFCMS\MenuList;
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


    }


}
