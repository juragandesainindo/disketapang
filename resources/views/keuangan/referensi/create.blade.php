@extends('layouts.adminKit')
@section('title','Tambah Referensi Tufoksi')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('referensi-tufoksi.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2 pb-2">
                    <form action="{{ route('referensi-tufoksi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Nomor Peraturan</label>
                                <input type="text" name="nomor_peraturan"
                                    class="form-control @error('nomor_peraturan') is-invalid @enderror"
                                    value="{{ old('nomor_peraturan') }}" autofocus>
                                @error('nomor_peraturan')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Uraian</label>
                                <textarea name="uraian" class="form-control @error('uraian') is-invalid @enderror"
                                    cols="30" rows="5">{{ old('uraian') }}</textarea>
                                @error('uraian')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>File</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                    value="{{ old('file') }}">
                                @error('file')
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