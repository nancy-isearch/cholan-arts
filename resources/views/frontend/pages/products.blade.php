@extends('frontend.layouts.app')
@section('seo_title', $seo->meta_title )
@section('seo_description', $seo->meta_description )
@section('seo_keywords', $seo->meta_keywords )
@section('content')
<!-- BREADCRUMB -->
<div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>

      <li>
        <a href="{{ url('/products') }}">Products</a>
      </li>

      @if(!empty($categoryName) && $categoryName !== 'all')
        <li class="active">{{ ucfirst($categoryName) }}</li>
      @else
        <li class="active">All Photos</li>
      @endif
    </ul>
  </div>
</div>

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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" />
        </svg>
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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" />
        </svg>
      </button>
    </div>

    <!-- GRID -->
    <div class="masonry-grid" id="mainGrid"></div>

    <!-- PAGINATION -->
    <div class="pagination-wrap">
      <div class="page-info" id="pageInfo"></div>
      <button class="load-more-btn" id="loadMoreBtn" onclick="loadMore()">
        Load More Photos
        <span><svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            color="currentColor"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 18.502V5.00195" />
            <path
              d="M18 13.002C18 13.002 13.5811 19.0019 12 19.002C10.4188 19.002 6 13.002 6 13.002" />
          </svg>
        </span>
      </button>
      <div class="progress-bar-wrap">
        <div
          class="progress-bar-fill"
          id="progressFill"
          style="width: 0%"></div>
      </div>
      {{-- <!-- Lightbox -->
      <div id="lightbox" onclick="closeLightboxBg(event)">
        <img id="lbImg">
        <span id="lbTag"></span>
        <h4 id="lbTitle"></h4>
        <p id="lbDesc"></p>
      </div> --}}
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
        <img id="productImg"
          src="" />
        <div>
          <div class="mis-name" id="productName"></div>
          <div class="mis-sub" id="productSubtitle"></div>
        </div>
      </div>
      <div id="modalFormWrap">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" name="product_id" id="product_id" value="">
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


            <div class="mf-group">
              <label>Preferred Size</label>
              <select id="mfSize">
                <option value="" disabled selected>Select size</option>
                <option>6 inches</option>
                <option>9 inches</option>
                <option>12 inches</option>
                <option>18 inches</option>
                <option>24 inches</option>
                <option>Custom / Temple Size</option>
              </select>
            </div>

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
</main>
@endsection
@push('scripts')
<script>
  function scrollActiveTabIntoView() {
    const activeTab = document.querySelector(".tab-btn.active");

    if (activeTab) {
      activeTab.scrollIntoView({
        behavior: "smooth",
        inline: "center",
        block: "nearest"
      });
    }
  }
  function scrollTabs(direction) {
    const tabBar = document.getElementById('tabBar');

    const scrollAmount = 200; // adjust as needed

    tabBar.scrollBy({
      left: direction * scrollAmount,
      behavior: 'smooth'
    });
  }
  window.addEventListener("pageshow", function(event) {
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
      success: function(res) {

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

  function createCard(item, index) {
    const div = document.createElement("div");
    div.className = "gallery-item";

    div.innerHTML = `
    <div class="card-inner gallery-card">
    <!-- TOP ACTION -->
        <div class="top-action">
            <button class="btn-inquire">  
                ⓘ
            </button>
        </div>
    <a href="/product/${item.slug}">
        <div class="card-image">
            <img src="${item.image}" alt="${item.title}" loading="lazy" />
        </div>
        <div class="card-overlay"></div>
        <!-- BOTTOM CONTENT -->
        <div class="card-content">
            <div class="card-text">
                
                ${item.category ? `<span class="category">${CAT_LABELS[item.category] || item.category}</span>` : ''}
                <h4>${item.title.length > 16 ? item.title.substring(0, 16) + '...' : item.title}</h4>
                <div class="ganesha-btn-wrapper">
                    <a
                        href="/product/${item.slug}"
                        class="ganesha-btn inner-view-button"
                    >
                        View Details
                        <svg
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
                            <path d="M18.5 12L4.99997 12" />
                            <path
                                d="M13 18C13 18 19 13.5811 19 12C19 10.4188 13 6 13 6"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </a>
    </div>

    `;

    // Prevent card click when clicking buttons
    div.querySelector(".btn-inquire").addEventListener("click", (e) => {
      e.stopPropagation();
      openEnquiryPopup(item); // 👈 your popup function
    });

    div.querySelector(".ganesha-btn").addEventListener("click", (e) => {
      e.stopPropagation();
    });

    div.addEventListener("click", () => openLightbox(index));

    return div;
  }

  function openEnquiryPopup(item) {
    console.log("Enquiry for:", item);

    // Modal open
    document.getElementById("inquiryModal").classList.add("open");

    // ✅ Id set
    document.getElementById("product_id").value = item.id;

    // ✅ Image set
    document.getElementById("productImg").src = item.image;

    // ✅ Name set
    document.getElementById("productName").innerText = item.title;

    // ✅ Subtitle (category / short desc)
    document.getElementById("productSubtitle").innerText =
      CAT_LABELS[item.category] || item.category;
  }

  function closeModal() {
    document.getElementById("inquiryModal").classList.remove("open");
    document.body.style.overflow = "";
  }

  function closeModalBg(e) {
    if (e.target.id === "inquiryModal") closeModal();
  }
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });


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
    if (!$("#lightbox").hasClass("open")) return;

    if (e.key === "ArrowLeft") lbNav(-1);
    if (e.key === "ArrowRight") lbNav(+1);
    if (e.key === "Escape") closeLightboxBtn();
  });


  // ================= PAGE LOAD =================
  $(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('c') ?? 'all';
    // ✅ Active class set manually
    $(".tab-btn").removeClass("active");

    $(".tab-btn").each(function () {
      if ($(this).attr("onclick")?.includes(`'${category}'`)) {
        $(this).addClass("active");
      }
    });

    // ✅ Scroll active tab into view
    setTimeout(() => {
      scrollActiveTabIntoView();
    }, 100); // small delay for DOM render
    fetchProducts(category, true);
  });
</script>


@endpush