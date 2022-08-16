@extends('layouts.main')

@section('page-content')

<section class="wrapper bg-soft-green pt-14">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
                <h1 class="mb-3">
                    {{ $pageTitleSection->title ? $pageTitleSection->title : 'Tentang Kami' }}
                </h1>
                <nav class="d-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tentang
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

<section class="wrapper bg-light angled upper-end">
    <div class="container py-14 py-md-16">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="clearfix">
                    <figure class="col-lg-6 float-lg-start mb-4 me-lg-5 rounded">
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

                    
                    <h2 class="mb-3">{{ $about->title }}</h2>
                    <p class="lead fs-md pe-lg-10">
                        {!! $about->content !!}
                    </p>
                </div>
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>

{{-- <section class="wrapper bg-light angled upper-end">
    <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
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
                    />
                </figure>
            </div>
            <!--/column -->
            <div class="col-lg-6">
                <h2 class="mb-3">{{ $about->title }}</h2>
                <p class="lead fs-md pe-lg-10">
                    {!! $about->content !!}
                </p>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section> --}}
<!-- /section -->

@if($features->count())
<section class="wrapper bg-soft-green angled upper-end">
    <div class="container pt-12 pt-md-14 pb-16 pb-md-18 text-center">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h3 class="mb-10 px-xl-10">
                    {{ $featureSection->title ? $featureSection->title : 'Layanan dan Produk yang bisa anda dapatkan di desa kami' }}
                </h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="position-relative">
            <div
                class="shape rounded-circle bg-soft-blue rellax w-16 h-16"
                data-rellax-speed="1"
                style="bottom: -0.5rem; right: -2.2rem; z-index: 0"
            ></div>
            <div
                class="shape bg-dot yellow rellax w-16 h-17"
                data-rellax-speed="1"
                style="top: -0.5rem; left: -2.5rem; z-index: 0"
            ></div>
            <div class="row gx-md-5 gy-5 justify-content-center">

                @foreach($features as $feature)
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body text-start">
                            <h4 class="">{{ $feature->name }}</h4>
                            <div class="feature-content">
                                {!! $feature->content !!}
                            </div>
                            {{-- <p class="mb-2">
                                Nulla vitae elit libero, a pharetra augue. Donec
                                id elit non mi porta gravida at eget metus cras
                                justo.
                            </p> --}}
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                @endforeach
                <!--/column -->
                {{-- <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <img
                                src="./assets/img/icons/lineal/chat-2.svg"
                                class="svg-inject icon-svg icon-svg-md text-green mb-3"
                                alt=""
                            />
                            <h4>Social Engagement</h4>
                            <p class="mb-2">
                                Nulla vitae elit libero, a pharetra augue. Donec
                                id elit non mi porta gravida at eget metus cras
                                justo.
                            </p>
                            <a href="#" class="more hover link-green"
                                >Learn More</a
                            >
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column --> --}}
            </div>
            <!--/.row -->
        </div>
        <!-- /.position-relative -->
    </div>
    <!-- /.container -->
</section>
@endif
<!-- /section -->


@if($events->count())
<section id="snippet-2" class="wrapper bg-light wrapper-border angled upper-end lower-end">
    <div class="container pt-15 pt-md-17 pb-13 pb-md-15">
        <div class="row">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                <h3 class="mb-10">
                    {{ $eventSection->title ? $eventSection->title : 'Acara dan kegiatan Bersama di Desa' }}
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div
            class="swiper-container grid-view mb-6 swiper-container-0"
            data-margin="30"
            data-dots="true"
            data-items-xl="3"
            data-items-md="2"
            data-items-xs="1"
        >
            <div
                class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden"
            >
                <div
                    class="swiper-wrapper"
                    id="swiper-wrapper-38ece5f5e2c97e5d"
                    aria-live="off"
                    style="
                        cursor: grab;
                        transform: translate3d(-880px, 0px, 0px);
                        transition-duration: 0ms;
                    "
                >

                    @foreach($events as $event)
                    <div
                        class="swiper-slide"
                        role="group"
                        aria-label="{{ $loop->iteration }} / {{ $events->count() }}"
                        style="width: 410px; margin-right: 30px"
                    >
                        <figure class="rounded mb-4">
                            <img
                                src="/storage/{{ $event->image }}"
                                alt="{{ $event->title }}"
                                style="height: 350px !important; object-fit: cover"
                            /><a
                                class="item-link"
                                {{-- href="/storage/{{ Str::replace('.', '-full.', $event->image) }}" --}}
                                href="/storage/{{ $event->image }}"
                                data-glightbox="{{ $loop->iteration }}"
                                data-gallery="projects-group"
                                ><i class="uil uil-focus-add"></i
                            ></a>
                        </figure>
                        <caption>
                            <h6>{{ $event->title }}</h6>
                        </caption>
                    </div>
                    @endforeach
                    <!--/.swiper-slide -->

                </div>
                <!--/.swiper-wrapper -->
                <span
                    class="swiper-notification"
                    aria-live="assertive"
                    aria-atomic="true"
                ></span>
            </div>
            <!-- /.swiper -->
            <div class="swiper-controls">
                <div
                    class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"
                >
                    <span
                        class="swiper-pagination-bullet"
                        tabindex="0"
                        role="button"
                        aria-label="Go to slide 1"
                    ></span
                    ><span
                        class="swiper-pagination-bullet"
                        tabindex="0"
                        role="button"
                        aria-label="Go to slide 2"
                    ></span
                    ><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active"
                        tabindex="0"
                        role="button"
                        aria-label="Go to slide 3"
                        aria-current="true"
                    ></span
                    ><span
                        class="swiper-pagination-bullet"
                        tabindex="0"
                        role="button"
                        aria-label="Go to slide 4"
                    ></span>
                </div>
            </div>
        </div>
        <!-- /.swiper-container -->
    </div>
    <!-- /.container -->
</section>
@endif

@endsection
