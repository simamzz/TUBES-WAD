<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Article;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data event
        $events = Event::all(); // Ambil semua event dari database
        
        // Mengambil data articles
        $articles = Article::all(); // Ambil semua article dari database

        $testimonials = Testimonial::all(); // Ambil semua testimonial dari database

        // Mengirim data events dan articles ke view dashboard
        return view('dashboard', compact('events', 'articles', 'testimonials'));
    }
    
}
