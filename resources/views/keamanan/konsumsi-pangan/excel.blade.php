<table>
    <tr>
        <th colspan="3"><b>Tingkat Konsumsi Pangan Perkapita (PPH Konsumsi)</b></th>
    </tr>
    <tr>
        <th colspan="3"></th>
    </tr>
    <thead>
        <tr>
            <th><b>NO</b></th>
            <th><b>KECAMATAN</b></th>
            <th><b>SKOR PPH</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->kwtKecamatan->kecamatan }}</td>
            <td>{{ $item->skor_pph }}</td>
        </tr>
        @endforeach
    </tbody>
</table>