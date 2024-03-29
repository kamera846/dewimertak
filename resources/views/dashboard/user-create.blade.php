@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Pengguna
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
                                Buat Pengguna
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
                        <h3 class="mb-0">Buat Pengguna</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <form method="post" action="/dashboard/users" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Nama <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        value="{{ old('name') }}"
                                        id="name"
                                        name="name"
                                        required
                                    />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="image"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Foto</label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('image') is-invalid @enderror"
                                        type="file"
                                        id="image"
                                        name="image"
                                    />
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            @if($superAdmin->count() < 2)
                            <div class="form-group row">
                                <label
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Role <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <div class="custom-control custom-radio col-6 mb-3">
                                        <input name="role" class="custom-control-input" id="admin" type="radio" value="admin" {{ (!old('role') || old('role') === 'admin' ? 'checked' : '') }}>
                                        <label class="custom-control-label" for="admin">Admin</label>
                                    </div>
                                    <div class="custom-control custom-radio col-6 mb-3">
                                        <input name="role" class="custom-control-input" id="super-admin" type="radio" value="super-admin" {{ (old('role') === 'super-admin' ? 'checked' : '') }}>
                                        <label class="custom-control-label" for="super-admin">Super-admin</label>
                                    </div>
                                </div>
                            </div>
                            @else
                            <input type="hidden" name="role" value="admin">
                            @endif
                            
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >E-mail <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
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
                                    >Telepon</label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        type="number"
                                        id="telephone"
                                        name="telephone"
                                        value="{{ old('telephone') }}"\
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
                                    for="password"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Kata Sandi <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('password') is-invalid @enderror"
                                        type="password"
                                        id="password"
                                        name="password"
                                        required
                                    />
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="address"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Alamat <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <textarea name="address" id="address" rows="5" class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Buat</button>
                                    <a href="/dashboard/users" class="btn btn-secondary">Batal</a>
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