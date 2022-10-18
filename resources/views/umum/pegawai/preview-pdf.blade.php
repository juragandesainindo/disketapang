<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title></title>
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
		}

		.img-responsive {
			position: absolute;
			right: 50px;
			top: 70px;
			width: 4cm;
		}

		#judul {
			font-size: 18px;
			font-weight: bold;
		}

		.title {
			width: 50px;
		}

		.phone-number {
			font-weight: normal;
		}

		.table-bordered td,
		.table-bordered th {
			border-color: black !important;
		}
	</style>
</head>

<body>


	<div class="container">
		<img class="img-responsive" src="/umum/pegawai/{{$pegawai->foto}}" alt="" />


		<div class="row">
			<div class="col-md-12 text-center mb-3 mt-5">
				<strong id="judul"><u>DAFTAR RIWAYAT HIDUP/CV</u></strong>
			</div>

			<div class="col-md-12 mb-2">
				<strong id="judul">DATA PRIBADI</strong>
			</div>

			<div class="col-md-3">
				<span class="title">Nama</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: <b>{{ $pegawai->nama }}</b></strong>
			</div>
			<div class="col-md-3">
				<span class="title">NIP</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->nip }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">NPWP</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->npwp }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">Jenis Kelamin</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->jk }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">Tempat & Tgl Lahir</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->tempat_lahir }}, {{
					$pegawai->tgl_lahir->isoFormat('DD-MMMM-Y') }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">Agama</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->agama }}</strong>
			</div>
			@foreach($pegawai->pangkat()->orderBy('tgl_sk','desc')->take(1)->get() as $data)
			<div class="col-md-3">
				<span class="title">Pangkat/Golongan</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $data->nama_pangkat }}, {{ $data->gol_pangkat }}</strong>
			</div>
			@endforeach
			@foreach($pegawai->pendidikan()->orderBy('tahun_lulus','desc')->take(1)->get() as $pen)
			<div class="col-md-3">
				<span class="title">Pendidikan Terakhir</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pen->jenjang_pendidikan }} {{ $pen->jurusan }}</strong>
			</div>
			@endforeach
			@foreach($pegawai->jabatan()->orderBy('tmt_jabatan','desc')->take(1)->get() as $pen)
			<div class="col-md-3">
				<span class="title">Jabatan</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pen->nama_jabatan }}</strong>
			</div>
			@endforeach
			<div class="col-md-3">
				<span class="title">Telepon</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->telepon }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">Email</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->email }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">Alamat</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->alamat }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">No BPJS</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->bpjs }}</strong>
			</div>
		</div>

		@if ($pegawai->pangkat->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<thead>
				<tr>
					<th colspan="5">Riwayat Kepangkatan</th>
				</tr>
				<tr style="text-align: center;">
					<th>No</th>
					<th>Pangkat/ Gol. Ruang</th>
					<th>No. SK</th>
					<th>Tanggal SK</th>
					<th>TMT Pangkat</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai->pangkat as $key => $p)
				<tr>
					<td style="text-align: center;">{{ ++$key }}</td>
					<td>{{ $p->nama_pangkat }}, {{ $p->gol_pangkat }}</td>
					<td>{{ $p->no_sk }}</td>
					<td>{{ $p->tgl_sk->isoFormat('DD-MM-Y') }}</td>
					<td>{{ $p->tmt_pangkat->isoFormat('DD-MM-Y') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif

		@if ($pegawai->jabatan->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<thead>
				<tr>
					<th colspan="5">RIWAYAT JABATAN</th>
				</tr>
				<tr style="text-align: center;">
					<th>No</th>
					<th>Jabatan</th>
					<th>Eselon</th>
					<th>TMT Jabatan</th>
					<th>Masa Jabatan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai->jabatan as $key => $j)
				<tr>
					<td style="text-align: center;">{{ ++$key }}</td>
					<td>{{ $j->nama_jabatan }}</td>
					<td>{{ $j->eselon }}</td>
					<td>{{ $j->tmt_jabatan->isoFormat('DD-MM-Y') }}</td>
					<td>{{ $j->tmt_jabatan->isoFormat('DD-MM-Y') }} s/d {{ $j->akhir_jabatan->isoFormat('DD-MM-Y') }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif

		@if ($pegawai->pendidikan->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="5">RIWAYAT PENDIDIKAN UMUM</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Jenjang Pendidikan</th>
				<th>Fakultas/Jurusan</th>
				<th>Nama Sekolah/Univ.</th>
				<th>Tahun Lulus</th>
			</tr>
			@foreach($pegawai->pendidikan as $key => $pen)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $pen->jenjang_pendidikan }}</td>
				<td>{{ $pen->jurusan }}</td>
				<td>{{ $pen->nama_sekolah }}</td>
				<td>{{ $pen->tahun_lulus }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->pelatihankepemimpinan->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="5">RIWAYAT PENDIDIKAN DAN PELATIHAN KEPEMIMPINAN</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Nama Diklat</th>
				<th>Angkatan/Tahun</th>
				<th>Tempat</th>
				<th>Panitia Penyelenggara</th>
			</tr>
			@foreach($pegawai->pelatihankepemimpinan as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->nama_diklat }}</td>
				<td>{{ $data->angkatan }} {{ $data->tahun }}</td>
				<td>{{ $data->tempat }}</td>
				<td>{{ $data->panitia }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->pelatihanteknis->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="5">RIWAYAT PENDIDIKAN/ PELATIHAN TEKNIS DAN PELATIHAN FUNGSIONAL</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Nama Diklat</th>
				<th>Angkatan/Tahun</th>
				<th>Tempat</th>
				<th>Panitia Penyelenggara</th>
			</tr>
			@foreach($pegawai->pelatihanteknis as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->nama_diklat }}</td>
				<td>{{ $data->angkatan }} {{ $data->tahun }}</td>
				<td>{{ $data->tempat }}</td>
				<td>{{ $data->panitia }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->organisasi->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="5">PENGALAMAN DALAM ORGANISASI</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Nama Organisasi</th>
				<th>Kedudukan Dalam Organisasi</th>
				<th>Tempat</th>
				<th>Nama Pimpinan</th>
			</tr>
			@foreach($pegawai->organisasi as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->nama_organisasi }}</td>
				<td>{{ $data->kedudukan }}</td>
				<td>{{ $data->tempat }}</td>
				<td>{{ $data->nama_pimpinan }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->penghargaan->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="4">RIWAYAT PENGHARGAAN/ TANDA JASA</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Penghargaan/Tanda Jasa</th>
				<th>Tahun</th>
				<th>Asal Perolehan</th>
			</tr>
			@foreach($pegawai->penghargaan as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->penghargaan }}</td>
				<td>{{ $data->tahun }}</td>
				<td>{{ $data->asal_perolehan }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->pasangan->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="5">DATA ISTERI/ SUAMI</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Nama</th>
				<th>Tempat dan Tgl Lahir</th>
				<th>Tgl Nikah</th>
				<th>Pekerjaan</th>
			</tr>
			@foreach($pegawai->pasangan as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->nama_pasangan }}</td>
				<td>{{ $data->tempat_lahir }}, {{ $data->tgl_lahir->isoFormat('DD-MMMM-Y') }}</td>
				<td>{{ $data->tgl_nikah->isoFormat('DD-MMMM-Y') }}</td>
				<td>{{ $data->pekerjaan }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->anak->count() == 0)
		@else
		<table class="table table-bordered mt-3">
			<tr>
				<th colspan="5">DATA ANAK</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Nama</th>
				<th>Tempat dan Tgl Lahir</th>
				<th>Status Anak</th>
				<th>Pekerjaan</th>
			</tr>
			@foreach($pegawai->anak as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->nama_anak }}</td>
				<td>{{ $data->tempat_lahir }}, {{ $data->tgl_lahir->isoFormat('DD-MMMM-Y') }}</td>
				<td>{{ $data->status_anak }}</td>
				<td>{{ $data->pekerjaan }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		@if ($pegawai->ortu->count() == 0)
		@else
		<table class="table table-bordered mt-3 mb-4">
			<tr>
				<th colspan="5">DATA ORANG TUA</th>
			</tr>
			<tr style="text-align: center;">
				<th>No</th>
				<th>Nama</th>
				<th>Tempat dan Tgl Lahir</th>
				<th>Ayah/Ibu</th>
				<th>Pekerjaan</th>
			</tr>
			@foreach($pegawai->ortu as $key => $data)
			<tr>
				<td style="text-align: center;">{{ ++$key }}</td>
				<td>{{ $data->nama_ortu }}</td>
				<td>{{ $data->tempat_lahir }} {{ $data->tgl_lahir->isoFormat('DD-MMMM-Y') }}</td>
				<td>{{ $data->status_ortu }}</td>
				<td>{{ $data->pekerjaan }}</td>
			</tr>
			@endforeach
		</table>
		@endif

		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-4 text-center">
				<strong class="mt-5">Pekanbaru, {{ \Carbon\Carbon::now()->isoFormat('DD-MMMM-Y') }}</strong>
				<br><br><br><br>
				<strong><u>{{ $pegawai->nama }}</u></strong><br>
				<span>{{ $pegawai->nip }}</span>
			</div>
		</div>


	</div>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
	</script>
</body>

</html>