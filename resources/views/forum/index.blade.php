@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Forum</h1>
    <a href="{{ route('forum.create') }}" class="btn btn-primary">Tambah Pertanyaan</a>

    <div class="mt-4">
        @foreach($questions as $question)
            <div class="border p-4 mb-4">
                <h3><a href="{{ route('forum.show', $question) }}">{{ $question->title }}</a></h3>
                <p>{{ Str::limit($question->body, 100) }}</p>
                <small>{{ $question->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    {{ $questions->links() }}
</div>
@endsection
