@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Bagian
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
                                Tentang Desa
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
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
                        <h3 class="mb-0">Tentang Desa</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/dashboard/about/edit" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit Profil">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                            <span class="btn-inner--text">Edit</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12 px-5 py-3">
                                <div class="row mb-5">
                                    <h2>Judul : {{ $about->title }}</h2>
                                </div>
                                <div class="row mb-5">
                                    <h4>Gambar :</h4>
                                    @if($about->image)
                                        <img src="{{ asset('storage/'.$about->image) }}" style="width: 100%; max-height:325px; object-fit: cover;" class="rounded mb-3" alt="">
                                    @else
                                        <img src="{{ asset('storage/default/image.jpg') }}" style="width: 100%; max-height:325px; object-fit: cover;" class="rounded mb-3" alt="">
                                    @endif
                                </div>
                                <div class="row text-sm text-justify mt-2">
                                    <span>Konten :</span>
                                    {!! $about->content !!}
                                </div>
                            </div>
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