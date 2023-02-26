@extends('admin.app')
@section('content')
    @push('title')
        <title>Canceled Orders</title>
    @endpush
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="text-center fs-2 my-4">Canceled Orders</h2>
            @if (count($orders) > 0)
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Delete</th>
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
                                            <img src="product-images/{{ $order->product_image }}"
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
                                        <a href="/delete/order/{{ $order->id }}"
                                            onclick="return confirm('Are you sure you want to Delete the order?')"
                                            class="badge bg-danger text-light"><i class="fa-solid fa-delete-left"></i></a>
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
                <p class="text-center">No Canceled Orders were found.</p>
            @endif
        </div>
    </div>
@endsection
