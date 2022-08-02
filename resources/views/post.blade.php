@extends('layouts.main')

@section('page-content')
<!-- start page title section -->
<section class="wow animate__fadeIn bg-extra-dark-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 extra-small-screen page-title-medium text-center d-flex flex-column justify-content-center">
                <h1 class="alt-font text-white-2 font-weight-600 m-0 text-uppercase letter-spacing-1">
                    {{ $pageTitle }}
                </h1>
                @if($pageTitle === 'Artikel')
                    <span class="d-block margin-10px-top text-extra-small alt-font text-uppercase">Kami juga menyediakan artikel berupa postingan jadi pantau terus situs kami</span>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start blog content section --> 
<section>
    <div class="container">
        <div class="row justify-content-center">
            <main class="col-12 col-xl-9 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">

                @foreach($posts as $post)

                    <!-- start post item --> 
                    <div class="blog-post-content d-flex align-items-center flex-wrap margin-60px-bottom padding-60px-bottom border-bottom border-color-extra-light-gray md-margin-30px-bottom md-padding-30px-bottom text-center text-md-start md-no-border">
                        <div class="col-12 col-lg-5 blog-image p-0 md-margin-30px-bottom sm-margin-20px-bottom margin-45px-right md-no-margin-right">
                            <a href="/posts/{{ $post->slug }}"><img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}"></a>
                        </div>
                        <div class="col-12 col-lg-6 blog-text p-0">
                            <div class="content margin-20px-bottom md-no-padding-left ">
                                <a href="/posts/{{ $post->slug }}" class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-600 d-inline-block">{{ $post->title }}</a>
                                <div class="text-medium-gray text-extra-small margin-15px-bottom text-uppercase alt-font"><span>By <a href="/posts?author={{ $post->user->slug }}" class="text-medium-gray">{{ ucwords($post->user->name) }}</a></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span>{{ $post->created_at->isoFormat('d MMMM Y') }}</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/posts?category={{ $post->category->slug }}" class="text-medium-gray">{{ ucwords($post->category->name) }}</a></div>
                                <p class="m-0 w-95 lg-w-100">{{ substr(strip_tags($post->content), 0, 200) }}...</p>
                            </div>
                            <a class="btn btn-very-small btn-dark-gray text-uppercase" href="/posts/{{ $post->slug }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- end post item --> 

                @endforeach

                <!-- start pagination -->
                
                {{ $posts->links('vendor.pagination.default') }}

                <!-- end pagination -->
            </main>

            <aside class="col-12 col-xl-3 col-lg-4 col-md-7">
                <div class="d-inline-block w-100 margin-45px-bottom sm-margin-25px-bottom">
                    <form action="" method="" class="position-relative">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        @if(request('tag'))
                            <input type="hidden" name="tag" value="{{ request('tag') }}">
                        @endif
                        <div class="position-relative">
                            <input name="search" id="text" type="text" placeholder="Cari.." value="{{ request('search') }}" class="bg-transparent padding-40px-right text-small mb-0 border-color-extra-light-gray medium-input float-start" autocomplete="off" required>
                            <button type="submit" class="bg-transparent btn position-absolute right-0 top-1 search-button"><i class="fas fa-search ms-0"></i></button>
                        </div>   
                    </form>
                </div>

                {{-- <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>About Me</span></div>
                    <a href="about-me.html"><img src="https://via.placeholder.com/800x533" alt="" class="margin-25px-bottom"/></a>
                    <p class="margin-20px-bottom text-small">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.</p>
                    <a class="btn btn-very-small btn-dark-gray text-uppercase" href="about-me.html">About Author</a>
                </div> --}}

                <div class="margin-50px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Follow Us</span></div>
                    <div class="social-icon-style-1 text-center">
                        <ul class="extra-small-icon">
                            <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="instagram" href="http://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a class="pinterest" href="http://pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                            <li><a class="youtube" href="http://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                
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

                {{-- <div class="bg-deep-pink padding-30px-all text-white-2 text-center margin-45px-bottom sm-margin-25px-bottom">
                    <i class="fas fa-quote-left icon-small margin-15px-bottom d-block"></i>
                    <span class="text-extra-large font-weight-300 margin-20px-bottom d-block">The future belongs to those who believe in the beauty of their dreams.</span>
                    <a class="btn btn-very-small btn-transparent-white border text-uppercase" href="portfolio-boxed-grid-overlay.html">Explore Portfolio</a>
                </div> --}}

                @if(request(['search', 'category', 'author', 'tag']))
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
                @endif

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