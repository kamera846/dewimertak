<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website."
        />
        <meta
            name="keywords"
            content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template"
        />
        <meta name="author" content="elemis" />

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
                                @if($profile->image)
                                <img
                                    src="/storage/{{ $profile->image }}"
                                    {{-- srcset="/storage/{{ Str::replace('.', '@2x.', $profile->image) }} 2x" --}}
                                    alt="{{ $profile->site_name }}"
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
                                    @if($profile->image)
                                    <img
                                        src="/storage/{{ $profile->image }}"
                                        {{-- srcset="/storage/{{ Str::replace('.', '@2x.', $profile->image) }} 2x" --}}
                                        alt="{{ $profile->site_name }}"
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
                                            <a href="{{ $social->link }}"><i class="uil uil-{{ $social->app }}"></i></a>
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
                            <img
                                class="mb-4"
                                src="assets/landing-page/img/logo-dark.png"
                                srcset="assets/landing-page/img/logo-dark@2x.png 2x"
                                alt=""
                            />
                            <p class="lead mb-0">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel ipsa accusantium at!
                            </p>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-lg-3 offset-lg-2">
                        <div class="widget">
                            <div class="d-flex flex-row">
                                <div>
                                    <div
                                        class="icon text-primary fs-28 me-4 mt-n1"
                                    >
                                        <i class="uil uil-phone-volume"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-1">Telepon</h5>
                                    <p class="mb-0">
                                        +62 813 3752 2673
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
                                    <h5 class="mb-1">Alamat</h5>
                                    <address>
                                        Desa Galang, Kecamatan Welak, Manggarai Barat - NTT
                                    </address>
                                </div>
                            </div>
                            <!--/div -->
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                </div>
                <!--/.row -->
                <hr class="mt-13 mt-md-14 mb-7" />
                <div
                    class="d-md-flex align-items-center justify-content-{{ $socials->count() ? 'between' : 'center' }}"
                >
                    <p class="mb-2 mb-lg-0">
                        © 2022 {{ $profile->site_name }} - powered by <a href="https://jongkreatif.id" target="_blank">JongKreatif</a>.
                    </p>

                    @if($socials->count())
                    <nav class="nav social social-muted mb-0 text-md-end">
                        @foreach($socials as $social)
                        <a href="{{ $social->link }}" target="_blank"><i class="uil uil-{{ $social->app }}"></i></a>
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
