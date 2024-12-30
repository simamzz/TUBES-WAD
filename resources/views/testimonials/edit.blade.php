@extends('layouts.app')

@section('title', 'Edit Testimoni')

@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Testimoni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJw8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="form-row">
            <div class="col-lg-12">
                <h3>Edit Testimoni</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> There are some problems with your input.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                    <input type="text" name="user_id" class="form-control" id="user_id" value="{{ $testimonial->user_id }}" placeholder="User ID" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" rows="3" placeholder="Enter Name" required>{{ $testimonial->name }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Testimonial Category</label>
                <div class="col-sm-10">
                    <select name="category" class="form-control" id="category" required>
                        <option value="" disabled>-- Select Category --</option>
                        <option value="website" {{ $testimonial->category == 'website' ? 'selected' : '' }}>Website</option>
                        <option value="mentor" {{ $testimonial->category == 'mentor' ? 'selected' : '' }}>Mentor</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="testimonial" class="col-sm-2 col-form-label">Testimoni</label>
                <div class="col-sm-10">
                    <input type="text" name="testimonial" class="form-control" id="testimonial" value="{{ $testimonial->testimonial }}" placeholder="Enter Testimonial" required>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    </body>
</html>

@endsection
