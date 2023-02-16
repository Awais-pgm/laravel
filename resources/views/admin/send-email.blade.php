@extends('admin.app')
@push('title')
    <title>Send Notifications</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        {{-- <div class="content-wrapper"> --}}
            <div class="mt-5">
                <p class="text-center"><strong>Send Email to :</strong> {{$userData->user_email}}</p>
            </div>
            <div class="d-flex justify-content-center my-5">
                
                <div class="row col-10 ">
                    <form action="{{url('/send/user/email',$userData->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="emailGreet" class="form-label">Email Greeting</label>
                            <input type="text" class="form-control bg-light text-dark" id="emailGreet" placeholder="Email Greeting Here" name="greeting">
                        </div>
                        <div class="mb-3">
                            <label for="emailStart" class="form-label">Email First Line</label>
                            <input type="text" class="form-control bg-light text-dark" id="emailStart" placeholder="Email First Line Here" name="firstLine">
                        </div>
                        <div class="form-group">
                            <label for="emailBody">Email Body</label>
                            <textarea class="form-control bg-light text-dark" id="emailBody" rows="3" name="emailBody"></textarea>
                          </div>
                        <div class="mb-3">
                            <label for="emailBottom" class="form-label">Email Button Name</label>
                            <input type="text" class="form-control bg-light text-dark" id="emailButton" placeholder="Email Button Here" name="emailButton">
                        </div>
                        <div class="mb-3">
                            <label for="emailUrl" class="form-label">Email Url</label>
                            <input type="text" class="form-control bg-light text-dark" id="emailUrl" placeholder="Email URL Here" name="emailUrl">
                        </div>
                        <div class="mb-3">
                            <label for="emailEnd" class="form-label">Email Last Line</label>
                            <input type="text" class="form-control bg-light text-dark" id="emailEnd" placeholder="Email Last Line Here" name="emailLastLine">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            

</div>
@endsection
