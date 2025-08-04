<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') || {{ config('app.name', 'Altrone') }}</title>
    <!-- Stylesheets -->
    <link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <!-- Responsive File -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <!-- Color File -->
    <link href="{{ asset('assets/frontend/css/color.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/backend/dist/css/sweetalert2.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <style>
        .dropdown-item.active,
        .dropdown-item:active {
            background-color: #fbc136;
        }

        .disabled a {
            background: #f2f2f2 !important;
            cursor: not-allowed;
        }

        .disabled a:hover {
            color: #ffffff !important;
            background: #d99d00 !important;
            border-color: #d99d00 !important;
            cursor: not-allowed;
        }
    </style>
    @yield('extracss')
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- Main Header -->
        <header class="main-header header-style-one">

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="index.html"><img
                                        src="{{ asset('assets/frontend/images/logo.png') }}" alt=""></a></div>
                        </div>
                        <div class="contact-info">
                            <div class="single-info">
                                <div class="icon"><span class="flaticon-null-1"></span></div>
                                <div class="text">
                                    854 Lorance Road, Rose Vallery,
                                    <br>Orlando, New York 8564, <br>
                                    United States.
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="icon"><span class="flaticon-null-2"></span></div>
                                <h5><a href="tel:1234567890">(+91)1234567890</a> <br>Call us</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!-- Main Menu -->
            <div class="main-menu">
                <div class="auto-container">
                    <div class="inner-container">
                        <span class="border-shape"></span>
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img
                                    src="{{ asset('assets/frontend/images/icons/icon-bar.png') }}" alt="">
                            </div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                        <li><a href="{{ route('front.home') }}">Home</a></li>
                                        <li><a href="{{ route('front.products') }}">Products</a></li>
                                        <li><a href="#aboutus">About Us</a></li>
                                        <li><a href="#contactus">Contact Us</a></li>
                                        <li><a href="{{ route('carts.index') }}">Cart</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                            {{-- <button type="button" class="theme-btn search-toggler text-right">
                                <span class="stroke-gap-icon icon-Search"></span>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Header  -->
            <div class="sticky-header main-menu">
                <div class="auto-container">
                    <div class="inner-container">
                        <div class="nav-outer">
                            <span class="border-shape"></span>
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav><!-- Main Menu End-->
                            <!-- Main Menu End-->
                            {{-- <button type="button" class="theme-btn search-toggler">
                                <span class="stroke-gap-icon icon-Search"></span>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div><!-- End Sticky Menu -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-remove"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo"><a href="index.html"><img
                                src="{{ asset('assets/frontend/images/logo-three.png') }}" alt=""
                                title=""></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div><!-- End Mobile Menu -->

            <div class="nav-overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
        </header>
        <!-- End Main Header -->

        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer"
            style="background-image: url({{ asset('assets/frontend/images/background/bg-6.jpg') }});" id="contactus">
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Column-->
                        <div class="column col-lg-4">
                            <div class="widget about-widget">
                                <div class="logo"><a href="index.html"><img
                                            src="{{ asset('assets/frontend/images/logo.png') }}" alt=""></a>
                                </div>
                                <div class="text">854 Lorance Road, Rose Vallery,
                                    <br>Orlando, New York 8564, <br>
                                    United States.
                                </div>
                                <h5>Call Us </h5>
                                <h4><a href="tel:1234567890">1234567890</a></h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-lg-4">
                            <div class="footer-widget links-widget">
                                <h3 class="widget-title">Useful Links</h3>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul>
                                                <li><a href="{{ route('front.home') }}">Home</a></li>
                                                <li><a href="#">Organic Milk</a></li>
                                                <li><a href="#">Falvoured Milk</a></li>
                                                <li><a href="#">Our Recipes</a></li>
                                                <li><a href="#">Testimonials</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li><a href="#">Meet Our Farmers</a></li>
                                                <li><a href="#about-us">About Us</a></li>
                                                <li><a href="#">Latest Blogs</a></li>
                                                <li><a href="#">Faq</a></li>
                                                <li><a href="#contactus">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-lg-4">
                            <div class="footer-widget newsletter-widget">
                                <h3 class="widget-title">Newsletter</h3>
                                <div class="widget-content">
                                    <div class="hint">Get latest updates and offers.</div>
                                    <form action="#">
                                        <input type="email" placeholder="Enter your email address">
                                        <button type="submit"><i class="fa fa-paper-plane"></i></button>
                                    </form>
                                    <div class="social-links">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="auto-container">
                <div class="footer-bottom">
                    <div class="copyright">
                        <div class="row m-0 justify-content-between">
                            <div class="text">© Copyright <a href="javascript:void(0)">Altrone Pvt. Ltd.</a> All
                                right
                                reserved.</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow"></span></div>

    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/owl.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/wow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/lazyload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/TweenMax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/dist/js/function.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/dist/js/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js">
    </script>

    @stack('scripts')

    <script>
        var imageUrl = "{{ asset('assets/backend/dist/img/spinner-white.svg') }}";

        $.LoadingOverlaySetup({
            background: "rgb(0 0 0 / 78%)",
            image: imageUrl,
            imageAnimation: "3s pulse",
            imageColor: "#ffcc00",
            text: "Processing...",
            textColor: '#ffffff',
        });

        $(document).ajaxStart(function() {
            $.LoadingOverlay("show");

            $.LoadingOverlay("css", "font-size: 40px");

            setTimeout(function() {
                $.LoadingOverlay("text", "It may take a couple of minutes...");
            }, 20000);

            setTimeout(function() {
                $.LoadingOverlay("text", "It is nearly done...");
            }, 50000);
        });

        $(document).ajaxStop(function() {
            $.LoadingOverlay("hide", true);
        });

        function addToCart(param) {

            var data = {
                'id': param
            }

            customAjax("{{ route('carts.store') }}", JSON.stringify(data));
        }
    </script>


</body>

</html>
