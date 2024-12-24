<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RekruitController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;

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
    
    // Route untuk daftar pertanyaan
    Route::get('/forum', [QuestionController::class, 'index'])->name('forum.index');

    // Route untuk membuat pertanyaan
    Route::get('/forum/create', [QuestionController::class, 'create'])->name('forum.create');
    Route::post('/forum', [QuestionController::class, 'store'])->name('forum.store');

    // Route untuk melihat detail pertanyaan dan memberikan jawaban
    Route::get('/forum/{question}', [QuestionController::class, 'show'])->name('forum.show');
    Route::post('/forum/{question}/answer', [AnswerController::class, 'store'])->name('answers.store');
});

// Resource routes for Event and Testimonial
Route::resource('events', EventController::class);
Route::resource('testimonials', TestimonialController::class);

// Navigasi
Route::get('/event', function () {
    return view('event');
})->name('event');

Route::get('/course', function () {
    return view('course');
})->name('course');

Route::get('/testimoni', function () {
    return view('testimoni');
})->name('testimoni');

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