@push('title')
    <title>Admin</title>
@endpush
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalProducts }}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="fa-solid fa-arrow-up-right-dots"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Products</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">
                                        {{ $totalOrdersCount }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <i class="fa-solid fa-arrow-up-right-dots"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Orders</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalUsers }}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <i class="fa-solid fa-arrow-down-short-wide"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Customers</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">
                                        @php
                                            $totalrevenue = 0;
                                        @endphp
                                        @foreach ($totalOrders as $item)
                                            @php
                                                $totalrevenue += $item->total_price;
                                            @endphp
                                        @endforeach
                                        {{ $totalrevenue }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="fa-solid fa-sack-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">
                                        @php
                                            $totalOrderDelivered = 0;
                                        @endphp
                                        @foreach ($totalOrders as $item)
                                            @if ($item->delivery_status == 'delivered')
                                                @php
                                                    $totalOrderDelivered += 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{ $totalOrderDelivered }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="fa-regular fa-thumbs-up"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Order Delivered</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">
                                        @php
                                            $totalOrdersPending = 0;
                                        @endphp
                                        @foreach ($totalOrders as $item)
                                            @if ($item->delivery_status == 'processing')
                                                @php
                                                    $totalOrdersPending += 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{ $totalOrdersPending }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="fa-solid fa-spinner"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Order Processing</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © E-coerece.com
                @php echo date('Y') @endphp</span>
        </div>
    </footer>
    <!-- partial -->
</div>
