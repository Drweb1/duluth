<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Tradeline Envy  -Login</title>
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
    .card {
        border: none;
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        border-color: #86b7fe;
    }
    .toggle-password {
        cursor: pointer;
    }
    .toggle-password:hover {
        background-color: #e9ecef;
    }
    .input-group-text {
        transition: all 0.3s;
    }
</style>

  </head>
  <body>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
   <div class="container-fluid">
    <div class="row min-vh-100 align-items-center justify-content-center" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="col-lg-4 col-md-8 col-sm-10">
            <div class="card shadow-lg border-0 overflow-hidden">
                <div class="card-header bg-primary text-white py-4" style="border-bottom: 0;">
                    <div class="text-center mb-3">
                        <a href="{{ route('index') }}" class="d-inline-block">
                            <img src="{{asset('assets/img/logo/logo.png')}}" alt="Duluth" style="height: 60px; width: auto; max-width: 200px; object-fit: contain; filter: brightness(0) invert(1);">
                        </a>
                    </div>
                    <h3 class="text-center mb-0">Welcome Back</h3>
                    <p class="text-center opacity-75 mb-0">Please login to your account</p>
                </div>

                <!-- Card Body -->
                <div class="card-body px-5 py-4">
                    <!-- Display Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Display Login Error Message -->
                    @if(session('login_msg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('login_msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin_login') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-envelope-fill text-primary"></i>
                                </span>
                                <input type="email" class="form-control py-2" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-lock-fill text-primary"></i>
                                </span>
                                <input type="password" class="form-control py-2" id="password" name="password" placeholder="Enter your password" required>
                                <button class="btn btn-outline-primary toggle-password" type="button">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="text-decoration-none">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3 fw-bold">
                            Login <i class="bi bi-arrow-right-short"></i>
                        </button>

                        <div class="text-center mt-3">
                            <p class="mb-0">Don't have an account? <a href="#" class="text-decoration-none">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const passwordInput = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye-fill');
                icon.classList.add('bi-eye-slash-fill');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash-fill');
                icon.classList.add('bi-eye-fill');
            }
        });
    });
</script>
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
