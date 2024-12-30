@extends('layouts.app')

@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
@endphp

@section('content')
    <h1>List of Testimonial</h1>
    <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add Testimonial</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Testimonial</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->user_id }}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ ucfirst($testimonial->category) }}</td>
                    <td>{{ Str::limit($testimonial->testimonial) }}</td>
                    <td>
                        <a href="{{ route('testimonials.show', $testimonial) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
