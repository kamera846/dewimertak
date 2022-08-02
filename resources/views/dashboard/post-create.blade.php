@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Artikel
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
                                Buat Postingan
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
                    <div class="col ">
                        <h3 class="mb-0">Buat Postingan</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body pt-4 pb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form method="post" action="/dashboard/posts" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label
                                    for="title"
                                    class="form-control-label"
                                    >Judul <span class="text-danger">*</span></label
                                >
                                <input
                                    class="form-control @error('title') is-invalid @enderror"
                                    type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    autofocus
                                    required
                                />
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>   
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label
                                    for="image"
                                    class="form-control-label"
                                    >Foto <span class="text-danger">*</span></label
                                >
                                <input
                                    class="form-control @error('image') is-invalid @enderror"
                                    type="file"
                                    id="image"
                                    name="image"
                                    required
                                />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label
                                    for="category"
                                    class="form-control-label"
                                    >Kategori <span class="text-danger">*</span></label
                                >
                                <select name="category" class="form-control @error('category') is-invalid @enderror" data-toggle="select" id="category" {{ !$categories->count()?'disabled':'' }} required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category') == $category->id)?'selected':'' }}>{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if(!$categories->count())
                                    <div class="text-warning text-sm mt-2">Kategori masih kosong! klik <a href="/dashboard/post-categories">disini</a> untuk membuat data.</div>
                                @endif
                            </div>
        
                            <div class="form-group">
                                <label
                                    for="tags"
                                    class="form-control-label"
                                    >Tags</label
                                >
                                <input
                                    class="form-control @error('tags') is-invalid @enderror"
                                    type="text"
                                    name="tags"
                                    value="{{ old('tags') }}"
                                    id="tags"
                                />
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>   
                                @enderror
                                <div class="text-sm text-warning">
                                    Pisahkan antar tag dengan tanda koma ( , )
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label
                                    for="content"
                                    class="form-control-label"
                                    >Konten <span class="text-danger">*</span></label
                                >
                                @error('content')
                                    <div class="text-danger text-sm mb-2">{{ $message }}</div>   
                                @enderror
                                <textarea name="content" id="content">{{ old('content') }}</textarea>
                            </div>
                            
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Buat</button>
                                <a href="/dashboard/posts" class="btn btn-secondary">Batal</a>
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