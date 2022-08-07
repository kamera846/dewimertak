@extends('layouts.main')

@section('page-content')
<!-- start page title section -->
@if($pageTitleSection->image)
<section class="wow animate__fadeIn parallax" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('storage/'.$pageTitleSection->image) }}');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 extra-small-screen d-flex flex-column justify-content-center page-title-medium text-center">
                <!-- start page title -->
                <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom text-uppercase">{{ $pageTitleSection->title }}</h1>
                <!-- end page title -->
                <!-- start sub title -->
                {{-- <span class="text-white-2 opacity6 alt-font mb-0">Unlimited power and customization possibilities</span> --}}
                <!-- end sub title -->
            </div>
        </div>
    </div>
</section>
@else
<section class="wow animate__fadeIn bg-extra-dark-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 extra-small-screen page-title-medium text-center d-flex flex-column justify-content-center">
                <!-- start page title -->
                <h1 class="alt-font text-white-2 font-weight-600 m-0 text-uppercase letter-spacing-1"> {{ $pageTitleSection->title  }} </h1>
                <!-- end page title -->
                <!-- start sub title -->
                {{-- <span class="d-block margin-10px-top text-extra-small alt-font text-uppercase">Hubungi kami jika anda punya pertanyan atau saran yang ingin disampaikan!</span> --}}
                <!-- end sub title -->
            </div>
        </div>
    </div>
</section>
@endif

<!-- start about section -->
<section class="wow animate__fadeIn last-paragraph-no-margin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-8 col-sm-9 text-center margin-70px-bottom md-margin-40px-bottom sm-margin-30px-bottom">
                {{-- <span class="alt-font text-deep-pink text-medium margin-5px-bottom d-block">We are delivering beautiful digital products</span> --}}
                <h6 class="font-weight-400 text-extra-dark-gray alt-font mb-0">{{ $about->title }}</h6>
            </div>
        </div>
        <div class="row margin-eight-bottom md-margin-30px-bottom justify-content-center">              
            <div class="col-lg-8 sm-margin-15px-bottom wow animate__fadeInUp" data-wow-delay="0.2s">
                @if($about->image)
                <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" class="border-radius-6">
                @else
                <img src="{{ asset('storage/default/image.jpg') }}" alt="" style="width: 100%;" class="border-radius-6">
                @endif
                <div class="text-sm text-justify mt-5">
                    {!! $about->content !!}
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

<!-- start event section -->
@if($events->count())
<section class="wow animate__fadeIn">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-7 col-lg-8 col-md-10 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center">
                {{-- variabel ini ngambil dari data section bukan data event --}}
                <h5 class="alt-font text-extra-dark-gray font-weight-600 mb-0">{{ $eventSection->title }}</h5>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
            <!-- start event item -->
            @foreach($events as $event)
            <div class="col team-block text-start team-style-1 md-margin-seven-bottom sm-margin-30px-bottom wow animate__fadeInRight">
                <figure>
                    <div class="team-image sm-w-100">
                        <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}">
                        <div class="overlay-content text-center d-flex align-items-end justify-content-center">
                            <div class="icon-social-small padding-twelve-all">
                                <span class="text-white-2 text-small d-inline-block m-0">{{ $event->title }}</span>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                            </div>
                        </div>
                        <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                    </div>
                </figure>
            </div>
            @endforeach
            <!-- end event item -->
        </div>                
    </div>
</section>
@endif
<!-- end event section -->

@endsection 