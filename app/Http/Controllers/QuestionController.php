<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Menampilkan daftar pertanyaan
    public function index()
    {
        $questions = Question::latest()->paginate(10);  // Menampilkan 10 pertanyaan terbaru
        return view('forum.index', compact('questions'));
    }

    // Form untuk membuat pertanyaan
    public function create()
    {
        return view('forum.create');
    }

    // Menyimpan pertanyaan baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $question = new Question();
        $question->title = $request->title;
        $question->body = $request->body;
        $question->user_id = auth()->id();  // Menyimpan ID pengguna yang sedang login
        $question->save();

        return redirect()->route('forum.index')->with('success', 'Pertanyaan berhasil dibuat!');
    }

    // Menampilkan detail pertanyaan dan jawaban
    public function show(Question $question)
    {
        return view('forum.show', compact('question'));
    }
}