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
        <title>Recruitment Staff</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
    <div class="alert alert-primary text-center mt-4" style="border-radius: 10px; padding: 20px; font-size: 1rem;">
        <h4 style="font-weight: bold;">Welcome to Our Tutor Recruitment Program!</h4>
        <p>Are you ready to inspire and share your knowledge? Join us as a tutor and:</p>
        <ul class="list-unstyled">
            <li>✔ Empower eager learners</li>
            <li>✔ Build your teaching skills</li>
            <li>✔ Make a meaningful impact</li>
        </ul>
        <p>It’s simple to get started! Click below to apply and become part of something extraordinary. We can’t wait to see you shine! 🌟</p>
    </div>


        <div class="row">
            <div class="col-md-10">
                <h3 class="mt-4">Recruitment Staff</h3>
            </div>

            <div class="col-sm-2 d-flex justify-content-end align-items-center" style="margin-top: 20px;">
                <a class="btn btn-primary btn-sm px-4 py-2 shadow-sm" href="{{ route('rekruits.create') }}" style="border-radius: 20px; font-weight: bold;">
                    + New Form
                </a>
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
                    <th scope="col">Name</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Class</th>
                    <th scope="col">Create at</th>
                    <th scope="col">Update at</th>
                    <th scope="col">File</th>                    
                   
                    <th width="200px">Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($rekruits as $rekruit) 
                    <tr>
                        <td><b>{{ $loop->iteration }}.<b></td>
                        <td>
                            <a href="{{ route('rekruits.show', $rekruit->id) }}" style="font-weight: bold; text-decoration: none;">{{ $rekruit->nama }}</a>
                        </td>
                        <td>{{ $rekruit->nim }}</td>
                        <td>{{ $rekruit->kelas }}</td>
                        <td>{{ $rekruit->created_at }}</td>
                        <td>{{ $rekruit->updated_at }}</td>

                        <td class="showFile">
                            @if ($rekruit->file)
                                <img src="{{ asset('storage/' . $rekruit->files) }}" alt="Recruitment File" class="img-fluid">
                            @else
                                <p>No file uploaded</p>
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('rekruits.edit', $rekruit->id) }}">Edit</a>
                            <form action="{{ route('rekruits.destroy', $rekruit->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                            @if ($rekruit->status === 'pending')
                                <form action="{{ route('rekruits.accept', $rekruit->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    @role('admin')
                                    <button type="submit" class="btn btn-sm btn-primary">Accept</button>
                                    @endrole
                                </form>
                            @else
                                <span class="badge badge-success">{{ ucfirst($rekruit->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    .showFile {
        width: 100px;
        height: 100px;
        margin: auto;
    }

    .welcome-section {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
