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
            @if (count($categories) > 0)
                <h2 class="text-center fs-2 my-4 text-light">View All Categories</h2>
                <div class="table-responsive ">
                    <table class="table text-light border" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Image</th>
                                <th class="text-light">Category</th>
                                <th class="text-light">Description</th>
                                <th class="text-light">Edit</th>
                                <th class="text-light">Move To Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp
                            
                            @foreach ($categories as $category)
                                <tr>
                                    <td scope="row">{{ $sno }}</td>
                                    <td scope="row">
                                        <div>
                                        <img
                                            src="category-images/{{ $category->image }}"
                                            alt="{{ $category->image }}"
                                            style="object-fit: cover;width:50px;height:50px;object-position:50%;"
                                            id="image"
                                            >
                                        </div>
                                        </td>
                                    <td>{{ $category->category }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td><a href="/editCategory/{{ $category->id }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="/softDeleteCat/{{ $category->id }}" class="btn btn-danger"
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
                <h2 class="text-center fs-2 my-4 text-light">No categories were found.</h2>
            @endif
        </div>
        
    </div>
@endsection
