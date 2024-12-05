<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('dashboard.components.pagination.custom');

        View::composer('dashboard.partials.header', function ($view) {
            $user = auth()->user();
       
            $view->with('user', $user);
        });
    }

    
}
