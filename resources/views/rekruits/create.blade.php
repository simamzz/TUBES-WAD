@extends('layouts.app')

@section('title', 'Create Recruitment')

@section('content')
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Recruitment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="form-row">
                <div class="col-lg-12">
                    <h3 class="mt-4">Create Recruitment</h3>
                </div>
            </div>
            <br>

            @if ($errors->all())
                <div class="alert alert-danger">
                    <strong>Whoops! </strong> There are some problems with your input.<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rekruits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter your name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="Enter your nim" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Class</label>
                    <div class="col-sm-10">
                        <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Enter your class" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <input type="text" name="semester" class="form-control" id="semester" placeholder="Enter your semester" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Generation</label>
                    <div class="col-sm-10">
                        <input type="text" name="angkatan" class="form-control" id="angkatan" placeholder="Enter your generation" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon" placeholder="Enter your number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Tentor Subject</label>
                    <div class="col-sm-10">
                        <input type="text" name="tentor_matkul" class="form-control" id="tentor_matkul" placeholder="Enter your tentor subject" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Subject Score</label>
                    <div class="col-sm-10">
                        <input type="text" name="nilai_matkul" class="form-control" id="nilai_matkul" placeholder="Enter your subject score" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">GPA</label>
                    <div class="col-sm-10">
                        <input type="text" name="IPK" class="form-control" id="IPK" placeholder="Enter your gpa" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Your Background</label>
                    <div class="col-sm-10">
                        <textarea name="pengalaman_tentor" class="form-control" id="pengalaman_tentor" rows="3" 
                                placeholder="Enter your background" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Your Reason</label>
                    <div class="col-sm-10">
                        <textarea name="alasan" class="form-control" id="alasan" rows="3" 
                                placeholder="Enter your reason" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Your Program for Tencom</label>
                    <div class="col-sm-10">
                        <textarea name="program" class="form-control" id="program" rows="3" 
                                placeholder="Enter your program" required></textarea>
                    </div>
                </div>
                <hr>
                @csrf
                <!-- File -->
                <div class="form-group">
                    <label for="file">Upload CV</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>


                <div class="form-group">
                    <a href="{{ route('rekruits.index') }}" class="btn btn-success">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </body>
    </html>
@endsection