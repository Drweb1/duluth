<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>DULUTH HEALTH CARE SYSTEMS - @yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
    border-color: #0d6efd !important; /* Bootstrap Primary Color */
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
                        <h2 style="font-weight: bolder; display: flex; align-items: center; gap: 0.2rem; color: inherit;">
                          <span style="font-size: 5.75rem; line-height: 1; color: skyblue;">●</span>
                          DHCS
                        </h2>
                      </a>
                </div>
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle" data-feather="align-center"></i></label>
                </div>
            </div>
            <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar"></i></div>
            <div class="nav-right col pull-right right-menu">
                <ul class="nav-menus">
                    <li></li>
                    <li></li>
                    <li class="onhover-dropdown"> <span class="d-flex user-header"><img class="img-fluid" src="{{ asset('assets/img/user.png') }}" alt=""></span>
                        <ul class="onhover-show-div profile-dropdown">
                          <li class="gradient-primary">
                            <h5 class="f-w-600 mb-0">{{ Auth::user()->name }}</h5><span>{{ Auth::user()->type }}</span>
                          </li>
                          <li><i data-feather="user"> </i>Profile</li>
                          {{-- <li><i data-feather="message-square"> </i>Inbox</li>
                          <li><i data-feather="file-text"> </i>Taskboard</li> --}}
                          <li>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                                @csrf
                            </form>
                            <a class="text-dark" href="#" onclick="document.getElementById('logout-form').submit();">
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

      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="iconsidebar-menu">
          <div class="sidebar">
            <ul class="iconMenu-bar custom-scrollbar">
              <li><a class="bar-icons" href="{{route('dashboard')}}"><i class="pe-7s-home"></i><span>Dashboard  </span></a>
              </li>
              <li><a class="bar-icons" href="{{route('schdules')}}"><i class="fa fa-calendar"></i><span>Scheudle  </span></a>
              </li>
              <li><a class="bar-icons" href="{{route('documents')}}"><i class="fa fa-folder"></i><span>Documents  </span></a>
              </li>
              {{-- <li><a class="bar-icons" href="#"><i class="pe-7s-box2"></i><span>Documents</span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li>Items</a></li>
                    <li class="iconbar-header"><a href='{{route('view_items')}}'>Items List</a></li>
                  <li class="iconbar-header"><a href="{{route('import_items')}}">Add Items</a></li>
              </ul>
              </li> --}}
              <li><a class="bar-icons" href="{{route('orders')}}"><i class="fa fa-inbox"></i><span>Messages</span></a>
              </li>
              <li><a class="bar-icons" href="{{route('view-clients')}}"><i class="fa fa-users"></i><span>Client Management</span></a>
              </li>
              {{-- <li><a class="bar-icons" href="{{route('affiliates')}}"><i class="pe-7s-news-paper"></i><span>Affilliates</span></a>
              </li> --}}
            </ul>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <!-- Right sidebar Start-->
        {{-- <div class="right-sidebar" id="right_side_bar">
          <div>
            <div class="container p-0">
              <div class="modal-header p-l-20 p-r-20">
                <div class="col-sm-8 p-0">
                  <h6 class="modal-title font-weight-bold">Contacts Status</h6>
                </div>
                <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
              </div>
            </div>
            <div class="friend-list-search mt-0">
              <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
            </div>
            <div class="p-l-30 p-r-30">
              <div class="chat-box">
                <div class="people-list friend-list">
                  <ul class="list">
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/1.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="about">
                        <div class="name">Vincent Porter</div>
                        <div class="status"> Online</div>
                      </div>
                    </li>
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/2.jpg" alt="">
                      <div class="status-circle away"></div>
                      <div class="about">
                        <div class="name">Ain Chavez</div>
                        <div class="status"> 28 minutes ago</div>
                      </div>
                    </li>
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/8.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="about">
                        <div class="name">Kori Thomas</div>
                        <div class="status"> Online</div>
                      </div>
                    </li>
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/4.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="about">
                        <div class="name">Erica Hughes</div>
                        <div class="status"> Online</div>
                      </div>
                    </li>
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/5.jpg" alt="">
                      <div class="status-circle offline"></div>
                      <div class="about">
                        <div class="name">Ginger Johnston</div>
                        <div class="status"> 2 minutes ago</div>
                      </div>
                    </li>
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/6.jpg" alt="">
                      <div class="status-circle away"></div>
                      <div class="about">
                        <div class="name">Prasanth Anand</div>
                        <div class="status"> 2 hour ago</div>
                      </div>
                    </li>
                    <li class="clearfix"><img class="rounded-small user-image" src="./../assets2/images/user/7.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="about">
                        <div class="name">Hileri Jecno</div>
                        <div class="status"> Online</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- Right sidebar Ends-->

        @yield('content')
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright © 2021 Tradeline Envy. All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand-crafted & made with<i class="fa fa-heart"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
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
     @yield('scripts')
  </body>
</html>
