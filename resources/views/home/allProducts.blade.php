@extends('home.app')
@push('title')
    <title>Products</title>
@endpush
@section('content')
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">
                {{-- @if (count($products > 0)) --}}
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-5 col-lg-3">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="/productDetails/{{$product->id}}" class="option1">
                                            Buy Now
                                        </a>
                                    </div>
                                </div>
                                <div class="img-box">
                                    <img src="product-images/{{$product->image}}" alt="">
                                </div>
                                <div class="u-price-wrapper d-flex" style="flex-direction: column;align-items:center">
                                    <h5 class="text-danger">
                                        {{ $product->title }}
                                    </h5>
                                    <small>Availability: @if($product->quantity != 0) <span class="badge bg-success text-light"> In-Stock</span> @else <span class="badge bg-danger text-light">sold</span>   @endif</small>
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
            </div>
        </div>
        <div class="d-flex justify-content-end my-5 px-">
            {{$products->withQueryString()->links('pagination::bootstrap-5')}}
        </div>
    </section>
@endsection
