@extends('layouts.app')

@section('title', 'Create Forum')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mt-4">Create New Forum</h3>
        </div>
    </div>
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There are some problems with your input.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('forums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Forum Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter forum title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter forum description" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('forums.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection