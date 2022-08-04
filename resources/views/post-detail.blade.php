@extends('layouts.main')

@section('page-content')
<!-- start page title section -->
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
                <div class="col-12 margin-seven-bottom margin-eight-top">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="row row-cols-1 row-cols-lg-2">
                    @if($post->tags)
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
                    @endif
                    <div class="col text-center text-lg-end">
                        <div class="social-icon-style-6">
                            <ul class="extra-small-icon">
                                <li><a class="likes-count" href="#" target="_blank"><i class="fas fa-heart text-deep-pink"></i><span class="text-small">300</span></a></li>
                                <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="google" href="http://google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a class="pinterest" href="http://dribbble.com" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 margin-30px-top">
                    <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start w-100 border border-color-extra-light-gray padding-50px-all md-padding-30px-all sm-padding-20px-all">
                        <div class="w-150px text-center sm-margin-15px-bottom sm-w-100">
                            <img src="https://via.placeholder.com/149x149" class="rounded-circle w-100px" alt="" />
                        </div>
                        <div class="w-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left text-center text-md-start">
                            <a href="#" class="text-extra-dark-gray text-uppercase alt-font font-weight-600 margin-10px-bottom d-inline-block text-small">Alexander Harvard</a>
                            <p class="md-w-95 sm-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                            <a href="#" class="btn btn-very-small btn-black margin-20px-top">All author posts</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-bottom">
                        <div class="position-relative overflow-hidden w-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Related Posts</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 blog-content">
                                <ul class="blog-classic blog-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-2col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                                    <li class="grid-sizer"></li>
                                    <!-- start post item -->
                                    <li class="grid-item last-paragraph-no-margin wow animate__fadeIn">
                                        <div class="blog-post blog-post-style1 text-center text-sm-start">
                                            <div class="blog-post-images overflow-hidden margin-25px-bottom md-margin-20px-bottom">
                                                <a href="blog-post-layout-01.html">
                                                    <img src="https://via.placeholder.com/700x500" alt="">
                                                </a>
                                            </div>
                                            <div class="post-details margin-20px-bottom xs-no-margin-bottom">
                                                <span class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom">17 july 2017 | by <a href="blog-masonry.html" class="text-medium-gray">Jay Benjamin</a></span>
                                                <a href="blog-post-layout-01.html" class="post-title text-medium text-extra-dark-gray w-90 d-block md-w-100">I try to look at design from a more conceptual standpoint.</a>
                                                <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb md-margin-15px-tb"></div>
                                                <p class="w-90 sm-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum text...</p>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- end post item -->
                                    <!-- start post item -->
                                    <li class="grid-item last-paragraph-no-margin wow animate__fadeIn" data-wow-delay="0.2s">
                                        <div class="blog-post blog-post-style1 text-center text-sm-start">
                                            <div class="blog-post-images overflow-hidden margin-25px-bottom md-margin-20px-bottom">
                                                <a href="blog-post-layout-02.html">
                                                    <img src="https://via.placeholder.com/700x500" alt="">
                                                </a>
                                            </div>
                                            <div class="post-details margin-20px-bottom xs-no-margin-bottom">
                                                <span class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom">03 July 2017 | by <a href="blog-masonry.html" class="text-medium-gray">Herman Miller</a></span>
                                                <a href="blog-post-layout-02.html" class="post-title text-medium text-extra-dark-gray w-90 d-block md-w-100">Good design accelerates the adoption of new ideas.</a>
                                                <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb md-margin-15px-tb"></div> 
                                                <p class="w-90 sm-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum text...</p>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- end post item -->
                                    <!-- start post item -->
                                    <li class="grid-item last-paragraph-no-margin wow animate__fadeIn" data-wow-delay="0.4s">
                                        <div class="blog-post blog-post-style1 text-center text-sm-start">
                                            <div class="blog-post-images overflow-hidden margin-25px-bottom md-margin-20px-bottom">
                                                <a href="blog-post-layout-03.html">
                                                    <img src="https://via.placeholder.com/700x500" alt="">
                                                </a>
                                            </div>
                                            <div class="post-details margin-20px-bottom xs-no-margin-bottom">
                                                <span class="post-author text-extra-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom">22 June 2017 | by <a href="blog-masonry.html" class="text-medium-gray">Hugh Macleod</a></span>
                                                <a href="blog-post-layout-03.html" class="post-title text-medium text-extra-dark-gray w-90 d-block md-w-100">Design is inherently optimistic. That is its power.</a>
                                                <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb md-margin-15px-tb"></div>
                                                <p class="w-90 sm-w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum text...</p>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- end post item -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 margin-eight-top sm-margin-two-top sm-margin-ten-bottom">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="col-12 blog-details-comments">
                    <div class="w-100 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-bottom">
                        <div class="position-relative overflow-hidden w-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">10 Comments</span>
                        </div>
                    </div>
                    <ul class="blog-comment">
                        <li>
                            <div class="d-block d-md-flex w-100">
                                <div class="w-110px sm-w-50px text-center sm-margin-10px-bottom">
                                    <img src="https://via.placeholder.com/149x149" class="rounded-circle w-85 sm-w-100" alt=""/>
                                </div>
                                <div class="w-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                    <a href="#" class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">Herman Miller</a>
                                    <a href="#comments" class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                    <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">17 july 2017, 6:05 pm</div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                </div>
                            </div>
                            <ul class="child-comment">
                                <li>
                                    <div class="d-block d-md-flex w-100">
                                        <div class="w-110px sm-w-50px text-center sm-margin-10px-bottom">
                                            <img src="https://via.placeholder.com/149x149" class="rounded-circle w-85 sm-w-100" alt="" />
                                        </div>
                                        <div class="w-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                            <a href="#" class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">Alexander Harvard</a>
                                            <a href="#comments" class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                            <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">17 july 2017, 6:05 pm</div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="d-block d-md-flex  w-100">
                                <div class="w-110px sm-w-50px text-center sm-margin-10px-bottom">
                                    <img src="https://via.placeholder.com/149x149" class="rounded-circle w-85 sm-w-100" alt=""/>
                                </div>
                                <div class="w-100 padding-40px-left last-paragraph-no-margin sm-no-padding-left">
                                    <a href="#" class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small">Jennifer Freeman</a>
                                    <a href="#comments" class="inner-link btn-reply text-uppercase alt-font text-extra-dark-gray">Reply</a>
                                    <div class="text-small text-medium-gray text-uppercase margin-10px-bottom">17 july 2017, 6:05 pm</div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 margin-eight-top" id="comments">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-bottom">
                        <div class="position-relative overflow-hidden w-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Write A Comments</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <form id="comments-form" action="email-templates/contact-form.php" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-results d-none"></div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <input type="text" placeholder="Name *" class="medium-input required">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <input type="text" placeholder="E-mail *" class="medium-input required">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <input type="url" placeholder="Website" class="medium-input">
                                        </div>
                                        <div class="col-12">
                                            <textarea placeholder="Enter your comment here.." rows="8" class="medium-textarea"></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn btn-dark-gray btn-small margin-15px-top submit" type="submit">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <aside class="col-12 col-xl-3 col-lg-4 col-md-7">
                <div class="d-inline-block w-100 margin-45px-bottom sm-margin-25px-bottom">
                    <form action="search-result.html" method="post" class="position-relative">
                        <div class="position-relative">
                            <input name="text" id="text" data-email="required" type="text" placeholder="Enter your keywords..." class="bg-transparent padding-40px-right text-small mb-0 border-color-extra-light-gray medium-input float-start">
                            <button type="submit" class="bg-transparent btn position-absolute right-0 top-1 search-button"><i class="fas fa-search ms-0"></i></button>
                        </div>   
                    </form>
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600 aside-title"><span>About Me</span></div>
                    <a href="about-me.html"><img src="https://via.placeholder.com/800x533" alt="" class="margin-25px-bottom"/></a>
                    <p class="margin-20px-bottom text-small">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard.</p>
                    <a class="btn btn-very-small btn-dark-gray text-uppercase" href="about-me.html">About Author</a>
                </div>
                <div class="margin-50px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Follow Us</span></div>
                    <div class="social-icon-style-1 text-center">
                        <ul class="extra-small-icon">
                            <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="google" href="http://google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a class="dribbble" href="http://dribbble.com" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                            <li><a class="linkedin" href="http://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Categories</span></div>
                    <ul class="list-style-6 margin-50px-bottom text-small">
                        <li><a href="blog-masonry.html">Arts and Entertainment</a><span>12</span></li>
                        <li><a href="blog-masonry.html">Blog</a><span>05</span></li>
                        <li><a href="blog-masonry.html">Blog Full width</a><span>08</span></li>
                        <li><a href="blog-masonry.html">Blog Grid</a><span>10</span></li>
                        <li><a href="blog-masonry.html">Branding</a><span>21</span></li>
                        <li><a href="blog-masonry.html">Design Tutorials</a><span>09</span></li>
                        <li><a href="blog-masonry.html">Designing</a><span>07</span></li>
                        <li><a href="blog-masonry.html">Feature</a><span>06</span></li>
                        <li><a href="blog-masonry.html">Home Blog</a><span>10</span></li>
                        <li><a href="blog-masonry.html">Onepage Fashion</a><span>11</span></li>
                        <li><a href="blog-masonry.html">Sample</a><span>06</span></li>
                    </ul>   
                </div>
                <div class="bg-deep-pink padding-30px-all text-white-2 text-center margin-45px-bottom sm-margin-25px-bottom">
                    <i class="fas fa-quote-left icon-small margin-15px-bottom d-block"></i>
                    <span class="text-extra-large font-weight-300 margin-20px-bottom d-block">The future belongs to those who believe in the beauty of their dreams.</span>
                    <a class="btn btn-very-small btn-transparent-white border-width-1 text-uppercase" href="portfolio-boxed-grid-overlay.html">Explore Portfolio</a>
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Popular post</span></div>
                    <ul class="latest-post position-relative">
                        <li class="media d-flex">
                            <figure class="flex-shrink-0">
                                <a href="blog-masonry.html"><img src="https://via.placeholder.com/480x358" alt=""></a>
                            </figure>
                            <div class="media-body flex-grow-1 text-small"><a href="blog-masonry.html" class="text-extra-dark-gray"><span class="d-inline-block margin-5px-bottom">Traveling abroad will change you forever</span></a> <span class="d-block text-medium-gray text-small">April 30, 2016</span></div>
                        </li>
                        <li class="media d-flex">
                            <figure class="flex-shrink-0">
                                <a href="blog-masonry.html"><img src="https://via.placeholder.com/480x358" alt=""></a>
                            </figure>
                            <div class="media-body flex-grow-1 text-small"><a href="blog-masonry.html" class="text-extra-dark-gray"><span class="d-inline-block margin-5px-bottom">Having a new perspec-tive on new york city</span></a> <span class="d-block text-medium-gray text-small">March 10, 2016</span></div>
                        </li>
                        <li class="media d-flex">
                            <figure class="flex-shrink-0">
                                <a href="blog-masonry.html"><img src="https://via.placeholder.com/480x358" alt=""></a>
                            </figure>
                            <div class="media-body flex-grow-1 text-small"><a href="blog-masonry.html" class="text-extra-dark-gray"><span class="d-inline-block margin-5px-bottom">The incredible talents of street performers</span></a> <span class="d-block text-medium-gray text-small">March 05, 2016</span></div>
                        </li>
                        <li class="media d-flex">
                            <figure class="flex-shrink-0">
                                <a href="blog-masonry.html"><img src="https://via.placeholder.com/480x358" alt=""></a>
                            </figure>
                            <div class="media-body flex-grow-1 text-small"><a href="blog-masonry.html" class="text-extra-dark-gray"><span class="d-inline-block margin-5px-bottom">Praesent placerat risus quis eros</span></a> <span class="d-block text-medium-gray text-small">March  01, 2016</span></div>
                        </li>
                    </ul>
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
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
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
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
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Newsletter</span></div>
                    <div class="d-inline-block w-100">
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
                    </div>
                </div>
                <div class="margin-45px-bottom sm-margin-25px-bottom">
                    <a href="#"><img src="images/menu-banner-01.png" alt="" class="w-100"/></a>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- end blog content section -->  

@endsection