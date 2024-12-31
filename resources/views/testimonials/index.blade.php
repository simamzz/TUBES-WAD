@extends('layouts.app')

@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
@endphp

@section('content')
<x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>List of Testimonials</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            .custom-container {
                margin-left: 50px;
                margin-right: auto;
            }
        </style>
    </head>

    <body>
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="mt-4">List of Testimonials</h3>
                </div>

                <div class="col-sm-2" style="margin-top: 20px;">
                    <a class="btn btn-primary" href="{{ route('testimonials.create') }}">Add Testimonial</a>
                </div>
            </div>
        <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>        
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Testimonial</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td><b>{{ $loop->iteration }}.<b></td>
                        <td>{{ $testimonial->nim }}</td>
                        <td>
                            <a href="{{ route('testimonials.show', $testimonial) }}" style="font-weight: bold; text-decoration: none;">
                                {{ $testimonial->name }}
                            </a>
                        </td>
                        <td>{{ ucfirst($testimonial->category) }}</td>
                        <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('testimonials.edit', $testimonial) }}">Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                            <script>
                                function confirmDelete(event) {
                                    // Prevent form submission initially
                                    event.preventDefault();
                                    
                                    // Display the confirmation dialog
                                    if (confirm("Are you sure you want to delete this testimonial?")) {
                                        // If user clicks OK, submit the form
                                        event.target.submit();
                                    } else {
                                        // If user clicks Cancel, do nothing
                                        return false;
                                    }
                                }
                            </script>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No testimonials available. Please add a testimonial.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
@endsection

<style>
    .showFile {
        width: 100px;
        height: 100px;
        margin: auto;
    }
</style>
