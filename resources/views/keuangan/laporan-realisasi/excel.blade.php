<table>
    <tr>
        <th colspan="11"><b>REKAPITULASI REALISASI FISIK DAN KEUANGAN</b></th>
    </tr>
    <tr>
        <th colspan="11"><b>KEGIATAN PEMBANGUNAN DI PEMERINTAH KOTA PEKANBARU</b></th>
    </tr>
    <tr>
        @foreach($realisasi->take(1) as $item)
        <th colspan="11"><b>TAHUN ANGGARAN {{ $item->tahun }}</b></th>
        @endforeach
    </tr>
    <tr>
        <th colspan="11"></th>
    </tr>
    	<thead>
    		<tr>
    			<th rowspan="3">No</th>
    			<th rowspan="3">Nama Kegiatan</th>
    			<th colspan="3">Pagu Kegiatan</th>
    			<th colspan="4">Realisasi</th>
    			<th colspan="2">Realisasi Fisik</th>
    		</tr>
    		<tr>
    			<th rowspan="2">APBD Murni</th>
    			<th rowspan="2">Refocusing APBD</th>
    			<th rowspan="2">APBD-P</th>
    			<th colspan="2">Keuangan</th>
    			<th colspan="2">Fisik</th>
    			<th rowspan="2">Seharusnya</th>
    			<th rowspan="2">Defiasi</th>
    		</tr>
    		<tr>
    		    <th>(Rp)</th>
    		    <th>(%)</th>
    		    <th>(%)</th>
    		    <th>TTB</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($realisasi as $key => $item)
    		<tr>
    		    <td></td>
    		    <td><b>{{ $item->realisasi->name_kegiatan }}</b></td>
    		</tr>
    		<tr>
    			<td></td>
    			<td>{{ $item->nama_kegiatan }}</td>
    			<td>{{ $item->apbd_murni }}</td>
    			<td>{{ $item->refocusing }}</td>
    			<td>{{ $item->apbd_p }}</td>
    			<td>{{ $item->realisasi_keuangan }}</td>
    			<td>{{ ($item->realisasi_keuangan/$item->apbd_p*100) }}</td>
    			<td>{{ $item->realisasi_fisik }}%</td>
    			<td>{{ ($item->realisasi_keuangan/$item->apbd_p*100/$item->apbd_p*100) }}</td>
    			<td>{{ $item->seharusnya }}%</td>
    			<td>{{ ($item->seharusnya-$item->realisasi_fisik) }}%</td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>