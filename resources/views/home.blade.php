@extends('layouts.main')

@section('page-content')

<!-- start slider section --> 
<section class="p-0 main-slider wow animate__fadeIn">
    <div class="swiper-container full-screen md-landscape-h-580px sm-h-500px white-move" data-slider-options='{ "loop": true, "slidesPerView": "1", "allowTouchMove":true, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "pagination": { "el": ".swiper-pagination-01", "clickable": true } }'>
        <div class="swiper-wrapper">
            @if($carousels->count())

                <!-- start slider item -->
                @foreach($carousels as $carousel)
                <div class="swiper-slide cover-background" style="background-image:url('{{ asset('storage/'.$carousel->image) }}');">
                    <div class="opacity-extra-medium bg-black"></div>
                    <div class="container position-relative h-100">
                        <div class="row h-100">
                            <div class="col-12 d-flex flex-column justify-content-center text-center">
                                @if($carousel->sub_title)
                                <span class="text-large text-very-light-gray font-weight-300 w-95 mx-auto margin-25px-bottom d-block sm-margin-15px-bottom">{{ $carousel->sub_title }}</span>
                                @endif
                                <h1 class="alt-font text-uppercase text-white-2 font-weight-700 w-75 sm-w-95 mx-auto margin-35px-bottom sm-margin-15px-bottom">{{ $carousel->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- end slider item -->

            @else

                <!-- start slider item -->
                <div class="swiper-slide cover-background" style="background-image:url('{{ asset('storage/default/image.jpg') }}');">
                    <div class="opacity-extra-medium bg-black"></div>
                    <div class="container position-relative h-100">
                        <div class="row h-100">
                            <div class="col-12 d-flex flex-column justify-content-center text-center">
                                <span class="text-large text-very-light-gray font-weight-300 w-95 mx-auto margin-25px-bottom d-block sm-margin-15px-bottom">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                                <h1 class="alt-font text-uppercase text-white-2 font-weight-700 w-75 sm-w-95 mx-auto margin-35px-bottom sm-margin-15px-bottom">Lorem Ipsum Dolor</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide cover-background" style="background-image:url('{{ asset('storage/default/image.jpg') }}');">
                    <div class="opacity-extra-medium bg-black"></div>
                    <div class="container position-relative h-100">
                        <div class="row h-100">
                            <div class="col-12 d-flex flex-column justify-content-center text-center">
                                <span class="text-large text-very-light-gray font-weight-300 w-95 mx-auto margin-25px-bottom d-block sm-margin-15px-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, cumque.</span>
                                <h1 class="alt-font text-uppercase text-white-2 font-weight-700 w-75 sm-w-95 mx-auto margin-35px-bottom sm-margin-15px-bottom">Tes satu dua</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider item -->
                
            @endif
        </div>
        <!-- start slider pagination -->
        <div class="swiper-pagination swiper-pagination-01 swiper-pagination-square swiper-pagination-white"></div>
        <!-- start slider navigation -->
        <!-- <div class="swiper-button-next light"><i class="ti-angle-right"></i></div>
        <div class="swiper-button-prev light"><i class="ti-angle-left"></i></div> -->
        <!-- end slider navigation -->
    </div>
</section>
<!-- end slider section -->

<!-- start about section -->
<section class="wow animate__fadeIn">
    <div class="container"> 
        <div class="row align-items-center">
            <div class="col-12 col-lg-5 col-md-6 text-center md-margin-30px-bottom wow animate__fadeInLeft">
                @if($about->image)
                <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" class="border-radius-6 w-100">
                @else
                <img src="{{ asset('storage/default/image.jpg') }}" alt="" class="border-radius-6 w-100">
                @endif
            </div> 
            <div class="col-12 col-lg-7 col-md-6 text-center text-md-start padding-eight-lr lg-padding-six-lr md-padding-15px-lr wow animate__fadeInRight" data-wow-delay="0.2s">
                <h6 class="alt-font text-extra-dark-gray fw-bolder">{{ $about->title }}</h6>
                
                {{ substr(strip_tags($about->content), 0, 500)  }}...
                
                <div>
                    <a href="/about" class="btn mt-3 btn-dark-gray btn-small text-extra-small btn-rounded margin-5px-top">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about section -->

<!-- start feature box  -->
@if($features->count())
<section class="bg-extra-dark-gray wow animate__fadeIn md-padding-one-half-lr sm-padding-two-lr">
    <div class="container">
        <div class="row justify-content-center">
            <!-- feature box item-->
            @foreach($features as $feature)
            <div class="col-12 col-lg-3 col-md-6 col-sm-8 feature-box-1 md-margin-60px-bottom sm-margin-40px-bottom wow animate__fadeInRight">
                <div class="d-flex align-items-center margin-15px-bottom alt-font ms-2">
                    {{-- <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300 mb-0">0{{ $loop->iteration }}.</h3> --}}
                    <span class="text-large line-height-22 sm-padding-15px w-100">
                        {{ $feature->name }}
                    </span>
                </div>
                {!! $feature->content !!}
                <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-start ms-2"></div>
            </div>
            @endforeach
            <!-- end feature box item-->
        </div>
    </div>
</section>
@endif
<!-- end feature box -->

<!-- start gallery section -->
@if($latestGalleries->count())
<section class="wow animate__fadeIn bg-light-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center margin-100px-bottom sm-margin-40px-bottom">
                <div class="position-relative overflow-hidden w-100">
                    <span class="text-outside-line-full alt-font font-weight-600 text-uppercase">{{ $latestGallerySection->title }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 filter-content overflow-hidden">
                <ul class="hover-option2 lightbox-gallery portfolio-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-medium p-auto">
                    <li class="grid-sizer"></li>
                    <!-- start image gallery item -->
                    @foreach($latestGalleries as $gallery)
                    <li class="grid-item wow animate__fadeInUp" data-wow-delay="0.2s">
                        <a href="{{ asset('storage/'.$gallery->image) }}" class="single-image-lightbox" title="{{ $gallery->caption }}" data-group="lightbox-gallery">
                            <figure>
                                <div class="portfolio-img bg-extra-dark-gray"><img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->caption }}" class="project-img-gallery"/></div>
                                <figcaption>
                                    <div class="portfolio-hover-main text-center">
                                        <div class="portfolio-hover-box align-middle">
                                            <div class="portfolio-hover-content position-relative">
                                                <i class="ti-zoom-in text-white-2 fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    @endforeach
                    <!-- end image gallery item -->
                </ul>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end gallery section -->

<!-- start post content section --> 
<!-- start blog post section -->
@if($latestPosts->count())
<section class="wow animate__fadeIn ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center margin-100px-bottom sm-margin-40px-bottom">
                <div class="position-relative overflow-hidden w-100">
                    <span class="text-outside-line-full alt-font font-weight-600 text-uppercase">{{ $latestPostSection->title }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 blog-content">
                <ul class="blog-masonry blog-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col blog-post-style5 gutter-large">
                    <li class="grid-sizer"></li>
                    <!-- start blog post item -->
                    @foreach($latestPosts as $post)
                    <li class="grid-item last-paragraph-no-margin wow animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-post bg-light-gray">
                            <div class="blog-post-images overflow-hidden">
                                <a href="/posts/{{ $post->slug }}">
                                    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                                </a>
                                <div class="blog-categories bg-white text-uppercase text-extra-small alt-font"><a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                            </div>
                            <div class="post-details padding-40px-all sm-padding-20px-lr sm-padding-30px-tb">
                                <div class="blog-hover-color"></div>
                                <a href="/posts/{{ $post->slug }}" class="alt-font post-title text-medium text-extra-dark-gray w-90 d-block lg-w-100 margin-5px-bottom">{{ $post->title }}</a>
                                <div class="author mt-2">
                                    <span class="text-medium-gray text-uppercase text-extra-small d-inline-block">oleh <a href="/posts?author={{ $post->user->slug }}" class="text-medium-gray">{{ $post->user->name }}</a>&nbsp;&nbsp;|&nbsp;&nbsp;{{ $post->created_at->isoFormat('D MMMM Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <!-- end blog post item -->
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end blog post section -->
<!-- start map section -->
<section class="p-0 one-second-screen md-h-400px sm-h-300px wow animate__fadeIn">
    <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31545.048524351307!2d116.39009783789685!3d-8.773737683019863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdacd0761cb1fd%3A0x5030bfbcaf7dae0!2sGanti%2C%20Praya%20Timur%2C%20Central%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara!5e0!3m2!1sen!2sid!4v1659073316102!5m2!1sen!2sid"></iframe>
</section>
@endif
<!-- end map section -->

@endsection
        