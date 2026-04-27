@extends('frontend.layouts.app')
@section('seo_title', $seo->meta_title )
@section('seo_description', $seo->meta_description )
@section('seo_keywords', $seo->meta_keywords )

@section('content')

<main id="main-content">
  <!-- ===== HERO SWIPER ===== -->
  <section class="hero-swiper swiper" aria-label="Featured collections">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="hero-slide-bg">
          <picture>
            <source
              srcset="{{ asset('assets/images/banner-img/ganesh-mobile-bg.webp') }}"
              media="(max-width: 767px)">
            <img
              src="{{ asset('assets/images/banner-img/banner-slide-img1.webp') }}"
              alt="Banner Image"
              class="w-100 h-100 object-fit-cover"
              fetchpriority="high">
          </picture>
        </div>
        <div class="hero-overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="hero-content">
                <h1>Auspicious addition to your pooja space</h1>
                <p>
                  Handcrafted Cholan-inspired idols that add grace,
                  positivity, and timeless beauty to your sacred space.
                </p>
                <a
                  href="/contact-us"
                  class="btn-orange"
                  aria-label="Contact Cholan Arts">
                  Contact Us
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M20.0001 12H4.00012" />
                    <path
                      d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="hero-slide-bg">
            <picture>
              <source
                srcset="{{ asset('assets/images/banner-img/buddha-mobile-bg.webp') }}"
                media="(max-width: 767px)">
              <img
                src="{{ asset('assets/images/banner-img/banner-slide-img2.webp') }}"
                alt="Banner Image"
                class="w-100 h-100 object-fit-cover"
                loading="lazy">
          </picture>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-6">
              <div class="hero-content">
                <h1 class="text-white">
                  The cosmic dance of Lord Nataraja
                </h1>
                <p class="text-white">
                  Masterfully cast in bronze using the ancient Lost Wax
                  technique - a timeless treasure for devotees and
                  collectors alike.
                </p>
                <a href="/products" class="btn-orange">
                  Explore Collection
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M20.0001 12H4.00012" />
                    <path
                      d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="hero-slide-bg">
            <picture>
              <source
                srcset="{{ asset('assets/images/banner-img/durgamata-mobile-bg.webp') }}"
                media="(max-width: 767px)">
              <img
                src="{{ asset('assets/images/banner-img/banner-slide-img3.webp') }}"
                alt="Banner Image"
                class="w-100 h-100 object-fit-cover"
                loading="lazy">
          </picture>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-6">
              <div class="hero-content">
                <h1>Invite prosperity with Goddess Lakshmi</h1>
                <p>
                  Each idol is a living tribute to centuries of sacred
                  artisan wisdom passed down through generations of Chola
                  craftspeople.
                </p>
                <a href="/products" class="btn-orange">
                  Shop Now
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M20.0001 12H4.00012" />
                    <path
                      d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="hero-slide-bg">
          <picture>
            <source
              srcset="{{ asset('assets/images/banner-img/balaji-mobile-bg.webp') }}"
              media="(max-width: 767px)">
            <img
              src="{{ asset('assets/images/banner-img/banner-slide-img4.webp') }}"
              alt="Banner Image"
              class="w-100 h-100 object-fit-cover"
              loading="lazy">
          </picture>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-6">
              <div class="hero-content">
                <h1 class="text-white">
                  Divine craftsmanship, eternal devotion
                </h1>
                <p class="text-white">
                  From the Chola heartland to your home - authentic
                  handcrafted sculptures that carry the divine essence of
                  Indian spirituality.
                </p>
                <a href="/products" class="ganesha-btn">
                  Discover More
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M20.0001 12H4.00012" />
                    <path
                      d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Custom nav -->
    <div
      class="swiper-button-prev"
      role="button" id="hero-prev-btn"
      aria-label="Previous slide">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round">
        <path d="M4 12H20M9 7L4 12L9 17" />
      </svg>
      Prev
    </div>
    <div class="swiper-button-next" id="hero-next-btn" role="button" aria-label="Next slide">
      Next
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round">
        <path d="M20 12H4M15 7L20 12L15 17" />
      </svg>
    </div>
    <div class="swiper-pagination"></div>
  </section>

  <!-- ===== MARQUEE ===== -->
  <div class="marquee-section" aria-hidden="true">
    <div class="marquee-track">
      <span class="marquee-item">Bring Divine Grace into your Home, with our Handcrafted Spiritual
        Idols.</span>
      <span class="marquee-item">Bring Divine Grace into your Home, with our Handcrafted Spiritual
        Idols.</span>
      <span class="marquee-item">Bring Divine Grace into your Home, with our Handcrafted Spiritual
        Idols.</span>
    </div>
  </div>

  <!-- ===== FEATURES BAR ===== -->
  <section class="features-bar py-5" aria-label="Shopping benefits">
    <div class="features-grid">
      <div class="feature-item">
        <div class="feature-icon">
          <!-- HugeIcons: Delivery Truck stroke-rounded -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 12H2V5C2 4.44772 2.44772 4 3 4H12V12Z" />
            <path d="M12 4H16.5L22 9.5V12H12V4Z" />
            <path
              d="M6 17C6 18.1046 5.10457 19 4 19C2.89543 19 2 18.1046 2 17C2 15.8954 2.89543 15 4 15C5.10457 15 6 15.8954 6 17Z" />
            <path
              d="M20 17C20 18.1046 19.1046 19 18 19C16.8954 19 16 18.1046 16 17C16 15.8954 16.8954 15 18 15C19.1046 15 20 15.8954 20 17Z" />
            <path d="M2 17H1M22 17H20M6 17H16M12 12V17" />
          </svg>
        </div>
        <div>
          <div class="feature-title">Free Shipping</div>
          <div class="feature-sub">Free shipping on all your order</div>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">
          <!-- HugeIcons: Customer Service 01 stroke-rounded -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path
              d="M9.5 12.5C9.5 12.5 10.5 14 12 14C13.5 14 14.5 12.5 14.5 12.5" />
            <path d="M10 9.5V10M14 9.5V10" />
            <path
              d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C10.1786 22 8.47087 21.513 7 20.6622" />
            <path d="M5 17.5C5 17.5 4 15.5 4 12C4 8.5 5 6.5 5 6.5" />
            <path
              d="M2 9C3.10457 9 4 9.89543 4 11V13C4 14.1046 3.10457 15 2 15C1.44772 15 1 14.5523 1 14V10C1 9.44772 1.44772 9 2 9Z" />
          </svg>
        </div>
        <div>
          <div class="feature-title">Customer Support 24/7</div>
          <div class="feature-sub">Instant access to support</div>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">
          <!-- HugeIcons: Lock stroke-rounded -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path
              d="M6 10V8C6 5.23858 8.23858 3 11 3H13C15.7614 3 18 5.23858 18 8V10" />
            <path
              d="M3 10H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V10Z" />
            <path d="M12 14V17" />
          </svg>
        </div>
        <div>
          <div class="feature-title">100% Secure Payment</div>
          <div class="feature-sub">We ensure your money is safe</div>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">
          <!-- HugeIcons: Money Receive stroke-rounded -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path
              d="M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2" />
            <path d="M9 9L6 12M6 12L9 15M6 12H18" />
            <path d="M2 3.5L2 8.5L7 8.5" />
          </svg>
        </div>
        <div>
          <div class="feature-title">Money-Back Guarantee</div>
          <div class="feature-sub">30 Days Money-Back Guarantee</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== PRODUCTS - DEITY IDOLS ===== -->
  <section class="products-section" aria-labelledby="deity-idols-title">
    <div class="swiper-nav-row">
      <h2 class="section-title" id="deity-idols-title">
        Types of Deity Idols
      </h2>
      <a href="/products" class="explore-link" aria-label="Explore all deity idols">
        Explore All
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="#385632"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M20 12H4M15 7L20 12L15 17" />
        </svg>
      </a>
    </div>
    <div class="products-swiper swiper" id="deitySwiper">
      <div class="swiper-wrapper">
        @foreach ($products as $product)
        <div class="swiper-slide">
          <a href="/product/{{ $product->slug }}">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ $product->feature_image ? asset('uploads/products/'.$product->id .'/' . $product->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}"
                  alt="Relaxing Ganesh handcrafted wooden idol"
                  loading="lazy"
                  width="600"
                  height="300" />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">{{ $product->name }}</h3>
                <p class="product-card-desc">
                  {!! \Illuminate\Support\Str::limit($product->description) !!}
                </p>
              </div>
            </article>
          </a>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <!-- ===== GANESHA FEATURED BANNER ===== -->
  <section class="ganesha-section">
    <div class="ganesha-overlay"></div>
    <div class="ganesha-container">
      <div class="ganesha-left">
        <img src="{{ asset('assets/images/products-img/ganesha-idol.webp') }}"
          alt="Ganesha Left"
          width="300" />
      </div>
      <div class="ganesha-content text-center">
        <h2 class="text-center mb-3">
          Bring Home the Blessings of Ganesha
        </h2>
        <div class="mb-3 text-center m-auto">
          <img src="{{ asset('assets/images/products-img/trishul.svg') }}"
            alt="Ganesha Left"
            class="m-auto" />
        </div>
        <a href="/category/ganesha" class="ganesha-btn">View All Ganesha’s →</a>
      </div>
      <div class="ganesha-slider">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($ganeshas as $ganesha)
            <div class="swiper-slide">
              <div class="ganesha-card">
                <img src="{{ $ganesha->feature_image ? asset('uploads/products/'.$ganesha->id .'/' . $ganesha->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}"
                  alt="" />
                <h4>{{ $ganesha->name }}</h4>
                <div class="stars">★★★★☆</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CATEGORY SPLIT ===== -->
  <section class="category-split" aria-label="Browse collections">
    <a href="/products" class="category-half" aria-label="Browse Brass Collections">
      <div
        class="category-half-bg"
        style="
              background-image: url('{{ asset('assets/images/products-img/buddha-img.webp') }}');
              background-color: #c5b89a;
            "></div>
      <div class="category-half-overlay"></div>
      <div class="category-half-content product-info-box">
        <div class="info-title">
          <h3>Product Information</h3>
        </div>

        <div class="info-row">
          <!-- LEFT -->
          <div class="info-col">
            <h4>Material</h4>
            <p>Handcrafted Brass</p>
          </div>

          <div class="info-divider"></div>

          <!-- RIGHT -->
          <div class="info-col">
            <h4>Color</h4>
            <p>Golden & Brown</p>
          </div>
        </div>

        <div class="info-line"></div>
      </div>
    </a>
    <a href="/products" class="category-half" aria-label="Browse New Year Gifts">
      <div
        class="category-half-bg"
        style="
              background-image: url('{{ asset('assets/images/products-img/kali-mata.webp') }}');
              background-color: #b8c9b0;
            "></div>
      <div class="category-half-overlay"></div>
      <div class="category-half-content product-info-box">
        <div class="info-title">
          <h3>Product Information</h3>
        </div>

        <div class="info-row">
          <!-- LEFT -->
          <div class="info-col">
            <h4>Material</h4>
            <p>Handcrafted Brass</p>
          </div>

          <div class="info-divider"></div>

          <!-- RIGHT -->
          <div class="info-col">
            <h4>Color</h4>
            <p>Golden & Brown</p>
          </div>
        </div>

        <div class="info-line"></div>
      </div>
    </a>
  </section>

  <!-- ===== PRODUCTS - DEITY IDOLS ===== -->
  <section class="products-section" aria-labelledby="deity-idols-title">
    <div class="swiper-nav-row">
      <h2 class="section-title" id="deity-idols-title">
        Types of Deity Idols
      </h2>
      <a href="/products" class="explore-link" aria-label="Explore all deity idols">
        Explore All
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="#385632"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M20 12H4M15 7L20 12L15 17" />
        </svg>
      </a>
    </div>
   
    <div class="products-swiper swiper" id="deitySwiper">
      <div class="swiper-wrapper">
        @foreach ($deities as $deity)
        <div class="swiper-slide">
          <a href="/product/{{ $deity->slug }}">
            <article class="product-card">
              <div class="product-card-img">
                <img src="{{ asset('uploads/products/' .$deity->id .'/'. $deity->feature_image) }}"
                  alt="Relaxing Ganesh handcrafted wooden idol"
                  loading="lazy"
                  width="600"
                  height="300" />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">{{ $deity->name }}</h3>
                <p class="product-card-desc">
                  {!! \Illuminate\Support\Str::limit($deity->description, 60) !!}
                </p>
              </div>
            </article>
          </a>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <!-- ===== ABOUT SECTION ===== -->
  <section class="about-section" aria-labelledby="about-title">
    <div
      class="about-section-bg"
      style="background-image: url('{{ asset('assets/images/bg/about-bg.webp') }}')"></div>
    <div class="about-content">
      <h2 id="about-title">About Cholan Arts</h2>
      <p>
        Cholan Arts is dedicated to preserving and celebrating the ancient
        tradition of handcrafted Hindu deity idols. For generations, our
        master artisans have dedicated their lives to creating murtiyan that
        embody spiritual significance and artistic excellence. Each idol is
        a testament to the devotion, skill, and cultural wisdom passed down
        through centuries.
      </p>
      <p>
        We believe that true craftsmanship cannot be rushed or
        mass-produced. Every sculpture is a unique creation, infused with
        the artist's reverence for the divine and their commitment to
        honoring the traditions of their ancestors.
      </p>
      <a href="/contact-us" class="btn-orange">
        Contact Us
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="#000"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M20 12H4M15 7L20 12L15 17" />
        </svg>
      </a>
    </div>
  </section>

  <!-- ===== FEATURED PRODUCTS (Wide) ===== -->
  <section
    class="products-section pe-0"
    style="
          background-image: url('{{ asset('assets/images/bg/bg-pettern.webp') }}');
          background-repeat: no-repeat;
          background-position: top left;
        "
    aria-labelledby="featured-title">
    <div class="text-center">
      <h2 class="section-title" id="featured-title">Featured Sculptures</h2>
      <div class="d-flex justify-content-center">
        <a href="/category/sculptures" class="explore-link text-center m-auto">
          Explore All
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M20 12H4M15 7L20 12L15 17" />
          </svg>
        </a>
      </div>
    </div>

    <!-- Swiper -->
    <div class="swiper featuredSwiper">
      <div class="swiper-wrapper">
        @foreach ($sculptures as $sculpture)
        {{-- a tag was destroying design so i didn't use link here. once confirmed, will take help of designer --}}
        {{-- <a href="/product/{{ $sculpture->slug }}"> --}}
        <div class="swiper-slide">
          <article class="featured-card">
            <div class="featured-card-img">
              <img src="{{ asset('uploads/products/'.$sculpture->id .'/' . $sculpture->feature_image) }}"
                alt="Relaxing Ganesh handcrafted wooden idol" />
            </div>
            <div class="featured-card-body">
              <h3>{{ $sculpture->name }}</h3>
              <p>
                {!! \Illuminate\Support\Str::limit($sculpture->description, 120) !!}
              </p>
              <a href="/contact-us">Contact Us <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 12H4M15 7L20 12L15 17"></path>
                </svg></a>
            </div>
          </article>
        </div>
        {{-- </a> --}}
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== WHAT WE'RE CRAFTING ===== -->
  <section class="crafting-section" aria-labelledby="crafting-title">
    <h2 class="crafting-title" id="crafting-title">What We're Crafting</h2>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="crafting-grid">
          <div class="crafting-col">
            <div>
              <div class="crafting-item-num">01</div>
              <div class="crafting-item-title">Antique Curation</div>
              <p class="crafting-item-desc">
                We handpick rare and authentic antique pieces, preserving
                the beauty and craftsmanship of bygone eras for collectors
                and enthusiasts.
              </p>
            </div>
            <div>
              <div class="crafting-item-num">02</div>
              <div class="crafting-item-title">Expert Restoration</div>
              <p class="crafting-item-desc">
                Our expert team meticulously restores antiques, ensuring
                their originality and charm remain intact while enhancing
                their longevity.
              </p>
            </div>
          </div>
          <div class="crafting-img-center">
            <img src="{{ asset('assets/images/products-img/shiv-parvatiji.webp') }}"
              alt="Artisan crafting a bronze idol using the lost-wax technique"
              loading="lazy"
              width="294"
              height="480" />
          </div>
          <div class="crafting-col">
            <div>
              <div class="crafting-item-num">03</div>
              <div class="crafting-item-title">Personalised Guidance</div>
              <p class="crafting-item-desc">
                We guide our customers in selecting the perfect antique
                pieces that align with their style, space, and story.
              </p>
            </div>
            <div>
              <div class="crafting-item-num">04</div>
              <div class="crafting-item-title">Cultural Appreciation</div>
              <p class="crafting-item-desc">
                Through our collections, we aim to cultivate a deeper
                appreciation for the art, culture, and history encapsulated
                in every piece.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== WHAT'S NEW ===== -->
  <section class="whats-new-section" aria-labelledby="whats-new-title">
    <div class="text-center mb-5">
      <h2 class="section-title" id="featured-title">
        What's new on Cholan Arts
      </h2>
      <div class="d-flex justify-content-center">
        <a href="/products" class="explore-link text-center m-auto">
          Explore All Gallery
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M20 12H4M15 7L20 12L15 17" />
          </svg>
        </a>
      </div>
    </div>
    <div class="collection-grid">
      @foreach($menuCollections as $key => $collection)

        <div class="collection-card {{ $loop->last ? 'wide' : '' }}">
            <a href="{{ url('/collection/'.$collection->name) }}">

                <div class="collection-card-bg"
                    style="
                        background-image: url('{{ $collection->image ? asset($collection->image) : asset('assets/images/default.jpg') }}');
                        background-color: #c5b89a;
                    ">
                </div>

                <div class="collection-card-overlay"></div>

                <div class="collection-card-info">
                    <h3>{{ ucfirst($collection->name) }}</h3>

                    <p>
                        {{ $collection->description ?? 'Explore premium handcrafted collections' }}
                    </p>
                </div>

            </a>
        </div>
      @endforeach
    </div>
  </section>

  <!-- ===== TESTIMONIALS ===== -->
  <section
    class="testimonials-section"
    aria-labelledby="testimonials-title mb-0">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="elfsight-app-e77f002b-5e22-409e-81f8-79014679d1c9" data-elfsight-app-lazy></div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===== TESTIMONIALS ===== -->

  <!-- ===== CTA BANNER ===== -->
  @include('frontend.components.cta')

  <!-- ===== SERVICE STRIP ===== -->
  <section class="service-strip" aria-label="Our services">
    <div class="service-grid">
      <div class="service-item">
        <div class="service-icon">
          <!-- HugeIcons: Call stroke-rounded -->
          <img src="{{ asset('assets/svg/headphones.svg') }}" alt="" width="50" />
        </div>
        <div class="service-title">Reach out to us</div>
        <p class="service-desc">
          Our dedicated support team is here to assist you. Reach out
          anytime for prompt and friendly help.
        </p>
      </div>
      <div class="service-item">
        <div class="service-icon">
          <!-- HugeIcons: Exchange 01 stroke-rounded -->
          <img src="{{ asset('assets/svg/package.svg') }}" alt="" width="50" />
        </div>
        <div class="service-title">Easy Exchanges & Returns</div>
        <p class="service-desc">
          Hassle-free returns and easy exchanges for a worry-free shopping
          experience.
        </p>
      </div>
      <div class="service-item">
        <div class="service-icon">
          <!-- HugeIcons: Gift stroke-rounded -->
          <img src="{{ asset('assets/svg/Sucure.svg') }}" alt="" width="50" />
        </div>
        <div class="service-title">Gifting &amp; Corporate Orders</div>
        <p class="service-desc">
          Make every occasion special with our customized gifting and
          corporate solutions.
        </p>
      </div>
    </div>
  </section>
</main>

@endsection