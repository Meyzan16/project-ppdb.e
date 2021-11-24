 <!-- Start Header Area -->
 <header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/logo/white-logo.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.html" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about-us.html" aria-label="Toggle navigation">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Pages</a>
                                    <ul class="sub-menu collapse" id="submenu-1-1">
                                        <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                        <li class="nav-item"><a href="pricing.html">Our Pricing</a></li>
                                        <li class="nav-item"><a href="signin.html">Sign In</a></li>
                                        <li class="nav-item"><a href="signup.html">Sign Up</a></li>
                                        <li class="nav-item"><a href="reset-password.html">Reset Password</a>
                                        <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
                                        <li class="nav-item"><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        <li class="nav-item"><a href="blog-grid.html">Blog Grid</a>
                                        </li>
                                        <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">Contact</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                        {{-- <div class="button">
                            <a href="signup.html" class="btn">Get started</a>
                        </div> --}}
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
<!-- End Header Area -->

 <!-- Start Hero Area -->
 <section class="hero-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12 col-12">
                <div class="hero-content">
                    <h4 class="wow fadeInUp" data-wow-delay=".2s">We Are Creative Digital Agency</h4>
                    <h1 class="wow fadeInUp" data-wow-delay=".4s">Strategic Concepts For Businesses.</h1>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Invest your spare change in Bitcoin and save
                        with<br> crypto to e arn interest in real time.
                    </p>

                    <div class="button wow fadeInUp" data-wow-delay=".8s">
                        <form action="/login" method="POST">
                            @csrf
                            <button type="submit" class="btn"> Login
                            </button>
                        </form>
                    </div>

                    {{-- <div >
                        <a href="about-us.html" >Register</a>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-7 col-12">
                <div class="hero-image">
                    <img class="main-image" src="assets/images/hero/hero-image.png" alt="#">
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- End Hero Area -->