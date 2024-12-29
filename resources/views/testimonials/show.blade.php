@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Testimonial Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJw8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="form-row">
            <div class="col-lg-12">
                <h3 class="mt-4">Testimonial Details</h3>
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label for="userId" class="col-sm-2 col-form-label">User ID</label>
            <div class="col-sm-10">
                {{ $testimonial->user_id }}
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                {{ $testimonial->name }}
            </div>
        </div>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                {{ ucfirst($testimonial->category) }}
            </div>
        </div>
        <div class="form-group row">
            <label for="testimonial" class="col-sm-2 col-form-label">Testimonial</label>
            <div class="col-sm-10">
                {{ $testimonial->testimonial }}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <a href="{{ route('testimonials.index') }}" class="btn btn-success">Back</a>
            </div>
        </div>

    </div>
</body>
</html>

@endsection
