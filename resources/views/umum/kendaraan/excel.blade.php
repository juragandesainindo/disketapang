<table>
    <tr>
        <th colspan="16"><b>DAFTAR KENDARAAN</b></th>
    </tr>
    <tr>
        <th colspan="16"><b>DINAS KETAHANAN PANGAN</b></th>
    </tr>
    <tr>
        <th colspan="16"><b>{{ date('Y') }}</b></th>
    </tr>
    <tr>
        <th colspan="16"></th>
    </tr>
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>No Registrasi</b></th>
            <th><b>Nama Penanggung Jawab</b></th>
            <th><b>Alamat</b></th>
            <th><b>Merk</b></th>
            <th><b>Type</b></th>
            <th><b>Jenis</b></th>
            <th><b>Model</b></th>
            <th><b>Tahun Pembuatan</b></th>
            <th><b>Isi Silinder</b></th>
            <th><b>Nomor Rangka</b></th>
            <th><b>Nomor Mesin</b></th>
            <th><b>Warna</b></th>
            <th><b>Bahan Bakar</b></th>
            <th><b>Warna TNKB</b></th>
            <th><b>Berlaku</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->registrasi }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->merk }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->model }}</td>
            <td>{{ $item->tahun_pembuatan }}</td>
            <td>{{ $item->silinder }}</td>
            <td>{{ $item->no_rangka }}</td>
            <td>{{ $item->no_mesin }}</td>
            <td>{{ $item->warna }}</td>
            <td>{{ $item->bahan_bakar }}</td>
            <td>{{ $item->warna_tnkb }}</td>
            <td>{{ $item->berlaku }}</td>
        </tr>
        @endforeach
    </tbody>
</table>