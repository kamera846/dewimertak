@extends('layouts.main')

@section('page-content')

@php
    $title = $pageTitleSection->title;

    if(request('category')) {
        $title = 'Artikel Tentang ' . App\Models\PostCategory::where('slug', request('category'))->get()[0]->name;
    }
    elseif(request('author')) {
        $title = 'Artikel Oleh ' . App\Models\User::where('slug', request('author'))->get()[0]->name;
    }
    elseif(request('tag')) {
        $title = 'Artikel Dengan #' . request('tag');
    }
    elseif(request('search')) {
        $title = 'Cari : ' . request('search');
    }
@endphp

<section class="wrapper bg-soft-green pt-14">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
                <h1 class="mb-3">
                    {{ $title ? $title : 'Artikel' }}
                </h1>
                <nav class="d-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Artikel
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
<section class="wrapper bg-light angled upper-end lower-end">
    <div class="container py-14 py-md-16">
        
        @if($posts->count() || request('search'))

            <div class="row gx-lg-8 gx-xl-12">
                <div class="col-lg-8">

                    @if($posts->count())
                        <div class="blog grid grid-view">
                            <div class="row isotope gx-md-8 gy-8 mb-8">

                                @foreach($posts as $post)
                                <article class="item post col-md-6">
                                    <div class="card">
                                        <figure
                                            class="card-img-top overlay overlay-1 hover-scale"
                                        >
                                            <a href="/posts/{{ $post->slug }}">
                                                <img
                                                    src="/storage/{{ $post->image }}"
                                                    alt="{{ $post->title }}"
                                                    style="height:250px !important; object-fit:cover"
                                            /></a>
                                            <figcaption>
                                                <h5 class="from-top mb-0">selengkapnya</h5>
                                            </figcaption>
                                        </figure>
                                        <div class="card-body">
                                            <div class="post-header">
                                                <div class="post-category text-line">
                                                    <a
                                                        href="/posts?category={{ $post->category->slug }}"
                                                        class="hover"
                                                        rel="category"
                                                        >{{ ucwords($post->category->name) }}</a
                                                    >
                                                </div>
                                                <!-- /.post-category -->
                                                <h2 class="h3 mt-1 mb-3">
                                                    <a
                                                        class="link-dark"
                                                        href="/posts/{{ $post->slug }}"
                                                        >{{ strlen($post->title) <= 45 ? $post->title : substr($post->title, 0, 45).'..'  }}</a
                                                    >
                                                </h2>
                                            </div>
                                            <!-- /.post-header -->
                                            <div class="post-content">
                                                {{ substr(strip_tags($post->content), 0, 115) }}...
                                            </div>
                                            <!-- /.post-content -->
                                        </div>
                                        <!--/.card-body -->
                                        <div class="card-footer">
                                            <ul class="post-meta d-flex mb-0">
                                                <li class="post-date">
                                                    <i class="uil uil-calendar-alt"></i
                                                    ><span>{{ $post->created_at->isoFormat('D MMM Y') }}</span>
                                                </li>
                                                <li class="post-author">
                                                    <a href="/posts?author={{ $post->user->slug }}"
                                                        ><i class="uil uil-user"></i
                                                        ><span>{{ $post->user->name }}</span></a
                                                    >
                                                </li>
                                            </ul>
                                            <!-- /.post-meta -->
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </article>
                                @endforeach
                                <!-- /.post -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.blog -->

                        <div class="row pt-5">
                            {{ $posts->links('vendor.pagination.bootstrap-5') }}
                        </div>
                        <!-- /nav -->
                    @else
                        <div class="py-5 fs-20 text-center">Tidak ada hasil ditemukan.</div>
                    @endif
                </div>
                <!-- /column -->
                <aside class="col-lg-4 sidebar mt-8 mt-lg-0">
                    <div class="widget">
                        <form class="search-form">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('author'))
                                <input type="hidden" name="author" value="{{ request('author') }}">
                            @endif
                            @if(request('tag'))
                                <input type="hidden" name="tag" value="{{ request('tag') }}">
                            @endif
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
                    @if($posts->count() > 5)
                        @if(request(['search', 'category', 'author', 'tag']))
                            @if($recentPosts->count())
                            <div class="widget">
                                <h4 class="widget-title mb-3">Artikel Terbaru</h4>
                                <ul class="image-list">
                                    @foreach($recentPosts as $post)
                                    <li>
                                        <figure class="rounded">
                                            <a href="/posts/{{ $post->slug }}"
                                                ><img
                                                    src="/storage/{{ $post->image }}"
                                                    alt="{{ $post->title }}"
                                                    style="height: 80px !important; object-fit: cover;"
                                            /></a>
                                        </figure>
                                        <div class="post-content">
                                            <h6 class="mb-2">
                                                <a class="link-dark" href="/posts/{{ $post->slug }}"
                                                    >{{ strlen($post->title) <= 40 ? $post->title : substr($post->title, 0, 40).'..'  }}</a
                                                >
                                            </h6>
                                            <ul class="post-meta">
                                                <li class="post-date">
                                                    <i class="uil uil-calendar-alt"></i
                                                    ><span>{{ $post->created_at->isoFormat('D MMM Y') }}</span>
                                                </li>
                                            </ul>
                                            <!-- /.post-meta -->
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- /.image-list -->
                            </div>
                            @endif
                        @endif
                    @endif
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

        @else

            <div class="row justify-content-center py-5 fs-20">
                Maaf, saat ini artikel belum tersedia!
            </div>
        
        @endif
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

@endsection
