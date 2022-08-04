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
                                Edit Jejaring Sosial
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
                        <h3 class="mb-0">Edit Jejaring Sosial</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 py-md-5">
                        <form method="post" action="/dashboard/socials/{{ $social->id }}" enctype="multipart/form-data" autocomplete="off">
        
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label
                                    for="app"
                                    class="col-md-2 col-form-label form-control-label text-md-right"
                                    >Aplikasi <span class="text-danger">*</span></label
                                >
                                <div class="col-md-10">
                                    <select name="app" class="form-control @error('app') is-invalid @enderror" data-toggle="select" id="app" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach($options as $option)
                                            <option
                                                value="{{ $option }}"
                                                {{ (old('app') == $option || $social->app == $option)?'selected':'' }}
                                                @foreach($socials as $social2)
                                                    {{ $option == $social2->app && $option != $social->app ? 'disabled' : '' }}
                                                @endforeach
                                            >{{ ucwords($option) }}</option>
                                        @endforeach
                                    </select>
                                    @error('app')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label
                                    for="link"
                                    class="col-md-2 col-form-label form-control-label text-md-right"
                                    >Tautan <span class="text-danger">*</span></label
                                >
                                <div class="col-md-10">
                                    <input
                                        class="form-control @error('link') is-invalid @enderror"
                                        type="input"
                                        value="{{ old('link', $social->link) }}"
                                        id="link"
                                        name="link"
                                        required
                                    />
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard/socials" class="btn btn-secondary">Batal</a>
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