@extends('frontend.layouts.app')
@section('title', $product->name)

@section('seo_title', $product->seo_title)
@section('seo_description', $product->seo_description)
@section('seo_keywords', $product->seo_keywords ?? $product->name)
@section('seo_image', asset('uploads/products/' . $product->id .'/'. $product->feature_image))

@section('content')
  <!-- BREADCRUMB -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>

        <li>
          <a href="{{ url('/products') }}">Products</a>
        </li>

        @if($product->categories && $product->categories->count())
          <li>
            <a href="{{ url('/products?c=' . $product->categories->first()->name) }}">
              {{ ucfirst($product->categories->first()->name) }}
            </a>
          </li>
        @endif

        <li class="active">{{ $product->name }}</li>
      </ul>
    </div>
  </div>

    <!-- IDOL HERO -->
    <div class="idol-hero pt-5">
      
      <!-- LEFT: IMAGE GALLERY -->
      <div class="img-gallery-col reveal">

          {{-- MAIN IMAGE --}}
          <div class="main-img-wrap">
              <a href="{{ $product->feature_image ? asset('uploads/products/'.$product->id .'/' . $product->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}" data-fancybox="gallery">
                  <img
                      id="mainImg"
                      src="{{ $product->feature_image ? asset('uploads/products/'.$product->id .'/' . $product->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}"
                      alt="Product Image"
                  />
              </a>
              <div class="img-badge">
                  <div class="ib-label">Craft Origin</div>
                  <div class="ib-val">{{ $product->origin }}</div>
              </div>
          </div>

          {{-- THUMBNAILS --}}
          @if(count($product->images) > 0)
              <div class="thumb-row">
                  <a href="{{ $product->feature_image ? asset('uploads/products/'.$product->id .'/' . $product->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}" data-fancybox="gallery"></a>

                  <div 
                      class="thumb active"
                      onclick="changeImg(this, '{{ $product->feature_image ? asset('uploads/products/'.$product->id .'/' . $product->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}')"
                  >
                      <img src="{{ $product->feature_image ? asset('uploads/products/'.$product->id .'/' . $product->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}" alt="thumb">
                  </div>
                  @foreach($product->images as $index => $img)
                      <!-- Hidden anchor for gallery -->
                      <a href="{{ asset('uploads/products/'.$product->id .'/' . $img->image) }}" data-fancybox="gallery"></a>
                      <div 
                          class="thumb"
                          onclick="changeImg(this, '{{ asset('uploads/products/'.$product->id .'/' . $img->image) }}')"
                      >
                          <img src="{{ asset('uploads/products/'.$product->id .'/' . $img->image) }}" alt="thumb">
                      </div>

                  @endforeach
              </div>
          @endif

      </div>

      <!-- RIGHT: DETAIL -->
      <div class="detail-col reveal" style="animation-delay: 0.1s">
        
        <h1 class="idol-name">{{ $product->name }}</h1>
        <div class="idol-subtitle">{{ $product->sub_title }}</div>
        <div class="fancy-divider"><span>✦</span></div>
        <p class="idol-desc">
          {!! $product->description !!}
        </p>
        <!-- SPECS -->
        <div class="specs-grid">
          @if($product->material)
          <div class="spec-card">
            <div class="spec-label">Material</div>
            <div class="spec-value">
              <span class="sicon">⚱️</span> {{ $product->material }}
            </div>
          </div>
          @endif
          @if($product->technique)
          <div class="spec-card">
            <div class="spec-label">Technique</div>
            <div class="spec-value">
              <span class="sicon">🔥</span> {{ $product->technique }}
            </div>
          </div>
          @endif
          @if($product->available_sizes)
          <div class="spec-card">
            <div class="spec-label">Available Sizes</div>
            <div class="spec-value">
              <span class="sicon">📐</span> {{ implode(' . ', explode(',', $product->available_sizes)) }} 
            </div>
          </div>
          @endif
          @if($product->finish)
          <div class="spec-card">
            <div class="spec-label">Finish</div>
            <div class="spec-value">
              <span class="sicon">✨</span> {{ $product->finish }}
            </div>
          </div>
          @endif
          @if($product->gi_certified)
          <div class="spec-card">
            <div class="spec-label">GI Certified</div>
            <div class="spec-value">
              <span class="sicon">🏛️</span> {{ $product->gi_certified }}
            </div>
          </div>
          @endif
          @if($product->delivery)
          <div class="spec-card">
            <div class="spec-label">Delivery</div>
            <div class="spec-value">
              <span class="sicon">📦</span> {{ $product->delivery }}
            </div>
          </div>
          @endif
        </div>

        <!-- FEATURE TAGS -->
        <div class="feature-tags">
          @php
              $tags = $product->tags 
                  ? explode(',', $product->tags)
                  : [];   
          @endphp
          @if($tags)
            @foreach ($tags as $tag)
              <span class="ftag">{{$tag}}</span>
            @endforeach
          @endif
        </div>

        <!-- CTA BUTTONS -->
        <div class="cta-group">
          <button class="btn-inquire" onclick="openModal()">
            <svg
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path
                d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
              />
            </svg>
            Enquire About This Idol
          </button>
          <button class="btn-whatsapp" onclick="openModal()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
              />
              <path
                d="M11.98 0C5.37 0 0 5.373 0 11.988c0 2.104.547 4.084 1.503 5.81L.057 23.882l6.305-1.654a11.955 11.955 0 0 0 5.618 1.404c6.609 0 11.98-5.372 11.98-11.987C23.96 5.373 18.588 0 11.98 0zm0 21.829a9.841 9.841 0 0 1-5.031-1.38l-.361-.214-3.741.981.997-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.265c0-5.448 4.433-9.882 9.881-9.882 5.448 0 9.882 4.434 9.882 9.882 0 5.449-4.434 9.9-9.882 9.9z"
              />
            </svg>
            WhatsApp Us
          </button>
          <button
            class="btn-wishlist"
            id="wishlistBtn"
            onclick="toggleWishlist()"
            title="Save to Wishlist"
          >
            🤍
          </button>
        </div>

        <!-- ASSURANCE ROW -->
        <div class="assurance-row">
          <div class="assurance-item">
            <span class="a-icon">🛡️</span>
            <div><strong>Authentic Craft</strong>GI Certified Swamimalai</div>
          </div>
          <div class="assurance-item">
            <span class="a-icon">📦</span>
            <div><strong>Safe Delivery</strong>Insured & Secure Packing</div>
          </div>
          <div class="assurance-item">
            <span class="a-icon">✏️</span>
            <div><strong>Custom Orders</strong>Size & Finish Options</div>
          </div>
        </div>
      </div>
    </div>

    <!-- DETAIL TABS -->
    <div class="detail-tabs-section">
      <div class="dtab-bar">
        @if($product->about_description != null)
        <button class="dtab-btn active" onclick="switchDTab('about', this)">
          About This Idol
        </button>
        @endif
        @php
            $hasSymbolism = $product->sections->contains('type', 'symbolism');
            $hasCustomisation = $product->sections->contains('type', 'customisation');
            $hasCare = $product->sections->contains('type', 'care');
        @endphp
        @if($hasSymbolism)
          <button class="dtab-btn" onclick="switchDTab('symbolism', this)">
            Iconographic Symbolism
          </button>
        @endif
        @if($hasCustomisation)
        <button class="dtab-btn" onclick="switchDTab('custom', this)">
          Customisation
        </button>
        @endif
        @if($hasCare)
        <button class="dtab-btn" onclick="switchDTab('care', this)">
          Care & Placement
        </button>
        @endif
      </div>

      <!-- ABOUT -->
      <div class="dtab-panel active" id="tab-about">
        <div class="about-grid reveal">
          <div class="about-text">
            <h3>{{ $product->about_title }}</h3>
            <p>
              {!! $product->about_description !!}
            </p>
          </div>
          @if($product->about_image)
          <div class="about-img">
            <img
              src="{{ asset('uploads/products/'.$product->id .'/'.$product->about_image) }}"
              alt="{{ $product->about_title }}"
            />
          </div>
          @endif
        </div>
      </div>

      <!-- SYMBOLISM -->
      <div class="dtab-panel" id="tab-symbolism">
        <div class="symbol-list reveal">
          @foreach ($product->sections as $section)
            @if ($section->type == "symbolism")
                <div class="symbol-item">
                  @if($section->image)
                    <div class="symbol-icon-wrap">
                      <img src="{{ asset('uploads/products/'.$product->id .'/'.$section->image) }}" />
                    </div>
                  @endif
                  <div>
                    <h4>{{ $section->title }}</h4>
                    <p>{{ $section->description }}</p>
                  </div>
                </div>
            @endif
          @endforeach
        </div>
      </div>

      <!-- CUSTOMISATION -->
      <div class="dtab-panel" id="tab-custom">
        <p class="custom-intro reveal">
          Every Cholan Arts idol can be personalised to your precise
          requirements. Whether for your home puja room, temple, or as a sacred
          gift - we work closely with master artisans to fulfil your vision with
          devotion and precision.
        </p>
        <div class="custom-grid reveal">
          @foreach ($product->sections as $section)
            @if ($section->type == "customisation")
                <div class="custom-card">
                  @if($section->image)
                  <div class="icon-box">
                    <img src="{{ asset('uploads/products/'.$product->id .'/'.$section->image) }}" />
                  </div>
                  @endif
                  <h4>{{ $section->title }}</h4>
                  <p>{{ $section->description }}</p>
                </div>
            @endif
          @endforeach
        </div>
        <div style="text-align: center">
          <button
            class="btn-inquire"
            style="display: inline-flex; max-width: 320px"
            onclick="openModal()"
          >
            Discuss Custom Requirements →
          </button>
        </div>
      </div>

      <!-- CARE -->
      <div class="dtab-panel" id="tab-care">
        <div class="symbol-list reveal">
          @foreach ($product->sections as $section)
            @if ($section->type == "care")
                 <div class="symbol-item">
                  @if($section->image)
                  <div class="symbol-icon-wrap">
                    <img src="{{ asset('uploads/products/'.$product->id .'/'.$section->image) }}" />
                  </div>
                  @endif
                  <div>
                    <h4>{{ $section->title }}</h4>
                    <p>{{ $section->description }}</p>
                  </div>
                </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>

    <!-- ===== Our Related Idols ===== -->
    <section class="products-section" aria-labelledby="deity-idols-title">
      <div class="swiper-nav-row">
        <h2 class="section-title" id="deity-idols-title">Our Related Idols</h2>
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
            stroke-linejoin="round"
          >
            <path d="M20 12H4M15 7L20 12L15 17" />
          </svg>
        </a>
      </div>
      <div class="products-swiper swiper" id="deitySwiper">
        <div class="swiper-wrapper">
          @foreach ($relatedProducts as $relatedProduct)
            <div class="swiper-slide">
              <a href="/product/{{ $relatedProduct->slug }}">
                <article class="product-card">
                  <div class="product-card-img">
                    <img
                      src="{{ $relatedProduct->feature_image ? asset('uploads/products/'.$relatedProduct->id .'/' . $relatedProduct->feature_image) : asset('assets/images/products-img/placeholder-product.jpg') }}"
                      alt="Relaxing Ganesh handcrafted wooden idol"
                      loading="lazy"
                      width="600"
                      height="300"
                    />
                  </div>
                  <div class="product-card-body">
                    <h3 class="product-card-title">{{ $relatedProduct->name }}</h3>
                    <p class="product-card-desc">
                      {{ $relatedProduct->sub_title }}
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

    <!-- ===== FAQs ===== -->
    @if($product->faqs && $product->faqs->count() > 0)
      <section class="faq-section">
          <div class="container">

              <div class="faq-header text-center">
                  <h2 class="section-title sec-h2" >Frequently Asked Questions</h2>
                  <p class="sec-body">Everything you need to know about this idol</p>
              </div>

              <div class="faq-list">

                  @foreach($product->faqs as $faq)
                      <div class="faq-item">
                          <div class="faq-question" onclick="toggleFaq(this)">
                              <h4 class="section-title">{{ $faq->question }}</h4>
                              <span class="faq-icon">+</span>
                          </div>
                          <div class="faq-answer">
                              <p>{{ $faq->answer }}</p>
                          </div>
                      </div>
                  @endforeach

              </div>

          </div>
      </section>
    @endif

    <!-- ===== CTA BANNER ===== -->
    @include('frontend.components.cta')

    <!-- ===== SERVICE STRIP ===== -->
    <section class="service-strip" aria-label="Our services">
      <div class="service-grid">
        <div class="service-item">
          <div class="service-icon">
            <!-- HugeIcons: Call stroke-rounded -->
            <img src="{{ asset('assets/svg/headphones.svg')}}" alt="" width="50"/>
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
            <img src="{{ asset('assets/svg/package.svg')}}" alt="" width="50" />
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
            <img src="{{ asset('assets/svg/Sucure.svg')}}" alt="" width="50" />
          </div>
          <div class="service-title">Gifting &amp; Corporate Orders</div>
          <p class="service-desc">
            Make every occasion special with our customized gifting and
            corporate solutions.
          </p>
        </div>
      </div>
    </section>
    <!-- INQUIRY MODAL -->
    <div class="modal-overlay" id="inquiryModal" onclick="closeModalBg(event)">
      <div class="modal-box">
        <div class="modal-header">
          <h3>Request More Information</h3>
          <p>
            Our artisan consultants will personally respond within 24 hours.
          </p>
          <button class="modal-close" onclick="closeModal()">✕</button>
        </div>
        <div class="modal-idol-strip">
          <img
            src="{{ asset('uploads/products/'.$product->id .'/'. $product->feature_image) }}"
            alt="{{ $product->name }}"
          />
          <div>
            <div class="mis-name">{{ $product->name }}</div>
            <div class="mis-sub">
              {{ $product->sub_title }}
            </div>
          </div>
        </div>
        <div id="modalFormWrap">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
          <div class="modal-form">

            <div class="mf-row">
              <div class="mf-group">
                <label>Full Name <span>*</span></label>
                <input type="text" id="mfName" placeholder="Your full name" />
              </div>

              <div class="mf-group">
                <label>Phone Number <span>*</span></label>
                <input type="tel" id="mfPhone" placeholder="+91 00000 00000" />
              </div>
            </div>

            <div class="mf-row">
              <div class="mf-group">
                <label>Email Address</label>
                <input type="email" id="mfEmail" placeholder="your@email.com" />
              </div>

              @if($product->available_sizes)
              <div class="mf-group">
                <label>Preferred Size</label>
                <select id="mfSize">
                  <option value="" disabled selected>Select size</option>
                  @foreach (explode(',', $product->available_sizes) as $size)
                    <option>{{ $size }}</option>
                  @endforeach
                  <option>Custom / Temple Size</option>
                </select>
              </div>
              @endif
            </div>

            <div class="mf-row">
              <div class="mf-group">
                <label>Purpose</label>
                <select id="mfPurpose">
                  <option value="" disabled selected>Select purpose</option>
                  <option>Home Puja Room</option>
                  <option>Temple Installation</option>
                  <option>Gift / Gifting</option>
                  <option>Office / Studio</option>
                  <option>Art Collection</option>
                </select>
              </div>

              <div class="mf-group">
                <label>Preferred Finish</label>
                <select id="mfFinish">
                  <option value="" disabled selected>Select finish</option>
                  <option>Antique Dark Bronze</option>
                  <option>Polished Gold</option>
                  <option>Silver-Plated</option>
                  <option>Dual-Tone</option>
                  <option>Not Sure - Advise Me</option>
                </select>
              </div>
            </div>

            <div class="mf-row" style="grid-template-columns: 1fr">
              <div class="mf-group full">
                <label>Message</label>
                <textarea id="mfMsg" placeholder="Your message..."></textarea>
              </div>
            </div>

            <button class="btn-submit-modal" onclick="submitInquiry()">
              Send Enquiry
            </button>

            <p class="modal-note">
              🔒 Your details are safe with us
            </p>

          </div>
        </div>
        <div class="modal-success" id="modalSuccess">
          <div class="success-check">✓</div>
          <h4>Enquiry Sent!</h4>
          <p>
            Thank you for your interest in Lord Nataraja. Our artisan consultant
            will contact you within 24 hours with detailed information and
            photographs.
          </p>
        </div>
      </div>
    </div>
    @if($product->faqs && $product->faqs->count() > 0)
    <script type="application/ld+json">
    @verbatim
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
    @endverbatim

    @foreach($product->faqs as $key => $faq)
    {
        "@type": "Question",
        "name": {!! json_encode($faq->question) !!},
        "acceptedAnswer": {
            "@type": "Answer",
            "text": {!! json_encode($faq->answer) !!}
        }
    }@if(!$loop->last),@endif
    @endforeach

    @verbatim
        ]
    }
    @endverbatim
    </script>
    @endif
