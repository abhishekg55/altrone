@extends('layouts.frontend')
@section('title', 'Carts')
@section('content')

    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">

            <!--Cart Outer-->
            <div class="cart-outer">
                <div class="table-outer">
                    @forelse ($carts as $key => $cart)
                        <table class="cart-table">
                            <h3>Vendor: {{ $cart->first()->attributes->vendor_name }}</h3>
                            <thead class="cart-header">
                                <tr>
                                    <th>Preview</th>
                                    <th class="prod-column">product</th>
                                    <th class="price">Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="prod-column">
                                            <div class="column-box">
                                                <figure class="prod-thumb">
                                                    <img src="{{ asset('storage/' . $item->attributes->image) }}"
                                                        class="img " alt="{{ $item->name }}" width="80"
                                                        height="80">
                                                </figure>
                                            </div>
                                        </td>
                                        <td>
                                            <h4 class="prod-title">{{ $item->name }}</h4>
                                        </td>
                                        <td class="sub-total">₹{{ number_format($item->price, 2) }}</td>
                                        <td class="qty">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="text" value="{{ $item->quantity }}"
                                                    name="quantity" data-id="{{ $item->id }}">
                                            </div>
                                        </td>
                                        <td class="total-price">₹{{ number_format($item->getPriceSum(), 2) }}</td>
                                        <td><a href="javascript:void(0)" class="remove-btn"
                                                onclick="removeCart('{{ $item->id }}')"><span
                                                    class="fas fa-times"></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @empty
                        <tr>
                            <td colspan="6" class="text-danger">No Record found ! <a href="{{ route('front.home') }}">
                                    keep shopping</a></td>
                        </tr>
                    @endforelse


                </div>

                <div class="cart-options clearfix">

                </div>

                <div class="row clearfix">

                    <div class="column col-lg-7 col-md-5 col-sm-12">
                    </div>

                    <div class="column col-lg-5 col-md-7 col-sm-12">
                        <!--Totals Table-->
                        <ul class="totals-table">
                            <li>
                                <h3>Cart Totals</h3>
                            </li>
                            <li class="clearfix"><span class="col">Sub Total</span><span
                                    class="col">₹{{ number_format(\Cart::getSubTotal(), 2) }}</span>
                            </li>
                            <li class="clearfix total"><span class="col">Total</span><span
                                    class="col price">₹{{ number_format(\Cart::getTotal(), 2) }}</span></li>
                            <li class="text-right"><button type="submit" class="theme-btn proceed-btn">Proceed to
                                    Checkout</button></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Cart Section-->

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.quantity-spinner').on('change', function() {

                var data = {
                    'id': $(this).data('id'),
                    'quantity': $(this).val()
                }

                customAjax("{{ route('carts.update') }}", JSON.stringify(data))
            });
        });

        function removeCart(param) {
            var data = {
                'id': param
            }

            customAjax("{{ route('carts.remove') }}", JSON.stringify(data))
        }
    </script>
@endpush
