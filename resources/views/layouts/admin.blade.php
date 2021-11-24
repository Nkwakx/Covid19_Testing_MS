<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Covid19 Testing Management System</title>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ URL::to('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



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
                                <a class="dropdown-item" href="{{ route('patient_profile') }}">My Profile</a>
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
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="active">
                                <a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.nurses') }}"><i class="fa fa-user-md"></i> <span>Nurses</span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.patients') }}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fa fa-user"></i> <span> Manage Users </span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('admin.nurses') }}">Nurses</a></li>
                                    <li><a href="">Laboratorist</a></li>
                                    <li><a href="{{ route('admin.allusers') }}">All Users</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="">Invoices</a></li>
                                    <li><a href="p">Payments</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href=""> Test Request Report </a></li>
                                    <li><a href=""> Payments Report </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-comments"></i> <span>Chat</span> <span
                                        class="badge badge-pill float-right"></span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="">Voice Call</a></li>
                                    <li><a href="">Video Call</a></li>
                                    <li><a href="">Incoming Call</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="">Compose Mail</a></li>
                                    <li><a href="">Inbox</a></li>
                                    <li><a href="">Mail View</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-index">
                <div class="content">
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
    @endcan

   
{{--
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Requestors', 'Status'],
            ]);

            var options = {
                title: 'Test Request'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script> --}}

    {{-- <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawSeriesChart);

        function drawSeriesChart() {

            var data = google.visualization.arrayToDataTable([
                ['ID', 'Life Expectancy', 'Fertility Rate', 'Region', 'Population'],
                ['CAN', 80.66, 1.67, 'North America', 33739900],
                ['DEU', 79.84, 1.36, 'Europe', 81902307],
                ['DNK', 78.6, 1.84, 'Europe', 5523095],
                ['EGY', 72.73, 2.78, 'Middle East', 79716203],
                ['GBR', 80.05, 2, 'Europe', 61801570],
                ['IRN', 72.49, 1.7, 'Middle East', 73137148],
                ['IRQ', 68.09, 4.77, 'Middle East', 31090763],
                ['ISR', 81.55, 2.96, 'Middle East', 7485600],
                ['RUS', 68.6, 1.54, 'Europe', 141850000],
                ['USA', 78.09, 2.05, 'North America', 307007000]
            ]);

            var options = {
                title: 'Numbers in each suburb statistic',
                hAxis: {
                    title: 'Cases Expectancy'
                },
                vAxis: {
                    title: 'Cases Rate'
                },
                bubble: {
                    textStyle: {
                        fontSize: 11
                    }
                }
            };

            var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
            chart.draw(data, options);
        }
    </script> --}}


    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ URL::to('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ URL::to('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ URL::to('assets/js/chart.js') }}"></script>
    <script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/app.js') }}"></script>
	<script src="{{ URL::to('assets/js/line-chart.js') }}"></script>

    <script src="{{ URL::to('assets/libs/jquery/jquery.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::to('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
     <!-- Responsive examples -->
     <script src="{{ URL::to('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
     <script src="{{ URL::to('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::to('assets/js/pages/datatables.init.js') }}"></script>

     {{-- <!-- form repeater js -->
     <script src="{{ URL::to('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <script src="{{ URL::to('assets/js/pages/form-repeater.int.js') }}"></script>
    <script src="{{ URL::to('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

     <!-- Table Editable plugin -->
     <script src="{{ URL::to('assets/libs/table-edits/build/table-edits.min.js') }}"></script>

     <script src="{{ URL::to('assets/js/pages/table-editable.int.js') }}"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('script')
</body>

</html>
