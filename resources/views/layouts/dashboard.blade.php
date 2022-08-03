<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
            name="description"
            content="Start your development with a Dashboard for Bootstrap 4."
        />
        <meta name="author" content="Creative Tim" />
        <title>{{ $profile->site_name }} | Admin Dasbor</title>

        <!-- Favicon -->
        @if($profile->favicon)
        <link
            rel="icon"
            href="{{ asset('storage/'.$profile->favicon) }}"
            type="image/png"
        />
        @endif

        <!-- Fonts -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
        />
        <!-- Icons -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/dashboard/vendor/nucleo/css/nucleo.css') }}"
            type="text/css"
        />
        
        <link
            rel="stylesheet"
            href="{{
                asset(
                    'assets/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css'
                )
            }}"
            type="text/css"
        />

        {{-- Page plugin --}}
        {{-- select option --}}
        <link
            rel="stylesheet"
            href="{{ asset('assets/dashboard/vendor/select2/dist/css/select2.min.css') }}"
            type="text/css"
        />

        <!-- Argon CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/dashboard/css/argon.css?v=1.1.0') }}"
            type="text/css"
        />

        <!-- Custom CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/dashboard/css/custom.css') }}"
            type="text/css"
        />

    </head>

    <body>
        <!-- Sidenav -->
        <nav
            class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white"
            id="sidenav-main"
        >
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header d-flex align-items-center">
                    <a
                        class="navbar-brand"
                        href="/"
                    >
                        @if($profile->logo)
                            <img
                                src="{{ asset('storage/'.$profile->logo) }}"
                                class="navbar-brand-img"
                                alt="{{ $profile->site_name }}"
                            />
                        @else
                            <img src="{{ asset('assets/dashboard/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
                        @endif
                    </a>
                    <div class="ml-auto">
                        <!-- Sidenav toggler -->
                        <div
                            class="sidenav-toggler d-none d-xl-block"
                            data-action="sidenav-unpin"
                            data-target="#sidenav-main"
                        >
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div
                        class="collapse navbar-collapse"
                        id="sidenav-collapse-main"
                    >
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($dashboardPage)) ? 'active' : '' }}"
                                    href="/dashboard"
                                >
                                    <i class="ni ni-shop text-primary"></i>
                                    <span class="nav-link-text"
                                        >Dasbor</span
                                    >
                                </a>
                            </li>
                        </ul>

                        @if(Auth::user()->role == 'super-admin')
                        <!-- Divider -->
                        <hr class="my-3" />

                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($userPage)) ? 'active' : '' }}"
                                    href="/dashboard/users"
                                >
                                    <i class="ni ni-circle-08 text-primary"></i>
                                    <span class="nav-link-text"
                                        >Pengguna</span
                                    >
                                </a>
                            </li>
                        </ul>
                        @endif

                        <!-- Divider -->
                        <hr class="my-3" />
                        <h6 class="navbar-heading p-0 text-primary">Konten</h6>
                        
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($postPage)) ? 'active' : '' }}"
                                    href="/dashboard/posts"
                                >
                                    <i class="ni ni-align-left-2 text-primary"></i>
                                    <span class="nav-link-text"
                                        >Artikel</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($galleryPage)) ? 'active' : '' }}"
                                    href="/dashboard/galleries"
                                >
                                    <i class="ni ni-image text-primary"></i>
                                    <span class="nav-link-text"
                                        >Galeri</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($subSection)) ? 'active' : ''}}"
                                    href="#section"
                                    data-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="section"
                                >
                                    <i class="ni ni-single-copy-04 text-primary"></i>
                                    <span class="nav-link-text">Bagian</span>
                                </a>
                                <div class="collapse {{ (isset($subSection)) ? 'show' : '' }}" id="section">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a
                                                href="/dashboard/carousels"
                                                class="nav-link {{ (isset($carouselPage)) ? 'active' : '' }}"
                                                >Tayangan Slide</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                href="/dashboard/features"
                                                class="nav-link {{ (isset($featurePage)) ? 'active' : '' }}"
                                                >Layanan & Produk</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                href="/dashboard/about"
                                                class="nav-link {{ (isset($aboutPage)) ? 'active' : '' }}"
                                                >Tentang Desa</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                href="/dashboard/events"
                                                class="nav-link {{ (isset($eventPage)) ? 'active' : '' }}"
                                                >Acara & Kegiatan</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <!-- Divider -->
                        <hr class="my-3" />
                        
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($profilePage)) ? 'active' : '' }}"
                                    href="/dashboard/profile"
                                >
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text"
                                        >Profil Desa</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ (isset($socialPage)) ? 'active' : '' }}"
                                    href="/dashboard/socials"
                                >
                                    <i class="ni ni-like-2 text-primary"></i>
                                    <span class="nav-link-text"
                                        >Jejaring Sosial</span
                                    >
                                </a>
                            </li>
                        </ul>

                        <!-- Divider -->
                        <hr class="my-3" />

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <form action="/logout" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link border-0 logout" style="background:none; width:100%;">
                                        <i class="ni ni-button-power text-primary text-left"></i>
                                        <span class="nav-link-text">Keluar</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            <nav
                class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom"
            >
                <div class="container-fluid">
                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <!-- Navbar links -->
                        <ul class="navbar-nav align-items-center mr-md-auto">
                            <li class="nav-item d-xl-none">
                                <!-- Sidenav toggler -->
                                <div
                                    class="pr-3 sidenav-toggler sidenav-toggler-dark"
                                    data-action="sidenav-pin"
                                    data-target="#sidenav-main"
                                >
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <h1 class="my-0 text-white">{{ $profile->site_name }}</h1>
                            </li>
                            {{-- <li class="nav-item dropdown mr-0">
                                <a
                                    class="nav-link"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="ni ni-bell-55"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden"
                                >
                                    <!-- Dropdown header -->
                                    <div class="px-3 py-3">
                                        <h6 class="text-sm text-muted m-0">
                                            You have
                                            <strong class="text-primary"
                                                >13</strong
                                            >
                                            notifications.
                                        </h6>
                                    </div>
                                    <!-- List group -->
                                    <div class="list-group list-group-flush">
                                        <a
                                            href="#!"
                                            class="list-group-item list-group-item-action"
                                        >
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img
                                                        alt="Image placeholder"
                                                        src="../../assets/img/theme/team-1.jpg"
                                                        class="avatar rounded-circle"
                                                    />
                                                </div>
                                                <div class="col ml--2">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="mb-0 text-sm"
                                                            >
                                                                John Snow
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="text-right text-muted"
                                                        >
                                                            <small
                                                                >2 hrs
                                                                ago</small
                                                            >
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">
                                                        Let's meet at Starbucks
                                                        at 11:30. Wdyt?
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a
                                            href="#!"
                                            class="list-group-item list-group-item-action"
                                        >
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img
                                                        alt="Image placeholder"
                                                        src="{{ asset('assets/dashboard/img/theme/team-2.jpg') }}"
                                                        class="avatar rounded-circle"
                                                    />
                                                </div>
                                                <div class="col ml--2">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="mb-0 text-sm"
                                                            >
                                                                John Snow
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="text-right text-muted"
                                                        >
                                                            <small
                                                                >3 hrs
                                                                ago</small
                                                            >
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">
                                                        A new issue has been
                                                        reported for Argon.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a
                                            href="#!"
                                            class="list-group-item list-group-item-action"
                                        >
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img
                                                        alt="Image placeholder"
                                                        src="../../assets/img/theme/team-3.jpg"
                                                        class="avatar rounded-circle"
                                                    />
                                                </div>
                                                <div class="col ml--2">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="mb-0 text-sm"
                                                            >
                                                                John Snow
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="text-right text-muted"
                                                        >
                                                            <small
                                                                >5 hrs
                                                                ago</small
                                                            >
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">
                                                        Your posts have been
                                                        liked a lot.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a
                                            href="#!"
                                            class="list-group-item list-group-item-action"
                                        >
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img
                                                        alt="Image placeholder"
                                                        src="../../assets/img/theme/team-4.jpg"
                                                        class="avatar rounded-circle"
                                                    />
                                                </div>
                                                <div class="col ml--2">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="mb-0 text-sm"
                                                            >
                                                                John Snow
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="text-right text-muted"
                                                        >
                                                            <small
                                                                >2 hrs
                                                                ago</small
                                                            >
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">
                                                        Let's meet at Starbucks
                                                        at 11:30. Wdyt?
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a
                                            href="#!"
                                            class="list-group-item list-group-item-action"
                                        >
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img
                                                        alt="Image placeholder"
                                                        src="../../assets/img/theme/team-5.jpg"
                                                        class="avatar rounded-circle"
                                                    />
                                                </div>
                                                <div class="col ml--2">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"
                                                    >
                                                        <div>
                                                            <h4
                                                                class="mb-0 text-sm"
                                                            >
                                                                John Snow
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="text-right text-muted"
                                                        >
                                                            <small
                                                                >3 hrs
                                                                ago</small
                                                            >
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">
                                                        A new issue has been
                                                        reported for Argon.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- View all -->
                                    <a
                                        href="#!"
                                        class="dropdown-item text-center text-primary font-weight-bold py-3"
                                        >View all</a
                                    >
                                </div>
                            </li> --}}
                        </ul>
                        <ul
                            class="navbar-nav align-items-center ml-auto ml-md-0"
                        >
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link pr-0"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <div class="media align-items-center">
                                        <div
                                            class="media-body d-none d-lg-block"
                                        >
                                            <span
                                                class="mb-0 text-sm font-weight-bold"
                                                >{{ ucwords(Auth::user()->name) }}</span
                                            >
                                        </div>
                                        <span
                                            class="avatar avatar-sm ml-2 rounded-circle"
                                        >
                                            <img
                                                alt="Image placeholder"
                                                @if(Auth::user()->image)
                                                src="{{ asset('storage/'. Auth::user()->image) }}"
                                                @else
                                                src="{{ asset('storage/default/user.jpg') }}"
                                                @endif
                                            />
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" data-toggle="modal" data-target="#my-profile" class="dropdown-item">
                                        <i class="ni ni-single-02"></i>
                                        <span>Profil Saya</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item logout">
                                            <i class="ni ni-user-run"></i>
                                            <span>Keluar</span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header -->

            @yield('page-content')

        </div>

        {{-- Modal Profil --}}
        <div class="modal fade" id="my-profile" tabindex="-1" role="dialog" aria-labelledby="my-profile" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Profil Saya</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-sm">
                        @if (Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image)}}" alt="" class="rounded-circle shadow d-block mx-auto mb-5">
                        @else
                            <img src="{{ asset('storage/default/user.jpg') }}" alt="" class="rounded-circle shadow d-block mx-auto mb-5">
                        @endif
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold text-right">Nama</div>
                            <div class="col-8">{{ ucwords(Auth::user()->name) }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold text-right">Email</div>
                            <div class="col-8">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold text-right">Telepon</div>
                            <div class="col-8">{{ Auth::user()->telephone ? Auth::user()->telephone : '-' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold text-right">Alamat</div>
                            <div class="col-8">{{ Auth::user()->address }}</div>
                        </div>
                    </div>
                    <div class="modal-footer text-end">
                        <a href="/dashboard/users/{{ Auth::user()->id }}/edit" class="btn btn-primary">Edit</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="{{ asset('assets/dashboard/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/vendor/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('assets/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script> 
        
        <!-- Optional JS -->
        {{-- select option --}}
        <script src="{{ asset('assets/dashboard/vendor/select2/dist/js/select2.min.js') }}"></script>
        {{-- dropzone --}}
        <script src="{{ asset('assets/dashboard/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
        {{-- Charts --}}
        {{-- <script src="{{ asset('assets/dashboard/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/vendor/chart.js/dist/Chart.extension.js') }}"></script> --}}
        
        <!-- Argon JS -->
        <script src="{{ asset('assets/dashboard/js/argon.js?v=1.1.0') }}"></script>

        <!-- Textarea Editor -->
        <script src="{{ asset('assets/dashboard/js/tinymce/tinymce.min.js') }}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('assets/dashboard/js/sweetalert.js') }}"></script>
        
        {{-- Custom JS --}}
        <script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>
    </body>
</html>
