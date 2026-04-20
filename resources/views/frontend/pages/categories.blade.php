@extends('frontend.layouts.app')

@section('title','Categories – Cholan Arts')

@section('content')

<!-- ===== BREADCRUMB ===== -->
<div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="active">Categories</li>
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

      @foreach($categories as $cat)
      <div class="gallery-item">

        <div class="card-inner gallery-card">

          <a href="{{ route('category.products', $cat->name) }}">

            <!-- IMAGE -->
            <div class="card-image">
              <img src="{{ asset('/assets/images/products-img/placeholder-product.jpg')  }}" alt="{{ $cat->name }}" loading="lazy" />
            </div>
            <div class="card-overlay"></div>
            <!-- CONTENT -->
            <div class="card-content">
              <div class="card-text">
                <h4>{{ ucfirst($cat->name) }}</h4>

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
  <section class="service-strip" aria-label="Our services">
    <div class="service-grid">

      <div class="service-item">
        <div class="service-icon">
          <img src="{{ asset('assets/svg/headphones.svg') }}" width="50" />
        </div>
        <div class="service-title">Reach out to us</div>
        <p class="service-desc">
          Our support team is always ready to assist you.
        </p>
      </div>

      <div class="service-item">
        <div class="service-icon">
          <img src="{{ asset('assets/svg/package.svg') }}" width="50" />
        </div>
        <div class="service-title">Easy Returns</div>
        <p class="service-desc">
          Smooth and hassle-free exchange process.
        </p>
      </div>

      <div class="service-item">
        <div class="service-icon">
          <img src="{{ asset('assets/svg/Sucure.svg') }}" width="50" />
        </div>
        <div class="service-title">Corporate Orders</div>
        <p class="service-desc">
          Customized gifting and bulk order solutions.
        </p>
      </div>

    </div>
  </section>

</main>

@endsection