<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logoZoffice2.ico') }}">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <script src="{{ asset('lib/webviewer.min.js') }}"></script>

    <link href="{{ asset('sky16/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('sky16/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/icons.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/tablecar.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/fontuser.css') }}" rel="stylesheet"> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- loader-->
    <link href="{{ asset('sky16/css/pace.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('sky16/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/header-colors.css') }}" rel="stylesheet" />

</head>

<?php
if (Auth::check()) {
    $type = Auth::user()->type;
    $userid = Auth::user()->id;
} else {
    echo "<body onload=\"TypeAdmin()\"></body>";
    exit();
}
$url = Request::url();
$pos = strrpos($url, '/') + 1;

use App\Http\Controllers\StaticController;
use App\Http\Controllers\RongController;
$checkhn = StaticController::checkhn($userid);
$checkhnshow = StaticController::checkhnshow($userid);
$orginfo_headep = StaticController::orginfo_headep($userid);
$orginfo_po = StaticController::orginfo_po($userid);
$countadmin = StaticController::countadmin($userid);

?>
<style>
    body {
        font-family: 'Kanit', sans-serif;
        font-size: 14px;

    }

    label {
        font-family: 'Kanit', sans-serif;
        font-size: 14px;

    }

    @media only screen and (min-width: 1200px) {
        label {
            /* float:right; */
        }

    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .dataTables_wrapper .dataTables_filter {
        float: right
    }

    .dataTables_wrapper .dataTables_length {
        float: left
    }

    .dataTables_info {
        float: left;
    }

    .dataTables_paginate {
        float: right
    }

    .custom-tooltip {
        --bs-tooltip-bg: var(--bs-primary);


    }

    .table thead tr th {
        font-size: 14px;
    }

    .table tbody tr td {
        font-size: 13px;
    }

    .menu {
        font-size: 13px;
    }
</style>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand bg-secondary">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar d-none d-xl-block">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard">
                            <a class="nav-link" href="{{ url('admin/home') }}">Dashboard</a>
                        </li>

                    </ul>
                </div>
                <div class="ms-auto">

                </div>

                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="ผู้ใช้งานทั่วไป">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('user/home') }}">
                                <div class="projects">
                                    <i class="fa-solid fa-user-tie text-primary"></i>
                                </div>
                            </a>
                        </li>
                        @if ($countadmin != 0)
                            <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="ผู้ดูแลระบบ">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="{{ url('setting/setting_index') }}">
                                    <div class="projects">
                                        <i class="fa-solid fa-user-tie text-danger"></i>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if ($checkhn != 0)
                            <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="หัวหน้า">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="{{ url('hn/hn_bookindex/' . Auth::user()->id) }}">
                                    <div class="projects">
                                        <i class="fa-solid fa-user-tie text-warning"></i>
                                    </div>
                                </a>
                            </li>
                        @endif


                        <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="หัวหน้ากลุ่ม">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="">
                                <div class="projects">
                                    <i class="fa-solid fa-user-tie text-secondary"></i>
                                </div>
                            </a>
                        </li>


                        @if ($orginfo_headep != 0)
                            <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="หัวหน้าบริหาร">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="{{ url('rong/rong_bookindex/' . Auth::user()->id) }}">
                                    <div class="projects">
                                        <i class="fa-solid fa-user-tie" style="color: rgb(241, 28, 241)"></i>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if ($orginfo_po != 0)
                            <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="ผู้อำนวยการ">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="{{ url('po/po_bookindex/' . Auth::user()->id) }}">
                                    <div class="projects">
                                        <i class="fa-solid fa-user-tie text-success"></i>
                                    </div>
                                </a>
                            </li>
                        @endif


                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1">
                                    @if (Auth::user()->img == null)
                                        <img src="{{ asset('assets/images/default-image.jpg') }}"n height="32px"
                                            width="32px" alt="Image" class="user-img">
                                    @else
                                        <img src="{{ asset('storage/person/' . Auth::user()->img) }}" height="32px"
                                            width="32px" alt="Image" class="user-img">
                                    @endif
                                    <div class="user-name d-none d-sm-block"> {{ Auth::user()->fname }}
                                        {{ Auth::user()->lname }}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">


                                            @if (Auth::user()->img == null)
                                                <img src="{{ asset('assets/images/default-image.jpg') }}"
                                                    width="60" height="60" alt="Image"
                                                    class="rounded-circle">
                                            @else
                                                <img src="{{ asset('storage/person/' . Auth::user()->img) }}"
                                                    width="60" height="60" alt="Image"
                                                    class="rounded-circle">
                                            @endif

                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name"> {{ Auth::user()->fname }}
                                                    {{ Auth::user()->lname }}</h6>
                                                <small
                                                    class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->position_name }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-user-profile.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->



        <!--start sidebar -->
        <aside class="sidebar-wrapper">
            <div class="iconmenu">
                <div class="nav-toggle-box bg-secondary">
                    <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
                </div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="แจ้งซ่อมคอมพิวเตอร์">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-gleave"
                            type="button"> 
                            <i class="fa-solid fa-computer text-secondary"></i>
                        </button>
                    </li>
                   
                </ul>
            </div>
            <div class="textmenu">
                <div class="brand-logo bg-secondary">
                    <img src="{{ asset('assets/images/logoZoffice.png') }}" width="100" height="30px"
                        alt="" />
                </div>
                <div class="tab-content">

                    <div class="tab-pane fade" id="pills-gleave">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">แจ้งซ่อมคอมพิวเตอร์</h5>
                                </div>
                            </div>
                            <a href="{{ url('computer/com_staff_calenda') }}" class="list-group-item"> 
                                <i class="fa-solid fa-calendar-days text-secondary"></i>
                                ปฎิทิน
                            </a>
                            <a href="{{ url('computer/com_staff_index') }}" class="list-group-item">  
                                <i class="fa-solid fa-clipboard-list text-info"></i>
                                รายการแจ้งซ่อม
                            </a>

                            <a href="{{ url('computer/com_index') }}" class="list-group-item"> 
                                <i class="fa-solid fa-computer text-danger"></i>
                                ทะเบียนคอมพิวเตอร์
                            </a>

                            <a href="{{ url('computer/com_tech') }}" class="list-group-item">  
                              <i class="fa-solid fa-hammer text-primary"></i>
                              ช่างซ่อมคอมพิวเตอร์
                          </a>
                           
                        </div>
                    </div>

                  


                </div>
            </div>
        </aside>

        <main class="page-content">

            @yield('content')
        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->



    </div>
    <!--********************************** Scripts ***********************************-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    {{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <script src="{{ asset('sky16/js/jquery.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('sky16/js/pace.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    {{-- <script src="{{ asset('sky16/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script> --}}

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullcalendar/lang/th.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--app-->
    <script src="{{ asset('sky16/js/app.js') }}"></script>


    @yield('footer')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();
            $('#example4').DataTable();
            $('#example5').DataTable();
            $('#example_user').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        $(document).ready(function() {
            $('#insert_depForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                // alert('OJJJJOL');
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location =
                                        "{{ url('setting/setting_index') }}";
                                }
                            })
                        }
                    }
                });
            });

            $('#update_depForm').on('submit', function(e) {
                e.preventDefault();

                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'แก้ไขข้อมูลสำเร็จ',
                                text: "You edit data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location =
                                        "{{ url('setting/setting_index') }}";
                                }
                            })
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#insert_depsubForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location =
                                        "{{ url('setting/depsub_index') }}";
                                }
                            })
                        }
                    }
                });
            });

            $('#update_depsubForm').on('submit', function(e) {
                e.preventDefault();

                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'แก้ไขข้อมูลสำเร็จ',
                                text: "You edit data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location =
                                        "{{ url('setting/depsub_index') }}";
                                }
                            })
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#insert_depsubsubForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location =
                                        "{{ url('setting/depsubsub_index') }}";
                                }
                            })
                        }
                    }
                });
            });

            $('#update_depsubsubForm').on('submit', function(e) {
                e.preventDefault();

                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'แก้ไขข้อมูลสำเร็จ',
                                text: "You edit data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location =
                                        "{{ url('setting/depsubsub_index') }}";
                                }
                            })
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#insert_leaderForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "{{ url('setting/leader') }}";
                                }
                            })
                        }
                    }
                });
            });

            $('#insert_leader2Form').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();

                                }
                            })
                        }
                    }
                });
            });

            $('#insert_leadersubForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                    // window.location="{{ url('setting/leader') }}";
                                }
                            })
                        }
                    }
                });
            });

        });

        $(document).ready(function() {
            $('#article_user_id').select2({
                placeholder: "เลือกผู้รับผิดชอบ ",
                allowClear: true
            });
            $('#article_status_id').select2({
                placeholder: "เลือกสถานะ",
                allowClear: true
            });
            $('#article_car_type_id').select2({
                placeholder: "เพิ่มประเภท",
                allowClear: true
            });
            $('#article_brand_id').select2({
                placeholder: "เพิ่มยี่ห้อ",
                allowClear: true
            });
            $('#article_color_id').select2({
                placeholder: "เพิ่มสี",
                allowClear: true
            });
            $('#article_deb_subsub_id').select2({
                placeholder: "หน่วยงาน",
                allowClear: true
            });


            $('#dep').select2({
                placeholder: "กลุ่มงาน",
                allowClear: true
            });
            $('#depsub').select2({
                placeholder: "ฝ่าย/แผนก",
                allowClear: true
            });
            $('#com_repaire_article_id').select2({
                placeholder:"--เลือก--",
                allowClear:true
            });
            $('#com_repaire_tec_id').select2({
                placeholder:"--เลือก--",
                allowClear:true
            });
            $('#com_repaire_tecrepaire_id').select2({
                placeholder:"--เลือก--",
                allowClear:true
            });
            $('#com_repaire_rep_id').select2({
                placeholder:"--เลือก--",
                allowClear:true
            });
            
            $('#team').select2({
                placeholder: "ทีมนำองค์กร",
                allowClear: true
            });
            $('#depsubsubtrue').select2({
                placeholder: "หน่วยงานที่ปฎิบัติจริง",
                allowClear: true
            });
            $('#book_objective').select2({
                placeholder: "วัตถุประสงค์",
                allowClear: true
            });
            $('#book_objective2').select2({
                placeholder: "วัตถุประสงค์",
                allowClear: true
            });
            $('#book_objective3').select2({
                placeholder: "วัตถุประสงค์",
                allowClear: true
            });
            $('#book_objective4').select2({
                placeholder: "วัตถุประสงค์",
                allowClear: true
            });
            $('#book_objective5').select2({
                placeholder: "วัตถุประสงค์",
                allowClear: true
            });
            $('#org_team_id').select2({
                placeholder: "ทีมนำองค์กร",
                allowClear: true
            });
        });

        $(document).on('click', '.edit_line', function() {
            var line_token_id = $(this).val();
            // alert(line_token_id);
            $('#linetokenModal').modal('show');
            $.ajax({
                type: "GET",
                url: "{{ url('setting/line_token_edit') }}" + '/' + line_token_id,
                success: function(data) {
                    console.log(data.line_token.line_token_name);
                    $('#line_token_name').val(data.line_token.line_token_name)
                    $('#line_token_code').val(data.line_token.line_token_code)
                    $('#line_token_id').val(data.line_token.line_token_id)
                },
            });
        });

        $(document).ready(function() {
            $('#insert_lineForm').on('submit', function(e) {
                e.preventDefault();

                var form = this;
                //   alert('OJJJJOL');
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'แก้ไขข้อมูลสำเร็จ',
                                text: "You Update data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    }
                });
            });

            $('#insert_permissForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "{{ url('setting/permiss') }}";
                                }
                            })
                        }
                    }
                });
            });
            $('#update_infoorgForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {

                        } else {
                            Swal.fire({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177',
                                confirmButtonText: 'เรียบร้อย'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>