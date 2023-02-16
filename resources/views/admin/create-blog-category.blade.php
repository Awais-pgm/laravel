@extends('admin.app')
@push('title')
    <title>Manage Categories</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="text-center fs-2">Create new Blog Category</h2>
            <form action="{{route('save.blog.category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Enter Category Name</label>
                    <input type="text" class="form-control text-white bg-dark" name="category" id=""
                        placeholder="Enter Category Name" value="{{ old('category') }}">
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Enter Description</label>
                    <textarea type="text" class="form-control text-white bg-dark" name="categoryDesc" id=""
                        placeholder="Enter Description">{{ old('categoryDesc') }}</textarea>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
