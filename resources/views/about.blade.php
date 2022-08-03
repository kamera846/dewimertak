@extends('layouts.main')

@section('page-content')
<!-- start page title section -->
<section class="wow animate__fadeIn bg-extra-dark-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 extra-small-screen page-title-medium text-center d-flex flex-column justify-content-center">
                <!-- start page title -->
                <h1 class="alt-font text-white-2 font-weight-600 m-0 text-uppercase letter-spacing-1"> Tentang Kami </h1>
                <!-- end page title -->
                <!-- start sub title -->
                {{-- <span class="d-block margin-10px-top text-extra-small alt-font text-uppercase">Hubungi kami jika anda punya pertanyan atau saran yang ingin disampaikan!</span> --}}
                <!-- end sub title -->
            </div>
        </div>
    </div>
</section>
<!-- start story section -->
<section class="wow animate__fadeIn">
    <div class="container"> 
        {{-- <div class="row align-items-center">
            <div class="col-12 col-lg-5 col-md-6 text-center md-margin-30px-bottom wow animate__fadeInLeft">
                @if($about->image)
                <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" class="border-radius-6 w-100">
                @else
                <img src="{{ asset('storage/default/image.jpg') }}" alt="" class="border-radius-6 w-100">
                @endif
            </div> 
            <div class="col-12 col-lg-7 col-md-6 text-center text-md-start padding-eight-lr lg-padding-six-lr md-padding-15px-lr wow animate__fadeInRight" data-wow-delay="0.2s">
                <h6 class="alt-font text-extra-dark-gray">{{ $about->title }}</h6>
                
                {{ substr(strip_tags($about->content), 0, 500)  }}...
                
                <a href="/about" class="btn mt-3 btn-dark-gray btn-small text-extra-small btn-rounded margin-5px-top">Selengkapnya</a>
            </div>
        </div> --}}
    </div>
</section>
<!-- end story section -->
<!-- start feature box  -->
<section class="bg-extra-dark-gray wow animate__fadeIn md-padding-one-half-lr sm-padding-two-lr">
    <div class="container">
        <div class="row justify-content-center">
            <!-- feature box item-->
            <div class="col-12 col-lg-4 col-md-6 col-sm-8 feature-box-1 md-margin-60px-bottom sm-margin-40px-bottom wow animate__fadeInRight">
                <div class="d-flex align-items-center margin-15px-bottom alt-font">
                    <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300 mb-0">01.</h3>
                    <span class="text-large line-height-22 padding-20px-left sm-padding-15px w-100">Creativity.<br> Discover talent.</span>
                </div>
                <p class="w-90 lg-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry.</p>
                <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-start"></div>
            </div>
            <!-- end feature box item-->
            <!-- start feature box item-->
            <div class="col-12 col-lg-4 col-md-6 col-sm-8 feature-box-1 md-margin-60px-bottom sm-margin-40px-bottom wow animate__fadeInRight" data-wow-delay="0.2s">
                <div class="d-flex align-items-center margin-15px-bottom alt-font">
                    <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300 mb-0">02.</h3>
                    <span class="text-large line-height-22 padding-20px-left w-100">Technology.<br> Expert analysis.</span>
                </div>
                <p class="w-90 lg-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry.</p>
                <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-start"></div>
            </div>
            <!-- end feature box item-->
            <!-- start feature box item-->
            <div class="col-12 col-lg-4 col-md-6 col-sm-8 feature-box-1 wow animate__fadeInRight" data-wow-delay="0.4s">
                <div class="d-flex align-items-center margin-15px-bottom alt-font">
                    <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300 mb-0">03.</h3>
                    <span class="text-large line-height-22 padding-20px-left w-100">Discover.<br> Explore work.</span>
                </div>
                <p class="w-90 lg-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry.</p>
                <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-start"></div>
            </div>
            <!-- end feature box item-->
        </div>
    </div>
</section>
<!-- end feature box -->
<!-- start section -->
<section class="wow animate__fadeIn last-paragraph-no-margin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-8 col-sm-9 text-center margin-70px-bottom md-margin-40px-bottom sm-margin-30px-bottom">
                <span class="alt-font text-deep-pink text-medium margin-5px-bottom d-block">We are delivering beautiful digital products</span>
                <h6 class="font-weight-400 text-extra-dark-gray alt-font mb-0">Wide range of web and software development services across the world</h6>
            </div>
        </div>
        <div class="row margin-eight-bottom md-margin-30px-bottom">              
            <div class="col-12 col-md-8 sm-margin-15px-bottom wow animate__fadeInLeft" data-wow-delay="0.2s">
                <img src="https://via.placeholder.com/1000x700" alt="" class="border-radius-6">
            </div>
            <div class="col-12 col-md-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                <img src="https://via.placeholder.com/500x730" alt="" class="border-radius-6 sm-w-100">
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 align-items-center">
            <div class="col sm-margin-15px-bottom">
                <span class="text-extra-large text-extra-dark-gray alt-font w-90 lg-w-95 md-w-100 d-block">We're fortunate to work with fantastic clients from across the globe in over 11 countries on design and branding.</span>
            </div>
            <div class="col sm-margin-15px-bottom">
                <strong class="font-weight-600 text-extra-dark-gray margin-5px-bottom d-block alt-font">Our approach</strong>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
            </div>
            <div class="col">
                <strong class="font-weight-600 text-extra-dark-gray margin-5px-bottom d-block alt-font">Our Mission</strong>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
            </div>                    
        </div>
    </div>
</section>
<!-- end section -->
<!-- start slider section  -->
<section id="clients" class="parallax wow animate__fadeIn" data-parallax-background-ratio="0.4" style="background-image:url('https://via.placeholder.com/1920x1200');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">    
            <div class="swiper-container white-move" data-slider-options='{ "slidesPerView": "1", "allowTouchMove":true,"paginationClickable": true, "autoplay": { "delay": 3000, "disableOnInteraction": true }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "pagination": { "el": ".swiper-pagination", "clickable": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "pagination": { "el": ".swiper-pagination" } }'>
                <div class="swiper-wrapper">
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://envato.com"><img src="images/clients-logo1.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://woocommerce.com"><img src="images/clients-logo2.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://wordpress.com"><img src="images/clients-logo3.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://magento.com"><img src="images/clients-logo4.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://envato.com"><img src="images/clients-logo1.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://woocommerce.com"><img src="images/clients-logo2.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://wordpress.com"><img src="images/clients-logo3.png" alt=""></a></div><!-- end slide item -->
                    <!-- start slide item--><div class="swiper-slide text-center"><a href="http://magento.com"><img src="images/clients-logo4.png" alt=""></a></div><!-- end slide item -->
                </div>
                <!-- start swiper pagination -->
                <!-- <div class="swiper-pagination swiper-pagination-white"></div> -->
                <!-- end swiper pagination -->
            </div>
        </div>    
    </div>
</section>
<!-- end slider section -->
<!-- start testimonial section -->
<section class="wow animate__fadeIn bg-light-gray testimonial-style3">
    <div class="container">                
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-two-bottom wow animate__fadeIn last-paragraph-no-margin testimonial-style3">
                        <div class="testimonial-content-box padding-twelve-all bg-white border-radius-6 box-shadow arrow-bottom lg-padding-nine-all md-padding-eight-all">
                            I wanted to hire the best and after looking at several other companies, I knew Jacob was the perfect guy for the job. He is a true professional.
                        </div>
                        <!-- start testimonials item -->
                        <div class="testimonial-box padding-25px-all sm-padding-20px-all">
                            <div class="image-box w-20"><img src="https://via.placeholder.com/149x149" class="rounded-circle" alt=""></div>
                            <div class="name-box padding-20px-left">
                                <div class="alt-font font-weight-600 text-small text-uppercase text-extra-dark-gray">Shoko Mugikura</div>
                                <p class="text-extra-small text-uppercase text-medium-gray">Graphic Designer</p>
                            </div>
                        </div>
                    </div>
                    <!-- end testimonials item -->
                    <!-- start testimonials item -->
                    <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-two-bottom wow animate__fadeIn last-paragraph-no-margin testimonial-style3" data-wow-delay="0.2s">
                        <div class="testimonial-content-box padding-twelve-all bg-white border-radius-6 box-shadow arrow-bottom lg-padding-nine-all md-padding-eight-all">
                            This is an excellent company! I personally enjoyed the energy and the professional support the whole team gave to us into creating website.
                        </div>
                        <div class="testimonial-box padding-25px-all sm-padding-20px-all">
                            <div class="image-box w-20"><img src="https://via.placeholder.com/149x149" class="rounded-circle" alt=""></div>
                            <div class="name-box padding-20px-left">
                                <div class="alt-font font-weight-600 text-small text-uppercase text-extra-dark-gray">Alexander Harvard</div>
                                <p class="text-extra-small text-uppercase text-medium-gray">Creative Director</p>
                            </div>
                        </div>
                    </div>
                    <!-- end testimonials item -->
                    <!-- start testimonials item -->
                    <div class="col-12 col-lg-4 col-md-6 col-sm-8 wow animate__fadeIn last-paragraph-no-margin testimonial-style3" data-wow-delay="0.4s">
                        <div class="testimonial-content-box padding-twelve-all bg-white border-radius-6 box-shadow arrow-bottom lg-padding-nine-all md-padding-eight-all">
                            Their team are easy to work with and helped me make amazing websites in a short amount of time. Thanks again guys for all your hard work.
                        </div>
                        <div class="testimonial-box padding-25px-all sm-padding-20px-all">
                            <div class="image-box w-20"><img src="https://via.placeholder.com/149x149" class="rounded-circle" alt=""></div>
                            <div class="name-box padding-20px-left">
                                <div class="alt-font font-weight-600 text-small text-uppercase text-extra-dark-gray">Herman Miller</div>
                                <p class="text-extra-small text-uppercase text-medium-gray">Co Founder / CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- end testimonials item -->
                </div>
            </div>
        </div> 
    </div> 
</section>
<!-- end testimonial section -->     
<!-- start information section -->     
<section class="bg-extra-dark-gray wow animate__fadeIn">
    <div class="container">
        <div class="row align-items-center justify-content-center"> 
            <div class="col-12 col-lg-5 lg-margin-50px-bottom wow animate__fadeInLeft">
                <h5 class="alt-font text-light-gray margin-30px-bottom">Beautifully handcrafted templates for your website</h5>
                <ul class="p-0 list-style-4 list-style-color">
                    <li>Beautiful and easy to understand UI, professional animations</li>
                    <li>Theme advantages are pixel perfect design & clear code delivered</li>
                    <li>Present your services with flexible, convenient and multipurpose</li>
                    <li>Find more creative ideas for your projects </li>
                    <li>Unlimited power and customization possibilities</li> 
                </ul>
                <a href="services-modern.html" class="btn btn-white btn-small text-extra-small btn-rounded margin-20px-top"><i class="fas fa-play-circle icon-very-small margin-5px-right no-margin-left" aria-hidden="true"></i> ALL advantages</a>
            </div>
            <div class="col-12 col-lg-7 wow animate__fadeInRight">
                <img src="https://via.placeholder.com/850x550" alt="" class="w-100">
            </div> 
        </div>
    </div>
