@extends('admin.app')
@section('content')
    @push('title')
        <title>Trash Bin</title>
    @endpush
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex w-100">
                <div class="ms-auto">
                    <a href="{{ route('restoreAllDeletedCats') }}" class="btn btn-success">Restore All Categories</a>
                    <a href="{{ route('restoreAllDeletedProducts') }}" class="btn btn-success">Restore All Products</a>
                </div>
            </div>

            <h2 class="text-center fs-2 my-4">Deleted Categories</h2>
            @if (count($allDeletedCats) > 0)
                <div class="table-responsive">
                    <table class="table text-light border" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Category</th>
                                <th class="text-light">Description</th>
                                <th class="text-light">Restore</th>
                                <th class="text-light">Delete Permanent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp

                            @foreach ($allDeletedCats as $category)
                                <tr class="">
                                    <td scope="row">{{ $sno }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td><a href="/restoreDeletedCategory/{{ $category->id }}" class="btn btn-success"
                                            onclick="return confirm('Want To Restore This Item?')"><i class="fa-solid fa-trash-arrow-up"></i></a></td>
                                    <td><a href="/forceDelete/{{ $category->id }}" class="btn btn-danger"
                                            onclick="return confirm('Want To Permanently Delete This Item?')"><i class="fa-solid fa-delete-left"></i></a></td>
                                </tr>
                                @php
                                    $sno += 1;
                                @endphp
                            @endforeach
                        @else
                            <h2 class="text-center">No Deleted Categories were found.</h2>
            @endif
            </tbody>
            </table>
            <hr class="my-3">
            <h2 class="text-center fs-2 my-4">Deleted Products</h2>
            @if (count($allDeletedProducts) > 0)
            <div class="table-responsive">
                <table class="table text-light border" id="myTableProduct">
                    <thead>
                        <tr>
                            <th class="text-light">S.No</th>
                            <th class="text-light">product Name</th>
                            <th class="text-light">product Description</th>
                            <th class="text-light">Price</th>
                            <th class="text-light">Discount Price</th>
                            <th class="text-light">Category</th>
                            <th class="text-light">Restore</th>
                            <th class="text-light">Delete Permanent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sno = 1;
                        @endphp
                        @foreach ($allDeletedProducts as $product)
                            <tr class="">
                                <td scope="row">{{ $sno }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td><a href="/restoreDeletedProduct/{{ $product->id }}" class="btn btn-success"
                                        onclick="return confirm('Want To Restore This Item?')"><i class="fa-solid fa-trash-arrow-up"></i></a></td>
                                <td><a href="/forceDeleteProduct/{{ $product->id }}" class="btn btn-danger"
                                        onclick="return confirm('Want To Permanently Delete This Item?')"><i class="fa-solid fa-delete-left"></i></i></a></td>
                            </tr>
                            @php
                                $sno += 1;
                            @endphp
                        @endforeach
                    @else
                        <h2 class="text-center">No Deleted Items were found.</h2>
        @endif
        </tbody>
        </table>
    </div>
        </div>
    </div>
    </div>
@endsection
