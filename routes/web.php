<?php

use App\Models\Course;
use App\Models\CategoryCourse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\LFCMS\DashboardCMSController;
use App\Http\Controllers\Landing\LandingPageController;
use App\Http\Controllers\Admin\CategoryCourseController;
use App\Http\Controllers\Admin\CategoryArtikelController;
use App\Http\Controllers\Admin\Quiz\QuizResultController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use App\Http\Controllers\Admin\CourseRegistrationController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Auth
Route::get('/login', function () { return view('auth.login');})->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::get('/signup', function () { return view('auth.register');})->name('register');
Route::post('/signup', [RegisteredUserController::class, 'store'])->name('register.post');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/forgot-password', function () { return view('auth.forgot-password');})->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', function ($token) { return view('auth.reset-password', ['token' => $token]);})->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
Route::get('/email/verify', function () { return view('auth.verify-email');})->name('verification.notice');
Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');
// Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');

// Landing Page
Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/tentang-kami', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/zoom-webinar', 'zoomWebinar')->name('zoomWebinar');
    Route::get('/event', 'event')->name('event');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/kontak', 'contact')->name('contact');
    Route::get('/instruktur', 'instructor')->name('instructor');
});

// Dashboard CMS
Route::prefix('lfcms')->group(function () {
    Route::controller(DashboardCMSController::class)->group(function () {
        Route::get('/dashboard', 'indexCMS')->name('indexCMS');
    });
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/indexUser', [DashboardController::class, 'indexUser'])->name('index.user');
Route::resource('/courses', CourseController::class);
Route::get('/create', [DashboardController::class, 'coursesCreate'])->name('dashboard.coursesCreate');
Route::get('/message', [DashboardController::class, 'message'])->name('dashboard.message');
Route::get('/reviews', [DashboardController::class, 'reviews'])->name('dashboard.reviews');
Route::get('/order-history', [DashboardController::class, 'orderHistory'])->name('dashboard.orderHistory');
Route::resource('/settings', SettingController::class);
Route::get('/my-profile', [DashboardController::class, 'myProfile'])->name('dashboard.myProfile');
Route::get('/cart', [DashboardController::class, 'cart'])->name('dashboardmin.cart');
Route::get('/assignments', [DashboardController::class, 'assignments'])->name('dashboard.assignments');
Route::get('/announcements', [DashboardController::class, 'announcements'])->name('dashboard.announcements');
Route::get('/enrolled-courses', [DashboardController::class, 'enrolledCourses'])->name('dashboard.enrolledCourses');

Route::put('/setting/updateProfile', [SettingController::class, 'updateProfil'])->name('updateProfile');
Route::post('/settings/update-password', [SettingController::class, 'updatePassword'])->name('settings.update-password');
Route::post('/settings/update-sosial', [SettingController::class, 'updateSocialMedia'])->name('user.update.social_media');

Route::get('/certificate/print/{registrationId}', [CourseController::class, 'printCertificate'])->name('certificate.print');


Route::get('/instruktur-detail', [UserController::class, 'instrukturDetail'])->name('instruktur.detail');
Route::get('/my-course', [CourseController::class, 'myCourses'])->name('course.instruktur');
Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.detail');
Route::get('/modul/{slug}', [CourseController::class, 'showModul'])->name('modul.detail');
Route::get('/course/{slug}/lesson', [CourseController::class, 'showBab'])->name('babCourse.index');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('dashboard.wishlist');
Route::get('/checkout', [DashboardController::class, 'checkout'])->name('dashboard.checkout');
Route::resource('/kategori-kursus', CategoryCourseController::class);
Route::resource('/artikel', ArtikelController::class);
Route::resource('/kategori-artikel', CategoryArtikelController::class);

// course-registrations
Route::get('/course-registrations/create', [CourseRegistrationController::class, 'create'])->name('course-registrations.create');
Route::post('/course-registrations/store', [CourseRegistrationController::class, 'store'])->name('course-registrations.store');
// Route::post('/course-registrations/store-from-cart', [CourseRegistrationController::class, 'storeFromCart'])->name('course-registrations.store-from-cart');
Route::get('/course-registrations', [CourseRegistrationController::class, 'enrolledCourses'])->name('course-registrations.index');
Route::post('/payment/update', [CourseRegistrationController::class, 'update']);
Route::post('/payment/update-method', [CourseRegistrationController::class, 'updateMethod']);
Route::post('/payment/notification', [CourseRegistrationController::class, 'paymentNotification']);
Route::post('/payment/store', [CourseRegistrationController::class, 'store'])->name('payment.store');
Route::get('/payment/{snapToken}', [CourseRegistrationController::class, 'showPaymentPage'])->name('payment.page');


//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'updateCart'])->name('cart.update');
// Route::post('/cart', [CartController::class, 'update'])->name('cart.update');
Route::patch('/cart', [CartController::class, 'updateCart']);
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.remove');
Route::post('/clear-cart', [CartController::class, 'clearCart']);

//wishlist
Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlists.store');
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlists.destroy');
Route::get('/wishlist/check', [WishlistController::class, 'check'])->name('wishlists.check');;

//feedback
Route::resource('/feedback', FeedbackController::class);

//quiz

//quiz result
Route::get('/quiz-results', [QuizResultController::class, 'index'])->name('dashboard.quizResults');
Route::get('/quiz-results/{id}', [QuizResultController::class, 'show'])->name('quizresult.show');





