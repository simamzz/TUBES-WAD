@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <p><strong>Description:</strong> {{ $event->description }}</p>
        <p><strong>Event Date:</strong> {{ $event->event_date->format('d-m-Y H:i') }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
    </div>
@endsection
