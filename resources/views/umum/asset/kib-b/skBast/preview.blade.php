@extends('layouts.adminKit')
@section('title','SK Pemegang Pemakai Barang')

@section('content')
<style>
    .ul li {
        margin-bottom: -15px;
        list-style: none;
    }
</style>
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="{{ url('preview-sk-asset-umum-bast-pdf-kendaraan') }}" target="_blank" class="btn btn-info"><i
                        data-feather="download-cloud"></i>&nbsp;
                    Kendaraan
                </a>
                <a href="{{ url('preview-sk-asset-umum-bast-pdf-lainnya') }}" target="_blank" class="btn btn-info"><i
                        data-feather="download-cloud"></i>&nbsp;
                    Lainnya
                </a>
                <a href="{{ route('kib-b.index') }}" class="btn btn-secondary"><i
                        data-feather="arrow-left-circle"></i>&nbsp;
                    Back
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2 pb-2">
                    <div class="card-header text-center">
                        <img src="{{ asset('adminKit/img/kop-surat.png') }}" width="100%">
                    </div>
                    <div class="card-body">
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    <center>
                                        KEPUTUSAN KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU <br>
                                        SELAKU PENGGUNA/KUASA PENGGUNA BARANG MILIK DAERAH <br>
                                        NOMOR : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / 2022/
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    <center>
                                        TENTANG
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin: 20px 0px 30px;">
                            <tr>
                                <td>
                                    <center>
                                        PENUNJUKAN PEMEGANG/PEMAKAI BARANG MILIK DAERAH PADA <br>
                                        DINAS KETAHANAN PANGAN KOTA PEKANBARU <br>
                                        TAHUN 2022
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr>
                                <td>
                                    <center>
                                        KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addMenimbang"
                                        class="btn btn-primary btn-sm">Tambah Menimbang</a>
                                    @include('umum.asset.kib-b.skBast.modal.menimbang')
                                </td>
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            <tr>
                                <td width="150" valign="top">
                                    Menimbang
                                </td>
                                <td width="20" valign="top">:</td>
                                <td>
                                    @foreach ($skPreview->where('kategori','Menimbang') as $item)
                                    <ul class="ul" style="display: flex;padding-left:0px;">
                                        <li style="margin-right: 10px;">
                                            @switch($no++)
                                            @case(1)
                                            a.
                                            @break
                                            @case(2)
                                            b.
                                            @break
                                            @case(3)
                                            c.
                                            @break
                                            @case(4)
                                            d.
                                            @break
                                            @case(5)
                                            e.
                                            @break
                                            @case(6)
                                            f.
                                            @break
                                            @case(7)
                                            g.
                                            @break
                                            @case(8)
                                            h.
                                            @break
                                            @default
                                            i.
                                            @endswitch
                                        </li>
                                        <li>{{ $item->keterangan }}</li>
                                    </ul>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editMenimbang-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteMenimbang-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addMengingat"
                                        class="btn btn-primary btn-sm">Tambah
                                        Mengingat</a>
                                    @include('umum.asset.kib-b.skBast.modal.mengingat')
                                </td>
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            <tr>
                                <td width="150" valign="top">Mengingat</td>
                                <td width="20" valign="top">:</td>
                                <td>
                                    @foreach ($skPreview->where('kategori','Mengingat') as $item)
                                    <ul class="ul" style="display: flex;padding-left:0px;">
                                        <li style="margin-right: 10px;">
                                            {{ $no++ }}.
                                        </li>
                                        <li>{{ $item->keterangan }}</li>
                                    </ul>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editMengingat-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteMengingat-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin: 20px 0px;">
                            <tr>
                                <td width="150" valign="top"></td>
                                <td width="20" valign="top"></td>
                                <td colspan="2">
                                    <center>
                                        MEMUTUSKAN :
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td width="150" valign="top">Menetapkan</td>
                                <td width="20" valign="top">:</td>
                                <td width="20" valign="top"></td>
                                <td></td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addKesatu"
                                        class="btn btn-primary btn-sm">Tambah
                                        KESATU</a>
                                    @include('umum.asset.kib-b.skBast.modal.kesatu')
                                </td>
                            </tr>
                            <tr>
                                <td width="150" valign="top">KESATU</td>
                                <td width="20" valign="top">:</td>
                                <td colspan="2">
                                    @foreach ($skPreview->where('kategori','Kesatu') as $item)
                                    {{$item->keterangan}} <br>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editKesatu-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKesatu-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addKedua"
                                        class="btn btn-primary btn-sm">Tambah
                                        KEDUA</a>
                                    @include('umum.asset.kib-b.skBast.modal.kedua')
                                </td>
                            </tr>
                            <tr>
                                <td width="150" valign="top">KEDUA</td>
                                <td width="20" valign="top">:</td>
                                <td colspan="2">
                                    Pemegang/Pemakai Barang Milik Daerah sebagaimana Diktum KESATU wajib mematuhi
                                    ketentuan sebagai berikut:
                                </td>
                            </tr>
                            <tr>
                                <td width="150" valign="top"></td>
                                <td width="20" valign="top"></td>
                                <td>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($skPreview->where('kategori','Kedua') as $item)
                                    <ul class="ul" style="display: flex;padding-left:0px;">
                                        <li style="margin-right: 10px;">
                                            {{ $no++ }}.
                                        </li>
                                        <li>{{ $item->keterangan }}</li>
                                    </ul>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editKedua-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKedua-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addKetiga"
                                        class="btn btn-primary btn-sm">Tambah
                                        KETIGA</a>
                                    @include('umum.asset.kib-b.skBast.modal.ketiga')
                                </td>
                            </tr>
                            <tr>
                                <td width="150" valign="top">KETIGA</td>
                                <td width="20" valign="top">:</td>
                                <td colspan="2">
                                    @foreach ($skPreview->where('kategori','Ketiga') as $item)
                                    {{ $item->keterangan }} <br>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editKetiga-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKetiga-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addKeempat"
                                        class="btn btn-primary btn-sm">Tambah
                                        KEEMPAT</a>
                                    @include('umum.asset.kib-b.skBast.modal.keempat')
                                </td>
                            </tr>
                            <tr>
                                <td width="150" valign="top">KEEMPAT</td>
                                <td width="20" valign="top">:</td>
                                <td colspan="2">
                                    @foreach ($skPreview->where('kategori','Keempat') as $item)
                                    {{ $item->keterangan }} <br>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editKeempat-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKeempat-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr class="bg-light">
                                <td colspan="4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addKelima"
                                        class="btn btn-primary btn-sm">Tambah
                                        KELIMA</a>
                                    @include('umum.asset.kib-b.skBast.modal.kelima')
                                </td>
                            </tr>
                            <tr>
                                <td width="150" valign="top">KELIMA</td>
                                <td width="20" valign="top">:</td>
                                <td colspan="2">
                                    @foreach ($skPreview->where('kategori','Kelima') as $item)
                                    {{ $item->keterangan }} <br>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editKelima-{{ $item->id }}"
                                        class="text-info">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKelima-{{ $item->id }}"
                                        class="text-danger">Hapus</a>
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-bottom: 20px;">
                            <tr>
                                <td width="150" valign="top">KEENAM</td>
                                <td width="20" valign="top">:</td>
                                <td colspan="2">
                                    Keputusan ini berlaku pada tanggal ditetapkan.
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin: 30px 0 20px;">
                            <tr>
                                <td width="150" valign="top"></td>
                                <td width="20" valign="top"></td>
                                <td colspan="2">
                                    <center>
                                        Ditetapkan di Pekanbaru <br>
                                        pada tanggal : {{ \Carbon\Carbon::parse(now())->isoFormat('DD MMMM Y') }}
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td width="150" valign="top"></td>
                                <td width="20" valign="top"></td>
                                <td colspan="2">
                                    <center>
                                        KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU <br>
                                        SELAKU PENGGUNA BARANG MILIK DAERAH,
                                        <br><br><br><br>
                                    </center>
                                    <center>
                                        <b><u>{{ $namaKadis }}</u></b> <br>
                                        <b>{{ $nipKadis }}</b>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td valign="top">
                                    TEMBUSAN : disampaikan kepada Yth : <br>
                                    1. Walikota Pekanbaru sebagai laporan ; <br>
                                    2. Kepala Badan Pengelolaan Keuangan dan Aset Daerah Kota Pekanbaru; <br>
                                    3. Inspektur Kota Pekanbaru; <br>
                                    4. Pemegang/pemakai barang.
                                    <hr>
                                </td>
                            </tr>
                        </table>

                        <div class="page-break"></div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2 pb-2">
                    <div class="card-body">
                        <table width="80%" style="margin: 0px auto 30px;">
                            <tr>
                                <td width="30%"></td>
                                <td valign="top" width="15%">LAMPIRAN I</td>
                                <td>
                                    KEPUTUSAN KEPALA DINAS KETAHANAN PANGAN <br>
                                    NOMOR TAHUN {{ date('Y') }} <br>
                                    TANGGAL {{ \Carbon\Carbon::parse(now())->isoFormat('DD/MM/Y') }}<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <center>
                                        PEMEGANG/PEMAKAI KENDARAAN DINAS OPERASIONAL <br>
                                        DI LINGKUNGAN (NAMA SKPD) TAHUN {{ date('Y') }}
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered" width="100%" class="table-pemakai">
                                <tr class="text-center">
                                    <th class="th" rowspan="2">No</th>
                                    <th class="th" colspan="9">Identitas</th>
                                    <th class="th" colspan="3">Pemegang</th>
                                    <th class="th" rowspan="2">Ket</th>
                                </tr>
                                <tr>
                                    <th class="th">Jenis Kendaraan</th>
                                    <th class="th">Merk</th>
                                    <th class="th">No Polisi</th>
                                    <th class="th">Kode Barang</th>
                                    <th class="th">Register</th>
                                    <th class="th">No Rangka</th>
                                    <th class="th">No Mesin</th>
                                    <th class="th">No Bpkb</th>
                                    <th class="th">No Stnk</th>
                                    <th class="th">Nama Pemakai</th>
                                    <th class="th">Nip</th>
                                    <th class="th">Jabatan</th>
                                </tr>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($asset->where('penggunaan','Kendaraan') as $item)
                                @foreach ($item->assetUmumPegawai as $i)
                                <tr>
                                    <td class="td">{{ $no++ }}</td>
                                    <td class="td">{{ $i->jenis_barang }}</td>
                                    <td class="td">{{ $i->merk_type }}</td>
                                    <td class="td">{{ $i->nopol }}</td>
                                    <td class="td">{{ $item->mappingAsset->kode_brg }}</td>
                                    <td class="td"></td>
                                    <td class="td">{{ $i->no_rangka }}</td>
                                    <td class="td">{{ $i->no_mesin }}</td>
                                    <td class="td">{{ $i->bpkb }}</td>
                                    <td class="td">{{ $i->stnk }}</td>
                                    <td class="td">{{ $i->pegawai->nama }}</td>
                                    <td class="td">{{ $i->pegawai->nip }}</td>
                                    <td class="td">
                                        @foreach ($i->pegawai->pegawaiJabatan->sortByDesc('akhir_jabatan')->take(1) as
                                        $p)
                                        {{ $p->nama_jabatan }}
                                        @endforeach
                                    </td>
                                    <td class="td"></td>
                                </tr>
                                @endforeach
                                @endforeach
                            </table>
                        </div>

                        <table style="margin: 30px auto 30px; width:80%;">
                            <tr>
                                <td width="40%"></td>
                                <td>
                                    <center>
                                        KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU <br>
                                        SELAKU PENGGUNA BARANG MILIK DAERAH,
                                        <br><br><br><br><br><br>
                                        <b><u>{{ $namaKadis }}</u></b> <br>
                                        <b>{{ $nipKadis }}</b>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card flex-fill px-2 pb-2">
                    <div class="card-body">
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td valign="top" width="25%">
                                    <center>
                                        LAMPIRAN II
                                    </center>
                                </td>
                                <td>
                                    KEPUTUSAN KEPALA DINAS KETAHANAN PANGAN <br>
                                    NOMOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TAHUN {{ date('Y') }} <br>
                                    TENTANG
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    PEMEGANG/PEMAKAI LAPTOP OPERASIONAL
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered" width="100%" class="table-pemakai">
                            <tr>
                                <td class="th" rowspan="2">No</td>
                                <td class="th" rowspan="2">Jenis BMD</td>
                                <td class="th" rowspan="2">Merk</td>
                                <td class="th" rowspan="2">Kode Barang</td>
                                <td class="th" rowspan="2">Tahun Perolehan</td>
                                <td class="th" colspan="2">Pemegang Inventaris</td>
                                <td class="th" rowspan="2">Ket</td>
                            </tr>
                            <tr>
                                <td class="th">Nama</td>
                                <td class="th">Jabatan</td>
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($asset->where('penggunaan','Lainnya') as $item)
                            @foreach ($item->assetUmumPegawai as $i)
                            <tr>
                                <td class="td">
                                    <center>
                                        {{ $no++ }}
                                    </center>
                                </td>
                                <td class="td">
                                    <center>
                                        {{ $i->jenis_barang }}
                                    </center>
                                </td>
                                <td class="td">
                                    <center>
                                        {{ $i->merk_type }}
                                    </center>
                                </td>
                                <td class="td">
                                    <center>
                                        {{ $item->mappingAsset->kode_brg }}
                                    </center>
                                </td>
                                <td class="td">
                                    <center>
                                        {{ \Carbon\Carbon::parse($item->tgl_perolehan)->isoFormat('Y') }}
                                    </center>
                                </td>
                                <td class="td">{{ $i->pegawai->nama }}</td>
                                <td class="td">
                                    @foreach ($i->pegawai->pegawaiJabatan->sortByDesc('akhir_jabatan')->take(1) as
                                    $p)
                                    <center>
                                        {{ $p->nama_jabatan }}
                                    </center>
                                    @endforeach
                                </td>
                                <td class="td"></td>
                            </tr>
                            @endforeach
                            @endforeach
                        </table>

                        <table style="margin: 30px auto 30px; width:90%;">
                            <tr>
                                <td width="25%"></td>
                                <td>
                                    <center>
                                        KEPALA DINAS KETAHANAN PANGAN KOTA PEKANBARU <br>
                                        SELAKU PENGGUNA BARANG MILIK DAERAH,
                                        <br><br><br><br><br><br>
                                        <u>{{ $namaKadis }}</u> <br>
                                        {{ $nipKadis }}
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection