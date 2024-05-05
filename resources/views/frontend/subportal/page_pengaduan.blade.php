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
                <h2>{{ $info }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-12 entries">


                        <article class="entry">

                            {{-- <h2 class="entry-title">
                {{$info}}
              </h2> --}}

                            <div class="entry-meta">
                                {{-- <ul>
                  <li class="d-flex align-items-center"><a href="#"><i class="bi bi-folder"></i></a> {{$page->category->nama  }}</li>
                  <li class="d-flex align-items-center"><a href="#"><i class="bi bi-clock"></i></a> {{ \Carbon\Carbon::parse($page->publish)->format('d M Y') }}</li>
                  </ul> --}}
                            </div>

                            <div class="entry-content">
                                <!-- ======= Features Section ======= -->
                                <section id="features" class="features">

                                    <div class="container" data-aos="fade-up">

                                        <header class="section-header">
                                            <h2>Informasi</h2>
                                            <p>Pengaduan</p>
                                        </header>

                                        <div class="row">

                                            <!-- Feature Icons -->
                                            <div class="feature-icons" data-aos="fade-up">
                                                <h3>Sarana Pengaduan</h3>

                                                <div class="row">

                                                    <div class="col-xl-4 text-center" data-aos="fade-right"
                                                        data-aos-delay="100">
                                                        <img src="{{ url('storage/luar/features-1.png') }}" class="img-fluid p-4"
                                                            alt="">
                                                    </div>

                                                    <div class="col-xl-8 d-flex content">
                                                        <div class="row align-self-center gy-4">

                                                            <div class="col-md-6 icon-box" data-aos="fade-up">
                                                                <i class="ri-mail-star-fill"></i>
                                                                <div>
                                                                    <h4>Kotak Pengaduan</h4>
                                                                    <p>{{ $pengaduan->kotak }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="100">
                                                                <i class="ri-alarm-warning-fill"></i>
                                                                <div>
                                                                    <h4>SP4N Lapor</h4>
                                                                    <p>{{ $pengaduan->lapor }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="200">
                                                                <i class="ri-phone-line"></i>
                                                                <div>
                                                                    <h4>Fax</h4>
                                                                    <p>{{ $pengaduan->fax }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="300">
                                                                <i class="ri-phone-fill"></i>
                                                                <div>
                                                                    <h4>Telepon</h4>
                                                                    <p>{{ $pengaduan->telp }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="400">
                                                                <i class="ri-whatsapp-fill"></i>
                                                                <div>
                                                                    <h4>Whatsapp</h4>
                                                                    <p>{{ $pengaduan->wa }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="500">
                                                                <i class="ri-mail-fill"></i>
                                                                <div>
                                                                    <h4>Email</h4>
                                                                    <p>{{ $pengaduan->email }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="500">
                                                                <i class="ri-facebook-fill"></i>
                                                                <div>
                                                                    <h4>{{ $pengaduan->fb }}</h4>
                                                                    <p><a
                                                                            href="{{ $pengaduan->fb }}">{{ $pengaduan->link_fb }}</a>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="500">
                                                                <i class="ri-twitter-fill"></i>
                                                                <div>
                                                                    <h4>{{ $pengaduan->tw }}</h4>
                                                                    <p><a
                                                                            href="{{ $pengaduan->tw }}">{{ $pengaduan->link_tw }}</a>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="500">
                                                                <i class="ri-instagram-fill"></i>
                                                                <div>
                                                                    <h4>{{ $pengaduan->ig }}</h4>
                                                                    <p><a
                                                                            href="{{ $pengaduan->ig }}">{{ $pengaduan->link_ig }}</a>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 icon-box" data-aos="fade-up"
                                                                data-aos-delay="500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                    width="48" height="48" fill="rgba(13,113,105,1)">
                                                                    <path
                                                                        d="M16 8.24537V15.5C16 19.0899 13.0899 22 9.5 22C5.91015 22 3 19.0899 3 15.5C3 11.9101 5.91015 9 9.5 9C10.0163 9 10.5185 9.06019 11 9.17393V12.3368C10.5454 12.1208 10.0368 12 9.5 12C7.567 12 6 13.567 6 15.5C6 17.433 7.567 19 9.5 19C11.433 19 13 17.433 13 15.5V2H16C16 4.76142 18.2386 7 21 7V10C19.1081 10 17.3696 9.34328 16 8.24537Z">
                                                                    </path>
                                                                </svg>
                                                                <div>
                                                                    <h4>{{ $pengaduan->tiktok }}</h4>
                                                                    <p><a
                                                                            href="{{ $pengaduan->tiktok }}">{{ $pengaduan->link_tiktok }}</a>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div><!-- End Feature Icons -->

                                        </div> <!-- / row -->

                                        <!-- Feature Tabs -->
                                        <div class="row feture-tabs" data-aos="fade-up">
                                            <div class="col-lg-6">
                                                <h3>Waktu Penanganan, Prosedur dan Admin/Pengelola Pengaduan</h3>

                                                <!-- Tabs -->
                                                <ul class="nav nav-pills mb-3">
                                                    <li>
                                                        <a class="nav-link active" data-bs-toggle="pill"
                                                            href="#tab1">Jangka Waktu</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" data-bs-toggle="pill"
                                                            href="#tab2">Mekanisme/Prosedur</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" data-bs-toggle="pill"
                                                            href="#tab3">admin/Pengelola</a>
                                                    </li>
                                                </ul><!-- End Tabs -->

                                                <!-- Tab Content -->
                                                <div class="tab-content">

                                                    <div class="tab-pane fade show active" id="tab1">
                                                        {!! $pengaduan->jangka_waktu !!}
                                                    </div><!-- End Tab 1 Content -->

                                                    <div class="tab-pane fade show" id="tab2">
                                                        {!! $pengaduan->prosedur !!}
                                                    </div><!-- End Tab 2 Content -->

                                                    <div class="tab-pane fade show" id="tab3">
                                                        {!! $pengaduan->pengelola !!}
                                                    </div><!-- End Tab 3 Content -->

                                                </div>

                                            </div>

                                            <div class="col-lg-6">
                                                <img src="{{ url('storage/luar/features-2.png') }}" class="img-fluid" alt="">
                                            </div>

                                        </div><!-- End Feature Tabs -->



                                    </div>

                                </section><!-- End Features Section -->
                                <center>
                                    <h3 style="color:#0d7169;">Informasi dan Perkembangan Penanganan Pengaduan</h3><br>
                                </center>
                                <div class="banner-carousel owl-carousel owl-theme">
                                    @php
                                        $imageFilenames = $pengaduan->image;
                                    @endphp
                                    @if (is_array($imageFilenames))
                                        @foreach ($imageFilenames as $galeri)
                                    <div class="slide-item">
                                        <img class="d-block w-100" src="{{ url('storage/'.$galeri.'') }}" alt="Third slide">
                                    </div>
                                    @endforeach
                                    @else
                                        Failed to decode JSON string
                                    @endif
                                </div>
                            </div>

                        </article><!-- End blog entry -->


                    </div><!-- End blog entries list -->

                    {{-- <div class="col-lg-4">

            <div class="sidebar"> --}}

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

                    {{-- <h3 class="sidebar-title">Terbaru</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($recentposts as $artikelrecent)
                <div class="post-item clearfix">
                  <img src="{{ url('storage/'.$artikelrecent->image .'') }}" alt="">
                  <h4><a href="{{ url($profil->slug.'/post/'.$artikelrecent->slug.'') }}">{{ $artikelrecent->title }}</a></h4>
                  <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($artikelrecent->published)->format('d M Y') }}</time>
                </div>
                @endforeach

              </div><!-- End sidebar recent posts--> --}}

                    {{-- <h5 class="sidebar-title">Government Public Relation (GPR)</h5>
              <div class="sidebar-item recent-posts">
                <div id="gpr-kominfo-widget-container"></div>
              </div><!-- End sidebar recent posts--> --}}




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

                    {{-- </div><!-- End sidebar --> --}}

                    {{-- </div><!-- End blog sidebar --> --}}

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
@section('title', $info)
@section('ogtitle', $info)
@section('description', $info)
@section('site_name', $profil->name)
@section('image', url('storage/' . $profil->logo . ''))
