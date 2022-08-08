@php

$fb = $socials->where('app', 'facebook');
$tweet = $socials->where('app', 'twitter');
$ig = $socials->where('app', 'instagram');

@endphp

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        @if(isset($homePage))
            <title> {{ $profile->site_name }} </title>
        @elseif(isset($postDetail))
            <title>{{ $post->title }} - {{ $profile->site_name }}</title>
        @else
            <title>{{ $profile->site_name }} | {{ $currentPage }}</title>
        @endif

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">
        <!-- description -->
        <meta name="description" content="POFO is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and portfolio HTML5 template with 25 ready home page demos.">
        <!-- keywords -->
        <meta name="keywords" content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
        
        <!-- favicon -->
        @if($profile->favicon)
        <link rel="shortcut icon" href="{{ asset('storage/'.$profile->favicon) }}">
        @endif
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
                        <a href="/" title="{{ $profile->site_name }}" class="logo">
                            {{-- <img src="{{ asset('storage/default/logo-black.png') }}" data-at2x="images/logo@2x.png'" class="logo-dark" alt="{{ $profile->site_name }}"> --}}
                            {{-- @if($profile->site-name) --}}
                            @if($profile->logo)
                            <img src="{{ asset('storage/'.$profile->logo) }}" data-at2x="images/logo-white@2x.png'" alt="{{ $profile->site_name }}" class="logo-light default">
                            @else
                                <h1 class="fs-5 m-0 align-items-center">
                                    <strong>
                                        {{ $profile->site_name }}
                                    </strong>
                                </h1>
                            @endif
                        </a>
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pr-0 pr-md-3">
                        <button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-{{ ( isset($fb[0]) || isset($tweet[0]) || isset($ig[0]) ) ?  'center' : 'end' }}" id="navbar-collapse-toggle-1">
                            <ul class="nav navbar-nav no-margin alt-font text-normal" data-in="animate__fadeIn" data-out="animate__fadeOut">
                                <!-- start menu item -->
                                <li class="nav-item {{ isset($homePage) ? 'active' : '' }}"><a href="/">Beranda</a></li>
                                <li class="nav-item {{ isset($aboutPage) ? 'active' : '' }}"><a href="/about">Tentang</a></li>
                                <li class="nav-item {{ isset($postPage) ? 'active' : '' }}"><a href="/posts">Artikel</a></li>
                                <li class="nav-item {{ isset($galleryPage) ? 'active' : '' }}"><a href="/galleries">Galeri</a></li>
                                <li class="nav-item {{ isset($contactPage) ? 'active' : '' }}"><a href="/contact">Kontak</a></li>
                            </ul>
                        </div>
                    </div>

                    @if(isset($fb[0]) || isset($tweet[0]) || isset($ig[0]))
                    <div class="col-auto col-lg-2 pe-0 text-end">
                        <div class="header-social-icon d-none d-md-inline-block border-0">
                            @if(isset($fb[0]))
                                <a href="{{ $fb[0]->link }}" title="Facebook" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            @endif
                            @if(isset($tweet[0]))
                                <a href="{{ $tweet[0]->link }}" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(isset($ig[0]))
                                <a href="{{ $ig[0]->link }}" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>                          
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->

        @yield('page-content')

        <!-- start footer --> 
        <footer class="footer-strip-dark bg-extra-dark-gray padding-90px-top lg-padding-70px-top md-padding-50px-top sm-padding-40px-top padding-70px-bottom lg-padding-50px-bottom md-padding-30px-bottom sm-padding-20px-bottom">
            <div class="container">
                {{-- <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7 col-12 text-center text-md-start sm-margin-30px-bottom">
                        <h5 class="text-white margin-5px-bottom">Let's make something great together</h5>
                        <span class="text-medium">Get in touch with us and send some basic info for a quick quote</span>
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 text-center text-md-end">
                        <span class="text-extra-large text-extra-dark-gray text-light-gray d-inline-block sm-d-block"><a href="contact-us-classic.html" class="btn btn-large btn-transparent-white d-table d-lg-inline-block md-margin-lr-auto">Start a project</a></span>
                    </div> 
                </div> --}}
                <div class="border-bottom border-color-medium-dark-gray padding-80px-bottom margin-80px-bottom lg-padding-60px-bottom lg-margin-60px-bottom md-padding-50px-bottom md-margin-50px-bottom sm-padding-40px-bottom sm-margin-40px-bottom">
                    <div class="row align-items-center">
                        <!-- start logo -->
                        <div class="col-lg-3 col-md-12 text-center text-md-start md-margin-50px-bottom sm-margin-30px-bottom">
                            <a href="/">
                                @if($profile->logo)
                                <img src="{{ asset('storage/'.$profile->logo) }}" data-at2x="images/logo-white@2x.png'" alt="{{ $profile->site_name }}" class="footer-logo"  width="113" height="28">
                                @else
                                    <h1 class="fs-5 m-0 align-items-center">
                                        <strong>
                                            {{ $profile->site_name }}
                                        </strong>
                                    </h1>
                                @endif
                            </a>
                        </div> 
                        <!-- end logo -->
                        <!-- start copyright -->
                        <div class="col-lg-3 col-md-5 col-12 sm-margin-30px-bottom text-medium text-center text-md-start mb-md-2">
                            {{ $profile->location }}
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3 col-md-4 col-12 sm-margin-30px-bottom text-medium text-center text-md-start">
                            {{ $profile->telephone }}<br>
                            <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                        </div>
                        <!-- end copyright -->
                        <!-- start social media -->
                        @if($socials->count())
                        <div class="col-lg-2 col-md-3 text-center text-md-end">
                            <div class="social-icon-style-8 d-inline-block align-middle">
                                <ul class="small-icon mb-0">
                                    @foreach($socials as $social)
                                    <li><a class="{{ $social->app }} text-white-2" href="{{ $social->link }}" target="_blank"><i class="fab fa-{{ $social->app }}" aria-hidden="true"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <!-- end social media -->
                    </div>
                </div>
                <div class="row py-0">
                    <p class="m-0 text-center">
                        &copy; 2022 <a href="/" class="fw-bolder ms-1">{{ $profile->site_name }}</a> - Powered by <a href="https://jongkreatif.id/" target="_blank" class="fw-bolder ms-1">Jongkreatif</a>.
                    </p>
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