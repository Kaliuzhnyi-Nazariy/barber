<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServiceController::class, 'index'])->defaults('viewName', 'home');

Route::get('/appointment', [ServiceController::class, 'index'])->defaults('viewName', 'appointment');

Route::get('/api/reservations/booked-slots', [ReservationController::class, 'getBookedSlots']);

Route::post('/create/appointment', [ReservationController::class, 'store']);