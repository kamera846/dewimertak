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
        <title>{{ $profile->site_name }} | Admin Login</title>
        
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
            href="{{ asset('assets/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
            type="text/css"
        />

        <!-- Argon CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/dashboard/css/argon.css?v=1.1.0') }}"
            type="text/css"
        />
    </head>

    <body class="bg-default">
        <!-- Main content -->
        <div class="main-content mb-5">
            <!-- Header -->
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                <h1 class="text-white">Selamat Datang!</h1>
                                <p class="text-lead text-white">
                                    Lengkapi kolom di bawah dengan benar untuk masuk ke halaman dashboard.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="separator separator-bottom separator-skew zindex-100"
                >
                    <svg
                        x="0"
                        y="0"
                        viewBox="0 0 2560 100"
                        preserveAspectRatio="none"
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <polygon
                            class="fill-default"
                            points="2560 0 2560 100 0 100"
                        ></polygon>
                    </svg>
                </div>
            </div>
            <!-- Page content -->
            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">

                        {{-- Flash Message --}}
                        @if(session()->has('failed'))
                        <div class="row px-3">
                            <div class="alert alert-danger alert-dismissible fade show" style="width: 100%" role="alert">
                                <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                <span class="alert-text"> {{ session('failed') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        @endif

                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4 py-2">
                                    <small>Log in</small>
                                </div>
                                <form role="form" method="post" action="/login">

                                    @csrf

                                    <div class="form-group mb-3">
                                        <div
                                            class="input-group input-group-merge input-group-alternative"
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    ><i
                                                        class="ni ni-email-83"
                                                    ></i
                                                ></span>
                                            </div>
                                            <input
                                                class="form-control"
                                                placeholder="Email"
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                autofocus
                                                autocomplete="off"
                                                required
                                            />
                                        </div>
                                        @error('email')
                                            <span class="text-xs text-danger">{{ Str::replaceLast('.', '!', $message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <div
                                            class="input-group input-group-merge input-group-alternative"
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    ><i
                                                        class="ni ni-lock-circle-open"
                                                    ></i
                                                ></span>
                                            </div>
                                            <input
                                                class="form-control"
                                                placeholder="Password"
                                                type="password"
                                                name="password"
                                                value=""
                                                required
                                            />
                                        </div>
                                        @error('password')
                                            <span class="text-xs text-danger">{{ Str::replaceLast('.', '!', $message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button
                                            type="submit"
                                            class="btn btn-primary my-3"
                                        >
                                            Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <a href="/" class="text-light"
                                    ><small>Kembali ke beranda</small></a
                                >
                            </div>
                        </div>
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

        <!-- Argon JS -->
        <script src="{{ asset('assets/dashboard/js/argon.js?v=1.1.0') }}"></script>

        {{-- Custom JS --}}
        <script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>
    </body>
</html>
