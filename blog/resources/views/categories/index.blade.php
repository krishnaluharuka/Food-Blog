@extends(Auth::user()->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'CATEGORIES')
@section('content')
<div class="panel panel-default">
    <div class="panel-head fw-bold text-center mb-3">
        BLOG CATEGORIES
    </div>
    <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <th>S.N.</th>
            <th>Category Name</th>
            <th>Actions</th>
        </thead>
        @php $n=1; @endphp
        @foreach($categories as $category)
        <tbody>
        
            <td>{{ $n++ }}</td>
            <td>{{ $category->name }}</td>
            <td><a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn btn-warning btn-xs">
            Edit
            </a>&nbsp;
            <a href="{{ route('categories.delete',['id'=>$category->id]) }}" class="btn btn-danger btn-xs">Delete
            </a></td>
        </tbody>
        @endforeach
    </table>
    </div>
</div>
@endsection