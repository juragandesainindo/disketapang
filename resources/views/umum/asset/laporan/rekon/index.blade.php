@extends('layouts.adminKit')
@section('title','Laporan Rekon')

@section('content')
<!-- Modal -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('laporan-rekon.index') }}" method="GET">
                    <div class="input-group">
                        <select name="search" class="form-control form-select" required>
                            <option value="">Cari kategori</option>
                            <option value="KibA">KibA</option>
                            <option value="KibB">KibB</option>
                            <option value="KibC">KibC</option>
                            <option value="KibD">KibD</option>
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


<main class="content">
    <div class="container-fluid p-0">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>&nbsp; {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#search">
                    <i data-feather="search"></i>&nbsp;
                    search
                </button>

                <a href="{{ route('laporan-rekon.create') }}" class="btn btn-primary">
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
                                <th>#</th>
                                <th>No Surat</th>
                                <th>Asset (Id/Kode/Barang)</th>
                                <th>KasubagUmum/NIP</th>
                                <th>Pengurus Barang/NIP</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->kode_surat }}</td>
                                <td>{{ $item->assetUmum->mappingAsset->kode_brg
                                    }}<br>{{
                                    $item->assetUmum->mappingAsset->nama_brg }}</td>
                                <td>
                                    {{ $item->kasubag_nama }} <br>
                                    <span class="text-small">{{ $item->kasubag_nip }}</span>
                                </td>
                                <td>
                                    {{ $item->pegawai->nama }} <br>
                                    {{ $item->pegawai->nip }}
                                </td>
                                <td>{{ $item->assetUmum->kategori }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm mb-1"
                                        href="{{ route('laporan-rekon.edit',$item->id) }}">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm mb-1"
                                        href="{{ route('laporan-rekon-export-rekon',$item->id) }}">
                                        <i data-feather="file-text"></i>
                                        Rekon
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@foreach ($laporans as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('laporan-rekon.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Apakah yakin ingin menghapus data ini? <br>
                        Kode barang : <strong>{{ $item->kode_brg }}</strong> <br>
                        Nama Barang : <strong>{{ $item->nama_brg }}</strong> <br>
                        Keterangan : <strong>{{ $item->keterangan }}</strong> <br>
                        Penanggung Jawab : <strong>{{ $item->penanggung_jawab }}</strong> <br>
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
@endforeach
@endsection