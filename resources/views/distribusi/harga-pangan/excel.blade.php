
<table>
    <tr>
        <th colspan="10"><b>RATA-RATA HARGA PANGAN HARIAN DI TINGKAT PEDAGANG PENGECER DAN GROSIR</b></th>
    </tr>
    <tr>
        <th colspan="10"></th>
    </tr>
    <tr>
        <th colspan="2"><b>Kabupaten/Kota</b></th>
        <th colspan="8"><b>: Pekanbaru</b></th>
    </tr>
    @foreach($hargaPangan->take(1) as $key => $item)
    <tr>
        <th colspan="2"><b>Tahun</b></th>
        <th colspan="8"><b>: {{ $item->tanggal->isoFormat('Y') }}</b></th>
    </tr>
    <tr>
        <th colspan="2"><b>Bulan</b></th>
        <th colspan="8"><b>: {{ $item->tanggal->isoFormat('MMMM') }}</b></th>
    </tr>
    <tr>
        <th colspan="2"><b>Lokasi</b></th>
        <th colspan="8"><b>: {{ $item->nama_pasar }}</b></th>
    </tr>
    @endforeach
    <tr>
        <th colspan="10"></th>
    </tr>
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>Komoditas</b></th>
            <th><b>Kualitas</b></th>
            <th><b>Satuan</b></th>
            <th><b>P1</b></th>
            <th><b>P2</b></th>
            <th><b>P3</b></th>
            <th><b>G</b></th>
            <th><b>Harga Rata-Rata Pengecer</b></th>
            <th><b>Tanggal</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($hargaPangan as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->komoditi }}</td>
            <td>{{ $item->kualitas }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->p1 }}</td>
            <td>{{ $item->p2 }}</td>
            <td>{{ $item->p3 }}</td>
            <td>{{ $item->g }}</td>
            <td>{{ ($item->p1+$item->p2+$item->p3)/3 }}</td>
            <td>{{ $item->tanggal->isoFormat('D MMMM Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
