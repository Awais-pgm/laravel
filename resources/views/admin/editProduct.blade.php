@extends('admin.app')
@push('title')
    <title>Edit Product</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <form method="post" enctype="multipart/form-data" action="{{ url('updateProduct') }}/{{ $product->id }}">
                @csrf
                <div class="mb-3">
                    <label for="editProductName" class="form-label">Product Title</label>
                    <input type="text" class="form-control bg-dark text-light" name="editProductName" id="editProductName"
                        placeholder="Enter Product Name" value="{{ $product->title }}">
                    @error('editProductName')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="editProductDesc" class="form-label">Product Description</label>
                    <input type="text" class="form-control bg-dark text-light" name="editProductDesc"
                        id="editProductDesc" placeholder="Enter Product Description" value="{{ $product->description }}">
                    @error('editProductDesc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="editProductImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control bg-dark text-light" name="editProductImage"
                        id="editProductImage">
                    @error('editProductImage')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="editProductPrice" class="form-label">Product Price</label>
                    <input type="number" class="form-control bg-dark text-light" name="editProductPrice"
                        id="editProductPrice" placeholder="Enter Product Price" value="{{ $product->price }}">
                    @error('editProductPrice')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="editProductQty" class="form-label">Product Quantity</label>
                    <input type="number" class="form-control bg-dark text-light" name="editProductQty" id="editProductQty"
                        placeholder="Enter Product Quantity" value="{{ $product->quantity }}">
                    @error('editProductQty')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="editCategory" class="form-label">Category</label>
                    <select class="form-select form-select-lg bg-dark text-light" name="editCategory" id="editCategory">
                        @foreach ($categories as $category)
                            <option selected value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                    @error('editCategory')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="editDiscountPrice" class="form-label">Discount Price</label>
                    <input type="number" class="form-control bg-dark text-light" name="editDiscountPrice"
                        id="editDiscountPrice" placeholder="Enter Product Discount Price"
                        value="{{ $product->discount_price }}">
                    @error('editDiscountPrice')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Update Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
