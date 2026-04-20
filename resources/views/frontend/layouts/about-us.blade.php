<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Cholan Arts')</title>

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/svg/favicon-16x16.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,300;0,6..72,400;0,6..72,500;1,6..72,300;1,6..72,400&family=Poppins:wght@300;400;500;600&family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/about-us.css') }}" />
    <!-- Elfsight Google Reviews | Cholan Arts  -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
  </head>
  <body>
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer') 
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
      function toggleMobileDropdown() {
        const dropdown = document.querySelector(".mobile-dropdown");
        dropdown.classList.toggle("active");
      }
      // ===== REVIEWS SWIPER =====
      new Swiper(".reviews-swiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        speed: 600,
        pagination: {
          el: ".reviews-swiper .swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        },
      });
    </script>

    <script>
      // ── Scroll Reveal ──────────────────────────────
      const revealEls = document.querySelectorAll(
        ".reveal, .reveal-left, .reveal-right",
      );
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("visible");
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1, rootMargin: "0px 0px -40px 0px" },
      );
      revealEls.forEach((el) => observer.observe(el));

      // ── Counter animation ──────────────────────────
      function animateCount(el, target, suffix) {
        let current = 0;
        const step = Math.ceil(target / 60);
        const timer = setInterval(() => {
          current = Math.min(current + step, target);
          el.querySelector(".n").textContent =
            current.toLocaleString() + suffix;
          if (current >= target) clearInterval(timer);
        }, 25);
      }
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
    <script>

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
    @stack('scripts') 
    

    
  </body>
</html>
