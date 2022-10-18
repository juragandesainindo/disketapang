<table>
    <tr>
        <th colspan="4"><b>DAFTAR PASAR DAN KELEMBAGAAN DISTRIBUSI KOTA  PEKANBARU TAHUN {{ date('Y') }}</b></th>
    </tr>
    <tr>
        <th colspan="4"></th>
    </tr>
	<thead>
    	<tr>
    	    <th><b>No</b></th>
            <th><b>Nama Pasar</b></th>
            <th><b>Alamat</b></th>
            <th><b>Kecamatan</b></th>
    	</tr>
	</thead>
	<tbody>
		@foreach($data as $key => $item)
		<tr>
		    <td></td>
		    <td><b>{{ $item->nama_lembaga }}</b></td>
		</tr>
		@foreach($item->pasar_jenis as $key => $i)
		<tr>
		    <td>{{ ++$key }}</td>
		    <td>{{ $i->nama_pasar }}</td>
		    <td>{{ $i->alamat }}</td>
		    <td>{{ $i->kecamatan }}</td>
		</tr>
		@endforeach
		@endforeach
	</tbody>
</table>