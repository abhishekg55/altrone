@extends('layouts.frontend')
@section('title', 'Checkout')
@section('content')

    <!--Checkout Page-->
    <div class="checkout-page">
        <div class="auto-container">
            <!--Billing Details-->
            <div class="billing-details">
                <div class="shop-form">

                    @guest('user')
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <form method="post" action="">
                                    <div class="title-box">
                                        <h2>Login</h2>
                                    </div>
                                    <div class="billing-inner">
                                        <div class="row clearfix">
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Email Address <sup>*</sup></div>
                                                <input type="text" name="field-name" value=""
                                                    placeholder="Email Address">
                                            </div>
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Password <sup>*</sup></div>
                                                <input type="text" name="field-name" value=""
                                                    placeholder="Email Address">
                                            </div>

                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="place-order">
                                                    <button type="submit" class="theme-btn order-btn">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <form method="post" action="">
                                    <div class="title-box">
                                        <h2>Register</h2>
                                    </div>
                                    <div class="billing-inner">
                                        <div class="row clearfix">
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Name <sup>*</sup></div>
                                                <input type="text" name="name" value="" placeholder="Enter Name">
                                            </div>
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Email Address <sup>*</sup></div>
                                                <input type="email" name="email" value="" placeholder="Email Address">
                                            </div>
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Mobile Number <sup>*</sup></div>
                                                <input type="text" name="phone" value="" placeholder="Mobile Number">
                                            </div>
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Password <sup>*</sup></div>
                                                <input type="text" name="field-name" value=""
                                                    placeholder="Email Address">
                                            </div>

                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="place-order">
                                                    <button type="submit" class="theme-btn order-btn">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endguest

                    @auth('user')
                        <form method="post" action="checkout.html">
                            <div class="row clearfix">
                                <div class="col-lg-7 col-md-12 col-sm-12">

                                    <div class="title-box">
                                        <h2>Billing Details</h2>
                                    </div>
                                    <div class="billing-inner">
                                        <div class="row clearfix">

                                            <!--Form Group-->
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">Name <sup>*</sup></div>
                                                <input type="text" name="field-name" value="" placeholder="Name">
                                            </div>

                                            <!--Form Group-->
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">Email Address <sup>*</sup></div>
                                                <input type="text" name="field-name" value=""
                                                    placeholder="Email Address">
                                            </div>

                                            <!--Form Group-->
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">Phone <sup>*</sup></div>
                                                <input type="text" name="field-name" value=""
                                                    placeholder="Select an option">
                                            </div>

                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Address <sup>*</sup></div>
                                                <input type="email" name="field-name" value=""
                                                    placeholder="Street Address">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <div class="title-box">
                                        <h2>Your Order</h2>
                                    </div>
                                    <div class="shop-order-box">
                                        <ul class="order-list">
                                            <li>Prodcut<span>TOTAL</span></li>
                                            @foreach (\Cart::getContent() as $item)
                                                <li>{{ $item->name }} x
                                                    {{ $item->quantity }}<span>₹{{ number_format($item->getPriceSum(), 2) }}</span>
                                                </li>
                                            @endforeach

                                            <li>Subtotal<span
                                                    class="dark">₹{{ number_format(\Cart::getSubTotal(), 2) }}</span>
                                            </li>
                                            <li>Shipping And Handling<span>Free Shipping</span></li>
                                            <li class="total">TOTAL<span
                                                    class="dark">₹{{ number_format(\Cart::getTotal(), 2) }}</span></li>
                                        </ul>


                                        <!--Place Order-->
                                        <div class="place-order">
                                            <!--Payment Options-->
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment-group" id="payment-3"
                                                                checked>
                                                            <label for="payment-3"><strong>Paypal</strong><img
                                                                    src="assets/images/resource/paypall.jpg" alt="" />
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button type="button" class="theme-btn order-btn">Order Place</button>

                                        </div>
                                        <!--End Place Order-->

                                    </div>


                                </div>
                            </div>
                        </form>
                    @endauth

                </div>

            </div><!--End Billing Details-->
        </div>
    </div>

@endsection
