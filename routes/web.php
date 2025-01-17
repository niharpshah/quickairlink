<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

// Boking Routes
Route::get('/booking',[BookingController::class,'index']);
Route::post('/booking',[BookingController::class,'saveBooking'])->name('booking.save');
Route::get('/user',[BookingController::class,'userPage'])->name('booking.user');
Route::post('/user',[BookingController::class,'saveUsers'])->name('user.save');
Route::get('/review',[BookingController::class,'reviewPage'])->name('booking.review');
