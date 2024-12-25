<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->paginate(10);
        return view('forum.index', compact('questions'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $question = new Question();
        $question->title = $request->title;
        $question->body = $request->body;
        $question->user_id = auth()->id();
        $question->save();

        return redirect()->route('forum.index')->with('success', 'Pertanyaan berhasil dibuat!');
    }

    public function show(Question $question)
    {
        return view('forum.show', compact('question'));
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}