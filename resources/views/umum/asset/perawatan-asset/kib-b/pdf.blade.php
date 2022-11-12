<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan Perawatan Asset KIB B</title>


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
            <th class="th">Kode Asset</th>
            <th class="th">Pemakai</th>
            <th class="th">Jenis</th>
            <th class="th">Type/Merk</th>
            <th class="th">Tgl Perawatan</th>
            <th class="th">Nilai Satuan</th>
            <th class="th">Uraian</th>
            <th class="th">Ket</th>
        </tr>
        <tr>
            <td>{{ $kodeBrg }}</td>
            <td>{{ $kib->assetUmumPegawai->pegawai->nama }}</td>
            <td>{{ $kib->assetUmumPegawai->jenis_barang }}</td>
            <td>{{ $kib->assetUmumPegawai->merk_type }}</td>
            <td>{{ $kib->tgl }}</td>
            <td>{{ number_format($kib->nilai) }}</td>
            <td>{{ $kib->uraian }}</td>
            <td>{{ $kib->keterangan }}</td>
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