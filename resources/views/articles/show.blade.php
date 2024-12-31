@extends('layouts.app')

@section('content')
<x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Article</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1>{{ $article->title }}</h1>
                            <p class="text-muted">By {{ $article->user->name }} | {{ $article->created_at->format('d-m-Y H:i') }}</p>
                            <hr>
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="img-fluid mb-3">
                            @endif
                            <div>{!! nl2br(e($article->content)) !!}</div>
                            @if(Auth::user() && Auth::user()->hasRole('admin'))
                            <div class="d-flex gap-2 mt-4">
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection