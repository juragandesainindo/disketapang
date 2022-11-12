@extends('layouts.master')
@section('title','Tambah User')
@section('content')
<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <a href="{{ route('data-user.index') }}" class="btn btn-primary">
                            <i data-feather="folder-plus"></i>&nbsp;
                            Kembali
                        </a>
                        <h1 class="text-primary">@yield('title')</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-body">
                        <form action="{{ route('data-user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Nama</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid
                                                                                                            @enderror"
                                                    value="{{ old('name') }}" autofocus>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>HP</label>
                                                <input type="text" name="telepon" class="form-control hp @error('telepon') is-invalid
                                                                                                            @enderror"
                                                    value="{{ old('telepon') }}" autofocus>
                                                @error('telepon')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Role Name</label>
                                                <select name="role_name" class="form-control js-example-basic-single @error('role_name') is-invalid                                            
                                                                @enderror" width="100%">
                                                    <option value="">Pilih role</option>
                                                    <optgroup label="Pembina">
                                                        <option value="Kadis">Kadis</option>
                                                    </optgroup>
                                                    <optgroup label="Administrator">
                                                        <option value="Super Admin">Super Admin</option>
                                                    </optgroup>
                                                    <optgroup label="Koordinator">
                                                        <option value="Kabid Ketersediaan dan Kerawanan Pangan">
                                                            Kabid
                                                            Ketersediaan dan Kerawanan Pangan</option>
                                                        <option value="Kabid Distribusi dan Cadangan Pangan">
                                                            Kabid Distribusi
                                                            dan Cadangan Pangan</option>
                                                        <option value="Kabid Konsumsi dan Keamanan Pangan">Kabid
                                                            Konsumsi dan
                                                            Keamanan Pangan</option>
                                                    </optgroup>
                                                    <optgroup label="Sekretariat">
                                                        <option value="Kasub Bagian Umum">Kasub Bagian Umum
                                                        </option>
                                                        <option value="Kasub Bagian Keuangan">Kasub Bagian
                                                            Keuangan</option>
                                                    </optgroup>
                                                    <optgroup label="Bidang Ketersediaan dan Kerawanan Pangan">
                                                        <option value="Kasi Ketersediaan Pangan">Kasi
                                                            Ketersediaan Pangan
                                                        </option>
                                                        <option value="Kasi Sumber Daya Pangan">Kasi Sumber Daya
                                                            Pangan</option>
                                                        <option value="Kasi Kerawanan Pangan">Kasi Kerawanan
                                                            Pangan</option>
                                                    </optgroup>
                                                    <optgroup label="Bidang Distribusi dan Cadangan Pangan">
                                                        <option value="Kasi Distribusi Pangan">Kasi Distribusi
                                                            Pangan
                                                        </option>
                                                        <option value="Kasi Harga Pangan">Kasi Harga Pangan
                                                        </option>
                                                        <option value="Kasi Cadangan Pangan">Kasi Cadangan
                                                            Pangan</option>
                                                    </optgroup>
                                                    <optgroup label="Bidang Konsumsi dan Keamanan Pangan">
                                                        <option value="Kasi Keamanan Pangan">Kasi Keamanan
                                                            Pangan
                                                        </option>
                                                        <option value="Kasi Penganekaragaman Konsumsi Pangan">
                                                            Kasi
                                                            Penganekaragaman Konsumsi Pangan</option>
                                                        <option value="Kasi Konsumsi Pangan">Kasi Konsumsi
                                                            Pangan</option>
                                                    </optgroup>
                                                </select>
                                                @error('role_name')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-control @error('status') is-invalid                                            
                                                                                                    @enderror">
                                                    <option value="">Pilih status</option>
                                                    <option value="0">Deactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                                @error('status')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid                                                                                                                        @enderror"
                                                    value="{{ old('email') }}" autofocus>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Password</label>
                                                <input type="password" name="password"
                                                    class="form-control form-password @error('password') is-invalid                                                                                                                        @enderror"
                                                    value="{{ old('password') }}" autocomplete="new-password">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation"
                                                    class="form-control form-password @error('password_confirmation') is-invalid                                                                                                                        @enderror"
                                                    value="{{ old('password_confirmation') }}"
                                                    autocomplete="new-password">
                                                @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input form-checkbox" type="checkbox"
                                                        id="flexCheckIndeterminate">
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Show password
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i data-feather="save"></i>&nbsp;
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function(){       
        $('.form-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.form-password').attr('type','text');
            }else{
                $('.form-password').attr('type','password');
            }
        });
    });
</script>
@endpush