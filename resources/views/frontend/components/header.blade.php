<!-- ===== NAVBAR ===== -->
<nav role="navigation" aria-label="Main navigation">
    <a href="/" aria-label="Cholan Arts Home">
        <img src="{{ asset('assets/svg/brand-logo.png') }}" alt="Relaxing Ganesh handcrafted wooden idol" loading="lazy"
            width="150" />
    </a>

    <ul class="nav-links" role="list">
        <li><a href="/" {{ request()->is('/') ? 'aria-current=page' : '' }}>Home</a></li>
        <li><a href="/about-us" {{ request()->is('about-us') ? 'aria-current=page' : '' }}>About Us</a></li>
        <li><a href="/products" {{ request()->is('products') ? 'aria-current=page' : '' }}>Products</a></li>
        <li class="dropdown mega-menu-wrapper">
            <a class="dropdown-toggle" href="/categories" {{ request()->is('categories') ? 'aria-current=page' : '' }}>
                Categories
                <svg class="mega-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>

            <div class="mega-menu">
                <div class="mega-menu-inner">

                    {{-- Categories - 3 columns --}}
                    @if ($menuCategories->isNotEmpty())
                        <div class="mega-section categories-section">
                            <p class="mega-section-label">Idols</p>
                            <ul class="mega-list">
                                @foreach ($menuCategories as $category)
                                    <li>
                                        <a href="{{ url('category/' . $category->name.'-idols') }}" class="mega-link">
                                            <span class="mega-link-icon">&#9670;</span>
                                            {{ ucfirst($category->name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Vertical Divider --}}
                    @if ($menuCollections->isNotEmpty() && $menuCategories->isNotEmpty())
                        <div class="mega-divider"></div>
                    @endif

                    {{-- Collections - right side box --}}
                    @if ($menuCollections->isNotEmpty())
                        <div class="mega-section collections-section">
                            <p class="mega-section-label">Collections</p>
                            <ul class="mega-list">
                                @foreach ($menuCollections as $collection)
                                    <li>
                                        <a href="{{ url('collection/' . Str::slug($collection->name)) }}" class="mega-link">
                                            <span class="mega-link-icon">&#9670;</span>
                                            {{ ucfirst($collection->name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="/contact-us" class="btn-orange mt-4">
                                Contact Us
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 12H4M15 7L20 12L15 17"></path>
                                </svg>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </li>
        <li><a href="/contact-us" {{ request()->is('contact-us') ? 'aria-current=page' : '' }}>Contact Us</a></li>
    </ul>

    <div class="nav-actions">
        <div class="search-bar" role="search" aria-label="Search products">
            <input type="text" id="searchInput" placeholder="Search products..." autocomplete="off"
                style="border: none; background: none;">
            <div id="suggestions"></div>
        </div>

        <a href="/contact-us" class="btn-outline-orange" aria-label="Contact Us">
            Contact Us
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="#ff9933" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.0001 12H4.00012" />
                <path d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7" />
            </svg>
        </a>

        <button class="hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobile-nav">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- ===== MOBILE NAV ===== -->
<nav class="mobile-nav" id="mobile-nav" role="navigation" aria-label="Mobile navigation">

    <a href="/">Home</a>
    <a href="/about-us">About Us</a>
    <a href="/products">Products</a>

    <!-- Categories Mobile Dropdown -->
    <div class="mobile-dropdown">
        <a class="dropdown-toggle" onclick="toggleMobileDropdown(event)">
            Categories
            <span class="arrow">▼</span>
        </a>

        <div class="mobile-mega-menu" id="mobileCategoryMenu">

            {{-- Categories --}}
            @if ($menuCategories->isNotEmpty())
                <div class="mobile-mega-section">
                    <p class="mobile-mega-label">Idols</p>
                    <ul class="mobile-mega-list categories-list">
                        @foreach ($menuCategories as $category)
                            <li>
                                <a href="{{ url('category/' . $category->name.'-idols') }}" class="mobile-mega-link">
                                    <span class="mobile-mega-icon">&#9670;</span>
                                    {{ ucfirst($category->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Collections --}}
            @if ($menuCollections->isNotEmpty())
                <div class="mobile-mega-divider"></div>
                <div class="mobile-mega-section mobile-collections-box">
                    <p class="mobile-mega-label">Collections</p>
                    <ul class="mobile-mega-list collections-list">
                        @foreach ($menuCollections as $collection)
                            <li>
                                <a href="{{ url('collection/' . Str::slug($collection->name)) }}" class="mobile-mega-link">
                                    <span class="mobile-mega-icon">&#9670;</span>
                                    {{ ucfirst($collection->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <a href="/contact-us" class="btn-orange">Contact Us</a>
</nav>




<script>
    // ===== HAMBURGER — mobile nav open/close =====
    // const hamburger = document.querySelector('.hamburger');
    // const mobileNav = document.getElementById('mobile-nav');

    // if (hamburger && mobileNav) {
    //     hamburger.addEventListener('click', function() {
    //         const isOpen = mobileNav.classList.toggle('open');
    //         hamburger.classList.toggle('open', isOpen);
    //         hamburger.setAttribute('aria-expanded', isOpen);

    //         // Jab mobile nav band ho to dropdown bhi band karo
    //         if (!isOpen) closeMobileDropdown();
    //     });
    // }

    // // ===== MOBILE DROPDOWN — Categories toggle =====
    // function toggleMobileDropdown(e) {
    //     e.preventDefault(); // Page redirect rok do
    //     const wrapper = document.querySelector('.mobile-dropdown');
    //     const menu = document.getElementById('mobileCategoryMenu');
    //     if (!wrapper || !menu) return;

    //     const isOpen = wrapper.classList.toggle('open');
    //     menu.classList.toggle('open', isOpen);
    // }

    // function closeMobileDropdown() {
    //     const wrapper = document.querySelector('.mobile-dropdown');
    //     const menu = document.getElementById('mobileCategoryMenu');
    //     if (wrapper) wrapper.classList.remove('open');
    //     if (menu) menu.classList.remove('open');
    // }

    // ===== MOBILE NAV LINKS — click par mobile nav band karo =====
    // Sirf non-toggle links (Home, About, Products, Contact, mega-menu items)
    // document.addEventListener('DOMContentLoaded', function() {
    //     // Mobile nav ke direct <a> links (Home, About Us, Products, Contact Us)
    //     document.querySelectorAll('#mobile-nav > a').forEach(function(link) {
    //         link.addEventListener('click', function() {
    //             mobileNav.classList.remove('open');
    //             hamburger.classList.remove('open');
    //             hamburger.setAttribute('aria-expanded', 'false');
    //             closeMobileDropdown();
    //         });
    //     });

    //     // Mega menu ke andar category/collection links — click par sab band
    //     document.querySelectorAll('.mobile-mega-link').forEach(function(link) {
    //         link.addEventListener('click', function() {
    //             mobileNav.classList.remove('open');
    //             hamburger.classList.remove('open');
    //             hamburger.setAttribute('aria-expanded', 'false');
    //             closeMobileDropdown();
    //         });
    //     });
    // });
</script>
