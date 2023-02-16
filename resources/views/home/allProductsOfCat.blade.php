@extends('home.app')
@section('content')
@push('title')
    <title>Categories</title>
@endpush
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>Categories</span>
                </h2>
            </div>
            <div class="row">
                @if (count($categories->product) > 0)
                    @foreach ($categories->product as $product)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="/productDetails/{{$product->id}}" class="option1">
                                            Buy Now
                                        </a>
                                    </div>
                                </div>
                                <div class="img-box">
                                    <img src="/product-images/{{ $product->image }}" alt="{{ $product->image }}">
                                </div>
                                <div class="u-price-wrapper d-flex" style="flex-direction: column;align-items:center">
                                    <h5 class="text-danger">
                                        {{ $product->title }}
                                    </h5>
                                    <div class="@if ($product->discount_price != null) @else
                                        u-hide-price @endif
                                       u-old-price"
                                        style="text-decoration: line-through !important;" wfd-invisible="false">
                                        Rs/-{{ $product->price }}
                                    </div>
                                    @if ($product->discount_price != null)
                                        <div class="u-price u-text-palette-2-base">
                                            Rs/-{{ $product->discount_price }}
                                        </div>
                                    @endif
                                    @if ($product->discount_price == null)
                                        <div class="u-price u-text-palette-2-base">
                                            Rs/-{{ $product->price }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2 class="text-center text-danger">No Related Products were found.</h2>
                @endif
            </div>
            <div class="my-5 d-flex justify-content-end">
                {{-- {{ $categories->withQueryString()->links('pagination::bootstrap-5') }} --}}
            </div>
        </section>
        
@endsection
