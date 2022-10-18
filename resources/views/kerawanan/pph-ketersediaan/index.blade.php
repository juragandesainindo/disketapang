@extends('layouts.master')
@section('title','Skor PPH Ketersediaan')
@section('content')

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Skor PPH Ketersediaan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('skor-pph-ketersediaan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kelompok Bahan Makanan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="bahan_makanan" value="{{ old('bahan_makanan') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Energi</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="energi" value="{{ old('energi') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Skor PPH</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="skor_pph" value="{{ old('skor_pph') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tahun</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="tahun" value="{{ old('tahun') }}" class="form-control" required>
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
@foreach($data as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Skor PPH Ketersediaan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('skor-pph-ketersediaan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kelompok Bahan Makanan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="bahan_makanan" value="{{ $item->bahan_makanan }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Energi</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="energi" value="{{ $item->energi }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Skor PPH</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="skor_pph" value="{{ $item->skor_pph }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tahun</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="tahun" value="{{ $item->tahun }}" class="form-control" required>
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
	                    	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
	                    	
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')</h1>
                    </div>
                </div>
            </div>

		    <div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content" style="overflow-x:auto;">
				        	@if(session('success'))
		                        <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
		                          {{ session('success') }}
		                        </div> 
		                    @endif
		                    <form action="{{ route('skor-pph-ketersediaan.search') }}" method="GET">
                                <div class="form-group col-lg-4">
                                    <div class="input-group input-group-default">
                                        
                                        <input type="search" placeholder="Search Tahun" name="search" class="form-control">
                                        <span class="input-group-btn"><button class="btn btn-primary" type="submit"><i class="ti-search"></i></button></span>
                                    </div>
                                </div>
                            </form>
                            <br><br><br>
	                        <table class="table table-bordered table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Kelompok Bahan Makanan</th>
		                        		<th>Energi</th>
		                        		<th>Skor PPH</th>
		                        		<th>Tahun</th>
		                        		<th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($data as $key => $item)
		                        	<tr>
		                        		<td>{{ ++$key }}</td>
		                        		<td>{{ $item->bahan_makanan }}</td>
		                        		<td>{{ ($item->energi) }}</td>
		                        		<td>{{ $item->skor_pph }}</td>
		                        		<td>{{ $item->tahun }}</td>
		                        		<td>
		                        			<form action="{{ route('skor-pph-ketersediaan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
		                        				<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil"></i></a>
		                        				@csrf
		                        				@method('DELETE')
		                        				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini ')" title="Delete"><i class="ti-trash"></i></button>
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