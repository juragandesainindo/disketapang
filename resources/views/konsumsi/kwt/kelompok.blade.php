@extends('layouts.master')
@section('title','Data Kelompok')
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
    <div class="modal-content" style="overflow-y: auto;height: 85vh;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Kelompok Kelurahan {{ $data->kelurahan }}</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelompok-wanita-tani-kelompok.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	      		<input type="hidden" name="kwt_kelurahan_id" value="{{ $data->id }}">
	      		<input type="hidden" name="kwt_kecamatan_id" value="{{ $data->kwtKecamatan->id }}">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama KWT</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama_kwt" class="form-control" value="{{ old('nama_kwt') }}" required>
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
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
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
		        			<strong>Luas Lahan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="luas_lahan" class="form-control" value="{{ old('luas_lahan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Status Kelompok</strong>
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
@foreach($data->kelompok as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow-y: auto;height: 85vh;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Kelompok Kelurahan {{ $data->kelurahan }}</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelompok-wanita-tani-kelompok.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama KWT</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama_kwt" class="form-control" value="{{ $item->nama_kwt }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Ketua</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="ketua" class="form-control" value="{{ $item->ketua }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Telepon</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="telepon" class="form-control" value="{{ $item->telepon }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="alamat" class="form-control" required>{{ $item->alamat }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Link Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="link" class="form-control" value="{{ $item->link }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>PPL</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="ppl" class="form-control" value="{{ $item->ppl }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Luas Lahan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="luas_lahan" class="form-control" value="{{ $item->luas_lahan }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Status Kelompok</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="status" class="form-control">
		        			    <option value="{{ $item->status }}">{{ $item->status }}</option>
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
                        <h1 class="text-primary" style="text-transform: uppercase;">@yield('title') Kelurahan {{ $data->kelurahan }}</h1>
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
		                <div class="tab-content">
	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Nama KWT</th>
		                        		<th>Ketua</th>
		                        		<th>Telepon</th>
		                        		<th>Alamat</th>
		                        		<th>PPL</th>
		                                <th>Luas Lahan (M2)</th>
		                                <th>Status</th>
		                        		<th>Anggota</th>
		                                <th>Komoditi</th>
		                                @if(Auth::user()->role_name=='Kadis Ketapang')
		                                @else
		                                <th>Aksi</th>
		                                @endif
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($data->kelompok as $key => $item)
	                        		<tr>
	                        			<td>{{ ++$key }}</td>
	                        			<td>{{ $item->nama_kwt }}</td>
	                        			<td>{{ $item->ketua }}</td>
	                        			<td>{{ $item->telepon }}</td>
	                        			<td>
	                        				<a href="{{ $item->link }}" target="_blank" class="text-info">
	                        					{{ $item->alamat }}
	                        				</a>
	                        			</td>
	                        			<td>{{ $item->ppl }}</td>
	                        			<td>{{ $item->luas_lahan }}</td>
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
	                        			    {{ $item->anggota->count() }} Orang
	                        			    <a href="{{ route('kelompok-wanita-tani-kelompok.show',$item->id) }}" target="_blank" title="Lihat Anggota Kelompok">
	                        			        <h4><span class="label label-primary">Lihat Anggota</span></h4>
	                        			    </a>
	                        			</td>
	                        			<td>
	                        			    {{ $item->komoditi->count() }} Komoditi
	                        			    <a href="{{ route('komoditi-kelompok-wanita-tani',$item->id) }}" target="_blank" title="Lihat Komoditi">
	                        			        <h4><span class="label label-primary">Lihat Komoditi</span></h4>
	                        			    </a>
	                        			</td>
	                        			@if(Auth::user()->role_name=='Kadis Ketapang')
	                        			@else
	                        			<td width="5%">
	                        				<form action="{{ route('kelompok-wanita-tani-kelompok.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
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