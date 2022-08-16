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
                                Edit Layanan & Produk
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
                        <h3 class="mb-0">Edit Layanan & Produk</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form method="post" action="/dashboard/features/{{ $feature->id }}" enctype="multipart/form-data" autocomplete="off">
        
                            @method('put')
                            @csrf
                                  
                            <div class="form-group">
                                <label
                                    for="name"
                                    class="form-control-label"
                                    >Nama <span class="text-danger">*</span></label
                                >
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    value="{{ old('name', $feature->name) }}"
                                />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label
                                    for="image"
                                    class="form-control-label"
                                    >Foto</label
                                >
                                <input
                                    class="form-control @error('image') is-invalid @enderror"
                                    type="file"
                                    id="image"
                                    name="image"
                                />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($feature->image)
                                    <img
                                        src="{{ asset('storage/'.$feature->image) }}"
                                        class="rounded mt-2"
                                        height="100px"
                                    />
                                @endif
                            </div> --}}
        
                            <div class="form-group">
                                <label
                                    for="content"
                                    class="form-control-label"
                                    >Konten <span class="text-danger">*</span></label
                                >
                                @error('content')
                                    <div class="text-danger text-sm mb-2">{{ $message }}</div>   
                                @enderror
                                <textarea name="content" id="content">{{ old('content', $feature->content) }}</textarea>
                            </div>
                            
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/dashboard/features" class="btn btn-secondary">Batal</a>
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