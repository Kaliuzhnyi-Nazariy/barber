<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/book/appointment', [ServiceController::class, 'index']);

// Route::post('/create/appointment', [ReservationController::class, 'store']);

// Route::get('/book/appointment', [ReservationController::class, 'index']);

Route::get('/api/reservations/booked-slots', [ReservationController::class, 'getBookedSlots']);

Route::post('/create/appointment', [ReservationController::class, 'store']);