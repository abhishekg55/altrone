@extends('layouts.frontend')
@section('title', 'Home')
@section('content')

    <!-- Bnner Section -->
    <section class="banner-section">
        <div class="swiper-container banner-slider">
            <div class="swiper-wrapper">
                <!-- Slide Item -->
                <div class="swiper-slide" style="background-image: url('#');">
                    <div class="content-outer">
                        <div class="content-box">
                            <div class="inner">
                                <h1>Title</h1>
                                <div class="text">Sub Title</div>
                                <div class="link-box">
                                    <a href="javascript:void(0)" class="theme-btn btn-style-one">
                                        <span>View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-slider-nav">
            <div class="banner-slider-control banner-slider-button-prev"><span><i class="far fa-angle-left"></i></span>
            </div>
            <div class="banner-slider-control banner-slider-button-next"><span><i class="far fa-angle-right"></i></span>
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->

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

    <!-- Welcome Section Two -->
    <section class="welcome-section-two"
        style="background-image: url({{ asset('assets/frontend/images/background/bg-5.jpg') }}); background-size: contain;padding: 35px 0 !important;">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4 pl-lg-5">
                    <div class="sec-title mb-30">
                        <h2>Why Hankcok Farm?</h2>
                    </div>
                    <ul class="list wow fadeInUp" data-wow-duration="1500ms">
                        <li>
                            <strong>No adulteration: </strong> We provide fresh raw milk, free from adulteration at your
                            doorstep. Each drop of the milk is in its purest form without any added water
                        </li>
                        <li>
                            <strong>No hormonal injections: </strong> Our Gir cows are a famous Indian-born dairy cattle
                            breed that does not need hormonal injections.
                        </li>
                        <li>
                            <strong>Only sold in glass bottles: </strong> Storing milk in plastic packets and tetra packs is
                            a common practice to increase the shelf-life of milk. Our great grandparents were visionaries
                            ahead of their time who used glass milk bottles. It reduces carbon footprint.
                        </li>
                        <li>
                            <strong>No Preservatives: </strong> We stand by our words and believe in delivering milk free
                            from any preservatives. After all, good health matters.
                        </li>
                        <li>
                            <strong>Fastest delivery: Our Pride: </strong> With a collaboration between our highly skilled
                            delivery team and the fast-growing technology, we can provide you PURE – RAW – UNADULTERED from
                            farm to kitchen within 15 mins.
                        </li>
                        <li>
                            <strong>Providing testing kits to the customer to test the purity of milk: </strong> Although
                            many vendors claim to deliver fresh milk, we at Milkroot believe that it is every customer’s
                            right to know the purity of the milk they receive firsthand. Hence, we provide testing kits
                            through which you can now test the quality of the milk produced reaching at your home.
                        </li>
                        <li>
                            <strong>Hence, we say – “Dugdham… Know the Difference!”</strong>
                        </li>
                    </ul>
                </div>
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
                                    <img src="{{ asset('/storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 355px !important; height: 188px !important;">
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
