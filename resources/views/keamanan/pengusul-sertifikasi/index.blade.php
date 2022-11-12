@extends('layouts.master')
@section('title','KELOMPOK TANI YANG SUDAH MEMILIKI SERTIFIKASI PRIMA 3')
@section('content')

<!-- Modal add sop -->
@foreach ($data as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<strong style="font-size: 18px;">Hapus Data</strong>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('pengusul-sertifikasi.destroy',$item->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<div class="modal-body">
					Apakah yakin ingin menghapus data ini ? <br>
					Nama Kelompok : <strong>{{ $item->dktKelompok->nama_dkt }}</strong>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Ya, hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
<!-- Modal add -->

<style type="text/css">
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

<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
				<div class="page-header">
					<div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
						@if(Auth::user()->role_name=='Kadis Ketapang')
						<label></label>
						@else
						<a href="{{ route('pengusul-sertifikasi.create') }}" class="btn btn-info">Tambah</a>
						@endif
						<h1 class="text-primary">@yield('title')</h1>
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

							<table class="table table-hover" id="table1">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kelompok Tani</th>
										<th>Nama Ketua</th>
										<th>Alamat</th>
										<th>Kecamatan</th>
										@if(Auth::user()->role_name=='Kadis Ketapang')
										@else
										<th>Aksi</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key => $item)
									<tr>
										<td>{{ ++$key }}</td>
										<td>{{ $item->dktKelompok->nama_dkt }}</td>
										<td>{{ $item->dktKelompok->ketua }}</td>
										<td>{{ $item->dktKelompok->alamat }}</td>
										<td>{{ $item->dktKelompok->dktKecamatan->kecamatan }}</td>
										@if(Auth::user()->role_name=='Kadis Ketapang')
										@else
										<td>
											<a href="{{ route('pengusul-sertifikasi.edit',$item->id) }}"
												class="btn btn-warning btn-sm"><i class="ti-pencil-alt"></i></a>
											<a href="#" data-toggle="modal" data-target="#delete-{{ $item->id }}"
												class="btn btn-danger btn-sm">
												<i class="ti-trash"></i>
											</a>
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
		<br>
	</div>
</div>

@endsection

@push('js')
<script type="text/javascript">
	$(document).ready(function() {
	        $('.js-example-basic-single').select2();
	        });
</script>
@endpush