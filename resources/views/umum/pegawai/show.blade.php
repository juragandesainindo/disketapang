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
			<div class="col-12 col-lg-3">
				<div class="card">
					<img class="card-img-top" src="{{ asset('umum/pegawai/'.$pegawai->foto_diri) }}"
						style="height: 200px;object-fit: cover;">
					<div class="card-header">
						<h5 class="card-title mb-0">Foto Diri</h5>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-9">
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


		{{-- Pangkat --}}
		@include('umum.pegawai.modal.pangkat')

		{{-- Jabatan --}}
		@include('umum.pegawai.modal.jabatan')

		{{-- Pendidikan Umum --}}
		@include('umum.pegawai.modal.pendidikanUmum')

		{{-- Pelatihan Kepemimpinan --}}
		@include('umum.pegawai.modal.pelatihanKepemimpinan')

		{{-- Pelatihan Teknis --}}
		@include('umum.pegawai.modal.pelatihanTeknis')

		{{-- Organisasi --}}
		@include('umum.pegawai.modal.organisasi')

		{{-- Penghargaan --}}
		@include('umum.pegawai.modal.penghargaan')

		{{-- Pasangan --}}
		@include('umum.pegawai.modal.pasangan')

		{{-- Anak --}}
		@include('umum.pegawai.modal.anak')

		{{-- Ortu --}}
		@include('umum.pegawai.modal.ortu')

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
			$('#pendidikanUmum').DataTable({
			scrollX:true,
			});
			$('#pelatihanKepemimpinan').DataTable({
			scrollX:true,
			});
			$('#pelatihanTeknis').DataTable({
			scrollX:true,
			});
			$('#organisasi').DataTable({
			scrollX:true,
			});
			$('#pegawaiPenghargaan').DataTable({
			scrollX:true,
			});
			$('#pegawaiPasangan').DataTable({
			scrollX:true,
			});
			$('#pegawaiAnak').DataTable({
			scrollX:true,
			});
			$('#pegawaiOrtu').DataTable({
			scrollX:true,
			});
		});
</script>
@endpush