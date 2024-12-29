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
        <div class="row">
            <div class="col-md-10">
                <h3 class="mt-4">Recruitment Staff</h3>
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
                    <th scope="col">Semester</th>
                    <th scope="col">Generation</th>
                    <th scope="col">Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tentor Subject</th>
                    <th scope="col">Subject Score</th>
                    <th scope="col">GPA</th>
                    <th scope="col">Background</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Program</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekruits as $rekruit) 
                    <tr>
                        <td><b>{{ $loop->iteration }}.<b></td>
                        <td>
                            <a href="{{ route('rekruits.show', $rekruit->id) }}" style="font-weight: bold; text-decoration: none;">
                                {{ $rekruit->nama }}
                            </a>
                        </td>
                        <td>{{ $rekruit->nama }}</td>
                        <td>{{ $rekruit->nim }}</td>
                        <td>{{ $rekruit->kelas }}</td>
                        <td>{{ $rekruit->semester }}</td>
                        <td>{{ $rekruit->angkatan }}</td>
                        <td>{{ $rekruit->no_telepon }}</td>
                        <td>{{ $rekruit->email }}</td>
                        <td>{{ $rekruit->tentor_matkul }}</td>
                        <td>{{ $rekruit->nilai_matkul }}</td>
                        <td>{{ $rekruit->IPK }}</td>
                        <td>{{ $rekruit->pengalaman_tentor }}</td>
                        <td>{{ $rekruit->alasan }}</td>
                        <td>{{ $rekruit->program }}</td>

                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection