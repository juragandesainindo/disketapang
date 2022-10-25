@extends('layouts.adminKit')
@section('title','Tambah Evaluasi Renstra')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('evaluasi-renstra.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2 pb-2">
                    <form action="{{ route('evaluasi-renstra.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Indikator</label>
                                <select name="indikator" class="form-control js-example-basic-single @error('indikator') is-invalid                                    
                                @enderror" width="100%">
                                    <option value="">Pilih indikator</option>
                                    <option value="Nilai Indeks Kepuasan Masyarakat (IKM)">Nilai Indeks Kepuasan
                                        Masyarakat (IKM)</option>
                                    <option value="Nilai Akuntabilitas Kinerja Instansi Pemerintahan (AKIP)">Nilai
                                        Akuntabilitas Kinerja Instansi Pemerintahan (AKIP)</option>
                                    <option value="Skor Pola Pangan Harapan (PPH) Ketersediaan">Skor Pola Pangan Harapan
                                        (PPH) Ketersediaan</option>
                                    <option value="Skor Pola Pangan Harapan (PPH) Konsumsi">Skor Pola Pangan Harapan
                                        (PPH) Konsumsi</option>
                                    <option value="Tingkat Capaian Konsumsi Energi (kkal/ kapita)">Tingkat Capaian
                                        Konsumsi Energi (kkal/ kapita)</option>
                                    <option value="Tingkat Capaian Konsumsi Protein (gram/ kapita)">Tingkat Capaian
                                        Konsumsi Protein (gram/ kapita)</option>
                                    <option value="Batas Maksimum Residu (BMR)">Batas Maksimum Residu (BMR)</option>
                                    <option value="Indeks Ketahanan Pangan">Indeks Ketahanan Pangan</option>
                                </select>
                                @error('indikator')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Target</label>
                                <input type="text" name="target"
                                    class="form-control @error('target') is-invalid @enderror"
                                    value="{{ old('target') }}">
                                @error('target')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Realisasi</label>
                                <input type="text" name="realisasi"
                                    class="form-control @error('realisasi') is-invalid @enderror"
                                    value="{{ old('realisasi') }}">
                                @error('realisasi')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Rasio</label>
                                <input type="text" name="rasio"
                                    class="form-control @error('rasio') is-invalid @enderror"
                                    value="{{ old('rasio') }}">
                                @error('rasio')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Tahun</label>
                                @php
                                $year = date('Y');
                                $min = $year - 60;
                                $max = $year;
                                @endphp
                                <select name="tahun" class="form-control js-example-basic-single @error('tahun') is-invalid                                    
                                @enderror" width="100%">
                                    <option value="">Pilih tahun</option>
                                    @for ($i = $max; $i >= $min; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('tahun')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i data-feather="save"></i>&nbsp;
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection