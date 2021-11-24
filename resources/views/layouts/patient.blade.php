<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Covid19 Testing Management System</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ URL::to('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
    @can('logged-in')
        <div class="main-wrapper">
            <div class="header">
                <div class="multi_color_border"></div>
                <div class="header-left">
                    <a href="/" class="logo">
                        <img src="{{ asset('images/logo.png') }}" width="35" height="35" alt=""> <span>ZiKClinic</span>
                    </a>
                </div>
                {{-- <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a> --}}
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
                <div class="header-right">
                    <ul class="form-inline my-2 my-lg-0 nav user-menu">
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                                <span class="badge badge-pill bg-danger float-right"></span></a>
                            <div class="dropdown-menu notifications">
                                <div class="topnav-dropdown-header">
                                    <span>Notifications</span>
                                </div>
                                <div class="topnav-dropdown-footer">
                                    <a href="activities.html">View all Notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i
                                    class="fa fa-comment-o"></i> <span
                                    class="badge badge-pill bg-danger float-right"></span></a>
                        </li>
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" width="24"
                                        alt="Admin">
                                    <span class="status online"></span>
                                </span>
                                {{ Auth::user()->name }} {{ Auth::user()->surname }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('patient_profile') }}">My Profile</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#user_profile">Edit Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit()" ;>Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}"><i class="fa fa-home back-icon"></i> <span>Back to
                                        Home</span></a>
                            </li>
                            <li class="menu-title">Make Test Request <a href="{{ route('makeRequest') }}" class="add-user-icon"><i class="fa fa-plus"></i></a></li>
                            <li>
                                <a href="{{ url('statuses') }}">Check Status</a>
                            </li>
                            <li>
                                <a href="{{ url('appointments') }}">My Appointments</a>
                            </li>
                            <li class="menu-title">Add Family Member <a href="#" class="add-user-icon" data-toggle="modal"
                                    id="mediumButton" data-target="#add_family_member" data-attr="{{ url('addFamilyMember') }}">
                                    <i class="fa fa-plus"></i></a>
                            </li>
                            <li>
                                @include('patient.partials._dependentList')
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-wrapper">
                <div class="chat-main-row">
                    <div class="chat-main-wrapper">
                        <div class="col-lg-9 message-view chat-view">
                            <div class="chats">
                                @include('partials.alerts')
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    <div class="sidebar-overlay" data-reff=""></div>
 <!-- Script -->


    <script src="{{ URL::to('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ URL::to('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ URL::to('assets/js/chart.js') }}"></script>
    <script src="{{ URL::to('assets/js/app.js') }}"></script>

    <script src="{{ URL::to('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/pages/form-advanced.init.js') }}"></script>
    @yield('scripts')
</body>

</html>
