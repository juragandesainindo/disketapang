@extends('layouts.master')
@section('title','STOK KOMODITI PANGAN')
@section('content')

<style type="text/css">
	.modal-body label{color: #333;font-weight: bold;}
	.modal-body input,.modal-body option,.modal-body textarea{font-size: 16px;color: black;}
	.modal-content form{overflow-y: auto;overflow-x: hidden;}
	table thead,table tbody tr td{color: #333;font-size: 16px;}
	.table thead tr th{text-align: center;color: black;font-weight: bold;text-align: center;font-size: 15px;}
	.table tbody tr td{text-align: center;color: black;font-size: 15px;}
	.table tbody .img{max-width: 40px;border:2px solid white;border-radius: 5px;-webkit-filter: drop-shadow(2px 2px 2px #222);filter: drop-shadow(2px 2px 2px #222);}
</style>


<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Stok Komoditi {{ $cadangan->pedagang }}</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-cadangan-stok.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	      	<input type="hidden" name="cadangan_pangan_id" value="{{ $cadangan->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Komoditi</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="komoditi" class="form-control" required>
		        			    <option disable selected>Pilih salah satu</option>
		        			    <option value="Beras">Beras</option>
		        			    <option value="Gula">Gula</option>
		        			    <option value="Minyak">Minyak</option>
		        			    <option value="Tepung">Tepung</option>
		        			    <option value="Daging">Daging</option>
		        			    <option value="Kernel">Kernel</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Stok Awal</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="number" name="stok_awal" class="form-control" value="{{ old('stok_awal') }}" required>
		        			<span class="text-danger">Jika tidak ada nilai, maka diisi dengan angka 0</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Stok Akhir</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="number" name="stok_akhir" class="form-control" value="{{ old('stok_akhir') }}" required>
		        			<span class="text-danger">Jika tidak ada nilai, maka diisi dengan angka 0</span>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Satuan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="satuan" class="form-control">
		        				<option disabled selected>Pilih salah satu</option>
		        				<option value="Ton">Ton</option>
		        				<option value="Kg">Kg</option>
		        				<option value="Kwintal">Kwintal</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Date</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="date" name="tanggal" value="{{ old('tanggal') }}" required>
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
	@foreach($cadangan->stok as $data)
		<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-primary">
		        <strong style="font-size: 18px;">Edit Nama Tempat Usaha/Pedagang</strong>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="{{ route('data-cadangan-stok.update',$data->id) }}" method="POST" enctype="multipart/form-data">
		      	@csrf
		      	@method('PUT')
			      <div class="modal-body">
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Nama Komoditi</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<select name="komoditi" class="form-control" required>
        		        			    <option value="{{ $data->komoditi }}">{{ $data->komoditi }}</option>
        		        			    <option value="Beras">Beras</option>
        		        			    <option value="Gula">Gula</option>
        		        			    <option value="Minyak">Minyak</option>
        		        			    <option value="Tepung">Tepung</option>
        		        			    <option value="Daging">Daging</option>
        		        			    <option value="Kernel">Kernel</option>
        		        			</select>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Stok Awal</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="number" name="stok_awal" class="form-control" value="{{ $data->stok_awal }}" required>
				        			<span class="text-danger">Jika tidak ada nilai, maka diisi dengan angka 0</span>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Stok Akhir</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="number" name="stok_akhir" class="form-control" value="{{ $data->stok_akhir }}" required>
				        			<span class="text-danger">Jika tidak ada nilai, maka diisi dengan angka 0</span>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Satuan</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<select name="satuan" class="form-control">
				        				<option value="{{ $data->satuan }}">{{ $data->satuan }}</option>
				        				<option value="Ton">Ton</option>
				        				<option value="Kg">Kg</option>
				        				<option value="Kwintal">Kwintal</option>
				        			</select>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Date</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="date" name="tanggal" value="{{ $data->tanggal }}" required>
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
                    	<label style="margin-top: 10px">
                    		<a href="{{ route('data-cadangan-pangan.index') }}" class="btn btn-default btn-outline">Kembali</a>
                    		@if(Auth::user()->role_name=='Kadis Ketapang')
                    		@else
                    		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
                    		@endif
                    	</label>
                    	
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title') - {{ $cadangan->pedagang }} {{ $cadangan->tahun }}</h1>
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
		                                <th>Nama Komoditi</th>
		                                <th>Stok Awal</th>
		                                <th>Stok Akhir</th>
		                                <th>Pendistribusian</th>
		                                <th>Satuan</th>
		                                <th>Date</th>
		                                @if(Auth::user()->role_name=='Kadis Ketapang')
		                                @else
		                                <th>Aksi</th>
		                                @endif
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($cadangan->stok()->orderBy('tanggal','desc')->get() as $key => $item)
	                        		<tr>
	                        			<td>{{ ++$key }}</td>
	                        			<td>{{ $item->komoditi }}</td>
	                        			<td>{{ number_format($item->stok_awal) }}</td>
	                        			<td>{{ number_format($item->stok_akhir) }}</td>
	                        			<td>
	                        				{{ number_format($item->stok_awal-$item->stok_akhir) }}
	                        			</td>
	                        			<td>{{ $item->satuan }}</td>
	                        			<td><b>{{ $item->tanggal }}</b></td>
	                        			@if(Auth::user()->role_name=='Kadis Ketapang')
	                        			@else
	                        			<td>
	                        				<form action="{{ route('data-cadangan-stok.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
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