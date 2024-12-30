@extends('layouts.app')

@section('content')
    <h1>Courses</h1>
    <a href="{{ route('course.create') }}" class="btn btn-primary">Create New Course</a>
    <ul>
        @foreach($courses as $course)
            <li>
                <a href="{{ route('course.show', $course->id) }}">{{ $course->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
