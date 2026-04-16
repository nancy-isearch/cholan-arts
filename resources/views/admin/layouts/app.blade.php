<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/svg/favicon-16x16.png')}}" type="image/x-icon" />
    <title>Cholan Arts | CRM</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/lineicons.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-dashboard.css')}}" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    @guest
    @else
    <!-- ======== sidebar-nav start =========== -->
    @include('admin.components.sidebar')
    <!-- ======== sidebar-nav end =========== -->
    @endif
    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      @guest
      @else

      <!-- ========== header start ========== -->
      @include('admin.components.header')
      <!-- ========== header end ========== -->
      @endif
      <!-- ========== section start ========== -->
      @yield('content')
      <!-- ========== section end ========== -->
      @guest
      @else
      <!-- ========== footer start =========== -->
      @include('admin.components.footer')
      <!-- ========== footer end =========== -->
      @endif
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/dynamic-pie-chart.js')}}"></script>
    <script src="{{ asset('assets/admin/js/moment.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/polyfill.js')}}"></script>
    <script src="{{ asset('assets/admin/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
   
    
     @stack('scripts')
  </body>
</html>
