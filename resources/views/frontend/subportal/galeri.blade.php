@extends('frontend.subportal.layouts.app')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('') }}">Home</a></li>
          <li>Halaman</li>
        </ol>
        <h2>Galeri</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
           <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">
              <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ( $galeris as $galeri)
                <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img src="{{ url('storage/'.$galeri->image .'') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4>{{$galeri->title  }}</h4>
                      {{-- <p>{{$galeri->judul  }}</p> --}}
                      <div class="portfolio-links">
                        <a href="{{ url('storage/'.$galeri->image .'') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$galeri->title  }}"><i class="bi bi-plus"></i></a>
                        <a href="{{ url($profil->slug.'/galeri/'.$galeri->slug) }}" title="More Details"><i class="bi bi-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

            </div>

          </section><!-- End Portfolio Section -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <!--<h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div> End sidebar search formn-->

              <!--<h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div> End sidebar categories-->

              <h3 class="sidebar-title">Terbaru</h3>
              <div class="sidebar-item recent-posts">
                @foreach ( $recentposts as $artikelrecent)
                <div class="post-item clearfix">
                  <img src="{{ url('storage/'.$artikelrecent->image .'') }}" alt="">
                  <h4><a href="{{ url($profil->slug.'/post/'.$artikelrecent->slug.'') }}">{{ $artikelrecent->title }}</a></h4>
                  <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($artikelrecent->published)->format('d M Y') }}</time>
                </div>
                @endforeach

              </div><!-- End sidebar recent posts-->
              <h5 class="sidebar-title">Government Public Relation (GPR)</h5>
              <div class="sidebar-item recent-posts">
                <div id="gpr-kominfo-widget-container"></div>
              </div><!-- End sidebar recent posts-->

              <!--<h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div> End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        setting-name: setting-value
      });
    });
  </script>
@endsection
@section('title', 'Galeri - '.$profil->name.'' )
@section('ogtitle', 'Galeri - '.$profil->name.'')
@section('description', $profil->name )
@section('site_name', $profil->name )
@section('image',  url('storage/'.$profil->favicon .'') )
