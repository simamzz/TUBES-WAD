@extends('layouts.app')

@section('title', 'Create Testimonial')

@section('content')
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Testimonial</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="form-row">
                <div class="col-lg-12">
                    <h3 class="mt-4">Create Testimonial</h3>
                </div>
            </div>
            <br>

            {{-- Error Handling --}}
            @if ($errors->all())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There are some problems with your input.<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NIM --}}
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            name="nim" 
                            class="form-control" 
                            id="nim" 
                            placeholder="Enter NIM" 
                            required>
                    </div>
                </div>

                {{-- Name --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="name" 
                            class="form-control" 
                            id="name" 
                            rows="3" 
                            placeholder="Enter Name" 
                            required></textarea>
                    </div>
                </div>

                {{-- Category --}}
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select 
                            name="category" 
                            class="form-control" 
                            id="category" 
                            required>
                            <option value="" disabled selected>-- Select Category --</option>
                            <option value="website">Website</option>
                            <option value="mentor">Mentor</option>
                        </select>
                    </div>
                </div>

                {{-- Testimonial --}}
                <div class="form-group row">
                    <label for="testimonial" class="col-sm-2 col-form-label">Testimonial</label>
                    <div class="col-sm-10">
                        <textarea 
                            name="testimonial" 
                            class="form-control" 
                            id="testimonial" 
                            rows="3" 
                            placeholder="Enter Testimonial" 
                            required></textarea>
                    </div>
                </div>

                <hr>

                {{-- Buttons --}}
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
    </html>
@endsection
