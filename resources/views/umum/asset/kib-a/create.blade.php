@extends('layouts.adminKit')
@section('title','Create KIB A ( Tanah )')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('kib-a.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('kib-a.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                            <option value="">Pilih Mapping Asset</option>
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
                                        <input name="tgl_perolehan" value="{{ old('tgl_perolehan') }}"
                                            class="form-control @error('tgl_perolehan') is-invalid @enderror"
                                            type="date">
                                        @error('tgl_perolehan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Barang &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="nilai_brg" id="nilaiBrg" value="{{ old('nilai_brg') }}"
                                            class="form-control rupiah @error('nilai_brg') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nilai Perolehan (Total)</label>
                                        <input name="nilai_perolehan" value="{{ old('nilai_brg') }}" id="nilaiTotal"
                                            class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Nilai Surut</label>
                                        <input name="nilai_surut" id="nilaiSurut" value="{{ old('nilai_surut') }}"
                                            class="form-control rupiah @error('nilai_surut') is-invalid @enderror"
                                            type="text">
                                        @error('nilai_surut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Penggunaan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="penggunaan" value="{{ old('penggunaan') }}"
                                            class="form-control @error('penggunaan') is-invalid @enderror" type="text">
                                        @error('penggunaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Keterangan &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="keterangan" value="{{ old('keterangan') }}"
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
                                            <option value="{{ old('penanggung_jawab') ?? '' }}">{{
                                                old('penanggung_jawab') ?? 'Pilih penanggung jawab' }}
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
                            <h5 class="card-title mb-0">Detail Tanah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Sertifikat</label>
                                        <input name="sertifikat" value="{{ old('sertifikat') }}"
                                            class="form-control @error('sertifikat') is-invalid @enderror" type="text">
                                        @error('sertifikat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Jenis Sertifikat</label>
                                        <input name="jenis_sertifikat" value="{{ old('jenis_sertifikat') }}"
                                            class="form-control @error('jenis_sertifikat') is-invalid @enderror"
                                            type="text">
                                        @error('jenis_sertifikat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Luas</label>
                                        <input name="luas" value="{{ old('luas') }}"
                                            class="form-control @error('luas') is-invalid @enderror" type="number">
                                        @error('luas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" cols="30" rows="3"
                                            class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="fallback">
                                        <input type="hidden" name="kategori" value="KibA" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Foto &nbsp;<span class="badge badge-danger">Max image 1 MB</span></label>
                                        <div class="fallback">
                                            <input type="file" name="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid                                    
                                                                        @enderror">
                                            @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
                </div>
            </div>
        </form>

    </div>
</main>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $("#nilaiBrg, #nilaiSurut").keyup(function(){
            var nilaiBrg = $("#nilaiBrg").val();
            var nilaiSurut = $("#nilaiSurut").val();
            if (nilaiSurut !== '') {
                var nilaiTotal = parseInt(nilaiBrg) * 1 - parseInt(nilaiSurut);
            } else {
                var nilaiTotal = parseInt(nilaiBrg) * 1
            }
            $("#nilaiTotal").val(nilaiTotal);
        });
    });
        
</script>
@endpush