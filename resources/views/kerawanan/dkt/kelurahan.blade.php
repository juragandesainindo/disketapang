@extends('layouts.master')
@section('title','DAFTAR KELOMPOK')
@section('content')

<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Kelompok Tani</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelompok-kelurahan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	      		<input type="hidden" name="dkt_kelurahan_id" value="{{ $kelurahan->id }}">
	      		<input type="hidden" name="dkt_kecamatan_id" value="{{ $kelurahan->dktKecamatan->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Kelompok Tani</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama_dkt" value="{{ old('nama_dkt') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Link Maps</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="link" value="{{ old('link') }}" class="form-control" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Ketua</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="ketua" class="form-control" value="{{ old('ketua') }}" required>
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
		        			<strong>PPL</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="ppl" class="form-control" value="{{ old('ppl') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Status</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="status" class="form-control">
		        			    <option disable selected>Pilih salah satu</option>
		        			    <option value="Aktif">Aktif</option>
		        			    <option value="Kurang Aktif">Kurang Aktif</option>
		        			    <option value="Tidak Aktif">Tidak Aktif</option>
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
@foreach($kelurahan->dktKelompok as $data)
<div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header bg-primary">
		        <strong style="font-size: 18px;">Edit Kelompok Tani</strong>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		        </button>
        	</div>
	    	<form action="{{ route('kelompok-kelurahan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
		      	@csrf
		      	@method('PUT')
			      <div class="modal-body">
			          <input type="hidden" name="dkt_kelurahan_id" value="{{ $kelurahan->id }}">
	      		        <input type="hidden" name="dkt_kecamatan_id" value="{{ $kelurahan->dktKecamatan->id }}">
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Nama Kelompok Tani</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="nama_dkt" class="form-control" value="{{ $data->nama_dkt }}">
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Alamat</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<textarea name="alamat" class="form-control" rows="2" required>{{ $data->alamat }}</textarea>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Link Maps</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="link" class="form-control" value="{{ $data->link }}" required>
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Ketua</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="ketua" class="form-control" value="{{ $data->ketua }}">
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Telepon</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="telepon" class="form-control" value="{{ $data->telepon }}">
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>PPL</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<input type="text" name="ppl" class="form-control" value="{{ $data->ppl }}">
				        		</div>
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="row">
				        		<div class="col-lg-3">
				        			<strong>Status</strong>
				        		</div>
				        		<div class="col-lg-9">
				        			<select name="status" class="form-control">
				        			    <option value="{{ $data->status }}">{{ $data->status }}</option>
				        			    <option value="Aktif">Aktif</option>
				        			    <option value="Kurang Aktif">Kurang Aktif</option>
				        			    <option value="Tidak Aktif">Tidak Aktif</option>
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
	                    	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
	                    	@endif
                    	</label>
                        <h4 class="text-primary" style="text-transform: uppercase;font-weight: bold;">@yield('title') - Kelurahan {{ $kelurahan->kelurahan }}</h4>
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
	            <div class="panel panel-primary m-t-15">
	                <div class="panel-body" style="overflow-x:auto;">
	                	<table class="table table-triped table-hover" id="table1">
                        	<thead>
	                        	<tr>
	                        		<th>No</th>
	                        		<th>Nama Kelompok Tani</th>
	                        		<th>Alamat</th>
	                        		<th>Ketua</th>
	                        		<th>Telepon</th>
	                        		<th>PPL</th>
	                        		<th>Status</th>
	                        		<th>Jml Anggota</th>
	                        		<th>Aksi</th>
	                        	</tr>
                        	</thead>
                        	<tbody>
                        		@foreach($kelurahan->dktKelompok as $key => $item)
	                        	<tr>
	                        	    <td>{{ ++$key }}</td>
	                        		<td>{{ $item->nama_dkt }}</td>
	                        		<td>
	                        		    <a href="{{ $item->link }}" target="_blank">
	                        		    <span class="text-info">{{ Str::limit($item->alamat,30) }}</span>
	                        		    </a>
	                        		</td>
	                        		<td>{{ $item->ketua }}</td>
	                        		<td>{{ $item->telepon }}</td>
	                        		<td>{{ $item->ppl }}</td>
	                        		<td>
	                        		    @if($item->status=='Aktif')
	                        		    <span class="badge badge-info">Aktif</span>
	                        		    @elseif($item->status=='Kurang Aktif')
	                        		    <span class="badge badge-warning">Kurang Aktif</span>
	                        		    @elseif($item->status=='Tidak Aktif')
	                        		    <span class="badge badge-danger">Tidak Aktif</span>
	                        		    @endif
                        		    </td>
	                        		<td>
	                        		    {{ $item->anggota->count() }}<br>
	                        		    <a href="{{ route('kelompok-kelurahan.show',$item->id) }}" title="Lihat Anggota" target="_blank">
	                        		    <span class="badge badge-primary">Lihat Disni</span>
	                        		    </a>
                        		    </td>
	                        		
	                        		<td width="5%">
                                    	<form action="{{ route('kelompok-kelurahan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                                        	@if(Auth::user()->role_name=='Kadis Ketapang')
                                            @else
                                        	<a href="#" data-toggle="modal" data-target="#edit-{{ $item->id }}" class="btn btn-warning btn-sm" title="Edit">
                                        		<i class="ti-pencil-alt"></i>
                                        	</a>
                                        	@csrf
	                        				@method('DELETE')
	                        				<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data {{ $item->nama_dkt }} ')" title="Delete">
	                        					<i class="ti-trash"></i>
	                        				</button>
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

@stop