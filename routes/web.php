<?php

use App\Http\Controllers\BookingApprovalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\OnlyAdminMiddleware;
use App\Http\Middleware\OnlyApproverMiddleware;
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
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(BookingController::class)
    ->middleware(['auth', 'verified', OnlyAdminMiddleware::class])->group(function () {
        Route::get('/booking', 'index')->name('booking');
        Route::post('/booking', 'bookingVehicle');
        Route::get('/booking/request', 'bookingRequest')->name('bookingRequest');
        Route::get('/reports/export', 'export');
        Route::get('/booking/approved', 'bookingApproved')->name('bookingApproved');
    });

Route::controller(BookingApprovalController::class)
    ->middleware(['auth', 'verified', OnlyApproverMiddleware::class])->group(function () {
        Route::get('/approval', 'index')->name('approval');
        Route::post('/approval/{id}/approve', 'approve')->name('approve');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
