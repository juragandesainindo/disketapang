@extends('layouts.adminKit')
@section('title','Detail Kendaraan')
@section('content')
<div class="modal fade" id="show-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			@if ($depan > 0)
			<img src="{{ asset('kendaraan/'.$depan) }}" width="100%">
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="show-img-kiri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			@if ($kiri > 0)
			<img src="{{ asset('kendaraan/'.$kiri) }}" width="100%">
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="show-img-kanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			@if ($kanan > 0)
			<img src="{{ asset('kendaraan/'.$kanan) }}" width="100%">
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="show-img-belakang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			@if ($belakang > 0)
			<img src="{{ asset('kendaraan/'.$belakang) }}" width="100%">
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="show-img-dalam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			@if ($dalam > 0)
			<img src="{{ asset('kendaraan/'.$dalam) }}" width="100%">
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="show-img-mesin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			@if ($mesin > 0)
			<img src="{{ asset('kendaraan/'.$mesin) }}" width="100%">
			@endif
		</div>
	</div>
</div>

<main class="content">
	<div class="container-fluid p-0">

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h3">@yield('title')</h1>
			<a href="{{ route('kendaraans.index') }}" class="btn btn-secondary"><i
					data-feather="arrow-left-circle"></i>&nbsp;
				Back
			</a>
		</div>

		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="form-group mb-3">
									<label>Nomor Registrasi</label>
									<input type="text" class="form-control" disabled
										value="{{ $kendaraan->registrasi }}">
								</div>
								<div class="form-group mb-3">
									<label>Merk</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->merk }}">
								</div>
								<div class="form-group mb-3">
									<label>Type</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->type }}">
								</div>
								<div class="form-group mb-3">
									<label>Jenis</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->jenis }}">
								</div>
								<div class="form-group mb-3">
									<label>Model</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->model }}">
								</div>
								<div class="form-group mb-3">
									<label>Tahun Pembuatan</label>
									<input type="text" class="form-control" disabled
										value="{{ $kendaraan->tahun_pembuatan }}">
								</div>
								<div class="form-group mb-3">
									<label>Isi Silinder</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->silinder }}">
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group mb-3">
									<label>Warna</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->warna }}">
								</div>
								<div class="form-group mb-3">
									<label>No Rangka</label>
									<input type="text" class="form-control" disabled
										value="{{ $kendaraan->no_rangka }}">
								</div>
								<div class="form-group mb-3">
									<label>No Mesin</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->no_mesin }}">
								</div>
								<div class="form-group mb-3">
									<label>Bahan Bakar</label>
									<input type="text" class="form-control" disabled
										value="{{ $kendaraan->bahan_bakar }}">
								</div>
								<div class="form-group mb-3">
									<label>Warna TNKB</label>
									<input type="text" class="form-control" disabled
										value="{{ $kendaraan->warna_tnkb }}">
								</div>
								<div class="form-group mb-3">
									<label>Berlaku</label>
									<input type="text" class="form-control" disabled value="{{ $kendaraan->berlaku }}">
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="row">
					<div class="col-lg-12 col-6">
						<div class="card position-relative">
							<img src="{{ asset('kendaraan/'.$depan) }}"
								style="width: 100%;height:14rem;object-fit:cover;">
							<p class="position-absolute top mt-1 badge bg-danger">Depan</p>
							<a href="#" class="position-absolute bottom-0 start-0 btn btn-primary btn-sm"
								data-bs-toggle="modal" data-bs-target="#show-img"><i data-feather="eye"></i></a>
						</div>
					</div>
					<div class="col-lg-12 col-6">
						<div class="row">
							@if ($kiri > 0)
							<div class="col-lg-6 col-6">
								<div class="card position-relative">
									<img src="{{ asset('kendaraan/'.$kiri) }}"
										style="width:100%;height:8rem;object-fit:cover;">
									<p class="position-absolute top mt-1 badge bg-danger">Samping Kiri</p>
									<a href="#" class="position-absolute bottom-0 start-0 btn btn-primary btn-sm"
										data-bs-toggle="modal" data-bs-target="#show-img-kiri"><i
											data-feather="eye"></i></a>
								</div>
							</div>
							@endif
							@if ($kanan > 0)
							<div class="col-lg-6 col-6">
								<div class="card position-relative">
									<img src="{{ asset('kendaraan/'.$kanan) }}"
										style="width:100%;height:8rem;object-fit:cover;">
									<p class="position-absolute top mt-1 badge bg-danger">Samping Kanan</p>
									<a href="#" class="position-absolute bottom-0 start-0 btn btn-primary btn-sm"
										data-bs-toggle="modal" data-bs-target="#show-img-kanan"><i
											data-feather="eye"></i></a>
								</div>
							</div>
							@endif
							@if ($belakang > 0)
							<div class="col-lg-6 col-6">
								<div class="card position-relative">
									<img src="{{ asset('kendaraan/'.$belakang) }}"
										style="width:100%;height:8rem;object-fit:cover;">
									<p class="position-absolute top mt-1 badge bg-danger">Belakang</p>
									<a href="#" class="position-absolute bottom-0 start-0 btn btn-primary btn-sm"
										data-bs-toggle="modal" data-bs-target="#show-img-belakang"><i
											data-feather="eye"></i></a>
								</div>
							</div>
							@endif
							@if ($dalam > 0)
							<div class="col-lg-6 col-6">
								<div class="card position-relative">
									<img src="{{ asset('kendaraan/'.$dalam) }}"
										style="width:100%;height:8rem;object-fit:cover;">
									<p class="position-absolute top mt-1 badge bg-danger">Dalam</p>
									<a href="#" class="position-absolute bottom-0 start-0 btn btn-primary btn-sm"
										data-bs-toggle="modal" data-bs-target="#show-img-dalam"><i
											data-feather="eye"></i></a>
								</div>
							</div>
							@endif
							@if ($mesin > 0)
							<div class="col-lg-6 col-6">
								<div class="card position-relative">
									<img src="{{ asset('kendaraan/'.$mesin) }}"
										style="width:100%;height:8rem;object-fit:cover;">
									<p class="position-absolute top mt-1 badge bg-danger">Mesin</p>
									<a href="#" class="position-absolute bottom-0 start-0 btn btn-primary btn-sm"
										data-bs-toggle="modal" data-bs-target="#show-img-mesin"><i
											data-feather="eye"></i></a>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection