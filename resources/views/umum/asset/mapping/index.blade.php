@extends('layouts.adminKit')
@section('title','Mapping Asset')

@section('content')
<!-- search -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('mapping-asset.index') }}" method="GET">
                    <div class="input-group">
                        <select name="search" class="form-control form-select" required>
                            <option value="">Pilih Penanggung Jawab</option>
                            <option value="KibA">KibA</option>
                            <option value="KibB">KibB</option>
                            <option value="KibC">KibC</option>
                            <option value="KibD">KibD</option>
                            <option value="KibE">KibE</option>
                            <option value="KibF">KibF</option>
                            <option value="Atb">Atb</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Pilih</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mapping-asset.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_brg" value="{{ old('kode_brg') }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_brg" value="{{ old('nama_brg') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <option value="KibA">KIB A ( Tanah )</option>
                            <option value="KibB">KIB B ( Peralatan dan Mesin )</option>
                            <option value="KibC">KIB C ( Gedung & Bangunan )</option>
                            <option value="KibD">KIB D ( Jalan, Irigasi dan Jaringan )</option>
                            <option value="KibE">KIB E ( Asset Tetap Lainnya )</option>
                            <option value="KibF">KIB F ( Konstruksi Dalam Penggunaan )</option>
                            <option value="Atb">ATB ( Asset Tak Berwujud )</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#search">
                    <i data-feather="search"></i>&nbsp;
                    search
                </button>

                <a href="#" data-bs-target="#create" data-bs-toggle="modal" class="btn btn-primary">
                    <i data-feather="folder-plus"></i>&nbsp;
                    Create
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-3 pb-3 pt-3">

                    <table id="example" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Barang</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapping as $item)
                            <tr>
                                <td>{{ $item->kode_brg }}</td>
                                <td>{{ $item->nama_brg }}</td>
                                <td>{{ $item->kategori }}</td>
                                <th>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}"
                                        class="btn btn-info btn-sm"><i data-feather="edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete-{{ $item->id }}"
                                        class="btn btn-danger btn-sm"><i data-feather="trash"></i></a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="delete-" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection