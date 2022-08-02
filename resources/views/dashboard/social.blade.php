@extends('layouts.dashboard')

@section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav
                        aria-label="breadcrumb"
                        class="d-none d-md-inline-block"
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
                                Jejaring Sosial
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/socials/create"
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
            @if(session()->has('success'))
                <div class="row px-3">
                    <div class="alert alert-{{ (session()->has('success'))?'success':'' }} alert-dismissible fade show" style="width: 100%" role="alert">
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
                    <h3 class="mb-0">Jejaring Sosial</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Aplikasi</th>
                        <th>Tautan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($socials->count())

                        @foreach($socials as $social)
                        
                        <tr>
                            <td>
                                {{ ucwords($social->app) }}
                            </td>
                            <td>
                                <a target="_blank" href="{{ $social->link }}">{{ $social->link }}</a>
                            </td>
                            <td class="table-actions">
                                <a
                                    href="/dashboard/socials/{{ $social->id }}/edit"
                                    class="table-action social-edit"
                                >
                                    <i
                                    class="fas fa-edit"
                                    data-toggle="tooltip"
                                    data-original-title="Edit jejaring sosial"
                                    ></i>
                                </a>
                                <form action="/dashboard/socials/{{ $social->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus jejaring sosial" style="background:none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> 
                            </td>
                        </tr>

                        @endforeach

                    @else
                        
                        <tr>
                            <td colspan="3" id="tes" class="text-center">Belum ada data.</td>
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