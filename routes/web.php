<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RekruitController;
use App\Http\Controllers\TestimonialController;
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
Route::resource('testimonials', TestimonialController::class);


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

// spatie
Route::group(['middleware' => ['permission:create users|view users|edit users|delete users']], function () {
    Route::get('/add-user',function(){
        return "add user";
    });
});

require __DIR__ . '/auth.php';

// rekruits

Route::get('/rekruit', [RekruitController::class, 'index'])->name('rekruits.index');

Route::get('/rekruit/create', [RekruitController::class, 'create'])->name('rekruits.create');

Route::post('/rekruit', [RekruitController::class, 'store'])->name('rekruits.store');

Route::get('/rekruit/{rekruit}/edit', [RekruitController::class, 'edit'])->name('rekruits.edit');

Route::put('/rekruit/{rekruit}', [RekruitController::class, 'update'])->name('rekruits.update');

Route::delete('/rekruit/{rekruit}', [RekruitController::class, 'destroy'])->name('rekruits.destroy');