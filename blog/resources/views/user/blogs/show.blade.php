@extends('layouts.dashboard')
@section('meta_title', 'BLOGS')
@section('content')
<div class="panel panel-default">
    <div class="panel-head fw-bold text-center mb-3">
        FOOD BLOG
    </div>
    <div class="text-end">
    <a href="{{ route('blogs.trashed') }}" class="btn btn-secondary btn-xs">
    Trashed Blogs
            </a>
    </div><br>
    <div class="panel-body">
    <table class="table table-responsive table-hover">
        <thead>
            <th>S.N.</th>
            <th>Blog Title</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        @php $n=1; @endphp
        @foreach($blogs as $blog)
        <tbody>
        
            <td>{{ $n++ }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->description }}</td>
            <td><a href="{{ route('blogs.edit',['blog'=>$blog->id]) }}" class="btn btn-warning btn-xs">
            Edit
            </a></td>
            <td><form action="{{ route('blogs.destroy',['blog'=>$blog->id]) }}" method="POST">
                @csrf 
                @method('DELETE')
                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this blog?');" type="submit">Delete</button></form></td>
        </tbody>
        @endforeach
    </table>
    </div>
</div>
@endsection