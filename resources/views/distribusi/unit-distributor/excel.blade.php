<table>
    <tr>
        <th colspan="6"><b>DISTRIBUTOR PANGAN KOTA PEKANBARU TAHUN {{ date('Y') }}</b></th>
    </tr>
    <tr>
        <th colspan="6"></th>
    </tr>
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>Nama Perusahaan</b></th>
            <th><b>Alamat</b></th>
            <th><b>Link Alamat</b></th>
            <th><b>Telepon</b></th>
            <th><b>Komoditi</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->bentuk_usaha }} {{ $item->nama_perusahaan }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->link }}</td>
            <td>{{ $item->telepon }}</td>
            <td>{{ $item->komoditi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>