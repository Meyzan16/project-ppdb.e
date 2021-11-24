
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/template-siswa/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/template-siswa/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/template-siswa/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/template-siswa/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/template-siswa/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="/text/css" href="template-siswa/template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/template-siswa/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/template-siswa/template/images/favicon.png" />
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
     @include('siswa.partial.navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      @include('siswa.partial.sidebar')

      
      <div class="main-panel">
        
        @yield('content')


        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
     
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 

  @stack('addon-script')
 
  
  <script src="/template-siswa/template/vendors/js/vendor.bundle.base.js"></script>
  <script src="/template-siswa/template/vendors/chart.js/Chart.min.js"></script>
  <script src="/template-siswa/template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/template-siswa/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/template-siswa/template/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/template-siswa/template/js/off-canvas.js"></script>
  <script src="/template-siswa/template/js/hoverable-collapse.js"></script>
  <script src="/template-siswa/template/js/template.js"></script>
  <script src="/template-siswa/template/js/settings.js"></script>
  <script src="/template-siswa/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/template-siswa/template/js/dashboard.js"></script>
  <script src="/template-siswa/template/js/Chart.roundedBarCharts.js"></script>

  @stack('prepend-script')
</body>

</html>

