@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-8">
                    <nav
                        aria-label="breadcrumb"
                        class="d-none d-md-inline-block"
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
                                Profil Desa
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
    <div class="col p-0">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Profil Desa</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/dashboard/profile/edit" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit Profil">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                            <span class="btn-inner--text">Edit</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card body -->
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-sm">
                        <div class="row mb-5">
                            <div class="col-4 font-weight-bold text-right">Nama Situs :</div>
                            <div class="col-8 pl-0">{{ $profile->site_name }}</div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-4 font-weight-bold text-right">Logo :</div>
                            <div class="col-8 pl-0">
                                @if ($profile->logo)
                                    <img src="{{ asset('storage/'.$profile->logo) }}" height="50px" class="shadow" alt="">
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-4 font-weight-bold text-right">Favicon :</div>
                            <div class="col-8 pl-0">
                                @if ($profile->favicon)
                                    <img src="{{ asset('storage/'.$profile->favicon) }}" height="30px" class="shadow" alt="">
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-4 font-weight-bold text-right">Alamat Email :</div>
                            <div class="col-8 pl-0">{{ $profile->email }}</div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-4 font-weight-bold text-right">No. Telepon :</div>
                            <div class="col-8 pl-0">{{ $profile->telephone }}</div>
                        </div>

                        <div class="row mb-md-5">
                            <div class="col-4 font-weight-bold text-right">Lokasi :</div>
                            <div class="col-8 pl-0">{{ $profile->location }}</div>
                        </div>
                    </div>
                </div>
            </div>
              
        </div>
    </div>

    <!-- Footer -->
    @include('partials.dashboard-footer')

</div>

@endsection