@extends('layouts.adminKit')
@section('title','Edit KIB B ( Peralatan dan Mesin )')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('kib-b.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('kib-b.update',$kib->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <option value="{{ $kib->mappingAsset->id }}">{{ $kib->mappingAsset->kode_brg
                                                }} - {{ $kib->mappingAsset->nama_brg }}</option>
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
                            <h5 class="card-title mb-0">Detail Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Merk/Type</label>
                                        <input name="merk_type" value="{{ old('merk_type') ?? $kib->merk_type }}"
                                            class="form-control @error('merk_type') is-invalid @enderror" type="text">
                                        @error('merk_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nomor Polisi</label>
                                        <input name="nopol" value="{{ old('nopol') ?? $kib->nopol }}"
                                            class="form-control @error('nopol') is-invalid @enderror" type="text">
                                        @error('nopol')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Ukuran</label>
                                        <input name="ukuran" value="{{ old('ukuran') ?? $kib->ukuran }}"
                                            class="form-control @error('ukuran') is-invalid @enderror" type="text">
                                        @error('ukuran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Bahan Warna</label>
                                        <input name="bahan_warna" value="{{ old('bahan_warna') ?? $kib->bahan_warna }}"
                                            class="form-control @error('bahan_warna') is-invalid @enderror" type="text">
                                        @error('bahan_warna')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Spesifikasi</label>
                                        <input name="spesifikasi" value="{{ old('spesifikasi') ?? $kib->spesifikasi }}"
                                            class="form-control @error('spesifikasi') is-invalid @enderror" type="text">
                                        @error('spesifikasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nomor Pabrik</label>
                                        <input name="no_pabrik" value="{{ old('no_pabrik') ?? $kib->no_pabrik }}"
                                            class="form-control @error('no_pabrik') is-invalid @enderror" type="text">
                                        @error('no_pabrik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Nomor Rangka</label>
                                        <input name="no_rangka" value="{{ old('no_rangka') ?? $kib->no_rangka }}"
                                            class="form-control @error('no_rangka') is-invalid @enderror" type="text">
                                        @error('no_rangka')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nomor Mesin</label>
                                        <input name="no_mesin" value="{{ old('no_mesin') ?? $kib->no_mesin }}"
                                            class="form-control @error('no_mesin') is-invalid @enderror" type="text">
                                        @error('no_mesin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>BPKB</label>
                                        <input name="bpkb" value="{{ old('bpkb') ?? $kib->bpkb }}"
                                            class="form-control @error('bpkb') is-invalid @enderror" type="text">
                                        @error('bpkb')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>STNK</label>
                                        <input name="stnk" value="{{ old('stnk') ?? $kib->stnk }}"
                                            class="form-control @error('stnk') is-invalid @enderror" type="text">
                                        @error('stnk')
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
                                        <input type="hidden" name="kategori" value="KibB">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Foto &nbsp;<span class="badge badge-danger">Max image 1 MB</span></label>
                                        <div class="fallback">
                                            <input type="file" name="foto" value="{{ old('foto') ?? $kib->foto }}"
                                                class="form-control @error('foto') is-invalid                                    
                                                                        @enderror">
                                            @if ($kib->foto === NULL)
                                            <span class="mt-20 text-primary">Image Null</span>
                                            @else
                                            <a href="{{ asset('umum/asset/kib-b/'.$kib->foto) }}"
                                                class="list-group-item mt-2" target="_blank">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-2">
                                                        <img src="{{ asset('umum/asset/kib-b/'.$kib->foto) }}"
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

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2">
                    <div class="card-header">
                        <h5 class="card-title">Detail Pemakai</h5>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <form action="{{ route('asset-umum-pegawai.update',$kib->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Tambah Pemakai</label>
                                        <select
                                            class="js-example-basic-single form-control @error('pegawai_id') is-invalid @enderror"
                                            name="pegawai_id[]" multiple style="width: 100%;" required>
                                            <option value="">Pilih pegawai</option>
                                            @foreach ($pegawai as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('pegawai_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-lg-6 col-md-12">
                                @foreach ($kib->assetUmumPegawai as $item)
                                <div class="d-flex">
                                    <form action="{{ route('asset-umum-pegawai',$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div>
                                            <span class="badge bg-primary">{{ $item->pegawai->nama }}</span>
                                            <button type="submit" class="badge bg-danger border-0">X</button>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection