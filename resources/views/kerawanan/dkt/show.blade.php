@extends('layouts.master')
@section('title','Daftar Kelurahan')
@section('content')

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Kelurahan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-kelompok-tani-kelurahan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	      		<input type="hidden" name="dkt_kecamatan_id" value="{{ $dkt->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kelurahan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="kelurahan" value="{{ old('kelurahan') }}" class="form-control" required>
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
@switch($edit)
	@case(1)
	@foreach($dkt->dktKelurahan as $data)
		<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		    	<div class="modal-content">
		        	<div class="modal-header bg-primary">
				        <strong style="font-size: 18px;">Edit Kelurahan</strong>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				            <span aria-hidden="true">&times;</span>
				        </button>
		        	</div>
			    	<form action="{{ route('data-kelompok-tani-kelurahan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
				      	@csrf
				      	@method('PUT')
					      <div class="modal-body">
						        <div class="form-group">
						        	<div class="row">
						        		<div class="col-lg-3">
						        			<strong>Kelurahan</strong>
						        		</div>
						        		<div class="col-lg-9">
						        			<input type="text" name="kelurahan" class="form-control" value="{{ $data->kelurahan }}">
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
	@break
@endswitch
<!-- Modal edit -->

<style type="text/css">
	.table thead tr th{color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table tbody tr td{text-align: center;font-size: 15px;color: black;}
</style>

<div class="main">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                    	<label style="margin-top: 10px;">
	                    	<a href="{{ route('data-kelompok-tani.index') }}" class="btn btn-default">Kembali</a>
	                    	@if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
	                    	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
	                    	@endif
                    	</label>
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title') - KECAMATAN {{ $dkt->kecamatan }}</h1>
                    </div>
                </div>
            </div>
		    <div class="col-lg-10">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content">
				        	@if(session('success'))
		                        <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
		                          {{ session('success') }}
		                        </div> 
		                    @endif

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Kelurahan</th>
		                        		<th>Jumlah Kelompok</th>
		                        		<th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($dkt->dktKelurahan as $key => $item)
		                        	<tr>
		                        		<td>{{ ++$key }}</td>
		                        		<td>{{ $item->kelurahan }}</td>
		                        		<td>{{ $item->dktKelompok->count() }}</td>
		                        		<td>
		                        			<form action="{{ route('data-kelompok-tani-kelurahan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
		                        				<a href="{{ route('data-kelompok-tani-kelurahan.show',$item->id) }}" title="Lihat" class="btn btn-info btn-sm" target="_blank"><i class="ti-eye"></i></a>
		                        				@if(Auth::user()->role_name=='Kadis Ketapang')
                                                @else
		                        				<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil"></i></a>
		                        				@csrf
		                        				@method('DELETE')
		                        				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data {{ $item->kelurahan }} ')" title="Delete"><i class="ti-trash"></i></button>
		                        				@endif
		                        			</form>
		                        		</td>
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