@extends('layouts.master')
@section('title','TAMBAH Kelompok Tani Yang Sudah Memiliki Sertifikasi Prima 3')
@section('content')
<div class="main">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        <a href="{{ route('pengusul-sertifikasi.index') }}" class="btn btn-primary">
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
                        <form action="{{ route('pengusul-sertifikasi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kelompok Tani</label>
                                <select name="dkt_kelompok_id" class="form-control js-example-basic-single" required>
                                    <option value="">Pilih kelompok tani</option>
                                    @foreach($dkt as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_dkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection