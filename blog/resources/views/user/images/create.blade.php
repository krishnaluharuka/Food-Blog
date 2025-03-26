@extends('layouts.dashboard') 
@section('meta_title','Upload Image')
@section('content')
<div class="container">

    <!-- Display Success or Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Image Upload Form -->
    <div class="mb-3">
        <h3>Upload Images</h3>
        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="blog_id">Select Blog</label>
                <select name="blog_id" id="blog_id" class="form-control">
                    <option value="">Select Blog</option>
                    @foreach($blogs as $blog)
                        <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                    @endforeach
                </select>
                @error('blog_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Type Selection -->
            <div class="form-group">
                <label for="image_type">Select Image Type</label>
                <select name="image_type" id="image_type" class="form-control">
                    <option value="cover">Cover</option>
                    <option value="image1">Image 1</option>
                    <option value="image2">Image 2</option>
                    <option value="image3">Image 3</option>
                </select>
                @error('image_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
    </div>

@endsection
