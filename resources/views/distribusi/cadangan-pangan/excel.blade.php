<table class="table table-striped table-hover" id="table1">
    <tr>
        <th colspan="8"><b>STOK BEBERAPA KOMODITI PANGAN DI KOTA PEKANBARU</b></th>
    </tr>
    <tr>
        <th colspan="8"><b>BULAN MARET TAHUN 2021</b></th>
    </tr>
    <tr>
        <th colspan="8"></th>
    </tr>
	<thead>
    	<tr>
    		<th><b>No</b></th>
            <th><b>Nama Tempat Usaha</b></th>
            <th><b>Beras</b></th>
            <th><b>Gula</b></th>
            <th><b>Minyak</b></th>
            <th><b>Tepung</b></th>
            <th><b>Daging</b></th>
            <th><b>Kernel</b></th>
    	</tr>
	</thead>
	<tbody>
	    @foreach($data as $key => $item)
		<tr>
		    <td>{{ ++$key }}</td>
		    @if($item->cadanganPangan->pedagang=='PT Sarana Pangan Madani')
		    <td>{{ $item->cadanganPangan->pedagang }}</td>
		    @endif
		    @if($item->komoditi=='Beras')
		    <td>{{ $item->stok_awal }}</td>
		    @endif
		    @if($item->komoditi=='Gula')
		    <td>{{ $item->stok_awal }}</td>
		    @endif
		    @if($item->komoditi=='Minyak')
		    <td>{{ $item->stok_awal }}</td>
		    @endif
		    @if($item->komoditi=='Tepung')
		    <td>{{ $item->stok_awal }}</td>
		    @endif
		    @if($item->komoditi=='Daging')
		    <td>{{ $item->stok_awal }}</td>
		    @endif
		    @if($item->komoditi=='Kernel')
		    <td>{{ $item->stok_awal }}</td>
		    @endif
		    
		</tr>
		@endforeach
	</tbody>
</table>