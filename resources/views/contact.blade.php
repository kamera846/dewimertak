@extends('layouts.main')

@section('page-content')

<!-- start page title section -->
@if($pageTitle->image)
<section class="wow animate__fadeIn parallax" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('storage/'.$pageTitle->image) }}');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 extra-small-screen d-flex flex-column justify-content-center page-title-medium text-center">
                <!-- start page title -->
                <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom text-uppercase">{{ $pageTitle->title }}</h1>
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
                <h1 class="alt-font text-white-2 font-weight-600 m-0 text-uppercase letter-spacing-1"> {{ $pageTitle->title  }} </h1>
                <!-- end page title -->
                <!-- start sub title -->
                {{-- <span class="d-block margin-10px-top text-extra-small alt-font text-uppercase">Hubungi kami jika anda punya pertanyan atau saran yang ingin disampaikan!</span> --}}
                <!-- end sub title -->
            </div>
        </div>
    </div>
</section>
@endif
<!-- end page title section -->

<!-- start contact info -->
<section class="wow animate__fadeIn">
    <div class="container px-0">
        {{-- <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-8 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase mb-0">We love to talk</h5>
            </div>  
        </div> --}}
        <div class="row justify-content-center row-cols-1 row-cols-lg-4 row-cols-sm-2">
            <!-- start contact info item -->
            <div class="col text-center md-margin-eight-bottom sm-margin-30px-bottom wow animate__fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                <div class="d-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-chat icon-medium text-white-2"></i></div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Telepon</div>
                <p class="mx-auto">{{ $profile->telephone }}</p>
            </div>
            <!-- end contact info item -->
            <!-- start contact info item -->
            <div class="col text-center xs-margin-30px-bottom wow animate__fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                <div class="d-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-envelope icon-medium text-white-2"></i></div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Email</div>
                <p class="mx-auto"><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
            </div>
            <!-- end contact info item -->
            <!-- start contact info item -->
            <div class="col text-center md-margin-eight-bottom sm-margin-30px-bottom wow animate__fadeInUp last-paragraph-no-margin">
                <div class="d-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-map-pin icon-medium text-white-2"></i></div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Lokasi</div>
                <p class="mx-auto">{{ $profile->location }}</p>
            </div>
            <!-- end contact info item -->
            <!-- start contact info item -->
            {{-- <div class="col text-center wow animate__fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                <div class="d-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-megaphone icon-medium text-white-2"></i></div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Customer Services</div>
                <p class="mx-auto">Lorem Ipsum is simply dummy<br>text of the printing.</p>
                <a href="#" class="text-decoration-line-through-deep-pink text-uppercase text-deep-pink text-small margin-15px-top sm-margin-10px-top d-inline-block">open ticket</a>
            </div> --}}
            <!-- end contact info item -->
        </div>
    </div>
</section>

<!-- end contact info section -->
<!-- start contact form -->
<section id="contact" class="wow animate__fadeIn p-0 bg-extra-dark-gray">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2">
            <div class="col cover-background md-h-450px sm-h-350px wow animate__fadeIn" style="background: url({{ $waForm->image ? asset('storage/'.$waForm->image) : '/storage/default/image.jpg' }})"></div>
            <div class="col text-center padding-six-lr padding-five-half-tb lg-padding-four-lr md-padding-ten-half-tb md-padding-twelve-half-lr sm-padding-15px-lr wow animate__fadeIn">
                <div class="margin-55px-bottom text-medium-gray alt-font text-small text-uppercase sm-margin-ten-bottom ">{{ $waForm->title }}</div>
                {{-- <h5 class="margin-55px-bottom text-white-2 alt-font font-weight-700 text-uppercase sm-margin-ten-bottom">Ready to request a quote?</h5> --}}
                <form id="project-contact-form-4"  method="post" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-results d-none"></div>
                        </div>

                        <input type="hidden" name="phone" value="{{ $profile->telephone }}">

                        <div class="col-12 col-md-6 mb-3">
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                placeholder="Nama *" 
                                value="{{ old('name') }}"
                                class="bg-transparent border-color-medium-dark-gray medium-input mb-2" 
                                autocomplete="off"
                                required 
                            >
                            @error('name')
                                <div class="text-danger text-sm text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <input
                                type="email"
                                name="email" 
                                id="email" 
                                placeholder="E-mail *"
                                value="{{ old('email') }}"
                                class="bg-transparent border-color-medium-dark-gray medium-input mb-2" 
                                autocomplete="off"
                                required 
                            >
                            @error('email')
                                <div class="text-danger text-sm text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <textarea
                                name="message" 
                                id="message" 
                                placeholder="Apa pesan anda.. *" 
                                rows="7" 
                                name="message"
                                class="bg-transparent border-color-medium-dark-gray medium-textarea mb-2" 
                                autocomplete="off"
                                required 
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger text-sm text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-deep-pink btn-medium margin-15px-top">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end contact form -->
<!-- start map section -->
<section class="p-0 one-second-screen md-h-400px sm-h-300px wow animate__fadeIn">
    <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31545.048524351307!2d116.39009783789685!3d-8.773737683019863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdacd0761cb1fd%3A0x5030bfbcaf7dae0!2sGanti%2C%20Praya%20Timur%2C%20Central%20Lombok%20Regency%2C%20West%20Nusa%20Tenggara!5e0!3m2!1sen!2sid!4v1659073316102!5m2!1sen!2sid"></iframe>
</section>
<!-- end map section -->

@endsection