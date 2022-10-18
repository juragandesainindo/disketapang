@extends('layouts.master')
@section('title','Daftar Penerima Manfaat KWT')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: #333;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table thead{background: #f7f7f7}
	.table tbody tr td{text-align: center;color: black;text-align: center;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:black;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Bantuan {{ $data->kwtKelompok->nama_kwt }}</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('penerima-manfaat-kwt-bantuan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	          <input type="hidden" name="kwt_manfaat_id" class="form-control" value="{{ $data->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Barang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_barang" class="form-control" value="{{ old('jenis_barang') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jumlah</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Satuan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="satuan" class="form-control" value="{{ old('satuan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
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
@foreach($data->kwtManfaatBantuan as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:black;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Bantuan {{ $data->kwtKelompok->nama_kwt }}</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('penerima-manfaat-kwt-bantuan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Barang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_barang" class="form-control" value="{{ $item->jenis_barang }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jumlah</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jumlah" class="form-control" value="{{ $item->jumlah }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Satuan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="satuan" class="form-control" value="{{ $item->satuan }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Keterangan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="keterangan" class="form-control" value="{{ $item->keterangan }}" required>
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



<div class="main">
    <div class="container-fluid">
		<div class="row">
		    
		    <div class="col-lg-12 p-0">
                <div class="page-header">
                    <div class="page-title" style="display: flex;justify-content: space-between;align-items: center;">
                        @if(Auth::user()->role_name=='Kadis Ketapang')
                        <label></label>
                        @else
                        <label class="m-t-10">
                	        <a href="{{ url('penerima-manfaat-kwt') }}" class="btn btn-default btn-outline">Kembali</a>
                	        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add">Tambah Bantuan</a>
                	    </label>
                	    @endif
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title')&emsp; <span class="badge badge-info">{{ $data->kwtKelompok->nama_kwt }}</span></h1>
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
    	                                <th>Jenis Barang</th>
    	                                <th>Jumlah</th>
    	                                <th>Satuan</th>
    	                                <th>Keterangan</th>
    	                                @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
    	                                <th>Aksi</th>
    	                                @endif
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        	    @foreach($data->kwtManfaatBantuan as $key => $item)
	                        	    <tr>
	                        	        <td>{{ ++$key }}</td>
	                        	        <td>{{ $item->jenis_barang }}</td>
	                        	        <td>{{ $item->jumlah }}</td>
	                        	        <td>{{ $item->satuan }}</td>
	                        	        <td>{{ $item->keterangan }}</td>
	                        	        @if(Auth::user()->role_name=='Kadis Ketapang')
                                        @else
	                        			<td>
	                        				<form action="{{ route('penerima-manfaat-kwt-bantuan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus data ini')"><i class="ti-trash"></i></button>
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