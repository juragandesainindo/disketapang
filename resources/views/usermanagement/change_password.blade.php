@extends('layouts.master')
@section('title','Ubah Password')
@section('content')

<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <h1 class="text-primary">
                            @yield('title')
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                                &emsp;<span class="badge badge-info">Kadis Ketapang</span>
                            @endif
                            
                            @if(Auth::user()->role_name=='Super Admin')
                                &emsp;<span class="badge badge-info">Super Admin</span>
                            @endif
                            
                            @if(Auth::user()->role_name=='Kabid Ketersediaan dan Kerawanan Pangan')
                                &emsp;<span class="badge badge-info">Kabid Ketersediaan dan Kerawanan Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kabid Distribusi dan Cadangan Pangan')
                                &emsp;<span class="badge badge-info">Kabid Distribusi dan Cadangan Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kabid Konsumsi dan Keamanan Pangan')
                                &emsp;<span class="badge badge-info">Kabid Konsumsi dan Keamanan Pangan</span>
                            @endif
                            
                            @if(Auth::user()->role_name=='Kasub Bagian Umum')
                                &emsp;<span class="badge badge-info">Kasub Bagian Umum</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasub Bagian Keuangan')
                                &emsp;<span class="badge badge-info">Kasub Bagian Keuangan</span>
                            @endif
                            
                            @if(Auth::user()->role_name=='Kasi Ketersediaan Pangan')
                                &emsp;<span class="badge badge-info">Kasi Ketersediaan Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasi Sumber Daya Pangan')
                                &emsp;<span class="badge badge-info">Kasi Sumber Daya Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasi Kerawanan Pangan')
                                &emsp;<span class="badge badge-info">Kasi Kerawanan Pangan</span>
                            @endif
                            
                            @if(Auth::user()->role_name=='Kasi Distribusi Pangan')
                                &emsp;<span class="badge badge-info">Kasi Distribusi Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasi Harga Pangan')
                                &emsp;<span class="badge badge-info">Kasi Harga Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasi Cadangan Pangan')
                                &emsp;<span class="badge badge-info">Kasi Cadangan Pangan</span>
                            @endif
                            
                            @if(Auth::user()->role_name=='Kasi Keamanan Pangan')
                                &emsp;<span class="badge badge-info">Kasi Keamanan Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasi Penganekaragaman Konsumsi Pangan')
                                &emsp;<span class="badge badge-info">Kasi Penganekaragaman Konsumsi Pangan</span>
                            @endif
                            @if(Auth::user()->role_name=='Kasi Konsumsi Pangan')
                                &emsp;<span class="badge badge-info">Kasi Konsumsi Pangan</span>
                            @endif
                        </h1>
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
                        <div class="tab-content">
                            <form method="POST" action="{{ route('change-password') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-password"  name="current_password" value="{{ old('current_password') }}" placeholder="Inputkan Password Lama">
                                    <input type="checkbox" class="form-checkbox" id="password"> Show password
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control  form-password" 
                                    name="new_password" placeholder="Inputkan Password Baru">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control  form-password" name="new_confirm_password" placeholder="Konfirmasi Password Baru">
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection