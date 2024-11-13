<?php

use App\Models\Course;
use App\Models\CategoryCourse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryArtikelController;
use App\Http\Controllers\Admin\CategoryCourseController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

    // Auth
    Route::get('/login', function () {return view('auth.login');})->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
    Route::get('/signup', function () {return view('auth.register');})->name('register'); 
    Route::post('/signup', [RegisteredUserController::class, 'store'])->name('register.post');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/reset-password', function () { return view('auth.reset-password'); })->name('password.request');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    Route::get('/email/verify', function () { return view('auth.verify-email');})->name('verification.notice');
    Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');
    
    // Landing Page
    Route::controller(LandingPageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/tentang-kami', 'about')->name('about');
        Route::get('/course', 'course')->name('course');
        Route::get('/zoom-webinar', 'zoomWebinar')->name('zoomWebinar');
        Route::get('/event', 'event')->name('event');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/kontak', 'contact')->name('contact');
    });

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [DashboardController::class, 'courses'])->name('dashboard.courses');
    Route::get('/create', [DashboardController::class, 'coursesCreate'])->name('dashboard.coursesCreate');
    Route::get('/message', [DashboardController::class, 'message'])->name('dashboard.message');
    Route::get('/reviews', [DashboardController::class, 'reviews'])->name('dashboard.reviews');
    Route::get('/quiz-attempts', [DashboardController::class, 'quizAttempts'])->name('dashboard.quizAttempts');
    Route::get('/order-history', [DashboardController::class, 'orderHistory'])->name('dashboard.orderHistory');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::get('/my-profile', [DashboardController::class, 'myProfile'])->name('dashboard.myProfile');
    Route::get('/my-course', [DashboardController::class, 'myCourse'])->name('dashboard.myCourse');
    Route::get('/cart', [DashboardController::class, 'cart'])->name('addashboardmin.cart');
    Route::get('/assignments', [DashboardController::class, 'assignments'])->name('dashboard.assignments');
    Route::get('/announcements', [DashboardController::class, 'announcements'])->name('dashboard.announcements');
    Route::get('/enrolled-courses', [DashboardController::class, 'enrolledCourses'])->name('dashboard.enrolledCourses');
    Route::get('/wishlist', [DashboardController::class, 'wishlist'])->name('dashboard.wishlist');
    Route::get('/checkout', [DashboardController::class, 'checkout'])->name('dashboard.checkout');
    Route::resource('/kategori-kursus', CategoryCourseController::class);
    Route::resource('/kursus', CourseController::class);
    Route::resource('/artikel', ArtikelController::class);
    Route::resource('/kategori-artikel', CategoryArtikelController::class);
    


