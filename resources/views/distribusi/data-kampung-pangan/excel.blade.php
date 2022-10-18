<table>
    <tr>
        <th colspan="8"><b>DATA KELOMPOK KAMPUNG PANGAN B2SA KOTA PEKANBARU</b></th>
    </tr>
    <tr>
        <th colspan="8"></th>
    </tr>
    <thead>
        <tr>
            <th><b>NO</b></th>
            <th><b>NAMA</b></th>
            <th><b>ALAMAT</b></th>
            <th><b>KECAMATAN</b></th>
            <th><b>TAHUN</b></th>
            <th><b>JUMLAH ANGGOTA</b></th>
            <th><b>JENIS PELATIHAN</b></th>
            <th><b>JENIS BANTUAN</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->kecamatan }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->jumlah_anggota }} orang</td>
            <td>{{ $item->jenis_pelatihan }}</td>
            <td>{{ $item->jenis_bantuan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>