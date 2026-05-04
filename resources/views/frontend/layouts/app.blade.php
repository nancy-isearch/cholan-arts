<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PSL5FKDQ');</script>
    <!-- End Google Tag Manager -->
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
        rel="stylesheet" />

    <!-- Swiper.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/idol-detailes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/privacy-policy.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <!-- Elfsight Google Reviews | Cholan Arts  -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if ($seo && !empty($seo->schema_json))

        @if ($seo->page_key == 'home')
            @php
                $schemas = [];
                if (is_string($seo->schema_json)) {
                    $decoded = json_decode($seo->schema_json, true);
                    $schemas = is_array($decoded) ? $decoded : [];
                }
            @endphp
            @foreach ($schemas as $schema)
                @if ($schema['position'] === 'head')
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
<!-- Google tag (gtag.js) start --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-449V2HLR8Q"></script> 
<script>   
window.dataLayer = window.dataLayer || [];   
function gtag(){dataLayer.push(arguments);}   
gtag('js', new Date());   
gtag('config', 'G-449V2HLR8Q'); 
</script>
<!-- Google tag (gtag.js) end -->

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSL5FKDQ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')

    @if ($seo && !empty($seo->schema_json))
        @if ($seo->page_key == 'home')
            @php
                $schemas = [];
                if (is_string($seo->schema_json)) {
                    $decoded = json_decode($seo->schema_json, true);
                    $schemas = is_array($decoded) ? $decoded : [];
                }
            @endphp
            @foreach ($schemas as $schema)
                @if ($schema['position'] === 'body')
                    <script type="application/ld+json">
                    {!! $schema['code'] !!}
                    </script>
                @endif
            @endforeach
        @endif
    @endif

    <!-- Swiper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    @stack('scripts')
    <script src="{{ asset('assets/js/app.js') }}" async></script>
</body>

</html>
