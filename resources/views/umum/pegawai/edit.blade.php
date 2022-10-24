@extends('layouts.adminKit')
@section('title','Update Pegawai')
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

		<form action="{{ route('pegawais.update',$pegawai->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="card flex-fill px-2 pb-2">
								<div class="card-header">
									<strong>I. Identitas Pegawai</strong>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group mb-3">
												<label>NIP</label>
												<input type="text" name="nip" class="form-control @error('nip') is-invalid
                                                                                    @enderror"
													value="{{ old('nip') ?? $pegawai->nip }}" autofocus>
												@error('nip')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Nama</label>
												<input type="text" name="nama" class="form-control @error('nama') is-invalid
                                                                                    @enderror"
													value="{{ old('nama') ?? $pegawai->nama }}">
												@error('nama')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Jenis Kelamin</label>
												<select name="jk" class="form-control @error('jk') is-invalid
                                                                                    @enderror">
													<option value="{{ $pegawai->jk }}">{{ $pegawai->jk }}</option>
													<option value="Laki-laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
												@error('jk')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Tempat Lahir</label>
												<input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid
                                                                                    @enderror"
													value="{{ old('tempat_lahir') ?? $pegawai->tempat_lahir }}">
												@error('tempat_lahir')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Tgl Lahir</label>
												<input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid
                                                                                    @enderror"
													value="{{ old('tgl_lahir') ?? $pegawai->tgl_lahir }}">
												@error('tgl_lahir')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group mb-3">
												<label>Agama</label>
												<select name="agama" class="form-control @error('agama') is-invalid
                                                                                    @enderror">
													<option value="{{ $pegawai->agama }}">{{ $pegawai->agama }}</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Lainnya">Lainnya</option>
												</select>
												@error('agama')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>HP</label>
												<input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid
                                                                                    @enderror"
													value="{{ old('no_hp') ?? $pegawai->no_hp }}">
												@error('no_hp')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Email</label>
												<input type="email" name="email" class="form-control @error('email') is-invalid
                                                                                    @enderror"
													value="{{ old('email') ?? $pegawai->email }}">
												@error('email')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label>Alamat</label>
												<textarea name="alamat" class="form-control @error('alamat') is-invalid
                                                                                    @enderror"
													rows="2">{{ old('alamat') ?? $pegawai->alamat }}</textarea>
												@error('alamat')
												<div class="invalid-feedback">
													<span class="text-danger">{{ $message }}</span>
												</div>
												@enderror
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="card flex-fill px-2 pb-2">
								<div class="card-header">
									<strong>II. Image</strong>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label>Foto Diri &nbsp;<sup class="text-danger">(wajib diisi)</sup></label>
										<input name="foto_diri" id="image"
											value="{{ old('foto_diri') ?? $pegawai->foto_diri }}"
											class="form-control mb-2 @error('foto_diri') is-invalid @enderror"
											type="file" autofocus>
										<img src="{{ asset('umum/pegawai/'.$pegawai->foto_diri) }}"
											alt="{{ $pegawai->nama }}" width="100%">
										<img id="preview-image" class="img-preview">
										@error('foto_diri')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group">
										<label>KTP</label>
										<input name="ktp" id="imageKiri" value="{{ old('ktp') ?? $pegawai->ktp }}"
											class="form-control @error('ktp') is-invalid @enderror" type="file"
											autofocus>
										@if ($pegawai->ktp > 0)
										<img src="{{ asset('umum/pegawai/ktp/'.$pegawai->ktp) }}"
											alt="{{ $pegawai->nama }}" width="100%">
										@endif
										<img id="preview-image-kiri" class="img-preview">
										@error('ktp')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group">
										<label>KK</label>
										<input name="kk" id="imageKanan" value="{{ old('kk') ?? $pegawai->ktp }}"
											class="form-control @error('kk') is-invalid @enderror" type="file"
											autofocus>
										@if ($pegawai->kk > 0)
										<img src="{{ asset('umum/pegawai/kk/'.$pegawai->kk) }}"
											alt="{{ $pegawai->nama }}" width="100%">
										@endif
										<img id="preview-image-kanan" class="img-preview">
										@error('kk')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group">
										<label>Akte</label>
										<input name="akte" id="imageBelakang"
											value="{{ old('akte') ?? $pegawai->akte }}"
											class="form-control @error('akte') is-invalid @enderror" type="file"
											autofocus>
										@if ($pegawai->akte > 0)
										<img src="{{ asset('umum/pegawai/akte/'.$pegawai->akte) }}"
											alt="{{ $pegawai->nama }}" width="100%">
										@endif
										<img id="preview-image-belakang" class="img-preview">
										@error('akte')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group">
										<label>BPJS</label>
										<input name="bpjs" id="imageDalam" value="{{ old('bpjs') ?? $pegawai->bpjs }}"
											class="form-control @error('bpjs') is-invalid @enderror" type="file"
											autofocus>
										@if ($pegawai->bpjs > 0)
										<img src="{{ asset('umum/pegawai/bpjs/'.$pegawai->bpjs) }}"
											alt="{{ $pegawai->nama }}" width="100%">
										@endif
										<img id="preview-image-dalam" class="img-preview">
										@error('bpjs')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group">
										<label>NPWP</label>
										<input name="npwp" id="imageMesin" value="{{ old('npwp') ?? $pegawai->npwp }}"
											class="form-control @error('npwp') is-invalid @enderror" type="file"
											autofocus>
										@if ($pegawai->npwp > 0)
										<img src="{{ asset('umum/pegawai/npwp/'.$pegawai->npwp) }}"
											alt="{{ $pegawai->nama }}" width="100%">
										@endif
										<img id="preview-image-mesin" class="img-preview">
										@error('npwp')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 mt-3">
					<button type="submit" class="btn btn-primary btn-block">
						<i data-feather="save"></i>&nbsp;
						Update
					</button>
				</div>
		</form>

	</div>
</main>
@endsection