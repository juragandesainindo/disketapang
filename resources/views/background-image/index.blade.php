@extends('layouts.master')
@section('title','Background Image Login')

@section('content')
@include('background-image.modal')
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <h1 class="text-primary">@yield('title')</h1>
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
        </div>
        <div class="row m-t-30">
            <div class="col-lg-7 col-12">
                <p class="m-t-10 text-danger"><b>Ukuran background 500 x 625 pixcel</b></p>
                <img src="{{ asset('background-login/'.$prev->foto) }}"
                    style="width: 500px;height:625px;margin:0 auto 10px;border:1px solid #ddd;">
            </div>
            <div class="col-lg-5 col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;justify-content: space-between;">
                            <p></p>
                            <a href="#" data-toggle="modal" data-target="#addImage" class="btn btn-info btn-sm mb-3">Add
                                Image</a>
                        </div>
                        <table class="table table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $key => $image)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if ($image->foto === Null)
                                        @else
                                        <a href="{{ asset('background-login/'.$image->foto) }}" target="_blank">
                                            <img src="{{ asset('background-login/'.$image->foto) }}" width="36"
                                                height="36" class="rounded-circle me-2">
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm mb-1" href="#" data-toggle="modal"
                                            data-target="#editImage-{{ $image->id }}">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm mb-1" href="#" data-toggle="modal"
                                            data-target="#deleteImage-{{ $image->id }}">
                                            <i class="ti-trash"></i>
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
    </div>
</div>
@endsection