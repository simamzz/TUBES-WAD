
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pertanyaan</h1>

    <form action="{{ route('forum.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Isi Pertanyaan</label>
            <textarea class="form-control" id="body" name="body" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
    </form>
</div>
@endsection