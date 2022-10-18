@extends('layouts.adminKit')
@section('title','Detail Pegawai')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h3">@yield('title')</h1>
			<a href="{{ route('pegawais.index') }}" class="btn btn-secondary"><i
					data-feather="arrow-left-circle"></i>&nbsp;
				Back
			</a>
		</div>


		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card flex-fill px-2 pb-2">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="row mb-3">
									<div class="col-3">
										<label>Nama</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->nama }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>NIP</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->nip }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>JK</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->jk }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>TTL</label>
									</div>
									<div class="col-9">
										<input
											value="{{ $pegawai->tempat_lahir }}, {{ $pegawai->tgl_lahir->format('d-m-Y') }}"
											disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>Agama</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->agama }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>HP</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->telepon }}" disabled class="form-control"
											type="text">
									</div>
								</div>

							</div>
							<div class="col-lg-6 col-md-12">
								<div class="row mb-3">
									<div class="col-3">
										<label>Email</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->email }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>Alamat</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->alamat }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>Pendidikan</label>
									</div>
									<div class="col-9">
										@foreach($pegawai->pendidikan->sortByDesc('tahun_lulus')->take(1) as
										$pen)
										<input value="{{ $pen->jenjang_pendidikan }} {{
															$pen->jurusan }}" disabled class="form-control" type="text">
										@endforeach
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>Pangkat</label>
									</div>
									<div class="col-9">
										@foreach($pegawai->pangkat->sortByDesc('tgl_sk')->take(1) as
										$data)
										<input value="{{ $data->nama_pangkat}}" disabled class="form-control"
											type="text">
										@endforeach
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>NPWP</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->npwp }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>BPJS</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->bpjs }}" disabled class="form-control" type="text">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('umum.pegawai.modalCreate.index')

		{{-- Pangkat start --}}
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card flex-fill px-2 pb-2">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h5 class="card-title text-dark mb-0">Riwayat Kepangkatan</h5>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#createPangkat">
							<i data-feather="folder-plus"></i>&nbsp;
							Create
						</button>
					</div>
					<div class="card-body">
						<table id="example" class="table table-striped" style="width:100%;">
							<thead>
								<tr>
									<th>No</th>
									<th>Pangkat/Gol</th>
									<th>No SK</th>
									<th>Tgl SK</th>
									<th>TMT Pangkat</th>
									<th>File</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pegawai->pangkat as $key => $p)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $p->nama_pangkat }}</td>
									<td>{{ $p->no_sk }}</td>
									<td>{{ $p->tgl_sk }}</td>
									<td>{{ $p->tmt_pangkat }}</td>
									<td>
										@if ($p->foto === Null)
										<span class="text-secondary">Null</span>
										@else
										<a href="{{ asset('umum/pegawai/pangkat/'.$p->foto) }}" target="_blank">
											<img src="{{ asset('assets/folder.png') }}" width="36" height="36"
												class="rounded-circle me-2" alt="{{ $p->nama_pangkat }}">
										</a>
										@endif
									</td>
									<td>
										<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
											data-bs-target="#delete-{{ $p->id }}">
											<i data-feather="trash"></i>
										</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		{{-- Pangkat end --}}

		{{-- Jabatan start --}}
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card flex-fill px-2 pb-2">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h5 class="card-title text-dark mb-0">Riwayat Jabatan</h5>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#createPangkat">
							<i data-feather="folder-plus"></i>&nbsp;
							Create
						</button>
					</div>
					<div class="card-body">
						<table id="example" class="table table-striped" style="width:100%;">
							<thead>
								<tr>
									<th>No</th>
									<th>Pangkat/Gol</th>
									<th>No SK</th>
									<th>Tgl SK</th>
									<th>TMT Pangkat</th>
									<th>File</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pegawai->pangkat as $key => $p)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $p->nama_pangkat }}</td>
									<td>{{ $p->no_sk }}</td>
									<td>{{ $p->tgl_sk }}</td>
									<td>{{ $p->tmt_pangkat }}</td>
									<td>
										@if ($p->foto === Null)
										<span class="text-secondary">Null</span>
										@else
										<a href="{{ asset('umum/pegawai/pangkat/'.$p->foto) }}" target="_blank">
											<img src="{{ asset('assets/folder.png') }}" width="36" height="36"
												class="rounded-circle me-2" alt="{{ $p->nama_pangkat }}">
										</a>
										@endif
									</td>
									<td>
										<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
											data-bs-target="#delete-{{ $p->id }}">
											<i data-feather="trash"></i>
										</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		{{-- Jabatan end --}}
	</div>
