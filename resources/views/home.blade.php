@extends('layouts.main')

@section('page-content')
@php

$randomClass = [
    'col-md-10 offset-md-1 col-lg-7 offset-lg-0 col-xl-6 col-xxl-5 text-center text-lg-start justify-content-center align-self-center align-items-start',
    'col-md-11 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center justify-content-center align-self-center',
    'col-md-10 offset-md-1 col-lg-7 offset-lg-5 col-xl-6 offset-xl-6 col-xxl-5 offset-xxl-6 text-center text-lg-start justify-content-center align-self-center align-items-start'
];

@endphp

<section class="wrapper bg-dark">
    <div class="swiper-container swiper-hero dots-over" data-margin="0" data-autoplay="true" data-autoplaytime="5000" data-nav="true" data-dots="true" data-items="1">
        <div class="swiper">
            <div class="swiper-wrapper">

                @if($carousels->count() > 5)

                    @foreach($carousels as $carousel)
                        <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="/storage/{{ $carousel->image }}">
                            <div class="container h-100">
                                <div class="row h-100">
                                    {{-- <div class="{{ $randomClass[array_rand($randomClass)] }}"> --}}
                                    <div class="col-md-11 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center justify-content-center align-self-center">
                                        <h2 class="fs-56 mb-4 text-white animate__animated animate__slideInDown animate__delay-1s">{{ $carousel->title }}</h2>
                                        <p class="lead fs-23 lh-sm mb-7 text-white animate__animated animate__slideInRight animate__delay-2s">{{ $carousel->sub_title }}</p>
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                            </div>
                            <!--/.container -->
                        </div>
                    @endforeach

                @else

                    <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="/storage/default/image.jpg">
                        <div class="container h-100">
                            <div class="row h-100">
                                {{-- <div class="{{ $randomClass[array_rand($randomClass)] }}"> --}}
                                <div class="col-md-11 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center justify-content-center align-self-center">
                                    <h2 class="fs-56 mb-4 text-white animate__animated animate__slideInDown animate__delay-1s">Judul Carousel Pertama</h2>
                                    <p class="lead fs-23 lh-sm mb-7 text-white animate__animated animate__slideInRight animate__delay-2s">Ini sub judul carousel pertama</p>
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!--/.container -->
                    </div>

                    <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="/storage/default/image.jpg">
                        <div class="container h-100">
                            <div class="row h-100">
                                {{-- <div class="{{ $randomClass[array_rand($randomClass)] }}"> --}}
                                <div class="col-md-11 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center justify-content-center align-self-center">
                                    <h2 class="fs-56 mb-4 text-white animate__animated animate__slideInDown animate__delay-1s">Judul Carousel Kedua</h2>
                                    <p class="lead fs-23 lh-sm mb-7 text-white animate__animated animate__slideInRight animate__delay-2s">Ini sub judul carousel kedua</p>
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!--/.container -->
                    </div>

                @endif
                <!--/.swiper-slide -->
            
            </div>
            <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
    </div>
    <!-- /.swiper-container -->
  </section>
<!-- /section -->

