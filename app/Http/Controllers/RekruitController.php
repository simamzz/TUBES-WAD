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
            'pengalaman_mentor' => 'required|text',
            'alasan' => 'required|text',
            'program' => 'required|text',
        ]);

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
        $rekruit = Rekruit::findOrFail($id);

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
            'pengalaman_mentor' => 'required|text',
            'alasan' => 'required|text',
            'program' => 'required|text',
        ]);

        $rekruit->update($validatedData);

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
