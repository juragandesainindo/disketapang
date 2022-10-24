@extends('layouts.adminKit')
@section('title','Detail Pegawai')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h3">@yield('title')</h1>
			<div>
				<a href="{{ route('pegawai-preview-pdf',$pegawai->id) }}" target="_blank" class="btn btn-success"><i
						data-feather="download-cloud"></i>&nbsp;
					pdf
				</a>
				<a href="{{ route('pegawais.index') }}" class="btn btn-secondary"><i
						data-feather="arrow-left-circle"></i>&nbsp;
					Back
				</a>
			</div>
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
										<input value="{{ $pegawai->tempat_lahir }}, {{ $pegawai->tgl_lahir }}" disabled
											class="form-control" type="text">
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

							</div>
							<div class="col-lg-6 col-md-12">
								<div class="row mb-3">
									<div class="col-3">
										<label>HP</label>
									</div>
									<div class="col-9">
										<input value="{{ $pegawai->no_hp }}" disabled class="form-control" type="text">
									</div>
								</div>
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
										<input value="{{ $pegawai->alamat }}" disabled class="form-control" type="text">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-3">
										<label>Pangkat</label>
									</div>
									<div class="col-9">
										@if ($pegawai->pegawaiPangkat->count() > 0)
										@foreach($pegawai->pegawaiPangkat->sortByDesc('tgl_sk')->take(1) as
										$data)
										<input value="{{ $data->nama_pangkat}}" disabled class="form-control"
											type="text">
										@endforeach
										@else
										<input value="-" disabled class="form-control" type="text">
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('umum.pegawai.modal.pangkat')

		{{-- Pangkat start --}}
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card flex-fill px-2 pb-2">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h5 class="card-title text-dark mb-0">Riwayat Kepangkatan</h5>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#createPangkat">
							<i data-feather="folder-plus"></i>&nbsp;
							Add Pangkat
						</button>
					</div>
					<div class="card-body">
						<table id="pangkat" class="table table-striped" style="width:100%;">
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
								@foreach ($pegawai->pegawaiPangkat as $key => $item)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $item->nama_pangkat }}</td>
									<td>{{ $item->no_sk }}</td>
									<td>{{ $item->tgl_sk }}</td>
									<td>{{ $item->tmt_pangkat }}</td>
									<td>
										@if ($item->foto === Null)
										<span class="text-secondary">Null</span>
										@else
										<a href="{{ asset('umum/pegawai/pangkat/'.$item->foto) }}" target="_blank">
											<img src="{{ asset('assets/folder.png') }}" width="36" height="36"
												class="rounded-circle me-2" alt="{{ $item->nama_pangkat }}">
											@endif
									</td>
									<td>
										<a href="#" data-bs-toggle="modal" data-bs-target="#editPangkat-{{ $item->id }}"
											class="btn btn-info btn-sm"><i data-feather="edit"></i></a>
										<a href="#" data-bs-toggle="modal"
											data-bs-target="#deletePangkat-{{ $item->id }}"
											class="btn btn-danger btn-sm"><i data-feather="trash"></i></a>
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
							Add Jabatan
						</button>
					</div>
					<div class="card-body">
						<table id="jabatan" class="table table-striped" style="width:100%;">
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

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		{{-- Jabatan end --}}
	</div>
</main>
@endsection

@push('js')
<script>
	$(document).ready(function () {
			$('#pangkat').DataTable({
			scrollX:true,
			});
			$('#jabatan').DataTable({
			scrollX:true,
			});
		});
</script>
@endpush