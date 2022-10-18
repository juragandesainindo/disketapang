@extends('layouts.master')
@section('title','Daftar Harga Pangan')
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

.my-active span {
    background-color: #5cb85c !important;
    color: white !important;
    border-color: #5cb85c !important;
}
</style>

@include('distribusi.harga-pangan.modal')


<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        <label></label>
                        @else
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i
                                class="ti-plus-circle"></i> Tambah</a>
                        @endif
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
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

                            <table class="table table-bordered table-hover" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <a href="{{ asset('distribusi/harga-pangan/'.$item->file) }}">
                                                @if(File::exists('/distribusi/harga-pangan/{{ $item->file }}'))
                                                @else
                                                <img src="{{ asset('/assets/excel.jpg') }}" width="50px">
                                                @endif
                                            </a>
                                        </td>
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