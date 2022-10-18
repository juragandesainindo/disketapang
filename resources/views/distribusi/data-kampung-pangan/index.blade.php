@extends('layouts.master')
@section('title','Data Kampung Pangan')
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
    <div class="modal-content" style="color:black;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Data Kampung Pangan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-kampung-pangan.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body" style="overflow-y: auto;">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Kampung</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kecamatan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="kecamatan" class="form-control" required>
		        				<option disabled selected>Pilih salah satu</option>
		        				<option value="Binawidya">Binawidya</option>
		        				<option value="Bukit Raya">Bukit Raya</option>
		        				<option value="Lima Puluh">Lima Puluh</option>
		        				<option value="Kulim">Kulim</option>
		        				<option value="Marpoyan Damai">Marpoyan Damai</option>
		        				<option value="Payung Sekaki">Payung Sekaki</option>
		        				<option value="Pekanbaru Kota">Pekanbaru Kota</option>
		        				<option value="Rumbai">Rumbai</option>
		        				<option value="Rumbai Barat">Rumbai Barat</option>
		        				<option value="Rumbai Timur">Rumbai Timur</option>
		        				<option value="Sail">Sail</option>
		        				<option value="Senapelan">Senapelan</option>
		        				<option value="Sukajadi">Sukajadi</option>
		        				<option value="Tenayan Raya">Tenayan Raya</option>
		        				<option value="Tuah Madani">Tuah Madani</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tahun</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jumlah Anggota</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jumlah_anggota" class="form-control" value="{{ old('jumlah_anggota') }}">
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Pelatihan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_pelatihan" class="form-control" value="{{ old('jenis_pelatihan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Bantuan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_bantuan" class="form-control" value="{{ old('jenis_bantuan') }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Gambar Pelatihan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" class="form-control" value="{{ old('file') }}" required>
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
    <div class="modal-content" style="color:black;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Data Kampung Pangan</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('data-kampung-pangan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body" style="overflow-y: auto;">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Nama Kampung</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Alamat</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="alamat" class="form-control" value="{{ $item->alamat }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kecamatan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<select name="kecamatan" class="form-control" required>
		        				<option value="{{ $item->kecamatan }}">{{ $item->kecamatan }}</option>
		        				<option value="Binawidya">Binawidya</option>
		        				<option value="Bukit Raya">Bukit Raya</option>
		        				<option value="Lima Puluh">Lima Puluh</option>
		        				<option value="Kulim">Kulim</option>
		        				<option value="Marpoyan Damai">Marpoyan Damai</option>
		        				<option value="Payung Sekaki">Payung Sekaki</option>
		        				<option value="Pekanbaru Kota">Pekanbaru Kota</option>
		        				<option value="Rumbai">Rumbai</option>
		        				<option value="Rumbai Barat">Rumbai Barat</option>
		        				<option value="Rumbai Timur">Rumbai Timur</option>
		        				<option value="Sail">Sail</option>
		        				<option value="Senapelan">Senapelan</option>
		        				<option value="Sukajadi">Sukajadi</option>
		        				<option value="Tenayan Raya">Tenayan Raya</option>
		        				<option value="Tuah Madani">Tuah Madani</option>
		        			</select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Tahun</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="tahun" class="form-control" value="{{ $item->tahun }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jumlah Anggota</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jumlah_anggota" class="form-control" value="{{ $item->jumlah_anggota }}">
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Pelatihan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_pelatihan" class="form-control" value="{{ $item->jenis_pelatihan }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Jenis Bantuan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="text" name="jenis_bantuan" class="form-control" value="{{ $item->jenis_bantuan }}" required>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Gambar Pelatihan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<input type="file" name="file" class="form-control" value="{{ $item->file }}">
		        			<span class="text-danger">{{ $item->file }}</span>
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
		    <div class="col-lg-12">
    		    <div class="panel-group">
                    <div class="panel panel-default m-t-15">
                        <div class="panel-heading" style="display:flex;justify-content:space-between;align-items:center;">
                            <label style="margin-top:10px;">
                                @if(Auth::user()->role_name=='Kadis Ketapang')
                                @else
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="ti-plus-circle"></i> Tambah</a>
                                @endif
                                <a href="{{ route('data-kampung-pangan.export') }}" class="btn btn-success" >Export</a>
                            </label>
                            <div style="font-size:18px;color:black;font-weight:bold;color:#FF5733;">DATA KAMPUNG PANGAN</div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover" id="table1">
                            	<thead>
    	                        	<tr>
    	                        		<th>No</th>
    	                                <th>Nama</th>
    	                                <th>Alamat</th>
    	                                <th>Kecamatan</th>
    	                                <th>Tahun</th>
    	                                <th>Jumlah Anggota</th>
    	                                <th>Jenis Pelatihan</th>
    	                                <th>Jenis Bantuan</th>
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
                            			<td>{{ $item->nama }}</td>
                            			<td>{{ $item->alamat }}</td>
                            			<td>{{ $item->kecamatan }}</td>
                            			<td>{{ $item->tahun }}</td>
                            			<td>{{ $item->jumlah_anggota }}</td>
                            			<td>{{ $item->jenis_pelatihan }}</td>
                            			<td>{{ $item->jenis_bantuan }}</td>
                            			<td width="5%">
                            				<form action="{{ route('data-kampung-pangan.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
                            					<a href="{{ route('data-kampung-pangan.show',$item->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                            					@if(Auth::user()->role_name=='Kadis Ketapang')
                            					@else
                            					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
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