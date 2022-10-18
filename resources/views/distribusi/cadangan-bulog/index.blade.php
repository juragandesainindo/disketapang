@extends('layouts.master')
@section('title','DAFTAR CADANGAN BULOG')
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
        <strong style="font-size: 18px;">Tambah Cadangan Bulog</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('cadangan-bulog.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Pengadaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="pengadaan" class="form-control" value="{{ old('pengadaan') }}" placeholder="ex: Beras" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Stok</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="number" name="stok" class="form-control" value="{{ old('stok') }}" placeholder="ex: 15000" required>
		        			<span class="text-danger">Input angka stok tanpa ada tanda titik (.) atau yang lainnya</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tgl Stok</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="date" name="tgl_stok" value="{{ old('tgl_stok') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Belanja</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="number" name="belanja" class="form-control" value="{{ old('belanja') }}" placeholder="ex: 15000" required>
		        			<span class="text-danger">Input angka stok tanpa ada tanda titik (.) atau yang lainnya</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tgl Belanja</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="date" name="tgl_belanja" value="{{ old('tgl_belanja') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Satuan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="satuan" class="form-control" required>
		        			    <option disable selected>Pilih salah satu</option>
		        			    <option value="Kg">Kg</option>
		        			    <option value="Ton">Ton</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
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
	<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-primary">
	        <strong style="font-size: 18px;">Edit Cadangan Bulog</strong>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="{{ route('cadangan-bulog.update',$item->id) }}" method="POST" enctype="multipart/form-data">
	      	@csrf
	      	@method('PUT')
		      <div class="modal-body">
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Pengadaan</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<input type="text" name="pengadaan" class="form-control" value="{{ $item->pengadaan }}" placeholder="ex: Beras" required>
    		        		</div>
    		        	</div>
    		        </div>
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Stok</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<input type="number" name="stok" class="form-control" value="{{ $item->stok }}" placeholder="ex: 15000" required>
    		        			<span class="text-danger">Input angka stok tanpa ada tanda titik (.) atau yang lainnya</span>
    		        		</div>
    		        	</div>
    		        </div>
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Tgl Stok</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<input type="date" name="tgl_stok" value="{{ $item->tgl_stok }}" required>
    		        		</div>
    		        	</div>
    		        </div>
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Belanja</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<input type="number" name="belanja" class="form-control" value="{{ $item->belanja }}" placeholder="ex: 15000" required>
    		        			<span class="text-danger">Input angka stok tanpa ada tanda titik (.) atau yang lainnya</span>
    		        		</div>
    		        	</div>
    		        </div>
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Tgl Belanja</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<input type="date" name="tgl_belanja" value="{{ $item->tgl_belanja }}" required>
    		        		</div>
    		        	</div>
    		        </div>
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Satuan</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<select name="satuan" class="form-control" required>
    		        			    <option value="{{ $item->satuan }}">{{ $item->satuan }}</option>
    		        			    <option value="Kg">Kg</option>
    		        			    <option value="Ton">Ton</option>
    		        			</select>
    		        		</div>
    		        	</div>
    		        </div>
    		        <div class="form-group">
    		        	<div class="row">
    		        		<div class="col-lg-3">
    		        			<strong>Keterangan</strong>
    		        		</div>
    		        		<div class="col-lg-9">
    		        			<textarea name="keterangan" class="form-control">{{ $item->keterangan }}</textarea>
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

		    <div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content" style="overflow-x:auto;">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                                <th>Pengadaan</th>
		                                <th>Stok</th>
		                                <th>Tgl Stok</th>
		                                <th>Belanja</th>
		                                <th>Tgl Belanja</th>
		                                <th>Keterangan</th>
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
	                        			<td>{{ $item->pengadaan }}</td>
	                        			<td>{{ number_format($item->stok) }} {{ $item->satuan }}</td>
	                        			<td>{{ $item->tgl_stok }}</td>
	                        			<td>{{ number_format($item->belanja) }} {{ $item->satuan }}</td>
	                        			<td>{{ $item->tgl_belanja }}</td>
	                        			<td>{{ $item->keterangan }}</td>
	                        			@if(Auth::user()->role_name=='Kadis Ketapang')
	                        			@else
	                        			<td>
	                        				<form action="{{ route('cadangan-bulog.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus ')"><i class="ti-trash"></i></button>
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