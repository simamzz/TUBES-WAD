@extends('layouts.app')

@php
use Illuminate\Support\Str;
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
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="mt-4">Dashboard</h3>
            </div>

<!-- Menampilkan daftar event -->
<table class="transparent">
    <td>
        <div class="py-4 d-flex align-items-center">
            <img src="{{ asset('assets/staff.png') }}" alt="Staff Image" class="img-fluid" style="width: 650px; height: auto; margin-right: 20px;">
            <div>
                <h4>WELCOME TO TENCOM</h4>
                <p>Website Organisasi di Sistem Informasi Telkom University, 
                    Mahasiswa dapat menemukan berbagai informasi terkait kegiatan, acara, 
                    dan program yang diselenggarakan oleh organisasi. Selain itu, mahasiswa juga
                    dapat berpartisipasi dalam forum diskusi, mengikuti kursus, dan mendapatkan informasi 
                    mengenai rekrutmen anggota baru. Selamat datang dan selamat bergabung!</p>
                    
                <p>Di sini, kami berkomitmen untuk menyediakan platform yang mendukung pengembangan diri 
                    dan kolaborasi antar mahasiswa. Dengan berbagai fitur yang kami tawarkan, seperti 
                    kalender acara, forum diskusi, dan kursus online, kami berharap dapat membantu mahasiswa 
                    untuk tetap terhubung dan terlibat dalam berbagai kegiatan yang bermanfaat. Jangan ragu 
                    untuk menjelajahi situs ini dan menemukan peluang baru untuk belajar dan berkembang.</p>
            </div>
        </div>
    </td>
</table>

<!-- Events -->
<table class="transparent">
    <tr>
        <td>
            <div class="py-4 text-center">
                <h4></h4>
                @if($events->isEmpty())
                    <p>No events available.</p>
                @else
                    <div class="container mx-auto px-4 py-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($events as $event)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" 
                                            class="w-full h-48 object-cover">
                                        <span class="absolute top-4 right-4 text-sm text-white bg-black bg-opacity-30 px-2 py-1 rounded">
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y H:i') }}
                                        </span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="font-bold text-lg mb-2">{{ $event->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 80) }}</p>
                                        <p class="text-gray-700 text-sm mb-4">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            {{ $event->location }}
                                        </p>
                                        <div class="mt-auto">
                                            <a href="{{ route('events.show', $event->id) }}" 
                                            class="inline-block w-full text-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-8">
                            <a href="{{ route('events.index') }}" 
                            class="inline-block px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                See More
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </td>
    </tr>
</table>

<!-- Course -->
<table class="table table-borderless">
    <tr>
        <td>
            <div class="py-4 text-center">
                <h4></h4>
                @if($events->isEmpty())
                    <p>No events available.</p>
                @else
                    <div class="container mx-auto px-4 py-8">
                        <div class="space-y-4">
                            @foreach($events as $event)
                                <div class="bg-white rounded-lg shadow-md p-6 flex justify-center">
                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg mb-1 text-center">{{ $event->title }}</h3>
                                        <p class="text-sm text-gray-500 mb-2 text-center">
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y H:i') }}
                                        </p>
                                        <p class="text-gray-700 text-sm mb-4 text-center"></p>
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            {{ $event->location }}
                                        </p>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-600 text-sm text-center">{{ Str::limit($event->description, 80) }}</p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('events.show', $event->id) }}" 
                                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                            Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-8">
                            <a href="{{ route('course.index') }}" 
                                class="inline-block px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                See More
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </td>
    </tr>
</table>

<!-- Rekruitasi -->
<table class="table table-bordered">
    <td>
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h4>Ingin Daftar?</h4>
            <a href="{{ route('rekruits.index') }}" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </td>
</table>

<!-- Article -->
<table class="transparent">
    <tr>
        <td>
            <div class="py-4 text-center">
                <h4>Articles</h4>
                @if($articles->isEmpty())
                    <p>No articles available.</p>
                @else
                    <div class="container mx-auto px-4 py-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($articles as $article)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" 
                                            class="w-full h-48 object-cover">
                                        <span class="absolute top-4 right-4 text-sm text-white bg-black bg-opacity-30 px-2 py-1 rounded">
                                            {{ \Carbon\Carbon::parse($article->published_at)->format('d-m-Y') }}
                                        </span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="font-bold text-lg mb-2">{{ $article->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($article->content, 80) }}</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('articles.show', $article->id) }}" 
                                            class="inline-block w-full text-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-8">
                            <a href="{{ route('articles.index') }}" 
                            class="inline-block px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                See More
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </td>
    </tr>
</table>

<!-- Testimoni -->
<table class="table table-borderless">
    <tr>
        <td>
            <div class="py-4 text-center">
                <h4>Testimoni</h4>
                @if($testimonials->isEmpty())
                    <p>No testimonials available.</p>
                @else
                    <div class="container mx-auto px-4 py-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($testimonials as $testimonial)
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <p class="font-bold text-lg mb-2">{{ $testimonial->name }}</p>
                                    <p class="text-gray-600 text-sm mb-4">{{ $testimonial->testimonial }}</p>
                                    <p class="text-gray-700 text-sm">{{ $testimonial->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </td>
    </tr>
</table>

<!-- line -->
<hr style="border: 1px solid #000; width: 100%;">

<!-- Forum -->
<table class="table table-borderless">
    <tr>
        <td>
            <div class="py-4 d-flex justify-content-between align-items-center">
                <h4>Forum</h4>
                <p>Jika ada pertanyaan silahkan langsung tanyakan</p>
                <a href="{{ route('forums.index') }}" class="btn btn-primary">Go to Forum</a>
            </div>
        </td>
    </tr>
</table>

</body>
</html>
@endsection

<style>
    .card {
    width: 100%; /* Membuat card mengisi seluruh ruang */
    max-width: 100%; /* Membatasi agar tidak lebih lebar dari kontainer */
}
</style>