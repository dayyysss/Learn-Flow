<?php

use App\Models\Course;
use App\Models\ModulProgress;
use App\Models\CategoryCourse;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\BabController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LFCMS\PageController;
use App\Http\Controllers\Admin\ModulController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\LFCMS\ClientController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\LFCMS\ArticleController;
use App\Http\Controllers\LFCMS\ArtikelController;
use App\Http\Controllers\LFCMS\ContactController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\LFCMS\HakAksesController;
use App\Http\Controllers\LFCMS\MenuListController;
use App\Http\Controllers\LFCMS\MenuTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Quiz\QuizController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\LFCMS\PembayaranController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\Quiz\OptionController;
use App\Http\Controllers\LFCMS\TestimonialController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\LFCMS\DashboardCMSController;
use App\Http\Controllers\Admin\ModulProgressController;
use App\Http\Controllers\Admin\Quiz\QuestionController;
use App\Http\Controllers\Landing\ContactFormController;
use App\Http\Controllers\Landing\LandingPageController;
use App\Http\Controllers\LFCMS\CategoryCourseController;
use App\Http\Controllers\Admin\EnrolledCourseController;
use App\Http\Controllers\Admin\Quiz\StartQuizController;
use App\Http\Controllers\Admin\Quiz\QuizResultController;
use App\Http\Controllers\LFCMS\KategoriArtikelController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\LFCMS\HakAksesFrontendController;
use App\Http\Controllers\LFCMS\HistoryPembayaranController;
// use App\Http\Controllers\LFCMS\ArticleController;
// use App\Http\Controllers\LFCMS\HakAksesController;
// use App\Http\Controllers\LFCMS\HakAksesFrontendController;
// use App\Http\Controllers\LFCMS\TestimoniController;
// use App\Models\ModulProgress;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use App\Http\Controllers\Admin\CourseRegistrationController;
use App\Http\Controllers\LFCMS\WebsiteConfigurationController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\LFCMS\CourseController as LFCMSCourseController;
use App\Http\Controllers\LFCMS\QuizController as LFCMSQuizController;
use App\Http\Controllers\LFCMS\RoadmapController;

// Auth
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/LFCMS', function () {
    return view('auth.login-cms');
});
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::get('/signup', function () {
    return view('auth.register');
})->name('register');
Route::post('/signup', [RegisteredUserController::class, 'store'])->name('register.post');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');
// Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->name('verification.notice');
// Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');

//Login Google
Route::get('/login/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/login/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//apexchart
Route::get('/visitor-count', [DashboardCMSController::class, 'visitor']);

// Landing Page
Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/zoom-webinar', 'zoomWebinar')->name('zoomWebinar');
    Route::get('/event', 'event')->name('event');
    Route::get('/menu-landing', 'indexMenu')->name('menu.landing');
    Route::get('/roadmap', 'roadmap')->name('roadmap');

    Route::prefix('blog')->group(function () {
        Route::get('/', 'blog')->name('blog');
        Route::get('/cari', 'search')->name('blog.search');
        Route::get('/kategori/{name}', 'showCategory')->name('blog.category');
        Route::get('/tag/{tag}', 'showTag')->name('blog.tag');
        Route::get('/{slug}', 'showSlug')->name('blog.showSlug');
    });

    Route::get('/kontak', 'contact')->name('contact');
    Route::get('/instruktur', 'instructor')->name('instructor');
    Route::get('/instruktur/{id}', [LandingPageController::class, 'showinstructor'])->name('showinstructor');
});

Route::resource('/certificate', CertificateController::class);

Route::controller(CertificateController::class)->group(function () {
    // Menampilkan certificate berdasarkan certificate_id yang ada pada CourseRegistration
    Route::get('/certificate/{certificateId}', 'show')->name('certificate.index');

    // Menampilkan certificate sesuai dengan certificate_id
    Route::get('/view-certificate/{certificateId}', 'viewCertificate')->name('viewCertificate');

    // Download certificate berdasarkan certificate_id
    Route::get('/download-certificate/{certificateId}', 'downloadCertificate')->name('downloadCertificate');
});

