<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan Perawatan Asset KIB D</title>


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

    <table class="table" style="border-collapse: collapse;width:100%;margin-top: 20px;text-align:center;">
        <tr>
            <th class="th">Kode&nbsp;Asset</th>
            <th class="th">Barang&nbsp;/&nbsp;KDP</th>
            <th class="th">Tgl&nbsp;Perawatan</th>
            <th class="th">Nilai&nbsp;Satuan</th>
            <th class="th">Uraian</th>
            <th class="th">Ket</th>
        </tr>
        <tr>
            <td class="td">{{ $kib->assetUmum->mappingAsset->kode_brg }}</td>
            <td class="td">
                {{ $kib->assetUmum->mappingAsset->nama_brg }} <br>
                {{ $kib->assetUmum->kdp }}
            </td>
            <td class="td">{{ $kib->tgl }}</td>
            <td class="td">Rp.&nbsp;{{ number_format($kib->nilai) }}</td>
            <td class="td">{{ $kib->uraian }}</td>
            <td class="td">{{ $kib->keterangan }}</td>
        </tr>
    </table>

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