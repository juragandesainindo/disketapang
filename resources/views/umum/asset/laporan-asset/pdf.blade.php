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
        }

        .table tr th,
        .table tr td {
            border: 1px solid black !important;

        }

        .th,
        .td {
            padding: 10px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td>
                <center>
                    <img src="../public/adminKit/img/kop-surat.png" width="100%">
                </center>
            </td>
        </tr>
    </table>

    <table style="margin-top: 20px;">
        <tr>
            <td>Lampiran : </td>
        </tr>
    </table>

    @if ($assets->count() >0)
    <table class="table" style="border-collapse: collapse;width:100%;margin-top: 20px;">
        <tr>
            <th class="th">Kode Asset</th>
            <th class="th">Nama Asset</th>
            <th class="th">Nama Barang</th>
            <th class="th">Tgl Perolehan</th>
            <th class="th">Nilai Satuan</th>
            <th class="th">Jumlah Unit</th>
            <th class="th">Total</th>
        </tr>
        @foreach ($assets as $asset)
        <tr>
            <td class="td">
                <center>{{ $asset->mappingAsset->kode_brg }}</center>
            </td>
            <td class="td">{{ $asset->mappingAsset->nama_brg }}</td>

            <td class="td">
                <center>
                    @foreach ($asset->assetUmumPegawai->take(1) as $item)
                    {{ $item->jenis_barang }}
                    @endforeach
                </center>
            </td>
            <td class="td">
                <center>
                    {{ \Carbon\Carbon::parse($asset->tgl_perolehan)->isoFormat('DD-MM-Y') }}
                </center>
            </td>
            <td class="td">Rp. {{ number_format($asset->nilai_brg) }}</td>
            <td class="td">
                <center>
                    @if ($asset->kategori === 'KibB')
                    {{ $asset->assetUmumPegawai->count() }}
                    @else
                    1
                    @endif
                </center>
            </td>
            <td class="td">
                @if ($asset->kategori === 'KibB')
                Rp. {{ number_format($asset->nilai_brg * $asset->assetUmumPegawai->count()) }}
                @else
                Rp. {{ number_format($asset->nilai_brg * 1) }}
                @endif
            </td>
        </tr>

        @endforeach
        <tr>
            <th class="th" colspan="6" align="left">Total</th>
            <th class="th">Rp. {{ number_format($totalBrg) }}</th>
        </tr>
    </table>
    @else
    <center>Data tidak ada</center>
    @endif

    <table align="right" style="margin-top: 40px;" width="30%">
        <tr>
            <td>Pekanbaru, {{ \Carbon\Carbon::parse(now())->isoFormat('DD MMMM Y') }}</td>
        </tr>
        <tr>
            <td>Kasubag Umum</td>
        </tr>
        <br><br><br><br>
        <tr>
            <td>{{ $namakasubUmum }}</td>
        </tr>
        <tr>
            <td>NIP. {{ $nipkasubUmum }}</td>
        </tr>
    </table>

</body>

</html>