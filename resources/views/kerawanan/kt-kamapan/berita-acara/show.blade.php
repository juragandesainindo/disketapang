@extends('layouts.master')
@section('title','Berita Acara')
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
        <strong style="font-size: 18px;">Tambah Data</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('berita-acara-show.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	          <input type="hidden" name="berita_acara_id" value="{{ $data->id }}">
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Jenis Barang</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="jenis_barang" class="form-control" value="{{ old('jenis_barang') }}" required>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Jumlah</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Satuan</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="satuan" class="form-control" value="{{ old('satuan') }}" required>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Keterangan</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
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
@foreach($data->beritaAcaraShow as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Data</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('berita-acara-show.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Jenis Barang</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="jenis_barang" class="form-control" value="{{ $item->jenis_barang }}" required>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Jumlah</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="jumlah" class="form-control" value="{{ $item->jumlah }}" required>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Satuan</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="satuan" class="form-control" value="{{ $item->satuan }}" required>
    	        		</div>
    	        	</div>
    	        </div>
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Keterangan</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<input name="keterangan" class="form-control" value="{{ $item->keterangan }}" required>
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
                        <label style="margin-top: 10px;">
                            <a href="{{ url('berita-acara') }}" class="btn btn-default btn-outline">Kembali</a>
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add">Tambah</a>
                            @endif
                        </label>
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title') &emsp; <span class="badge badge-primary">{{ $data->dktKelompok->nama_dkt }}</span></h1>
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
                <div class="panel panel-default m-t-15">
                    <div class="panel-body">
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
                        		@foreach($data->beritaAcaraShow as $key => $item)
                        		<tr>
                        		    <td>{{ ++$key }}</td>
                        		    <td>{{ $item->jenis_barang }}</td>
                        		    <td>{{ $item->jumlah }}</td>
                        		    <td>{{ $item->satuan }}</td>
                        		    <td>{{ $item->keterangan }}</td>
                        		    @if(Auth::user()->role_name=='Kadis Ketapang')
                                    @else
                        			<td>
                        				<form action="{{ route('berita-acara-show.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil-alt"></i></a>
                        					@csrf
                        					@method('DELETE')
                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus ')" title="Hapus"><i class="ti-trash"></i></button>
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

@stop