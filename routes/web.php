<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RekruitController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// controller
Route::resource('testimonials', TestimonialController::class);
Route::resource('events', EventController::class);

// NAVIGASI LINE ----------------------------
// navigasi event
Route::get('/event', function () {
    $events = Event::all();
    return view('events.index', compact('events'));
})->name('event');

// navigasi course
Route::get('/course', function () {
    return view('course');
})->name('course');

// navigasi testimoni
Route::get('/testimoni', function () {
    return view('testimoni');
})->name('testimoni');

// navigasi forum
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// navigasi article
Route::get('/article', function () {
    return view('article');
})->name('article');
// NAVIGASI LINE ----------------------------

// Spatie Permission Routes
Route::group(['middleware' => ['permission:create users|view users|edit users|delete users']], function () {
    Route::get('/add-user',function(){
        return "add user";
    });
});

require __DIR__ . '/auth.php';

// Rekruit Routes
Route::get('/rekruit', [RekruitController::class, 'index'])->name('rekruits.index');
Route::get('/rekruit/create', [RekruitController::class, 'create'])->name('rekruits.create');
Route::post('/rekruit', [RekruitController::class, 'store'])->name('rekruits.store');
Route::get('/rekruit/{rekruit}/edit', [RekruitController::class, 'edit'])->name('rekruits.edit');
Route::put('/rekruit/{rekruit}', [RekruitController::class, 'update'])->name('rekruits.update');
Route::delete('/rekruit/{rekruit}', [RekruitController::class, 'destroy'])->name('rekruits.destroy');