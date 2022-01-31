
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/template-admin/demo/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/template-admin/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/template-admin/demo/assets/css/app.css">
    <link rel="stylesheet" href="/template-admin/demo/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="/template-admin/demo/assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Halaman login ini khusus verifikator dan admin</p>

                    @if(session()->has('loginerror'))
                      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        {{ session('loginerror'); }}
                      </div>
                    @endif

                    <form  action="{{ route('proses_connexion') }}" method="POST">
                      @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control @error('username')is-invalid @enderror form-control-xl" placeholder="Username" name="username" >
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('username') 
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control @error('password')is-invalid @enderror form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password') 
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                   

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>

    </div>

    
</body>

</html>