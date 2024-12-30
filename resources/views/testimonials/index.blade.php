@extends('layouts.app')

@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
@endphp

@section('content')
    <h1>Daftar Ulasan</h1>
    
    {{-- Tombol Add Testimonial --}}
    <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add Testimonial</a>

    {{-- Pesan sukses jika ada --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{-- Tabel Testimonials --}}
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
                        {{-- Tombol Show --}}
                        <a href="{{ route('testimonials.show', $testimonial->id) }}" class="btn btn-info btn-sm">Show</a>

                        {{-- Tombol Edit --}}
                        <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        {{-- Tombol Delete --}}
                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