@endsection
@push('scripts')
    <script>
      // ── Image Gallery ────────────────────
      function changeImg(thumb, src) {
        document.getElementById("mainImg").src = src;
        document
          .querySelectorAll(".thumb")
          .forEach((t) => t.classList.remove("active"));
        thumb.classList.add("active");
      }

      // ── Detail Tabs ──────────────────────
      function switchDTab(id, btn) {
        document
          .querySelectorAll(".dtab-panel")
          .forEach((p) => p.classList.remove("active"));
        document
          .querySelectorAll(".dtab-btn")
          .forEach((b) => b.classList.remove("active"));
        document.getElementById("tab-" + id).classList.add("active");
        btn.classList.add("active");
      }

      // ── Wishlist ─────────────────────────
      function toggleWishlist() {
        const btn = document.getElementById("wishlistBtn");
        btn.classList.toggle("liked");
        btn.textContent = btn.classList.contains("liked") ? "❤️" : "🤍";
      }

      // ── Modal ────────────────────────────
      function openModal() {
        document.getElementById("inquiryModal").classList.add("open");
        document.body.style.overflow = "hidden";
      }
      function closeModal() {
        document.getElementById("inquiryModal").classList.remove("open");
        document.body.style.overflow = "";
      }
      function closeModalBg(e) {
        if (e.target.id === "inquiryModal") closeModal();
      }

      function submitInquiry() {

          const full_name = document.getElementById('mfName').value.trim();
          const email = document.getElementById('mfEmail').value.trim();
          let rawPhone = document.getElementById('mfPhone').value.trim();
          const preferred_size = document.getElementById('mfSize')?.value || '';
          const purpose = document.getElementById('mfPurpose')?.value || '';
          const preferred_finish = document.getElementById('mfFinish')?.value || '';
          const message = document.getElementById('mfMsg').value.trim();
          const product_id = document.getElementById('product_id').value;

          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          const validChars = /^[0-9+\-\s]+$/;

          //Required validation
          if (!full_name || !rawPhone || !email) {
              alert('Name/Phone/Email are required');
              return;
          }

          //Email validation
          if (email && !emailPattern.test(email)) {
              alert('Enter valid email');
              return;
          }

          //Phone validation
          if (rawPhone && !validChars.test(rawPhone)) {
              alert('Phone contains invalid characters');
              return;
          }

          let phone = rawPhone.replace(/\D/g, '');

          if (phone.startsWith('91')) phone = phone.substring(2);

          if (phone.length !== 10) {
              alert('Enter valid 10 digit phone number');
              return;
          }

          const btn = document.querySelector('.btn-submit-modal');
          btn.disabled = true;
          btn.innerText = 'Sending...';

          fetch('/enquiry', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              },
              body: JSON.stringify({
                  full_name,
                  email,
                  phone,
                  preferred_size,
                  purpose,
                  preferred_finish,
                  message,
                  product_id
              })
          })
          .then(res => res.json())
          .then(data => {
              btn.disabled = false;
              btn.innerText = 'Send Enquiry';

              if (data.status) {
                  alert('Enquiry sent successfully ✅');

                  // reset form
                  document.querySelectorAll('.modal-form input, .modal-form textarea').forEach(el => el.value = '');
                  document.querySelectorAll('.modal-form select').forEach(el => el.selectedIndex = 0);
              } else {
                  alert('Something went wrong!');
              }
          })
          .catch(err => {
              btn.disabled = false;
              btn.innerText = 'Send Enquiry';
              console.error(err);
              alert('Server error! Try again later');
          });
      }

      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeModal();
      });

      // ── Scroll Reveal ────────────────────
      const revealEls = document.querySelectorAll(".reveal");
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("visible");
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1 },
      );
      revealEls.forEach((el) => observer.observe(el));

      //toggle for faq
      function toggleFaq(el) {
          let item = el.parentElement;

          // accordion behavior (only one open)
          document.querySelectorAll('.faq-item').forEach(f => {
              if (f !== item) f.classList.remove('active');
          });

          item.classList.toggle('active');
      }
    </script>
    <script>
      // ===== PRODUCTS SWIPER 1 =====
      new Swiper("#deitySwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        speed: 600,
        pagination: { el: "#deitySwiper .swiper-pagination", clickable: true },
        breakpoints: {
          480: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1024: { slidesPerView: 4 },
        },
        a11y: { enabled: true },
      });
    </script>
@endpush