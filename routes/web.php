<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;

    Route::controller(LandingPageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('about');
        Route::get('/course', 'course')->name('course');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/contact', 'contact')->name('contact');
    });

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.dashboard');
    Route::get('/message', [DashboardController::class, 'message'])->name('admin.dashboard');
    Route::get('/courses', [DashboardController::class, 'courses'])->name('admin.dashboard');
    Route::get('/reviews', [DashboardController::class, 'reviews'])->name('admin.dashboard');
    Route::get('/quiz', [DashboardController::class, 'quiz'])->name('admin.dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('admin.dashboard');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.post');

    Route::get('/signup', function () {
        return view('auth.register'); 
    })->name('register');

    Route::post('/signup', [RegisteredUserController::class, 'store'])
        ->name('register.post');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/reset-password', function () {
        return view('auth.reset-password'); 
    })->name('password.request');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');

    Route::get('/email/verify', function () {
        return view('auth.verify-email'); 
    })->name('verification.notice');

    Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])
        ->name('verification.send');

