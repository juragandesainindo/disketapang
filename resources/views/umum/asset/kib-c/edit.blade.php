@extends('layouts.adminKit')
@section('title','Edit KIB C ( Gedung & Bangunan )')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('kib-c.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('kib-c.update',$kib->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Mapping Asset &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <select name="mapping_asset_id" class="form-control js-example-basic-single"
                                            width="100%" required>
                                            <option value="{{ old('mapping_asset_id') ?? $kib->mappingAsset->id }}">{{
                                                old('mapping_asset_id') ?? $kib->mappingAsset->kode_brg .' - '.
                                                $kib->mappingAsset->nama_brg }}</option>
                                            @foreach ($mapping as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode_brg }} - {{ $item->nama_brg
                                                }}</option>
                                            @endforeach
                                        </select>
                                        @error('mapping_asset_id')
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
                                </div>
                                <div class="col-lg-6 col-md-12">
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
                                            class="js-example-basic-single form-control @error('penanggung_jawab') is-invalid @enderror"
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
                            <h5 class="card-title mb-0">Detail Gedung & Bangunan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Luas (M2)</label>
                                        <input name="luas" value="{{ old('luas') ?? $kib->luas }}"
                                            class="form-control @error('luas') is-invalid @enderror" type="number">
                                        @error('luas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Kontruksi</label>
                                        <input name="kontruksi" value="{{ old('kontruksi') ?? $kib->kontruksi }}"
                                            class="form-control @error('kontruksi') is-invalid @enderror" type="text">
                                        @error('kontruksi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tingkat (Jumlah Lantai)</label>
                                        <input name="tingkat" value="{{ old('tingkat') ?? $kib->tingkat }}"
                                            class="form-control @error('tingkat') is-invalid @enderror" type="number">
                                        @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>IMB</label>
                                        <input name="imb" value="{{ old('imb') ?? $kib->imb }}"
                                            class="form-control @error('imb') is-invalid @enderror" type="text">
                                        @error('imb')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Foto &nbsp;<span class="badge badge-danger">Max image 1 MB</span></label>
                                        <div class="fallback">
                                            <input type="file" name="foto" value="{{ old('foto') ?? $kib->foto }}"
                                                class="form-control @error('foto') is-invalid                                    
                                                                                                            @enderror">
                                            @if ($kib->foto === NULL)
                                            <span class="mt-20 text-primary">Image Null</span>
                                            @else
                                            <a href="{{ asset('umum/asset/kib-c/'.$kib->foto) }}"
                                                class="list-group-item mt-2" target="_blank">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-2">
                                                        <img src="{{ asset('umum/asset/kib-c/'.$kib->foto) }}"
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
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid                                
                                                                                                    @enderror"
                                            cols="10" rows="3">{{ old('alamat') ?? $kib->alamat }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="kategori" value="KibC">
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