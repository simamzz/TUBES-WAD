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
        <title>Events</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Articles</h3>
                @if(Auth::user() && Auth::user()->hasRole('admin'))
                    <a class="btn btn-primary" href="{{ route('articles.create') }}">Create New Article</a>
                @endif
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('articles.show', $article->id) }}" class="text-dark">{{ $article->title }}</a>
                                </h5>
                                <p class="card-text text-muted small">{{ Str::limit($article->content, 100) }}</p>
                            <p class="card-text text-muted small">By {{ $article->user->name }} | {{ $article->created_at->format('d-m-Y H:i') }}</p>
                            @if(Auth::user() && Auth::user()->hasRole('admin'))
                                <div class="d-flex gap-2 mt-2">
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
    @endsection