<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        img {
            height: 70px;
        }

        * {
            font-family: 'Segoe UI';
            color: #504E4E;
        }

        th {
            font-weight: 600;
            text-align: left;
        }

        .bg-silver {
            background-color: #eee;
        }

        h4 {
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
            margin: 5px;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row:after {
            clear: both;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .row:after,
        .row:before {
            display: table;
            content: " ";
        }

        .bg-silver {
            background-color: #eee !important;
            padding: 3px;
        }

        .col-sm-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-sm-12 {
            float: left;
        }

        .col-sm-12 {
            width: 100%;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d !important;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .table {
            border-collapse: collapse !important;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }

        .table-responsive>.table {
            margin-bottom: 0;
        }

        .table tr td,
        .table tr th {
            padding: 5px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd !important
        }

        .text-right {
            text-align: right;
        }

        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #ddd;
            min-height: .01%;
            overflow-x: auto
        }

        @media (min-width:768px) {
            .container {
                width: 650px
            }
        }

        @media (min-width:992px) {
            .container {
                width: 870px
            }
        }

        @media (min-width:1200px) {
            .container {
                width: 970px
            }
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

    </style>

</head>

<body>
    <br />
    <div class="container">
        <div>
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="{{ config('app.name', 'Altrone') }}" />
            </a>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success">

                    <h4>
                        Hi {{$order->user->name}} , Your order has been placed successfully !
                    </h4>
                </div>
                <table border="1" class="table table-bordered table-responsive">
                    <tr>
                        <th colspan="2" class="text-center text-uppercase bg-silver">
                            Contact Information
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">Date of order : {{ date('d-m-Y h:i A', strtotime($order->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            order ID :
                        </td>
                        <td>
                            #{{$order->id}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            {{$order->user->name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email :
                        </td>
                        <td>
                            {{$order->user->email}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Contact No. :
                        </td>
                        <td>
                            {{$order->user->phone}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Address :
                        </td>

                        <td>
                            {{$order->address}}
                        </td>
                    </tr>

                </table>
                <hr>
                <table border="1" class="table table-bordered table-responsive">
                    <tr>
                        <th colspan="12" class="text-center text-uppercase bg-silver">
                            Order Information
                        </th>
                    </tr>

                    <tr>
                        <th>Product Name</th>
                        <th>MRP (Rs.)</th>
                        <th>QTY</th>
                        <th>AMT (Rs.)</th>
                    </tr>

                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                {{ $item->product->name }} </td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total_amount }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <th colspan="12" class="bg-silver text-right text-uppercase">
                            <p>Grand Total : &#8377; {{ $order->total_amount }}</p>
                        </th>
                    </tr>

                </table>
                <hr>

                <div>
                    <b>
                        NOTE :
                    </b>
                    This is an autogenerated mail. Please do not reply to this mail. If you have any queries then go to
                    <a href="/">Contact Us</a> Or send a mail at
                    <a href="mailto:abhishekgupta5544@gmail.com">abhishekgupta5544@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>