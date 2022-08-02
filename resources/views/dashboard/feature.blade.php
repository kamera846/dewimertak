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
                                Layanan & Produk
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/features/create"
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
                    <h3 class="mb-0">Layanan & Produk</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($features->count())

                        @foreach($features as $feature)

                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $feature->name }}
                            </td>
                            <td>
                                @if($feature->image)
                                <img
                                    src="{{ asset('storage/'.$feature->image) }}"
                                    style="height: 70px;"
                                    class="rounded"
                                />
                                @else
                                    -
                                @endif
                            </td>
                            <td class="table-actions">
                                <a
                                    href="#"
                                    class="table-action feature-detail"
                                    data-toggle="modal"
                                    data-target="#feature-detail"
                                    data-id="{{ $feature->id }}"
                                    data-name="{{ $feature->name }}"
                                    data-image="{{ $feature->image }}"
                                    data-content="{{ $feature->content }}"
                                    data-loop="{{ $loop->iteration }}"
                                >
                                    <i 
                                        data-toggle="tooltip"
                                        data-original-title="Detail layanan {{ $loop->iteration }}"
                                        class="fas fa-info-circle"
                                    ></i>
                                </a>
                                <a
                                    href="/dashboard/features/{{ $feature->id }}/edit"
                                    class="table-action"
                                    data-toggle="tooltip"
                                    data-original-title="Edit layanan {{ $loop->iteration }}"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/dashboard/features/{{ $feature->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus layanan {{ $loop->iteration }}" style="background:none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                        
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
<div class="modal fade" id="feature-detail" tabindex="-1" role="dialog" aria-labelledby="feature-detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title feature-title" id="modal-title-default"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold text-right">Nama</div>
                    <div class="col-9" id="feature-name"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold text-right">Foto</div>
                    <div class="col-9" id="feature-image"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold text-right">Konten</div>
                    <div class="col-9 pl-0" id="feature-content"></div>
                </div>
            </div>
            <div class="modal-footer text-end">
                <a href="" id="feature-edit" class="btn btn-primary">Edit</a>
                <form action="" id="feature-delete" method="post" class="p-0 m-0 d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" id="deleteInModal" class="btn btn-outline-primary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection