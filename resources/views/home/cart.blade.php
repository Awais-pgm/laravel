@extends('home.app')
@push('title')
    <title>Cart</title>
@endpush
@section('content')
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        @media (min-width: 992px) {
            .card-registration-2 .bg-grey {
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        @media (max-width: 991px) {
            .card-registration-2 .bg-grey {
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }
    </style>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (count($productsInCart) == 0)
        <h5 class="text-center my-5">Nothing in Cart. Add some.</h5>
        <div class="container">
            <hr class="bg-danger">
        </div>
        @include('home.products')
    @else
        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="p-5 m-0">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-danger">Shopping Cart</h1>
                                                <h6 class="mb-0 text-muted">
                                                    <span class="text-danger">
                                                        @php
                                                            $counter = 0;
                                                        @endphp
                                                        @foreach ($productsInCart as $quantity)
                                                            @php
                                                                $counter += $quantity->product_quantity;
                                                            @endphp
                                                        @endforeach
                                                        {{ $counter }}
                                                    </span>
                                                    items
                                                </h6>
                                            </div>
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-4 col-md-5">
                                                    <p>Product</p>
                                                </div>
                                                <div class="col-3">
                                                    <p>Quantity</p>
                                                </div>
                                                <div class="col-2 d-flex justify-content-center">
                                                    <p>Price (PKR)</p>
                                                </div>
                                                <div class="col-3 col-md-2">
                                                </div>
                                            </div>
                                            <hr class="my-4 bg-light">
                                            @foreach ($productsInCart as $product)
                                                <div class="d-flex row m-0">
                                                    <div class="col-3 mb-2">
                                                        <img src="product-images/{{ $product->product_image }}"
                                                            class="img-fluid rounded-3 w-50"
                                                            alt="{{ $product->product_image }}">
                                                    </div>
                                                    <div class="col-2 p-0">
                                                        <h6 class="text-muted">{{ $product->product_name }}</h6>
                                                    </div>
                                                    <div class="col-2">
                                                        <form action="{{ url('updateQuantity') }}/{{ $product->id }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="d-flex">
                                                                <input id="productQuantity" min="0"
                                                                name="productQuantity"
                                                                value="{{ $product->product_quantity }}" type="number"
                                                                class="form-control form-control-sm m-0" />
                                                                <span class="px-1"></span>
                                                                <button class="btn btn-sm btn-danger">update</button>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                    <div class="col-3 col-md-4 p-0 text-center">
                                                        <h6 class="m-0 price">
                                                            {{ $product->product_price * $product->product_quantity }}</h6>
                                                    </div>
                                                    <div class="col-2 col-md-1 p-0">
                                                        <a href="{{ url('removeProductFromCart') }}/{{ $product->id }}"
                                                            class="text-muted"
                                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                                            <i class="fas fa-times text-danger"></i>
                                                        </a>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 d-flex" style="justify-content: space-between">
                                <a href="{{ url('showAllProducts') }}" class="text-body">
                                    <i class="fas fa-long-arrow-alt-left me-2"></i>
                                    Back to shop
                                </a>
                                <a href="{{ url('checkout') }}" class="btn btn-danger">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
