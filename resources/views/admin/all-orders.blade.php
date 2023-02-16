@extends('admin.app')
@push('title')
    <title>Manage Orders</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (count($orders) > 0)
                <h2 class="text-center fs-2 my-4 text-light">All Orders</h2>
                <div class="table-responsive" style="max-width:1064px;overflow-x:auto;">
                    <table class="table text-light" id="myOrderTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Image</th>
                                <th class="text-light">Name</th>
                                <th class="text-light">Email</th>
                                <th class="text-light">Address</th>
                                <th class="text-light">Phone</th>
                                <th class="text-light">Product Title</th>
                                <th class="text-light">Quantity</th>
                                <th class="text-light">Price</th>
                                <th class="text-light">Delivery Status</th>
                                <th class="text-light">Payment Status</th>
                                <th class="text-light">Update Payment Status</th>
                                <th class="text-light">Update delivery Status</th>
                                <th class="text-light">Invoice</th>
                                <th class="text-light">notify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp

                            @foreach ($orders as $order)
                                <tr>
                                    <td scope="row">{{ $sno }}</td>
                                    <td scope="row">
                                        <div>
                                            <img src="/product-images/{{ $order->product_image }}"
                                                alt="{{ $order->product_image }}"
                                                style="object-fit: cover;width:50px;height:50px;object-position:50%;"
                                                id="image">
                                        </div>
                                    </td>
                                    <td>{{ $order->user_name }}</td>
                                    <td>{{ $order->user_email }}</td>
                                    <td>{{ $order->user_address }}</td>
                                    <td>{{ $order->user_mobile_no }}</td>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->product_quantity }}</td>
                                    <td>{{ $order->product_price }}</td>
                                    <td>
                                        @if ($order->delivery_status == 'processing')
                                            <span class="badge bg-danger">{{ $order->delivery_status }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $order->delivery_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 'paid')
                                            <span class="badge bg-success">{{ $order->payment_status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $order->payment_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 'pending')
                                            <a href="/payment/paid/{{ $order->id }}"
                                                onclick="return confirm('Are you sure this product is paid?')">
                                                <span class="badge bg-danger">paid</span>
                                                <small class="bg-danger ms-1 px-1 text-decoration-none">x</small>
                                            </a>
                                        @else
                                            <span class="badge bg-success">paid</span><small
                                                class="bg-success ms-1 px-1">✓</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->delivery_status == 'processing')
                                            <a href="/product/delivered/{{ $order->id }}"
                                                onclick="return confirm('Are you sure this product is delivered?')">
                                                <span class="badge bg-danger">Delivered</span>
                                                <small class="bg-danger ms-1 px-1 text-decoration-none">x</small>
                                            </a>
                                        @else
                                            <span class="badge bg-success">Delivered</span><small
                                                class="bg-success ms-1 px-1">✓</small>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/invoice/{{ $order->user_id }}/{{ $order->id }}"
                                            class="badge bg-success text-white">Print Bill</a>
                                    </td>
                                    <td>
                                        <a href="/send/email/to/user/{{ $order->id }}"
                                            class="badge bg-success text-white">Notify</a>
                                    </td>
                                </tr>
                                @php
                                    $sno += 1;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="text-center fs-2 my-4 text-light">No orders were found.</h2>
            @endif
        </div>
    </div>
@endsection
