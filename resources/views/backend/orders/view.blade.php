@extends('layouts.app')
@section('title', 'Order Details')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Order Details</h4>
                    </div>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary float-right"> Go Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>#{{ $order->id }}</th>
                                    </tr>
                                    <tr>
                                        <td>Customer Name</td>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Email</td>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Mobile</td>
                                        <td>{{ $order->user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Address</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status</td>
                                        <td>{{ \App\Helpers\Helper::getOrderPaymentStatus($order->payment_status) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Status</td>
                                        <td>{{ \App\Helpers\Helper::getOrderStatus($order->status) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order At</td>
                                        <td>{{ date('d-F, Y h:i A', strtotime($order->created_at)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Vendor Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_sum = 0;
                                    @endphp
                                    @foreach ($order->items as $item)
                                        @if (auth()->user()->hasRole('vendor') && $item->vendor_id != auth()->id())
                                            @php
                                                continue;
                                            @endphp
                                        @else
                                            @php
                                            $total_sum +=$item->total_amount;
                                            @endphp
                                        @endif
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->vendor->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>₹{{ number_format($item->price, 2) }}</td>
                                            <td>₹{{ number_format($item->total_amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="5" class="text-right"> <strong>Total</strong></td>
                                        <td><strong>₹{{ number_format($total_sum, 2) }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