</section>
<!-- end information section -->     
<!-- start team section -->
<section class="wow animate__fadeIn">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-7 col-lg-8 col-md-10 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center">
                <div class="alt-font text-medium-gray margin-5px-bottom text-uppercase text-small">we believe in business growth</div>
                <h5 class="alt-font text-extra-dark-gray font-weight-600 mb-0">Talent wins games, but teamwork and intelligence wins championships</h5>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
            <!-- start team item -->
            <div class="col team-block text-start team-style-1 md-margin-seven-bottom sm-margin-30px-bottom wow animate__fadeInRight">
                <figure>
                    <div class="team-image sm-w-100">
                        <img src="https://via.placeholder.com/700x892" alt="">
                        <div class="overlay-content text-center d-flex align-items-end justify-content-center">
                            <div class="icon-social-small padding-twelve-all">
                                <span class="text-white-2 text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                <a href="http://www.facebook.com" target="_blank" class="text-white-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://www.twitter.com" target="_blank" class="text-white-2"><i class="fab fa-twitter"></i></a>
                                <a href="http://www.plus.google.com" target="_blank" class="text-white-2"><i class="fab fa-google-plus-g"></i></a>
                                <a href="http://www.instagram.com" target="_blank" class="text-white-2"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                    </div>
                    <figcaption>
                        <div class="team-member-position margin-20px-top text-center">
                            <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Herman Miller</div>
                            <div class="text-extra-small text-uppercase text-medium-gray">Co-Founder / Design</div>
                        </div>   
                    </figcaption>
                </figure>
            </div>
            <!-- end team item -->
            <!-- start team item -->
            <div class="col team-block text-start team-style-1 md-margin-seven-bottom sm-margin-30px-bottom wow animate__fadeInRight" data-wow-delay="0.2s">
                <figure>
                    <div class="team-image sm-w-100">
                        <img src="https://via.placeholder.com/700x892" alt="">
                        <div class="overlay-content text-center d-flex align-items-end justify-content-center">
                            <div class="icon-social-small padding-twelve-all">
                                <span class="text-white-2 text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                <a href="http://www.facebook.com" target="_blank" class="text-white-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://www.twitter.com" target="_blank" class="text-white-2"><i class="fab fa-twitter"></i></a>
                                <a href="http://www.plus.google.com" target="_blank" class="text-white-2"><i class="fab fa-google-plus-g"></i></a>
                                <a href="http://www.instagram.com" target="_blank" class="text-white-2"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                    </div>
                    <figcaption>
                        <div class="team-member-position margin-20px-top text-center">
                            <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Bill Gardner</div>
                            <div class="text-extra-small text-uppercase text-medium-gray">Co-Founder / Design</div>
                        </div>   
                    </figcaption>
                </figure>
            </div>
            <!-- end team item -->
            <!-- start team item -->
            <div class="col team-block text-start team-style-1 xs-margin-30px-bottom wow animate__fadeInRight" data-wow-delay="0.4s">
                <figure>
                    <div class="team-image sm-w-100">
                        <img src="https://via.placeholder.com/700x892" alt="">
                        <div class="overlay-content text-center d-flex align-items-end justify-content-center">
                            <div class="icon-social-small padding-twelve-all">
                                <span class="text-white-2 text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                <a href="http://www.facebook.com" target="_blank" class="text-white-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://www.twitter.com" target="_blank" class="text-white-2"><i class="fab fa-twitter"></i></a>
                                <a href="http://www.plus.google.com" target="_blank" class="text-white-2"><i class="fab fa-google-plus-g"></i></a>
                                <a href="http://www.instagram.com" target="_blank" class="text-white-2"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                    </div>
                    <figcaption>
                        <div class="team-member-position margin-20px-top text-center">
                            <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Jeremy Dupont</div>
                            <div class="text-extra-small text-uppercase text-medium-gray">Creative Director</div>
                        </div>   
                    </figcaption>
                </figure>
            </div>
            <!-- end team item -->
            <!-- start team item -->
            <div class="col team-block text-start team-style-1 wow animate__fadeInRight" data-wow-delay="0.6s">
                <figure>
                    <div class="team-image sm-w-100">
                        <img src="https://via.placeholder.com/700x892" alt="">
                        <div class="overlay-content text-center d-flex align-items-end justify-content-center">
                            <div class="icon-social-small padding-twelve-all">
                                <span class="text-white-2 text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                <a href="http://www.facebook.com" class="text-white-2" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="http://www.twitter.com" class="text-white-2" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="http://www.plus.google.com" class="text-white-2" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                <a href="http://www.instagram.com" class="text-white-2" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                    </div>
                    <figcaption>
                        <div class="team-member-position margin-20px-top text-center">
                            <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Sara Smith</div>
                            <div class="text-extra-small text-uppercase text-medium-gray">Creative Studio Head</div>
                        </div>   
                    </figcaption>
                </figure>
            </div>
            <!-- end team item -->
        </div>                
    </div>
</section>
<!-- end team section -->
@endsection 