<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan Asset</title>


    <style>
        * {
            font-family: 'Arial', sans-serif;
            font-size: 11pt;
        }

        @page {
            margin: 1.25cm 1.25cm 0cm 1.25cm;
        }

        .table tr th,
        .table tr td {
            border: 1px solid black !important;

        }

        .th,
        .td {
            padding: 10px;
        }

        td {
            text-align: justify;
        }

        hr {
            height: 2px;
            background: black;
        }

        hr:nth-child(2) {
            height: 0px;
            background: rgb(219, 219, 219);
            margin-top: -5px;
        }

        .page-break {
            page-break-after: always;
        }

        .ttd {
            margin: 40px auto auto;
        }

        .ttd tr td {
            text-align: center;
        }
    </style>
</head>

<body>

    @foreach ($asset->assetUmumPegawai as $item)
    <table>
        <tr>
            <td>
                <center>
                    <img src="../public/adminKit/img/kop-surat.png" width="100%">
                </center>
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td>
                <center>
                    <font size="3">
                        <b>
                            BERITA ACARA SERAH TERIMA <br>
                            PENGGUNAAN/PEMAKAIAN BARANG MILIK DAERAH
                        </b>
                    </font>
                </center>
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td>
                Pada hari ini, Kamis tanggal {{ \Carbon\Carbon::parse(now())->isoFormat('DD') }}
                bulan {{ \Carbon\Carbon::parse(now())->isoFormat('MMMM') }} tahun {{ date('Y') }},
                bertempat di Dinas Ketahanan
                Pangan yang beralamat di Jl. Abdul Rahman Hamid Kel. Tenayan Raya Kota Pekanbaru.
                <br><br>
                kami yang bertanda tangan di bawah ini:
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td width="25">
                <center>
                    I.
                </center>
            </td>
            <td width="150">Nama</td>

            <td>: {{ $namaKadis }}</td>
        </tr>
        <tr>
            <td width="25"></td>
            <td width="150">NIP</td>
            <td>: {{ $nipKadis }}</td>
        </tr>
        <tr>
            <td width="25"></td>
            <td width="150">Jabatan</td>
            <td>: {{ $jabatanKadis }}</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td>
                Bertindak menurut Jabaran Kepala Dinas Ketahanan Pangan Kota Pekanbaru selaku pengguna Barang
                Milik Daerah, yang
                selanjutnya disebut PIHAK PERTAMA.
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 20px;">
        <tr>
            <td width="25">II.</td>
            <td width="150">Nama</td>
            <td>: {{ $item->pegawai->nama }}</td>
        </tr>
        <tr>
            <td width="25"></td>
            <td width="150">NIP</td>
            <td>: {{ $item->pegawai->nip }}</td>
        </tr>
        <tr>
            <td width="25"></td>
            <td width="150">Jabatan</td>
            <td>:
                @foreach ($item->pegawai->pegawaiJabatan->sortByDesc('akhir_jabatan')->take(1) as $i)
                {{ $i->nama_jabatan }}
                @endforeach
            </td>
        </tr>
    </table>
    <table style="margin-top: 20px;">
        <tr>
            <td>
                dalam hal ini bertindak untuk dan atas nama diri sendiri selaku pemakai Barang Milik Daerah pada Dinas
                Ketahanan Pangan
                Kota Pekanbaru, selanjutnya disebut PIHAK KEDUA.
            </td>
        </tr>
    </table>
    <table style="margin-top: 20px;">
        <tr>
            <td>
                @foreach ($asset->assetUmumBast as $key => $bast)
                @if ($bast->kategori == 'kategori1')
                {{ $bast->keterangan }}
                @endif
                @endforeach
            </td>
        </tr>
    </table>
    <div class="page-break"></div>

    <table>
        <tr>
            <td width="30">I.</td>
            <td>Identitas Barang Milik Daerah</td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Jenis/Nama Barang Milik Daerah</td>
            <td>: {{ $item->jenis_barang }}</td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Merk/Type</td>
            <td>: {{ $item->merk_type }}</td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Tahun</td>
            <td>: {{ \Carbon\Carbon::parse($item->tgl_perolehan)->isoFormat('Y') }}</td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Kode Barang</td>
            <td>: {{ $asset->mappingAsset->kode_brg }}</td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Nomor Registrasi</td>
            <td>: {{ $asset->mappingAsset->kode_brg }}</td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Nomor Polisi &emsp; <i>(jika kendaraan)</i></td>
            <td>:
                @if ($item->nopol == NULL)
                -
                @else
                {{ $item->nopol }}
                @endif
            </td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; Nomor STNK &emsp; <i>(jika kendaraan)</i></td>
            <td>:
                @if ($item->stnk == NULL)
                -
                @else
                {{ $item->stnk }}
                @endif
            </td>
        </tr>
        <tr>
            <td width="30"></td>
            <td width="250">&emsp;&emsp; <i>(Sesuai tabel SK Pemakai Kepala SKPD)</i></td>
            <td></td>
        </tr>
    </table>

    <table style="margin-top: 20px;">
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
            </td>
        </tr>
        @endif
        @endforeach
    </table>

    <table style="margin-top: 20px;">
        <tr>
            <td>
                Demikian Berita Acara ini dibuat dan ditandatangani dalam rangkap 3 (tiga) untuk dapat
                digunakan sebagaimana mestinya,
                masing-masing untuk:
            </td>
        </tr>
    </table>
    <table style="margin-top: 20px;">
        <tr>
            <td>
                Lembar 1 untuk Pengguna Barang (PIHAK PERTAMA)
            </td>
        </tr>
        <tr>
            <td>
                Lembar 2 untuk Pemakai Barang (PIHAK KEDUA)
            </td>
        </tr>
        <tr>
            <td>
                Lembar 3 untuk Pengurus Barang Dinas Ketahanan Pangan
            </td>
        </tr>
    </table>

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

            <td>{{ $namaKadis }}</td>
            <td>{{ $item->pegawai->nama }}</td>
        </tr>
        <tr>
            <td>NIP. {{ $nipKadis }}</td>
            <td>NIP. {{ $item->pegawai->nip }}</td>
        </tr>
    </table>
    <div class="page-break"></div>
    @endforeach
</body>

</html>