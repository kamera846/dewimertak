<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>{{ $profile->site_name }} | {{ $currentPage }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">
        <!-- description -->
        <meta name="description" content="POFO is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and portfolio HTML5 template with 25 ready home page demos.">
        <!-- keywords -->
        <meta name="keywords" content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/landing-page/images/favicon.png') }}">
        {{-- <link rel="apple-touch-icon" href="{{ asset('assets/landing-page/images/apple-touch-icon-57x57.png') }}>
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/landing-page/images/apple-touch-icon-72x72.png') }}>
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/landing-page/images/apple-touch-icon-114x114.png') }}> --}}
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing-page/css/bootsnav.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing-page/css/font-icons.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing-page/css/theme-vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing-page/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing-page/css/responsive.css') }}" />
        
        {{-- Custom css --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/custom.css') }}" />
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-top header-dark background-transparent nav-box-width white-link navbar-expand-lg menu-center">
                <div class="container-fluid nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto col-lg-2 ps-0">
                        <a href="/" title="Pofo" class="logo"><img src="{{ asset('storage/default/logo-black.png') }}" data-at2x="images/logo@2x.png') }} class="logo-dark" alt="Pofo"><img src="{{ asset('storage/default/logo-white.png') }}" data-at2x="images/logo-white@2x.png') }} alt="Pofo" class="logo-light default"></a>
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pr-0 pr-md-3">
                        <button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-center" id="navbar-collapse-toggle-1">
                            <ul class="nav navbar-nav no-margin alt-font text-normal" data-in="animate__fadeIn" data-out="animate__fadeOut">
                                <!-- start menu item -->
                                <li class="nav-item"><a href="/home">Beranda</a></li>
                                <li class="nav-item"><a href="/about">Tentang</a></li>
                                <li class="nav-item"><a href="/posts">Artikel</a></li>
                                <li class="nav-item"><a href="/galleries">Galeri</a></li>
                                <li class="nav-item"><a href="/contact">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 pe-0 text-end">
                        <div class="header-social-icon d-none d-md-inline-block">
                            <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://instagram.com/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>                          
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->

        @yield('page-content')

        <!-- start footer --> 
        <footer class="footer-strip-dark bg-extra-dark-gray padding-90px-tb lg-padding-70px-tb md-padding-50px-tb sm-padding-40px-tb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7 col-12 text-center text-md-start sm-margin-30px-bottom">
                        <h5 class="text-white margin-5px-bottom">Let's make something great together</h5>
                        <span class="text-medium">Get in touch with us and send some basic info for a quick quote</span>
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 text-center text-md-end">
                        <span class="text-extra-large text-extra-dark-gray text-light-gray d-inline-block sm-d-block"><a href="contact-us-classic.html" class="btn btn-large btn-transparent-white d-table d-lg-inline-block md-margin-lr-auto">Start a project</a></span>
                    </div> 
                </div>
                <div class="border-top border-color-medium-dark-gray padding-80px-top margin-80px-top lg-padding-60px-top lg-margin-60px-top md-padding-50px-top md-margin-50px-top sm-padding-40px-top sm-margin-40px-top">
                    <div class="row align-items-center">
                        <!-- start logo -->
                        <div class="col-lg-3 col-md-12 text-center text-md-start md-margin-50px-bottom sm-margin-30px-bottom">
                            <a href="index.html"><img class="footer-logo" src="{{ asset('assets/landing-page/images/logo-white@2x.png') }} data-at2x="{{ asset('assets/landing-page/images/logo-white@2x.png') }} alt="Pofo" width="113" height="28"></a>
                        </div> 
                        <!-- end logo -->
                        <!-- start copyright -->
                        <div class="col-lg-4 col-md-5 col-12 sm-margin-30px-bottom text-medium text-center text-md-start">
                            301 The Greenhouse,<br>
                            Custard Factory, London, E2 8DY.
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 sm-margin-30px-bottom text-medium text-center text-md-start">
                            +44 (0) 123 456 7890<br>
                            <a href="mailto:sales@domain.com">sales@domain.com</a>
                        </div>
                        <!-- end copyright -->
                        <!-- start social media -->
                        <div class="col-lg-2 col-md-3 text-center text-md-end">
                            <div class="social-icon-style-8 d-inline-block align-middle">
                                <ul class="small-icon mb-0">
                                    <li><a class="facebook text-white-2" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a class="twitter text-white-2" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="google text-white-2" href="https://plus.google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a class="instagram text-white-2" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram me-0" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end social media -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer --> 
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript -->
        <script type="text/javascript" src="{{ asset('assets/landing-page/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/landing-page/js/bootsnav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/landing-page/js/jquery.nav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/landing-page/js/hamburger-menu.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/landing-page/js/theme-vendors.min.js') }}"></script>
        <!-- setting -->
        <script type="text/javascript" src="{{ asset('assets/landing-page/js/main.js') }}"></script>
    </body>
</html>