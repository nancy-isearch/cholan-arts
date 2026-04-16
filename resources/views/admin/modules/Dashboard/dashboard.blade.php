@extends('admin.layouts.app')

@section('content')
<section class="section dash-page">
    <div class="container-fluid">

        {{-- ══ PAGE HEADER ══ --}}
        <div class="dash-header">
            <div class="dash-header__left">
                <span class="dash-eyebrow">
                    Admin Panel
                </span>
                <h2 class="dash-title">Welcome to <em>Dashboard</em></h2>
                <p class="dash-subtitle">Here's what's happening with your store today</p>
            </div>
            <div class="dash-header__right">
                <div class="dash-date-badge">
                    <i class="lni lni-calendar"></i>
                    <span id="dashTodayDate"></span>
                </div>
            </div>
        </div>

        {{-- ══ STAT CARDS ══ --}}
        <div class="dash-stats">

            {{-- Enquiries --}}
            <div class="dash-stat-card dash-stat-card--blue dash-fade-in">
                <div class="dash-stat-card__top">
                    <div class="dash-stat-icon dash-stat-icon--blue">
                        <i class="lni lni-envelope"></i>
                    </div>
                    <a href="/admin/enquiries" class="dash-stat-card__link">
                        View All <i class="lni lni-arrow-right"></i>
                    </a>
                </div>
                <div class="dash-stat-body">
                    <div class="dash-stat-value">{{ $totalEnquiries }}</div>
                    <div class="dash-stat-label">Total Enquiries</div>
                </div>
                <div class="dash-stat-footer">
                    <span class="dash-stat-pill dash-stat-pill--success">
                        <i class="lni lni-checkmark-circle"></i>
                        Completed: {{ $completedEnquiries }}
                    </span>
                    <span class="dash-stat-pill dash-stat-pill--danger">
                        <i class="lni lni-timer"></i>
                        Pending: {{ $pendingEnquiries }}
                    </span>
                </div>
            </div>

            {{-- Products --}}
            <div class="dash-stat-card dash-stat-card--green dash-fade-in" style="animation-delay:.08s">
                <div class="dash-stat-card__top">
                    <div class="dash-stat-icon dash-stat-icon--green">
                        <i class="lni lni-package"></i>
                    </div>
                    <a href="/admin/products" class="dash-stat-card__link">
                        View All <i class="lni lni-arrow-right"></i>
                    </a>
                </div>
                <div class="dash-stat-body">
                    <div class="dash-stat-value">{{ $totalProducts }}</div>
                    <div class="dash-stat-label">Total Products</div>
                </div>
                <div class="dash-stat-footer">
                    <span class="dash-stat-pill dash-stat-pill--success">
                        <i class="lni lni-checkmark-circle"></i>
                        Active: {{ $activeProducts }}
                    </span>
                    <span class="dash-stat-pill dash-stat-pill--danger">
                        <i class="lni lni-ban"></i>
                        Inactive: {{ $inactiveProducts }}
                    </span>
                </div>
            </div>

            {{-- Categories --}}
            <div class="dash-stat-card dash-stat-card--amber dash-fade-in" style="animation-delay:.16s">
                <div class="dash-stat-card__top">
                    <div class="dash-stat-icon dash-stat-icon--amber">
                        <i class="lni lni-grid-alt"></i>
                    </div>
                    <a href="/admin/categories" class="dash-stat-card__link">
                        View All <i class="lni lni-arrow-right"></i>
                    </a>
                </div>
                <div class="dash-stat-body">
                    <div class="dash-stat-value">{{ $totalCategories }}</div>
                    <div class="dash-stat-label">Total Categories</div>
                </div>
                <div class="dash-stat-footer">
                    <span class="dash-stat-pill dash-stat-pill--success">
                        <i class="lni lni-checkmark-circle"></i>
                        Active: {{ $activeCategories }}
                    </span>
                    <span class="dash-stat-pill dash-stat-pill--danger">
                        <i class="lni lni-ban"></i>
                        Inactive: {{ $inactiveCategories }}
                    </span>
                </div>
            </div>

        </div>
        {{-- end stats --}}

        {{-- ══ CHARTS + TABLE ROW ══ --}}
        <div class="row g-4">

            {{-- ── Enquiries Chart ── --}}
            <div class="col-lg-6">
                <div class="dash-card dash-fade-in" style="animation-delay:.22s">

                    <div class="dash-card__head">
                        <div class="dash-card__head-left">
                            <div>
                                <span class="dash-card__head-title">Enquiries Stats</span>
                                <p class="dash-card__head-sub">Track enquiry trends over time</p>
                            </div>
                        </div>
                        <div class="dash-card__head-right">
                            {{-- Filter Type select — id preserved --}}
                            <div class="dash-select-wrap">
                                <select id="filterType" class="dash-select light-bg">
                                    <option value="yearly">Yearly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="range">Date Range</option>
                                </select>
                                <i class="lni lni-chevron-down dash-select-icon"></i>
                            </div>
                            {{-- Date Range — id preserved --}}
                            <div id="dateRangeWrapper" class="dash-daterange d-flex align-items-center gap-2" style="display:none !important;">
                                <input type="date" id="fromDate" class="form-control dash-date-input">
                                <span class="dash-daterange-sep">→</span>
                                <input type="date" id="toDate" class="form-control dash-date-input">
                            </div>
                        </div>
                    </div>

                    <div class="dash-chart-wrap">
                        <canvas id="Chart1"></canvas>
                    </div>

                </div>
            </div>
            {{-- end chart col --}}

            {{-- ── Top Enquired Products ── --}}
            <div class="col-lg-6">
                <div class="dash-card dash-fade-in" style="animation-delay:.28s">

                    <div class="dash-card__head">
                        <div class="dash-card__head-left">  
                            <div>
                                <span class="dash-card__head-title">Top Enquired Products</span>
                                <p class="dash-card__head-sub">Most requested products by customers</p>
                            </div>
                        </div>
                        <div class="dash-card__head-right">
                            {{-- Filter — id preserved --}}
                            <div class="dash-select-wrap">
                                <select id="productFilterType" class="dash-select light-bg">
                                    <option value="yearly">Yearly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="weekly">Weekly</option>
                                </select>
                                <i class="lni lni-chevron-down dash-select-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="dash-table-scroll">
                        <table class="table dash-top-table">
                            <thead>
                                <tr>
                                    <th><h6>#</h6></th>
                                    <th><h6 class="text-sm text-medium">Products</h6></th>
                                    <th class="min-width"><h6 class="text-sm text-medium">Category</h6></th>
                                    <th class="min-width"><h6 class="text-sm text-medium">Price</h6></th>
                                    <th class="min-width"><h6 class="text-sm text-medium">Enquiries</h6></th>
                                </tr>
                            </thead>
                            {{-- id preserved --}}
                            <tbody id="topProductsTable">
                                <tr>
                                    <td colspan="5" class="dash-table-loading">
                                        <div class="dash-loading-dots">
                                            <span></span><span></span><span></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{-- end top products col --}}

        </div>
        {{-- end row --}}

    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('assets/admin/js/Chart.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/dynamic-pie-chart.js')}}"></script>
