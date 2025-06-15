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
    .card {
        max-width: 650px; /* Set maximum width */
        margin: 0 auto; /* Center the card */
    }
    .form-control, .form-select {
        border-radius: 8px !important;
    }
    .input-group-text {
        border-radius: 8px 0 0 8px !important;
    }
    .btn-outline-primary {
        border-radius: 0 8px 8px 0 !important;
    }
</style>

  </head>
  <body>
 <div class="container-fluid">
    <div class="row min-vh-100 align-items-center justify-content-center" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="col-lg-6 col-xl-5">  <!-- Increased width -->
            <div class="card shadow-lg border-0 overflow-hidden" style="border-radius: 15px;">  <!-- Added rounded corners -->
                <div class="card-header bg-primary text-white py-4" style="border-bottom: 0;">
                    <div class="text-center mb-3">
                        <a href="{{ route('index') }}" class="d-inline-block">
                            <img src="{{asset('assets/img/logo/logo.png')}}" alt="Duluth" style="height: 70px; width: auto; max-width: 220px; object-fit: contain; filter: brightness(0) invert(1);">
                        </a>
                    </div>
                    <h3 class="text-center mb-0" style="font-size: 1.75rem;">Create Your Account</h3>
                    <p class="text-center opacity-75 mb-0" style="font-size: 1.1rem;">Join our community today</p>
                </div>

                <!-- Card Body -->
             <div class="card-body px-5 py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('signup') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Name Row -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control py-2 @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name') }}"
                       placeholder="John" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Contact Info Row -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-envelope-fill text-primary"></i>
                    </span>
                    <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}"
                           placeholder="your@email.com" required>
                </div>
                @error('email')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-phone-fill text-primary"></i>
                    </span>
                    <input type="tel" class="form-control py-2 @error('phone') is-invalid @enderror"
                           id="phone" name="phone" value="{{ old('phone') }}"
                           placeholder="+1 (123) 456-7890" required>
                </div>
                @error('phone')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Password Row -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-lock-fill text-primary"></i>
                    </span>
                    <input type="password" class="form-control py-2 @error('password') is-invalid @enderror"
                           id="password" name="password" placeholder="Create password" required>
                    <button class="btn btn-outline-primary toggle-password" type="button">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-text">Min 8 characters with letters, numbers & symbols</div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-lock-fill text-primary"></i>
                    </span>
                    <input type="password" class="form-control py-2"
                           id="password_confirmation" name="password_confirmation"
                           placeholder="Confirm password" required>
                    <button class="btn btn-outline-primary toggle-password" type="button" data-target="password_confirmation">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Role and Terms Row -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="role" class="form-label">I am a</label>
                <select class="form-select py-2 @error('role') is-invalid @enderror"
                        id="role" name="role" required>
                    <option value="" selected disabled>Select your role</option>
                    <option value="caregiver" @selected(old('role') == 'caregiver')>Caregiver</option>
                    <option value="nurse" @selected(old('role') == 'nurse')>Nurse</option>>
                </select>
                @error('role')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 d-flex align-items-end">
                <div class="form-check w-100">
                    <input class="form-check-input @error('terms') is-invalid @enderror"
                           type="checkbox" id="terms" name="terms"
                           @checked(old('terms')) required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#" class="text-decoration-none">Terms</a>
                    </label>
                    @error('terms')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-3 mb-3 fw-bold" style="font-size: 1.1rem;">
            Create Account <i class="bi bi-arrow-right-short ms-2"></i>
        </button>

        <div class="text-center mt-3">
            <p class="mb-0">Already have an account? <a href="{{ route('admin_login') }}" class="text-decoration-none fw-bold">Log in</a></p>
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
            const targetId = this.getAttribute('data-target') || 'password';
            const passwordInput = document.getElementById(targetId);
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
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
