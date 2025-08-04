<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') || {{ config('app.name', 'Altrone') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">
    <link type="text/css" href="{{ asset('assets/backend/dist/css/sweetalert2.css') }}" rel="stylesheet">
    <link type="text/css" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link type="text/css" href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.bootstrap4.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap4.min.css">
    <style>
        .dt-paging {
            float: right !important;
        }

        .dt-body-left {
            text-align: left !important;
        }

        .dt-head-left {
            text-align: left !important;
        }
    </style>
    @stack('extracss')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item d-flex">
                    Welcome, <a href="javascript:void(0)" class="d-block"> {{ auth()->user()->name }}</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                {{-- <img src="{{ asset('assets/backend/dist/img/altrone-logo.webp') }}" alt="Altrone Logo"
                    class="brand-image img-circle elevation-3 bg-light"> --}}
                <span class="brand-text ml-5">Altrone</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-store"></i>
                            <p>
                                Manage Products
                            </p>
                        </a>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') == 2025 ? 2025 : '2025 - ' . date('Y') }} <a href="#">TISS
                    SSE</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/function.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/sweetalert2.js') }}"></script>

    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap4.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>

    <!-- JSZip and pdfmake (for Excel/PDF export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js">
    </script>

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
    </script>

    @stack('scripts')
</body>

</html>
