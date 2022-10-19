@extends('layouts.adminKit')
@section('title','Tambah Pegawai')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('pegawais.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('pegawais.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card flex-fill px-2 pb-2">
                                <div class="card-header">
                                    <strong>I. Identitas Kartu</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>NPWP</label>
                                                <input type="text" name="npwp" class="form-control @error('npwp') is-invalid
                                                                                                            @enderror"
                                                    value="{{ old('npwp') }}">
                                                @error('npwp')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>No BPJS</label>
                                                <input type="text" name="bpjs" class="form-control @error('bpjs') is-invalid
                                                                                                            @enderror"
                                                    value="{{ old('bpjs') }}">
                                                @error('bpjs')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="card flex-fill px-2 pb-2">
                                <div class="card-header">
                                    <strong>II. Identitas Pegawai</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>NIP</label>
                                                <input type="text" name="nip" class="form-control @error('nip') is-invalid
                                                                                    @enderror" value="{{ old('nip') }}"
                                                    autofocus>
                                                @error('nip')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control @error('nama') is-invalid
                                                                                    @enderror"
                                                    value="{{ old('nama') }}">
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Jenis Kelamin</label>
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
                                            <div class="form-group mb-3">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid
                                                                                    @enderror"
                                                    value="{{ old('tempat_lahir') }}">
                                                @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Tgl Lahir</label>
                                                <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid
                                                                                    @enderror"
                                                    value="{{ old('tgl_lahir') }}">
                                                @error('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Agama</label>
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
                                            <div class="form-group mb-3">
                                                <label>Telepon</label>
                                                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid
                                                                                    @enderror"
                                                    value="{{ old('telepon') }}">
                                                @error('telepon')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control @error('email') is-invalid
                                                                                    @enderror"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Alamat</label>
                                                <textarea name="alamat" class="form-control @error('alamat') is-invalid
                                                                                    @enderror"
                                                    rows="2">{{ old('alamat') }}</textarea>
                                                @error('alamat')
                                                <div class="invalid-feedback">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card flex-fill px-2 pb-2">
                                <div class="card-header">
                                    <strong>II. Image</strong>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Foto Diri &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="image" id="image" value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror" type="file"
                                            autofocus>
                                        <img id="preview-image" class="img-preview">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>KTP</label>
                                        <input name="image_s_kiri" id="imageKiri" value="{{ old('image_s_kiri') }}"
                                            class="form-control @error('image_s_kiri') is-invalid @enderror" type="file"
                                            autofocus>
                                        <img id="preview-image-kiri" class="img-preview">
                                        @error('image_s_kiri')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>KK</label>
                                        <input name="image_s_kanan" id="imageKanan" value="{{ old('image_s_kanan') }}"
                                            class="form-control @error('image_s_kanan') is-invalid @enderror"
                                            type="file" autofocus>
                                        <img id="preview-image-kanan" class="img-preview">
                                        @error('image_s_kanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Akte</label>
                                        <input name="image_belakang" id="imageBelakang"
                                            value="{{ old('image_belakang') }}"
                                            class="form-control @error('image_belakang') is-invalid @enderror"
                                            type="file" autofocus>
                                        <img id="preview-image-belakang" class="img-preview">
                                        @error('image_belakang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>BPJS</label>
                                        <input name="image_dalam" id="imageDalam" value="{{ old('image_dalam') }}"
                                            class="form-control @error('image_dalam') is-invalid @enderror" type="file"
                                            autofocus>
                                        <img id="preview-image-dalam" class="img-preview">
                                        @error('image_dalam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP</label>
                                        <input name="image_mesin" id="imageMesin" value="{{ old('image_mesin') }}"
                                            class="form-control @error('image_mesin') is-invalid @enderror" type="file"
                                            autofocus>
                                        <img id="preview-image-mesin" class="img-preview">
                                        @error('image_mesin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i data-feather="save"></i>&nbsp;
                        Simpan
                    </button>
                </div>
        </form>

    </div>
</main>
@endsection