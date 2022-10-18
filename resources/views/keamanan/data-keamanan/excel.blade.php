<table>
    <tr>
        <th colspan="8"><b>DATA PEMERIKSAAN SAMPEL PANGAN SEGAR</b></th>    
    </tr>
    <tr>
        @foreach($sampel->take(1) as $item)
        <th colspan="8"><b>TAHUN {{ $item->tgl_pemeriksaan->isoFormat('Y') }}</b></th>
        @endforeach
    </tr>
    <tr>
        <th></th>    
    </tr>
    <thead>
        <tr>
            <th rowspan="2"><b>No</b></th>
            <th rowspan="2"><b>Tanggal Pemeriksaan</b></th>
            <th rowspan="2"><b>Lokasi</b></th>
            <th rowspan="2"><b>Alamat</b></th>
            <th colspan="3"><b>Jenis</b></th>
            <th rowspan="2"><b>Asal</b></th>
            <th rowspan="2"><b>Hasil</b></th>
        </tr>
        <tr>
            <th><b>Sayuran</b></th>
            <th><b>Buah</b></th>
            <th><b>Lainnya</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($sampel as $key => $item)
        <tr>
            <th>{{ ++$key }}</th>
            <th>{{ $item->tgl_pemeriksaan->isoFormat('DD MMMM Y') }}</th>
            <th>{{ $item->lokasi }}</th>
            <th>{{ $item->alamat }}</th>
            <th>{{ $item->sayuran }}</th>
            <th>{{ $item->buah }}</th>
            <th>{{ $item->lainnya }}</th>
            <th>{{ $item->asal }}</th>
            <th>{{ $item->hasil }}</th>
        </tr>
        @endforeach
    </tbody>
    <tr>
        <th colspan="5"></th>
        <th colspan="3"></th>
    </tr>
    <tr>
        <th colspan="5"></th>
        <th colspan="3"></th>
    </tr>
    <tr>
        <th colspan="5">Mengetahui</th>
        <th colspan="3"></th>
    </tr>
    <tr>
        <th colspan="5"><b>KEPALA BIDANG KONSUMSI DAN KEAMANAN PANGAN</b></th>
        <th colspan="3"><b>KEPALA SEKSI KEAMANAN PANGAN</b></th>
    </tr>
</table>