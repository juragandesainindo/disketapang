@extends('layouts.master')
@section('title','DAFTAR CADANGAN PANGAN')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>


<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Nama Tempat Usaha/Pedagang</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-cadangan-pangan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Tempat Usaha/Pedangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="pedagang" class="form-control" value="{{ old('pedagang') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Link Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="link" class="form-control" value="{{ old('link') }}" required>
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
	@foreach($cadangan as $data)
		<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-primary">
		        <strong style="font-size: 18px;">Edit Nama Tempat Usaha/Pedagang</strong>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="{{ route('data-cadangan-pangan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
		      	@csrf
		      	@method('PUT')
			      <div class="modal-body">
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Nama Tempat Usaha/Pedangan</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="pedagang" class="form-control" value="{{ $data->pedagang }}" required>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Alamat</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<textarea name="alamat" class="form-control">{{ $data->alamat }}</textarea>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Link Alamat</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="link" class="form-control" value="{{ $data->link }}" required>
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

<div class="main">
    <div class="container-fluid">
		<div class="row">

			<div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        <label></label>
                        @else
                    	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
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
		    
		    @if(Auth::user()->role_name=='Kadis Ketapang')
		    @else
		    <div class="col-lg-12">
		        <div class="card alert">
		            <form action="{{ route('data-cadangan-stok-excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                            <input type="date" class="form-control" placeholder="From Tanggal" id="from" name="from" required>
                            </div>
                            <div class="col-md-3">
                            <input type="date" class="form-control" placeholder="To Tanggal" id="to" name="to" required>
                            </div>
                            <button type="submit" class="btn btn-success" name="exportExcel">ExportExcel</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

		    <div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content">

	                        <table class="table table-striped table-hover">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                                <th>Nama Tempat Usaha</th>
		                                <th>Alamat</th>
		                                <th>Jmlh Item</th>
		                                <th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($cadangan as $key => $item)
	                        		<tr>
	                        			<td>{{ ++$key }}</td>
	                        			<td>{{ $item->pedagang }}</td>
	                        			<td>
	                        				<a href="{{ $item->link }}" target="_blank" class="text-info">{{ $item->alamat }}</a>
	                        			</td>
	                        			<td>{{ $item->stok->count() }}</td>
	                        			<td>
	                        				<form action="{{ route('data-cadangan-pangan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="{{ route('data-cadangan-pangan.show',$item->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
	                        					@if(Auth::user()->role_name=='Kadis Ketapang')
	                        					@else
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus {{ $item->pedagang }}')"><i class="ti-trash"></i></button>
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