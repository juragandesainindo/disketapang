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

        }

        table {
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
        }

        .table-pemakai {
            font-size: 9pt;
        }

        .th,
        .td {
            padding: 10px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="table-kendaraan">
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

        <table width="100%" class="table-pemakai">
            <tr>
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
</body>

</html>