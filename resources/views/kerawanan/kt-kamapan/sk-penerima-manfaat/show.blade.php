@extends('layouts.master')
@section('title','SK Penerima Manfaat')
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
        <strong style="font-size: 18px;">Tambah Kelompok Tani</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('sk-penerima-manfaat-show.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
    		    <input type="hidden" name="sk_id" value="{{ $data->id }}">
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Kelompok Tani</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<select name="dkt_kelompok_id" class="form-control" required>
    	        			    @foreach($verifikasi as $item)
    	        			    <option value="{{ $item->dktKelompok->id }}">{{ $item->dktKelompok->nama_dkt }}</option>
    	        			    @endforeach
    	        			</select>
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
@foreach($data->skShow as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Kelompok Tani</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('sk-penerima-manfaat-show.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
    	        <div class="form-group">
    	        	<div class="row">
    	        		<div class="col-lg-3">
    	        			<strong>Kelompok Tani</strong>
    	        		</div>
    	        		<div class="col-lg-9">
    	        			<select name="dkt_kelompok_id" class="form-control" required>
    	        			    <option value="{{ $item->dktKelompok->id }}">{{ $item->dktKelompok->nama_dkt }}</option>
    	        			    @foreach($verifikasi as $item)
    	        			    <option value="{{ $item->dktKelompok->id }}">{{ $item->dktKelompok->nama_dkt }}</option>
    	        			    @endforeach
    	        			</select>
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
                        </label>
                    	
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title') - {{ $data->tahun }}</h1>
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

		    <div class="col-lg-8">    
                <div class="panel panel-default m-t-15">
                    <div class="panel-heading">
                        <a href="{{ url('sk-penerima-manfaat') }}" class="btn btn-default btn-outline">Kembali</a>
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add">Tambah Kelompok Tani</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover" id="table1">
                        	<thead>
	                        	<tr>
	                        		<th>No</th>
	                                <th>Kelompok Tani</th>
	                                <th>Aksi</th>
	                        	</tr>
                        	</thead>
                        	<tbody>
                        	    @foreach($data->skShow as $key => $item)
                        	    <tr>
                        	        <td>{{ ++$key }}</td>
                        	        <td>{{ $item->dktKelompok->nama_dkt }}</td>
                        			<td>
                        				<form action="{{ route('sk-penerima-manfaat-show.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil-alt"></i></a>
                        					@csrf
                        					@method('DELETE')
                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus ')" title="Hapus"><i class="ti-trash"></i></button>
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

@stop