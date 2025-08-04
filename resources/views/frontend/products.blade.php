@extends('layouts.frontend')
@section('title', 'Products')
@section('content')


    <!-- Our Products -->
    <section class="products-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-option-panel">
                        <div class="left-column">
                            <div class="showing-result">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }}
                                of
                                {{ $products->total() }} results
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="shop-item">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="javascript:void(0)" class="">
                                            <img src="{{ asset('/storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                style="width: 355px !important; height: 188px !important;">
                                        </a>
                                    </div>
                                    <div class="lower-content">
                                        <h4>
                                            <a href="javascript:void(0)" class="" title="{{ $product->name }}">
                                                {{ \Str::words($product->name, 5) }}
                                            </a>
                                        </h4>
                                        <div class="price">₹{{ number_format($product->price, 2) }}</div>
                                        <p class="text" title="{{ $product->short_description }}">
                                            {{ \Str::words($product->short_description, 12, '...') }}</p>
                                        <a href="javascript:void(0)" class="theme-btn"
                                            onclick="addToCart('{{ $product->uuid }}')">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="shop-pagination">
                        {{ $products->links('vendor.pagination.products-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
