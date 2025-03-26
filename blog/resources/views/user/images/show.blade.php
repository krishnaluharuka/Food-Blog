@extends('layouts.dashboard')
@section('meta_title',$meta_title)
@section('content')
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
 <div class="container">
    <h4 class="text-center mb-4">File Manager</h4>
    <div class="container">
    <div class="row d-flex">
    @foreach ($images as $image)
    <div class="col-md-3 hover-effect">
    <a href="{{ route('images.show', ['image' => str_replace('uploads/', '', $image)]) }}" class="text-decoration-none">
        <div class="row d-flex ">
        <div class="col-md-3">
        <i class="bi bi-folder-fill text-warning my-0 py-0 " style="font-size: 50px;"></i>
        </div>
        <div class="col-md-9">
        <p>{{ basename($image) }}</p>
        <p><a href="{{ route('images.deleteFolder', ['image' => str_replace('/', '_', $image)]) }}" class="text-danger">Delete</a></p>
        </div>
        </div>
        </a>
    </div>
    @endforeach
    </div>
    </div>
 </div>
@endsection