</main>



<style type="text/css">
	.modal-body label {
		color: #333;
		font-weight: bold;
	}

	.modal-body input,
	.modal-body option,
	.modal-body textarea {
		font-size: 16px;
		color: #333;
	}

	/*.modal-content form{overflow-y: auto;overflow-x: hidden;height: 65vh;}*/
	table thead,
	table tbody tr td {
		color: #333;
		font-size: 16px;
	}

	.table thead tr th {
		text-align: center;
		color: black;
		font-weight: bold;
		text-align: center;
		font-size: 15px;
	}

	.table thead {
		background: #f7f7f7
	}

	.table tbody tr td {
		text-align: center;
		color: black;
		text-align: center;
		font-size: 15px;
	}

	.table tbody .img {
		max-width: 40px;
		border: 2px solid white;
		border-radius: 5px;
		-webkit-filter: drop-shadow(2px 2px 2px #222);
		filter: drop-shadow(2px 2px 2px #222);
	}

	.contact-title {
		width: 200px;
	}

	table .thead td {
		color: black;
		font-weight: bold;
		font-size: 16px;
		text-align: center;
	}

	table .tbody td {
		color: black;
	}

	.img-responsive {
		height: 250px;
		position: absolute;
		right: 15px;
		top: 80px;
	}
</style>

@include('umum.pegawai.modalShow.modalShow')

<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
				<div class="page-header">
					<div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
						<a href="{{ route('pegawais.index') }}" class="btn btn-default btn-outline">Kembali</a>
						<h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
					</div>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="card alert">
					<div class="card-body" style="overflow-x:auto;">
						<div class="user-profile">
							<div class="row">
								<div class="col-lg-12">
									<div class="user-profile-name" style="color: black;font-weight: bold;">{{
										$pegawai->nama }} / {{ $pegawai->nip }}</div>
									<a href="{{ route('pegawai-preview-pdf',$pegawai->id) }}" target="_blank"
										class="btn btn-info" style="float: right;">Preview PDF</a>
									<div class="custom-tab user-profile-tab">
										<ul class="nav nav-tabs" role="tablist">
											<li role="presentation" class="active"><a href="#1" aria-controls="1"
													role="tab" data-toggle="tab">Detail Pegawai</a></li>
											<li role="presentation"><a href="#2" aria-controls="2" role="tab"
													data-toggle="tab">Dokumen Pegawai</a></li>
										</ul>
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="1">
												<!-- Foto Diri -->
												<div class="user-photo">
													<a href="{{ asset('umum/pegawai/'.$pegawai->foto) }}"
														target="_blank"><img class="img-responsive"
															src="{{ asset('umum/pegawai/'.$pegawai->foto) }}"
															alt="" /></a>
												</div>
												<!-- End Foto Diri -->
												<div class="contact-information" style="color: black;">
													<div class="phone-content">
														<strong class="contact-title">NPWP</strong>
														<strong class="phone-number">{{ $pegawai->npwp }}</strong>
														@foreach($pegawai->image as $img)
														@if($img->keterangan=='NPWP')
														<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
															target="_blank">
															<img src="{{ asset('assets/folder.png') }}"
																style="height:50px;"></a>
														@endif
														@endforeach
													</div>
													<div class="phone-content">
														<strong class="contact-title">Jenis Kelamin</strong>
														<strong class="phone-number">{{ $pegawai->jk }}</strong>
														@foreach($pegawai->image as $img)
														@if($img->keterangan=='KTP')
														<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
															target="_blank">
															<img src="{{ asset('assets/folder.png') }}"
																style="height:50px;"></a>
														@endif
														@endforeach
													</div>
													<div class="phone-content">
														<strong class="contact-title">Tempat & Tgl Lahir</strong>
														<strong class="phone-number">{{ $pegawai->tempat_lahir }}, {{
															$pegawai->tgl_lahir->isoFormat('D MMMM Y') }}</strong>
														@foreach($pegawai->image as $img)
														@if($img->keterangan=='Akte Kelahiran')
														<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
															target="_blank">
															<img src="{{ asset('assets/folder.png') }}" class="m-l-45"
																style="height:50px;">
														</a>
														@endif
														@endforeach
													</div>
													<div class="phone-content">
														<strong class="contact-title">Agama</strong>
														<strong class="phone-number">{{ $pegawai->agama }}</strong>
													</div>
													@foreach($pegawai->pangkat->sortByDesc('tgl_sk')->take(1) as
													$data)
													<div class="phone-content">
														<strong class="contact-title">Pangkat/Golongan</strong>
														<strong class="phone-number">{{ $data->nama_pangkat
															}}</strong>
													</div>
													@endforeach
													@foreach($pegawai->pendidikan->sortByDesc('tahun_lulus')->take(1) as
													$pen)
													<div class="phone-content">
														<strong class="contact-title">Pendidikan Terakhir</strong>
														<strong class="phone-number">{{ $pen->jenjang_pendidikan }} {{
															$pen->jurusan }}</strong>
													</div>
													@endforeach
													@foreach($pegawai->jabatan->sortByDesc('tmt_jabatan')->take(1) as
													$pen)
													<div class="phone-content">
														<strong class="contact-title">Jabatan</strong>
														<strong class="phone-number">{{ $pen->nama_jabatan }}</strong>
													</div>
													@endforeach
													<div class="phone-content">
														<strong class="contact-title">Telepon</strong>
														<strong class="phone-number">{{ $pegawai->telepon }}</strong>
													</div>
													<div class="phone-content">
														<strong class="contact-title">Email</strong>
														<strong class="phone-number">{{ $pegawai->email }}</strong>
													</div>
													<div class="phone-content">
														<strong class="contact-title">Alamat</strong>
														<strong class="phone-number">{{ $pegawai->alamat }}</strong>
													</div>
													<div class="phone-content" style="display:flex;align-items:center;">
														<strong class="contact-title">No BPJS</strong>
														<strong class="phone-number">{{ $pegawai->bpjs }}</strong>
														@foreach($pegawai->image as $img)
														@if($img->keterangan=='BPJS')
														<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
															target="_blank">
															<img src="{{ asset('assets/folder.png') }}"
																style="height:50px;">
														</a>
														@endif
														@endforeach
													</div>
												</div>

												@if(session('success'))
												<div class="alert"
													style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
													{{ session('success') }}
												</div>
												@endif

												<!-- Start Pangkat -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT KEPANGKATAN</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal" data-target="#addPangkat">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Pangkat / Golongan</td>
														<td>No SK</td>
														<td>Tgl SK</td>
														<td>TMT Pangkat</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->pangkat as $key => $p)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $p->nama_pangkat }}</td>
														<td>{{ $p->no_sk }}</td>
														<td>{{ $p->tgl_sk->isoFormat('DD-MM-Y') }}</td>
														<td>{{ $p->tmt_pangkat->isoFormat('DD-MM-Y') }}</td>
														<td>
															@if(File::exists('umum/pegawai/pangkat'.$p->foto))
															N/A
															@else
															<a href="{{ asset('umum/pegawai/pangkat/'.$p->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>

														<td style="text-align: center;">
															<form action="{{ route('pegawai-pangkat.destroy',$p->id) }}"
																method="POST" enctype="multipart/form-data">
																<a href="#" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editPangkat-{{ $p->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Pangkat -->

												<!-- Jabatan -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT JABATAN</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal" data-target="#addJabatan">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Jabatan</td>
														<td>Eselon</td>
														<td>TMT Jabatan</td>
														<td>Masa Jabatan</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>



													@foreach($pegawai->jabatan as $key => $j)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $j->nama_jabatan }}</td>
														<td>{{ $j->eselon }}</td>
														<td>{{ $j->tmt_jabatan->isoFormat('DD-MM-Y') }}</td>
														<td>
															{{ $j->tmt_jabatan->isoFormat('DD-MM-Y') }}
														</td>
														<td>
															@if(File::exists('umum/pegawai/jabatan'.$j->foto))
															N/A
															@else
															<a href="{{ asset('umum/pegawai/jabatan/'.$j->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form action="{{ route('pegawai-jabatan.destroy',$j->id) }}"
																method="POST">
																<a href="#" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editJabatan-{{ $j->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Jabatan -->

												<!-- Pendidikan Umum -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT PENDIDIKAN UMUM</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal"
																data-target="#addPendidikanUmum">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Jenjang Pendidikan</td>
														<td>Fakultas/Jurusan</td>
														<td>Nama Sekolah/Univ.</td>
														<td>Tahun Lulus</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->pendidikan->sortByDesc('tahun_lulus') as $key =>
													$pen)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $pen->jenjang_pendidikan }}</td>
														<td>{{ $pen->jurusan }}</td>
														<td>{{ $pen->nama_sekolah }}</td>
														<td>{{ $pen->tahun_lulus }}</td>
														<td>
															@if(File::exists('umum/pegawai/pendidikan-umum'.$pen->foto))
															N/A
															@else
															<a href="{{ asset('umum/pegawai/pendidikan-umum/'.$pen->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-pendidikan-umum.destroy',$pen->id) }}"
																method="POST">
																<a href="#" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editPendidikanUmum-{{ $pen->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data pendidikan umum ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Pendidikan Umum -->

												<!-- Pendidikan Kepemimpinan -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT PENDIDIKAN DAN PELATIHAN KEPEMIMPINAN</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal"
																data-target="#addPelatihanKepemimpinan">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Nama Diklat</td>
														<td>Angkatan/Tahun</td>
														<td>Tempat</td>
														<td>Panitia Penyelenggara</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->pelatihankepemimpinan as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->nama_diklat }}</td>
														<td>{{ $data->angkatan }} {{ $data->tahun }}</td>
														<td>{{ $data->tempat }}</td>
														<td>{{ $data->panitia }}</td>
														<td>
															@if(File::exists('umum/pegawai/pelatihan-kepemimpinan/{{
															$data->foto }}'))
															N/A
															@else
															<a href="{{ asset('umum/pegawai/pelatihan-kepemimpinan/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-pelatihan-kepemimpinan.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editPelatihanKepemimpinan-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data pelatihan kepemimpinan ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Pendidikan Kepemimpinan -->

												<!-- Pendidikan Teknis -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT PENDIDIKAN/ PELATIHAN TEKNIS DAN PELATIHAN
															FUNGSIONAL</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal"
																data-target="#addPelatihanTeknis">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Nama Diklat</td>
														<td>Angkatan/Tahun</td>
														<td>Tempat</td>
														<td>Panitia Penyelenggara</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->pelatihanteknis as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->nama_diklat }}</td>
														<td>{{ $data->angkatan }} {{ $data->tahun }}</td>
														<td>{{ $data->tempat }}</td>
														<td>{{ $data->panitia }}</td>
														<td>
															@if(File::exists('umum/pegawai/pelatihan-teknis'.$data->foto))
															N/A
															@else
															<a href="{{ asset('umum/pegawai/pelatihan-teknis/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-pelatihan-teknis.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editPelatihanTeknis-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data pelatihan teknis ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Pendidikan Teknis -->

												<!-- Organisasi -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															PENGALAMAN DALAM ORGANISASI</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal"
																data-target="#addOrganisasi">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Nama Organisasi</td>
														<td>Kedudukan Dalam Organisasi</td>
														<td>Tempat</td>
														<td>Nama Pimpinan</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->organisasi as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->nama_organisasi }}</td>
														<td>{{ $data->kedudukan }}</td>
														<td>{{ $data->tempat }}</td>
														<td>{{ $data->nama_pimpinan }}</td>
														<td>
															@if(File::exists('umum/pegawai/organisasi'.$data->foto))
															N/A
															@else
															<a href="{{ asset('umum/pegawai/organisasi/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-organisasi.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editOrganisasi-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data organisasi ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Organisasi -->

												<!-- Penghargaan / Tanda Jasa -->
												<table class="table table-bordered">
													<tr>
														<td colspan="5"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT PENGHARGAAN/ TANDA JASA</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal"
																data-target="#addPenghargaan">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Penghargaan/Tanda Jasa</td>
														<td>Tahun</td>
														<td>Asal Perolehan</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->penghargaan as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->penghargaan }}</td>
														<td>{{ $data->tahun }}</td>
														<td>{{ $data->asal_perolehan }}</td>
														<td>
															@if(File::exists('umum/pegawai/penghargaan'.$data->foto))
															@else
															<a href="{{ asset('umum/pegawai/penghargaan/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-penghargaan.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editPenghargaan-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data penghargaan ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Penghargaan / Tanda Jasa -->

												<!-- Suami/Istri -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															DATA ISTERI/ SUAMI</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal"
																data-target="#addPasangan">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Nama</td>
														<td>Tempat dan Tgl Lahir</td>
														<td>Tgl Nikah</td>
														<td>Pekerjaan</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->pasangan as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->nama_pasangan }}</td>
														<td>{{ $data->tempat_lahir }}, {{
															$data->tgl_lahir->isoFormat('DD-MMMM-Y') }}</td>
														<td>{{ $data->tgl_nikah->isoFormat('DD-MMMM-Y') }}</td>
														<td>{{ $data->pekerjaan }}</td>
														<td>
															@if(File::exists('umum/pegawai/pasangan'.$data->foto))
															@else
															<a href="{{ asset('umum/pegawai/pasangan/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
															@endif
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-pasangan.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editPasangan-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data pasangan ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Suami/Istri -->

												<!-- Anak -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															DATA ANAK</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal" data-target="#addAnak">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Nama</td>
														<td>Tempat dan Tgl Lahir</td>
														<td>Status Anak</td>
														<td>Pekerjaan</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->anak as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->nama_anak }}</td>
														<td>{{ $data->tempat_lahir }}, {{
															$data->tgl_lahir->isoFormat('DD-MMMM-Y') }}</td>
														<td>{{ $data->status_anak }}</td>
														<td>{{ $data->pekerjaan }}</td>
														<td>
															<a href="{{ asset('umum/pegawai/anak/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
														</td>
														<td style="text-align: center;">
															<form action="{{ route('pegawai-anak.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editAnak-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data anak ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Anak -->

												<!-- Orangtua -->
												<table class="table table-bordered">
													<tr>
														<td colspan="6"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															DATA ORANG TUA</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="" class="btn btn-primary btn-outline"
																data-toggle="modal" data-target="#addOrtu">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Nama</td>
														<td>Tempat dan Tgl Lahir</td>
														<td>Ayah/Ibu</td>
														<td>Pekerjaan</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->ortu as $key => $data)
													<tr class="tbody">
														<td style="text-align: center;">{{ ++$key }}</td>
														<td>{{ $data->nama_ortu }}</td>
														<td>{{ $data->tempat_lahir }} {{
															$data->tgl_lahir->isoFormat('DD-MMMM-Y') }}</td>
														<td>{{ $data->status_ortu }}</td>
														<td>{{ $data->pekerjaan }}</td>
														<td>
															<a href="{{ asset('umum/pegawai/ortu/'.$data->foto) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
														</td>
														<td style="text-align: center;">
															<form action="{{ route('pegawai-ortu.destroy',$data->id) }}"
																method="POST">
																<a href="" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editOrtu-{{ $data->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data ortu ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Orangtua -->

												<!-- Gaji Berkala -->
												<table class="table table-bordered">
													<tr>
														<td colspan="9"
															style="text-align: left;font-weight: bold;color: black;font-size: 18px;">
															RIWAYAT GAJI BERKALA</td>
														<td colspan="1"
															style="text-align: center;font-weight: bold;color: black;font-size: 18px;">
															<a href="#" class="btn btn-primary btn-outline"
																data-toggle="modal" data-target="#addGaji">Tambah</a>
														</td>
													</tr>
													<tr class="thead">
														<td>No</td>
														<td>Pangkat / Golongan</td>
														<td>No SK</td>
														<td>Tgl SK</td>
														<td>TMT KGB</td>
														<td>Jabatan</td>
														<td>Masa Kerja</td>
														<td>Gaji Pokok</td>
														<td>File</td>
														<td style="text-align: center;">Aksi</td>
													</tr>
													@foreach($pegawai->pegawaiGaji as $key => $item)
													<tr class="tbody">
														<td>{{ ++$key }}</td>
														<td>{{ $item->pangkat->nama_pangkat }}</td>
														<td>{{ $item->pangkat->no_sk }}</td>
														<td>{{ $item->pangkat->tgl_sk->isoFormat('DD MMMM Y') }}</td>
														<td>{{ $item->tmt_kgb->isoFormat('DD MMMM Y') }}</td>
														<td>{{ $item->jabatan }}</td>
														<td>{{ $item->masa_kerja }}</td>
														<td>{{ number_format($item->gaji_pokok) }}</td>
														<td>
															<a href="{{ asset('umum/pegawai/gaji/'.$item->file) }}"
																target="_blank">
																<img src="{{ asset('assets/folder.png') }}"
																	width="30px">
															</a>
														</td>
														<td style="text-align: center;">
															<form
																action="{{ route('pegawai-gaji-berkala.destroy',$item->id) }}"
																method="POST" enctype="multipart/form-data">
																<a href="#" class="btn btn-warning btn-sm"
																	data-toggle="modal"
																	data-target="#editGaji-{{ $item->id }}"><i
																		class="ti-pencil"></i></a>
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm"
																	onclick="return confirm('Apakah anda benar benar ingin menghapus data ini.')"><i
																		class="ti-trash"></i></button>
															</form>
														</td>
													</tr>
													@endforeach
												</table>
												<!-- End Gaji Berkala -->
											</div>
											<div role="tabpanel" class="tab-pane" id="2">
												<div class="gallery">
													<a href="#" class="btn btn-primary" data-toggle="modal"
														data-target="#addDokumenPegawai">Tambah Dokumen
														Pegawai</a>
													<br><br>

													@foreach($pegawai->image as $img)
													<div class="col-md-4">
														<div class="thumbnail">
															<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																target="_blank">
																@if($img->image_pegawai=='.jpg')
																<img src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																	alt="Lights" style="width:100%">
																@else
																<embed type="application/pdf"
																	src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																	class="img-rounded img-responsive"
																	alt="Cinque Terre"></embed type="application/pdf">
																@endif
																<div class="caption">
																	<p>
																	<h4><span class="text-info"></span></h4>
																	@if(Auth::user()->role_name=='Kadis Ketapang')
																	@else
																	<form action="" method="POST"
																		enctype="multipart/form-data">
																		<a href="#" class="btn btn-warning btn-sm"
																			data-toggle="modal" data-target="#edit"
																			title="Edit">Edit</a>
																		@csrf
																		@method('DELETE')
																		<button type="submit"
																			class="btn btn-danger btn-sm"
																			onclick="return confirm('Apakah anda ingin menghapus data ini ')"
																			title="Delete">Hapus</button>
																	</form>
																	@endif
																	</p>
																</div>
															</a>
														</div>
													</div>
													@endforeach

													<div class="card-body">
														<div class="row">
															@foreach($pegawai->image as $img)
															@if($img->keterangan=='KTP')
															<div class="col-md-4">
																<div class="thumbnail">
																	<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																		target="_blank">
																		@if($img->image_pegawai=='.pdf')
																		<embed type="application/pdf"
																			src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			class="img-rounded img-responsive"
																			alt="Cinque Terre"></embed
																			type="application/pdf">
																		@else
																		<img src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			alt="Lights" style="width:100%">
																		@endif
																		<div class="caption"
																			style="display: flex;justify-content: space-between;align-items: center;">
																			<p>Dokumen KTP</p>
																			<form
																				action="{{ route('pegawai-dokumen-pegawai.destroy',$img->id) }}"
																				method="POST"
																				enctype="multipart/form-data">
																				<a href=""
																					class="btn btn-warning btn-sm"
																					data-toggle="modal"
																					data-target="#editDokumenPegawai-{{ $img->id }}"><i
																						class="ti-pencil-alt"></i></a>
																				@csrf
																				@method('DELETE')
																				<button type="submit"
																					class="btn btn-danger btn-sm"
																					onclick="return confirm('Apakah anda yakin ingin menghapus {{ $img->keterangan }}')"><i
																						class="ti-trash"></i></button>
																			</form>
																		</div>
																	</a>
																</div>
															</div>
															@endif
															@if($img->keterangan=='KK')
															<div class="col-md-4">
																<div class="thumbnail">
																	<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																		target="_blank">
																		@if($img->image_pegawai=='.pdf')
																		<embed type="application/pdf"
																			src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			class="img-rounded img-responsive"
																			alt="Cinque Terre"></embed
																			type="application/pdf">
																		@else
																		<img src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			alt="Lights" style="width:100%">
																		@endif
																		<div class="caption"
																			style="display: flex;justify-content: space-between;align-items: center;">
																			<p>Dokumen Kartu Keluarga</p>
																			<form
																				action="{{ route('pegawai-dokumen-pegawai.destroy',$img->id) }}"
																				method="POST"
																				enctype="multipart/form-data">
																				<a href=""
																					class="btn btn-warning btn-sm"
																					data-toggle="modal"
																					data-target="#editDokumenPegawai-{{ $img->id }}"><i
																						class="ti-pencil-alt"></i></a>
																				@csrf
																				@method('DELETE')
																				<button type="submit"
																					class="btn btn-danger btn-sm"
																					onclick="return confirm('Apakah anda yakin ingin menghapus {{ $img->keterangan }}')"><i
																						class="ti-trash"></i></button>
																			</form>
																		</div>
																	</a>
																</div>
															</div>
															@endif
															@if($img->keterangan=='Akte Kelahiran')
															<div class="col-md-4">
																<div class="thumbnail">
																	<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																		target="_blank">
																		@if($img->image_pegawai=='.pdf')
																		<embed type="application/pdf"
																			src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			class="img-rounded img-responsive"
																			alt="Cinque Terre"></embed
																			type="application/pdf">
																		@else
																		<img src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			alt="Lights" style="width:100%">
																		@endif
																		<div class="caption"
																			style="display: flex;justify-content: space-between;align-items: center;">
																			<p>Dokumen Akte Kelahiran</p>
																			<form
																				action="{{ route('pegawai-dokumen-pegawai.destroy',$img->id) }}"
																				method="POST"
																				enctype="multipart/form-data">
																				<a href=""
																					class="btn btn-warning btn-sm"
																					data-toggle="modal"
																					data-target="#editDokumenPegawai-{{ $img->id }}"><i
																						class="ti-pencil-alt"></i></a>
																				@csrf
																				@method('DELETE')
																				<button type="submit"
																					class="btn btn-danger btn-sm"
																					onclick="return confirm('Apakah anda yakin ingin menghapus {{ $img->keterangan }}')"><i
																						class="ti-trash"></i></button>
																			</form>
																		</div>
																	</a>
																</div>
															</div>
															@endif
															@if($img->keterangan=='BPJS')
															<div class="col-md-4">
																<div class="thumbnail">
																	<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																		target="_blank">
																		@if($img->image_pegawai=='.pdf')
																		<embed type="application/pdf"
																			src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			class="img-rounded img-responsive"
																			alt="Cinque Terre"></embed
																			type="application/pdf">
																		@else
																		<img src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			alt="Lights" style="width:100%">
																		@endif
																		<div class="caption"
																			style="display: flex;justify-content: space-between;align-items: center;">
																			<p>Dokumen BPJS</p>
																			<form
																				action="{{ route('pegawai-dokumen-pegawai.destroy',$img->id) }}"
																				method="POST"
																				enctype="multipart/form-data">
																				<a href=""
																					class="btn btn-warning btn-sm"
																					data-toggle="modal"
																					data-target="#editDokumenPegawai-{{ $img->id }}"><i
																						class="ti-pencil-alt"></i></a>
																				@csrf
																				@method('DELETE')
																				<button type="submit"
																					class="btn btn-danger btn-sm"
																					onclick="return confirm('Apakah anda yakin ingin menghapus {{ $img->keterangan }}')"><i
																						class="ti-trash"></i></button>
																			</form>
																		</div>
																	</a>
																</div>
															</div>
															@endif
															@if($img->keterangan=='NPWP')
															<div class="col-md-4">
																<div class="thumbnail">
																	<a href="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																		target="_blank">
																		@if($img->image_pegawai=='.pdf')
																		<embed type="application/pdf"
																			src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			class="img-rounded img-responsive"
																			alt="Cinque Terre"></embed
																			type="application/pdf">
																		@else
																		<img src="{{ asset('umum/pegawai/dokumen/'.$img->image_pegawai) }}"
																			alt="Lights" style="width:100%">
																		@endif
																		<div class="caption"
																			style="display: flex;justify-content: space-between;align-items: center;">
																			<p>Dokumen NPWP</p>
																			<form
																				action="{{ route('pegawai-dokumen-pegawai.destroy',$img->id) }}"
																				method="POST"
																				enctype="multipart/form-data">
																				<a href=""
																					class="btn btn-warning btn-sm"
																					data-toggle="modal"
																					data-target="#editDokumenPegawai-{{ $img->id }}"><i
																						class="ti-pencil-alt"></i></a>
																				@csrf
																				@method('DELETE')
																				<button type="submit"
																					class="btn btn-danger btn-sm"
																					onclick="return confirm('Apakah anda yakin ingin menghapus {{ $img->keterangan }}')"><i
																						class="ti-trash"></i></button>
																			</form>
																		</div>
																	</a>
																</div>
															</div>
															@endif
															@endforeach
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection