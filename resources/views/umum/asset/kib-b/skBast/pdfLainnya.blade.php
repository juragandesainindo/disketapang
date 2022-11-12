<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SK Pemegang Pemakai Barang</title>

    <style>
        * {
            font-family: 'Arial', sans-serif;
            font-size: 11pt;
        }

        @page {
            margin: 1.25cm 1.25cm 0cm 1.25cm;
        }

        .table-pemakai,
        .th,
        .td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 1px 10px;
        }

        .table-pemakai {
            margin-top: 30px;
            font-size: 9pt;
        }

        .th {
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }

        .justify {
            text-align: justify;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td>
                <img src="../public/adminKit/img/kop-surat.png" width="100%">
            </td>
        </tr>
    </table>
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
        @php
        $no=1;
        @endphp
        <tr>
            <td width="100" valign="top">
                Menimbang
            </td>
            <td width="10" valign="top">:</td>
            <td>
                <table>
                    @foreach ($skPreview->where('kategori','Menimbang') as $item)
                    <tr>
                        <td valign="top" width="15">
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
                        </td>
                        <td class="justify">
                            {{ $item->keterangan }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width="100" valign="top">Mengingat</td>
            <td width="10" valign="top">:</td>
            <td>
                <table>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($skPreview->where('kategori','Mengingat') as $item)
                    <tr>
                        <td valign="top" width="15">{{ $no++ }}.</td>
                        <td class="justify">{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
    <div class="page-break"></div>
    <table width="100%" style="margin: 20px 0px;">
        <tr>
            <td width="100" valign="top"></td>
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
            <td width="100" valign="top">Menetapkan</td>
            <td width="20" valign="top">:</td>
            <td width="20" valign="top"></td>
            <td></td>
        </tr>
    </table>
    <table width="100%" style="margin-bottom: 20px;">
        <tr>
            <td width="100" valign="top">KESATU</td>
            <td width="10" valign="top">:</td>
            <td colspan="2" class="justify">
                @foreach ($skPreview->where('kategori','Kesatu') as $item)
                {{$item->keterangan}} <br>
                <br>
                @endforeach
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-bottom: 20px;">
        <tr>
            <td width="100" valign="top">KEDUA</td>
            <td width="10" valign="top">:</td>
            <td class="justify">
                Pemegang/Pemakai Barang Milik Daerah sebagaimana Diktum KESATU wajib mematuhi
                ketentuan sebagai berikut:
            </td>
        </tr>
        <tr>
            <td width="100" valign="top"></td>
            <td width="10" valign="top"></td>
            <td>
                <table>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($skPreview->where('kategori','Kedua') as $item)
                    <tr>
                        <td valign="top" width="15">{{ $no++ }}.</td>
                        <td class="justify">{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-bottom: 20px;">
        <tr>
            <td width="100" valign="top">KETIGA</td>
            <td width="10" valign="top">:</td>
            <td class="justify">
                @foreach ($skPreview->where('kategori','Ketiga') as $item)
                {{ $item->keterangan }} <br>
                @endforeach
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-bottom: 20px;">
        <tr>
            <td width="100" valign="top">KEEMPAT</td>
            <td width="10" valign="top">:</td>
            <td class="justify">
                @foreach ($skPreview->where('kategori','Keempat') as $item)
                {{ $item->keterangan }} <br>
                @endforeach
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-bottom: 20px;">
        <tr>
            <td width="100" valign="top">KELIMA</td>
            <td width="10" valign="top">:</td>
            <td class="justify">
                @foreach ($skPreview->where('kategori','Kelima') as $item)
                {{ $item->keterangan }} <br>
                @endforeach
            </td>
        </tr>
    </table>
    <table width="100%" style="margin-bottom: 20px;">
        <tr>
            <td width="100" valign="top">KEENAM</td>
            <td width="10" valign="top">:</td>
            <td>
                Keputusan ini berlaku pada tanggal ditetapkan.
            </td>
        </tr>
    </table>
    <table width="100%" style="margin: 30px 0 20px;">
        <tr>
            <td width="100" valign="top"></td>
            <td width="20" valign="top"></td>
            {{-- <td width="20" valign="top"></td> --}}
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
            <td width="100" valign="top"></td>
            <td width="20" valign="top"></td>
            {{-- <td width="20" valign="top"></td> --}}
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

    <table width="100%" class="table-pemakai">
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
        @foreach ($asset as $item)
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
                @foreach ($i->pegawai->pegawaiJabatan->sortByDesc('akhir_jabatan')->take(1) as $p)
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


</body>

</html>