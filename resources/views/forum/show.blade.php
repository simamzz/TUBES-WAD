@extends('layouts.app')

@section('content')
    <h1>{{ $question->title }}</h1>
    <p>{{ $question->body }}</p>

    <h3>Jawaban:</h3>
    @foreach ($question->answers as $answer)
        <div class="mb-3">
            <strong>{{ $answer->user->name }}</strong>
            <p>{{ $answer->body }}</p>
        </div>
    @endforeach

    @if ($question->answers->isEmpty())
        <p>Belum ada jawaban.</p>
    @endif

    <form action="{{ route('answers.store', $question) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="body">Jawaban Anda</label>
            <textarea name="body" id="body" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
    </form>
@endsection