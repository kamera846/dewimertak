@extends('layouts.main')

@section('page-content')

<section class="wrapper bg-soft-green">
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
                    {{ $allGalleriesSection->title ? $allGalleriesSection->title : 'Momen-momen yang berhasil kami abadikan' }}
                </h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="grid grid-view projects-masonry">
            <div
                class="row gx-md-8 gy-10 gy-md-13 isotope"
                style="position: relative; height: 1147.05px"
            >

                @foreach ($galleries as $gallery)
                    <div
                        class="project item col-md-6 col-xl-4 product"
                        style="position: absolute; left: 0%; top: 0px"
                    >
                        <figure class="lift rounded mb-6">
                            <a href="/storage/{{ $gallery->image }}" data-glightbox="description: {{ $gallery->caption }}" data-gallery="g1">
                                <img src="/storage/{{ $gallery->image }}" alt="{{ $gallery->caption }}"/>
                            </a>
                        </figure>
                        {{-- <div
                            class="project-details d-flex justify-content-center flex-column"
                        >
                            <div class="post-header">
                                <h3 class="h5">Cras Fermentum Sem</h3>
                            </div>
                            <!-- /.post-header -->
                        </div>
                        <!-- /.project-details --> --}}
                    </div>
                @endforeach
                <!-- /.project -->
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.grid -->

        <div class="row pt-5">
            {{ $galleries->links('vendor.pagination.bootstrap-5') }}
        </div>

        @else

        <div class="row">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto mb-8">

                <h3 class="text-center">
                    Belum ada momen untuk dibagikan.
                </h3>
            </div>
            <!-- /column -->
        </div>

        @endif

    </div>
    <!-- /.content-wrapper -->
</section>

@endsection
