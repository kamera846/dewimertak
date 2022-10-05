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
                                Kategori Artikel
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a
                        href="/dashboard/posts"
                        class="btn btn-sm btn-neutral"
                    >
                        <span class="btn-inner--text"> Artikel </span>
                    </a>
                    <a
                        href="#"
                        class="btn btn-sm btn-neutral"
                        data-toggle="modal"
                        data-target="#create"
                    >
                        <span class="btn-inner--icon"
                            ><i class="fas fa-plus"></i
                        ></span>
                        <span class="btn-inner--text"> Baru</span>
                    </a>
                </div>
            </div>

            {{-- Flash Message --}}
            @if(session()->has('success') || session()->has('info'))
                <div class="row px-3">
                    <div class="alert alert-{{ (session()->has('success'))?'success':'info' }} alert-dismissible fade show" style="width: 100%" role="alert">
                        @if(session()->has('success'))
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        @endif
                        <span class="alert-text"> {{ session('success') }}{{ session('info') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Invalid message --}}
            @error('name')
                <div class="row px-3">
                    <div class="alert alert-warning alert-dismissible fade show" style="width: 100%" role="alert">
                        <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                        <span class="alert-text"> {{ $message }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @enderror

        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Data Kategori Postingan</h3>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive table-hover">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah Artikel</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                    @if($postCategories->count())

                        @foreach($postCategories as $postCategory)
                        
                        <tr>
                            <td>
                                {{ ucwords($postCategory->name) }}
                            </td>
                            <td>
                                {{ App\Models\Post::where('category_id', $postCategory->id)->count() }}
                            </td>
                            <td class="table-actions">
                                <a
                                    href="#"
                                    class="table-action post-edit"
                                    data-toggle="modal"
                                    data-target="#edit"
                                    data-id="{{ $postCategory->id }}"
                                    data-name="{{ $postCategory->name }}"
                                >
                                    <i
                                    class="fas fa-edit"
                                    data-toggle="tooltip"
                                    data-original-title="Edit kategori postingan"
                                    ></i>
                                </a>
                                <form action="/dashboard/post-categories/{{ $postCategory->id }}" method="post" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="delete" class="table-action table-action-delete border-0 p-0 m-0" data-toggle="tooltip" data-original-title="Hapus kategori postingan" style="background:none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> 
                            </td>
                        </tr>

                        @endforeach

                    @else
                        
                        <tr>
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

{{-- Create Modal --}}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Buat Kategori Postingan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/dashboard/post-categories" method="post">
                @csrf
                <div class="modal-body">
                    <div class="py-3">
                        <label for="name-create">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name-create" name="name" autocomplete="off" autofocus required>
                    </div>
                </div>
                <div class="modal-footer text-end">
                    <button type="submit" class="btn btn-primary">Buat</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Edit Kategori Postingan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post" id="form-edit">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="py-3">
                        <label for="name-edit">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name-edit" name="name" autocomplete="off" autofocus required>
                    </div>
                </div>
                <div class="modal-footer text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection