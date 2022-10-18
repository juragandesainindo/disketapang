@extends('layouts.master')
@section('title','Daftar Gudang Makanan')
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
    <div class="modal-content" style="overflow-y:auto;height:80vh;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Gudang Makanan Pekanbaru</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('daftar-gudang.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Bentuk Usaha</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="bentuk_usaha" class="form-control">
		        			    <option disable selected>Pilih salah satu</option>
		        			    <option value="PT">PT</option>
		        			    <option value="CV">CV</option>
		        			    <option value="UD">UD</option>
		        			    <option value="TOKO">TOKO</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
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
		        			<strong>Alamat Perusahaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="alamat_perusahaan" class="form-control" value="{{ old('alamat_perusahaan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Telepon Perusahaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="telepon_perusahaan" class="form-control" value="{{ old('telepon_perusahaan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Penanggung Jawab Perusahaan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="penanggung_jwb_perusahaan" class="form-control" value="{{ old('penanggung_jwb_perusahaan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat Gudang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="alamat_gudang" class="form-control" value="{{ old('alamat_gudang') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Telepon Gudang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="telepon_gudang" class="form-control" value="{{ old('telepon_gudang') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Penanggung Jawab Gudang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="penanggung_jwb_gudang" class="form-control" value="{{ old('penanggung_jwb_gudang') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>No. TDG</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="no_tdg" class="form-control" value="{{ old('no_tdg') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Gudang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_gudang" class="form-control" value="{{ old('jenis_gudang') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Luas Gudang (M2)</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="luas_gudang" class="form-control" value="{{ old('luas_gudang') }}" required>
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
            <div class="modal-content" style="overflow-y:auto;height:80vh;">
              <div class="modal-header bg-primary">
                <strong style="font-size: 18px;">Edit Gudang Makanan Pekanbaru</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('daftar-gudang.update',$item->id) }}" method="POST" enctype="multipart/form-data">
              	@csrf
              	@method('PUT')
        	      <div class="modal-body">
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Bentuk Usaha</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<select name="bentuk_usaha" class="form-control">
        		        			    <option value="{{ $item->bentuk_usaha }}">{{ $item->bentuk_usaha }}</option>
        		        			    <option value="PT">PT</option>
        		        			    <option value="CV">CV</option>
        		        			    <option value="UD">UD</option>
        		        			    <option value="TOKO">TOKO</option>
        		        			</select>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Nama Perusahaan</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="nama_perusahaan" class="form-control" value="{{ $item->nama_perusahaan }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Alamat Perusahaan</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="alamat_perusahaan" class="form-control" value="{{ $item->alamat_perusahaan }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Telepon Perusahaan</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="telepon_perusahaan" class="form-control" value="{{ $item->telepon_perusahaan }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Penanggung Jawab Perusahaan</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="penanggung_jwb_perusahaan" class="form-control" value="{{ $item->penanggung_jwb_perusahaan }}}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Alamat Gudang</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="alamat_gudang" class="form-control" value="{{ $item->alamat_gudang }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Telepon Gudang</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="telepon_gudang" class="form-control" value="{{ $item->telepon_gudang }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Penanggung Jawab Gudang</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="penanggung_jwb_gudang" class="form-control" value="{{ $item->penanggung_jwb_gudang }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>No. TDG</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="no_tdg" class="form-control" value="{{ $item->no_tdg }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Jenis Gudang</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="jenis_gudang" class="form-control" value="{{ $item->jenis_gudang }}" required>
        		        		</div>
        		        	</div>
        		        </div>
        		        <div class="form-group">
        		        	<div class="row">
        		        		<div class="col-lg-3">
        		        			<strong>Luas Gudang (M2)</strong>
        		        		</div>
        		        		<div class="col-lg-9">
        		        			<input type="text" name="luas_gudang" class="form-control" value="{{ $item->luas_gudang }}" required>
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
                            @if(Auth::user()->role_name=='Kadis Ketapang')
                            @else
                        	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
                        	@endif
                        	<a href="{{ route('daftar-gudang.export') }}" class="btn btn-success btn-outline">Export Excel</a>
                        </label>
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
		                <div class="tab-content" style="overflow-x: auto;">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                                <th>Nama Perusahaan</th>
		                                <th>Alamat/Telp/Fax Perusahaan</th>
		                                <th>Penanggung Jawab Perusahaan</th>
		                                <th>Alamat/Telp/Fax Gudang</th>
		                                <th>Penanggung Jawab Gudang</th>
		                                <th>No. TDG</th>
		                                <th>Jenis Gudang</th>
		                                <th>Luas Gudang</th>
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
	                        			<td>{{ $item->bentuk_usaha }} {{ $item->nama_perusahaan }}</td>
	                        			<td>{{ $item->alamat_perusahaan }}<br>{{ $item->telepon_perusahaan }}</td>
	                        			<td>{{ $item->penanggung_jwb_perusahaan }}</td>
	                        			<td>{{ $item->alamat_gudang }}<br>{{ $item->telepon_gudang }}</td>
	                        			<td>{{ $item->penanggung_jwb_gudang }}</td>
	                        			<td>{{ $item->no_tdg }}</td>
	                        			<td>{{ $item->jenis_gudang }}</td>
	                        			<td>{{ $item->luas_gudang }}</td>
	                        			@if(Auth::user()->role_name=='Kadis Ketapang')
	                        			@else
	                        			<td>
	                        				<form action="{{ route('daftar-gudang.destroy',$item->id) }}" method="POST">
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