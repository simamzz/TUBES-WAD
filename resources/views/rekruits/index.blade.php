@extends('layouts.app')

@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
@endphp

@section('content')
    <h1>List of Rekruits</h1>
    <a href="{{ route('rekruits.create') }}" class="btn btn-primary mb-3">Add Rekruit</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekruits as $rekruit)
                <tr>
                    <td>{{ $rekruit->id }}</td>
                    <td>{{ $rekruit->nama }}</td>
                    <td>{{ $rekruit->nim }}</td>
                    <td>{{ $rekruit->kelas }}</td>
                    <td>{{ $rekruit->semester }}</td>
                    <td>
                        <a href="{{ route('rekruits.show', $rekruit) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('rekruits.edit', $rekruit) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rekruits.destroy', $rekruit) }}" method="POST" class="d-inline">
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
