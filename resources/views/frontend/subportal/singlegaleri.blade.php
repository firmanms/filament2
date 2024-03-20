@extends('frontend.subportal.layouts.app')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('') }}">Home</a></li>
          <li><a href="{{ url($profil->slug.'/page/galeri') }}">Galeri</a></li>
          <li>Halaman</li>
        </ol>
        <h2>{{$galeris->title  }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @php
                        $imageFilenames = $galeris->image_gallery;
                    @endphp
                    @if (is_array($imageFilenames))
                    @foreach ( $imageFilenames as $galeri)
                    <div class="swiper-slide">
                      <img src="{{ url('storage/'.$galeri.'') }}" alt="">
                    </div>
                      @endforeach
                    @else
                      Failed to decode JSON string
                    @endif


                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Informasi Galeri</h3>
                <ul>
                  <li><strong>Tanggal</strong>: {{ \Carbon\Carbon::parse($galeris->published)->format('d M Y') }}</li>
                  <li><strong>Kategori</strong>: {{$galeris->category  }}</li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>{{$galeris->title  }}</h2>
                <p>
                    {{$galeris->description  }}
                </p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->



  </main><!-- End #main -->
@endsection
@section('title', $galeris->title )
@section('ogtitle', $galeris->title)
@section('description', $galeris->title )
@section('site_name', $profil->name )
@section('image',  url('storage/'.$galeris->image .'') )
