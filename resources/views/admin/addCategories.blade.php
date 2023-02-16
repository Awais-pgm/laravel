@extends('admin.app')
@push('title')
    <title>Manage Categories</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    <strong class="text-success">Success! </strong><strong
                        class="text-black">{{ session()->get('message') }}</strong>
                </div>
            @endif
            <h2 class="text-center fs-2">Create new product Category</h2>
            <form action="{{ url('addCategory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Enter Category</label>
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
                    <label for="categoryImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control bg-dark text-light" name="categoryImage" id="categoryImage">
                    @error('categoryImage')
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
