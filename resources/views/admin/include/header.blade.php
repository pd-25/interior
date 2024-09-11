<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- Plugins css -->
        {{-- <link href="{{ asset('admin/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css">

        <!-- plugins -->
        <link href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css"> --}}

		<!-- App css -->
		<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet">
		<link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet">

		{{-- <link href="{{ asset('admin/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="">
		<link href="{{ asset('admin/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled=""> --}}

        <link href="{{ asset('admin/assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

		<!-- icons -->
		<link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @stack('styles')

        @yield('custom_style')

    </head>

    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('admin/assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    Admin <i class="uil uil-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                {{-- <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div> --}}

                                {{-- <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                                </a> --}}

                                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                    <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Change Password</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                                </a>

                            </div>
                        </li>
                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                {{-- <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="24"> --}}
                                <!-- <span class="logo-lg-text-light">Shreyu</span> -->
                            </span>
                            <span class="logo-lg">
                                {{-- <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="60"> --}}
                                <span class="logo-lg-text-light">Admin Panel</span>
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="24">
                            </span>
                        </a>
                    </div>


                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar="">

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ asset('admin/assets/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">Nik Patel</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="settings" class="icon-dual icon-xs me-1"></i><span>Settings</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i><span>Support</span>
                                </a>
                                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                    <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    @include('admin.include.sidebar')

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

