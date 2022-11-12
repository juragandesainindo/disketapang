@extends('layouts.adminKit')
@section('title','Berita Acara Serah Terima Barang')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">@yield('title')</h1>
            <div>
                <a href="{{ route('asset-umum-bast-pdf',$asset->id) }}" target="_blank" class="btn btn-info"><i
                        data-feather="download-cloud"></i>&nbsp;
                    PDF
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
                        <br><br>
                        <strong>
                            BERITA ACARA SERAH TERIMA <br>
                            PENGGUNAAN/PEMAKAIAN BARANG MILIK DAERAH
                        </strong>
                    </div>
                    <div class="card-body">
                        Pada hari ini, Kamis tanggal {{ \Carbon\Carbon::parse(now())->isoFormat('DD') }}
                        bulan {{ \Carbon\Carbon::parse(now())->isoFormat('MMMM') }} tahun {{ date('Y') }},
                        bertempat di Dinas Ketahanan
                        Pangan yang beralamat di Jl. Abdul Rahman Hamid Kel. Tenayan Raya Kota Pekanbaru.
                        <br><br>
                        kami yang bertanda tangan di bawah ini:
                        <table>
                            <tr>
                                <th width="25">I.</th>
                                <th width="150">Nama</th>

                                <th>: {{ $namaKadis }}</th>
                            </tr>
                            <tr>
                                <th width="25"></th>
                                <th width="150">NIP</th>
                                <th>: {{ $nipKadis }}</th>
                            </tr>
                            <tr>
                                <th width="25"></th>
                                <th width="150">Jabatan</th>
                                <th>: {{ $jabatanKadis }}</th>
                            </tr>
                        </table>
                        <br>
                        Bertindak menurut Jabaran Kepala Dinas Ketahanan Pangan Kota Pekanbaru selaku pengguna Barang
                        Milik Daerah, yang
                        selanjutnya disebut PIHAK PERTAMA.
                        <br>
                        <table>
                            @foreach ($asset->assetUmumPegawai as $item)
                            <tr>
                                <th width="25">II.</th>
                                <th width="150">Nama</th>
                                <th>: {{ $item->pegawai->nama }}</th>
                            </tr>
                            <tr>
                                <th width="25"></th>
                                <th width="150">NIP</th>
                                <th>: {{ $item->pegawai->nip }}</th>
                            </tr>
                            <tr>
                                <th width="25"></th>
                                <th width="150">Jabatan</th>
                                <th>:
                                    @foreach ($item->pegawai->pegawaiJabatan->take(1) as $i)
                                    {{ $i->nama_jabatan }}
                                    @endforeach
                                </th>
                            </tr>
                            @endforeach
                        </table>
                        <br>
                        <p>
                            dalam hal ini bertindak untuk dan atas nama diri sendiri selaku pemakai Barang Milik Daerah
                            pada
                            Dinas Ketahanan Pangan
                            Kota Pekanbaru, selanjutnya disebut PIHAK KEDUA.
                        </p>
                        <br>
                        <div class="d-flex justify-content-between align-items-center mb-2 bg-light px-2">
                            Tambah Keterangan I
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addKeteranganBA1"
                                class="btn btn-primary">Tambah
                                Keterangan</a>
                        </div>
                        <p>
                            @foreach ($asset->assetUmumBast as $key => $bast)
                            @if ($bast->kategori == 'kategori1')
                            {{ $bast->keterangan }}
                        <div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editKeteranganBA-{{ $bast->id }}"
                                class="text-info">Edit</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKeteranganBA-{{ $bast->id }}"
                                class="text-danger">Delete</a>
                        </div>
                        @endif
                        @endforeach
                        </p>
                        <table>
                            <tr>
                                <td width="30">I.</td>
                                <td>Identitas Barang Milik Daerah</td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300" valign="top">&emsp;&emsp; Jenis/Nama Barang Milik Daerah</td>

                                <td>:
                                    @foreach ($asset->assetUmumPegawai as $key => $item)
                                    {{ ++$key }}
                                    {{ $item->jenis_barang }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300" valign="top">&emsp;&emsp; Merk/Type</td>
                                <td>:
                                    @foreach ($asset->assetUmumPegawai as $key => $item)
                                    {{ ++$key }}
                                    {{ $item->merk_type }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300">&emsp;&emsp; Tahun</td>
                                <td>: {{ \Carbon\Carbon::parse($asset->assettgl_perolehan)->isoFormat('Y') }}</td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300">&emsp;&emsp; Kode Barang</td>
                                <td>: {{ $asset->mappingAsset->kode_brg }}</td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300">&emsp;&emsp; Nomor Registrasi</td>
                                <td>: {{ $asset->mappingAsset->kode_brg }}</td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300" valign="top">&emsp;&emsp; Nomor Polisi &emsp; <i>(jika kendaraan)</i>
                                </td>
                                <td>:
                                    @foreach ($asset->assetUmumPegawai as $key => $item)
                                    @if ($item->nopol == NULL)
                                    -
                                    @else
                                    {{ ++$key }}
                                    {{ $item->nopol }} <br>
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300" valign="top">&emsp;&emsp; Nomor STNK &emsp; <i>(jika kendaraan)</i></td>
                                <td>:
                                    @foreach ($asset->assetUmumPegawai as $key => $item)
                                    @if ($item->stnk == NULL)
                                    -
                                    @else
                                    {{ ++$key }}
                                    {{ $item->stnk }} <br>
                                    @endif
                                    @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td width="300">&emsp;&emsp; <i>(Sesuai tabel SK Pemakai Kepala SKPD)</i></td>
                                <td></td>
                            </tr>
                        </table>
                        <br>
                        <div class="d-flex justify-content-between align-items-center mb-2 bg-light px-2">
                            Tambah Keterangan II
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addKeteranganBA2"
                                class="btn btn-primary">Tambah
                                Keterangan</a>
                        </div>

                        <table>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($asset->assetUmumBast as $bast)
                            @if ($bast->kategori == 'kategori2')
                            <tr>
                                <td width="30" valign="top">
                                    @switch($no++)
                                    @case(1)
                                    II.
                                    @break
                                    @case(2)
                                    III.
                                    @break
                                    @case(3)
                                    IV.
                                    @break
                                    @case(4)
                                    V.
                                    @break
                                    @case(5)
                                    VI.
                                    @break
                                    @case(6)
                                    VII.
                                    @break
                                    @case(7)
                                    VIII.
                                    @break
                                    @case(8)
                                    IX.
                                    @break
                                    @default
                                    II.
                                    @endswitch

                                </td>
                                <td>
                                    {{ $bast->keterangan }}
                                    <div>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#editKeteranganBA-{{ $bast->id }}"
                                            class="text-info">Edit</a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteKeteranganBA-{{ $bast->id }}"
                                            class="text-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>


                        <p class="mt-3">
                            Demikian Berita Acara ini dibuat dan ditandatangani dalam rangkap 3 (tiga) untuk dapat
                            digunakan sebagaimana mestinya,
                            masing-masing untuk:
                        </p>
                        <p>
                            Lembar 1 untuk Pengguna Barang (PIHAK PERTAMA) <br>
                            Lembar 2 untuk Pemakai Barang (PIHAK KEDUA) <br>
                            Lembar 3 untuk Pengurus Barang Dinas Ketahanan Pangan
                        </p>
                        <br>
                        <style>
                            .ttd tr td {
                                text-align: center;
                            }
                        </style>


                        <table width="90%" class="ttd">
                            <tr>
                                <td width="50%"></td>
                                <td width="50%">Pekanbaru, {{ \Carbon\Carbon::parse(now())->isoFormat('DD MMMM Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td>PIHAK PERTAMA</td>
                                <td>PIHAK KEDUA</td>
                            </tr>
                            <tr>
                                <td height="100"></td>
                                <td></td>
                            </tr>
                            <tr>

                                <td><u>{{ $namaKadis }}</u></td>
                                <td><u>Nama Pihak Kedua</u></td>
                            </tr>
                            <tr>
                                <td>NIP. {{ $nipKadis }}</td>
                                <td>NIP. Nip Pihak Kedua</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('umum.asset.kib-b.modalBast.create')
@include('umum.asset.kib-b.modalBast.edit')
@include('umum.asset.kib-b.modalBast.delete')

@endsection

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush