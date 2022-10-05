@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Bagian
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
                                Tayangan Slide
                            </li>
                        </ol>
                    </nav>
                </div>
                @if($carousels->count() < 3)
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/carousels/create"
                        class="btn btn-sm btn-neutral"
                    >
                        <span class="btn-inner--icon"
                            ><i class="fas fa-plus"></i
                        ></span>
                        <span class="btn-inner--text"> Baru</span>
                    </a>
                </div>
                @endif
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
                    <h3 class="mb-0">Tayangan Slide</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($carousels->count())

                        @foreach($carousels as $carousel)

                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <img
                                    src="{{ asset('storage/'.$carousel->image) }}"
                                    style="height: 70px; "
                                    class="rounded"
                                />
                            </td>
                            <td>
                                
                                {{ strlen($carousel->title) <= 30 ? $carousel->title : substr($carousel->title, 0, 30).'..' }}
                            </td>
                            <td class="table-actions">
                                <a
                                    href="#"
                                    class="table-action carousel-detail"
                                    data-toggle="modal"
                                    data-target="#carousel-detail"
                                    data-id="{{ $carousel->id }}"
                                    data-image="{{ $carousel->image }}"
                                    data-title="{{ $carousel->title }}"
                                    data-subtitle="{{ $carousel->sub_title }}"
                                    data-loop="{{ $loop->iteration }}"
                                >
                                    <i 
                                        data-toggle="tooltip"
                                        data-original-title="Detail tayangan {{ $loop->iteration }}"
                                        class="fas fa-info-circle"
                                    ></i>
                                </a>
                                <a
                                    href="/dashboard/carousels/{{ $carousel->id }}/edit"
                                    class="table-action"
                                    data-toggle="tooltip"
                                    data-original-title="Edit tayangan {{ $loop->iteration }}"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/dashboard/carousels/{{ $carousel->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus tayangan {{ $loop->iteration }}" style="background:none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                        @if($carousels->count() >= 3)
                        <tr >
                            <td colspan="4" class="text-center">Anda tidak bisa membuat data lagi, maksimal diperbolehkan 3 data.</td>
                        </tr>
                        @endif
                        
                    @else
                        
                        <tr >
                            <td colspan="4" class="text-center">Belum ada data.</td>
                        </tr>

                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.dashboard-footer')

</div>

{{-- Modal detail --}}
<div class="modal fade" id="carousel-detail" tabindex="-1" role="dialog" aria-labelledby="carousel-detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title modal-title" id="modal-title-default"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold text-right">Foto</div>
                    <div class="col-9" id="carousel-image"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold text-right">Judul</div>
                    <div class="col-9" id="carousel-title"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold text-right">Sub Judul</div>
                    <div class="col-9" id="carousel-subtitle"></div>
                </div>
            </div>
            <div class="modal-footer text-end">
                <a href="" id="carousel-edit" class="btn btn-primary">Edit</a>
                <form action="" id="carousel-delete" method="post" class="p-0 m-0 d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" id="deleteInModal" class="btn btn-outline-primary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection