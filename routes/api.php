<?php
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/bookings', function () {
    return \App\Models\Booking::latest()->get();
});
Route::patch('/bookings/{id}/status', [BookingController::class, 'updateStatus']);
Route::get('/weekly-stats', [BookingController::class, 'weeklyStats']);
Route::post('/booking', [BookingController::class, 'store']);
