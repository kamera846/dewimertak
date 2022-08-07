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
                <h1 class="text-white-2 alt-font font-weight-600 margin-10px-bottom">{{ $post->title }}</h1>
                <!-- end page title -->
                <!-- start sub title -->
                <span class="text-white-2 opacity6 alt-font mb-0 text-uppercase text-small">{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;oleh <a href="/posts?author={{ $post->user->slug }}" class="text-white-2">{{ $post->user->name }}</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/posts?category={{ $post->category->slug }}" class="text-white-2">{{ $post->category->name }}</a></span>
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
                <h1 class="text-white-2 alt-font font-weight-600 margin-10px-bottom">{{ $post->title }}</h1>
                <!-- end page title -->
                <!-- start sub title -->
                <span class="text-white-2 opacity6 alt-font mb-0 text-uppercase text-small">{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;oleh <a href="/posts?author={{ $post->user->slug }}" class="text-white-2">{{ $post->user->name }}</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/posts?category={{ $post->category->slug }}" class="text-white-2">{{ $post->category->name }}</a></span>
                <!-- end sub title -->
            </div>
        </div>
    </div>
</section>
@endif
<!-- end page title section -->

<!-- start post content section --> 
<section>
    <div class="container">
        <div class="row justify-content-center">

            <main class="col-12 col-xl-9 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                <div class="col-12 blog-details-text last-paragraph-no-margin">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" width="100%" class="mb-5">
                    
                    {!! $post->content !!}
                    
                </div>
                @if($post->tags)
                <div class="row row-cols-1 row-cols-lg-2 mt-5">
                    <div class="col text-center text-lg-start">
                        <div class="tag-cloud margin-20px-bottom">
                            @php
                                $tags = explode(',', $post->tags);
                            @endphp
                            @foreach($tags as $tag)
                            <a href="/posts?tag={{ $tag }}">{{ ucwords($tag) }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </main>

            <aside class="col-12 col-xl-3 col-lg-4 col-md-7">

                {{-- search --}}
                <div class="d-inline-block w-100 margin-45px-bottom sm-margin-25px-bottom">
                    <form action="/posts" method="" class="position-relative">
                        <div class="position-relative">
                            <input name="search" id="text" type="text" placeholder="Cari.." maxlength="255" class="bg-transparent padding-40px-right text-small mb-0 border-color-extra-light-gray medium-input float-start" autocomplete="off" required>
                            <button type="submit" class="bg-transparent btn position-absolute right-0 top-1 search-button"><i class="fas fa-search ms-0"></i></button>
                        </div>   
                    </form>
                </div>

                {{-- social app --}}
                @if($socials->count())
                <div class="margin-50px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Follow Us</span></div>
                    <div class="social-icon-style-1 text-center">
                        <ul class="extra-small-icon">
                            @foreach($socials as $social)
                            <li><a class="{{ $social->app }}" href="{{ $social->link }}" target="_blank"><i class="fab fa-{{ $social->app }}"></i></a></li>
                            @endforeach

                            {{-- <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="instagram" href="http://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a class="pinterest" href="http://pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                            <li><a class="youtube" href="http://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                @endif
                
                {{-- categories --}}
                @if($categories->count())
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Kategori</span></div>
                        <ul class="list-style-6 margin-50px-bottom text-small">
                            @foreach($categories as $category)
                            <li><a href="/posts?category={{ $category->slug }}">{{ ucwords($category->name) }}</a><span>{{ App\Models\Post::where('category_id', $category->id)->count() }}</span></li>
                            @endforeach
                        </ul>   
                    </div>
                @endif

                {{-- quote --}}
                <div class="bg-deep-pink padding-30px-all text-white-2 text-center margin-45px-bottom sm-margin-25px-bottom">
                    <i class="fas fa-quote-left icon-small margin-15px-bottom d-block"></i>
                    <span class="text-extra-large font-weight-300 margin-20px-bottom d-block">The future belongs to those who believe in the beauty of their dreams.</span>
                </div>

                {{-- recent posts --}}
                @if($recentPosts->count())
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Artikel Terbaru</span></div>
                    <ul class="latest-post position-relative">
                        @foreach($recentPosts as $post)
                        <li class="media d-flex">
                            <figure class="flex-shrink-0">
                                <a href="/posts/{{ $post->slug }}"><img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}"></a>
                            </figure>
                            <div class="media-body flex-grow-1 text-small"><a href="/posts/{{ $post->slug }}" class="text-extra-dark-gray"><span class="d-block margin-5px-bottom">{{ $post->title }}</span></a> <span class="d-block text-medium-gray text-small">{{ $post->created_at->isoFormat('d MMMM Y') }}</span></div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- tags --}}
                {{-- <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>tags cloud</span></div>
                    <div class="tag-cloud">
                        <a href="blog-grid.html">ADVERTISEMENT</a>
                        <a href="blog-grid.html">ARTISTRY</a>
                        <a href="blog-grid.html">BLOG</a>
                        <a href="blog-grid.html">CONCEPTUAL</a>
                        <a href="blog-grid.html">DESIGN</a>
                        <a href="blog-grid.html">FASHION</a>
                        <a href="blog-grid.html">INSPIRATION</a>
                        <a href="blog-grid.html">SMART</a>
                        <a href="blog-grid.html">QUOTES</a>
                        <a href="blog-grid.html">UNIQUE</a>
                        <a href="blog-grid.html">CONCEPTS</a>
                    </div>
                </div> --}}

                {{-- archive --}}
                {{-- <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Archive</span></div>
                    <ul class="list-style-6 margin-20px-bottom text-small">
                        <li><a href="blog-grid.html">July 2017</a><span>12</span></li>
                        <li><a href="blog-grid.html">June 2017</a><span>05</span></li>
                        <li><a href="blog-grid.html">May 2017</a><span>08</span></li>
                        <li><a href="blog-grid.html">April 2017</a><span>10</span></li>
                        <li><a href="blog-grid.html">March 2017</a><span>21</span></li>
                        <li><a href="blog-grid.html">February 2017</a><span>09</span></li>
                        <li><a href="blog-grid.html">January 2017</a><span>07</span></li>
                    </ul>   
                </div> --}}

                {{-- subscribe form --}}
                {{-- <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Newsletter</span></div>
                    <form action="email-templates/subscribe-newsletter.php" method="post">
                        <div class="position-relative">
                            <div class="col-12 mx-0">
                                <div class="form-results d-none"></div>
                            </div>
                            <div class="position-relative w-100 h-100">
                                <input type="email" id="email" name="email" class="bg-transparent padding-45px-right text-small m-0 border-color-extra-light-gray medium-input float-start required" placeholder="Enter your email...">
                                <button type="submit" class="bg-transparent text-large btn position-absolute right-0 top-3 submit"><i class="far fa-envelope ms-0"></i></button>
                            </div>   
                        </div>
                    </form>
                </div> --}}
            </aside>
            
        </div>
    </div>
</section>
<!-- end blog content section -->  

@endsection