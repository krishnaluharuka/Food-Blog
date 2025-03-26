@extends('layouts.dashboard')
@section('meta_title', 'Create BLOGS')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create a new blog
        </div>
        <div class="panel-body">
            <form action="{{ route('blogs.store',) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    
                <label for="title">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                      <label for="categories_id[]">Select Categories:</label>
                         @foreach($categories as $category)
                        <div class="form-check ">
                        <input type="checkbox" class="ms-1 form-check-input @error('category_id') is-invalid @enderror" id="category_{{ $category->id }}" name="category_id[]" 
                value="{{ $category->id }}" >
                <span class="ms-4">{{ $category->name }}</span>
                @endforeach
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
        </div>
</div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success text-light" type="submit">Create Blog</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
