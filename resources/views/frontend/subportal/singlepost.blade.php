@extends('frontend.subportal.layouts.app')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('') }}">Home</a></li>
          <li><a href="{{ url($profil->slug.'/page/blog') }}">Post</a></li>
        </ol>
        <h2>{{$post->title  }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">


            <article class="entry">

              <div class="entry-img">
                <img src="{{ url('storage/'.$post->image .'') }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{$post->title  }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><a href="#"><i class="bi bi-folder"></i></a> {{$post->categories->name  }}</li>
                  <li class="d-flex align-items-center"><a href="#"><i class="bi bi-clock"></i></a> {{ \Carbon\Carbon::parse($post->published)->format('d M Y') }}</li>
                  </ul>
              </div>

              <div class="entry-content">
                {!! $post->description !!}
              </div>

            </article><!-- End blog entry -->


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
@endsection
@section('title', $post->title )
@section('ogtitle', $post->title)
@section('description', $post->title )
@section('site_name', $profil->name )
@section('image',  url('storage/'.$post->image .'') )
