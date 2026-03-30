@extends('frontend.layouts.app')
@section('title','Gallery - Cholan Arts')
@section('content')
    <!-- HERO -->
    <section class="inner-banner">
      <span class="mb-3">Our Catalog</span>
      <h1>Moments of <em>Art & Grace</em></h1>
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

        <!-- TAB BAR -->
        <div class="tab-bar-outer">
           <!-- LEFT BUTTON -->
          <button class="tab-scroll-btn left" onclick="scrollTabs(-1)">
              ‹
          </button>
          <div class="tab-bar" id="tabBar">
            <button class="tab-btn {{ empty($categoryName) || $categoryName == 'all' ? 'active' : '' }}" onclick="switchTab('all', this)">
              <span class="tab-emoji"></span> All Photos
              <span class="tab-count" id="tc-all">{{$totalProducts}}</span>
            </button>

            {{-- Dynamic Categories --}}
            @foreach($categories as $category)
                <button class="tab-btn {{ $categoryName == $category->name ? 'active' : '' }}" onclick="switchTab('{{ $category->name }}', this)">
                    <span class="tab-emoji"></span> {{ ucfirst($category->name) }}
                    <span class="tab-count" id="tc-{{ $category->name }}">{{$category->active_products_count}}</span>
                </button>
            @endforeach
          </div>
          <!-- RIGHT BUTTON -->
          <button class="tab-scroll-btn right" onclick="scrollTabs(1)">
              ›
          </button>
        </div>

        <!-- GRID -->
        <div class="masonry-grid" id="mainGrid"></div>

        <!-- PAGINATION -->
        <div class="pagination-wrap">
          <div class="page-info" id="pageInfo"></div>
          <button class="load-more-btn" id="loadMoreBtn" onclick="loadMore()">
            Load More Photos
            <span
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                color="currentColor"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path d="M12 18.502V5.00195" />
                <path
                  d="M18 13.002C18 13.002 13.5811 19.0019 12 19.002C10.4188 19.002 6 13.002 6 13.002"
                />
              </svg>
            </span>
          </button>
          <div class="progress-bar-wrap">
            <div
              class="progress-bar-fill"
              id="progressFill"
              style="width: 0%"
            ></div>
          </div>
          <!-- Lightbox -->
          <div id="lightbox" onclick="closeLightboxBg(event)">
            <img id="lbImg">
            <span id="lbTag"></span>
            <h4 id="lbTitle"></h4>
            <p id="lbDesc"></p>
          </div>
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
<script>
  function scrollTabs(direction) {
      const tabBar = document.getElementById('tabBar');

      const scrollAmount = 200; // adjust as needed

      tabBar.scrollBy({
          left: direction * scrollAmount,
          behavior: 'smooth'
      });
  }
  window.addEventListener("pageshow", function (event) {
      document.body.style.overflow = ""; // fix scroll lock

      if (event.persisted) {
          fetchProducts(activeCat, true); // reload grid
          window.scrollTo(0, 0); // reset scroll
      }
  });
  let currentPage = 1;
  let lastPage = 1;
  let totalItems = 0;

  let activeCat = "all";
  let lbItems = [];
  let lbIdx = 0;

  const PAGE_SIZE = 20;

  const CAT_LABELS = {
    ganesha: "Lord Ganesha",
    shiva: "Lord Shiva",
    buddha: "Buddha",
    krishna: "Lord Krishna",
    events: "Performances",
    workshops: "Workshops",
    festivals: "Festivals",
    all: "All",
  };

  // ================= FETCH PRODUCTS =================
  function fetchProducts(category, reset = true) {
    if (reset) {
      currentPage = 1;
      $("#mainGrid").html("<p>Loading...</p>");
      lbItems = [];
    }

    $.ajax({
      url: "/get-products",
      type: "GET",
      data: {
        category: category,
        page: currentPage,
      },
      success: function (res) {

        if (reset) $("#mainGrid").html("");

        totalItems = res.total;
        lastPage = res.last_page;

        res.data.forEach((item, index) => {
          lbItems.push(item);
          $("#mainGrid").append(createCard(item, lbItems.length - 1));
        });

        updatePaginationUI();
      },
    });
  }


  // ================= CREATE CARD =================
  function createCard(item, index) {
    console.log("item => ", item)
    const div = document.createElement("div");
    div.className = "gallery-item";

    if (item.size) {
      div.classList.add(item.size); // ✅ IMPORTANT
    }
    div.innerHTML = `<a href="/product/${item.slug}">
      <img src="${item.image}" alt="${item.title}" loading="lazy" />
      <div class="gallery-overlay">
        <div class="overlay-content">
          <span class="oc-tag">${CAT_LABELS[item.category] || item.category}</span>
          <h4>${item.title}</h4>
          <p>${item.desc}</p>
        </div>
      </div>
      <div class="overlay-zoom">⊕</div></a>
    `;

    div.addEventListener("click", () => openLightbox(index));

    return div;
  }


  // ================= SWITCH TAB =================
  function switchTab(cat, btn) {
    
    let url = new URL(window.location.href);
    url.searchParams.delete('c');
    console.log("here i am => ", url)
    // 🔥 URL update without reload
    window.history.replaceState({}, '', url.toString());


    $(".tab-btn").removeClass("active");
    $(btn).addClass("active");

    activeCat = cat;

    fetchProducts(cat, true);
  }


  // ================= LOAD MORE =================
  function loadMore() {
    if (currentPage < lastPage) {
      currentPage++;
      fetchProducts(activeCat, false);
    }
  }


  // ================= PAGINATION UI =================
  function updatePaginationUI() {
    const shown = $("#mainGrid .gallery-item").length;

    let pct = Math.round((shown / totalItems) * 100);
    $("#progressFill").css("width", pct + "%");

    $("#pageInfo").html(
      `Showing <span>${shown}</span> of <span>${totalItems}</span> photos`
    );

    if (currentPage >= lastPage) {
      $("#loadMoreBtn").text("All Photos Loaded ✓").prop("disabled", true);
    } else {
      $("#loadMoreBtn").html("Load More Photos ↓").prop("disabled", false);
    }
  }


  // ================= LIGHTBOX =================
  function openLightbox(idx) {
    lbIdx = idx;
    showLb();
    $("#lightbox").addClass("open");
    document.body.style.overflow = "hidden";
  }

  function showLb() {
    const it = lbItems[lbIdx];

    $("#lbImg").attr("src", it.image);
    $("#lbTag").text(CAT_LABELS[it.category] || it.category);
    $("#lbTitle").text(it.title);
    $("#lbDesc").text(it.desc);
  }

  function closeLightboxBtn() {
    $("#lightbox").removeClass("open");
    document.body.style.overflow = "";
  }

  function closeLightboxBg(e) {
    if (e.target.id === "lightbox") closeLightboxBtn();
  }

  function lbNav(dir) {
    lbIdx = (lbIdx + dir + lbItems.length) % lbItems.length;
    showLb();
  }

  document.addEventListener("keydown", (e) => {
    if (!$("#lightbox").hasClass("open")) return;

    if (e.key === "ArrowLeft") lbNav(-1);
    if (e.key === "ArrowRight") lbNav(+1);
    if (e.key === "Escape") closeLightboxBtn();
  });


  // ================= PAGE LOAD =================
  $(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('c') ?? 'all';

    fetchProducts(category, true);
  });
</script>


@endpush