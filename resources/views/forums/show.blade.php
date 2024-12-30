@extends('forums.app')

@section('content')

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
<div class="container">
    <div class="form-row">
        <div class="col-lg-12">
            <h3 class="mt-4">Forum Details</h3>
        </div>
    </div>
    <br>

    <div class="form-group row">
        <label for="forumTitle" class="col-sm-2 col-form-label">Forum Title</label>
        <div class="col-sm-10">
            {{ $forum->title }}
        </div>
    </div>
    <div class="form-group row">
        <label for="forumDescription" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            {{ $forum->description }}
        </div>
    </div>
    <div class="form-group row">
        <label for="createdBy" class="col-sm-2 col-form-label">Created By</label>
        <div class="col-sm-10">
            {{ $forum->user->name }}
        </div>
    </div>
    <div class="form-group row">
        <label for="createdAt" class="col-sm-2 col-form-label">Created At</label>
        <div class="col-sm-10">
            {{ $forum->created_at->format('d-m-Y H:i') }}
        </div>
    </div>

    <!-- Questions Section -->
    <div class="mt-5">
        <h4>Forum Session</h4>
        @forelse ($forum->questions as $question)
            <div class="border rounded p-3 mb-3">
                <p><strong>{{ $question->user->name }}</strong> asked:</p>
                <p>{{ $question->question }}</p>
         
                <!-- Answers Section -->
                <h6>Answers:</h6>
                @if ($question->answers->count() > 0)
                    @foreach ($question->answers as $answer)
                        <div class="ml-4 border-left pl-3">
                            <p><strong>{{ $answer->user->name }}</strong> answered:</p>
                            <p>{{ $answer->answer }}</p>
                        </div>
                    @endforeach
                @else
                    <p>No answers yet.</p>
                @endif

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
                <form action="{{ route('answers.store', $question->id) }}" method="POST">
                    @csrf
                    <textarea name="answer" class="form-control mb-3" placeholder="Tulis jawaban Anda di sini..." required></textarea>
                    <button type="submit" class="btn btn-primary">Jawab</button>
                </form>
                <h6>Jawaban:</h6>
                @foreach($question->answers as $answer)
                    <p>- <strong>{{ $answer->user->name }}</strong>: {{ $answer->answer }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
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
</div>
</body>
</html>

@endsection