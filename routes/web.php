<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Mengubah rute login menjadi /learncourse
Route::get('/learnflow', function () {
    return view('auth.login'); // Pastikan tampilan login ada di resources/views/auth/login.blade.php
})->name('login');

// Rute untuk login (POST)
Route::post('/learnflow', [AuthenticatedSessionController::class, 'store'])
    ->name('login.post');

// Mengubah rute register menjadi /signup
Route::get('/signup', function () {
    return view('auth.register'); 
})->name('register');

// Rute untuk register (POST)
Route::post('/signup', [RegisteredUserController::class, 'store'])
    ->name('register.post');

// Mengubah rute logout menjadi /logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Mengubah rute untuk reset password menjadi /reset-password
Route::get('/reset-password', function () {
    return view('auth.reset-password'); 
})->name('password.request');

// Rute untuk mengirimkan reset password (POST)
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

// Mengubah rute untuk verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-email'); 
})->name('verification.notice');

// Mengubah rute untuk mengirim ulang email verifikasi
Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])
    ->name('verification.send');

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
});