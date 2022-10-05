@extends('layouts.main')

@section('page-content')

<section class="wrapper bg-soft-green pt-14">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
                <h1 class="mb-3">
                    {{ $pageTitleSection->title ? $pageTitleSection->title : 'Galeri' }}
                </h1>
                <nav class="d-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Galeri
                        </li>
                    </ol>
                </nav>
                <!-- /nav -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light angled upper-end lower-end">
    <div class="container py-14 py-md-16">
        @if($galleries->count())

        <div class="row pb-7">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto mb-8">
                <h3 class="text-center">
                    {{ $allGalleriesSection->title ? $allGalleriesSection->title
                    : 'Momen-momen yang berhasil kami abadikan' }}
                </h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="grid grid-view projects-masonry">
            <div class="isotope-filter filter mb-10">
                <p>Filter:</p>
                <ul>
                    <li>
                        <a class="filter-item active" data-filter="*">Semua</a>
                    </li>
                    <li>
                        <a class="filter-item" data-filter=".image">Foto</a>
                    </li>
                    <li>
                        <a class="filter-item" data-filter=".video_link"
                            >Video</a
                        >
                    </li>
                </ul>
            </div>
            <div class="row gx-md-10 gy-10 gy-md-13 isotope">
                @foreach($galleries as $gallery)

                <div class="project item col-md-6 {{ $gallery->type }}">
                    <figure class="lift rounded mb-6">
                        @if($gallery->type == 'image')
                        <a href="/storage/{{ $gallery->image }}" data-glightbox="description: {{ $gallery->caption }}" data-gallery="g1">
                            <img
                                src="/storage/{{ $gallery->image }}"
                                alt="{{ $gallery->caption }}"
                                style="max-height: 450px; object-fit: cover;"
                            />
                        </a>
                        @else
                        <div class="player">{!! $gallery->video_link !!}</div>
                        @endif
                    </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            {{--
                            <div
                                class="post-category text-line mb-3 text-purple"
                            >
                                Cosmetic
                            </div>
                            --}}
                            <h4 class="">{{ $gallery->caption }}</h4>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>

                @endforeach
                <!-- /.project -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.grid -->

        <div class="row pt-7">
            {{ $galleries->links('vendor.pagination.bootstrap-5') }}
        </div>

        @else

        <div class="row justify-content-center py-5 fs-20">
            Belum ada momen untuk dibagikan.
        </div>

        @endif
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

@endsection
