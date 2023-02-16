@extends('admin.app')
@push('title')
    <title>Slider Handler</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="text-center">Manage Slider Details</h2>
            <form method="post" enctype="multipart/form-data" action="/update/slider/details">
                @csrf
                <div class="mb-3">
                    <label for="heading1" class="form-label">Heading 1</label>
                    <input type="text" class="form-control bg-dark text-light" name="heading1" id="heading1" placeholder="Enter Heading Here" value="{{$sliderDetails->heading1}}">
                </div>
                <div class="mb-3">
                    <label for="detail1" class="form-label">Detail 1</label>
                    <textarea type="text" class="form-control bg-dark text-light" name="detail1" id="detail1"
                        placeholder="Enter Detail Here">{{$sliderDetails->detail1}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="heading2" class="form-label">Heading 2</label>
                    <input type="text" class="form-control bg-dark text-light" name="heading2" id="heading2"
                        placeholder="Enter Heading Here" value="{{$sliderDetails->heading2}}">
                </div>
                <div class="mb-3">
                    <label for="detail2" class="form-label">Detail 2</label>
                    <textarea type="text" class="form-control bg-dark text-light" name="detail2" id="detail2"
                        placeholder="Enter Detail Here">{{$sliderDetails->detail2}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="heading3" class="form-label">Heading 3</label>
                    <input type="text" class="form-control bg-dark text-light" name="heading3" id="heading3"
                        placeholder="Enter Heading Here" value="{{$sliderDetails->heading3}}">
                </div>
                <div class="mb-3">
                    <label for="detail3" class="form-label">Detail 3</label>
                    <textarea type="text" class="form-control bg-dark text-light" name="detail3" id="detail3"
                        placeholder="Enter Detail Here">{{$sliderDetails->detail3}}</textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Update Details</button>
                </div>
            </form>
        </div>
    </div>
@endsection