<section class="wrapper bg-light mt-3 angled upper-end lower-end">
    <div class="container">
        <div
            class="row py-14 py-md-18 gx-lg-8 gx-xl-12 gy-10 align-items-center"
        >
            <div
                class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative"
            >
                <div
                    class="shape bg-soft-primary rounded-circle rellax w-20 h-20"
                    data-rellax-speed="1"
                    style="top: -2rem; right: -1.9rem"
                ></div>
                <figure class="rounded">
                    <img
                        @if($about->image)
                            src="/storage/{{ $about->image }}"
                        @else
                            src="/storage/default/image.jpg"
                        @endif
                        alt="{{ $about->title }}"
                        style="max-height: 400px; object-fit: cover"
                    />
                </figure>
            </div>
            <!--/column -->
            <div class="col-lg-6">
                <h2 class="mb-3">{{ $about->title }}</h2>
                <p class="lead fs-md pe-lg-10">
                    {{ substr(strip_tags($about->content), 0, 470)  }}...
                </p>
                <a href="/about" class="btn btn-sm btn-green">Selengkapnya</a>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->

    @if($latestGalleries->count())
    <div class="container py-14 py-md-16">
        <div class="row pb-7">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto mb-8">

                <h2 class="text-center">
                    {{ $latestGallerySection->title ? $latestGallerySection->title : 'Momen-momen yang berhasil kami abadikan' }}
                </h2>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="grid grid-view projects-masonry">
            <div
                class="row gx-md-8 gy-10 gy-md-13 isotope"
                style="position: relative; height: 1147.05px"
            >

                @foreach ($latestGalleries as $gallery)
                    <div
                        class="project item col-md-6 col-xl-4 product"
                        style="position: absolute; left: 0%; top: 0px"
                    >
                        <figure class="lift rounded mb-6">
                            <a href="/storage/{{ $gallery->image }}" data-glightbox="description: {{ $gallery->caption }}" data-gallery="g1">
                                <img src="/storage/{{ $gallery->image }}" alt="{{ $gallery->caption }}" style="max-height: 500px; object-fit:cover;"/>
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
    </div>
    @endif
    <!-- /.content-wrapper -->

    <div class="container pt-11 pt-md-13 pb-10 pb-md-12">
        {{-- <div class="row mb-7">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                <h2 class="mb-10">
                    {{ $contactInfoSection->title ? $contactInfoSection->title : 'Jika Anda Punya Pertanyaan atau Saran, Silahkan Menghubungi Kami' }}
                </h2>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row --> --}}
        <div class="row mb-15">
            <div class="col-xl-10 mx-auto">
                <div class="card">
                    <div class="row gx-0">
                        <div class="col-lg-6 align-self-stretch">
                            <div
                                class="map map-full rounded-top rounded-lg-start"
                            >
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63066.38347626953!2d116.32788477188889!3d-8.912188965613169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcd00f256982d81%3A0x6729802b0161a7d8!2sMertak%2C%20Kec.%20Pujut%2C%20Kabupaten%20Lombok%20Tengah%2C%20Nusa%20Tenggara%20Bar.!5e0!3m2!1sid!2sid!4v1660136311998!5m2!1sid!2sid"
                                    style="width: 100%; height: 100%; border: 0"
                                    allowfullscreen=""
                                ></iframe>
                            </div>
                            <!-- /.map -->
                        </div>
                        <!--/column -->
                        <div class="col-lg-6">
                            <div class="p-10 p-md-11 p-lg-14">
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-green fs-28 me-6 mt-n1">
                                            <i class="uil uil-location-pin-alt"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Lokasi</h5>
                                        <address>
                                            {{ $profile->location }}
                                        </address>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-green fs-28 me-6 mt-n1">
                                            <i class="uil uil-phone-volume"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Telepon</h5>
                                        <p>{{ $profile->telephone }}</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-green fs-28 me-6 mt-n1">
                                            <i class="uil uil-envelope"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">E-mail</h5>
                                        <p class="mb-0">
                                            {{ $profile->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--/div -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>

    @if($latestPosts->count())
    <div class="container pt-10 pt-md-12 pb-13 pb-md-15">
        <div class="row mb-5">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                <h2 class="mb-10">
                    {{ $latestPostSection->title ? $latestPostSection->title : 'Artikel Terbaru' }}
                </h2>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="blog grid grid-view">
                    <div class="row isotope gx-md-8 gy-8 mb-8">

                        @foreach($latestPosts as $post)
                        <article class="item post col-lg-4 col-md-6">
                            <div class="card">
                                <figure
                                    class="card-img-top overlay overlay-1 hover-scale"
                                >
                                    <a href="/posts/{{ $post->slug }}">
                                        <img
                                            src="/storage/{{ $post->image }}"
                                            alt="{{ $post->title }}"
                                            style="height: 250px !important; object-fit: cover;"
                                    /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-0">selengkapnya</h5>
                                    </figcaption>
                                </figure>
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line">
                                            <a
                                                href="/posts?category={{ $post->category->slug }}"
                                                class="hover"
                                                rel="category"
                                                >{{ ucwords($post->category->name) }}</a
                                            >
                                        </div>
                                        <!-- /.post-category -->
                                        <h2 class="h3 mt-1 mb-3">
                                            <a
                                                class="link-dark"
                                                href="/posts/{{ $post->slug }}"
                                                >{{ strlen($post->title) <= 45 ? $post->title : substr($post->title, 0, 45).'..'  }}</a
                                            >
                                        </h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        {{ substr(strip_tags($post->content), 0, 115) }}...
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!--/.card-body -->
                                <div class="card-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date">
                                            <i class="uil uil-calendar-alt"></i
                                            ><span>{{ $post->created_at->isoFormat('D MMM Y') }}</span>
                                        </li>
                                        <li class="post-author">
                                            <a href="/posts?author={{ $post->user->slug }}"
                                                ><i class="uil uil-user"></i
                                                ><span>{{ $post->user->name }}</span></a
                                            >
                                        </li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </article>
                        @endforeach
                        <!-- /.post -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.blog -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    @endif
    <!-- /.container -->

</section>
<!-- /.content-wrapper -->

@endsection
