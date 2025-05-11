@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'TRASHED BLOGS')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading fw-bold text-center mb-3">
        Trashed Blogs
    </div>

    <div class="panel-body">
        @if($trashedBlogs->isEmpty())
            <p>No trashed blogs available.</p>
        @else
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Blog Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $n=1; @endphp
                    @foreach($trashedBlogs as $blog)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>
                               
                            <form action="{{ route('blogs.restore', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-xs">Restore</button>
                                </form>

                                <!-- Delete Permanently -->
                                <form action="{{ route('blogs.forceDelete', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to permanently delete this blog?');">Delete Permanently</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
