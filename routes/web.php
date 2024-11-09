<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
});