<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }
    </style>
</head>

<body>

    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Invoice</h2>
                    <h3 class="pull-right">Order # {{ $orderData->id }}</h3>
                </div>
                <hr>
                <div class="row d-flex justify-content-between">
                    <div class="col-xs-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            <strong>Name: </strong>Muhammad Awais<br>
                            <strong>Address: </strong>Bahawalnagar, punjab
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Shipped To</strong><br>
                            <strong>Name: </strong>{{ $orderData->user_name }}<br>
                            <strong>Address: </strong>{{ $orderData->user_address }}
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Payment Method:</strong><br>
                            {{ $orderData->payment_method }}<br>
                            <strong>Email:</strong><br>
                            {{ $orderData->user_email }}
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            {{ date('d-m-Y', strtotime($orderData->created_at)) }}<br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>S.No</strong></td>
                                        <td><strong>Item</strong></td>
                                        <td><strong>Payment Status</strong></td>
                                        <td><strong>Delivery Status</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    @php
                                        $sno = 1;
                                        $total = 0;
                                    @endphp
                                    @foreach ($orderCollection as $item)
                                        @if ($item->delivery_status == 'processing' || $item->payment_status == 'pending')
                                            <tr>
                                                <td>{{ $sno }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->payment_status }}</td>
                                                <td>{{ $item->delivery_status }}</td>
                                                <td class="text-center">RS/- {{ $item->product_price }}</td>
                                                <td class="text-center">{{ $item->product_quantity }}</td>
                                                <td class="text-right">
                                                    {{ $item->product_price * $item->product_quantity }}</td>
                                            </tr>
                                            @php
                                                $sno += 1;
                                                $user_id = $item->user_id;
                                                $total += $item->product_price * $item->product_quantity;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @php
                                        $paid = 0;
                                    @endphp
                                    @foreach ($orderCollection as $item)
                                        @if($item->payment_status == 'paid' && $item->delivery_status != 'delivered')
                                        @php
                                            $paid += $item->product_price;
                                        @endphp
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Total</strong></td>
                                        <td class="thick-line text-right">Rs/- {{ $total - $paid}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/print/invoice/{{ $user_id }}/{{ $orderData->id }}"
                                class="btn btn-primary me-auto" id="download">Download PDF</a>
                            <a href="#" class="btn btn-primary me-auto" id="print">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let btn = document.getElementById("print");
        btn.addEventListener("click", function() {
            document.getElementById('download').style.display = "none";
            btn.style.display = "none";
            window.print();
        })
    </script>
</body>

</html>
