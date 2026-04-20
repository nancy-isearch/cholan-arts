<!-- ===== NAVBAR ===== -->
    <nav role="navigation" aria-label="Main navigation">
      <a href="/" aria-label="Cholan Arts Home">
        <!-- Text logo fallback - replace src with real logo -->
        <img
          src="{{ asset('assets/svg/brand-logo.png') }}"
          alt="Relaxing Ganesh handcrafted wooden idol"
          loading="lazy"
          width="150"
        />
      </a>

      <ul class="nav-links" role="list">
        <li><a href="/" {{ request()->is('/') ? 'aria-current=page' : '' }}>Home</a></li>
        <li><a href="/about-us" {{ request()->is('about-us') ? 'aria-current=page' : '' }}>About Us</a></li>
        <li><a href="/products" {{ request()->is('products') ? 'aria-current=page' : '' }} >Products</a></li>
        <!--<li><a href="#">Best Sellers</a></li>-->
        <!-- Categories Dropdown -->
        <li class="dropdown">
          <span class="dropdown-toggle">Categories</span>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ url('products') }}">
                All Products
              </a>
            </li>
            @foreach($menuCategories as $category)
              <li>
                <a href="{{ url('products?c='.$category->name) }}">
                  {{ ucfirst($category->name) }}
                </a>
              </li>
            @endforeach
          </ul>
        </li>
        <li><a href="/contact-us" {{ request()->is('contact-us') ? 'aria-current=page' : '' }}>Contact Us</a></li>
      </ul>

      <div class="nav-actions">
        <div class="search-bar" role="search" aria-label="Search products">
          <!-- HugeIcons: Search icon stroke-rounded -->
          {{-- <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#888"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M17.5 17.5L22 22" />
            <path
              d="M20 11C20 15.9706 15.9706 20 11 20C6.02944 20 2 15.9706 2 11C2 6.02944 6.02944 2 11 2C15.9706 2 20 6.02944 20 11Z"
            />
          </svg>
          <span>Search</span> --}}
          <input type="text" id="searchInput" placeholder="Search products..." autocomplete="off" style="border: none; background: none;">
          <div id="suggestions"></div>
        </div>

        <a href="/contact-us" class="btn-outline-orange" aria-label="Contact Us">
          Contact Us
          <!-- HugeIcons: Arrow Right stroke-rounded -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#ff9933"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M20.0001 12H4.00012" />
            <path
              d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7"
            />
          </svg>
        </a>

        <button
          class="hamburger"
          aria-label="Toggle menu"
          aria-expanded="false"
          aria-controls="mobile-nav"
        >
          <span></span><span></span><span></span>
        </button>
      </div>
    </nav>

    <!-- Mobile Nav -->
    <nav
      class="mobile-nav"
      id="mobile-nav"
      role="navigation"
      aria-label="Mobile navigation"
    >
      <a href="/">Home</a>
      <a href="/about-us">About Us</a>
      <a href="/products">Products</a>
      <!--<a href="#">Best Sellers</a>-->
      <!-- Categories Dropdown -->
      <div class="mobile-dropdown">
        <div class="dropdown-toggle" onclick="toggleMobileDropdown()">
          Categories
          <span class="arrow">▼</span>
        </div>

        <ul class="dropdown-menu" id="mobileCategoryMenu">
          <li>
            <a href="{{ url('products') }}">All Products</a>
          </li>

          @foreach($menuCategories as $category)
            <li>
              <a href="{{ url('products?c='.$category->name) }}">
                {{ ucfirst($category->name) }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
      <a href="/contact-us" class="btn-orange">Contact Us</a>
    </nav>