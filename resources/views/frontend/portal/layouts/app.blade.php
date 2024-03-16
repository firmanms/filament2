<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')">
  <meta property="og:title" content="@yield('ogtitle')"/>
  <meta property="og:description" content="@yield('description')"/>
  <meta property="og:site_name" content="@yield('site_name')"/>
  <meta property="og:image" content="@yield('image')"/>
  <meta content="@yield('desc')" name="description">
  <meta content="@yield('keywords')" name="keywords">

  <!-- Favicons -->
  <link href="@yield('image')" rel="icon">
  <link href="@yield('image')" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/portal/assets/vendor/bootstrap/css/bootstrap.min.css ') }}" rel="stylesheet">
  <link href="{{ asset('frontend/portal/assets/vendor/bootstrap-icons/bootstrap-icons.css ') }}" rel="stylesheet">
  <link href="{{ asset('frontend/portal/assets/vendor/aos/aos.css ') }}" rel="stylesheet">
  <link href="{{ asset('frontend/portal/assets/vendor/glightbox/css/glightbox.min.css ') }}" rel="stylesheet">
  <link href="{{ asset('frontend/portal/assets/vendor/swiper/swiper-bundle.min.css ') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/portal/assets/css/main.css ') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="https://firmanms.my.id/js/leaflet.ajax.js"></script>
  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2024 with Bootstrap v5.3.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{$profil->office_email}}">{{$profil->office_email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{$profil->office_whatsapp}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="{{$profil->tw}}" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{$profil->fb}}" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{$profil->ig}}" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="{{$profil->tiktok}}" class="linkedin"><i class="bi bi-tiktok"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ route('homess') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{ url('storage/'.$profil->logo .'') }}" alt="">
        {{-- <h1>Impact<span>.</span></h1> --}}
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#team">Puskesmas</a></li>
          <li><a href="#status">Status</a></li>
          <li><a href="#akreditasi">Akreditasi</a></li>
          <li><a href="#faq">Faq</a></li>
          <li><a href="#recent-posts">Blog</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          {{-- <li><a href="#contact">Contact</a></li> --}}
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

    @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 col-md-12 footer-info">
          <a href="{{ route('homess') }}" class="logo d-flex align-items-center">
            <span><img src="{{ url('storage/'.$profil->logo .'') }}" alt=""></span>
          </a>
          <p>{!!$profil->overview!!}</p>
          <div class="social-links d-flex mt-4">
            <a href="{{$profil->tw}}" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="{{$profil->fb}}" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{{$profil->ig}}" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{{$profil->tiktok}}" class="tiktok"><i class="bi bi-tiktok"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Menu</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#team">Puskesmas</a></li>
            <li><a href="#status">Status</a></li>
            <li><a href="#akreditasi">Akreditasi</a></li>
            <li><a href="#faq">Faq</a></li>
            <li><a href="#recent-posts">Blog</a></li>
          </ul>
        </div>


        <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak</h4>
          <p>
            {{$profil->office_address}}<br>
            <strong>Whatsapp:</strong> {{$profil->office_whatsapp}}<br>
            <strong>Phone:</strong> {{$profil->office_telp}}<br>
            <strong>Email:</strong> {{$profil->office_email}}<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Diskominfo </span></strong>Kabupaten Bandung
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/portal/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/portal/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('frontend/portal/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('frontend/portal/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('frontend/portal/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/portal/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('frontend/portal/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/portal/assets/js/main.js')}}"></script>

</body>

</html>
