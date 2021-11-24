<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'User Management System') }}</title>

    <!-- Styles -->

    <link href="{{ URL::to('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
   
    <!-- App Css-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles

</head>

<body id="wrap">
    <!-- ======= Header ======= -->
    <header id="main-header" class="fixed-top">
        <div class="multi_color_border"></div>
        <div class="container d-flex align-items-center">
            <div class="header-left">
                <a href="{{ url('/') }}" class="logos">
                    <img src="assets/img/logo-dark.png" width="35" height="35" alt=""><span>ZiK</span>clinic
                </a>
            </div>
            <h1 class="logo me-auto"></h1>

            @include('partials.alerts')

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('about-us') }}">About</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact</a></li>
                    <li class="dropdown"><a href="#"><span>Test Request</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Make Request</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('account') }}">Register</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/status') }}">Check Status</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('login') }}">Profile</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>

    </header><!-- End Header -->
    <main id="main" class="container-fluid">
        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div>
        @yield('content')
    </main>
    {{-- <footer class="footer">
        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>ZiKwax</span></strong>. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </footer> --}}
    <script src="{{ URL::to('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
   
   
	<script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/app.js') }}"></script>

    <script src="{{ URL::to('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ URL::to('assets/js/pages/form-wizard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::to('assets/js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
