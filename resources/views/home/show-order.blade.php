@extends('home.app')
@push('title')
    <title>Manage Orders</title>
@endpush
@section('content')
@if(count($orders) > 0)
    <h2 class="text-center fs-2 my-4">All Orders</h2>
    <div class="table-responsive px-5">
        <table class="table">
            <thead>
                <tr>
                    <th >S.No</th>
                    <th >Image</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Address</th>
                    <th >Phone</th>
                    <th >Product Title</th>
                    <th >Quantity</th>
                    <th >Price</th>
                    <th >Cancel</th>
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
                                <img src="/product-images/{{ $order->product_image }}" alt="{{ $order->product_image }}"
                                    style="object-fit: cover;width:50px;height:50px;object-position:50%;" id="image">
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
                           <a href="/cancel/order/{{ $order->id }}" onclick="return confirm('Are you sure you want to cancel the order?')" class="badge bg-danger text-light"><i class="fa-solid fa-delete-left"></i></a>
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
    <p class="text-center">No orders have been placed. Add some.</p>
    <div class="container">
        <hr class="bg-danger">
    </div>
    @include('home.products')
    @endif
    </div>
    </div>
@endsection
