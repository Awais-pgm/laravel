@extends('admin.app')
@push('title')
    <title>Manage Products</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (count($products) > 0)
                <h2 class="text-center fs-2 my-4 text-light">View All Products</h2>
                <div class="table-responsive ">
                    <table class="table text-light border" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Image</th>
                                <th class="text-light">Name</th>
                                <th class="text-light">Description</th>
                                <th class="text-light">Category</th>
                                <th class="text-light">Price</th>
                                <th class="text-light">Quantity</th>
                                <th class="text-light">Discount Price</th>
                                <th class="text-light">Edit</th>
                                <th class="text-light">Move To Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td scope="row">{{ $sno }}</td>
                                    <td scope="row">
                                        <div>
                                            <img src="/product-images/{{ $product->image }}" alt="{{ $product->image }}"
                                                style="object-fit: cover;width:50px;height:50px;object-position:50%;"
                                                id="image">
                                        </div>
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->discount_price }}</td>
                                    <td><a href="/editProduct/{{ $product->id }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="/softDeleteProduct/{{ $product->id }}" class="btn btn-danger"
                                            onclick="return confirm('Are You Sure You want to delete this?')"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                @php
                                    $sno += 1;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="text-center fs-2 my-4 text-light">No products were found.</h2>
            @endif
        </div>
    </div>
@endsection
