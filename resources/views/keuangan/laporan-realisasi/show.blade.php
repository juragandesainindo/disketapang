@extends('layouts.master')
@section('title','Kegiatan')
@section('content')
<style type="text/css">
.modal-body label {
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
    text-align: center;
    font-size: 16px;
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

@include('keuangan.laporan-realisasi.modalShow')

<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <label style="margin-top: 10px;">
                            <a href="{{ url('laporan-realisasi') }}" class="btn btn-default btn-outline">Kembali</a>
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah</a>
                            @endif
                        </label>
                        <h1 class="text-primary">@yield('title') - {{ $realisasi->name_kegiatan }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
                        <div class="tab-content" style="overflow-x: auto;">
                            @if(session('success'))
                            <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3">Kegiatan</th>
                                        <th colspan="3">Pagu Kegiatan</th>
                                        <th colspan="4">Realisasi</th>
                                        <th colspan="2">Realisasi Fisik</th>
                                        <th rowspan="3">Tahun</th>
                                        @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
                                        <th rowspan="3">Aksi</th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th width="20%" rowspan="2">APBD Murni</th>
                                        <th width="20%" rowspan="2">Refocusing APBD</th>
                                        <th width="20%" rowspan="2">APBD-P</th>
                                        <th colspan="2">Keuangan</th>
                                        <th colspan="2">Fisik</th>
                                        <th rowspan="2">Seharusnya</th>
                                        <th rowspan="2">Defiasi</th>
                                    </tr>
                                    <tr>
                                        <th>(Rp)</th>
                                        <th>%</th>
                                        <th>%</th>
                                        <th>TTB</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($realisasi->kegiatan as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td width="80%">{{ $item->nama_kegiatan }}</td>
                                        <td>{{ number_format($item->apbd_murni) }}</td>
                                        <td>{{ number_format($item->refocusing) }}</td>
                                        <td>{{ number_format($item->apbd_p) }}</td>
                                        <td>{{ number_format($item->realisasi_keuangan) }}</td>
                                        <td>{{ number_format($item->realisasi_keuangan/$item->apbd_p*100) }}</td>
                                        <td>{{ $item->realisasi_fisik }}%</td>
                                        <td>{{ Str::limit(($item->realisasi_keuangan/$item->apbd_p*100)/$item->apbd_p*100,1) }}
                                        </td>
                                        <td>{{ $item->seharusnya }}%</td>
                                        <td>{{ ($item->seharusnya-$item->realisasi_fisik) }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete-{{ $item->id }}"><i class="ti-trash"></i></a>
                                        </td>
                                        @endif
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