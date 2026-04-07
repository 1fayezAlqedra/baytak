<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;




Route::prefix('admin')->group(function () {

    // login
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // protected
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/test', [AdminController::class, 'test'])->name('admin.test');
    });

});

// ========================
// صفحة حجز الجلسة التعريفية
// ========================
Route::get('/', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/booking', [BookingController::class, 'submitBooking'])->name('booking.submit');



