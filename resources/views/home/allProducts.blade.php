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
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box pb-2 px-0">
                            <div class="option_container">
                                <div class="options">
                                    <a href="/productDetails/{{ $product->id }}" class="option1">
                                        Details
                                    </a>
                                </div>
                            </div>
                            <div class="" style="width: 290px;height:250px;">
                                <img src="product-images/{{ $product->image }}"
                                    style="width:100%;height:100%;object-fit:cover;">
                            </div>
                            <div class="u-price-wrapper d-flex" style="flex-direction: column;align-items:center">
                                <div class="d-flex justify-content-between align-items-center px-2" style="width:100%;">
                                    <div>
                                        <h5 class="text-danger">
                                            {{ $product->title }}
                                        </h5>
                                    </div>
                                    <div>
                                        <sub>
                                            <div class="@if ($product->discount_price != null) @else
                                        u-hide-price @endif
                                       u-old-price"
                                                style="text-decoration: line-through !important;" wfd-invisible="false">
                                                Rs/-{{ $product->price }}
                                            </div>
                                        </sub>
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
                                <div class="d-flex justify-content-between px-2" style="width:100%">
                                    <div>
                                        {{-- <small>Availability</small> --}}
                                    </div>
                                    <div>
                                        <span class="fs-1">
                                            @if ($product->quantity == 0)
                                                <span class="badge bg-danger text-light">sold</span>
                                            @else
                                                <span class="badge bg-success text-light">In-stock</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-end my-5 px-">
            {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
