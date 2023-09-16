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
});

Auth::routes();

Route::get('/{date?}', function ($date = null) {
    return view('client.index', ['date' => $date]);
})->name('/');


Route::post('/add_hall', [App\Http\Controllers\HallController::class, 'store'])->name('add_hall');
Route::get('/delete_hall/{id}', [App\Http\Controllers\HallController::class, 'destroy'])->name('delete_hall');
