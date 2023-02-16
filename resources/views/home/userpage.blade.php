@extends('home.app')
@push('title')
    <title>Home</title>
@endpush
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.new_arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('home.products')
    <!-- end product section -->

    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
@endsection
