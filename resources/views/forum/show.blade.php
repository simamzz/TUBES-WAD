@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $question->title }}</h1>
    <p>{{ $question->body }}</p>
    <small>Ditanyakan oleh: {{ $question->user->name }} | {{ $question->created_at->diffForHumans() }}</small>

    <hr>

    <h3>Jawaban:</h3>

    <form action="{{ route('answers.store', $question) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label">Isi Jawaban</label>
            <textarea class="form-control" id="body" name="body" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
    </form>

    <div class="mt-4">
        @foreach($question->answers as $answer)
            <div class="border p-4 mb-4">
                <p>{{ $answer->body }}</p>
                <small>Jawaban oleh: {{ $answer->user->name }} | {{ $answer->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
</div>
@endsection
