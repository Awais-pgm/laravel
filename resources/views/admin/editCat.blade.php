@extends('admin.app')
@section('content')
@push('title')
    <title>Edit Category</title>
@endpush
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <form action="{{ url('saveEditedCat') }}/{{$categoryToBeEdit->id}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Edit Category</label>
                    <input type="text" class="form-control text-black bg-light" name="editedCategory" id="" value="{{ $categoryToBeEdit->category }}">
                    @error('editedCategory')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Edit Description</label>
                    <input type="text" class="form-control text-black bg-light" name="editedDescription" id="" value="{{ $categoryToBeEdit->description }}">
                    @error('editedDescription')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Select File</label>
                    <input type="file" class="form-control text-black bg-light" name="editedImage" id="">
                    @error('editedImage')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <img src="/category-images/{{$categoryToBeEdit->category}}/{{$categoryToBeEdit->image}}" alt="{{$categoryToBeEdit->image}}" width="100" >
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
