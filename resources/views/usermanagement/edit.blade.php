@extends('layouts.master')
@section('title','Edit User')
@section('content')


<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <a href=""></a>
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

            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
                        <form method="POST" action="{{ route('add-new-user.update',$data->id) }}" class="md-float-material" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter Your Name" required>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" value="{{ $data->email }}" placeholder="Enter Your Email" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="telepon" value="{{ $data->telepon }}" placeholder="Enter Your Phone Number" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="role_name" id="role_name" required>
                                    <option value="{{ $data->role_name }}">{{ $data->role_name }}</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Sub Bagian Umum">Sub Bagian Umum</option>
                                    <option value="Sub Bagian Keuangan">Sub Bagian Keuangan</option>
                                    <option value="Bidang Ketersediaan">Bidang Ketersediaan</option>
                                    <option value="Bidang Kerawanan">Bidang Kerawanan</option>
                                    <option value="Bidang Distribusi">Bidang Distribusi</option>
                                    <option value="Bidang Cadangan">Bidang Cadangan</option>
                                    <option value="Bidang Konsumsi">Bidang Konsumsi</option>
                                </select>
                            </div>
                            <a href="{{ url('user-management') }}" class="btn btn-default"><i class="ti-plus-circle"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




@endsection