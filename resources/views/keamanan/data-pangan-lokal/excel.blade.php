<table>
    <tr>
        <th colspan="10"><b>DATA POTENSI PANGAN OLAHAN SPESIFIK  WILAYAH</b></th>
    </tr>
    <tr>
        <th colspan="10"></th>
    </tr>
    <thead>
        <tr>
            <th><b>NO</b></th>
            <th><b>NAMA PEMILIK</b></th>
            <th><b>NAMA KETUA</b></th>
            <th><b>JENIS KOMODITI</b></th>
            <th><b>JENIS OLAHAN</b></th>
            <th><b>ALAMAT</b></th>
            <th><b>KELURAHAN</b></th>
            <th><b>KECAMATAN</b></th>
            <th><b>SURAT IJIN</b></th>
            <th><b>KETERANGAN</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->kwtKelompok->nama_kwt }}</td>
            <td>{{ $item->kwtKelompok->ketua }}</td>
            <td>{{ $item->jenis_komoditi }}</td>
            <td>{{ $item->jenis_olahan }}</td>
            <td>{{ $item->kwtKelompok->alamat }}</td>
            <td>{{ $item->kwtKelompok->kwtKelurahan->kelurahan }}</td>
            <td>{{ $item->kwtKelompok->kwtKecamatan->kecamatan }}</td>
            <td>{{ $item->surat_ijin }}</td>
            <td>{{ $item->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>