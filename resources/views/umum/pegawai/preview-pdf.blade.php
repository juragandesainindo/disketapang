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
		<img class="img-responsive" src="{{ asset('umum/pegawai/'.$pegawai->foto_diri) }}" alt="" />


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
					$pegawai->tgl_lahir }}</strong>
			</div>
			<div class="col-md-3">
				<span class="title">Agama</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->agama }}</strong>
			</div>
			@foreach($pegawai->pegawaiPangkat()->orderBy('tgl_sk','desc')->take(1)->get() as $data)
			<div class="col-md-3">
				<span class="title">Pangkat/Golongan</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $data->nama_pangkat }}, {{ $data->gol_pangkat }}</strong>
			</div>
			@endforeach
			<div class="col-md-3">
				<span class="title">HP</span>
			</div>
			<div class="col-md-9">
				<strong class="phone-number">: {{ $pegawai->no_hp }}</strong>
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
		</div>

		@if ($pegawai->pegawaiPangkat->count() == 0)
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
				@foreach($pegawai->pegawaiPangkat as $key => $p)
				<tr>
					<td style="text-align: center;">{{ ++$key }}</td>
					<td>{{ $p->nama_pangkat }}, {{ $p->gol_pangkat }}</td>
					<td>{{ $p->no_sk }}</td>
					<td>{{ $p->tgl_sk }}</td>
					<td>{{ $p->tmt_pangkat }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif


		<div class="row mt-5">
			<div class="col-md-6"></div>
			<div class="col-md-4 text-center">
				<strong class="mt-5">Pekanbaru, {{ \Carbon\Carbon::now() }}</strong>
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