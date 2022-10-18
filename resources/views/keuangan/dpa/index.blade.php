@extends('layouts.master')
@section('title','DPA')
@section('content')

@include('keuangan.dpa.modal')

<style type="text/css">
.my-active span {
    background-color: #5cb85c !important;
    color: white !important;
    border-color: #5cb85c !important;
}

.modal-body {
    color: #333;
}
</style>

<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <label style="margin-top: 10px;">
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add"><i
                                    class="ti-plus-circle"></i> Tambah</a>
                            @endif
                        </label>
                        <h1 class="text-primary">@yield('title')</h1>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="col-lg-12">
                <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 25px;">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <div class="col-lg-12 m-t-35">
                @foreach($dpa as $key => $d)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="{{ asset('keuangan/dpa/'.$d->file) }}" target="_blank">
                            @if($d->file=='.jpg')
                            <img src="{{ asset('keuangan/dpa/'.$d->file) }}" alt="Lights" style="width:100%">
                            @else
                            <embed type="application/pdf" src="{{ asset('keuangan/dpa/'.$d->file) }}"
                                class="img-rounded img-responsive" alt="Cinque Terre"></embed type="application/pdf">
                            @endif
                            <div class="caption">
                                <p>
                                <h4><span class="text-info">{{ $d->title }}</span></h4>
                                @if(Auth::user()->role_name=='Kadis Ketapang')
                                @else
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit-{{ $d->id }}" title="Edit">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete-{{ $d->id }}">Hapus</a>
                                @endif
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br>
        {{ $dpa->links('vendor.pagination.custom') }}
    </div>
</div>

@stop