@extends('layouts.dashboard')
@section('meta_title',$meta_title)
@section('content')
<h2 class="text-xl font-bold mt-8">Files</h2>
<div class="row">
    @foreach ($images as $image)
    <div class="col-md-3">
        <div class="p-1 h-100 border p-2 ">
            <img src="{{ asset('storage/'.$image) }}" alt="Image" class="w-100 h-90">
            <p class="w-100">{{ basename($image) }} </p>
            <div class="d-flex col-md-6">
            <form action="{{ route('images.edit',  ['image' => str_replace('/', '_',$image)]) }}" method="POST">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-warning text-light p-2">Edit</button>
            </form>
            <form action="{{ route('images.destroy',  ['image' => str_replace('/', '_',$image)]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger text-light ms-2 p-2">Delete</button>
    </form>
            </div>
            
    </p>
        </div>
        </div>
    @endforeach
</div>
@endsection



