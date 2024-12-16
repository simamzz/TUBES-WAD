<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// controller
Route::resource('events', EventController::class);


// navigasi
Route::get('/event', function () {
    return view('event');
})->name('event');

Route::get('/course', function () {
    return view('course');
})->name('course');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

Route::get('/testimoni', function () {
    return view('testimoni');
})->name('testimoni');

require __DIR__ . '/auth.php';
