@extends('layouts.assetUmum')
@section('title','Dropdown Dependent')

@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action=""
    method="GET">
    <div class="input-group">
        <select name="search" class="form-control bg-light border-0 small" required>
            <option value="">Cari penanggung jawab</option>
            <option value="Kadis">Kadis</option>
            <option value="Sekretariat">Sekretariat</option>
            <option value="Ketersediaan & Kerawanan">Ketersediaan & Kerawanan</option>
            <option value="Distribusi & Cadangan">Distribusi & Cadangan</option>
            <option value="Keamanan & Konsumsi">Keamanan & Konsumsi</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('searchMini')
<form class="form-inline mr-auto w-100 navbar-search" action="" method="GET">
    <div class="input-group">
        <select name="search" class="form-control bg-light border-0 small" required>
            <option value="">Cari penanggung jawab</option>
            <option value="Kadis">Kadis</option>
            <option value="Sekretariat">Sekretariat</option>
            <option value="Ketersediaan & Kerawanan">Ketersediaan & Kerawanan</option>
            <option value="Distribusi & Cadangan">Distribusi & Cadangan</option>
            <option value="Keamanan & Konsumsi">Keamanan & Konsumsi</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('content')
<div class="container-fluid">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between align-items-center">
                @yield('title')
                <div>
                    <a href="" class="btn btn-primary btn-sm px-3">
                        <i class="fas fa-plus-circle"></i>&nbsp;
                        Create
                    </a>
                </div>
            </h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Pegawai</label>
                <select name="pegawai_id" class="form-control" id="pegawai">
                    <option value="">Pilih pegawai</option>
                    @foreach ($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Pangkat</label>
                <select class="form-control disabled" id="pangkat"></select>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control disabled" id="jabatan"></select>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#pegawai').on('change',function() {
            var pegawaiId = this.value;
            $('#pangkat').html('');
            $.ajax({
                url:'{{ route('getPangkat') }}?pegawai_id='+pegawaiId,
                type: 'get',
                success: function (res) {
                    $.each(res, function (key,value){
                    // $('#pangkat').html('<option value="">Pilih pangkat</option>');
                        $('#pangkat').append('<option value=" ' + value.id + ' ">' + value.nama_pangkat + '</option>');
                    });
                }
            });
            $('#jabatan').html('');
            $.ajax({
                url:'{{ route('getJabatan') }}?pegawai_id='+pegawaiId,
                type:'get',
                success:function(res){
                    $.each(res, function (key,value){
                    // $('#jabatan').html('<option value="">Pilih jabatan</option>');
                        $('#jabatan').append('<option value=" '+ value.id +' ">'+ value.nama_jabatan +'</option>');
                    });
                }
            });
        });
    });
</script>
@endpush