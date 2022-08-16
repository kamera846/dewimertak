@extends('layouts.main') 

@section('page-content')

<section class="wrapper bg-soft-green pt-14">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-md-10 col-xl-8 mx-auto">
                <div class="post-header">
                    <div class="post-category text-line">
                        <a href="/posts?category={{ $post->category->slug }}" class="text-reset" rel="category">{{ $post->category->name }}</a>
                    </div>
                    <!-- /.post-category -->
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <ul class="post-meta">
                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $post->created_at->isoFormat('D MMMM Y') }}</span></li>
                        <li class="post-author"><i class="uil uil-user"></i><a href="/posts?author={{ $post->user->slug }}"><span>{{ $post->user->name }}</span></a></li>
                    </ul>
                    <!-- /.post-meta -->
                </div>
                <!-- /.post-header -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light angled upper-end lower-end">
    <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12">
            <div class="col-lg-8">
                <div class="blog single">
                    <div class="card">
                        <figure class="card-img-top">
                            <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" style="max-height: 500px; object-fit: cover"/>
                        </figure>
                        <div class="card-body">
                            <div class="classic-view">
                                <article class="post">
                                    <div class="post-content mb-5">
                                        {{-- <h2 class="h1 mb-4">
                                            {{ $post->title }}
                                        </h2> --}}

                                        {!! $post->content !!}
                                        
                                    </div>
                                    <!-- /.post-content -->
                                    @if($post->tags)
                                    @php
                                        $tags = explode(',', $post->tags)
                                    @endphp
                                    <div
                                        class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8"
                                    >
                                        <div>
                                            <ul class="list-unstyled tag-list mb-0">
                                                @foreach($tags as $tag)
                                                <li>
                                                    <a
                                                        href="/posts?tag={{ $tag }}"
                                                        class="btn btn-soft-ash btn-sm rounded-pill mb-0"
                                                        >{{ $tag }}</a
                                                    >
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- /.post-footer -->
                                </article>
                                <!-- /.post -->
                            </div>
                            <!-- /.classic-view -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.blog -->
            </div>
            <!-- /column -->
            <aside class="col-lg-4 sidebar mt-8 mt-lg-0">
                <div class="widget">
                    <form class="search-form" action="/posts">
                        <div class="form-floating mb-0">
                            <input
                                id="search-form"
                                type="text"
                                class="form-control"
                                placeholder="cari"
                                name="search"
                                value="{{ request('search') }}"
                                autocomplete="off"
                                required
                            />
                            <label for="search-form">Cari artikel</label>
                        </div>
                    </form>
                    <!-- /.search-form -->
                </div>
                <!-- /.widget -->

                {{-- <div class="widget">
                    <h4 class="widget-title mb-3">About Us</h4>
                    <p>
                        Fusce dapibus, tellus ac cursus commodo, tortor mauris
                        condimentum nibh, ut fermentum. Nulla vitae elit libero,
                        a pharetra augue. Donec id elit non mi porta gravida at
                        eget metus.
                    </p>
                    <nav class="nav social">
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                        <a href="#"><i class="uil uil-pinterest"></i></a>
                        <a href="#"><i class="uil uil-instagram"></i></a>
                        <a href="#"><i class="uil uil-youtube"></i></a>
                    </nav>
                    <!-- /.social -->
                    <div class="clearfix"></div>
                </div>
                <!-- /.widget --> --}}

                {{-- catgeories --}}
                @if($categories->count())
                    <div class="widget">
                        <h4 class="widget-title mb-3">Kategori</h4>
                        <ul class="unordered-list bullet-primary text-reset">
                            @foreach($categories as $category)
                            <li class="{{ request('category') == $category->slug ? 'text-green': '' }}"><a href="/posts?category={{ $category->slug }}">{{ ucwords($category->name) }} ({{ App\Models\Post::where('category_id', $category->id)->count() }})</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /.widget -->

                {{-- recent post --}}
                <div class="widget">
                    <h4 class="widget-title mb-3">Artikel Terbaru</h4>
                    <ul class="image-list">
                        @foreach($recentPosts as $rPost)
                        <li class="{{ ($post->id === $rPost->id) ? 'd-none' : '' }}">
                            <figure class="rounded">
                                <a href="/posts/{{ $rPost->slug }}"
                                    ><img
                                        src="/storage/{{ $rPost->image }}"
                                        alt="{{ $rPost->title }}"
                                        style="height: 80px !important; object-fit: cover;"
                                /></a>
                            </figure>
                            <div class="post-content">
                                <h6 class="mb-2">
                                    <a class="link-dark" href="/posts/{{ $rPost->slug }}"
                                        >{{ strlen($rPost->title) <= 40 ? $rPost->title : substr($rPost->title, 0, 40).'..'  }}</a
                                    >
                                </h6>
                                <ul class="post-meta">
                                    <li class="post-date">
                                        <i class="uil uil-calendar-alt"></i
                                        ><span>{{ $rPost->created_at->isoFormat('D MMM Y') }}</span>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /.image-list -->
                </div>
                <!-- /.widget -->

                {{-- tags --}}
                {{-- <div class="widget">
                    <h4 class="widget-title mb-3">Tags</h4>
                    <ul class="list-unstyled tag-list">
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Still Life</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Urban</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Nature</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Landscape</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Macro</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Fun</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Workshop</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="btn btn-soft-ash btn-sm rounded-pill"
                                >Photography</a
                            >
                        </li>
                    </ul>
                </div> --}}

                <!-- /.widget -->
                {{-- <div class="widget">
                    <h4 class="widget-title mb-3">Archive</h4>
                    <ul class="unordered-list bullet-primary text-reset">
                        <li><a href="#">February 2019</a></li>
                        <li><a href="#">January 2019</a></li>
                        <li><a href="#">December 2018</a></li>
                        <li><a href="#">November 2018</a></li>
                        <li><a href="#">October 2018</a></li>
                    </ul>
                </div> --}}
                <!-- /.widget -->
            </aside>
            <!-- /column .sidebar -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

@endsection
