@extends('layouts.master')
@section('title','Add New User')
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
                        <form method="POST" action="{{ route('add-new-user.store') }}" class="md-float-material" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Name" required>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="telepon" value="{{ old('telepon') }}" placeholder="Enter Your Phone Number" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="role_name" id="role_name" required>
                                    <option selected disabled>Pilih Akses Login</option>
                                    <optgroup label="Pembina">
                                        <option value="Kadis Ketapang">Kadis Ketapang</option>
                                    </optgroup>
                                    <optgroup label="Administrator">
                                        <option value="Super Admin">Super Admin</option>
                                    </optgroup>
                                    <optgroup label="Koordinator">
                                        <option value="Kabid Ketersediaan dan Kerawanan Pangan">Kabid Ketersediaan dan Kerawanan Pangan</option>
                                        <option value="Kabid Distribusi dan Cadangan Pangan">Kabid Distribusi dan Cadangan Pangan</option>
                                        <option value="Kabid Konsumsi dan Keamanan Pangan">Kabid Konsumsi dan Keamanan Pangan</option>
                                    </optgroup>
                                </select>
                                <select class="form-control" name="role_name" id="role_name" required>
                                    <option selected disabled>Pilih Akses Login</option>
                                    <span>Pembina</span>
                                    <option disable selected>Pembina</option>
                                    <option value="Pembina">Kadis Ketapang</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Super Admin">Super Admin</option>
                                    
                                    
                                    
                                    
                                    <option value="Sub Bagian Umum">Sub Bagian Umum</option>
                                    <option value="Sub Bagian Keuangan">Sub Bagian Keuangan</option>
                                    <option value="Bidang Ketersediaan">Bidang Ketersediaan</option>
                                    <option value="Bidang Kerawanan">Bidang Kerawanan</option>
                                    <option value="Bidang Distribusi & Cadangan Pangan">Bidang Distribusi & Cadangan Pangan</option>
                                    <option value="Bidang Keamanan Pangan">Bidang Keamanan Pangan</option>
                                    <option value="Bidang Penganekaragaman Konsumsi Pangan">Bidang Penganekaragaman Konsumsi Pangan</option>
                                    <option value="Bidang Konsumsi Pangan">Bidang Konsumsi Pangan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-password" name="password" placeholder="Choose Password" required>
                                <input type="checkbox" class="form-checkbox" id="password"> Show password
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Confirm Password" required>
                            </div>
                            <a href="{{ url('user-management') }}" class="btn btn-default"><i class="ti-plus-circle"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