<script>

    // ── Today's date in header ──
    (function() {
        const opts = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('dashTodayDate').textContent = new Date().toLocaleDateString('en-IN', opts);
    })();

    // =========== chart one start

    document.getElementById('filterType').addEventListener('change', function () {
        let type = this.value;
        console.log("type => ", type);
        if (type === 'range') {
            console.log("type1 => ", type);
            document.getElementById('dateRangeWrapper').style.display = 'flex';
        } else {
            console.log("type2 => ", type);
            document.getElementById('dateRangeWrapper').style.display = 'none';
        }
        loadChart(type);
    });

    const ctx1 = document.getElementById("Chart1").getContext("2d");
    let chart1 = new Chart(ctx1, {
        type: "line",
        data: {
            labels: [],
            datasets: [{
                label: "Enquiries",
                data: [],
                borderColor: "#3d5a2e",
                backgroundColor: "rgba(61,90,46,0.07)",
                borderWidth: 2.5,
                pointBackgroundColor: "#3d5a2e",
                pointBorderColor: "#ffffff",
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e2d14',
                    titleColor: '#eef4e8',
                    bodyColor: '#b5c4a3',
                    padding: 12,
                    cornerRadius: 10,
                    displayColors: false
                }
            },
            scales: {
                x: {
                    grid: { color: 'rgba(61,90,46,0.07)', drawBorder: false },
                    ticks: { color: '#8a9e78', font: { family: "'Plus Jakarta Sans', sans-serif", size: 11 } }
                },
                y: {
                    grid: { color: 'rgba(61,90,46,0.07)', drawBorder: false },
                    ticks: { color: '#8a9e78', font: { family: "'Plus Jakarta Sans', sans-serif", size: 11 } }
                }
            }
        }
    });

    function loadChart(type = 'yearly') {
        let from = document.getElementById('fromDate').value;
        let to   = document.getElementById('toDate').value;

        fetch(`/admin/enquiry-stats?type=${type}&from=${from}&to=${to}`)
            .then(res => res.json())
            .then(res => {
                chart1.data.labels = res.labels;
                chart1.data.datasets[0].data = res.data;
                chart1.update();
            });
    }

    // dropdown change (second listener — preserved from original)
    document.getElementById('filterType').addEventListener('change', function () {
        loadChart(this.value);
    });

    // date change events — id preserved
    document.getElementById('dateRangeWrapper').addEventListener('change', function () {
        loadChart('range');
    });

    // initial load
    loadChart();
    // =========== chart one end

    // ── Top Products ──
    function loadTopProducts(type = 'yearly') {
        fetch(`/admin/top-products?type=${type}`)
            .then(res => res.json())
            .then(data => {

                let html = '';

                if (data.length === 0) {
                    html = `<tr><td colspan="5" class="dash-table-empty">
                                <i class="lni lni-package"></i>
                                <p>No data found for this period</p>
                            </td></tr>`;
                }

                data.forEach((item, index) => {
                    let product = item.product || {};
                    let cats = product.categories
                        ? product.categories.map(c => `<span class="dash-cat-chip">${c.name}</span>`).join('')
                        : '<span class="dash-cell-empty">N/A</span>';

                    html += `
                    <tr>
                        <td>
                            <span class="dash-row-index">${index + 1}</span>
                        </td>
                        <td>
                            <div class="dash-product-cell">
                                <div class="dash-product-img">
                                    <img src="/uploads/products/${product.id}/${product.feature_image}" alt="${product.name ?? ''}">
                                </div>
                                <p class="dash-product-name">${product.name ?? 'N/A'}</p>
                            </div>
                        </td>
                        <td><div class="dash-cat-chips">${cats}</div></td>
                        <td><span class="dash-price">₹${product.price ?? 0}</span></td>
                        <td>
                            <span class="dash-enq-count">${item.total_enquiries}</span>
                        </td>
                    </tr>
                    `;
                });

                document.getElementById('topProductsTable').innerHTML = html;
            });
    }

    // Load default
    loadTopProducts();

    // Change event — id preserved
    document.getElementById('productFilterType').addEventListener('change', function () {
        loadTopProducts(this.value);
    });

</script>
@endpush
