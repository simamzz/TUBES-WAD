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
                {{ $recruit->nama }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDescription" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                {{ $recruit->nim }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Class</label>
            <div class="col-sm-10">
                {{ $recruit->kelas }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-sm-10">
                {{ $recruit->semester }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Generation</label>
            <div class="col-sm-10">
                {{ $recruit->angkatan }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Number</label>
            <div class="col-sm-10">
                {{ $recruit->no_telepon }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                {{ $recruit->email }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Tentor Subject</label>
            <div class="col-sm-10">
                {{ $recruit->tentor_matkul }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Subject Score</label>
            <div class="col-sm-10">
                {{ $recruit->nilai_matkul }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">GPA</label>
            <div class="col-sm-10">
                {{ $recruit->IPK }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventDate" class="col-sm-2 col-form-label">Background</label>
            <div class="col-sm-10">
                {{ $recruit->pengalaman_tentor }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Reason</label>
            <div class="col-sm-10">
                {{ $recruit->alasan }}
            </div>
        </div>
        <div class="form-group row">
            <label for="eventLocation" class="col-sm-2 col-form-label">Program</label>
            <div class="col-sm-10">
                {{ $recruit->program }}
            </div>
        </div>
        <!-- image -->
        <div class="form-group">
            <label for="image">Image:</label>
            @if ($rekruit->image)
            <img src="{{ asset('storage/' . $rekruit->image) }}" alt="Oprec Staff Image" class="img-fluid showPhoto">
            @else
            <p>No image uploaded</p>
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

<style>
    .showPhoto {
        width: 100px;
        height: 100px;
        margin: left;
    }
</style>