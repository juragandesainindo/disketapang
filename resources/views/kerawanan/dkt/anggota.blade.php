@extends('layouts.master')
@section('title','DAFTAR ANGGOTA KELOMPOK TANI')
@section('content')

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Anggota Kelompok</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('anggota-kelompok.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	      		<input type="hidden" name="dkt_kelompok_id" value="{{ $kelompok->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Anggota</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama_anggota" value="{{ old('nama_anggota') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>No KTP</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="ktp" value="{{ old('ktp') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Kelamin</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="radio" name="jenis_kelamin" value="L" required> Laki-laki
		        			<input type="radio" name="jenis_kelamin" value="P"> Perempuan
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Komoditas yang diusahakan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="komoditas" value="{{ old('komoditas') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Volume (ha/ekor/unit)</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="volume" value="{{ old('volume') }}" class="form-control" required>
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
@foreach($kelompok->anggota as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Anggota Kelompok</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('anggota-kelompok.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Anggota</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama_anggota" value="{{ $item->nama_anggota }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>No KTP</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="ktp" value="{{ $item->ktp }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Kelamin</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="jenis_kelamin" class="form-control">
		        			    <option value="{{ $item->jenis_kelamin }}">{{ $item->jenis_kelamin }}</option>
		        			    <option value="L">Laki-laki</option>
		        			    <option value="P">Perempuan</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Komoditas yang diusahakan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="komoditas" value="{{ $item->komoditas }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Volume (ha/ekor/unit)</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="volume" value="{{ $item->volume }}" class="form-control" required>
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
                    	    @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
		                    	<a href="#" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
	                    	@endif
                    	</label>
                        <h4 class="text-primary" style="text-transform: uppercase;font-weight: bold;">@yield('title') - {{ $kelompok->nama_dkt }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
	            <div class="panel panel-primary m-t-15">
	                <div class="panel-body" style="overflow-x:auto;">
	                	<table class="table table-striped table-hover" id="table1">
                        	<thead>
	                        	<tr>
	                        		<th>No</th>
	                        		<th>Nama Anggota</th>
	                        		<th>Jenis Kelamin</th>
	                        		<th>No KTP</th>
	                        		<th>Komoditas</th>
	                        		<th>Volume</th>
	                        		@if(Auth::user()->role_name=='Kadis Ketapang')
                                    @else
	                        		<th>Aksi</th>
	                        		@endif
	                        	</tr>
                        	</thead>
                        	<tbody>
                        		@foreach($kelompok->anggota as $key => $item)
	                        	<tr>
	                        	    <td>{{ ++$key }}</td>
	                        		<td>{{ $item->nama_anggota }}</td>
	                        		<td>{{ $item->jenis_kelamin }}</td>
	                        		<td>{{ $item->ktp }}</td>
	                        		<td>{{ $item->komoditas }}</td>
	                        		<td>{{ $item->volume }}</td>
	                        		@if(Auth::user()->role_name=='Kadis Ketapang')
                                    @else
	                        		<td>
	                        			<form action="{{ route('anggota-kelompok.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        				<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}" title="Edit"><i class="ti-pencil"></i></a>
	                        				@csrf
	                        				@method('DELETE')
	                        				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data  ')" title="Delete"><i class="ti-trash"></i></button>
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