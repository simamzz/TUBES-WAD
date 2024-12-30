@extends('layouts.app')

@section('title', 'Create Testimoni')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Create Testimoni</h3>
                </div>
                <div class="card-body">
                    {{-- Error Handling --}}
                    @if ($errors->all())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There are some problems with your input.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- User ID --}}
                        <div class="form-group">
                            <label for="user_id" class="font-weight-bold">User ID</label>
                            <input 
                                type="text" 
                                name="user_id" 
                                class="form-control" 
                                id="user_id" 
                                placeholder="Enter user ID" 
                                required>
                        </div>

                        {{-- Name --}}
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name</label>
                            <textarea 
                                name="name" 
                                class="form-control" 
                                id="name" 
                                rows="3" 
                                placeholder="Enter name" 
                                required></textarea>
                        </div>

                        {{-- Category --}}
                        <div class="form-group">
                            <label for="category" class="font-weight-bold">Testimonial Category</label>
                            <select 
                                name="category" 
                                class="form-control" 
                                id="category" 
                                required>
                                <option value="" disabled selected>-- Select Category --</option>
                                <option value="website">Testimonial about Website</option>
                                <option value="mentor">Testimonial about Mentor</option>
                            </select>
                        </div>

                        {{-- Testimonial --}}
                        <div class="form-group">
                            <label for="testimonial" class="font-weight-bold">Testimoni</label>
                            <input 
                                type="text" 
                                name="testimonial" 
                                class="form-control" 
                                id="testimonial" 
                                placeholder="Enter testimonial description" 
                                required>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
