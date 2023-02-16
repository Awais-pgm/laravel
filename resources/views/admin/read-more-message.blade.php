@extends('admin.app')
@push('title')
    <title>Manage Messages</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="my-3"><strong>From: </strong>{{$message->name}}</h2>
            <h2 class="my-3"><strong>Email: </strong>{{$message->email}}</h2>
            <hr bg-light>
            <div class="">
                <h2 class="text-center fs-1 my-3">Message</h2> <br>
                <p class="text-start fs-4 m-0 p-0">{{$message->message}}</p>
            </div>
        </div>
    </div>
@endsection
