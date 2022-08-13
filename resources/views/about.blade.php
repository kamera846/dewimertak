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
                    @if($about->image)
                        <img
                            src="/storage/{{ $about->image }}"
                            {{-- srcset="/storage/{{ Str::replace('.', '@2x', $about->image) }} 2x" --}}
                            alt="{{ $about->title }}"
                        />
                    @else
                        <img
                            src="/storage/default/image.jpg"
                            {{-- srcset="/storage/default/image@2x.jpg 2x" --}}
                            alt=""
                        />
                    @endif
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
</section>
<!-- /section -->

<section class="wrapper bg-soft-green angled upper-end lower-end">
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
                    <ul class="ps-3">
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
                    <ul class="ps-3">
                        <li>Rebok</li>
                        <li>Serabe</li>
                    </ul>
                    Adapun souvenir:
                    <ul class="ps-3">
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
<!-- /section -->

@if($events->count())
<section id="snippet-2" class="wrapper bg-light wrapper-border angled upper-end lower-end">
    <div class="container pt-15 pt-md-17 pb-13 pb-md-15">
        <div class="row">
            <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                <h3 class="mb-10">
                    {{ $eventSection->title ? $eventSection->title : 'Foto Acara dan Kegiatan' }}
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
                        <figure class="rounded mb-6">
                            <img
                                src="/storage/{{ $event->image }}"
                                {{-- srcset="/storage/{{ $event->image }} 2x" --}}
                                {{-- srcset="/storage/{{ Str::replace('.', '@2x.', $event->image) }} 2x" --}}
                                alt=""
                            /><a
                                class="item-link"
                                {{-- href="/storage/{{ Str::replace('.', '-full.', $event->image) }}" --}}
                                href="/storage/{{ $event->image }}"
                                data-glightbox="{{ $loop->iteration }}"
                                data-gallery="projects-group"
                                ><i class="uil uil-focus-add"></i
                            ></a>
                        </figure>
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
