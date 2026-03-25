@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                <div class="title">
                    <h2>Dashboard</h2>
                </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                        <a href="/admin/dashboard">Dashboard</a>
                        </li>
                    </ol>
                    </nav>
                </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-dollar"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Enquiries</h6>
                        <h3 class="text-bold mb-10">{{ $totalEnquiries }}</h3>
                        <p class="mb-0">
                            <span class="text-success">Completed: {{ $completedEnquiries }}</span> |
                            <span class="text-danger">Pending: {{ $pendingEnquiries }}</span>
                        </p>
                    </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-dollar"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Products</h6>
                        <h3 class="text-bold mb-10">{{ $totalProducts }}</h3>
                        <p class="mb-0">
                            <span class="text-success">Active: {{ $activeProducts }}</span> |
                            <span class="text-danger">Inactive: {{ $inactiveProducts }}</span>
                        </p>
                    </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-dollar"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Categories</h6>
                        <h3 class="text-bold mb-10">{{ $totalCategories }}</h3>
                        <p class="mb-0">
                            <span class="text-success">Active: {{ $activeCategories }}</span> |
                            <span class="text-danger">Inactive: {{ $inactiveCategories }}</span>
                        </p>
                    </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            <div class="row">
            <div class="col-lg-6">
                <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between">
                    <div class="left">
                    <h6 class="text-medium mb-10">Enquiries Stats</h6>
                    </div>
                    <div class="right d-flex align-items-center gap-2 flex-wrap">
                      <!-- Filter Type -->
                      <div class="select-style-1">
                          <div class="select-position select-sm">
                              <select id="filterType" class="light-bg">
                                  <option value="yearly">Yearly</option>
                                  <option value="monthly">Monthly</option>
                                  <option value="range">Date Range</option>
                              </select>
                          </div>
                      </div>
                      <!-- Date Range -->
                      <div id="dateRangeWrapper" class="d-flex align-items-center gap-2" style="display:none !important;">
                          <input type="date" id="fromDate" class="form-control form-control-sm">
                          <span style="color:#999;">to</span>
                          <input type="date" id="toDate" class="form-control form-control-sm">
                      </div>
                  </div>
                </div>
                <!-- End Title -->
                <div class="chart">
                    <canvas id="Chart1" style="width: 100%; height: 400px; margin-left: -35px;"></canvas>
                </div>
                <!-- End Chart -->
                </div>
            </div>
            <!-- End Col -->
            <div class="col-lg-6">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between align-items-center">
                  <div class="left">
                    <h6 class="text-medium mb-30">Top Enquired Products</h6>
                  </div>
                  <div class="right">
                    <div class="select-style-1">
                      <div class="select-position select-sm">
                        <select class="light-bg" id="productFilterType">
                            <option value="yearly">Yearly</option>
                            <option value="monthly">Monthly</option>
                            <option value="weekly">Weekly</option>
                        </select>
                      </div>
                    </div>
                    <!-- end select -->
                  </div>
                </div>
                <!-- End Title -->
                <div class="table-responsive">
                  <table class="table top-selling-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>
                          <h6 class="text-sm text-medium">Products</h6>
                        </th>
                        <th class="min-width">
                          <h6 class="text-sm text-medium">Category</h6>
                        </th>
                        <th class="min-width">
                          <h6 class="text-sm text-medium">Price</h6>
                        </th>
                        <th class="min-width">
                          <h6 class="text-sm text-medium">Total Enquiries</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="topProductsTable">
                        {{-- Dynamic data will come here --}}
                    </tbody>
                  </table>
                  <!-- End Table -->
                </div>
              </div>
            </div>
            <!-- End Col -->
            </div>
            <!-- End Row -->
            
            
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/dynamic-pie-chart.js')}}"></script>
    <script>    
      // =========== chart one start

      document.getElementById('filterType').addEventListener('change', function () {
          let type = this.value;
          console.log("type => ", type)
          if (type === 'range') {
              console.log("type1 => ", type)
              document.getElementById('dateRangeWrapper').style.display = 'flex';
          } else {
              console.log("type2 => ", type)
              document.getElementById('dateRangeWrapper').style.display = 'none !important';
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
                  borderColor: "#365CF5",
                  backgroundColor: "transparent",
                  borderWidth: 3
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false
          }
      });

      // function to load data
      function loadChart(type = 'yearly') {

          let from = document.getElementById('fromDate').value;
          let to = document.getElementById('toDate').value;

          fetch(`/admin/enquiry-stats?type=${type}&from=${from}&to=${to}`)
              .then(res => res.json())
              .then(res => {
                  chart1.data.labels = res.labels;
                  chart1.data.datasets[0].data = res.data;
                  chart1.update();
              });
      }

      // dropdown change
      document.getElementById('filterType').addEventListener('change', function () {
          loadChart(this.value);
      });

      // date change events
      document.getElementById('dateRangeWrapper').addEventListener('change', function () {
        loadChart('range');
      });

      // initial load
      loadChart();
      // =========== chart one end

        function loadTopProducts(type = 'yearly') {
            fetch(`/admin/top-products?type=${type}`)
            .then(res => res.json())
            .then(data => {

                let html = '';

                if (data.length === 0) {
                    html = `<tr><td colspan="6">No data found</td></tr>`;
                }

                data.forEach((item, index) => {
                    let product = item.product || {};

                    html += `
                    <tr>
                        <td>${index + 1}</td>

                        <td>
                            <div class="product">
                                <div class="image">
                                    <img src="/uploads/products/${product.id}/${product.feature_image}" width="40" />
                                </div>
                                <p class="text-sm">${product.name ?? 'N/A'}</p>
                            </div>
                        </td>

                        <td>
                            <p class="text-sm">${product.categories 
    ? product.categories.map(c => c.name).join(', ') 
    : 'N/A'}</p>
                        </td>

                        <td>
                            <p class="text-sm">₹${product.price ?? 0}</p>
                        </td>

                        <td>
                            <p class="text-sm">${item.total_enquiries}</p>
                        </td>
                    </tr>
                    `;
                });

                document.getElementById('topProductsTable').innerHTML = html;
            });
        }

        // Load default
        loadTopProducts();

        // Change event
        document.getElementById('productFilterType').addEventListener('change', function () {
            loadTopProducts(this.value);
        });

    </script>

@endpush
    