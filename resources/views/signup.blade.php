<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>DULUTH HEALTH CARE SYSTEMS</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/themify.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets2/css/animate.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/style.css">
    <link id="color" rel="stylesheet" href="../assets2/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets2/css/responsive.css">
  </head>
  <body>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- login page start-->
        <div class="authentication-main">
          <div class="row">
            <div class="col-md-12">
              <div class="auth-innerright">
                <div class="authentication-box">
                  <div class="card-body p-0">
                    <div class="cont text-center s--signup">
                      <div>
                        <form class="theme-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4>DULUTH HEALTH CARE SYSTEMS</h4>
                            <h6>Login</h6>

                            <div class="form-group ">
                                {{-- <label class="col-form-label pt-0">Email</label> --}}
                                <input class="form-control" placeholder="Enter Your Email..." type="text" name="email" required>
                            </div>

                            <div class="form-group">
                                {{-- <label class="col-form-label">Password</label> --}}
                                <input class="form-control" placeholder="Enter Your Password..." type="password" name="password" required>
                            </div>

                            <div class="checkbox p-0">
                                <input id="checkbox1" type="checkbox" name="remember">
                                <label for="checkbox1">Remember me</label>
                            </div>

                            <div class="form-group form-row mt-3 mb-0">
                                <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                            </div>
                            <div class="login-divider " style=""></div>
                            <div class="login-divider " style=""></div>

                        </form>

                      </div>
                      <div class="sub-cont">
                        <div class="img">
                          <div class="img__text m--up">
                            <h2>New here?</h2>
                            <p>Sign up and discover DULUTH HEALTH CARE SYSTEMS!</p>
                          </div>
                          <div class="img__text m--in">
                            <h2>One of us?</h2>
                            <p>If you already has an account, just sign in. We've missed you!</p>
                          </div>
                          <div class="img__btn"><span class="m--up">Sign up</span><span class="m--in">Sign in</span></div>
                        </div>
                        <div>
                            <form class="theme-form" method="POST" action="{{ route('sign_up') }}">
                                @csrf <!-- CSRF token for security -->
                                <h4 class="text-center">Register Yourself</h4>

                                <!-- Display Success and Error Messages -->
                                @if(session('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger text-center">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                    <div class="row">
                                        <div class="form-group col-md-12">

                                            <select name="role" id="role" class="form-control">
                                                <option value="" selected>--Select Role--</option>
                                                <option value="Nurse" {{ old('role') == 'Nurse' ? 'selected' : '' }}>Nurse</option>
                                                <option value="Caregiver" {{ old('role') == 'Caregiver' ? 'selected' : '' }}>Caregiver</option>
                                                <option value="Client" {{ old('role') == 'Client' ? 'selected' : '' }}>Client</option>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" name="name" placeholder="First Name" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                        </div>


                                <div class="form-group col-md-12">
                                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                {{-- <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                </div> --}}

                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" type="submit">Sign Up</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-left mt-2 m-l-20">Are you already a user? <a class="btn-link text-capitalize" href="{{route('login')}}">Login</a></div>
                                    </div>

                            </div>
                            </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- login page end-->
      </div>
    </div>
    <!-- latest jquery-->
    <script src="../assets2/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets2/js/bootstrap/popper.min.js"></script>
    <script src="../assets2/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="../assets2/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets2/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets2/js/sidebar-menu.js"></script>
    <script src="../assets2/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets2/js/login.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets2/js/script.js"></script>
    <script src="../assets2/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>
