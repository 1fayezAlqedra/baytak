<?php
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

Route::get('/bookings', [AdminController::class, 'index']);
Route::patch('/bookings/{id}/status', [BookingController::class, 'updateStatus']);
Route::get('/weekly-stats', [BookingController::class, 'weeklyStats']);
Route::post('/booking', [BookingController::class, 'store']);
