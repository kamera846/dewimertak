@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Seksi
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
                                Edit Seksi
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
                        <h3 class="mb-0">Edit Seksi</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form method="post" action="/dashboard/sections/{{ $section->id }}" enctype="multipart/form-data">
        
                            @method('put')
                            @csrf
                            
                            <div class="form-group row">
                                <label
                                    for="code"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Kode <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="code"
                                        name="code"
                                        value="{{ $section->code }}"
                                        readonly
                                    />
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="on_page"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Di Halaman <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="on_page"
                                        name="on_page"
                                        value="{{ $section->on_page }}"
                                        readonly
                                    />
                                </div>
                            </div>
                            
                            @if($section->title)
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label form-control-label text-md-right">
                                    Teks Judul
                                </label>
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('title') is-invalid @enderror"
                                        type="text"
                                        id="title"
                                        name="title"
                                        value="{{ old('title', $section->title) }}"
                                    />
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            
                            @if($section->code == 'judul-halaman' || $section->code == 'wa-form')
                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label form-control-label text-md-right">
                                    {{ ($section->code == 'wa-form') ? 'Foto' : 'Latar Belakang' }}
                                </label>
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('image') is-invalid @enderror"
                                        type="file"
                                        id="image"
                                        name="image"
                                    />
                                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    @if($section->image)
                                    <img
                                        src="{{ asset('storage/'.$section->image) }}"
                                        class="rounded mt-2"
                                        height="100px"
                                    />
                                    @endif
                                </div>
                            </div>
                            @endif

                            {{-- <div class="form-group row">
                                <label class="col-md-3 col-form-label form-control-label text-md-right">
                                    Konten
                                </label>
                                <div class="col-md-9 pt-2">
                                    <span class="text-sm">Klik <a href="/dashboard">Disini</a> untuk mengelola isi seksi</span>
                                </div>
                            </div> --}}
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard/sections" class="btn btn-secondary">Batal</a>
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