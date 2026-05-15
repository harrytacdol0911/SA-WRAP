<?php
// routes/web.php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public frontend routes
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/menu', [FrontController::class, 'menu'])->name('menu');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontController::class, 'submitContact'])->name('contact.submit');

// Admin routes (protected by auth + admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::resource('social', AdminSocialController::class)->only(['index', 'edit', 'update']);
});

Route::get('/loginadmin', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/myhome');
