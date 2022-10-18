<table>
    <thead>
	    <tr>
	        <th colspan="9"><b>DAFTAR GUDANG MAKANAN PEKANBARU</b></th>
	    </tr>
	    <tr>
	        <th colspan="9"><b>TAHUN {{ date('Y') }}</b></th>
	    </tr>
	    <tr>
	        <th colspan="9"></th>
	    </tr>
    </thead>
	<thead>
		<tr>
			<th><b>No</b></th>
            <th><b>Nama Perusahaan</b></th>
            <th><b>Alamat/Telp/Fax Perusahaan</b></th>
            <th><b>Penanggung Jawab Perusahaan</b></th>
            <th><b>Alamat/Telp/Fax Gudang</b></th>
            <th><b>Penanggung Jawab Gudang</b></th>
            <th><b>No. TDG</b></th>
            <th><b>Jenis Gudang</b></th>
            <th><b>Luas Gudang</b></th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $key => $item)
		<tr>
			<td>{{ ++$key }}</td>
			<td>{{ $item->bentuk_usaha }} {{ $item->nama_perusahaan }}</td>
			<td>{{ $item->alamat_perusahaan }}<br>{{ $item->telepon_perusahaan }}</td>
			<td>{{ $item->penanggung_jwb_perusahaan }}</td>
			<td>{{ $item->alamat_gudang }}<br>{{ $item->telepon_gudang }}</td>
			<td>{{ $item->penanggung_jwb_gudang }}</td>
			<td>{{ $item->no_tdg }}</td>
			<td>{{ $item->jenis_gudang }}</td>
			<td>{{ $item->luas_gudang }}</td>
		</tr>
		@endforeach
	</tbody>
</table>