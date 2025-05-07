@extends(Auth::user()->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.user_dashboard')
@section('meta_title', 'Blogs')
@section('content')
<div class="panel panel-default">
    <div class="panel-head fw-bold text-center mb-3">
        BLOG
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
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        @php $n=1; @endphp
        @foreach($blogs as $blog)
        <tbody>
        
            <td>{{ $n++ }}</td>
            <td>{{ $blog->title }}</td>
            <td><a href="{{ route('blogs.show',$blog->id) }}"  class="text-decoration-none text-dark">{{ \Illuminate\Support\Str::limit($blog->description,43,'...') }}</a></td>
            <td>@if ($blog->isCurrentlyPublished())
                    <span class="badge badge-success">Published</span>
                @else
                    <span class="badge badge-warning">Scheduled</span>
                @endif
            </td>
            <td><a href="{{ route('blogs.edit',['blog'=>$blog->id]) }}" class="btn btn-info">
            <i class="bi bi-pencil-square"></i>Edit
            </a></td>
            <td><form action="{{ route('blogs.destroy',['blog'=>$blog->id]) }}" method="POST">
                @csrf 
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');" type="submit"><i class="bi bi-trash"></i>Delete</button></form></td>
        </tbody>
        @endforeach
    </table>
    </div>
</div>
@endsection