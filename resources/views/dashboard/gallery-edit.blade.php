@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Galeri
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
                                Edit Galeri
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
                        <h3 class="mb-0">Edit Galeri</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form method="post" action="/dashboard/galleries/{{ $gallery->id }}" enctype="multipart/form-data" autocomplete="off">
        
                            @method('put')
                            @csrf
                            
                            <div class="form-group row">
                                <label
                                    for="type"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Jenis <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <select name="type" id="type" class="form-control" required @error('type') is-invalid @enderror required>
                                        <option value="image" {{ old('type', $gallery->type) == 'image' ? 'selected' : '' }}>Foto</option>
                                        <option value="video_link"  {{ old('type', $gallery->type) == 'video_link' ? 'selected' : '' }}>Video</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row image-field {{ $gallery->type == 'video_link' ? 'd-none' : '' }}">
                                <label
                                    for="image"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Foto <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <input
                                        class="form-control @error('image') is-invalid @enderror"
                                        type="file"
                                        id="image"
                                        name="image"
                                    />
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($gallery->image)
                                    <img
                                        src="{{ asset('storage/'.$gallery->image) }}"
                                        class="rounded mt-2"
                                        height="100px"
                                    >
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row video-field {{ $gallery->type == 'image' ? 'd-none' : '' }}">
                                <label
                                    for="video_link"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Semat Video <span class="text-danger">*</span></label
                                >
                                <div class="col-md-9">
                                    <textarea name="video_link" id="video_link" rows="4" class="form-control @error('video_link') is-invalid @enderror">{{ old('video_link', $gallery->video_link) }}</textarea>
                                    @error('video_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    {{-- <input
                                        class="form-control @error('video_link') is-invalid @enderror"
                                        type="text"
                                        id="video_link"
                                        name="video_link"
                                        value="{{ old('video_link', $gallery->video_link) }}"
                                    />
                                    @error('video_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label
                                    for="caption"
                                    class="col-md-3 col-form-label form-control-label text-md-right"
                                    >Keterangan</label
                                >
                                <div class="col-md-9">
                                    <textarea name="caption" id="caption" rows="5" class="form-control @error('caption') is-invalid @enderror">{{  old('caption', $gallery->caption)  }}</textarea>
                                    @error('caption')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard/galleries" class="btn btn-secondary">Batal</a>
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