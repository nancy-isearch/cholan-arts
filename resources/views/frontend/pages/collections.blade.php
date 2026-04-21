@extends('frontend.layouts.app')

@section('title','Collections – Cholan Arts')

@section('content')

<!-- ===== BREADCRUMB ===== -->
<div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="active">Collections</li>
    </ul>
  </div>
</div>

<!-- ===== HERO ===== -->
<section class="inner-banner">
  <span class="mb-3">Our Collections</span>
  <h1>Explore <em>Sacred Categories</em></h1>
  <p>
    Discover divine artistry through beautifully curated categories —
    each representing a unique expression of tradition, culture, and craftsmanship.
  </p>
</section>

<main>

  <!-- ===== CATEGORY GRID ===== -->
  <section class="gallery-section">
    <div class="section-label">Browse by Theme</div>
    <h2 class="section-title">Sacred Art, Organized Beautifully</h2>

    <div class="masonry-grid">

      @foreach($collections as $cat)
      <div class="gallery-item">

        <div class="card-inner gallery-card">

          <a href="{{ route('collection.products', $cat->name) }}">

            <!-- IMAGE -->
            <div class="card-image">
              <img src="{{ asset($cat->image)  }}" alt="{{ $cat->name }}" loading="lazy" />
            </div>
            <div class="card-overlay"></div>
            <!-- CONTENT -->
            <div class="card-content">
              <div class="card-text">
                <h4>{{ ucfirst($cat->name) }}</h4>
                <p class="mb-2" style="font-size:13px;opacity:0.8;">
                  {{ $cat->subtitle }}
                </p>
                <p class="mb-2" style="font-size:13px;opacity:0.8;">
                  {{ $cat->active_products_count }} Items
                </p>

                <div class="ganesha-btn-wrapper">
                  <span class="ganesha-btn">
                    View Collection →
                  </span>
                </div>

              </div>
            </div>

          </a>

        </div>

      </div>
      @endforeach

    </div>

  </section>

  <!-- ===== CTA ===== -->
  @include('frontend.components.cta')

  <!-- ===== SERVICE STRIP ===== -->
  @include('frontend.components.service-strip')

</main>

@endsection