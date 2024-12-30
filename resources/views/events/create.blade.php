@extends('layouts.app')

@section('title', 'Create Forum')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
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
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Forum Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter forum title" value="{{ old('title') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter forum description" required>{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- Image Upload -->
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-sm-6 d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('forums.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
