<table>
    <tr>
        <th colspan="6"><b>FORM MONITORING EVALUASI</b></th>
    </tr>
    <tr>
        <th colspan="6"><b>KEGIATAN PENGEMBANGAN KAWASAN MANDIRI PANGAN</b></th>
    </tr>
    <tr>
        <th colspan="6"><b>TAHUN {{ \Carbon\Carbon::now()->isoFormat('Y') }}</b></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th colspan="2"><b>KELOMPOK TANI</b></th>
        <th colspan="4"><b>: {{ $data->dktKelompok->nama_dkt }}</b></th>
    </tr>
    <tr>
        <th colspan="2"><b>KETUA KELOMPOK</b></th>
        <th colspan="4"><b>: {{ $data->dktKelompok->ketua }}</b></th>
    </tr>
    <tr>
        <th colspan="2"><b>ALAMAT</b></th>
        <th colspan="4"><b>: {{ $data->dktKelompok->alamat }}</b></th>
    </tr>
    <tr>
        <th colspan="2"><b>PENYULUH LAPANGAN</b></th>
        <th colspan="4"><b>: {{ $data->dktKelompok->ppl }}</b></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th colspan="2"><b>Hari/Tanggal</b></th>
        <th colspan="4"><b>: {{ \Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}</b></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>Jenis Barang</b></th>
            <th><b>Jumlah</b></th>
            <th><b>Satuan</b></th>
            <th><b>Permasalahan</b></th>
            <th><b>Keterangan</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data->beritaAcaraShow as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->jenis_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->satuan }}</td>
            <td></td>
            <td>{{ $item->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th colspan="6">Kesimpulan :</th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th colspan="6">TIM MONITORING</th>
    </tr>
    <tr>
        <th colspan="1">1</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2">Penyuluh Pertanian Lapangan(PPL)</th>
    </tr>
    <tr>
        <th colspan="1">2</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2"></th>
    </tr>
    <tr>
        <th colspan="1">3</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2"><u>{{ $data->dktKelompok->ppl }}</u></th>
    </tr>
    <tr>
        <th colspan="1">4</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2"></th>
    </tr>
    <tr>
        <th colspan="1">5</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2">Ketua Kelompok Tani</th>
    </tr>
    <tr>
        <th colspan="1">6</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2"></th>
    </tr>
    <tr>
        <th colspan="1">7</th>
        <th colspan="2"></th>
        <th colspan="1">()</th>
        <th colspan="2"><u>{{ $data->dktKelompok->ketua }}</u></th>
    </tr>
</table>