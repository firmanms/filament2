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

  <!-- Favicons -->
  <link href="{{ url('storage/'.$profil->favicon .'') }}" rel="icon">
  <link href="{{ url('storage/'.$profil->favicon .'') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/subportal/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/subportal/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/subportal/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/subportal/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/subportal/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/subportal/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!--summernote-->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


  <!--owl-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!--youtube-->
<link href="{{ asset('frontend/subportal/assets/vendor/youtube/player/packages/icons/css/icons.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/subportal/assets/vendor/youtube/player/css/youtube-video-player.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('frontend/subportal/assets/vendor/youtube/player/js/youtube-video-player.jquery.js') }}"></script>
<link href="{{ asset('frontend/subportal/assets/vendor/youtube/player/packages/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('frontend/subportal/assets/vendor/youtube/player/packages/perfect-scrollbar/jquery.mousewheel.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/subportal/assets/vendor/youtube/player/packages/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/subportal/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url($profil->slug) }}" class="logo d-flex align-items-center">
        <img src="{{ url('storage/'.$profil->logo .'') }}" alt="">
        <span></span>
      </a>

      <nav id="navbar" class="navbar">
        @if(is_array($menus) && count($menus) > 0)
        <ul>
            @foreach($menus as $nodeId => $node)
            @if(isset($node['children']) && is_array($node['children']) && count($node['children']) > 0)
                <li class="dropdown has-dropdown">
                <a href="#"><span>{{ $node['label'] }}</span> <i class="bi bi-chevron-down"></i></a>
                <ul class="dd-box-shadow">
                    @foreach($node['children'] as $childId => $child)
                    <li><a href="{{ url($profil->slug.'/'.$child['link']) }}">{{ $child['label'] }}</a></li>
                    @endforeach
                </ul>
                </li>
            @else
                <li><a href="{{url($profil->slug.'/'.$node['link']) }}">{{ $node['label'] }}</a></li>
            @endif
            @endforeach
        </ul>
        @else
        <p>No data available</p>
        @endif

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


      <!-- .navbar -->

    </div>
  </header><!-- End Header -->


  {{-- <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up" data-aos-delay="400">Selamat Datang Di Website Resmi</h2>
          <h1 data-aos="fade-up"><b><font color="#fc2a58">RSUD</font> {{ $banners->judul }}</b></h1>
          <h3 data-aos="fade-up" data-aos-delay="400">{{ $banners->subjudul }}</h3><br>
          {{-- <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Selengkapnya</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div> --}}
        {{-- </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ url('storage/'.$banners->gambar .'') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero --> --}}

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{ url($profil->slug) }}" class="logo d-flex align-items-center">
              <img src="{{ url('storage/'.$profil->logo .'') }}" alt="">
              <!-- <span>FlexStart</span> -->
            </a>
            <p>{!! $profil->maintask !!}</p>
            <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p> -->
            <div class="social-links mt-3">
              <a href="{{ $profil->tw }}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{ $profil->fb }}" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="{{ $profil->ig }}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.youtube.com/channel/{{ $profil->channel_yt }}" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>
          </div>

        <!--   <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div> -->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <strong><span>Diskominfo Kabupaten Bandung</span></strong>
      </div>
       <div class="credits">
        Designed by <a href="https://bootstrapmade.com/flexstart-bootstrap-startup-template/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/subportal/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/subportal/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/subportal/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/subportal/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/subportal/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/subportal/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/subportal/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- GPR Kominfo -->
  <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
  <script src="https://apps.elfsight.com/p/platform.js" defer=""></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/subportal/assets/js/main.js') }}"></script>
  <script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    mouseDrag:true,
    autoplay:true,
    animateOut: 'slideOutUp',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

  </script>
  <!--youtube-->
  <script>
    var ytnya = "<?php echo $profil->channel_yt; ?>";
		if (window.top !== window.self) {
			document.write = "";
			window.top.location = window.self.location;
			setTimeout(function(){
				document.body.innerHTML='';
			},0);

			window.self.onload=function(evt) {
				document.body.innerHTML='';
			};
		}else {
			$(document).ready(function() {
				$("#playlist").youtube_video({
					playlist: false,
					channel: ytnya,
					user: false,
					videos: false,
					max_results: 10,
					pagination: true,
					continuous: true,
					first_video: 0,
					show_playlist: 'auto',
					playlist_type: 'vertical',
					show_channel_in_playlist:true,
					show_channel_in_title: true,
					width: false,
					show_annotations: false,
					now_playing_text: 'Now Playing',
					load_more_text: 'Load More',
					autoplay: false,
					force_hd: false,
					hide_youtube_logo: false,
					play_control: true,
					time_indicator: 'full',
					volume_control: true,
					share_control: true,
					fwd_bck_control: true,
					youtube_link_control: true,
					fullscreen_control: true,
					playlist_toggle_control:true,
					volume: false,
					show_controls_on_load: true,
					show_controls_on_pause: true,
					show_controls_on_play: false,
					player_vars: {},
					colors: {
						'controls_bg': 'rgba(0,0,0,.9)'
					},
					require_cookie_accept: false
				});
				$("#playlist-horizontal").youtube_video({
					playlist: false,
					channel: ytnya,
					user: false,
					videos: false,
					max_results: 10,
					pagination: true,
					continuous: true,
					first_video: 0,
					show_playlist: 'auto',
					playlist_type: 'horizontal',
					show_channel_in_playlist:true,
					show_channel_in_title: true,
					width: false,
					show_annotations: false,
					now_playing_text: 'Now Playing',
					load_more_text: 'Load More',
					autoplay: false,
					force_hd: false,
					hide_youtube_logo: true,
					play_control: true,
					time_indicator: 'full',
					volume_control: true,
					share_control: false,
					fwd_bck_control: true,
					youtube_link_control: false,
					fullscreen_control: true,
					playlist_toggle_control:true,
					volume: false,
					show_controls_on_load: true,
					show_controls_on_pause: true,
					show_controls_on_play: false,
					player_vars: {},
					colors: {
						'controls_bg': 'rgba(0,0,0,.9)'
					},
					require_cookie_accept: false
				});

			});
		}
	</script>
  <!--end youtube-->
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var a = "<?php echo $profil->office_whatsapp; ?>";
      	var b = "<?php echo $profil->office_telp; ?>";
        var options = {
            whatsapp: a, // Ganti dengan nomor WhatsApp Anda
            call: b, // Ganti dengan nomor WhatsApp And
            call_to_action: "Hubungi kami", // Pesan yang akan muncul di tombol
            position: "left", // Posisi tombol (left atau right)
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<!-- /GetButton.io widget -->
</body>

</html>
