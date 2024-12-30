@extends('layouts.app')

@section('content')
<<<<<<< Updated upstream
=======

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggleQuestionForm').click(function() {
                $('#questionForm').toggle(); // Toggle visibility of the question form
            });

            $('.toggleAnswerForm').click(function() {
                $(this).siblings('.answerForm').toggle(); // Toggle visibility of the answer form
            });
        });
    </script>
</head>
<body>
>>>>>>> Stashed changes
<div class="container">
    <h1>{{ $forum->title }}</h1>
    <p>{{ $forum->description }}</p>

    <h3>Pertanyaan</h3>
    <form action="{{ route('questions.store', $forum->id) }}" method="POST">
        @csrf
        <textarea name="question" class="form-control mb-3" placeholder="Tulis pertanyaan Anda di sini..." required></textarea>
        <button type="submit" class="btn btn-success">Tanya</button>
    </form>

    @foreach($forum->questions as $question)
        <div class="card mt-3">
            <div class="card-body">
                <strong>{{ $question->user->name }}</strong> bertanya:
                <p>{{ $question->question }}</p>
                <form action="{{ route('answers.store', $question->id) }}" method="POST">
                    @csrf
                    <textarea name="answer" class="form-control mb-3" placeholder="Tulis jawaban Anda di sini..." required></textarea>
                    <button type="submit" class="btn btn-primary">Jawab</button>
                </form>

<<<<<<< Updated upstream
                <h6>Jawaban:</h6>
                @foreach($question->answers as $answer)
                    <p>- <strong>{{ $answer->user->name }}</strong>: {{ $answer->answer }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
=======
                <!-- Answer Form Toggle -->
                @if ((auth()->user()->id === $question->user_id || auth()->user()->hasRole('admin')) && $question->answers->count() < 5)
                    <button type="button" class="btn btn-link toggleAnswerForm">Add Answer</button>
                    <form action="{{ route('answers.store', $question->id) }}" method="POST" class="answerForm" style="display:none;">
                        @csrf
                        <div class="form-group">
                            <label for="answer">Add your answer:</label>
                            <textarea name="answer" id="answer" rows="2" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                    </form>
                @elseif ($question->answers->count() >= 5)
                    <p>The maximum number of answers has been reached (5 answers).</p>
                @endif </div>
        @empty
            <p>No questions yet.</p>
        @endforelse

        <!-- Add Question Form Toggle -->
        <button type="button" class="btn btn-link" id="toggleQuestionForm">Ask a Question</button>
        <form action="{{ route('questions.store', $forum->id) }}" method="POST" id="questionForm" style="display:none;" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="question">Ask a question:</label>
                <textarea name="question" id="question" rows="3" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Question</button>
        </form>
    </div>
    <div class="mb-5"></div> <!-- Menambahkan elemen kosong untuk memberikan ruang di bawah halaman -->
    <a href="{{ route('forums.index') }}" class="btn btn-success">Back</a> <!-- Tombol Back selalu terlihat -->
    <div class="mb-5"></div> <!-- Menambahkan ruang di bagian bawah -->
>>>>>>> Stashed changes
</div>
@endsection