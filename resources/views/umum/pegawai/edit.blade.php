@extends('layouts.master')

@section('content')

<style type="text/css">
	label {
		color: black;
		font-size: 16px;
	}

	p {
		color: black;
		font-size: 16px;
	}
</style>

<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card alert">
					<div class="card-body">
						<div class="tab-content">
							@if(session('success'))
							<div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
								{{ session('success') }}
							</div>
							@endif
							<div class="car"
								style="display: flex;justify-content: space-between;align-items: center;margin: 20px 0px;">
								<a href="#" class="btn btn-default btn-outline"><i class="ti-arrow-circle-left"></i>
									Kembali</a>
								<strong style="font-size: 18px;" class="text-primary">EDIT PEGAWAI</strong>
							</div>


							<form action="{{ route('pegawais.update',$pegawai->id) }}" method="POST"
								enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>NIP</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="nip" class="form-control"
													value="{{ $pegawai->nip }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Nama</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="nama" class="form-control"
													value="{{ $pegawai->nama }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>NPWP</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="npwp" class="form-control"
													value="{{ $pegawai->npwp }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Jenis Kelamin</label>
											</div>
											<div class="col-lg-9">
												<select name="jk" class="form-control">
													<option value="{{ $pegawai->jk }}">{{ $pegawai->jk }}</option>
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Tempat Lahir</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="tempat_lahir" class="form-control"
													value="{{ $pegawai->tempat_lahir }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Tgl Lahir</label>
											</div>
											<div class="col-lg-9">
												<input type="date" name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}"
													required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Agama</label>
											</div>
											<div class="col-lg-9">
												<select name="agama" class="form-control" required>
													<option value="{{ $pegawai->agama }}">{{ $pegawai->agama }}</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Lainnya">Lainnya</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Telepon</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="telepon" class="form-control"
													value="{{ $pegawai->telepon }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Email</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="email" class="form-control"
													value="{{ $pegawai->email }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Alamat</label>
											</div>
											<div class="col-lg-9">
												<textarea name="alamat" class="form-control"
													rows="2">{{ $pegawai->alamat }}</textarea>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>No BPJS</label>
											</div>
											<div class="col-lg-9">
												<input type="text" name="bpjs" class="form-control"
													value="{{ $pegawai->bpjs }}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>Foto Diri</label>
											</div>
											<div class="col-lg-9">
												<input type="file" name="foto" class="form-control">
												<img src="{{ asset('umum/pegawai/'.$pegawai->foto) }}" width="50"
													style="margin-top: 5px;">
												<span>{{ $pegawai->foto }}</span>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Edit Data</button>
									<a href="{{ route('pegawais.index') }}"
										class="btn btn-default btn-outline">Kembali</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop