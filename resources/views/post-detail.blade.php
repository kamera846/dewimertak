@extends('layouts.main') 

@section('page-content')

<section class="wrapper bg-soft-green pt-14">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
                <div class="post-header">
                    <h1 class="mb-4">
                        {{ $post->title }}
                    </h1>
                    <ul class="post-meta">
                        <li class="post-date">
                            <i class="uil uil-calendar-alt"></i
                            ><span>{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}</span>
                        </li>
                        <li class="post-author">
                            <i class="uil uil-user"></i>
                            <span>
                                Oleh <a href="/posts?author={{ $post->user->slug }}">{{ $post->user->name }} </a>
                            </span>
                        </li>
                    </ul>
                    <!-- /.post-meta -->
                </div>
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
                            <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" />
                        </figure>
                        <div class="card-body">
                            <div class="classic-view">
                                <article class="post">
                                    <div class="post-content mb-5">
                                        <h2 class="h1 mb-4">
                                            {{ $post->title }}
                                        </h2>
                                        {!! $post->content !!}

                                        <div class="row g-6 mt-3 mb-10">
                                            <div class="col-md-6">
                                                <figure
                                                    class="hover-scale rounded cursor-dark"
                                                >
                                                    <a
                                                        href="/assets/landing-page/img/photos/b8-full.jpg"
                                                        data-glightbox="title: Heading; description: Purus Vulputate Sem Tellus Quam"
                                                        data-gallery="post"
                                                    >
                                                        <img
                                                            src="/assets/landing-page/img/photos/b8.jpg"
                                                            alt=""
                                                    /></a>
                                                </figure>
                                            </div>
                                            <!--/column -->
                                            <div class="col-md-6">
                                                <figure
                                                    class="hover-scale rounded cursor-dark"
                                                >
                                                    <a
                                                        href="/assets/landing-page/img/photos/b9-full.jpg"
                                                        data-glightbox
                                                        data-gallery="post"
                                                    >
                                                        <img
                                                            src="/assets/landing-page/img/photos/b9.jpg"
                                                            alt=""
                                                    /></a>
                                                </figure>
                                            </div>
                                            <!--/column -->
                                            <div class="col-md-6">
                                                <figure
                                                    class="hover-scale rounded cursor-dark"
                                                >
                                                    <a
                                                        href="/assets/landing-page/img/photos/b10-full.jpg"
                                                        data-glightbox
                                                        data-gallery="post"
                                                    >
                                                        <img
                                                            src="/assets/landing-page/img/photos/b10.jpg"
                                                            alt=""
                                                    /></a>
                                                </figure>
                                            </div>
                                            <!--/column -->
                                            <div class="col-md-6">
                                                <figure
                                                    class="hover-scale rounded cursor-dark"
                                                >
                                                    <a
                                                        href="/assets/landing-page/img/photos/b11-full.jpg"
                                                        data-glightbox
                                                        data-gallery="post"
                                                    >
                                                        <img
                                                            src="/assets/landing-page/img/photos/b11.jpg"
                                                            alt=""
                                                    /></a>
                                                </figure>
                                            </div>
                                            <!--/column -->
                                        </div>
                                        <!-- /.row -->
                                        <p>
                                            Maecenas sed diam eget risus varius
                                            blandit sit amet non magna. Cum
                                            sociis natoque penatibus et magnis
                                            dis parturient montes, nascetur
                                            ridiculus mus. Donec sed odio dui.
                                            Nulla vitae elit libero, a pharetra
                                            augue. Maecenas faucibus mollis
                                            interdum. Donec id elit non mi porta
                                            gravida at eget metus. Nullam quis
                                            risus eget urna mollis ornare vel eu
                                            leo. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Sed
                                            posuere consectetur est at lobortis.
                                            Cras mattis consectetur purus sit
                                            amet fermentum. Praesent commodo
                                            cursus magna.
                                        </p>
                                        <blockquote class="fs-lg my-8">
                                            <p>
                                                Sed posuere consectetur est at
                                                lobortis. Lorem ipsum dolor sit
                                                amet, consectetur adipiscing
                                                elit. Duis mollis, est non
                                                commodo luctus, nisi erat
                                                porttitor ligula lacinia odio
                                                sem nec elit purus.
                                            </p>
                                            <footer class="blockquote-footer">
                                                Very important person
                                            </footer>
                                        </blockquote>
                                        <h3 class="h2 mb-4">
                                            Sit Vulputate Bibendum Purus
                                        </h3>
                                        <p>
                                            Fusce dapibus, tellus ac cursus
                                            commodo, tortor mauris condimentum
                                            nibh, ut fermentum massa justo sit
                                            amet risus. Aenean lacinia bibendum
                                            nulla sed consectetur. Cras mattis
                                            consectetur purus sit amet
                                            fermentum. Praesent commodo cursus
                                            magna, vel scelerisque nisl
                                            consectetur et. Vestibulum id ligula
                                            porta felis euismod semper.
                                        </p>
                                        <p>
                                            Fusce dapibus, tellus ac cursus
                                            commodo, tortor mauris condimentum
                                            nibh, ut fermentum massa justo sit
                                            amet risus. Donec sed odio dui. Cras
                                            justo odio, dapibus ac facilisis in,
                                            egestas eget quam. Fusce dapibus,
                                            tellus ac cursus commodo, tortor
                                            mauris condimentum nibh, ut
                                            fermentum massa justo sit amet
                                            risus. Sed posuere consectetur est
                                            at lobortis. Donec id elit non mi
                                            porta gravida at eget metus. Nulla
                                            vitae elit libero, a pharetra augue.
                                            Cum sociis natoque penatibus et
                                            magnis dis parturient montes,
                                            nascetur ridiculus mus. Fusce
                                            dapibus, tellus ac cursus commodo,
                                            tortor mauris condimentum nibh.
                                        </p>
                                    </div>
                                    <!-- /.post-content -->
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
            <aside class="col-lg-4 sidebar">
                <div class="widget">
                    <h4 class="widget-title mb-3">Cari Artikel</h4>
                    <form class="search-form">
                        <div class="form-floating mb-0">
                            <input
                                id="search-form"
                                type="text"
                                class="form-control"
                                placeholder="cari"
                            />
                            <label for="search-form">Kata kunci</label>
                        </div>
                    </form>
                    <!-- /.search-form -->
                </div>
                <!-- /.widget -->
                <div class="widget">
                    <h4 class="widget-title mb-3">Artikel Terbaru</h4>
                    <ul class="image-list">
                        <li>
                            <figure class="rounded">
                                <a href="/blog-detail"
                                    ><img
                                        src="/assets/landing-page/img/photos/a1.jpg"
                                        alt=""
                                /></a>
                            </figure>
                            <div class="post-content">
                                <h6 class="mb-2">
                                    <a class="link-dark" href="/blog-detail"
                                        >Magna Mollis Ultricies Lorem ipsum dolor</a
                                    >
                                </h6>
                                <ul class="post-meta">
                                    <li class="post-date">
                                        <i class="uil uil-calendar-alt"></i
                                        ><span>26 Mar 2021</span>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                            </div>
                        </li>
                        <li>
                            <figure class="rounded">
                                <a href="/blog-detail"
                                    ><img
                                        src="/assets/landing-page/img/photos/a2.jpg"
                                        alt=""
                                /></a>
                            </figure>
                            <div class="post-content">
                                <h6 class="mb-2">
                                    <a class="link-dark" href="/blog-detail"
                                        >Ornare Nullam Risus</a
                                    >
                                </h6>
                                <ul class="post-meta">
                                    <li class="post-date">
                                        <i class="uil uil-calendar-alt"></i
                                        ><span>16 Feb 2021</span>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                            </div>
                        </li>
                        <li>
                            <figure class="rounded">
                                <a href="/blog-detail"
                                    ><img
                                        src="/assets/landing-page/img/photos/a3.jpg"
                                        alt=""
                                /></a>
                            </figure>
                            <div class="post-content">
                                <h6 class="mb-2">
                                    <a class="link-dark" href="/blog-detail"
                                        >Euismod Nullam Fusce</a
                                    >
                                </h6>
                                <ul class="post-meta">
                                    <li class="post-date">
                                        <i class="uil uil-calendar-alt"></i
                                        ><span>8 Jan 2021</span>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                            </div>
                        </li>
                    </ul>
                    <!-- /.image-list -->
                </div>
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
