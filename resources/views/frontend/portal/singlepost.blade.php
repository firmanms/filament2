@extends('frontend.portal.layouts.app')

@section('content')

<main id="main">


<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Blog Detail</h2>
            {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li>{{$post->title}}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-8">

          <article class="blog-details">

            <div class="post-img">
              <img src="{{ url('storage/'.$post->image .'') }}" alt="" class="img-fluid">
            </div>

            <h2 class="title">{{$post->title}}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ url( $post->team->slug )}}">{{$post->team->name  }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-calendar"></i> <time datetime="{{$post->published}}">{{ \Carbon\Carbon::parse($post->published)->format('d M Y') }}</time></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
                {!! $post->description !!}

            </div><!-- End post content -->

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li>{{$post->categories->name  }}/li>
              </ul>
            </div><!-- End meta bottom -->

          </article><!-- End blog post -->

          <div class="post-author d-flex align-items-center">
            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
            <div>
              <h4>{{$post->team->name  }}</h4>
              <div class="social-links">
                <a href="{{$post->team->tw  }}"><i class="bi bi-twitter"></i></a>
                <a href="{{$post->team->fb  }}"><i class="bi bi-facebook"></i></a>
                <a href="{{$post->team->ig  }}"><i class="biu bi-instagram"></i></a>
                <a href="{{$post->team->tiktok  }}"><i class="biu bi-tiktok"></i></a>
              </div>
            </div>
          </div><!-- End post author -->

        </div>

        <div class="col-lg-4">

          <div class="sidebar">

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Terbaru</h3>

              <div class="mt-3">
                @foreach ( $recentposts as $artikelrecent)
                <div class="post-item mt-3">
                  <img src="{{ url('storage/'.$artikelrecent->image .'') }}" alt="">
                  <div>
                    <h4><a href="{{ url('/post/'.$artikelrecent->slug.'') }}">{{ $artikelrecent->title }}</a></h4>
                    <time datetime="{{$artikelrecent->published}}">{{ \Carbon\Carbon::parse($artikelrecent->published)->format('d M Y') }}</time>
                  </div>
                </div><!-- End recent post item-->
                @endforeach

              </div>

            </div><!-- End sidebar recent posts-->

            <h5 class="sidebar-title">Government Public Relation (GPR)</h5>
              <div class="sidebar-item recent-posts">
                <div id="gpr-kominfo-widget-container"></div>
              </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->
</main><!-- End #main -->
@endsection
@section('title', $profil->name )
@section('ogtitle', $profil->name )
@section('description', $profil->name )
@section('site_name', $profil->name )
@section('image',  url('storage/'.$profil->favicon .'') )
@section('desc', $profil->seo_desc )
@section('keyword', $profil->seo_keywords )
