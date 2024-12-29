@extends('forums.app')

@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Forum Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            <h4>Questions</h4>
            @forelse ($forum->questions as $question)
                <div class="border rounded p-3 mb-3">
                    <p><strong>{{ $question->user->name }}</strong> asked:</p>
                    <p>{{ $question->question }}</p>
                    
                    <!-- Answers Section -->
                    <h6>Answers:</h6>
                    @forelse ($question->answers as $answer)
                        <div class="ml-4 border-left pl-3">
                            <p><strong>{{ $answer->user->name }}</strong> answered:</p>
                            <p>{{ $answer->answer }}</p>
                        </div>
                    @empty
                        <p>No answers yet.</p>
                    @endforelse

                    <!-- Answer Form -->
                    <form action="{{ route('answers.store', $question->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="answer">Add your answer:</label>
                            <textarea name="answer" id="answer" rows="2" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                    </form>
                </div>
            @empty
                <p>No questions yet.</p>
            @endforelse

            <!-- Add Question Form -->
            <form action="{{ route('questions.store', $forum->id) }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="question">Ask a question:</label>
                    <textarea name="question" id="question" rows="3" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Question</button>
            </form>
        </div>

        <!-- Back Button -->
        <div class="form-group row mt-4">
            <div class="col-md-12">
                <a href="{{ route('forums.index') }}" class="btn btn-success">Back</a>
            </div>
        </div>

    </div>
</body>
</html>

@endsection