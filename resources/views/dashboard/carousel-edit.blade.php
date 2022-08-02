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
                                Edit Tayangan Slide
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
                        <h3 class="mb-0">Edit Tayangan Slide</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form method="post" action="/dashboard/carousels/{{ $carousel->id }}" enctype="multipart/form-data" autocomplete="off">
        
                            @method('put')
                            @csrf
                            
                            <div class="form-group row">
                                <label
                                    for="image"
                                    class="col-md-2 col-form-label form-control-label text-md-right"
                                    >Foto <span class="text-danger">*</span></label
                                >
                                <div class="col-md-10">
                                    <input
                                        class="form-control @error('image') is-invalid @enderror"
                                        type="file"
                                        id="image"
                                        name="image"
                                    />
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <img
                                        src="{{ asset('storage/'.$carousel->image) }}"
                                        class="rounded mt-2"
                                        height="100px"
                                    />
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label
                                    for="text"
                                    class="col-md-2 col-form-label form-control-label text-md-right"
                                    >Teks <span class="text-danger">*</span></label
                                >
                                <div class="col-md-10">
                                    <textarea name="text" id="text" rows="5" class="form-control @error('text') is-invalid @enderror" required>{{  old('text', $carousel->text)  }}</textarea>
                                    @error('text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard/carousels" class="btn btn-secondary">Batal</a>
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