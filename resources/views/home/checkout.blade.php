@extends('home.app')
@push('title')
    <title>Checkout</title>
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
    <section>
        <form method="POST" action="/cashOnDelivery" id="form">
            @csrf
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="p-5 m-0">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-danger">Checkout</h1>
                                                <h6 class="mb-0 text-muted">
                                                    <span class="text-danger">
                                                        @php
                                                            $counter = 0;
                                                        @endphp
                                                        @foreach ($orderData as $quantity)
                                                            @php
                                                                $counter += $quantity->product_quantity;
                                                            @endphp
                                                        @endforeach
                                                        {{ $counter }}
                                                    </span>
                                                    items
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-5">
                                    <div class="col-md-8">
                                        <h3>Contact Information</h3>
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="userName" class="form-control"
                                                value="{{ $userData->name }}">
                                            @error('userName')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ $userData->phone }}">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Shipping Address</label>
                                            <textarea class="form-control" name="address">{{ $userData->address }}</textarea>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($orderData as $product)
                                                    <tr>
                                                        <td><img src="/product-images/{{ $product->product_image }}"
                                                                alt="" class="rounded-3" width="50px"
                                                                title="{{ $product->product_name }}"></td>
                                                        <td>{{ $product->product_quantity }}</td>
                                                        <td>{{ $product->product_price * $product->product_quantity }}</td>
                                                    </tr>
                                                    @php
                                                        $total += $product->product_price * $product->product_quantity;
                                                    @endphp
                                                @endforeach
                                                <tr>
                                                    <th colspan="2" class="text-right">Total</th>
                                                    <th>{{ $total }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary">Cash on delivery</button>
                                        <hr>
                                        <a href="/checkout/online/payment" class="btn btn-primary">Go for online payment</a>
        </form>
        <div>
        </div>
        </div>
        </div>
        </div>
        <div class="p-5">
            <h6 class="mb-0">
                <a href="{{ url('showAllProducts') }}" class="text-body">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>
                    Back to shop
                </a>
            </h6>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
