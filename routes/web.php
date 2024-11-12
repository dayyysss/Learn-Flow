<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;

    // Auth
    Route::get('/login', function () { return view('auth.login');})->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
    Route::get('/signup', function () { return view('auth.register');})->name('register');
    Route::post('/signup', [RegisteredUserController::class, 'store'])->name('register.post');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/reset-password', function () { return view('auth.reset-password'); })->name('password.request');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    Route::get('/email/verify', function () { return view('auth.verify-email');})->name('verification.notice');
    Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');
    
    // Landing Page
    Route::controller(LandingPageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('about');
        Route::get('/course', 'course')->name('course');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/contact', 'contact')->name('contact');
    });

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/courses', [DashboardController::class, 'courses'])->name('admin.courses');
    Route::get('/create', [DashboardController::class, 'coursesCreate'])->name('admin.coursesCreate');
    Route::get('/message', [DashboardController::class, 'message'])->name('admin.message');
    Route::get('/reviews', [DashboardController::class, 'reviews'])->name('admin.reviews');
    Route::get('/quiz-attempts', [DashboardController::class, 'quizAttempts'])->name('admin.quizAttempts');
    Route::get('/order-history', [DashboardController::class, 'orderHistory'])->name('admin.orderHistory');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('admin.settings');
    Route::get('/my-profile', [DashboardController::class, 'myProfile'])->name('admin.myProfile');
    Route::get('/my-course', [DashboardController::class, 'myCourse'])->name('admin.myCourse');
    Route::get('/cart', [DashboardController::class, 'cart'])->name('admin.cart');
    Route::get('/assignments', [DashboardController::class, 'assignments'])->name('admin.assignments');
    Route::get('/announcements', [DashboardController::class, 'announcements'])->name('admin.announcements');
    Route::get('/enrolled-courses', [DashboardController::class, 'enrolledCourses'])->name('admin.enrolledCourses');
    Route::get('/wishlist', [DashboardController::class, 'wishlist'])->name('admin.wishlist');
    Route::get('/checkout', [DashboardController::class, 'checkout'])->name('admin.checkout');


