<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Duluth</title>
    <meta name="author" content="Themeholy">
    <meta name="description" content="Sassa - Saas Startup Multipurpose HTML Template">
    <meta name="keywords" content="Sassa - Saas Startup Multipurpose HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">

    <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
       /* In your CSS file or <style> tag in head */
:root {
  --header-height: 80px; /* Adjust based on your actual header height */
}

body {
  padding-top: var(--header-height);
}

.fixed-header {
  position: fixed;
  top: 0;
  width: 100%;
  height: var(--header-height);
  z-index: 1000; /* Ensure header stays above other content */
  background: #fff; /* Match your header background */
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* For your specific content section */
main {
  position: relative;
  z-index: 1; /* Lower than header */
}
    </style>

</head>
<body>
       @include('layouts.header')

    @if(!request()->is('/'))
        @include('layouts.default_header')
    @endif

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
  <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
  <!-- Swiper Slider -->
  <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <!-- Magnific Popup -->
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <!-- Counter Up -->
  <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
  <!-- Circle Progress -->
  <script src="{{ asset('assets/js/circle-progress.js') }}"></script>
  <!-- Range Slider -->
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <!-- Imagesloaded -->
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <!-- Isotope -->
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
  <!-- Tilt.jquery -->
  <script src="{{ asset('assets/js/tilt.jquery.min.js') }}"></script>
  <!-- Nice-select -->
  <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
  <!-- WOW -->
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
@yield('scripts')
</body>
</html>

