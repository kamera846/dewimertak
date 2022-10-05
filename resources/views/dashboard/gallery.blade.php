@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Galeri
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
                                Data Galeri
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/galleries/create"
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
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Data Galeri</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover py-4">
            <table class="table table-flush " id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Foto / Semat Video</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($galleries->count())

                        @foreach($galleries as $gallery)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($gallery->image)
                                <img
                                    src="{{ asset('storage/'.$gallery->image) }}"
                                    style="height: 70px; "
                                    class="rounded"
                                />
                                @else
                                    {{ strlen($gallery->video_link) <= 35 ? $gallery->video_link : substr($gallery->video_link, 0, 35).'..'  }}
                                @endif
                            </td>
                            <td>
                                @if($gallery->caption)
                                    {{ strlen($gallery->caption) <= 40 ? $gallery->caption : substr($gallery->caption, 0, 40).'..' }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="table-actions">
                                @if($gallery->type == 'video_link')
                                <a
                                    href="#"
                                    class="table-action gallery-detail"
                                    data-toggle="modal"
                                    data-target="#gallery-detail"
                                    data-id="{{ $gallery->id }}"
                                    data-video_link="{{ $gallery->video_link }}"
                                    data-caption="{{ $gallery->caption }}"
                                >
                                <i 
                                    data-toggle="tooltip"
                                    data-original-title="Preview Video"
                                    class="fas fa-info-circle"
                                ></i>
                            </a>
                                @endif
                                <a
                                    href="/dashboard/galleries/{{ $gallery->id }}/edit"
                                    class="table-action"
                                    data-toggle="tooltip"
                                    data-original-title="Edit galeri"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/dashboard/galleries/{{ $gallery->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus galeri" style="background:none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                        
                    @else
                        
                        <tr >
                            <td colspan="3" class="text-center">Belum ada data.</td>
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
<div class="modal fade" id="gallery-detail" tabindex="-1" role="dialog" aria-labelledby="gallery-detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title modal-title" id="modal-title-default">Preview Video Galeri</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <div class="row mb-3 px-2" id="gallery-video_link">
                </div>
                <div class="row mb-3">
                    <div class="col-3 font-weight-bold">Keterangan :</div>
                    <div class="col-9" id="gallery-caption"></div>
                </div>
            </div>
            <div class="modal-footer text-end">
                <a href="" id="gallery-edit" class="btn btn-primary">Edit</a>
                <form action="" id="gallery-delete" method="post" class="p-0 m-0 d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" id="deleteInModal" class="btn btn-outline-primary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection