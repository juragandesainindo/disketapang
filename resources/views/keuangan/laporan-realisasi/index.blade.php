@extends('layouts.master')
@section('title','REKAPITULASI REALISASI FISIK DAN KEUANGAN')
@section('content')
<style type="text/css">
.modal-body {
    color: #333;
}

table thead,
table tbody tr td {
    color: #333;
    font-size: 16px;
}

.table thead tr th {
    text-align: center;
    color: black;
    font-weight: bold;
    text-align: center;
    font-size: 17px;
}

.table thead {
    background: #f7f7f7
}

.table tbody tr td {
    text-align: center;
    color: black;
    text-align: center;
    font-size: 16px;
}

.table tbody .img {
    max-width: 40px;
    border: 2px solid white;
    border-radius: 5px;
    -webkit-filter: drop-shadow(2px 2px 2px #222);
    filter: drop-shadow(2px 2px 2px #222);
}

.alert-kegiatan {
    background: blue;
    color: white
}
</style>

@include('keuangan.laporan-realisasi.modal')

<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <label style="margin-top: 10px;">
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah</a>
                            @endif
                        </label>
                        <h1 class="text-primary">@yield('title')</h1>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role_name=='Kadis Ketapang')
            @else
            <div class="col-lg-12">
                <div class="card alert">
                    <form action="{{ route('kegiatan-search') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Pilih Tahun" id="from" name="from"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-success btn-outline"
                                name="exportExcel">ExportExcel</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
                        <div class="tab-content">
                            @if(session('success'))
                            <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table class="table table-hover" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Jumlah Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($realisasi as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name_kegiatan }}</td>
                                        <td>{{ $item->kegiatan->count() }}</td>
                                        <td>
                                            <a href="{{ route('laporan-realisasi.show',$item->id) }}"
                                                class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete-{{ $item->id }}"><i class="ti-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop