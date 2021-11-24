
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template-siswa/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="template-siswa/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="template-siswa/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template-siswa/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template-siswa/template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              {{-- <div class="brand-logo">
                <img src="template-siswa/template/images/logo.svg" alt="logo">
              </div> --}}
              <h4 class="text-center">Silahkan Login</h4>
              {{-- <h6 class="font-weight-light">Sign in to continue.</h6> --}}

              @if(session()->has('loginerror'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                  {{ session('loginerror'); }}
                </div>
              @endif

              

              <form  action="{{ route('proses_login') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="nisn" required class="form-control  @error('nisn')is-invalid @enderror"   value="{{ old('nisn') }}" placeholder="nisn">
                  @error('nisn') 
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                 @enderror
                </div>
                <div class="form-group">
                  <input type="password" name="password" required class="form-control  @error('password')is-invalid @enderror"   placeholder=" Password ">
                    @error('password') 
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="mt-3">
                  <button type="submit"  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >
                    SIGN IN
                  </button>
                </div>
              </form> 
             
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="template-siswa/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="template-siswa/template/js/off-canvas.js"></script>
  <script src="template-siswa/template/js/hoverable-collapse.js"></script>
  <script src="template-siswa/template/js/template.js"></script>
  <script src="template-siswa/template/js/settings.js"></script>
  <script src="template-siswa/template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
