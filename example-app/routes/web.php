<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\BookingController;

Route::get('/book', [BookingController::class, 'create'])->name('book.create');
Route::post('/book', [BookingController::class, 'store'])->name('book.store');

// Routes للمستخدمين
Route::middleware('auth')->group(function () {
    Route::get('/book', [BookingController::class, 'create'])->name('book.create');
    Route::post('/book', [BookingController::class, 'store'])->name('book.store');
});

// Routes للمشرفين
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::put('/admin/bookings/{booking}/update', [BookingController::class, 'update'])->name('admin.bookings.update');
});
