@extends('layouts.app')

@section('content')
    <h1>Pertanyaan Forum</h1>

    <a href="{{ route('forum.create') }}" class="btn btn-primary mb-3">Tanya Sekarang</a>

    @if ($questions->count() > 0)
        <ul class="list-group">
            @foreach ($questions as $question)
                <li class="list-group-item">
                    <a href="{{ route('forum.show', $question) }}" class="text-decoration-none">
                        <strong>{{ $question->title }}</strong>
                    </a>
                    <p>{{ Str::limit($question->body, 100) }}</p>
                </li>
            @endforeach
        </ul>

        <!-- Pagination -->
        {{ $questions->links() }}
    @else
        <p>Tidak ada pertanyaan untuk ditampilkan.</p>
    @endif
@endsection