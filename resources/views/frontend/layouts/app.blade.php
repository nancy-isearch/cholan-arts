<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('seo_title', 'Cholan Arts')</title>
    <meta name="description" content="@yield('seo_description', 'Cholan Arts preserves the ancient Lost Wax tradition of the Chola Dynasty. Shop authentic handcrafted bronze deity idols - Ganesha, Shiva, Nataraja, Lakshmi and more.')" />
    <meta name="keywords" content="@yield('seo_keywords', 'bronze idols, hindu idols, ganesha idol, shiva idol, nataraja statue, lakshmi idol, handcrafted idols, cholan arts')" />


    <meta name="author" content="Cholan Arts Emporium" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://cholanarts.com/" />

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

    {{-- <!-- Structured Data -->
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Store",
        "name": "Cholan Arts Emporium",
        "description": "Handcrafted bronze Hindu deity idols preserving the Lost Wax tradition of the Chola Dynasty",
        "url": "https://cholanarts.com",
        "telephone": "",
        "email": "support@cholanarts.com",
        "openingHours": "Mo-Su 10:00-19:00",
        "address": { "@type": "PostalAddress", "addressCountry": "IN" },
        "sameAs": [
          "https://www.instagram.com/cholanarts",
          "https://www.facebook.com/cholanarts"
        ]
      }
    </script> --}}

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

      <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
  </head>

    <body>
       @include('frontend.components.header')
       
       @yield('content')

       @include('frontend.components.footer') 
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
      // ===== HERO SWIPER =====
      new Swiper(".hero-swiper", {
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        speed: 700,
        effect: "fade",
        fadeEffect: { crossFade: true },
        pagination: {
          el: ".hero-swiper .swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".hero-swiper .swiper-button-next",
          prevEl: ".hero-swiper .swiper-button-prev",
        },
        a11y: {
          prevSlideMessage: "Previous slide",
          nextSlideMessage: "Next slide",
        },
      });

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
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 1.5,
          },
          1024: {
            slidesPerView: 2,
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
    </body>
</html>
