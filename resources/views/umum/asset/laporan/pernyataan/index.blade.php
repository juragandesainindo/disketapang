@extends('layouts.assetUmum')
@section('title','Laporan Rekon')

@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
    action="{{ route('laporan-rekon.index') }}" method="GET">
    <div class="input-group">
        <select name="search" class="form-control bg-light border-0 small" required>
            <option value="">Cari kategori</option>
            <option value="KibA">KibA</option>
            <option value="KibB">KibB</option>
            <option value="KibC">KibC</option>
            <option value="KibD">KibD</option>
            <option value="KibF">KibF</option>
            <option value="Atb">Atb</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('searchMini')
<form class="form-inline mr-auto w-100 navbar-search" action="{{ route('laporan-rekon.index') }}" method="GET">
    <div class="input-group">
        <select name="search" class="form-control bg-light border-0 small" required>
            <option value="">Cari kategori</option>
            <option value="KibA">KibA</option>
            <option value="KibB">KibB</option>
            <option value="KibC">KibC</option>
            <option value="KibD">KibD</option>
            <option value="KibE">KibE</option>
            <option value="KibF">KibF</option>
            <option value="Atb">Atb</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('content')
<div class="container-fluid">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between align-items-center">
                @yield('title')
                <div>
                    <a href="{{ route('laporan-pernyataan.create') }}" class="btn btn-primary btn-sm px-3">
                        <i class="fas fa-plus-circle"></i>&nbsp;
                        Create
                    </a>
                </div>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>No Surat</th>
                            <th>Asset (Id/Kode/Barang)</th>
                            <th>Pegawai/NIP</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="" class="btn btn-info btn-sm">
                                    <i class="fas fa-bullseye"></i>
                                </a>
                                <a href="" class="btn btn-primary btn-sm">
                                    <i class="fas fa-file-word"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="delete-" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection