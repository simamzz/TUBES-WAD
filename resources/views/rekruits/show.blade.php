@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Recruitment Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="form-row">
            <div class="col-lg-12">
                <h3 class="mt-4">Recruitment Details</h3>
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label for="eventTitle" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                {{ $rekruit->nama }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDescription" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                {{ $rekruit->nim }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
                {{ $rekruit->kelas }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-sm-10">
                {{ $rekruit->semester }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Generation</label>
            <div class="col-sm-10">
                {{ $rekruit->angkatan }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Number</label>
            <div class="col-sm-10">
                {{ $rekruit->no_telepon }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                {{ $rekruit->email }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Tentor Subject</label>
            <div class="col-sm-10">
                {{ $rekruit->tentor_matkul }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Subject Score</label>
            <div class="col-sm-10">
                {{ $rekruit->nilai_matkul }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">GPA</label>
            <div class="col-sm-10">
                {{ $rekruit->IPK }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Background</label>
            <div class="col-sm-10">
                {{ $rekruit->pengalaman_tentor }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Reason</label>
            <div class="col-sm-10">
                {{ $rekruit->alasan }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Program</label>
            <div class="col-sm-10">
                {{ $rekruit->program }}
            </div>
        </div>
        
        <!-- file -->
        <div class="form-group">
            <label for="files">File:</label>
            @if ($rekruit->files)
            <img src="{{ asset('storage/' . $rekruit->files) }}" alt="Recruitment File" class="img-fluid showFile">
            @else
            <p>No file uploaded</p>
            @endif
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <a href="{{ route('rekruits.index') }}" class="btn btn-success">Back</a>
            </div>
        </div>

    </div>
</body>
</html>

@endsection