// Dashboard CMS
Route::prefix('lfcms')
    ->middleware(['auth', RoleMiddleware::class . ':superadmin'])
    ->group(function () {
        Route::controller(DashboardCMSController::class)->group(function () {
            Route::get('/dashboard', 'indexCMS')->name('dashboard.index');
            Route::get('/pengguna', 'penggunaCMS')->name('penggunaCMS');
            Route::get('/administrator', 'administratorCMS')->name('administratorCMS');
            Route::resource('/klien', ClientController::class);
            Route::get('/klien/{id}/delete', [ClientController::class, 'destroy'])->name('klien.destroy');
            Route::resource('/halaman', PageController::class);
            Route::get('/halaman/{id}/delete', [PageController::class, 'destroy'])->name('halaman.destroy');
            Route::resource('/testimonial', TestimonialController::class);
            Route::get('/testimonial/{id}/delete', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
            Route::resource('/kontak', ContactController::class);
            Route::get('/kontak/{id}/delete', [ContactController::class, 'destroy'])->name('kontak.destroy');
            Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');
            Route::post('/kontak/{id}/reply', [ContactController::class, 'reply'])->name('kontak.reply');
            Route::get('/pengaturan', 'pengaturanCMS')->name('pengaturanCMS');
        });
        // Route::resource('/testimonial', TestimoniController::class);
        //     // Route::get('/phpklien', 'klienCMS')->name('klienCMS');
        //     Route::resource('/klien', ClientController::class);
        //     Route::resource('/halaman', PageController::class);
    
        // Route::get('/modul/{slug}/progress', [ModulProgressController::class, 'getProgress']);
        //  Route::post('/modul/{slug}/progress', [ModulProgressController::class, 'updateProgress']);
    

        //website
        Route::resource('/website', WebsiteConfigurationController::class);

        Route::resource('lfcms-quiz', App\Http\Controllers\LFCMS\QuizController::class);
        Route::get('/quizzes/{slug}', [LFCMSQuizController::class, 'showQuiz'])->name('quizzes.show');

        // Menyimpan pertanyaan baru ke dalam quiz
        Route::post('/quiz/{quizId}/questions', [LFCMSQuizController::class, 'storeQuestion'])->name('quiz.storeQuestion');
        Route::post('/quiz/{quizId}/update-question/{questionId}', [QuizController::class, 'updateQuestion'])
            ->name('quiz.updateQuestion');

        Route::put('/quiz/questions/{id}', [LFCMSQuizController::class, 'updateQuestion'])->name('quiz.questions.update');
        Route::delete('/quiz/questions/{id}', [LFCMSQuizController::class, 'deleteQuestion'])->name('quiz.questions.delete');

        //Discount
        Route::resource('/discount', DiscountController::class)
            ->names('admin.discounts')
            ->except(['show']);
        Route::post('/apply-promo/{promoCode}', [DiscountController::class, 'applyPromoCode']);
        Route::get('/get-promo-list', [DiscountController::class, 'getPromoList']);

        //Artikel
        Route::resource('/artikel', ArtikelController::class);
        Route::get('/artikel/{id}/delete', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

        Route::resource('/kategori-artikel', KategoriArtikelController::class);
        Route::get('/kategori-artikel/{id}/delete', [KategoriArtikelController::class, 'destroy'])->name('kategori-artikel.destroy');
        Route::get('/pembayaran', [PembayaranController::class, 'pembayaranCMS'])->name('pembayaran.index');
        Route::get('/riwayat-pembayaran', [HistoryPembayaranController::class, 'historypembayaranCMS'])->name('riwayat-pembayaran.index');

        Route::resource('/kategori-kursus', CategoryCourseController::class);
        //user
        Route::resource('/administrator', UserController::class);


        //menu
        Route::resource('/menu', MenuListController::class);
        Route::resource('/menu_type', MenuTypeController::class);
        Route::get('/menu/{menuTypeId}/menuList', [MenuListController::class, 'getMenusByMenuType']);
        Route::post('/menu/update-order', [MenuListController::class, 'updateOrder'])->name('menu.updateOrder');
        Route::post('/menu/update-parent', [MenuListController::class, 'updateParent'])->name('menu.updateParent');
        Route::post('/menu/update-order', [MenuListController::class, 'updateOrder'])->name('menu.updateOrder');
        Route::post('/menu/update-parent', [MenuListController::class, 'updateParent'])->name('menu.updateParent');
        Route::post('/menu/remove-parent', [MenuListController::class, 'removeParent'])->name('menu.removeParent');

        //hak Akses
        Route::resource('/hak-akses', HakAksesController::class);
        Route::put('role/{id}', [HakAksesController::class, 'updateRole'])->name('role.update');
        Route::get('/menu-sidebar', [HakAksesController::class, 'indexSidebar'])->name('indexbyId');
        Route::get('hak-akses/get-permissions', [HakAksesController::class, 'getPermissionsForRole'])->name('hak-akses.getPermissions');
        Route::get('hak-akses/{roleId}', [HakAksesController::class, 'indexbyRole'])->name('HakAkses.index');
        Route::delete('/role/{id}', [HakAksesController::class, 'destroy'])->name('role.destroy');

        //hak Akses Frontend
        Route::resource('/hakAkses-frontend', HakAksesFrontendController::class);
        Route::put('frontend/role/{id}', [HakAksesFrontendController::class, 'updateRole'])->name('role.update.frontend');
        Route::get('/menu-sidebar', [HakAksesFrontendController::class, 'indexSidebar'])->name('indexbyId');
        Route::get('frontend/hak-akses/get-permissions', [HakAksesFrontendController::class, 'getPermissionsForRole'])->name('hak-akses.getPermissions.frontend');
        Route::get('frontend/hak-akses/{roleId}', [HakAksesFrontendController::class, 'indexbyRole'])->name('HakAkses.index.frontend');
        Route::delete('frontend/role/{id}', [HakAksesFrontendController::class, 'destroy'])->name('role.destroy.frontend');

        Route::post('/website/kata-kunci', [WebsiteConfigurationController::class, 'storeKeyword'])->name('konfigurasi.kataKunci');
        Route::post('/website/kontak', [WebsiteConfigurationController::class, 'storeKontak'])->name('konfigurasi.kontak');
        Route::post('/website/Sosial-media', [WebsiteConfigurationController::class, 'storeSosial'])->name('konfigurasi.sosialMedia');

        Route::resource('/roadmap', RoadmapController::class);
        Route::post('/roadmaps/update-order', [RoadmapController::class, 'updateOrder'])->name('roadmaps.updateOrder');


        Route::resource('/kursus', LFCMSCourseController::class);
        Route::get('/kursus/{slug}', [LFCMSCourseController::class, 'show'])->name('kursus.detail');

        // bulk 
        Route::post('/halaman/bulk-delete', [PageController::class, 'bulkDelete'])->name('halaman.bulkDelete');
        Route::post('/halaman/bulk-draft', [PageController::class, 'bulkDraft'])->name('halaman.bulkDraft');
        Route::post('/halaman/bulk-publish', [PageController::class, 'bulkPublish'])->name('halaman.bulkPublish');

        Route::post('/klien/bulk-delete', [ClientController::class, 'bulkDelete'])->name('klien.bulkDelete');
        Route::post('/klien/bulk-draft', [ClientController::class, 'bulkDraft'])->name('klien.bulkDraft');
        Route::post('/klien/bulk-publish', [ClientController::class, 'bulkPublish'])->name('klien.bulkPublish');

        Route::post('/kontak/bulk-delete', [ContactController::class, 'bulkDelete'])->name('kontak.bulkDelete');
        Route::post('/kontak/bulk-draft', [ContactController::class, 'bulkDraft'])->name('kontak.bulkDraft');
        Route::post('/kontak/bulk-publish', [ContactController::class, 'bulkPublish'])->name('kontak.bulkPublish');

        Route::post('/testimonial/bulk-delete', [TestimonialController::class, 'bulkDelete'])->name('testimonial.bulkDelete');
        Route::post('/testimonial/bulk-draft', [TestimonialController::class, 'bulkDraft'])->name('testimonial.bulkDraft');
        Route::post('/testimonial/bulk-publish', [TestimonialController::class, 'bulkPublish'])->name('testimonial.bulkPublish');
    });

// Detail Course
Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.detail');

// Dashboard
Route::middleware(['auth', RoleMiddleware::class . ':student|instructor'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/indexUser', [DashboardController::class, 'indexUser'])->name('index.user');
        Route::resource('/courses', CourseController::class);
        Route::get('/create', [DashboardController::class, 'coursesCreate'])->name('dashboard.coursesCreate');
        Route::get('/message', [DashboardController::class, 'message'])->name('dashboard.message');
        Route::get('/reviews', [FeedbackController::class, 'reviews'])->name('dashboard.reviews');
        Route::get('/order-history', [CourseRegistrationController::class, 'orderHistory'])->name('dashboard.orderHistory');
        Route::resource('/settings', SettingController::class);
        Route::get('/my-profile', [DashboardController::class, 'myProfile'])->name('dashboard.myProfile');
        Route::get('/cart', [DashboardController::class, 'cart'])->name('dashboardmin.cart');
        Route::get('/assignments', [DashboardController::class, 'assignments'])->name('dashboard.assignments');
        Route::get('/announcements', [DashboardController::class, 'announcements'])->name('dashboard.announcements');
        Route::get('/enrolled-courses', [EnrolledCourseController::class, 'enrolledCourses'])->name('dashboard.enrolledCourses');

        Route::put('/setting/updateProfile', [SettingController::class, 'updateProfil'])->name('updateProfile');
        Route::post('/settings/update-password', [SettingController::class, 'updatePassword'])->name('settings.update-password');
        Route::post('/settings/update-sosial', [SettingController::class, 'updateSocialMedia'])->name('user.update.social_media');

        Route::get('/certificate/print/{registrationId}', [CourseController::class, 'printCertificate'])->name('certificate.print');


        Route::get('/instruktur-detail', [UserController::class, 'instrukturDetail'])->name('instruktur.detail');
        Route::get('/my-course', [CourseController::class, 'myCourses'])->name('course.instruktur');
        // web.php
        Route::get('/course/{course:slug}/modul/{modul:slug}', [CourseController::class, 'showModul'])->name('modul.detail');
        Route::get('/courses/{course:slug}/moduls/{modul:slug}', [CourseController::class, 'showModulAdmin'])->name('modul.detail.admin');
        Route::post('/update-modul-status', [CourseController::class, 'updateModulStatus']);

        Route::get('/getcart', [CartController::class, 'getCartData']);

        Route::get('/course/{course:slug}/quiz/{modul:slug}', [CourseController::class, 'showQuiz'])->name('quiz.detail');
        Route::get('/course/{slug}/lesson', [CourseController::class, 'showBab'])->name('babCourse.index');


        Route::get('/wishlist', [WishlistController::class, 'index'])->name('dashboard.wishlist');
        Route::get('/checkout', [DashboardController::class, 'checkout'])->name('dashboard.checkout');

        // course-registrations
        Route::get('/course-registrations/create', [CourseRegistrationController::class, 'create'])->name('course-registrations.create');
        Route::post('/course-registrations/store', [CourseRegistrationController::class, 'store'])->name('course-registrations.store');
        Route::post('/course-registrations/store-from-cart', [CourseRegistrationController::class, 'storeFromCart'])->name('course-registrations.store-from-cart');
        Route::get('/course-registrations', [CourseRegistrationController::class, 'enrolledCourses'])->name('course-registrations.index');
        Route::post('/payment/update', [CourseRegistrationController::class, 'update']);
        Route::post('/payment/update-method', [CourseRegistrationController::class, 'updateMethod']);
        Route::post('/payment/notification', [CourseRegistrationController::class, 'paymentNotification']);
        Route::post('/payment/store', [CourseRegistrationController::class, 'store'])->name('payment.store');
        Route::get('/payment', [CourseRegistrationController::class, 'showPaymentPage'])->name('payment.page');
        Route::post('/payment/generate-snap-token', [CourseRegistrationController::class, 'generateSnapToken'])->name('payment.generateSnapToken');


        //cart
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
        Route::post('/cart', [CartController::class, 'updateCart'])->name('cart.update');
        // Route::post('/cart', [CartController::class, 'update'])->name('cart.update');
        Route::patch('/cart', [CartController::class, 'updateCart']);
        Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.remove');
        Route::post('/clear-cart', [CartController::class, 'clearCart']);

        //quiz
        Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
        Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
        Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');
        Route::get('/quiz/{slug}', [QuizController::class, 'show'])->name('quiz.show');
        Route::get('/quiz/{slug}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
        Route::patch('/quiz/update/{slug}', [QuizController::class, 'update'])->name('quiz.update');
        Route::delete('/quiz/{slug}', [QuizController::class, 'destroy'])->name('quiz.destroy');
        Route::get('/get-babs/{courseId}', [QuizController::class, 'getBabsByCourse']);

        //question
        Route::get('/quiz/question/create/{slug}', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/quiz/question/store/{slug}', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/quiz/question/edit/{slug}', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::patch('/quiz/question/update/{slug}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('/quiz/question/{slug}', [QuestionController::class, 'destroy'])->name('questions.destroy');

        //option
        Route::get('/quiz/question/option/create/{slug}', [OptionController::class, 'create'])->name('options.create');
        Route::post('/quiz/question/option/store/{slug}', [OptionController::class, 'store'])->name('options.store');
        Route::get('/quiz/question/option/edit/{slug}', [OptionController::class, 'edit'])->name('options.edit');
        Route::patch('/quiz/question/option/update/{slug}', [OptionController::class, 'update'])->name('options.update');
        Route::delete('/quiz/question/option/{slug}', [OptionController::class, 'destroy'])->name('options.destroy');

        //quiz result
        Route::get('/quiz-results', [QuizResultController::class, 'index'])->name('quizResults.index');
        Route::get('/quiz-results/{id}', [QuizResultController::class, 'show'])->name('quizresults.show');

        Route::get('/start-quiz/{id}', [StartQuizController::class, 'index'])->name('startQuiz.index');

        Route::post('/submit-quiz', [StartQuizController::class, 'submitQuiz'])->name('submit.quiz');

        //wishlist
        Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlists.store');
        Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlists.destroy');
        Route::post('/wishlist/check', [WishlistController::class, 'check'])->name('wishlists.check');
        ;

        //feedback
        Route::resource('/reviews', FeedbackController::class)->except(['show', 'index']);

        Route::controller(CertificateController::class)->group(function () {
            // Menampilkan certificate berdasarkan certificate_id yang ada pada CourseRegistration
            Route::get('/certificate/{certificateId}', 'show')->name('certificate.index');

            // Menampilkan certificate sesuai dengan certificate_id
            Route::get('/view-certificate/{certificateId}', 'viewCertificate')->name('viewCertificate');

            // Download certificate berdasarkan certificate_id
            Route::get('/download-certificate/{certificateId}', 'downloadCertificate')->name('downloadCertificate');
        });


        // Rute untuk memperbarui progres modul
        Route::post('/modul/{modul_id}/progress', [ModulProgressController::class, 'updateModulProgress'])->name('modul.updateProgress');

        // Rute untuk update progres berbasis scroll
        Route::post('/modul/{modul_id}/progresss', [ModulProgressController::class, 'update']);
        Route::get('/modultes', [DashboardController::class, 'modulPembelajaran'])->name('dashboard.modulPembelajaran');

        Route::resource('/assignment', AssignmentController::class);

        Route::post('/assignment/cancel/{id}', [AssignmentController::class, 'cancel'])->name('assignment.cancel');
        Route::get('/assignments/{modulId}', [AssignmentController::class, 'index'])->name('assignments.index');

        Route::resource('/babs', BabController::class);
        Route::resource('/moduls', ModulController::class);

        Route::get('/courses/{slug}/details', [BabController::class, 'showDetail'])->name('courses.details');

        Route::put('/assignments/{id}/grade', [AssignmentController::class, 'grade'])->name('assignments.grade');


        Route::get('/kelas/{course_slug}', [CourseController::class, 'showCourseRegistration'])->name('showCourseRegistration');

        //review
        Route::post('/reviews/store', [FeedbackController::class, 'store'])->name('reviews.store');
    });

Route::post('/kontak-masuk', [ContactController::class, 'store'])->name('contact.store');

Route::get('/403', function () {
    return response()->view('errors.403', [], 403);
})->name('errors.403');
