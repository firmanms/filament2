@extends('frontend.portal.layouts.app')

@section('content')

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>{{ $slide->title }}</h2>
          <p>{{ $slide->subtitle }}</p>
          <!-- <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div> -->
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="{{ asset('frontend/portal/assets/img/hero1-img.svg ') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>



    </div>
  </section>
  <!-- End Hero Section -->
<main id="main">


      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Puskesmas</h2>
            <p>Di Kabupaten Bandung</p>
            <div class="search-form">
              <form method="get" action="{{ route('search') }}" class="mt-3" >
                <input type="text" name="search">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
          </div>

          <div class="row gy-4">
            @foreach ($listtenant as $item)
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <a href="{{ url( $item->slug )}}"><img src="{{ url('storage/'.$item->logo .'') }}" class="img-fluid" alt="">
                <h4>{{$item->name}}</h4>
                <span>{{$item->status}}-{{$item->akreditasi}}</span></a>
                <div class="social">
                  <a href="{{$item->ig}}"><i class="bi bi-instagram"></i></a>
                  <a href="{{$item->fb}}"><i class="bi bi-facebook"></i></a>
                  <a href="{{$item->tiktok}}"><i class="bi bi-tiktok"></i></a>
                  <a href="https://wa.me/{{$item->office_whatsapp}}"><i class="bi bi-whatsapp"></i></a>
                </div>
              </div>
            </div><!-- End Team Member -->
            <!--<div class="col-xl-2 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                  <img src="{{ url('storage/'.$item->logo .'') }}" width="100%" class="img-fluid" alt="">
                  <h4>Sarah Jhinson</h4>
                  <span>Marketing</span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div> End Team Member -->
            @endforeach


          </div>

        </div>
      </section><!-- End Our Team Section -->

      <!-- ======= Stats Counter Section ======= -->
    <section id="status" class="stats-counter">
        <div class="container" data-aos="fade-up">

          <div class="row gy-4 align-items-center">

            <div class="col-lg-8">
              <img src="{{ asset('frontend/portal/assets/img/stats-img.svg ') }}" alt="" class="img-fluid">
            </div>

            <div class="col-lg-4">

              <div class="stats-item d-flex align-items-center">
                <p><strong>STATUS PUSKESMAS</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_status1 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Dengan Tempat Perawatan (DTP)</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_status2 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Tidak Dengan Tempat Perawatan (NON DTP)</strong></p>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </div>
      </section><!-- End Stats Counter Section -->


      <!-- ======= Stats Counter Section ======= -->
      <section id="akreditasi" class="stats-counter">
        <div class="container" data-aos="fade-up">

          <div class="row gy-4 align-items-center">

            <div class="col-lg-8">
              <img src="{{ asset('frontend/portal/assets/img/stats1-img.svg ') }}" alt="" class="img-fluid">
            </div>

            <div class="col-lg-4">

              <div class="stats-item d-flex align-items-center">
                <p><strong>AKREDITASI PUSKESMAS</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_akre1 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Paripurna</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_akre2 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Utama</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_akre3 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Madya</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_akre4 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Dasar</strong></p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $c_akre5 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Belum Akreditasi</strong></p>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </div>
      </section><!-- End Stats Counter Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

          <div class="row gy-4">

            <div class="col-lg-4">
              <div class="content px-xl-5">
                <h3>Frequently Asked <strong>Questions</strong></h3>
                <p>
                  Pertanyaan yang sering ditanyakan
                </p>
              </div>
            </div>

            <div class="col-lg-8">

              <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                @foreach ( $faq as $item )
                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{!! $item->id !!}">
                        {!! $item->question !!}
                    </button>
                  </h3>
                  <div id="faq-content-{!! $item->id !!}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                        {!! $item->answer !!}
                    </div>
                  </div>
                </div><!-- # Faq item-->
                @endforeach

              </div>

            </div>
          </div>

        </div>
      </section><!-- End Frequently Asked Questions Section -->

      <!-- ======= Recent Blog Posts Section ======= -->
      <section id="recent-posts" class="recent-posts sections-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Artikel/Berita Terbaru</h2>
            <p>Artikel atau Berita terbaru dari Puskesmas di Kabupaten Bandung</p>
          </div>

          <div class="row gy-4">

            @foreach ($posts as $item)
            <div class="col-xl-4 col-md-6">
              <article>

                <div class="post-img">
                  <img src="{{ url('storage/'.$item->image .'') }}" alt="" class="img-fluid">
                </div>

                <p class="post-category">{{ $item->categories->name }}</p>

                <h2 class="title">
                  <a href="{{ url('/post/'.$item->slug.'') }}">{{ $item->title }}</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img src="{{ url('storage/'.$profil->logo .'') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author"><a href="{{ url( $item->team->slug )}}">{{ $item->team->name }}</a></p>
                    <p class="post-date">
                      <time datetime="{{ $item->published }}">{!! $newDate = date("d-m-Y", strtotime($item->published)) !!}</time>
                    </p>
                  </div>
                </div>

              </article>
            </div><!-- End post list item -->
            @endforeach

          </div><!-- End recent posts list -->

        </div>
      </section><!-- End Recent Blog Posts Section -->

      <!-- ======= Call To Action Section ======= -->
      <section id="team" class="team">
        <div class="container" data-aos="fade-up">

          <div class="row gy-4">
            <div id='map' style='width: 100%; height: 500px;'></div>
                                      <script>
                                          var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                              id: 'mapbox/streets-v11'
                                          });

                                          var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                              id: 'mapbox/satellite-v9'
                                          });


                                          var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png '), {
                                              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                          });

                                          var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                              id: 'mapbox/dark-v10'
                                          });
                                          var map = L.map('map', {
                                              center: [-7.066335,107.5366259],
                                              zoom: 10.47,
                                              layers: [peta3]
                                          });
                                          var baseMaps = {
                                              "Light": peta1,
                                              "Satelite": peta2,
                                              "Streets": peta3,
                                              "Dark": peta4,
                                          };
                                          L.control.layers(baseMaps).addTo(map);
                                          // var map = L.map('map').setView([ -7.066335,107.5366259], 10.40);
                                          //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png ') }}', {
                                          //     maxZoom: 19,
                                          //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                          // }).addTo(map);

                                          function popUp(f,l){
                                              var out = [];
                                              if (f.properties){
                                                  for(key in f.properties){
                                                      out.push(key+": "+f.properties[key]);
                                                  }
                                                      l.bindPopup(out.join("<br />"));
                                              }
                                          }
                                              var jsonTest = new L.GeoJSON.AJAX(["https://firmanms.my.id/img/us_states2.geojson"],{onEachFeature:popUp}).addTo(map);
                                              var jsonTest = new L.GeoJSON.AJAX(["https://firmanms.my.id/img/puskesmas.geojson"],{onEachFeature:popUp}).addTo(map);
                                      </script>
          </div>
        </div>
      </section>
      <!-- End Call To Action Section -->

      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="zoom-out">

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
            @foreach ($related as $item)
              <div class="swiper-slide"><a href="{{ $item->url}}"><img src="{{ url('storage/'.$item->image .'') }}" class="img-fluid" alt=""></a></div>
            @endforeach
            </div>
          </div>

        </div>
      </section><!-- End Clients Section -->
</main><!-- End #main -->
@endsection
@section('title', $profil->name )
@section('ogtitle', $profil->name )
@section('description', $profil->name )
@section('site_name', $profil->name )
@section('image',  url('storage/'.$profil->favicon .'') )
@section('desc', $profil->seo_desc )
@section('keyword', $profil->seo_keywords )
