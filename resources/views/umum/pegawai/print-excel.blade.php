<table>
    <tr>
        <th colspan="12">DAFTAR URUT KEPANGKATAN PEGAWAI NEGER SIPIL TAHUN {{ date('Y') }}</th>
    </tr>
	<thead>
		<tr>
		    <th rowspan="2">No</th>
		    <th rowspan="2">Nama/NIP</th>
			<th colspan="2">Pangkat</th>
			<th colspan="2">Jabatan</th>
			<th colspan="3">Pendidikan</th>
			<th rowspan="2">Tempat/Tgl Lahir</th>
			<th rowspan="2">Alamat</th>
			<th rowspan="2">Jenis Kelamin</th>
		</tr>
		<tr>
		    <th>Gol Ruang</th>
		    <th>TMT</th>
		    <th>Nama</th>
		    <th>TMT</th>
		    <th>Nama</th>
		    <th>Lulus Tahun</th>
		    <th>Tingkat Ijazah</th>
		</tr>
	</thead>
	<tbody>
	    @foreach($pegawai as $key => $item)
	    <tr>
	        <td>{{ ++$key }}</td>
	        <td>{{ $item->nama }}<br>{{ $item->nip }}</td>
	        @foreach($item->pangkat()->orderBy('tgl_sk','desc')->take(1)->get() as $data)
	        <td>{{ $data->nama_pangkat }}{{ $data->gol_pangkat }}</td>
	        <td>{{ $data->tmt_pangkat->isoFormat('D-MM-Y') }}</td>
	        @endforeach
	        @foreach($item->jabatan()->orderBy('tmt_jabatan','desc')->take(1)->get() as $pen)
	        <td>{{ $pen->nama_jabatan }}</td>
	        <td>{{ $pen->tmt_jabatan->isoFormat('D-MM-Y') }}</td>
	        @endforeach
	        @foreach($item->pendidikan()->orderBy('tahun_lulus','desc')->take(1)->get() as $pen)
	        <td>{{ $pen->nama_sekolah }}</td>
	        <td>{{ $pen->tahun_lulus }}</td>
	        <td>{{ $pen->jenjang_pendidikan }}</td>
	        @endforeach
	        <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir->isoFormat('D MMMM Y') }}</td>
	        <td>{{ $item->alamat }}</td>
	        <td>{{ $item->jk }}</td>
	    </tr>
	    @endforeach
	</tbody>
</table>