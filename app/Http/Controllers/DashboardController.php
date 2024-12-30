<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
{
    // Mengambil data event
    $events = Event::all(); // Ambil semua event dari database

    // Mengirim data events ke view dashboard
    return view('dashboard', compact('events'));
}

}
