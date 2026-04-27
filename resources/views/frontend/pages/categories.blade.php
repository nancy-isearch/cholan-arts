@extends('frontend.layouts.app')
@section('seo_title', $seo->meta_title)
@section('seo_description', $seo->meta_description)
@section('seo_keywords', $seo->meta_keywords)
@section('content')
    <!-- BREADCRUMB -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Categories</li>
            </ul>
        </div>
    </div>

    <!-- HERO -->
    <section class="inner-banner">
        <span class="mb-3">Our Categories</span>
        <h1>Explore <em>Sacred Categories</em></h1>
        <p>
            A visual journey through divine performances, sacred art forms,
            workshops, festivals, and cultural celebrations at Cholan Arts.
        </p>
    </section>

    <main>
        <!-- GALLERY -->
        <section class="gallery-section">
            <div class="section-label">Browse by Theme</div>
            <h2 class="section-title">Sacred Art, Captured Eternally</h2>

            <!-- GRID -->
            <div class="masonry-grid" id="mainGrid">
                @foreach ($categories as $cat)
                    <div class="gallery-item">
                        <div class="card-inner gallery-card">
                            <!-- TOP ACTION -->
                            <div class="top-action">
                                
                            </div>
                            <a href="{{ route('category.products', $cat->name) }}">
                                <div class="card-image">
                                    <img src="{{ asset('/assets/images/products-img/placeholder-product.jpg') }}"
                                        alt="Panel Elephant Family (Colour)" loading="lazy">
                                </div>
                                <div class="card-overlay"></div>
                                <!-- BOTTOM CONTENT -->
                            </a>
                            <div class="card-content"><a href="{{ route('category.products', $cat->name) }}">
                                </a>
                                <div class="card-text"><a href="{{ route('category.products', $cat->name) }}">

                                        <h4>{{ ucfirst($cat->name) }}</h4>
                                        <p class="mb-2" style="font-size:13px;opacity:0.8;">
                                            {{ $cat->active_products_count }} Items
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

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
@push('scripts')
    <script></script>
@endpush
