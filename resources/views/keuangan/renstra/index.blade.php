@extends('layouts.master')
@section('title','EVALUASI RENSTRA')
@section('content')
<style type="text/css">
.modal-body {
    color: #333;
}

/*.modal-body input,
.modal-body option,
.modal-body textarea {
    font-size: 16px;
    color: #333;
}

.modal-content form {
    overflow-y: auto;
    overflow-x: hidden;
    height: 65vh;
} */

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
    font-size: 15px;
}

.table thead {
    background: #f7f7f7
}

.table tbody tr td {
    text-align: center;
    color: black;
    text-align: center;
    font-size: 15px;
}

.table tbody .img {
    max-width: 40px;
    border: 2px solid white;
    border-radius: 5px;
    -webkit-filter: drop-shadow(2px 2px 2px #222);
    filter: drop-shadow(2px 2px 2px #222);
}
</style>

@include('keuangan.renstra.modal')

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
                    <div class="card-body">
                        <form action="{{ route('evaluasi-renstra-search') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="From Tahun" id="from"
                                        name="from" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="To Tahun" id="to" name="to"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="search">Search</button>
                                <button type="submit" class="btn btn-info" name="exportExcel">ExportExcel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body" style="overflow-x:auto;">
                        <div class="tab-content">
                            @if(session('success'))
                            <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table class="table table-hover" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Indikator</th>
                                        <th>Targer Renstra</th>
                                        <th>Realisasi</th>
                                        <th>Rasio</th>
                                        <th>Tahun</th>
                                        @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($renstra as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->indikator }}</td>
                                        <td>{{ $item->target }}</td>
                                        <td>{{ $item->realisasi }}</td>
                                        <td>{{ $item->rasio }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#edit-{{ $item->id }}"><i class="ti-pencil"></i></a>
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