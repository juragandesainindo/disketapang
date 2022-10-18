@extends('layouts.master')
@section('title','Tambah Pegawai')
@section('content')

<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <a href="{{ route('pegawais.index') }}" class="btn btn-default m-t-5">Kembali</a>
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
                        <form method="POST" action="{{ route('pegawais.store') }}" class="md-float-material"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="nip" class="form-control @error('nip') is-invalid
                                        @enderror" value="{{ old('nip') }}" autofocus>
                                        @error('nip')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid
                                        @enderror" value="{{ old('nama') }}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>NPWP</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="npwp" class="form-control @error('npwp') is-invalid
                                        @enderror" value="{{ old('npwp') }}">
                                        @error('npwp')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select name="jk" class="form-control @error('jk') is-invalid
                                        @enderror">
                                            <option disabled selected>Pilih salah satu</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @error('jk')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid
                                        @enderror" value="{{ old('tempat_lahir') }}">
                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Tgl Lahir</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="date" name="tgl_lahir" class="@error('tgl_lahir') is-invalid
                                        @enderror" value="{{ old('tgl_lahir') }}">
                                        @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Agama</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select name="agama" class="form-control @error('agama') is-invalid
                                        @enderror">
                                            <option disabled selected>Pilih salah satu</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('agama')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Telepon</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid
                                        @enderror" value="{{ old('telepon') }}">
                                        @error('telepon')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="email" class="form-control @error('email') is-invalid
                                        @enderror" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid
                                        @enderror" rows="2">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>No BPJS</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="bpjs" class="form-control @error('bpjs') is-invalid
                                        @enderror" value="{{ old('bpjs') }}">
                                        @error('bpjs')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Foto Diri</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="file" name="foto" class="form-control @error('foto') is-invalid
                                        @enderror">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection