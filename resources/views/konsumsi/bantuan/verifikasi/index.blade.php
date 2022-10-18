@extends('layouts.master')
@section('title','Verifikasi CP/CL')
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
    <div class="modal-content" style="overflow-y:auto;height:90vh;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Tambah Verifikasi CP/CL</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kwt-verifikasi-cpcl.store') }}" method="POST" enctype="multipart/form-data">
      	@csrf
	      <div class="modal-body">
	          <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Pilih KWT</strong>
		        		</div>
		        		<div class="col-lg-9">
		        		    <select name="kwt_kelompok_id" class="form-control" required>
		        		        <option disable selected>Pilih salah satu</option>
		        		        @foreach($proposal as $p)
		        		        <option value="{{ $p->kwtKelompok->id }}">{{ $p->kwtKelompok->nama_kwt }}</option>
		        		        @endforeach
		        		    </select>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Latar Belakang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="latar_belakang" class="form-control" required>{{ old('latar_belakang') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Landasan Hukum</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="landasan_hukum" class="form-control" required>{{ old('landasan_hukum') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Maksud</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="maksud" class="form-control" required>{{ old('maksud') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kegiatan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="kegiatan" class="form-control" required>{{ old('kegiatan') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Hasil</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="hasil" class="form-control" required>{{ old('hasil') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kesimpulan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="kesimpulan" class="form-control" required>{{ old('kesimpulan') }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Saran</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="saran" class="form-control" required>{{ old('saran') }}</textarea>
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
    <div class="modal-content" style="overflow-y:auto;height:90vh;">
      <div class="modal-header bg-primary">
        <strong style="font-size: 18px;">Edit Verifikasi CP/CL</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kwt-verifikasi-cpcl.update',$item->id) }}" method="POST" enctype="multipart/form-data">
      	@csrf
      	@method('PUT')
	      <div class="modal-body">
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Latar Belakang</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="latar_belakang" class="form-control" required>{{ $item->latar_belakang }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Landasan Hukum</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="landasan_hukum" class="form-control" required>{{ $item->landasan_hukum }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Maksud</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="maksud" class="form-control" required>{{ $item->maksud }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kegiatan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="kegiatan" class="form-control" required>{{ $item->kegiatan }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Hasil</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="hasil" class="form-control" required>{{ $item->hasil }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Kesimpulan</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="kesimpulan" class="form-control" required>{{ $item->kesimpulan }}</textarea>
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-lg-3">
		        			<strong>Saran</strong>
		        		</div>
		        		<div class="col-lg-9">
		        			<textarea name="saran" class="form-control" required>{{ $item->saran }}</textarea>
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
		            <div class="card-body" style="overflow-x:auto;">
		                <div class="tab-content">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        		<th>No</th>
		                        		<th>Nama KWT</th>
		                        		<th>Latar Belakang</th>
		                        		<th>Landasan Hukum</th>
		                                <th>Maksud</th>
		                                <th>Kegiatan</th>
		                                <th>Hasil</th>
		                                <th>Kesimpulan</th>
		                                <th>Saran</th>
		                                <th>Aksi</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($data as $key => $item)
	                        		<tr>
	                        		    <td>{{ ++$key }}</td>
	                        		    <td>{{ $item->KwtKelompok->nama_kwt }}</td>
	                        		    <td>{{ Str::limit($item->latar_belakang, 20) }}</td>
	                        		    <td>{{ Str::limit($item->landasan_hukum, 20) }}</td>
	                        		    <td>{{ Str::limit($item->maksud, 20) }}</td>
	                        		    <td>{{ Str::limit($item->kegiatan, 20) }}</td>
	                        		    <td>{{ Str::limit($item->hasil, 20) }}</td>
	                        		    <td>{{ Str::limit($item->kesimpulan, 20) }}</td>
	                        		    <td>{{ Str::limit($item->saran, 20) }}</td>
	                        			<td width="5%">
	                        				<form action="{{ route('kwt-verifikasi-cpcl.destroy',$item->id) }}" method="POST" enctype="multipart/form-data">
	                        					<a href="{{ route('kwt-verifikasi-cpcl.pdf',$item->id) }}" class="btn btn-success btn-sm" target="_blank"><i class="ti-file"></i></a>
	                        					@if(Auth::user()->role_name=='Kadis Ketapang')
	                        					@else
	                        					<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $item->id }}"><i class="ti-pencil-alt"></i></a>
	                        					@csrf
	                        					@method('DELETE')
	                        					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda benar benar ingin menghapus ')"><i class="ti-trash"></i></button>
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