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
        <title>Testimonials</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="mt-4">Testimonials</h3>
            </div>

            {{-- Hanya Admin yang bisa melihat tombol Create --}}
            @role('admin')
            <div class="col-sm-2" style="margin-top: 20px;">
                <a class="btn btn-primary" href="{{ route('testimonials.create') }}">Create New Testimonial</a>
            </div>
            @endrole
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
                    <th width="40px"><b>#</b></th>
                    <th width="150px">User ID</th>
                    <th width="180px">Name</th>
                    <th width="150px">Category</th>
                    <th>Testimonial</th>

                    {{-- Hanya Admin yang bisa melihat kolom Actions --}}
                    @role('admin')
                    <th width="210px">Actions</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial) 
                    <tr>
                        <td><b>{{ $loop->iteration }}.<b></td>
                        <td>{{ $testimonial->user_id }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ ucfirst($testimonial->category) }}</td>
                        <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>

                        {{-- Hanya Admin yang bisa melihat tombol Edit dan Delete --}}
                        @role('admin')
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('testimonials.edit', $testimonial->id) }}">Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
