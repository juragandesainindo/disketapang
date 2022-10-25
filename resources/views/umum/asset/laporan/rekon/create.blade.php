@extends('layouts.adminKit')
@section('title','Create Laporan Rekon')

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

        <form action="{{ route('laporan-rekon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card flex-fill px-2 pb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <input type="hidden" name="no_surat" class="form-control" value="{{ $no_surat }}">
                                    <div class="form-group mb-3">
                                        <label>Nomor Surat</label><br>
                                        <strong>{{ $kode_surat }}</strong>
                                        <input type="hidden" name="kode_surat" class="form-control"
                                            value="{{ $kode_surat }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Perawatan Asset Tak Berwujud &nbsp;<sup class="text-danger">(wajib
                                                diisi)</sup></label>
                                        <select name="asset_umum_id" class="form-control js-example-basic-single"
                                            style="width: 100%;" required>
                                            <option value="">Pilih asset</option>
                                            @foreach ($assets as $item)
                                            <option value="{{ $item->id }}">( {{ $item->kategori }} ) {{
                                                $item->mappingAsset->kode_brg }} - {{
                                                $item->mappingAsset->nama_brg }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Pegawai &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
                                        <select name="pegawai_id" id="pegawai"
                                            class="form-control js-example-basic-single" style="width: 100%;" required>
                                            <option value="">Pilih pegawai</option>
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
                                                <select id="pangkat" class="form-control" disabled
                                                    style="width: 100%;"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Jabatan</label>
                                                <select id="jabatan" class="form-control" disabled
                                                    style="width: 100%;"></select>
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
            $('#pegawai').on('change', function(){
                var pegawaiId = this.value;
                $('#pangkat').html('');
                $.ajax({
                    url:'{{ route('getPangkat') }}?pegawai_id='+pegawaiId,
                    type: 'get',
                    success: function (res) {
                        $.each(res, function(key,value){
                            $('#pangkat').append('<option value=" '+ value.id +' ">' + value.nama_pangkat + '</option>')
                        });
                    }
                });

                $('#jabatan').html('');
                $.ajax({
                    url: '{{ route('getJabatan') }}?pegawai_id='+pegawaiId,
                    type: 'get',
                    success: function (res) {
                        $.each(res, function(key,value){
                            $('#jabatan').append('<option value=" '+ value.id +' ">' + value.nama_jabatan + '</option>')
                        });
                    }
                });
            });
        });
</script>
@endpush