<table>
    <tr>
        <th colspan="6"><b>Evaluasi Terhadap Hasil RENSTRA</b></th>
    </tr>
    <tr>
        <th colspan="6"><b>Dinas Ketahanan Pangan</b></th>
    </tr>
    <tr>
        <th colspan="6"></th>
    </tr>
    <thead>
        <tr>
            <th rowspan="2"><b>No</b></th>
            <th rowspan="2"><b>Indikator Kerja</b></th>
            <th><b>Target Renstra Perangkat Daerah<br>Kabupaten/Kota Tahun Ke</b></th>
            <th><b>Realisasi Capaian Tahun Ke</b></th>
            <th><b>Rasio Capaian Tahun ke</b></th>
        </tr>
        <tr>
            @foreach($renstra as $key => $item)
            <th><b>{{ $item->tahun }}</b></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($renstra as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->indikator }}</td>
            <td>{{ $item->target }}</td>
            <td>{{ $item->realisasi }}</td>
            <td>{{ $item->rasio }}</td>
        </tr>
        @endforeach
    </tbody>
</table>