<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // Menyimpan jawaban untuk pertanyaan tertentu
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $answer = Answer::create([
            'body' => $request->body,
            'question_id' => $question->id,
            'user_id' => auth()->id(),  // Menyimpan ID pengguna yang memberikan jawaban
        ]);

        return redirect()->route('forum.show', $question->id);
    }
}