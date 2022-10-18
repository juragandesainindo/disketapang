@extends('layouts.assetUmum')
@section('title','Laporan Rekon')

@section('content')
<style>
    .card-body h1,
    .card-body h2,
    .card-body p {
        font-size: 16px;
        color: #000;
    }
</style>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between align-items-center">
                @yield('title') ({{ $laporan->assetUmum->id_brg }} - {{ $laporan->assetUmum->nama_brg }})
                <div>
                    <a href="{{ route('laporan-rekon-export-word',$laporan->id) }}" class="btn btn-primary btn-sm px-3">
                        <i class="fas fa-file-word"></i>
                        Export
                    </a>
                    <a href="{{ route('laporan-rekon.index') }}" class="btn btn-secondary btn-sm px-3">
                        <i class="fas fa-backspace"></i>&nbsp;
                        Back
                    </a>
                </div>
            </h6>
        </div>

        <div class="card-body">
            <h1 class="text-center font-weight-bold">SURAT PERNYAATAN</h1>
            <h2 class="text-center font-weight-bold">Nomor : {{ $laporan->kode_surat }}</h2>

            <p>
                Pada hari ini {{ $hari }} tanggal {{ $tgl }} bulan {{ $bulan }} tahun {{ $tahun }} bertempat di ....,
                yang bertanda tangan dibawah ini: <br>
            <table>
                <tr>
                    <td width="35%">Nama</td>
                    <td>:</td>&nbsp;
                    <td>{{ $laporan->pegawai->nama }}</td>
                </tr>
            </table>
            Nama : {{ $laporan->pegawai->nama }} <br>
            NIP : {{ $laporan->pegawai->nip }} <br>
            Pangkat/Gol : {{ $pangkat }} <br>
            Jabatan : {{ $jabatan }} <br><br>

            Selaku ...., pada ... menyatakan bahwa, telah dilakukan pencatatan atau pembukuan sebagai Barang Milik
            Daerah yang diperoleh dari pengadaan APBD dengan rincian
            sebagai berikut: <br><br>

            Kode Sub Kegiatan : {{ $laporan->assetUmum->id_brg }} <br>
            Nama Sub Kegiatan : {{ $laporan->assetUmum->nama_brg }} <br>
            Kode Belanja : {{ $laporan->assetUmum->kode_brg }} <br>
            Uraian Belanja : {{ $laporan->assetUmum->keterangan }} <br>
            Bentuk Kontrak : ... <br>
            a. Nama Penyedia : ... <br>
            b. Nomor : ... <br>
            c. Tanggal : {{ \Carbon\Carbon::parse(now())->isoFormat('DD MMMM Y') }} <br>
            Tanggal Perolehan : {{ $laporan->assetUmum->tgl_perolehan }} <br>
            Nilai (Rp.) : {{ $laporan->assetUmum->nilai_brg }} <br><br>

            Demikian surat pernyataan ini dibuat untuk dipergunakan seperlunya, apabila terdapat kekeliruan akan
            dilakukan perbaikan
            sesuai ketentuan.
            </p>

            <br>

        </div>
    </div>

</div>
@endsection