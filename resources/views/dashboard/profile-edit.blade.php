@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
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
                                Edit Profil Desa
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
                    <div class="col">
                        <h3 class="mb-0">Edit Profil Desa</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-md-4 pb-md-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form method="post" action="/dashboard/profile/1" enctype="multipart/form-data" autocomplete="off">

                            @method('put')
                            @csrf
                            
                            <div class="form-group row">
                                <label
                                    for="site_name"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Nama Situs <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('site_name') is-invalid @enderror"
                                        type="text"
                                        value="{{ old('site_name', $profile->site_name) }}"
                                        id="site_name"
                                        name="site_name"
                                        required
                                    />
                                    @error('site_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="logo"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Logo </label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('logo') is-invalid @enderror"
                                        type="file"
                                        id="logo"
                                        name="logo"
                                    />
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if ($profile->logo)
                                        <img
                                            src="{{ asset('storage/'.$profile->logo) }}"
                                            height="50px"
                                            class="rounded shadow mt-2"
                                        />
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="favicon"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Favicon</label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('favicon') is-invalid @enderror"
                                        type="file"
                                        id="favicon"
                                        name="favicon"
                                    />
                                    @error('favicon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if ($profile->favicon)
                                        <img
                                            src="{{ asset('storage/'.$profile->favicon) }}"
                                            height="30px"
                                            class="rounded shadow mt-2"
                                        />
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Alamat Email <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $profile->email) }}"
                                        required
                                    />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="telephone"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >No. Telepon <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        type="number"
                                        id="telephone"
                                        name="telephone"
                                        value="{{ old('telephone', $profile->telephone) }}"
                                        required
                                    />
                                    @error('telephone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="location"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    > Lokasi <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <textarea
                                        name="location" 
                                        id="location" 
                                        rows="5" 
                                        class="form-control @error('location') is-invalid @enderror"
                                        required
                                    >{{ old('location', $profile->location) }}</textarea>
                                    @error('location') 
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard/profile" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.dashboard-footer')

</div>

@endsection