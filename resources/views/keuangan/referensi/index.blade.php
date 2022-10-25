@extends('layouts.adminKit')
@section('title','Referensi Peraturan Per Undang-Undangan')
@section('content')

<main class="content">
	<div class="container-fluid p-0">

		@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong>&nbsp; {{ session()->get('success') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h3">@yield('title')</h1>
			<div>
				<a href="{{ route('referensi-tufoksi.create') }}" class="btn btn-primary">
					<i data-feather="folder-plus"></i>&nbsp;
					Create
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="card flex-fill px-3 pb-3 pt-3">

					<table id="example" class="table table-striped" style="width:100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomor Peraturan</th>
								<th>Uraian</th>
								<th>Tanggal</th>
								<th>File</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($referensi as $key => $item)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $item->nomor_peraturan }}</td>
								<td>{{ $item->uraian }}</td>
								<td>{{ $item->tanggal }}</td>
								<td>
									<a href="{{ asset('keuangan/referensi/'.$item->file) }}" target="_blank">
										<img src="{{ asset('assets/folder.png') }}" width="50">
									</a>
								</td>
								<td>
									<a href="{{ route('referensi-tufoksi.edit',$item->id) }}"
										class="btn btn-info btn-sm mb-1"><i data-feather="edit"></i></a>
									<a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
										data-bs-target="#delete-{{ $item->id }}"><i data-feather="trash"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

@foreach ($referensi as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('referensi-tufoksi.destroy',$item->id) }}" method="POST"
				enctype="multipart/form-data">
				@csrf
				@method('DELETE')
				<div class="modal-body">
					Apakah yakin ingin menghapus data ini ? <br>
					Nomor Peraturan : <strong>{{ $item->nomor_peraturan }}</strong> <br>
					Tanggal : <strong>{{ $item->tanggal }}</strong> <br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Ya, hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection