@extends('layouts.master')

@section('content')
<div class="main">
    <div class="container-fluid">
		<div class="row">
		    <div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content">
							<form action="{{ route('unit-distributor.update',$unit->id) }}" method="POST" enctype="multipart/form-data">
							  	@csrf
							  	@method('PUT')
							      <div class="modal-body" style="overflow-y: auto;">
								        <div class="form-group">
								        	<div class="row">
								        		<div class="col-lg-3">
								        			<strong>Nama Perusahaan</strong>
								        		</div>
								        		<div class="col-lg-9">
								        			<input type="text" name="nama_perusahaan" class="form-control" value="{{ $unit->nama_perusahaan }}" required>
								        		</div>
								        	</div>
								        </div>
								        <div class="form-group">
								        	<div class="row">
								        		<div class="col-lg-3">
								        			<strong>Bentuk Usaha</strong>
								        		</div>
								        		<div class="col-lg-9">
								        			<select name="bentuk_usaha" class="form-control" required>
								        				<option value="{{ $unit->bentuk_usaha }}">{{ $unit->bentuk_usaha }}</option>
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
								        			<textarea name="alamat" rows="2" class="form-control">{{ $unit->alamat }}</textarea>
								        		</div>
								        	</div>
								        </div>
								        <div class="form-group">
								        	<div class="row">
								        		<div class="col-lg-3">
								        			<strong>Link Maps</strong>
								        		</div>
								        		<div class="col-lg-9">
								        			<input type="text" name="link" class="form-control" value="{{ $unit->link }}" required>
								        		</div>
								        	</div>
								        </div>
								        <div class="form-group">
								        	<div class="row">
								        		<div class="col-lg-3">
								        			<strong>Telepon</strong>
								        		</div>
								        		<div class="col-lg-9">
								        			<input type="text" name="telepon" class="form-control" value="{{ $unit->telepon }}" required>
								        		</div>
								        	</div>
								        </div>
								        <div class="form-group">
								        	<div class="row">
								        		<div class="col-lg-3">
								        			<strong>Komoditi</strong>
								        		</div>
								        		<div class="col-lg-9">
								        			<input type="text" name="komoditi" class="form-control" value="{{ $unit->komoditi }}" required>
								        		</div>
								        	</div>
								        </div>
								        <div class="form-group">
								        	<div class="row">
								        		<div class="col-lg-3">
								        			<strong>Gambar Gudang</strong>
								        		</div>
								        		<div class="col-lg-9">
								        			<input type="file" name="gambar" class="form-control">
								        			<img src="{{ asset('distribusi/unit-distributor/'.$unit->gambar) }}" width="250px" class="m-t-10">
								        		</div>
								        	</div>
								        </div>
							      </div>
							      <div class="modal-footer">
							      		<a href="{{ route('unit-distributor.index') }}" class="btn btn-default btn-outline" style="float: left;">Kembali</a>
							      		<button type="submit" class="btn btn-primary" style="float: left;">Edit Data</button>
							      </div>
							</form>
						</div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@stop