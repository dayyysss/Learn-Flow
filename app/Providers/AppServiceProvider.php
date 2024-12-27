<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

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
            $registeredCoursesCount = Course::where('user_id', $user->id)->count();
            $certificatesCount = Course::where('user_id', $user->id)->count();
       
            $view->with('registeredCoursesCount', $registeredCoursesCount, 'certificatesCount', $certificatesCount);
        });

      
    }

    
}
