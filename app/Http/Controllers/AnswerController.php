<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $answer = new Answer();
        $answer->body = $request->body;
        $answer->user_id = auth()->id();
        $answer->question_id = $question->id;
        $answer->save();

        return redirect()->route('forum.show', $question)->with('success', 'Jawaban berhasil ditambahkan!');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}