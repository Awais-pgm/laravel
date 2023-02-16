@extends('admin.app')
@push('title')
    <title>Add Product</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <form action="{{ url('addProductToDB') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Title</label>
                    <input type="text" class="form-control bg-dark text-light" name="productName" id="productName"
                        placeholder="Enter Product Name" value="{{ old('productName') }}">
                    @error('productName')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productDesc" class="form-label">Product Description</label>
                    <input type="text" class="form-control bg-dark text-light" name="productDesc" id="productDesc"
                        placeholder="Enter Product Description" value="{{ old('productDesc') }}">
                    @error('productDesc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control bg-dark text-light" name="productImage" id="productImage">
                    @error('productImage')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="number" class="form-control bg-dark text-light" name="productPrice" id="productName"
                        placeholder="Enter Product Price" value="{{ old('productPrice') }}">
                    @error('productPrice')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productQty" class="form-label">Product Quantity</label>
                    <input type="number" class="form-control bg-dark text-light" name="productQty" id="productQty"
                        placeholder="Enter Product Quantity" value="{{ old('productQty') }}">
                    @error('productQty')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select form-select-lg bg-dark text-light" name="category" id="">
                        @foreach ($categories as $category)
                            <option selected value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="discountPrice" class="form-label">Discount Price</label>
                    <input type="number" class="form-control bg-dark text-light" name="discountPrice" id="discountPrice"
                        placeholder="Enter Product Discount Price (optional)" value="{{ old('discountPrice') }}">
                    @error('discountPrice')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
