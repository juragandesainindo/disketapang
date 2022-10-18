@extends('layouts.adminKit')
@section('title','Create Perawatan Asset Kib A')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('perawatan-asset-kib-a.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('perawatan-asset-kib-a.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Perawatan Kib A &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <select
                                            class="form-control form-select @error('asset_umum_id') is-invalid @enderror"
                                            name="asset_umum_id" style="width: 100%; height: 38px;">
                                            <option value="{{ old('asset_umum_id') ?? '' }}">{{
                                                old('asset_umum_id') ?? 'Pilih Perawatan Kib A' }}
                                            </option>
                                            @foreach ($kibs as $item)
                                            <option value="{{ $item->id }}">{{ $item->id_brg }} - {{ $item->nama_brg }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('asset_umum_id')
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
                            <h5 class="card-title mb-0">Detail Perawatan Asset Kib A</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Tgl Pemeliharaan &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <input name="tgl" value="{{ old('tgl') }}"
                                            class="form-control @error('tgl') is-invalid @enderror" type="date">
                                        @error('tgl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Uraian &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="uraian" value="{{ old('uraian') }}"
                                            class="form-control @error('uraian') is-invalid @enderror" type="text">
                                        @error('uraian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Nilai (Rp) &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <input name="nilai" value="{{ old('nilai') }}"
                                            class="form-control rupiah @error('nilai') is-invalid @enderror"
                                            type="text">
                                        @error('nilai')
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
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Foto &nbsp;<sup class="text-danger">(Max upload 1 Mb)</sup></label>
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
                                        <i class="fas fa-save"></i>&nbsp;
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