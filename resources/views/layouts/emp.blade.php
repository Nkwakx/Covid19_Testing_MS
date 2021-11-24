<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Covid19 Testing Management System</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    <link href="{{ URL::to('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- plugin css -->
    <link href="{{ URL::to('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('assets/libs/@chenfengyuan/datepicker/datepicker.min.css') }}"  rel="stylesheet" >


</head>

<body>
    @can('logged-in')
        <div class="main-wrapper">
            <div class="header">
                <div class="multi_color_border"></div>
                <div class="header-left">
                    <a href="" class="logo">
                        <img src="{{ asset('images/logo.png') }}" width="35" height="35" alt=""> <span>ZiKClinic</span>
                    </a>
                </div>
                {{-- <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a> --}}
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
                <div class="header-right">
                    <ul class="form-inline my-2 my-lg-0 nav user-menu">
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i
                                    class="fa fa-bell-o"></i> <span
                                    class="badge badge-pill bg-danger float-right"></span></a>
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
                                <a class="dropdown-item" href="">My Profile</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#user_profile">Edit Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit()" ;>Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none">
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
                                <a href="{{ route('indexes') }}"><i class="fa fa-home back-icon"></i> <span>Back to
                                        Home</span></a>
                            </li>
                            <li>
                                <a href="{{ route('nurse.nurses.create') }}"><i class="fa fa-file-word-o"></i>
                                    <span>Capture Test</span></a>
                            </li>
                            <li class="menu-title">Favourites Suburbs <a href="#" class="add-user-icon"
                                    data-toggle="modal" data-target="#add_group"></a></li>
                            <li>
                            <li class="sub">@include('nurse.partials._favouriteSuburb')</li>
                            </li>
                            <li class="menu-title">Direct Chats <a href="#" class="add-user-icon" data-toggle="modal"
                                    data-target="#add_chat_user"></a></li>

                            <li>
                                @include('nurse.partials._staff')
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
                        <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                            <div class="chat-window video-window">
                                <div class="fixed-header">
                                    <ul class="nav nav-tabs nav-tabs-bottom">
                                        <li class="nav-item"><a class="nav-link active" href="#calls_tab"
                                                data-toggle="tab">General View</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#profile_tab"
                                                data-toggle="tab">Upcoming Appointments</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content chat-contents">
                                    <div class="content-full tab-pane show active" id="calls_tab">
                                        <div class="chat-wrap-inner">
                                            <div class="chat-box">
                                                <div class="chats">
                                                    <div class="widget search-widget">
                                                        <h5>Search</h5>
                                                        <form class="search-form">
                                                            <div class="input-group">
                                                                <input type="text" placeholder="Search..."
                                                                    class="form-control">
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="widget tags-widget">
                                                        <h5>Choose your favourite suburb(s)</h5>
                                                        <ul class="tags">
                                                            <li>@include('nurse.partials._suburb')</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-full tab-pane" id="profile_tab">
                                        <div class="display-table">
                                            <div class="table-row">
                                                <div class="table-body">
                                                    <div class="table-content">
                                                        @include('nurse.partials._todaysApp')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ URL::to('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ URL::to('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ URL::to('assets/js/chart.js') }}"></script>
    <script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/app.js') }}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::to('assets/js/pages/datatables.init.js') }}"></script>

     <!-- form repeater js -->
     <script src="{{ URL::to('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <script src="{{ URL::to('assets/js/pages/form-repeater.int.js') }}"></script>


     <!-- Table Editable plugin -->
     <script src="{{ URL::to('assets/libs/table-edits/build/table-edits.min.js') }}"></script>

     <script src="{{ URL::to('assets/js/pages/table-editable.int.js') }}"></script>

    <!-- App js -->
    {{-- <script src="{{ URL::to('assets/js/app.js') }}"></script> --}}


     <!-- plugins -->
     <script src="{{ URL::to('assets/libs/select2/js/select2.min.js') }}"></script>
     <script src="{{ URL::to('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
     <script src="{{ URL::to('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
     <script src="{{ URL::to('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
     <script src="{{ URL::to('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
     <script src="{{ URL::to('assets/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>

     <script src="{{ URL::to('assets/js/pages/form-advanced.init.js') }}"></script>


    @yield('scripts')
</body>

</html>
