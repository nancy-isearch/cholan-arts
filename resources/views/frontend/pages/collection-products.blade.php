@extends('frontend.layouts.app')

@section('content')

<!-- BREADCRUMB -->
<div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/collections') }}">Collections</a></li>

      <!-- ✅ IMPORTANT: slug store -->
      <li class="active cat_name" data-slug="{{ $collection->name }}">
        {{ ucfirst($collection->name) }}
      </li>
    </ul>
  </div>
</div>

<!-- HERO -->
<section class="inner-banner">
  <span class="mb-3">Our {{ ucfirst($collection->name) }} Products</span>
  <h1>Moments of <em>Art & Grace</em></h1>
  <p>
    A visual journey through divine performances, sacred art forms,
    workshops, festivals, and cultural celebrations at Cholan Arts.
  </p>
</section>

<main>

  <!-- GALLERY -->
  <section class="gallery-section">
    <div class="section-label">Browse by Category</div>
    <h2 class="section-title">Sacred Art, Captured Eternally</h2>

    <!-- GRID -->
    <div class="masonry-grid" id="mainGrid"></div>

    <!-- PAGINATION -->
    <div class="pagination-wrap">
      <div class="page-info" id="pageInfo"></div>

      <button class="load-more-btn" id="loadMoreBtn" onclick="loadMore()">
        Load More Photos
      </button>

      <div class="progress-bar-wrap">
        <div class="progress-bar-fill" id="progressFill" style="width:0%"></div>
      </div>
    </div>
  </section>
  @include('frontend.components.cta')
</main>

@endsection


@push('scripts')
<script>
let currentPage = 1;
let lastPage = 1;
let totalItems = 0;

let activeCat = null; // ✅ dynamic
let lbItems = [];

// ================= FETCH PRODUCTS =================
function fetchProducts(reset = true) {

    if (!activeCat) return;

    if (reset) {
        currentPage = 1;
        $("#mainGrid").html("<p>Loading...</p>");
        lbItems = [];
    }

    $.ajax({
        url: "/get-products",
        type: "GET",
        data: {
            collection: activeCat, // ✅ slug
            page: currentPage,
        },
        success: function(res) {

            if (reset) $("#mainGrid").html("");

            totalItems = res.total;
            lastPage = res.last_page;

            res.data.forEach((item) => {
                lbItems.push(item);
                $("#mainGrid").append(createCard(item));
            });

            updatePaginationUI();
        },
        error: function() {
            $("#mainGrid").html("<p>Failed to load products</p>");
        }
    });
}

// ================= CREATE CARD =================
function createCard(item) {
    return `
    <div class="gallery-item">
        <div class="card-inner gallery-card">

            <a href="/product/${item.slug}">
                <div class="card-image">
                    <img src="${item.image}" alt="${item.title}" loading="lazy" />
                </div>

                <div class="card-overlay"></div>

                <div class="card-content">
                    <div class="card-text">
                    ${item.category ? `<span class="category">${item.category}</span>` : ''}
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
    </div>`;
}

// ================= LOAD MORE =================
function loadMore() {
    if (currentPage < lastPage) {
        currentPage++;
        fetchProducts(false);
    }
}

// ================= PAGINATION =================
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
        $("#loadMoreBtn").text("Load More Photos ↓").prop("disabled", false);
    }
}

// ================= PAGE LOAD =================
$(document).ready(function () {

    // ✅ slug pick karo (NOT name)
    activeCat = $(".cat_name").data("slug");

    fetchProducts(true);
});
</script>
@endpush