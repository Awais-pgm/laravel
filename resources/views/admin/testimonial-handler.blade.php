{{-- @if(Request::is('manage/testimonials')) --}}
@extends('admin.app')
@push('title')
    <title>Testimonial Handler</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="text-center">Manage Testimonial Details</h2>
            @if (count($testimonials) > 0)
                <h2 class="text-center fs-2 my-4 text-light">All Testimonials</h2>
                <div class="table-responsive" style="max-width:1064px;overflow-x:auto;">
                    <table class="table text-light" id="myOrderTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Image</th>
                                <th class="text-light">Name</th>
                                <th class="text-light">Details</th>
                                <th class="text-light">Designation</th>
                                <th class="text-light">Actions</th>
                                <th class="text-light">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp

                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td scope="row">{{ $sno }}</td>
                                    <td>
                                        <img src="testimonial-images/{{ $testimonial->image }}" alt="{{ $testimonial->image }}">
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ Str::limit($testimonial->detail, 30, '...') }}</td>
                                    <td>{{ $testimonial->designation }}</td>
                                    <td><a class="badge bg-primary text-light"
                                            href="edit/testimonial/{{ $testimonial->id }}">Edit</a></td>
                                    <td><a class="badge bg-danger text-light"
                                            href="delete/testimonial/{{ $testimonial->id }}"
                                            onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $sno += 1;
                                @endphp
                            @endforeach
                            <p class="text-end my-2">
                                <a href="create/more/testimonials" title="Add More Candidates" class="btn btn-danger">+</a>
                            </p>
                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="text-center fs-2 my-4 text-light">No Testimonials were found.</h2>
            @endif
    <br>
    @if (Request::is('edit/testimonial/*'))
    <h2 class="text-center">Update Details</h2>
        <form method="post" enctype="multipart/form-data" action="/update/testimonial/details/{{$testimonialDetails->id}}">
            @csrf
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control bg-dark text-light" name="designation" id="designation"
                    placeholder="Enter Heading Here" value="{{ $testimonialDetails->designation }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control bg-dark text-light" name="name" id="name"
                    placeholder="Enter Heading Here" value="{{ $testimonialDetails->name }}">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <textarea type="text" class="form-control bg-dark text-light" name="detail" id="detail"
                    placeholder="Enter Detail Here">{{ $testimonialDetails->detail }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Select Image</label>
                <input type="file" name="image" id="image" class="form-control text-light">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Update Details</button>
            </div>
        </form>
        @elseif (Request::is('create/more/testimonials'))
        <form method="post" enctype="multipart/form-data" action="add/more/testimonial">
            <h2 class="text-center">Add More</h2>
            @csrf
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control bg-dark text-light" name="designation" id="designation" placeholder="Enter designation Here">
                <small class="text-danger">
                    @error('designation')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control bg-dark text-light" name="name" id="name" placeholder="Enter Name Here">
                <small class="text-danger">
                    @error('name')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <textarea type="text" class="form-control bg-dark text-light" name="detail" id="detail" placeholder="Enter Detail Here"></textarea>
                <small class="text-danger">
                    @error('detail')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Select Image</label>
                <input type="file" name="image" id="image" class="form-control text-light">
                <small class="text-danger">
                    @error('image')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endif
    </div>
    </div>
</div>
</div>
@endsection
