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
                                Detail Postingan
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
                        <h3 class="mb-0">Detail Postingan</h3>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-12 px-5 py-3">
                                <div class="row">
                                    <img src="{{ asset('storage/'.$post->image) }}" style="width: 100%; max-height:400px; object-fit: cover;" class="rounded mb-4" alt="">
                                </div>
                                <div class="row mb-2">
                                    <h2>{{ $post->title }}</h2>
                                </div>
                                <div class="row mb-4">
                                    <span class="text-xs text-muted">
                                        <i class="ni ni-single-02 mr-1"></i> {{ ucwords($post->user->name) }} <span class="mx-2">|</span>
                                        <i class="ni ni-archive-2 mr-1"></i> {{ ucwords($post->category->name) }} <span class="mx-2">|</span>
                                        <i class="ni ni-calendar-grid-58 mr-1"></i> {{ $post->created_at->isoFormat('dddd, D MMMM Y') }} (terakhir diubah {{ $post->updated_at->diffForHumans() }})
                                    </span>
                                </div>
                                <div class="row text-sm text-justify mt-2">
                                    {!! $post->content !!}
        
                                    <p class="text-md mt-4 mb-0">
                                        <i class="ni ni-tag text-xs mr-2"></i>
                                        tags:
                                        {{ ($post->tags) ? $post->tags : '-' }}
                                    </p>
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