@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Artikel
                    </h6>
                    <nav
                        aria-label="breadcrumb"
                        class="d-none d-md-inline-block ml-md-4"
                    >
                        <ol
                            class="breadcrumb breadcrumb-links breadcrumb-dark"
                        >
                            <li class="breadcrumb-item">
                                <a href="/dashboard"
                                    ><i class="fas fa-home"></i
                                ></a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                Data Artikel
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/post-categories"
                        class="btn btn-sm btn-neutral"
                    >
                        <span class="btn-inner--text"> Kategori </span>
                    </a>
                    <a
                        href="/dashboard/posts/create"
                        class="btn btn-sm btn-neutral"
                    >
                        <span class="btn-inner--icon"
                            ><i class="fas fa-plus"></i
                        ></span>
                        <span class="btn-inner--text"> Baru</span>
                    </a>
                </div>
            </div>

            {{-- Flash Message --}}
            @if (session()->has('success'))
                <div class="row px-3">
                    <div class="alert alert-success alert-dismissible fade show" style="width: 100%" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"> {{ session('success') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Data Postingan</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($posts->count())

                        @foreach($posts as $post)
                        
                        <tr>
                            <td>
                                <img
                                    src="{{ asset('storage/'. $post->image) }}"
                                    class="rounded"
                                    height="70px"
                                />
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                {{ ucwords($post->category->name) }}
                            </td>
                            <td>
                                {{ $post->user->name }}
                            </td>
                            <td class="table-actions">
                                <a
                                    href="/dashboard/posts/{{ $post->id }}"
                                    class="table-action"
                                    data-toggle="tooltip"
                                    data-original-title="Detail postingan"
                                >
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a
                                    href="/dashboard/posts/{{ $post->id }}/edit"
                                    class="table-action"
                                    data-toggle="tooltip"
                                    data-original-title="Edit postingan"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus postingan" style="background:none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> 
                            </td>
                        </tr>

                        @endforeach

                    @else
                        
                        <tr >
                            <td colspan="5" class="text-center">Belum ada data.</td>
                        </tr>

                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.dashboard-footer')

</div>

@endsection