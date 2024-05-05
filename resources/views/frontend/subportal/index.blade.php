@extends('frontend.subportal.layouts.app')

@section('content')
<main id="main">
    c
  <!-- Banner Section -->
  <section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        <!-- Slide Item -->
        @foreach ($slide as $slider)
        <div class="slide-item" style="background-image: url({{ url('storage/'.$slider->image .'') }});">
            <div class="content-box">
                <div class="content">
                    <div class="auto-container">
                        <h2 style="margin-left: 20px; margin-right: 20px; margin-top:20%">{{ $slider->title }}</h2>
                        <div style="margin-left: 20px; margin-right: 20px;" class="text">{{ $slider->subtitle }}</div>
                        <div class="btn-box">
                            {{-- <a href="index.html#" class="theme-btn btn-style-one"><span class="btn-title">Check Service</span></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </section>
  <!--END Banner Section -->

    <!-- ======= About Section ======= -->
   <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>PROFIL {{ $profil->name }}</h3>
              <b><h2><b>{{ $profil->name }}</b></h2></b>
              <p>
                {!! $profil->welcome !!}<br><br>
                <i><b><u>{{ $profil->leader_name }}</u></b></i><br>
                {{ $profil->nickname }}
              </p>
              {{-- <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Baca Selengkapnya</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div> --}}
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ url('storage/'.$profil->leader_foto .'') }}" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- =======End About Section ======= -->

    <!-- ======= Layanan Section ======= -->
    <section id="pricing" class="pricing">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>BANNER</h2>
          <p>{{ $profil->name }}</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
          @foreach($banners as $layanan)
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3 style="color: #000000;">{{ $layanan->title }}</h3>
              {{-- <div class="price"><sup>$</sup>0<span> / mo</span></div> --}}
              <img src="{{ url('storage/'.$layanan->image .'') }}" class="img-fluid" alt="">
              @if (false===strpos($layanan->url,'http'))
                    <a href="{{ url($profil->slug.'/'.$layanan->url) }}" class="btn-buy">Selengkapnya</a>
              @else
                    <a href="{{ url($layanan->url) }}" class="btn-buy">Selengkapnya</a>
              @endif

            </div>
          </div>
          @endforeach

        </div>

      </div>

    </section><!-- End Layanan Section -->

    <!-- Team Section -->
    <section id="team" class="team">

        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <h2>Pegawai</h2>
            <p>{{ $profil->name }}</p>
          </header>

          <div class="row gy-4">

            <div class="team swiper" data-aos="fade-up" data-aos-delay="200">
              <div class="swiper-wrapper">
                @foreach($employee as $pegawai)
                <div class="swiper-slide">
                  {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100"> --}}
                    <div class="member">
                      <div class="member-img">
                        <img src="{{ url('storage/'.$pegawai->image .'') }}" class="img-fluid" alt="">
                        <div class="social">
                          <a href="https://tiktok.com/{{ $pegawai->tiktok }}"><i class="bi bi-tiktok"></i></a>
                          <a href="https://facebook.com/{{ $pegawai->facebook }}"><i class="bi bi-facebook"></i></a>
                          <a href="https://instagram.com/{{ $pegawai->instagram }}"><i class="bi bi-instagram"></i></a>
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>{{$pegawai->name  }}</h4>
                        <span>{{$pegawai->position  }}</span>
                        <p>{{ $pegawai->description  }}</p>
                      </div>
                    </div>
                  {{-- </div> --}}
                </div>
                @endforeach

              </div>
              {{-- <div class="swiper-pagination"></div> --}}
            </div>

          </div>

        </div>

      </section><!-- End Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
            <h2>Agenda</h2>
            <p>{{ $profil->name }}</p>
            </header>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                @foreach($agendas as $agenda)
                <div class="swiper-slide">
                <div class="testimonial-item">
                    <div class="profile mt-auto">
                        <img src="{{ url('storage/'.$agenda->image .'') }}" class="testimonial-imgnya" >
                        <h3>{{$agenda->title  }}</h3>
                        <h4>{{  date('d-m-Y', strtotime($agenda->published)) }}<br>{{  date('G:i', strtotime($agenda->time)) }}<br>{{$agenda->location  }}</h4>
                    </div>
                </div>
                </div><!-- End testimonial item -->
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>

        </section><!-- End Testimonials Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Berita</h2>
          <p>{{ $profil->name }}</p>
        </header>

        <div class="row">
        @foreach($posts as $index => $isi)
          <div class="col-lg-4"  style="margin-bottom: 10px;">
            <div class="post-box">
              <div class="post-img"><img src="{{ url('storage/'.$isi->image .'') }}" class="img-fluid" alt=""></div>
              <span class="post-date">{!! $newDate = date("d-m-Y", strtotime($isi->published)) !!}</span>
              <h3 class="post-title">{{$isi->title}}</h3>
              <a href="{{ url($profil->slug.'/post/'.$isi->slug.'') }}" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @endforeach

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Youtube ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Playlist</h2>
          <p>Youtube</p>
        </header>

        <div class="row">
          <div id="playlist-horizontal"></div>
        </div>

      </div>

    </section><!-- End Youtube -->

      <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
          </header>

          <div class="row">
            <div class="col-lg-12">
              <!-- F.A.Q List 1-->
              <div class="accordion accordion-flush" id="faqlist1">
                @foreach($faq as $faqs)
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $faqs->id }}">
                      {!! $faqs->question !!}
                    </button>
                  </h2>
                  <div id="faq-content-{{ $faqs->id}}" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                    <div class="accordion-body">
                      {!! $faqs->answer !!}
                    </div>
                  </div>

                </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>

      </section><!-- End F.A.Q Section -->

      <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">

        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <h2>Link Terkait</h2>
            <p>Link Terkait</p>
          </header>

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @foreach($related as $linkterkait)
              <div class="swiper-slide">
                <a href="{{ $linkterkait->url }}" target="_blank"><img src="{{ url('storage/'.$linkterkait->image .'') }}" class="img-fluid" alt=""></a>
              </div>
              @endforeach

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

      </section><!-- End Clients Section -->

    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2></h2>
          <p>Hubungi Kami</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>{{ $profil->office_address }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Telp / WhatsApp</h3>
                  <p>{{ $profil->office_telp }}<br>{{ $profil->office_whatsapp }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Kami</h3>
                  <p>{{ $profil->office_email }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Jam Operasi</h3>
                  {!! $profil->open_hour !!}
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <iframe src="{!! $profil->url_maps !!}" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            {{-- <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Judul" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Terimakasih</div>

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form> --}}

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        setting-name: setting-value
      });
    });
  </script>
@endsection
@section('title', $profil->name )
@section('ogtitle', $profil->name )
@section('description', $profil->name )
@section('site_name', $profil->name )
@section('image',  url('storage/'.$profil->favicon .'') )
