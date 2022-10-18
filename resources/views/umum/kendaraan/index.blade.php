@extends('layouts.adminKit')
@section('title','DAFTAR KENDARAAN')

@section('content')

@foreach ($kendaraan as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Hapus Data</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('kendaraans.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('DELETE')
				<div class="modal-body">
					Apakah yakin ingin menghapus data ini ? <br>
					Nama : <strong>{{ $item->nama }}</strong> <br>
					Registrasi : <strong>{{ $item->registrasi }}</strong> <br>
					Merk : <strong>{{ $item->merk }}</strong> <br>
					Type : <strong>{{ $item->type }}</strong> <br>
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

<main class="content">
	<div class="container-fluid p-0">

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h3">@yield('title')</h1>
			<div>
				<a href="{{ route('kendaraan-export') }}" class="btn btn-outline-primary">
					<i data-feather="download-cloud"></i>&nbsp;
					Export Kendaraan
				</a>
				<a href="{{ route('kendaraans.create') }}" class="btn btn-primary">
					<i data-feather="folder-plus"></i>&nbsp;
					Create
				</a>
			</div>
		</div>

		<div class="row">
			@foreach ($kendaraan as $item)
			<div class="col-md-4 col-xl-4">
				<div class="card mb-3">
					<div class="card-header">
						<h5 class="card-title text-dark mb-0">{{ $item->registrasi }}</h5>
					</div>
					<div class="card-body text-center">
						<img src="{{ asset('kendaraan/'.$item->image) }}" alt="{{ $item->registrasi }}"
							class="img-fluid rounded-circle mb-2" style="width: 100px;height:100px;object-fit:cover;" />
						<h5 class="card-title mb-0">{{ $item->merk }}</h5>
						<div class="text-muted mb-2">{{ $item->type }}</div>
						<div class="text-muted mb-2">Berlaku : {{ $item->berlaku }}</div>

						<div>
							<a class="btn btn-info btn-sm" href="{{ route('kendaraans.show',$item->id) }}"><i
									data-feather="eye"></i> View</a>
							<a class="btn btn-primary btn-sm" href="{{ route('kendaraans.edit',$item->id) }}"><i
									data-feather="edit"></i> Edit</a>
							<a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal"
								data-bs-target="#delete-{{ $item->id }}"><i data-feather="trash"></i> Delete</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="d-flex justify-content-center mt-3">
			{{ $kendaraan->links('vendor.pagination.bootstrap-4') }}
		</div>
		<span class="d-flex justify-content-center">Jumlah baris : {{ $kendaraan->count() }}</span>
	</div>
</main>

@endsection