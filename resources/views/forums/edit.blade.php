@extends('forums.app')

@section('title', 'Edit Forum')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h3 class="text-center">Edit Forum</h3>
            <br>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('forums.update', $forum->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label text-left">Forum Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" id="title" value="{{ $forum->title }}" placeholder="Forum Title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-left">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Forum Description">{{ $forum->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3 text-right"> <!-- offset untuk sejajar dengan input -->
                        <div class="button-container">
                            <button type="submit" class="btn btn-primary btn-sm">Update Forum</button> <!-- Mengubah btn-lg menjadi btn-sm -->
                        </div>
                        <div class="button-container">
                            <a href="{{ route('forums.index') }}" class="btn btn-danger btn-sm">Cancel</a> <!-- Mengubah btn-lg menjadi btn-sm -->
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