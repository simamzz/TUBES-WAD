<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RekruitController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Forum;
use App\Models\Event;
use App\Models\Testimonial;
use App\Models\Rekruit;

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
Route::resource('rekruits', RekruitController::class);

// NAVIGASI LINE ----------------------------
// navigasi event
Route::get('/event', function () {
    $events = Event::all();
    return view('events.index', compact('events'));
})->name('event');

// navigasi course
Route::get('/course', function () {
    $events = Event::all(); // ubah sesuai controller masing2
    return view('course', compact('course'));
})->name('course');

// navigasi testimoni
Route::get('/testimoni', function () {
    $testimonials = Testimonial::all();
    return view('testimonials.index', compact('testimonials'));
})->name('testimoni');

// navigasi forum
Route::get('/forum', function () {
    Route::resource('forums', ForumController::class)->middleware('auth');

    // Route untuk menyimpan pertanyaan di forum
    Route::post('forums/{forum}/questions', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');

    // Route untuk menyimpan jawaban pada pertanyaan
    Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store')->middleware('auth');

    $forums = Forum::with('user')->latest()->get();
    return view('forums.index', compact('forums'));
})->name('forum');

// Rute Forum
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('forums', ForumController::class)->except(['show', 'index']);
});

// Rute untuk semua pengguna (Index dan Show dapat dilihat semua user)
Route::resource('forums', ForumController::class)->only(['index', 'show']);
Route::post('forums/{forum}/questions', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');
Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store')->middleware('auth');


// navigasi rekruitasi
Route::get('/rekruits', function () {
    $rekruits = Rekruit::all();
    return view('rekruits.index', compact('rekruits'));
})->name('rekruits');

// navigasi article
Route::get('/article', function () {
    $events = Event::all(); // ubah sesuai controller masing2
    return view('article', compact('article'));
})->name('article');
// NAVIGASI LINE ----------------------------

// Spatie Permission Routes
Route::group(['middleware' => ['permission:create users|view users|edit users|delete users']], function () {
    Route::get('/add-user',function(){
        return "add user";
    });
});

#<<<<<<< Updated upstream
require __DIR__ . '/auth.php';

// Rekruit Routes
Route::get('/rekruit', [RekruitController::class, 'index'])->name('rekruits.index');
Route::get('/rekruit/create', [RekruitController::class, 'create'])->name('rekruits.create');
Route::post('/rekruit', [RekruitController::class, 'store'])->name('rekruits.store');
Route::get('/rekruit/{rekruit}/edit', [RekruitController::class, 'edit'])->name('rekruits.edit');
Route::put('/rekruit/{rekruit}', [RekruitController::class, 'update'])->name('rekruits.update');
Route::delete('/rekruit/{rekruit}', [RekruitController::class, 'destroy'])->name('rekruits.destroy');

// Testimonial Routes
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index'); // Show all testimonials
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create'); // Show form to create testimonial
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store'); // Save new testimonial
Route::get('/testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('testimonials.show'); // Show a single testimonial
Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit'); // Show form to edit testimonial
Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update'); // Update testimonial
Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy'); // Delete testimonial