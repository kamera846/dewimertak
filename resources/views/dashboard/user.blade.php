@extends('layouts.dashboard') @section('page-content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengguna</h6>
                    <nav
                        aria-label="breadcrumb"
                        class="d-none d-md-inline-block ml-md-4"
                    >
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"
                                    ><i class="fas fa-home"></i
                                ></a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                Data Pengguna
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/users/create"
                        class="btn btn-sm btn-neutral"
                    >
                        <span class="btn-inner--icon"
                            ><i class="fas fa-user-plus"></i
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
                <div class="col-6">
                    <h3 class="mb-0">Data Pengguna</h3>
                </div>
                {{--
                <div class="col-6 text-right">
                    <a
                        href="/dashboard/user/create"
                        class="btn btn-sm btn-primary btn-round btn-icon"
                    >
                        <span class="btn-inner--icon"
                            ><i class="fas fa-user-plus"></i
                        ></span>
                        <span class="btn-inner--text">Baru</span>
                    </a>
                </div>
                --}}
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($users->count())

                        @foreach ($users as $user)
                            
                        <tr>
                            <td class="table-user">
                                <img
                                    @if ($user->image)
                                    src="{{ asset('storage/'.$user->image) }}"
                                    @else
                                    src="{{ asset('storage/default/user.jpg') }}"
                                    @endif
                                    class="avatar rounded-circle"
                                />
                            </td>
                            <td>{{ ucwords($user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telephone ? $user->telephone : '-' }}</td>
                            <td class="table-actions">
                                <a
                                    href="/dashboard/users/{{ $user->id }}/edit"
                                    class="table-action"
                                    data-toggle="tooltip"
                                    data-original-title="Edit pengguna"
                                >
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="/dashboard/users/{{ $user->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus pengguna" style="background:none;">
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
