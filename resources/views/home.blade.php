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

                @foreach($carousels as $carousel)
                <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="/storage/{{ $carousel->image }}">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="{{ $randomClass[array_rand($randomClass)] }}">
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
                <!--/.swiper-slide -->
            
            </div>
            <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
    </div>
    <!-- /.swiper-container -->
  </section>
<!-- /section -->

<section class="wrapper mt-20">
    <div class="container pt-14 pt-md-16 pb-3 pb-md-3">
        <div class="row gx-md-8 gy-8 text-center mb-14 mb-md-17">
            <div class="col-md-6 col-lg-4 text-start pe-md-10">
                <h4>Spot Wisata</h4>
                <p>
                    <ul class="ps-3">
                        <li>Istana Ular</li>
                        <li>Sawah Beo Galang</li>
                        <li>Spot Foto Istana Ular</li>
                    </ul>
                </p>
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4 text-start pe-md-10">
                <h4>Fasilitas</h4>
                <p>
                    <ul class="ps-3 ">
                        <li>Areal Parkir</li>
                        <li>Balai Pertemuan</li>
                        <li>Kamar Mandi Umum</li>
                        <li>Kios Souvenir</li>
                        <li>Tempat Makan (Kuliner, Warung)</li>
                        <li>Selfie Area & Spot Foto</li>
                    </ul>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 text-start pe-md-10">
                <h4>Makanan Khas & Souvenir</h4>
                <p>
                    Makanan khas:
                    <ul class="ps-3 mb-0">
                        <li>Rebok</li>
                        <li>Serabe</li>
                    </ul>
                    Adapun souvenir:
                    <ul class="ps-3 mb-0">
                        <li>Selendang</li>
                        <li>Selempang</li>
                    </ul>
                </p>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<section class="wrapper bg-light mt-3 angled upper-end lower-end">
    <div class="container">
        <div
            class="row pt-8 pt-md-14 pb-20 gx-lg-8 gx-xl-12 gy-10 align-items-center"
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
                        src="/assets/landing-page/img/photos/about7.jpg"
                        srcset="/assets/landing-page/img/photos/about7@2x.jpg 2x"
                        alt=""
                    />
                </figure>
            </div>
            <!--/column -->
            <div class="col-lg-6">
                <h2 class="mb-3">Cerita Desa</h2>
                <p class="lead fs-lg pe-lg-10">
                    Konon, keberadaan istana ular pertama kali terjadi karena sebuah peristiwa pada Suku Ronggot. Sebagaimana diyakini dan diceritakan masyarakat setempat, kisah ini adalah legenda tentang dua orang kakak beradik yang melakukan hubungan sedarah, kemudian diasingkan dan mengungsi ke sebuah goa.
                </p>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
    <div class="container py-10 py-md-12">
        <div class="row mb-4">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto mb-8">
                <h3 class="text-center">
                    Momen-momen yang berhasil kami abadikan
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
                <div
                    class="project item col-md-6 col-xl-4 product"
                    style="position: absolute; left: 0%; top: 0px"
                >
                    <figure class="lift rounded mb-6">
                        <a href="..//assets/landing-page/landing-page/img/photos/cs16.jpg" data-glightbox="title: Title; description: Description" data-gallery="g1">
                            <img src="..//assets/landing-page/landing-page/img/photos/cs16.jpg" alt=""/>
                        </a>
                        </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            <h3 class="h5">Cras Fermentum Sem</h3>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>
                <!-- /.project -->
                <div
                    class="project item col-md-6 col-xl-4 workshop"
                    style="position: absolute; left: 33.3333%; top: 0px"
                >
                    <figure class="lift rounded mb-6">
                        <a href="..//assets/landing-page/landing-page/img/photos/cs17.jpg" data-glightbox="title: Title; description: Description" data-gallery="g1">
                            <img src="..//assets/landing-page/landing-page/img/photos/cs17.jpg" alt=""/>
                        </a>
                        </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            <h3 class="h5">Mollis Ipsum Mattis</h3>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>
                <!-- /.project -->
                <div
                    class="project item col-md-6 col-xl-4 still-life"
                    style="position: absolute; left: 66.6667%; top: 0px"
                >
                    <figure class="lift rounded mb-6">
                        <a href="..//assets/landing-page/landing-page/img/photos/cs18.jpg" data-glightbox="title: Title; description: Description" data-gallery="g1">
                            <img src="..//assets/landing-page/landing-page/img/photos/cs18.jpg" alt=""/>
                        </a>
                        </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            <h3 class="h5">
                                Ipsum Ultricies Cursus
                            </h3>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>
                <!-- /.project -->
                <div
                    class="project item col-md-6 col-xl-4 product"
                    style="position: absolute; left: 66.6667%; top: 499.812px"
                >
                    <figure class="lift rounded mb-6">
                        <a href="..//assets/landing-page/landing-page/img/photos/cs20.jpg" data-glightbox="title: Title; description: Description" data-gallery="g1">
                            <img src="..//assets/landing-page/landing-page/img/photos/cs20.jpg" alt=""/>
                        </a>
                        </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            <h3 class="h5">
                                Inceptos Euismod Egestas
                            </h3>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>
                <!-- /.project -->
                <div
                    class="project item col-md-6 col-xl-4 product"
                    style="position: absolute; left: 0%; top: 581.125px"
                >
                    <figure class="lift rounded mb-6">
                        <a href="..//assets/landing-page/landing-page/img/photos/cs19.jpg" data-glightbox="title: Title; description: Description" data-gallery="g1">
                            <img src="..//assets/landing-page/landing-page/img/photos/cs19.jpg" alt=""/>
                        </a>
                        </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            <h3 class="h5">
                                Sollicitudin Ornare Porta
                            </h3>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>
                <!-- /.project -->
                <div
                    class="project item col-md-6 col-xl-4 workshop"
                    style="position: absolute; left: 33.3333%; top: 634.797px"
                >
                    <figure class="lift rounded mb-6">
                        <a href="..//assets/landing-page/landing-page/img/photos/cs21.jpg" data-glightbox="title: Title; description: Description" data-gallery="g1">
                            <img src="..//assets/landing-page/landing-page/img/photos/cs21.jpg" alt=""/>
                        </a>
                        </figure>
                    <div
                        class="project-details d-flex justify-content-center flex-column"
                    >
                        <div class="post-header">
                            <h3 class="h5">
                                Ipsum Mollis Vulputate
                            </h3>
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /.project-details -->
                </div>
                <!-- /.project -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.grid -->
    </div>
    <!-- /.content-wrapper -->
    <div class="container pt-12 pt-md-14 pb-13 pb-md-15">
        <div class="row mb-5">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                <h3 class="mb-10">
                    Artikel Terbaru
                </h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="blog grid grid-view">
                    <div class="row isotope gx-md-8 gy-8 mb-8">
                        <article class="item post col-lg-4 col-md-6">
                            <div class="card">
                                <figure
                                    class="card-img-top overlay overlay-1 hover-scale"
                                >
                                    <a href="#">
                                        <img
                                            src="/assets/landing-page/img/photos/b5.jpg"
                                            alt=""
                                    /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-0">Selengkapnya</h5>
                                    </figcaption>
                                </figure>
                                <div class="card-body">
                                    <div class="post-header">
                                        <h2 class="post-title h3 mt-1 mb-3">
                                            <a
                                                class="link-dark"
                                                href="./blog-post.html"
                                                >Nullam id dolor elit id nibh</a
                                            >
                                        </h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>
                                            Mauris convallis non ligula non
                                            interdum. Gravida vulputate
                                            convallis tempus vestibulum cras
                                            imperdiet nun eu dolor. Aenean
                                            lacinia bibendum nulla sed.
                                        </p>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!--/.card-body -->
                                <div class="card-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date">
                                            <i class="uil uil-calendar-alt"></i
                                            ><span>29 Mar 2021</span>
                                        </li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </article>
                        <!-- /.post -->
                        <article class="item post col-lg-4 col-md-6">
                            <div class="card">
                                <figure
                                    class="card-img-top overlay overlay-1 hover-scale"
                                >
                                    <a href="#">
                                        <img
                                            src="/assets/landing-page/img/photos/b6.jpg"
                                            alt=""
                                    /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-0">Selengkapnya</h5>
                                    </figcaption>
                                </figure>
                                <div class="card-body">
                                    <div class="post-header">
                                        <h2 class="post-title h3 mt-1 mb-3">
                                            <a
                                                class="link-dark"
                                                href="./blog-post.html"
                                                >Ultricies fusce porta elit</a
                                            >
                                        </h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>
                                            Mauris convallis non ligula non
                                            interdum. Gravida vulputate
                                            convallis tempus vestibulum cras
                                            imperdiet nun eu dolor. Aenean
                                            lacinia bibendum nulla sed.
                                        </p>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!--/.card-body -->
                                <div class="card-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date">
                                            <i class="uil uil-calendar-alt"></i
                                            ><span>26 Feb 2021</span>
                                        </li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </article>
                        <!-- /.post -->
                        <article class="item post col-lg-4 col-md-6">
                            <div class="card">
                                <figure
                                    class="card-img-top overlay overlay-1 hover-scale"
                                >
                                    <a href="#">
                                        <img
                                            src="/assets/landing-page/img/photos/b7.jpg"
                                            alt=""
                                    /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-0">Selengkapnya</h5>
                                    </figcaption>
                                </figure>
                                <div class="card-body">
                                    <div class="post-header">
                                        <h2 class="post-title h3 mt-1 mb-3">
                                            <a
                                                class="link-dark"
                                                href="./blog-post.html"
                                                >Morbi leo risus porta eget</a
                                            >
                                        </h2>
                                    </div>
                                    <div class="post-content">
                                        <p>
                                            Mauris convallis non ligula non
                                            interdum. Gravida vulputate
                                            convallis tempus vestibulum cras
                                            imperdiet nun eu dolor. Aenean
                                            lacinia bibendum nulla sed.
                                        </p>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!--/.card-body -->
                                <div class="card-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date">
                                            <i class="uil uil-calendar-alt"></i
                                            ><span>7 Jan 2021</span>
                                        </li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </article>
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
    <div class="container pt-3 pt-md-5 pb-15 pb-md-18">
        <div class="row mb-7">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                <h3 class="mb-10">
                    {{ App\Models\Section::where('code', 'info-kontak')->where('on_page', 'Kontak')->get()[0]->title }}
                </h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
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
</section>
<!-- /.content-wrapper -->

@endsection
