<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        {{-- <meta name="author" content=""> --}}
        <meta name="title" content="{{ $profile->site_name }}">
        <meta name="description" content="{{ substr(strip_tags($about->content), 0, 250)  }}...">
        <meta name="keywords" content="desa, wisata, mertak, desa wisata, wisata lombok, desa mertak, wisata mertak, desa wisata mertak, desa mertak lombok, ntb, nusa tenggara barat">
        
        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="{{ $profile->site_name }}">
        <meta itemprop="description" content="{{ substr(strip_tags($about->content), 0, 250)  }}...">
        <meta itemprop="image" content="/storage/{{ $profile->logo }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://www.desamertak.com/">
        <meta property="og:title" content="{{ $profile->site_name }}">
        <meta property="og:description" content="{{ substr(strip_tags($about->content), 0, 250)  }}...">
        <meta property="og:image" content="/storage/{{ $profile->logo }}">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://www.desamertak.com/">
        <meta property="twitter:title" content="{{ $profile->site_name }}">
        <meta property="twitter:description" content="{{ substr(strip_tags($about->content), 0, 250)  }}...">
        <meta property="twitter:image" content="/storage/{{ $profile->logo }}">

        <!-- title -->
        @if(isset($homePage))
            <title> {{ $profile->site_name }} </title>
        @elseif(isset($postDetail))
            <title>{{ $post->title }} - {{ $profile->site_name }}</title>
        @else
            <title>{{ $profile->site_name }} | {{ $currentPage }}</title>
        @endif

        @if($profile->favicon)
        <link
            rel="shortcut icon"
            href="/storage/{{ $profile->favicon }}"
        />
        @endif

        <link rel="stylesheet" href="{{ asset('assets/landing-page/css/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/landing-page/css/style.css') }}" />
        <link
            rel="preload"
            href="{{ asset('assets/landing-page/css/fonts/dm.css') }}"
            as="style"
            onload="this.rel='stylesheet'"
        />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        
    </head>

    <body>
        <div class="content-wrapper">
            <header class="wrapper bg-soft-green">
                <nav
                    class="navbar navbar-expand-lg transparent position-absolute navbar-{{ isset($homePage) ? 'dark' : 'light' }} caret-none"
                >
                    <div
                        class="container flex-lg-row flex-nowrap align-items-center"
                    >
                        <div class="navbar-brand w-100">
                            <a href="/">
                                @if($profile->logo)
                                <img
                                    src="/storage/{{ $profile->logo }}"
                                    {{-- srcset="/storage/{{ Str::replace('.', '@2x.', $profile->logo) }} 2x" --}}
                                    alt="{{ $profile->site_name }}"
                                    height="45px"
                                />
                                @else
                                    <h1 class="fs-20 m-0 text-green">{{ $profile->site_name }}</h1>
                                @endif
                            </a>
                        </div>
                        <div
                            class="navbar-collapse offcanvas offcanvas-nav offcanvas-start"
                        >
                            <div class="offcanvas-header d-lg-none d-xl-none">
                                <a href="/">
                                    @if($profile->logo)
                                    <img
                                        src="/storage/{{ $profile->logo }}"
                                        {{-- srcset="/storage/{{ Str::replace('.', '@2x.', $profile->logo) }} 2x" --}}
                                        alt="{{ $profile->site_name }}"
                                        height="45px"
                                    />
                                    @else
                                        <h1 class="text-light fs-20 m-0">{{ $profile->site_name }}</h1>
                                    @endif
                                </a>
                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="offcanvas"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div
                                class="offcanvas-body ms-lg-auto d-flex flex-column h-100"
                            >
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($homePage) ? 'active' : '' }}" href="/"
                                            >Beranda</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($aboutPage) ? 'active' : '' }}" href="/about"
                                            >Tentang</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($postPage) ? 'active' : '' }}" href="/posts"
                                            >Artikel</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($galleryPage) ? 'active' : '' }}" href="/galleries"
                                            >Galeri</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($contactPage) ? 'active' : '' }}" href="/contact"
                                            >Kontak</a
                                        >
                                    </li>
                                </ul>
                                <!-- /.navbar-nav -->
                                <div
                                    class="d-lg-none mt-auto pt-6 pb-6 order-4"
                                >
                                    <a
                                        href="mailto:{{ $profile->email }}"
                                        class="link-inverse"
                                        >{{ $profile->email }}</a
                                    >
                                    <br />
                                    {{ $profile->telephone }} <br />

                                    @if($socials->count())
                                        <nav class="nav social social-white mt-4">
                                            @foreach($socials as $social)
                                                @if($social->app != 'pinterest')
                                                    <a href="{{ $social->link }}" target="_blank"><i class="uil uil-{{ $social->app }}"></i></a>
                                                @else
                                                    <a href="{{ $social->link }}" target="_blank"><i class="bi bi-pinterest"></i></a>
                                                @endif    
                                            @endforeach
                                        </nav>
                                    @endif
                                    <!-- /.social -->
                                </div>
                                <!-- /offcanvas-nav-other -->
                            </div>
                            <!-- /.offcanvas-body -->
                        </div>
                        <!-- /.navbar-collapse -->

                        <div class="navbar-other ms-lg-4">
                            <ul
                                class="navbar-nav flex-row align-items-center ms-auto"
                            >
                                <li class="nav-item d-lg-none">
                                    <button class="hamburger offcanvas-nav-btn">
                                        <span></span>
                                    </button>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                        </div>
                        <!-- /.navbar-other -->
                    </div>
                    <!-- /.container -->
                </nav>
                <!-- /.navbar -->
            </header>
            <!-- /header -->
            
            {{-- page content --}}
            @yield('page-content')

        </div>
        <!-- end content wrapper -->

        <footer class="bg-soft-green">
            <div class="container pb-7 pt-17">
                <div class="row gx-lg-0 gy-6">
                    <div class="col-lg-4">
                        <div class="widget">
                            {{-- <img
                                class="mb-4"
                                src="assets/landing-page/img/logo-dark.png"
                                alt=""
                            /> --}}
                            @if($profile->logo)
                            <img
                                src="/storage/{{ $profile->logo }}"
                                {{-- srcset="/storage/{{ Str::replace('.', '@2x.', $profile->logo) }} 2x" --}}
                                alt="{{ $profile->site_name }}"
                                class="mb-4"
                                height="55px"
                            />
                            @else
                                <h1 class=" mb-4 text-dark">{{ $profile->site_name }}</h1>
                            @endif
                            {{-- <p class="lead mb-0">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel ipsa accusantium at!
                            </p> --}}
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-lg-4">
                        <div class="widget">
                            <div class="d-flex flex-row">
                                <div>
                                    <div
                                        class="icon text-primary fs-28 me-4 mt-n1"
                                    >
                                        <i class="uil uil-envelope"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1">Hubungi</h5>
                                    <p class="mb-0">
                                        <a class="text-reset" href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                                    </p>
                                    <p class="mb-0">
                                        Telp: {{ $profile->telephone }}
                                    </p>
                                </div>
                            </div>
                            <!--/div -->
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-lg-3">
                        <div class="widget">
                            <div class="d-flex flex-row">
                                <div>
                                    <div
                                        class="icon text-primary fs-28 me-4 mt-n1"
                                    >
                                        <i class="uil uil-location-pin-alt"></i>
                                    </div>
                                </div>
                                <div
                                    class="align-self-start justify-content-start"
                                >
                                    <h5 class="mb-1">Lokasi</h5>
                                    <address>
                                        {{ $profile->location }}
                                    </address>
                                </div>
                            </div>
                            <!--/div -->
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-lg-1"></div>
                </div>
                <!--/.row -->
                <hr class="mt-13 mt-md-14 mb-7" />
                <div
                    class="d-md-flex align-items-center justify-content-{{ $socials->count() ? 'between' : 'center' }}"
                >
                    <p class="mb-2 mb-lg-0">
                        © 2022 {{ $profile->site_name }} - powered by <a href="http://jongkreatif.id" target="_blank">JongKreatif</a>.
                    </p>

                    @if($socials->count())
                    <nav class="nav social social-muted mb-0 text-md-end">
                        @foreach($socials as $social)
                            @if($social->app != 'pinterest')
                                <a href="{{ $social->link }}" target="_blank"><i class="uil uil-{{ $social->app }}"></i></a>
                            @else
                                <a href="{{ $social->link }}" target="_blank"><i class="bi bi-pinterest"></i></a>
                            @endif    
                        @endforeach
                    </nav>
                    @endif
                    <!-- /.social -->
                </div>
            </div>
            <!-- /.container -->
        </footer>
        <div class="progress-wrap">
            <svg
                class="progress-circle svg-content"
                width="100%"
                height="100%"
                viewBox="-1 -1 102 102"
            >
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <script src="{{ asset('assets/landing-page/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/landing-page/js/theme.js') }}"></script>
        <script src="{{ asset('assets/landing-page/js/custom.js') }}"></script>
    </body>
</html>
