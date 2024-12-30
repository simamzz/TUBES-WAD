<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekruit;

use function Ramsey\Uuid\v1;

class RekruitController extends Controller
{
    public function index()
    {
        $rekruits = Rekruit::all();
        return view('rekruits.index', compact('rekruits'));

    }

    public function create()
    {
        return view('rekruits.create');    
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|unique:rekruits',
            'kelas' => 'required|string',
            'semester' => 'required|string',
            'angkatan' => 'required|string',
            'no_telepon' => 'required|string|unique:rekruits',
            'email' => 'required|string',
            'tentor_matkul' => 'required|string',
            'nilai_matkul' => 'required|string',
            'IPK' => 'required|string',
            'pengalaman_tentor' => 'required|string',
            'alasan' => 'required|string',
            'program' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files/pdf', 'public'); // Simpan di storage/public/events/pdf
            $validatedData['file'] = $filePath; // Tambahkan path file ke data validasi
        }

        Rekruit::create($validatedData);

        return redirect()->route('rekruits.index')->with('success', 'Recruitment created successfully!');

    }

    public function edit($id)
    {
        $rekruit = Rekruit::findOrFail($id);
        return view('rekruits.edit', compact('rekruit'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|numeric',
            'kelas' => 'required|string',
            'semester' => 'required|string',
            'angkatan' => 'required|string',
            'no_telepon' => 'required|numeric',
            'email' => 'required|email',
            'tentor_matkul' => 'nullable|string',
            'nilai_matkul' => 'nullable|string',
            'IPK' => 'required|numeric',
            'pengalaman_tentor' => 'nullable|string',
            'alasan' => 'nullable|string',
            'program' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files/pdf', 'public'); // Simpan ke public storage
            $validated['file'] = $filePath; // Tambahkan path gambar ke data yang divalidasi
        }


        $rekruit = Rekruit::findOrFail($id);

        $rekruit->update($validated);

        return redirect()->route('rekruits.index')->with('success', 'Recruitment updated successfully!');

    }

    public function destroy($id)
    {
        $rekruit = Rekruit::findOrFail($id);
        
        $rekruit->delete();

        return redirect()->route('rekruits.index');
    }


    public function show($id)
    {
        $rekruit = Rekruit::findOrFail($id);

        return view('rekruits.show', compact('rekruit'));
    }
}
