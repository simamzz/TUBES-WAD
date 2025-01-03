@extends('forums.app')

@section('title', 'Create Forum')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h3 class="text-center mt-4">Create New Forum</h3>
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
                    <label for="title" class="col-sm-3 col-form-label text-left">Forum Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter forum title" value="{{ old('title') }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-left">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Enter forum description" required>{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3 text-right"> <!-- Menambahkan offset untuk sejajar dengan input -->
                        <div class="button-container">
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        </div>
                        <div class="button-container">
                            <a href="{{ route('forums.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                    </div>
                </div>

                <hr>
            </form>
        </div>
    </div>
</div>

<style>
    .form-group {
        text-align: left;
    }

    .form-control {
        width: 100%;
        max-width: 100%;
    }

    .button-container {
        display: inline-block;
        margin-left: 10px;
    }

    .btn {
        width: auto;
    }
</style>
@endsection