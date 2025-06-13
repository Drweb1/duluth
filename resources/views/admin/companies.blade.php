<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>DULUTH HEALTH CARE SYSTEMS - @yield('title')</title>
    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/themify.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/animate.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/pe7-icon.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets2/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/datatables.css') }}">
    <style>
        .folder-card {
            transition: all 0.3s ease;
            border: 1px solid #dee2e6;
            background-color: #fff;
            border-radius: 10px !important;
        }

        .folder-card:hover {
            border-color: #0d6efd !important;
            /* Bootstrap Primary Color */
            box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.15);
            cursor: pointer;
            transform: scale(1.03);
        }
    </style>
    @yield('style')
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="typewriter">
            <h1>DULUTH HEALTH CARE SYSTEMS LOADING..</h1>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right">
                <div class="main-header-left text-center">
                    <div class="logo-wrapper">
                        <a href="{{ route('index') }}" style="text-decoration: none;">
                            <h2
                                style="font-weight: bolder; display: flex; align-items: center; gap: 0.2rem; color: inherit;">
                                <span style="font-size: 5.75rem; line-height: 1; color: skyblue;">●</span>
                                DHCS
                            </h2>
                        </a>
                    </div>
                </div>
                <div class="mobile-sidebar">
                    <div class="media-body text-right switch-sm">
                        <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle"
                                data-feather="align-center"></i></label>
                    </div>
                </div>
                <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar"></i></div>
                <div class="nav-right col pull-right right-menu">
                    <ul class="nav-menus">
                        <li></li>
                        <li></li>
                        <li class="onhover-dropdown"> <span class="d-flex user-header"><img class="img-fluid"
                                    src="{{ asset('assets/img/user.png') }}" alt=""></span>
                            <ul class="onhover-show-div profile-dropdown">
                                <li class="gradient-primary">
                                    <h5 class="f-w-600 mb-0">{{ Auth::user()->name }}</h5><span>{{ Auth::user()->type
                                        }}</span>
                                </li>
                                <li><i data-feather="user"> </i>Profile</li>
                                {{-- <li><i data-feather="message-square"> </i>Inbox</li>
                                <li><i data-feather="file-text"> </i>Taskboard</li> --}}
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="text-dark" href="#"
                                        onclick="document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
        <div class="page-body-wrapper">

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">

                            <div class="col-lg-6 main-header">
                                <h2>View<span>Companies</span></h2>
                                <h6 class="mb-0">Manage Your Companies</h6>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="row">

                    <div class="col-xl-12 xl-100 box-col-12">
                        <div class="card">
                            <div class="card-header no-border">
                                <h5>Top Companies</h5>
                                <ul class="creative-dots">
                                    <li class="bg-primary big-dot"></li>
                                    <li class="bg-secondary semi-big-dot"></li>
                                    <li class="bg-warning medium-dot"></li>
                                    <li class="bg-info semi-medium-dot"></li>
                                    <li class="bg-secondary semi-small-dot"></li>
                                    <li class="bg-primary small-dot"></li>
                                </ul>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-gear fa fa-spin font-primary"></i></li>
                                        <li><i class="view-html fa fa-code font-primary"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                                        <li><i class="icofont icofont-error close-card font-primary"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div
                                    class="activity-table table-responsive recent-table selling-product custom-scrollbar">
                                    <table class="table table-bordernone">
                                        <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Owner</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($companies as $company)
                                            {{-- @dd($company); --}}
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="company-icon text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                                            style="width: 40px; height: 40px; font-size: 14px; font-weight: 600 ;margin-right:5px;
       background-color: {{ '#' . substr(md5($company->name), 0, 6) }};
       color: {{ (hexdec(substr(md5($company->name), 0, 6)) > 0xffffff/2) ? '#fff' : '#000' }};">
                                                            @php
                                                            $words = explode(' ', $company->name);
                                                            $initials = '';
                                                            foreach($words as $word) {
                                                            $initials .= strtoupper(substr($word, 0, 1));
                                                            }
                                                            $initials = substr($initials, 0, 2);
                                                            @endphp
                                                            {{ $initials }}
                                                        </div>
                                                        <h5 class="default-text mb-0 f-w-700 f-18">{{ $company->name }}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge rounded-pill recent-badge f-12">{{
                                                        $company->owner }}</span>
                                                </td>
                                                <td class="f-w-700">

                                                    {{ $company->address ?? ' '}}
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge rounded-pill status-badge {{ $company->status === 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ $company->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- <span class="badge rounded-pill recent-badge">
                                                        <i data-feather="more-horizontal"></i>
                                                    </span> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 footer-copyright">
                    <p class="mb-0">Copyright © 2021 Duluth. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right mb-0">Hand-crafted & made with<i class="fa fa-heart"></i></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- latest jquery-->
    <script src="{{ asset('assets2/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap/bootstrap.js') }}"></script>
    <!-- Feather icon js-->
    <script src="{{ asset('assets2/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets2/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets2/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets2/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets2/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets2/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets2/js/chat-menu.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets2/js/script.js') }}"></script>
    {{-- <script src="{{ asset('assets2/js/theme-customizer/customizer.js') }}"></script> --}}
    <script src="{{asset('assets2/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('assets2/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets2/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets2/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('.basic').DataTable();
    });

    </script>
