@extends('layouts.master')
@section('title','Berita Acara')
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

@include('kerawanan.kt-kamapan.berita-acara.modal')



<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <label style="margin-top: 10px;">
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add">Tambah Berita
                                Acara</a>
                            @endif
                        </label>
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                @if(session('success'))
                <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
                    {{ session('success') }}
                </div>
                @endif
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default m-t-15">
                    <div class="panel-body">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="50%">Keterangan SK</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->kamapanSk->keterangan }}</td>
                                    <td>
                                        <a href="{{ asset('kerawanan/kt-kamapan/berita-acara/' . $item->file) }}" target="_blank">
                                        <img src="{{ asset('assets/images/word.png') }}" alt="Lights" style="width:50px">
                                        <br>
                                        <span class="text-primary">{{ $item->file }}</span>
                                        </a>
                                    </td>
                                    <td>
                                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#edit-{{ $item->id }}" title="Edit"><i
                                                    class="ti-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete-{{ $item->id }}" title="Hapus"><i
                                                    class="ti-trash"></i></a>
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

@stop