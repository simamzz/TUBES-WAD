@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Event Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $event->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4" required>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="datetime-local" name="event_date" class="form-control" id="event_date" value="{{ $event->event_date->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ $event->location }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
