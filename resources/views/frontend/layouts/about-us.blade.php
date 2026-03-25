<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us – Cholan Arts</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/pages/about-us.css') }}" />
  </head>
  <body>
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer') 

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
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
  </body>
</html>
