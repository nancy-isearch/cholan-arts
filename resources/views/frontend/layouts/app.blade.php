<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('seo_title', 'Cholan Arts')</title>

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta name="description" content="@yield('seo_description', 'Cholan Arts preserves the ancient Lost Wax tradition of the Chola Dynasty. Shop authentic handcrafted bronze deity idols - Ganesha, Shiva, Nataraja, Lakshmi and more.')" />
    <meta name="keywords" content="@yield('seo_keywords', 'bronze idols, hindu idols, ganesha idol, shiva idol, nataraja statue, lakshmi idol, handcrafted idols, cholan arts')" />
    
    <meta name="author" content="Cholan Arts Emporium" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('seo_title', 'Cholan Arts - Handcrafted Divine Idols')" />
    <meta property="og:description" content="@yield('seo_description', 'Cholan Arts preserves the ancient Lost Wax tradition of the Chola Dynasty. Shop authentic handcrafted bronze deity idols - Ganesha, Shiva, Nataraja, Lakshmi and more.')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('seo_image', 'https://img.freepik.com/free-photo/traditional-bronze-idol_og.jpg')" />
    <meta property="og:locale" content="en_IN" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('seo_title', 'Cholan Arts - Handcrafted Divine Idols')" />
    <meta name="twitter:description" content="@yield('seo_description', 'Cholan Arts preserves the ancient Lost Wax tradition of the Chola Dynasty. Shop authentic handcrafted bronze deity idols - Ganesha, Shiva, Nataraja, Lakshmi and more.')" />
    <meta name="twitter:image" content="@yield('seo_image', 'https://img.freepik.com/free-photo/traditional-bronze-idol_og.jpg')" />

    

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/svg/favicon-16x16.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,300;0,6..72,400;0,6..72,500;1,6..72,300;1,6..72,400&family=Poppins:wght@300;400;500;600&family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Swiper.js -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/idol-detailes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/privacy-policy.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <!-- Elfsight Google Reviews | Cholan Arts  -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
      <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if($seo && !empty($seo->schema_json))
      
      @if($seo->page_key == 'home')
        @php
          $schemas = [];
          if (is_string($seo->schema_json)) {
              $decoded = json_decode($seo->schema_json, true);
              $schemas = is_array($decoded) ? $decoded : [];
          }
        @endphp
          @foreach($schemas as $schema)
              @if($schema['position'] === 'head')
              <script type="application/ld+json">
                  {!! $schema['code'] !!}
                  </script>
              @endif
          @endforeach
      @else
          <script type="application/ld+json">
          {!! $seo->schema_json !!}
          </script>
      @endif
    @endif
  </head>

    <body>
       @include('frontend.components.header')
       
       @yield('content')

       @include('frontend.components.footer') 


      @if($seo && !empty($seo->schema_json))
        @if($seo->page_key == 'home')
          @php
            $schemas = [];
            if (is_string($seo->schema_json)) {
                $decoded = json_decode($seo->schema_json, true);
                $schemas = is_array($decoded) ? $decoded : [];
            }
          @endphp
            @foreach($schemas as $schema)
                @if($schema['position'] === 'body')
                  <script type="application/ld+json">
                    {!! $schema['code'] !!}
                    </script> 
                @endif
            @endforeach
        @endif
      @endif



        <!-- Swiper.js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    @stack('scripts')
    <script>
      function toggleMobileDropdown() {
        const dropdown = document.querySelector(".mobile-dropdown");
        dropdown.classList.toggle("active");
      }
      // ===== HERO SWIPER =====
      new Swiper(".hero-swiper", {
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        speed: 700,
        effect: "fade",        
        fadeEffect: { crossFade: true },
        pagination: {
          el: ".hero-swiper .swiper-pagination",
          clickable: true,
          dynamicBullets: true,
        },
        navigation: {
          nextEl: "#hero-next-btn",
          prevEl: "#hero-prev-btn",
        },
        a11y: {
          prevSlideMessage: "Previous slide",
          nextSlideMessage: "Next slide",
        },
      });

      // ===== PRODUCTS SWIPER 1 =====
      new Swiper("#deitySwiper", {
        slidesPerView: 1.2,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
          
        },
        speed: 600,
        pagination: { el: "#deitySwiper .swiper-pagination", clickable: true, dynamicBullets: true },
        breakpoints: {
          480: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1024: { slidesPerView: 4 },
        },
        a11y: { enabled: true },
      });

      // ===== PRODUCTS SWIPER 2 =====
      new Swiper("#moreIdolsSwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 4500,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        speed: 600,
        pagination: {
          el: "#moreIdolsSwiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          480: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1024: { slidesPerView: 4 },
        },
      });

      // ===== REVIEWS SWIPER =====
      new Swiper(".reviews-swiper", {
        slidesPerView: 1.2,
        spaceBetween: 15,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        speed: 600,
        pagination: {
          el: ".reviews-swiper .swiper-pagination",
          clickable: true, dynamicBullets: true,
        },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        },
      });

      // ===== HAMBURGER =====
      const hamburger = document.querySelector(".hamburger");
      const mobileNav = document.querySelector(".mobile-nav");

      hamburger.addEventListener("click", () => {
        const isOpen = mobileNav.classList.toggle("open");
        hamburger.classList.toggle("open", isOpen);
        hamburger.setAttribute("aria-expanded", isOpen);
        document.body.style.overflow = isOpen ? "hidden" : "";
      });

      // Close mobile nav when a link is clicked
      mobileNav.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
          mobileNav.classList.remove("open");
          hamburger.classList.remove("open");
          hamburger.setAttribute("aria-expanded", "false");
          document.body.style.overflow = "";
        });
      });

      // ===== NAVBAR SCROLL SHADOW =====
      const nav = document.querySelector("nav");
      window.addEventListener(
        "scroll",
        () => {
          nav.style.boxShadow =
            window.scrollY > 10
              ? "0 4px 20px rgba(0,0,0,0.12)"
              : "0 2px 16px rgba(0,0,0,0.08)";
        },
        { passive: true },
      );
      
    </script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1.2,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          0: {
            slidesPerView: 1.2,
          },
          768: {
            slidesPerView: 1.5, 
          },
          1024: {
            slidesPerView: 2.2,
          },
        },
      });
    </script>

    <script>
      var swiper = new Swiper(".featuredSwiper", {
        slidesPerView: 1.25, // shows next 3/4 slide
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        breakpoints: {
          768: {
            slidesPerView: 1.4,
          },
          1024: {
            slidesPerView: 1.75, // desktop pe better 3/4 effect
          },
        },
      });
    </script>
    <script>
        const input = document.getElementById('searchInput');
        const suggestions = document.getElementById('suggestions');

        input.addEventListener('keyup', function () {
            let query = this.value;

            if (query.length < 2) {
                suggestions.style.display = 'none';
                return;
            }

            fetch(`/search-suggest?q=${query}`)
                .then(res => res.json())
                .then(data => {
                    suggestions.innerHTML = '';

                    if (data.length === 0) {
                        suggestions.style.display = 'none';
                        return;
                    }
                    data.forEach(item => {
                        let category = item.categories[0]; // first category

                        let div = document.createElement('div');
                        div.classList.add('suggestion-item');
                        let imageUrl = item.feature_image 
          ? `uploads/products/${item.id}/${item.feature_image}` 
        : `assets/images/products-img/placeholder-product.jpg`;
                        div.innerHTML = `
                            <img src="/${imageUrl}" />
                            <div class="suggestion-text">
                              <span>${item.name}</span>
                            </div>
                        `;

                        div.onclick = () => {
                            window.location.href = `/product/${item.slug}`;
                        };

                        suggestions.appendChild(div);
                    });

                    suggestions.style.display = 'block';
                });
        });

        document.addEventListener('click', function (e) {
            const searchBox = document.querySelector('.search-bar');
            const suggestions = document.getElementById('suggestions');
            const input = document.getElementById('searchInput');

            if (!searchBox.contains(e.target)) {
                suggestions.style.display = 'none';
                input.value = '';
            }
        });
    </script>
    </body>
</html>
