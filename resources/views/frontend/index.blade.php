@extends('layouts.frontend')
@section('title', 'Home')
@section('content')

    <!-- Welcome Section Three -->
    <section class="welcome-section-three" id="aboutus">
        <div class="image-one"><img src="{{ asset('assets/frontend/images/resource/sketch-4.jpg') }}" alt=""></div>
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="image mb-30 wow fadeInLeft" data-wow-duration="1500ms"><img
                            src="{{ asset('assets/frontend/images/resource/image-12.jpg') }}" alt=""></div>
                </div>
                <div class="col-lg-8">
                    <div class="content pl-lg-80">
                        <div class="sec-title mb-30">
                            <h2>About US</h2>
                            <div class="text">
                                <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test.
                                    Override the digital divide with additional clickthroughs from DevOps nanotechnology
                                    immersion along the information.fruit to identify a ballpark value added activity to
                                    beta
                                </p>

                                <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                    Iterative approaches to corporate strategy foster ide a robust synopsis for high level
                                    overviews.</p>
                            </div>
                            <div class="link-btn">
                                <a href="javascript:void(0)" class="theme-btn btn-style-one">
                                    <span>know more about us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Products -->
    <section class="products-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Our Products</h2>
                <div class="text">Dairy foods like low-fat or fat-free milk, yogurt and cheese are fundamental to
                    good nutrition. Healthy eating styles that include <br> fat-free or low-fat dairy foods have
                    been linked to health benefits.</div>
            </div>
            <div class="theme_carousel owl-theme owl-carousel"
                data-options='{"loop": true, "margin": 40, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
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
                                @if ($product->stock)
                                    <a href="javascript:void(0)" class="theme-btn"
                                        onclick="addToCart('{{ $product->uuid }}')">Buy Now</a>
                                @else
                                    <a href="javascript:void(0)" class="btn-danger">Out of stock</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section class="services-section"
        style="background-image: url({{ asset('assets/frontend/images/background/bg-3.jpg') }});">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>What We Offer</h2>
                <div class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque <br> ipsa quae ab illo inventore veritatis et
                    quasi architecto beatae.</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 service-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="image"><img src="{{ asset('assets/frontend/images/resource/image-4.jpg') }}"
                                alt="">
                        </div>
                        <h4>Butter</h4>
                        <div class="text">Dairy cultivating's been a piece of <br> horticulture for long of years.
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 service-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="image"><img src="{{ asset('assets/frontend/images/resource/image-5.jpg') }}"
                                alt="">
                        </div>
                        <h4>Milk</h4>
                        <div class="text">Dairy cultivating's been a piece of <br> horticulture for long of years.
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 service-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="image"><img src="{{ asset('assets/frontend/images/resource/image-6.jpg') }}"
                                alt="">
                        </div>
                        <h4>Cheese</h4>
                        <div class="text">Dairy cultivating's been a piece of <br> horticulture for long of years.
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 service-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="image"><img src="{{ asset('assets/frontend/images/resource/image-7.jpg') }}"
                                alt="">
                        </div>
                        <h4>Creame</h4>
                        <div class="text">Dairy cultivating's been a piece of <br> horticulture for long of years.
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-all text-center mt-3">
                <a href="" class="theme-btn btn-style-one style-two">
                    <span>View all products</span>
                </a>
            </div>
        </div>
    </section>

@endsection

@section('extracss')
    <style>
        @media (max-width:1024px) {
            .welcome-section-two {
                background-size: unset !important;
            }
        }
    </style>
@endsection
