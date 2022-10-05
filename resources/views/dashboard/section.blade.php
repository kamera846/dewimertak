@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Bagian Lainnya
                    </h6>
                    <nav
                        aria-label="breadcrumb"
                        class="d-none d-md-inline-block ml-md-4"
                    >
                        <ol
                            class="breadcrumb breadcrumb-links breadcrumb-dark"
                        >
                            <li class="breadcrumb-item">
                                <a href="/dashboard"
                                    ><i class="fas fa-home"></i
                                ></a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                Data Bagian Lainnya
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            {{-- Flash Message --}}
            @if (session()->has('success'))
                <div class="row px-3">
                    <div class="alert alert-success alert-dismissible fade show" style="width: 100%" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"> {{ session('success') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Halaman Beranda</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Kode</th>
                        <th>Teks Judul</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($homeSections as $section)
                    
                    <tr>
                        <td>
                            {{ $section->code }}
                        </td>
                        <td>
                            {{ $section->title ? $section->title : '-' }}
                        </td>
                        <td>
                            <a
                                @if($section->code == 'tayangan-slide')
                                    href="/dashboard/carousels"
                                @elseif($section->code == 'tentang-kami')
                                    href="/dashboard/about"
                                @else
                                    href="/dashboard/sections/{{ $section->id }}/edit"
                                @endif
                            >
                                Kelola
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Halaman Tentang</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Kode</th>
                        <th>Teks Judul</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($aboutSections as $section)
                    
                    <tr>
                        <td>
                            {{ $section->code }}
                        </td>
                        <td>
                            {{ $section->title ? $section->title : '-' }}
                        </td>
                        <td>
                            <a
                                @if($section->code == 'tayangan-slide')
                                    href="/dashboard/carousels"
                                @elseif($section->code == 'tentang-kami')
                                    href="/dashboard/about"
                                @else
                                    href="/dashboard/sections/{{ $section->id }}/edit"
                                @endif
                            >
                                Kelola
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Halaman Artikel</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Kode</th>
                        <th>Teks Judul</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($postSections as $section)
                    
                    <tr>
                        <td>
                            {{ $section->code }}
                        </td>
                        <td>
                            {{ $section->title ? $section->title : '-' }}
                        </td>
                        <td>
                            <a
                                href="/dashboard/sections/{{ $section->id }}/edit"
                            >
                                Kelola
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Halaman Galeri</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Kode</th>
                        <th>Teks Judul</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($gallerySections as $section)
                    
                    <tr>
                        <td>
                            {{ $section->code }}
                        </td>
                        <td>
                            {{ $section->title ? $section->title : '-' }}
                        </td>
                        <td>
                            <a
                                href="/dashboard/sections/{{ $section->id }}/edit"
                            >
                                Kelola
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Halaman Kontak</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Kode</th>
                        <th>Teks Judul</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($contactSections as $section)
                    
                    <tr>
                        <td>
                            {{ $section->code }}
                        </td>
                        <td>
                            {{ ($section->code == 'wa-form' || $section->code == 'judul-halaman') ? $section->title : '-' }}
                        </td>
                        <td>
                            <a
                                href="/dashboard/sections/{{ $section->id }}/edit"
                            >
                                Kelola
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.dashboard-footer')

</div>

@endsection