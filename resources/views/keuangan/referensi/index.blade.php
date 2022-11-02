@extends('layouts.master')
@section('title','Referensi Peraturan Per Undang-Undangan')
@section('content')

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
</style>


<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="color:black;">
			<div class="modal-header bg-primary">
				<strong style="font-size: 18px;">Tambah Data Referensi</strong>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('referensi-tufoksi.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body" style="overflow-y: auto;">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>Nomor Peraturan</strong>
							</div>
							<div class="col-lg-9">
								<input type="text" name="nomor_peraturan" class="form-control"
									value="{{ old('nomor_peraturan') }}" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>Uraian</strong>
							</div>
							<div class="col-lg-9">
								<input type="text" name="uraian" class="form-control" value="{{ old('uraian') }}"
									required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>Tanggal</strong>
							</div>
							<div class="col-lg-9">
								<input type="date" name="tanggal" value="{{ old('tanggal') }}" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>File Referensi</strong>
							</div>
							<div class="col-lg-9">
								<input type="file" name="file" class="form-control" value="{{ old('file') }}" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal add -->

<!-- Modal edit -->
@foreach($referensi as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="color:black;">
			<div class="modal-header bg-primary">
				<strong style="font-size: 18px;">Edit Data Referensi</strong>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('referensi-tufoksi.update',$item->id) }}" method="POST"
				enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="modal-body" style="overflow-y: auto;">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>Nomor Peraturan</strong>
							</div>
							<div class="col-lg-9">
								<input type="text" name="nomor_peraturan" class="form-control"
									value="{{ $item->nomor_peraturan }}" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>Uraian</strong>
							</div>
							<div class="col-lg-9">
								<input type="text" name="uraian" class="form-control" value="{{ $item->uraian }}"
									required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>Tanggal</strong>
							</div>
							<div class="col-lg-9">
								<input type="date" name="tanggal" value="{{ $item->tanggal }}" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<strong>File Referensi</strong>
							</div>
							<div class="col-lg-9">
								<input type="file" name="file" class="form-control" value="{{ $item->file }}">
								<span class="text-danger">{{ $item->file }}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Edit Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
<!-- Modal edit -->



<div class="main">
	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-12 p-0">
				<div class="page-header">
					<div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
						@if(Auth::user()->role_name=='Kadis Ketapang')
						@else
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i
								class="ti-plus-circle"></i> Tambah</a>
						@endif
						<h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
					</div>
				</div>
			</div>

			<div class="col-lg-12">
				@if(session('success'))
				<div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
					{{ session('success') }}
				</div>
				@endif
			</div>

			<div class="col-lg-12">
				<div class="card alert">
					<div class="card-body">
						<div class="tab-content" style="overflow-x: auto;">

							<table class="table table-striped table-hover" id="table1">
								<thead>
									<tr>
										<th>No</th>
										<th>Nomor Peraturan</th>
										<th>Uraian</th>
										<th>Tanggal</th>
										<th>File</th>
										@if(Auth::user()->role_name=='Kadis Ketapang')
										@else
										<th>Aksi</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($referensi as $key => $item)
									<tr>
										<td>{{ ++$key }}</td>
										<td>{{ $item->nomor_peraturan }}</td>
										<td>{{ $item->uraian }}</td>
										<td>{{ $item->tanggal }}</td>
										<td>
											<a href="{{ asset('keuangan/referensi/' . $item->file) }}" target="_blank">
												<span class="badge badge-primary">{{ Str::limit($item->file, 30)
													}}</span>
											</a>
										</td>
										@if(Auth::user()->role_name=='Kadis Ketapang')
										@else
										<td>
											<form action="{{ route('referensi-tufoksi.destroy',$item->id) }}"
												method="POST" enctype="multipart/form-data">
												<a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
													data-target="#edit-{{ $item->id }}"><i
														class="ti-pencil-alt"></i></a>
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm"
													onclick="return confirm('Apakah anda benar benar ingin menghapus data ini')"><i
														class="ti-trash"></i></button>
											</form>
										</td>
										@endif
									</tr>
									@endforeach
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop