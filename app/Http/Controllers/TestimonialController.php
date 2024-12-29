<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    // Menampilkan semua testimonial
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials'));
    }

    // Menampilkan form create testimonial
    public function create()
    {
        return view('testimonials.create');
    }

    // Menyimpan testimoni baru
    public function store(Request $request)
    {
        //cvalidasi data input dari form
        $validatedData = $request->validate([
            'user_id' => 'required|exists:user_id', //memastikan user_id ada dan valid
            'name' => 'required|string',
            'category' => 'required|string',
            'testimonial' => 'required|string',
        ]);

        //cMenyimpan testimoni baru ke database
        Testimonial::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully!');
    }

    // Menampilkan detail testimonial
    public function show($id)
    {
        //Mengambil testimoni berdasarkan id
        $testimonial = Testimonial::findOrFail($id);

        // Menampilkan halaman
        return view('testimonial.show', compact('testimonial'));
    }

    // Menampilkan form edit testimonial
    public function edit(string $id)
    {
        // Mengambil testimoni yang akan diedit
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonials.edit', compact('testimonial'));
    }

    // Mengupdate testimonial yang sudah ada
    public function update(Request $request, $id)
    {
        // Menemukan testimoni berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);

        // validasi data input dari form
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'category' => 'required|string',
            'testimonial' => 'required|string',
        ]);

        // Memperbarui data testimoni
        $testimonial->update($validatedData);

        // Redirect ke halaman index testimoni
        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    // Menghapus testimoni
    public function destroy($id)
    {
        // Menemukan testimoni berdasarkan ID
        $testimonial = Testimonial::findOrFail($id);
        
        // Menghapus testimoni
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }
}
