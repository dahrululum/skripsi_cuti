<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIGANAK :: DP3ACSKB Provinsi Kepulauan Bangka Belitung</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
      <!-- Vendor CSS Files -->
      <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> 
{{--       
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
     --}}
    

</head>
<body>
    
    <section id="hero" class="hero">
        <div class="container text-center">
          <div class="row">
            <div class="col-md-12">
              <a class="hero-brand" href="#" title="Home"><img alt="SiGanak" src="{{ asset('images/logobabel.png') }}"></a>
            </div>
          </div>
    
          <div class="col-md-12">
            <h1>
              SI-GANAK
            </h1>
    
            <p class="tagline">
             Sistem Informasi Gender dan Anak
            </p>
            <a class="btn btn-full scrollto" href="#about">Mulai</a>
          </div>
        </div>
    
      </section><!-- End Hero -->
      <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div id="logo" class="me-auto">
        <a href="#"><img src="{{ asset('images/logo_siganak.png') }}" alt=""></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        @include('layouts.frontend.nav')
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        
      </div>
    </div>
  </header><!-- End Header -->
  <main id="main">
    @yield('content')
    {{-- @include('site.section_about')
    <!-- ======= Features Section ======= -->
    @include('site.section_publikasi')  
    <!-- ======= Contact Section ======= -->
    @include('site.section_contact')  --}}
  </main>
  

  
  @include('layouts.frontend.footer') 
</body>
{{-- <body class="layout-top-nav">

    <!-- wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.frontend.nav')
        <!-- /.navbar -->

       
        <!-- Content Wrapper. Contains page content -->
        @include('layouts.frontend.content')
        <!-- /.content-wrapper -->

       

        <!-- Admin Footer -->
        @include('layouts.frontend.footer')
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('js_footer')

</body> --}}

</html>
