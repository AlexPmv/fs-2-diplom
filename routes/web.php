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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HallController::class, 'index'])->name('admin');
    Route::post('/add_hall', [App\Http\Controllers\HallController::class, 'store'])->name('add_hall');
    Route::post('/update_seat_count', [App\Http\Controllers\HallController::class, 'updateSeatCount'])->name('update_seat_count');
    Route::post('/update_hall_price', [App\Http\Controllers\HallController::class, 'updatePrice'])->name('update_hall_price');
    Route::post('/update_hall_config', [App\Http\Controllers\HallConfigController::class, 'update'])->name('update_hall_config');
    Route::get('/delete_hall/{id}', [App\Http\Controllers\HallController::class, 'destroy'])->name('delete_hall');
});

Auth::routes();

Route::get('/{date?}', function ($date = null) {
    return view('client.index', ['date' => $date]);
})->name('/');