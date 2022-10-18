

<table class="table table-striped table-hover" border="1">
    <tr>
        <th colspan="8"><b>DATA KWT SE - KOTA PEKANBARU PER {{ \Carbon\Carbon::now()->isoFormat('MMMM Y') }}</b></th>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th colspan="2"><b>Provinsi</b></th>
        <th colspan="6"><b>: RIAU</b></th>
    </tr>
    <tr>
        <th colspan="2"><b>Kabupaten/Kota</b></th>
        <th colspan="6"><b>: Kota Pekanbaru</b></th>
    </tr>
    <tr>
        <th></th>
    </tr>
	<thead>
    	<tr>
    	    <th><b>NO</b></th>
    		<th><b>KECAMATAN</b></th>
    		<th><b>KELURAHAN</b></th>
    		<th><b>NAMA KWT</b></th>
    		<th><b>ALAMAT</b></th>
    		<th><b>KETUA</b></th>
    		<th><b>No. HP</b></th>
    		<th><b>PPL</b></th>
    	</tr>
	</thead>
	<tbody>
	    @foreach($data as $key => $item)
	    <tr>
	        <td></td>
	        <td>{{ $item->kwtKecamatan->kecamatan }}</td>
	        <td>{{ $item->kwtKelurahan->kelurahan }}</td>
	        <td>{{ $item->nama_kwt }}</td>
	        <td>{{ $item->alamat }}</td>
	        <td>{{ $item->ketua }}</td>
	        <td>{{ $item->telepon }}</td>
	        <td>{{ $item->ppl }}</td>
	    </tr>
	    @endforeach
	</tbody>
</table>