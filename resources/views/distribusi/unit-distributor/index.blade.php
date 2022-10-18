@extends('layouts.master')
@section('title',' Unit Distributor')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;height: 65vh;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table thead{background: #f7f7f7}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>


<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Unit Distributor</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('unit-distributor.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body" style="overflow-y: auto;">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Perusahaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Bentuk Usaha</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="bentuk_usaha" class="form-control">
		        				<option disabled selected>Pilih salah satu</option>
		        				<option value="PT">PT</option>
		        				<option value="CV">CV</option>
		        				<option value="UD">UD</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="alamat" rows="2" class="form-control" required>{{ old('alamat') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Link Maps</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="link" class="form-control" value="{{ old('link') }}">
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Telepon</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Komoditi</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="komoditi" class="form-control" value="{{ old('komoditi') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Gambar Gudang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" required>
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



<div class="main">
    <div class="container-fluid">
		<div class="row">
		    <div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content" style="overflow-x:auto;">
				        	@if(session('success'))
		                        <div class="alert" style="background:#f96332;;padding: 15px;color: white;margin-top: 10px;">
		                          {{ session('success') }}
		                        </div> 
		                    @endif
			        		<div class="car" style="margin: 20px 0px;display:flex;justify-content:space-between;align-items:center;">
			        		    @if(Auth::user()->role_name=='Kadis Ketapang')
			        		    <label></label>
                                @else
		                    	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
		                    	<a href="{{ route('unit-distributor-export') }}" class="btn btn-success btn-outline">Export Excel</a>
		                    	@endif
				                <strong style="font-size: 18px;" class="text-primary">DAFTAR UNIT DISTRIBUTOR</strong>
				            </div>

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                                <th>Nama</th>
		                                <th>Alamat</th>
		                                <th>Telepon</th>
		                                <th>Komoditi</th>
		                                <th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($unit as $key => $item)
	                        		<tr>
	                        			<td>{{ ++$key }}</td>
	                        			<td>{{ $item->bentuk_usaha }} {{ $item->nama_perusahaan }}</td>
	                        			<td>
	                        				<a href="{{ $item->link }}" target="_blank" class="text-info">
	                        					{{ $item->alamat }}
	                        				</a>
	                        			</td>
	                        			<td>{{ $item->telepon }}</td>
	                        			<td>{{ $item->komoditi }}</td>
	                        			<td>
	                        				<form action="{{ route('unit-distributor.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="{{ route('unit-distributor.show',$item->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
	                        					@if(Auth::user()->role_name=='Kadis Ketapang')
                                                @else
	                        					<a href="{{ route('unit-distributor.edit',$item->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus {{ $item->bentuk_usaha }} {{ $item->nama_perusahaan }}')"><i class="ti-trash"></i></button>
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