@extends('layouts.main')

@section('page-content')

<!-- start page title section -->
<section class="wow animate__fadeIn bg-extra-dark-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 extra-small-screen page-title-medium text-center d-flex flex-column justify-content-center">
                <!-- start page title -->
                <h1 class="alt-font text-white-2 font-weight-600 m-0 text-uppercase letter-spacing-1">Galeri</h1>
                <!-- end page title -->
                <!-- start sub title -->
                <span class="d-block margin-10px-top text-extra-small alt-font text-uppercase">Berikut momen-momen yang berhasil kami abadikan!</span>
                <!-- end sub title -->
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start galleries section -->
<section class="wow animate__fadeIn padding-90px-top md-padding-50px-top sm-padding-30px-top" style="visibility: visible; animation-name: fadeIn;">
    {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- start filter navigation -->
                <ul class="portfolio-filter nav nav-tabs justify-content-center border-0 portfolio-filter-tab-1 font-weight-600 alt-font text-uppercase text-center margin-80px-bottom text-small md-margin-40px-bottom sm-margin-20px-bottom">
                    <li class="nav active"><a href="javascript:void(0);" data-filter="*" class="light-gray-text-link text-very-small">All</a></li>
                    <li class="nav"><a href="javascript:void(0);" data-filter=".web" class="light-gray-text-link text-very-small">Web</a></li>
                    <li class="nav"><a href="javascript:void(0);" data-filter=".advertising" class="light-gray-text-link text-very-small">Advertising</a></li>
                    <li class="nav"><a href="javascript:void(0);" data-filter=".branding" class="light-gray-text-link text-very-small">Branding</a></li>
                    <li class="nav"><a href="javascript:void(0);" data-filter=".design" class="light-gray-text-link text-very-small">Design</a></li>
                    <li class="nav"><a href="javascript:void(0);" data-filter=".photography" class="light-gray-text-link text-very-small">Photography</a></li>
                </ul>                                                                           
                <!-- end filter navigation -->
            </div>
        </div>
    </div> --}}
    <!-- start filter content -->
    <div class="container-fluid">

        @if($galleries->count())

        <div class="row">
            <div class="col-12 filter-content overflow-hidden">
                <ul class="hover-option10 lightbox-portfolio portfolio-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-medium" style="position: relative; height: 1081.55px;">
                    <li class="grid-sizer"></li>

                        @foreach ($galleries as $gallery)
                            
                            <!-- start portfolio item -->
                            <li class="grid-item web wow animate__zoomIn" style="position: absolute; left: 0%; top: 0px; animation: 0s ease 0s 1 normal none running none;">
                                <figure>
                                    {{-- <div class="portfolio-img bg-black"><img src="https://via.placeholder.com/770x788" alt="" data-no-retina=""></div> --}}
                                    <div class="portfolio-img bg-black"><img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->caption }}" data-no-retina=""></div>
                                    <figcaption>
                                        <div class="portfolio-hover-main">
                                            <div class="portfolio-hover-box align-middle">
                                                <div class="portfolio-icon">
                                                    <a class="gallery-link" title="{{ $gallery->caption }}" href="{{ asset('storage/'.$gallery->image) }}"><i class="ti-zoom-in" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            
                        @endforeach

                </ul>
            </div>
        </div>

        @else

            <div class="row fs-4 justify-content-center py-5">
                Belum ada momen yang dapat kami bagikan!
            </div>

        @endif
    </div>
    <!-- end filter content -->
</section>
<!-- end galleries section -->

@endsection