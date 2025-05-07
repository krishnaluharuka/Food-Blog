@extends(Auth::user()->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.user_dashboard')
@section('meta_title',$meta_title)
@section('content')
 <div class="container">
    <h4 class="text-center mb-4">File Manager</h4>
    <div class="container">
    <div class="row d-flex">
    @foreach ($images as $image)
    <div class="col-md-1">
    <a href="{{ route('images.show', ['image' => str_replace('/','_', $image)]) }}" class="text-decoration-none">
        <div class="row d-flex ">
        <div class="col-md-3">
        <i class="bi bi-folder-fill text-warning my-0 py-0 " style="font-size: 50px;"></i>
        </div>
        <div class="col-md-9">
        <p>{{ Illuminate\Support\Str::title(Illuminate\Support\Str::limit(basename($image),8,'...')) }}</p>
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