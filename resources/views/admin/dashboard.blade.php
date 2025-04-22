@extends('admin.adminmaster')
@section('title')
Dashboard
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 main-header">
                    <h2>Welcome Back, {{ Auth::user()->name }}</h2>
                    <h6>{{ Auth::user()->type }}</h6>


                </div>
                <div class="col-lg-6 breadcrumb-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="pe-7s-home"></i></a></li>
                        {{-- <li class="breadcrumb-item">Dashboard</li> --}}
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 xl-100">
                <div class="row">
                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-primary o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <!-- SVG for Curved Line -->
                                        <svg width="100%" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF" stroke-width="2">
                                            <!-- Calendar outline -->
                                            <rect x="10" y="20" width="80" height="70" rx="5" ry="5" fill="none" />

                                            <!-- Calendar header bar -->
                                            <line x1="10" y1="35" x2="90" y2="35" />

                                            <!-- Binding rings -->
                                            <line x1="25" y1="10" x2="25" y2="25" />
                                            <line x1="75" y1="10" x2="75" y2="25" />

                                            <!-- Calendar grid dots -->
                                            <circle cx="30" cy="45" r="2" />
                                            <circle cx="50" cy="45" r="2" />
                                            <circle cx="70" cy="45" r="2" />
                                            <circle cx="30" cy="60" r="2" />
                                            <circle cx="50" cy="60" r="2" />
                                            <circle cx="70" cy="60" r="2" />
                                            <circle cx="30" cy="75" r="2" />
                                            <circle cx="50" cy="75" r="2" />
                                            <circle cx="70" cy="75" r="2" />
                                          </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Appointments<span class="pull-right">111</span></h5>
                                    </div>
                                </div>
                                <span class="tag-hover-effect"><span class="dots-group"><span
                                    class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                    class="dots dots3 dot-small"></span><span
                                    class="dots dots4 dot-medium"></span><span
                                    class="dots dots5 dot-small"></span><span
                                    class="dots dots6 dot-small"></span><span
                                    class="dots dots7 dot-small-semi"></span><span
                                    class="dots dots8 dot-small-semi"></span><span
                                    class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-warning o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <svg width="100%" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF" stroke-width="2">
                                            <!-- Main document -->
                                            <rect x="20" y="20" width="50" height="60" rx="5" ry="5" />

                                            <!-- Folded corner -->
                                            <polyline points="70,20 70,40 50,40" />

                                            <!-- Lines inside the document -->
                                            <line x1="30" y1="50" x2="60" y2="50" />
                                            <line x1="30" y1="60" x2="60" y2="60" />
                                            <line x1="30" y1="70" x2="55" y2="70" />

                                            <!-- Second (stacked) document behind -->
                                            <rect x="30" y="10" width="50" height="60" rx="5" ry="5" stroke-opacity="0.4" />
                                          </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Documents<span class="pull-right"> 34534</span></h5>
                                    </div>
                                </div><span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-secondary o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <svg width="100%" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF" stroke-width="2">
                                            <!-- Head -->
                                            <circle cx="50" cy="30" r="12" />

                                            <!-- Body -->
                                            <path d="M35,65 Q50,50 65,65" />
                                            <line x1="50" y1="42" x2="50" y2="65" />

                                            <!-- Shoulders -->
                                            <path d="M25,80 Q50,70 75,80" />

                                            <!-- Left arm -->
                                            <line x1="50" y1="50" x2="35" y2="65" />
                                            <!-- Right arm -->
                                            <line x1="50" y1="50" x2="65" y2="65" />
                                          </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Staff Members<span class="pull-right">4232</span></h5>
                                    </div>
                                </div><span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-info o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <svg width="100%" height="100" viewBox="0 0 100 100"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF" stroke-width="2">

                                     <!-- Center person -->
                                     <circle cx="50" cy="30" r="10" />
                                     <path d="M40,55 Q50,45 60,55" />

                                     <!-- Left person -->
                                     <circle cx="30" cy="35" r="7" />
                                     <path d="M23,55 Q30,47 37,55" />

                                     <!-- Right person -->
                                     <circle cx="70" cy="35" r="7" />
                                     <path d="M63,55 Q70,47 77,55" />

                                     <!-- Group base line -->
                                     <path d="M20,70 Q50,60 80,70" />

                                     <!-- Active status dot (bottom right) -->
                                     <circle cx="85" cy="20" r="5" fill="limegreen" stroke="none" />
                                   </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Active Clients<span class="pull-right">35345</span></h5>
                                    </div>
                                </div><span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- <div class="col-xl-4 xl-50 box-col-12">
                <div class="card gradient-secondary o-hidden monthly-overview">
                    <div class="card-header no-border bg-transparent">
                        <h5>Monthly Overview</h5>
                        <h6 class="mb-0">{{ now()->format('F') }}</h6>
                        <!-- This will dynamically show the current month -->
                        <span class="pull-right right-badge">
                            <span class="badge badge-pill">{{ $ordersThisMonth }}</span>
                            <!-- Display orders done this month -->
                        </span>
                    </div>
                    <div class="card-body p-0">
                        <div class="text-bg"><span>100</span></div>
                        <div class="area-range-apex">
                            <div id="area-range"></div>
                        </div>
                        <span class="overview-dots full-lg-dots">
                            <span class="dots-group">
                                <span class="dots dots1"></span>
                                <span class="dots dots2 dot-small"></span>
                                <span class="dots dots3 dot-small"></span>
                                <span class="dots dots4 dot-medium"></span>
                                <span class="dots dots5 dot-small"></span>
                                <span class="dots dots6 dot-small"></span>
                                <span class="dots dots7 dot-small-semi"></span>
                                <span class="dots dots8 dot-small-semi"></span>
                                <span class="dots dots9 dot-small"></span>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 xl-50 box-col-6">
                <div class="card weather-bg">
                    <div class="card-header no-border bg-transparent">
                        <h5>Todays Activity</h5>
                    </div>
                    <div class="card-body weather-bottom-bg p-0">
                        <div class="cloud"><img src="../assets2/images/cloud.png" alt=""></div>
                        <div class="cloud-rain"></div>
                        <div class="media weather-details"><span class="weather-title"><i
                                    class="fa fa-cart-arrow-down d-block text-right"></i><span>{{$ordersToday}}</span></span>
                            <div class="media-body">
                                <h5>Date</h5><span class="d-block">{{ now()->format('d, M Y') }}</span>
                                <h6 class="mb-0">Customers Joined : {{$newCustomers}} </h6>
                            </div>
                        </div><img class="img-fluid" src="../assets2/images/dashboard/weather-image.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 xl-100 box-col-6">
                <div class="card gradient-primary o-hidden monthly-overview yearly">
                    <div class="card-header no-border bg-transparent">
                        <h5>Yearly Overview</h5>
                        <h6 class="mb-0">{{ now()->format('l') }}</h6> <!-- Show current day of the week -->
                        <span class="pull-right right-badge">
                            <span class="badge badge-pill">{{ $ordersThisYear }} / 100</span>
                            <!-- Display orders done this year -->
                        </span>
                    </div>
                    <div class="card-body p-0">
                        <div class="text-bg"><span>0.5</span></div>
                        <div class="area-range-apex">
                            <div id="area-range-1"></div>
                        </div>
                        <span class="overview-dots full-width-dots">
                            <span class="dots-group">
                                <span class="dots dots1"></span>
                                <span class="dots dots2 dot-small"></span>
                                <span class="dots dots3 dot-small"></span>
                                <span class="dots dots4 dot-medium"></span>
                                <span class="dots dots5 dot-small"></span>
                                <span class="dots dots6 dot-small"></span>
                                <span class="dots dots7 dot-small-semi"></span>
                                <span class="dots dots8 dot-small-semi"></span>
                                <span class="dots dots9 dot-small"></span>
                            </span>
                        </span>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="card">
                  <div class="card-header no-border">
                    <h5>Compliance Monitoring</h5>
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
                        <div class="row">
                            <div class="col-sm-6 col-xl-4 col-lg-4 box-col-4">
                                <div class="card gradient-info o-hidden">
                                  <div class="b-r-4 card-body">
                                    <div class="d-flex static-top-widget">
                                      <div class="align-self-center text-center">
                                        <div class="text-white i" data-feather="check-circle"></div>
                                      </div>
                                      <div class="flex-grow-1"><span class="m-0 text-white">HIPAA Compliance
                                        <p>All systems meet requirements</p>
                                      </span>
                                        <h4 class="mb-0 counter text-white">45631</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-lg-4 box-col-4">
                                <div class="card gradient-success o-hidden">
                                  <div class="b-r-4 card-body">
                                    <div class="d-flex static-top-widget ">
                                      <div class="align-self-center text-center">
                                        <div class="text-white i me-2" data-feather="alert-octagon"></div>
                                      </div>
                                      <div class="flex-grow-1"><span class="m-0 text-white">Document Verification
                                        <p>3 documents need review</p>
                                      </span>
                                        <h4 class="mb-0 counter text-white">45631</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-lg-4 box-col-4">
                                <div class="card gradient-primary o-hidden">
                                  <div class="b-r-4 card-body">
                                    <div class="d-flex static-top-widget">
                                      <div class="align-self-center text-center">
                                        <div class="text-white i" data-feather="file"></div>
                                      </div>
                                      <div class="flex-grow-1"><span class="m-0 text-white">Staff Certifications
                                        <p>All certifications up to date</p>
                                      </span>

                                        <h4 class="mb-0 counter text-white">45631</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>

                  </div>
                </div>
              </div>


        </div></div>
@endsection
