@extends('layouts.adminKit')
@section('title','Edit KIB D ( Jalan, Irigasi dan Jaringan )')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('kib-d.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('kib-d.update',$kib->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>ID Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="id_brg" value="{{ old('id_brg') ?? $kib->id_brg }}"
                                            class="form-control @error('id_brg') is-invalid @enderror" type="number"
                                            autofocus>
                                        @error('id_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Kode Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="kode_brg" value="{{ old('kode_brg') ?? $kib->kode_brg }}"
                                            class="form-control kode @error('kode_brg') is-invalid @enderror"
                                            type="text">
                                        @error('kode_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nama Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="nama_brg" value="{{ old('nama_brg') ?? $kib->nama_brg }}"
                                            class="form-control @error('nama_brg') is-invalid @enderror" type="text">
                                        @error('nama_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tgl Perolehan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="tgl_perolehan"
                                            value="{{ old('tgl_perolehan') ?? $kib->tgl_perolehan }}"
                                            class="form-control @error('tgl_perolehan') is-invalid @enderror"
                                            type="date">
                                        @error('tgl_perolehan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="nilai_brg" value="{{ old('nilai_brg') ?? $kib->nilai_brg }}"
                                            class="form-control rupiah @error('nilai_brg') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Nilai Perolehan (Total)</label>
                                        <input name="nilai_perolehan"
                                            value="{{ old('nilai_perolehan') ?? $kib->nilai_perolehan }}"
                                            class="form-control rupiah @error('nilai_perolehan') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_perolehan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Surut</label>
                                        <input name="nilai_surut" value="{{ old('nilai_surut') ?? $kib->nilai_surut }}"
                                            class="form-control rupiah @error('nilai_surut') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_surut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penggunaan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="penggunaan" value="{{ old('penggunaan') ?? $kib->penggunaan }}"
                                            class="form-control @error('penggunaan') is-invalid @enderror" type="text">
                                        @error('penggunaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Keterangan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="keterangan" value="{{ old('keterangan') ?? $kib->keterangan }}"
                                            class="form-control @error('keterangan') is-invalid @enderror" type="text">
                                        @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penanggung Jawab &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <select
                                            class="custom-select2 form-control @error('penanggung_jawab') is-invalid @enderror"
                                            name="penanggung_jawab" style="width: 100%; height: 38px;">
                                            <option value="{{ old('penanggung_jawab') ?? $kib->penanggung_jawab }}">{{
                                                old('penanggung_jawab') ?? $kib->penanggung_jawab }}
                                            </option>
                                            <option value="Kadis">Kadis</option>
                                            <option value="Sekretariat">Sekretariat</option>
                                            <option value="Ketersediaan & Kerawanan">Ketersediaan & Kerawanan</option>
                                            <option value="Distribusi & Cadangan">Distribusi & Cadangan</option>
                                            <option value="Keamanan & Konsumsi">Keamanan & Konsumsi</option>
                                        </select>
                                        @error('penanggung_jawab')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Detail Jalan, Irigasi & Jaringan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Luas (M2)</label>
                                        <input name="luas" value="{{ old('luas') ?? $kib->luas }}"
                                            class="form-control @error('luas') is-invalid @enderror" type="text">
                                        @error('luas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Panjang (M)</label>
                                        <input name="panjang" value="{{ old('panjang') ?? $kib->panjang }}"
                                            class="form-control @error('panjang') is-invalid @enderror" type="text">
                                        @error('panjang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Lebar (M)</label>
                                        <input name="lebar" value="{{ old('lebar') ?? $kib->lebar }}"
                                            class="form-control @error('lebar') is-invalid @enderror" type="text">
                                        @error('lebar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid                                
                            @enderror" cols="10" rows="3">{{ old('alamat') ?? $kib->alamat }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Koordinat Latitude</label>
                                        <input name="latitude" value="{{ old('latitude') ?? $kib->latitude }}"
                                            class="form-control @error('latitude') is-invalid @enderror" type="number">
                                        @error('latitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Koordinat Longitude</label>
                                        <input name="longitude" value="{{ old('longitude') ?? $kib->longitude }}"
                                            class="form-control @error('longitude') is-invalid @enderror" type="number">
                                        @error('longitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Masa Manfaat</label>
                                        <input name="masa_manfaat"
                                            value="{{ old('masa_manfaat') ?? $kib->masa_manfaat }}"
                                            class="form-control @error('masa_manfaat') is-invalid @enderror"
                                            type="number">
                                        @error('masa_manfaat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Sisa Manfaat</label>
                                        <input name="sisa_manfaat"
                                            value="{{ old('sisa_manfaat') ?? $kib->sisa_manfaat }}"
                                            class="form-control @error('sisa_manfaat') is-invalid @enderror"
                                            type="number">
                                        @error('sisa_manfaat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="kategori" value="KibD">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Foto &nbsp;<sup class="text-danger">(Max 1 Mb)</sup></label>
                                        <div class="fallback">
                                            <input type="file" name="foto" value="{{ old('foto') ?? $kib->foto }}"
                                                class="form-control @error('foto') is-invalid                                    
                                                                    @enderror">
                                            @if ($kib->foto === NULL)
                                            <span class="mt-20 text-primary">Image Null</span>
                                            @else
                                            <a href="{{ asset('umum/asset/kib-d/'.$kib->foto) }}"
                                                class="list-group-item mt-2" target="_blank">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-2">
                                                        <img src="{{ asset('umum/asset/kib-d/'.$kib->foto) }}"
                                                            class="avatar img-fluid rounded-circle"
                                                            alt="William Harris">
                                                    </div>
                                                    <div class="col-10 ps-2">
                                                        <div class="text-danger">{{ $kib->foto }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endif
                                            @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i data-feather="save"></i>&nbsp;
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</main>
@endsection