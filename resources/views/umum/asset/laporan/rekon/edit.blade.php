@extends('layouts.adminKit')
@section('title','Edit Laporan Rekon')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <a href="{{ route('laporan-rekon.index') }}" class="btn btn-secondary"><i
                    data-feather="arrow-left-circle"></i>&nbsp;
                Back
            </a>
        </div>

        <form action="{{ route('laporan-rekon.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Nomor Surat</label><br>
                                        <strong>{{ $laporan->kode_surat }}</strong>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Asset &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <select name="asset_umum_id" class="form-control js-example-basic-single"
                                            style="width: 100%;" required>
                                            <option value="{{ $laporan->assetUmum->id }}">( {{
                                                $laporan->assetUmum->kategori }} ) {{
                                                $laporan->assetUmum->mappingAsset->kode_brg }} - {{
                                                $laporan->assetUmum->mappingAsset->nama_brg }}</option>
                                            @foreach ($assets as $item)
                                            <option value="{{ $item->id }}">( {{ $item->kategori }} ) {{
                                                $item->mappingAsset->kode_brg }} - {{
                                                $item->mappingAsset->nama_brg }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nama Penyedia</label>
                                        <input type="text" name="nama_penyedia" class="form-control"
                                            value="{{ old('nama_penyedia') ?? $laporan->nama_penyedia }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Kode Belanja</label>
                                        <input type="text" name="kode_belanja" class="form-control"
                                            value="{{ old('kode_belanja') ?? $laporan->kode_belanja }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Uraian Belanja</label>
                                        <input type="text" name="uraian_belanja" class="form-control"
                                            value="{{ old('uraian_belanja') ?? $laporan->uraian_belanja }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Kasubag Umum &nbsp;<sup class="text-danger">(wajib
                                                        diisi)</sup></label>
                                                <select name="kasubag_nip" id="kasubag-nip"
                                                    class="form-control js-example-basic-single" style="width: 100%;"
                                                    required>
                                                    <option value="{{ $laporan->kasubag_nip }}">{{ $laporan->kasubag_nip
                                                        }} / {{ $laporan->kasubag_nama }}</option>
                                                    @foreach ($pegawais as $pegawai)
                                                    <option value="{{ $pegawai->nip }}">{{ $pegawai->nip }} / {{
                                                        $pegawai->nama }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                                @error('nilai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-none">
                                            <div class="form-group mb-2">
                                                <label></label>
                                                <select id="kasubag-nama" name="kasubag_nama" class="form-control"
                                                    style="width: 100%;" required hidden>
                                                    <option value="{{ $laporan->kasubag_nama }}">{{
                                                        $laporan->kasubag_nama }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>Pengurus Barang &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <select name="pegawai_id" id="pengurus-barang"
                                            class="form-control js-example-basic-single" style="width: 100%;" required>
                                            <option value="{{ $laporan->pegawai->id }}">{{ $laporan->pegawai->nip }} -
                                                {{ $pegawai->nama }}
                                            </option>
                                            @foreach ($pegawais as $pegawai)
                                            <option value="{{ $pegawai->id }}">{{ $pegawai->nip }} - {{ $pegawai->nama
                                                }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('nilai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Pangkat</label>
                                                <select id="pengurus-pangkat" class="form-control" disabled
                                                    style="width: 100%;">
                                                    @foreach ($laporan->pegawai->pegawaiPangkat as $item)
                                                    <option>{{ $item->nama_pangkat
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Jabatan</label>
                                                <select id="pengurus-jabatan" class="form-control" disabled
                                                    style="width: 100%;">
                                                    @foreach ($laporan->pegawai->pegawaiJabatan as $item)
                                                    <option>{{ $item->nama_jabatan
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-header">
                            Pelaksana SKPD
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Nama Pelaksana SKPD</label>
                                        <input type="text" name="nama_skpd"
                                            value="{{ old('nama_skpd') ?? $laporan->nama_skpd }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label>NIP</label>
                                        <input type="text" name="nip_skpd"
                                            value="{{ old('nip_skpd') ?? $laporan->nip_skpd }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Pangkat</label>
                                        <input type="text" name="pangkat_skpd"
                                            value="{{ old('pangkat_skpd') ?? $laporan->pangkat_skpd }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan_skpd"
                                            value="{{ old('jabatan_skpd') ?? $laporan->jabatan_skpd }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-header">
                            Kepala SKPD
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Nama Kepala SKPD</label>
                                        <input type="text" name="nama_kepala_skpd"
                                            value="{{ old('nama_kepala_skpd') ?? $laporan->nama_kepala_skpd }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label>NIP</label>
                                        <input type="text" name="nip_kepala_skpd"
                                            value="{{ old('nip_kepala_skpd') ?? $laporan->nip_kepala_skpd }}"
                                            class="form-control">
                                    </div>
                                </div>
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
        </form>
    </div>
</main>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('#kasubag-nip').on('change', function() {
        var pegawaiNip = this.value;
        $('#kasubag-nama').html('');
        $.ajax({
        url:'{{ route('getPegawai') }}?nip='+pegawaiNip,
        type: 'get',
        success: function (res) {
        $.each(res, function(key,value){
        $('#kasubag-nama').append('<option value=" '+ value.nama +' ">' + value.nama + '</option>')
        });
        }
        });
        });


        $('#pengurus-barang').on('change', function(){
            var pegawaiId = this.value;
            $('#pengurus-pangkat').html('');
            $.ajax({
                url:'{{ route('getPangkat') }}?pegawai_id='+pegawaiId,
                type: 'get',
                success: function (res) {
                    $.each(res, function(key,value){
                        $('#pengurus-pangkat').append('<option value=" '+ value.nama_pangkat +' ">' + value.nama_pangkat + '</option>')
                    });
                }
            });
        
            $('#pengurus-jabatan').html('');
            $.ajax({
                url: '{{ route('getJabatan') }}?pegawai_id='+pegawaiId,
                type: 'get',
                success: function (res) {
                    $.each(res, function(key,value){
                        $('#pengurus-jabatan').append('<option value=" '+ value.nama_jabatan +' ">' + value.nama_jabatan + '</option>')
                    });
                }
            });
        });
    });
</script>
@endpush